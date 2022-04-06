<?php $chef_week = get_field('chef_of_the_week')?>
<?php foreach ($chef_week as $post) : ?>
    <?php  setup_postdata($post)?>
<div class="chef_profile" >
    <h2 class="Text-Style-9 mobile-title"><?php echo the_field('main_title')?></h2>
    <div class="chef_profile_content">
    <div class="chef_profile_content_image" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>) ">
      <span><?php echo the_title();?></span>
    </div>
    <div class="chef_profile_content_description Text-Style-18">
        <?php the_content(); ?>
    </div>
        <?php $chef_restaurants = get_field('chef_restaurant', $post->ID) ?>
     

        <div class="chef_profile_content_chef-restaurants ">
            <h3 class="Text-Style-22 chef_profile_content_chef-restaurants_title"><?php the_field('sub_title'); ?></h3>
<!--            <div class="chef_profile_content_chef-restaurants_restaurants ">-->
<!--                --><?php //foreach ($chef_restaurants as $post) : ?>
<!--                    --><?php // setup_postdata($post)?>
<!--                <div class="chef_profile_content_chef-restaurants_restaurants_entry ">-->
<!---->
<!--                 <img src="--><?php //$pep =the_field('image_1');
//                    $search ='NULL';
//                    $trimmed = str_replace($search, '', $pep) ; ?><!--" alt="">-->
<!--                   <h3 class="Text-Style-16">-->
<!--                     --><?php //the_title()?>
<!--                    </h3>-->
<!--                </div>-->
<!--                    --><?php //wp_reset_postdata();
//                endforeach; ?>
<!--            </div>-->

       </div>




    </div>
</div>
<div class="chef-restaurant-container owl-carousel">

                    <?php foreach ($chef_restaurants as $post) : ?>
                        <?php  setup_postdata($post)?>
                    <div class="chef-restaurant-container_content">

                     <img src="<?php $pep =the_field('image_1');
                        $search ='NULL';
                        $trimmed = str_replace($search, '', $pep) ; ?>" alt="">
                       <h3 class="Text-Style-16">
                         <?php the_title()?>
                        </h3>
                    </div>
                        <?php wp_reset_postdata();
                    endforeach; ?>

</div>
    <?php wp_reset_postdata();
endforeach; ?>

