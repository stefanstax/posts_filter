<?php
    // Replace any spaces in the title with dashes
    $title_slug = strtolower(str_replace(" ", "-", the_title_attribute('echo=0')));
    // Get the category object by using our new title slug
    $id_obj = get_category_by_slug($title_slug);
    // Get the category id so that we can use that in the query
    // Check if $cat_id exists if not assign do not assign a value and list all posts
    $pages = $id_obj->term_id;

    $category = get_queried_object();

    if ($category->parent != 0 or $category->post_parent != 0) {
        include("components/template-parts/loops/category-posts.php");
        } 
?>

<?php 
    $numberOfPosts = get_posts("post_type=post&category='. $pages .'"); 
    $count = count($numberOfPosts);      
?>

<!-- ! If page or category has children display filter with categories -->
<?php $children = get_pages(array("child_of" => $post->ID)); ?>

<?php if (is_front_page()) { 
    if (count($children) > 0 or $count > 0) {  ?>
        <div class="categories d-flex justify-content-center justify-content-md-start align-items-center">
    <span>Filter by: </span>
    <ul class="d-flex justify-content-start align-items-center">
        <!-- // ! Filter categories shown on all posts button -->
        <?php include("all-posts-filter.php"); ?>
    </ul>
</div>
    <?php  }
    }

if (is_page() && ! is_front_page()) {
    if (count($children) > 0 && $count > 0 or is_category()) { ?>
        <div class="categories d-flex justify-content-center justify-content-md-start align-items-center">
    <span>Filter by: </span>
    <ul class="d-flex justify-content-start align-items-center">
        <!-- // ! Filter categories shown on all posts button -->
        <?php include("all-posts-filter.php"); ?>
    </ul>
</div>
     <?php } 
}?>