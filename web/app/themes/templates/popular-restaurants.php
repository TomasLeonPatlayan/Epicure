
<?php $poular_restaurant = get_field('popular_res'); ?>
<?php foreach ($poular_restaurant as $post) :   ?>
	<?php setup_postdata($post) ?>
    <div class="restaurant-front_content">
        <a href="<?php the_permalink();?>">
            <div class="restaurant-front_content_image">
				<?php echo  the_post_thumbnail(); ?>
            </div>
            <div class="restaurant-front_content_title">
                <h2 class="Text-Style-12"> <?php the_title(); ?></h2>
            </div>
            <div class="restaurant-front_content_subtitle">
				<?php the_content(); ?>
            </div>
        </a>
    </div>

	<?php wp_reset_postdata();
endforeach; ?>