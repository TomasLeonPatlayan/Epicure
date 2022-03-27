<?php get_header();?>


<main class="container restaurant">

    <?php if (have_posts()) { ?>
        <?php while (have_posts()) :
            the_post()?>
            <div class="restaurant_content">
                <a href="<?php the_permalink();?>">
                    <div class="restaurant_content_image">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    </div>
                    <div class="restaurant_content_title">
                        <h2 class="Text-Style-12"> <?php the_title(); ?></h2>
                    </div>
                    <div class="restaurant_content_subtitle">
                        <h4 class="Text-Style-11"> <?php the_content(); ?></h4>
                    </div>
                </a>
            </div>
        <?php endwhile;?>

    <?php }
    else{?>
<h1>THERE ARE NO RESULTS,SORRY</h1>
   <?php  }
    ?>

</main>
<?php get_footer();?>