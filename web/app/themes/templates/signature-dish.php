<?php $signature_dish = get_field('signature_dish'); ?>

<?php foreach ($signature_dish as $post) :   ?>
    <?php setup_postdata($post) ?>
    <?php $restaurant = get_field("restaurant_relationed");?>
    <?php foreach ($restaurant as $rest) :?>

        <div class="signature-dish_content">
            <h2 class="Text-Style-17"> <?php echo $rest->post_title  ?></h2>
            <div class="signature-dish_content_container">
                <div class="signature-dish_content_container_image">
                    <img src="  <?php  the_field("image_1") ?>" alt="">
                </div>
                <div class="signature-dish_content_container_title">
                    <h3 class="Text-Style-21"> <?php the_title() ?></h3>
                </div>
                <div class="signature-dish_content_container_ingredients">
                    <?php the_content(); ?>
                </div>
                <div class="signature-dish_content_container_price">
                    <div class="signature-dish_content_container_price_line"></div>
                    <span>
                    ₪ <?php the_field('price_1_'); ?>

                </span>
                    <div class="signature-dish_content_container_price_line"></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata();
endforeach;?>
