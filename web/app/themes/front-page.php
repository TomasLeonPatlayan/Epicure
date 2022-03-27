<?php
get_header(); ?>

<?php while (have_posts()) :
    the_post()?>

<section class="hero-front" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>) ">

    <div class="hero-front_search-container">
        <div class="hero-front_search-container_content">
            <div class="hero-front_search-container_content_title">
                <h1 class="Text-Style-7"><?php echo esc_html(get_option('blogdescription'));?></h1>
            </div>
           <div class="hero-front_search-container_content_search">
               <form action="<?php echo esc_url(home_url()) ?>" method="get" class="search-form">
                   <button type="submit"><img src="<?php echo get_template_directory_uri() ?>/img/search-icon.svg" alt=""></button>
                   <input type="text" id="search" placeholder="Search for restaurant cuisine, chef" name="s"  class="search-field">
               </form>
               <div id=”load-form”></div>
           </div>
       </div>
    </div>

</section>
<section class="menu-mobile">
<div class="menu-mobile_container container">
        <?php
        $args = array(
            'theme_location' =>'header-menu',
            'container' => 'div',
            'container_class' =>'nav_container_pages_menu',
        );
        wp_nav_menu($args);
        ?>
</div>
</section>
<main class="container">

    <h2 class="Text-Style-9 mobile-title"><?php echo the_field("popular_res_title"); ?></h2>
    <div class="restaurant-front">
                <?php  get_template_part('templates/popular', 'restaurants');?>
    </div>
    <?php $url = get_page_by_title('Restaurants');?>
    <a class="Text-Style-16 restaurants-link" href="<?php echo get_permalink($url->ID);?>">All Restaurants &gt;&gt;</a>



</main>

<section class="container">
    <h2 class="Text-Style-9 mobile-title"><?php echo the_field("signature_dishes"); ?></h2>
    <div class="signature-dish">
    <?php  get_template_part('templates/signature', 'dish');?>
   </div>
</section>


<section class="meaning">
    <h2 class="Text-Style-9 mobile-title"> <?php echo the_field("icons_meaning"); ?></h2>

    <div class="meaning_container">
        <div class="meaning_container_content">
        <img src="<?php echo the_field('icon_1')?>" alt="">
        <span><?php echo the_field('name_icon_1')?></span>
        </div>
        <div class="meaning_container_content">
            <img src="<?php echo the_field('icon_2')?>" alt="">
            <span><?php echo the_field('name_icon_2')?></span>
        </div>
        <div class="meaning_container_content">
            <img src="<?php echo the_field('icon_3')?>" alt="">
            <span><?php echo the_field('name_icon_3')?></span>
        </div>

    </div>

</section>

<section class="chef container">
        <?php get_template_part('templates/chef', 'week');  ?>
</section>


<section class="about-us">

    <div class="container about-us_container">

        <div class="about-us_container_description-container">
            <h2 class="Text-Style-20"><?php the_field('title_about'); ?></h2>
            <p class="Text-Style-19">
                <?php the_field('description_about'); ?>
            </p>
            <p class="Text-Style-19">
               <?php the_field('description_about_1'); ?>
            </p>


        </div>
        <div class="about-us_container_logo">
            <img src="<?php echo the_field('image_about')?>" alt="">
        </div>

    </div>
    <div class="container about-us_container_description-container_download">
        <div class="about-us_container_description-container_download_apple">
            <img src="<?php echo the_field('icon_dowload_apple') ?>" alt="">
            <div class="about-us_container_description-container_download_apple_span">
                <span><?php the_field('download_1'); ?></span>
                <span><?php the_field('name_brand_2'); ?></span>
            </div>


        </div>
        <div class="about-us_container_description-container_download_playstore">
            <img src="<?php echo  the_field('icon_dowload_playstore')?>" alt="">
            <div class="about-us_container_description-container_download_playstore_span">
                <span><?php the_field('download'); ?> </span>
                <span><?php the_field('name_brand'); ?></span>
            </div>

        </div>
    </div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>