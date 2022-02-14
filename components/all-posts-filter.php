        <?php
        // Replace any spaces in the title with dashes
        $title_slug = strtolower(str_replace(" ", "-", the_title_attribute('echo=0')));
        // Get the category object by using our new title slug
        $id_obj = get_category_by_slug($title_slug);
        // Get the category id so that we can use that in the query
        // Check if $cat_id exists if not assign do not assign a value and list all posts
        $pages = $id_obj->term_id;

        // ! Used for single category pages
        $category_pages = get_queried_object();

        // Include all categories 0 ! parent accepts only ID or numbers
        if (is_page()) {
            $cat_args = (array(
                "parent" => $pages
            )
            );
        } else if (is_category()) {
            // Include all categories 0 ! parent accepts only ID or numbers
            $cat_args = (array(
                "parent" => $category_pages->term_id
            )
            );
        }
        $categories = get_categories($cat_args);

        // ! Display all button that includes only marketing categories | ! needs to be linked to the parent
        if (is_page() && !is_front_page()) { ?>
            <li class="category__item mx-2"><a class="active" data-category="<?php echo $pages; ?>">All</a></li>
        <?php } else if (is_category()) { ?>
            <li class="category__item mx-2"><a class="active" data-category="<?php echo $category->term_id; ?>">All</a></li>
        <?php
        } else { ?>
            <li class="category__item mx-2"><a class="active" href="">All</a></li>
        <?php }
        foreach ($categories as $cat) : ?>
            <li class="category__item mx-2"><a class="static" data-category="<?php echo $cat->term_id; ?>" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name ?></a></li>
        <?php endforeach;
        ?>