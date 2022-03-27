<?php
/*
* Template Name: Restaurant
*/


get_header();?>

    <div class=" container filters filter-button-group">
        <h1>Restaurants</h1>
<ul>
    <li class=" Text-Style-2  active" data-filter="*">All</li
    <?php $terms = get_terms('restaurant_category'); ?>
<!--    --><?php //var_dump($terms);
foreach ($terms as $term) {?>
        <li class="Text-Style-2" data-filter=".<?php echo $term->slug;?>"><?php echo $term->name; ?></li>
<?php }
?>

</ul>
    </div>


    <main class="container restaurant grid"">

        <?php
        $args = array(
            'post_type' => 'restaurants',
            'posts_per_page' =>10,
//            'order' =>'ASC',
        );
        $restaurants = new WP_Query($args);
        while ($restaurants->have_posts()) :
            $restaurants->the_post();
                $termsArray =get_the_terms($post->ID, 'restaurant_category');
                $termsSlug='';
            foreach ($termsArray as $term) {
                $termsSlug .= $term->slug . ' ';
            }
            ?>
            <div class="restaurant_content <?php echo $termsSlug; ?> grid-item">
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
        wp_reset_postdata();?>
    </main>
<?php get_footer();?>