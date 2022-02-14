<?php
$category = get_queried_object();

if (is_page() && !is_front_page()) {
    $args = array(
        "post_type" => array('post'),
        "posts_per_page" => -1,
        "category_name" => get_the_title()
    );
} else if (is_category()) {
    $args = array(
        "post_type" => array('post'),
        "posts_per_page" => -1,
        "category_name" => $category->cat_name
    );
} else {
    $args = array(
        "post_type" => array('post'),
        "posts_per_page" => -1
    );
}

$query = new WP_Query($args);
