<div class="restaurant">
    <?php $args = array(
        'posts_per_page' =>3,
        'post_type' =>'restaurants',
        'category_name' =>'Restaurants',

    );
    $restaurants = new WP_Query($args);
while ($restaurants->have_posts()) :
    $restaurants->the_post();
    ?>

        <div class="restaurant_content">
            <a href="<?php the_permalink();?>">
                <div class="restaurant_content_image">
                <?php echo  the_post_thumbnail(); ?>
                </div>
                <div class="restaurant_content_title">
                    <h2 class="Text-Style-12"> <?php the_title(); ?></h2>
                </div>
                <div class="restaurant_content_subtitle">
                <?php the_content(); ?>
                </div>
            </a>
        </div>

<?php endwhile;
wp_reset_postdata(); ?>
    <?php $url = get_page_by_title('Restaurants');?>

    <a class="Text-Style-16" href="<?php echo get_permalink($url->ID);?>">All Restaurants &gt;&gt;</a>
</div>