<!-- ! Filter component | start -->
<?php include("components/filter.php"); ?>
<!-- ! Filter component | end -->

<div class="all__posts post__filter my-4 row g-3">
    <?php
    // ! Filter specific categories on specific pages
    include("components/page-related-categories.php");
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="blog block">
                    <a href="<?php echo get_permalink(); ?>">
                        <div class="block__image">
                            <div class="overlay <?php foreach ((get_the_category()) as $category) echo $category->slug . ' ' ?>"></div>

                            <?php if (has_post_thumbnail()) {
                                echo the_post_thumbnail();
                            } else { ?>
                                <img src="<?php echo home_url("wp-content/uploads/default-thumbnails/post_no-thumbnail.jpg"); ?>" alt="Default blog post image, TipTopedia logo on gray background">
                            <?php } ?>
                        </div>
                        <div class="block__content">
                            <?php foreach ((get_the_category()) as $category) { ?>
                                <span class="<?php echo $category->slug ?>"> <?php echo $category->name ?> </span>
                            <?php } ?>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_excerpt(); ?></p>

                        </div>
                        <div class="block__action">
                            <p>Learn More <i class="fas fa-angle-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>
    <?php endwhile;
    } else { ?>
        <h4>Posts are being organized and written in the upcoming days. We will announce the website launch in under a week.</h4>
    <?php }
    wp_reset_postdata(); ?>
</div>