<?php $args = array(
    'posts_per_page' =>1,
    'post_type' =>'chefs',

);

$chef = new WP_Query($args);

while ($chef->have_posts()) :
    $chef->the_post();?>
<div class="chef_profile" >
    <h2 class="Text-Style-9 mobile-title"><?php echo the_field('main_title')?></h2>
    <div class="chef_profile_content">
    <div class="chef_profile_content_image" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>) ">
      <span><?php echo the_title();?></span>
    </div>
    <div class="chef_profile_content_description Text-Style-18">
        <?php the_content(); ?>
    </div>
        <div class="chef_profile_content_chef-restaurants">
            <h3 class="Text-Style-22"><?php the_field('sub_title'); ?></h3>
            <div class="chef_profile_content_chef-restaurants_restaurants">
                <div class="chef_profile_content_chef-restaurants_restaurants_entry">
                    <img src="<?php the_field('image'); ?>" alt="">
                    <h3 class="Text-Style-16"><?php the_field('title'); ?></h3>
                </div>
                <div class="chef_profile_content_chef-restaurants_restaurants_entry">
                    <img src="<?php the_field('image_1'); ?>" alt="">
                    <h3 class="Text-Style-16">
                        <?php the_field('title_1'); ?>
                    </h3>
                </div>
                <div class="chef_profile_content_chef-restaurants_restaurants_entry ">
                <img src="<?php the_field('image_2'); ?>" alt="">
                    <h3 class="Text-Style-16">  <?php the_field('title_2'); ?></h3>
                </div>
            </div>
       </div>



    </div>
</div>
<?php endwhile;
wp_reset_postdata();?>
