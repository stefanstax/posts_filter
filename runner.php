<?php

add_action("wp_ajax_nopriv_filter", "filter_ajax");
add_action("wp_ajax_filter", "filter_ajax");

function filter_ajax()
{

    $category = $_POST["category"];

    $args = array(
        "post_type" => array('post'),
        "posts_per_page" => -1,
        'post_status'     => 'publish'
    );


    if (isset($category)) {
        $args['category__in'] = array($category);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
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
<?php
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}
