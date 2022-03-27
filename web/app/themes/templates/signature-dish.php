<?php
$args = array(
    'post_type' => 'restaurants',
    'posts_per_page' =>3,


);
$restaurants = new WP_Query($args);
while ($restaurants->have_posts()) :
    $restaurants->the_post()?>
    <?php  $plates = get_field('plates');  ?>
    <?php foreach ($plates as $plate) :?>
<!--    --><?php //foreach (array_slice($plates, 0, 1) as $plate) :?>
        <?php $dish = get_fields($plate->ID);
        var_dump($dish);
        $image=$dish['image_1']
        ?>
    <div class="signature-dish_content">
        <h2 class="Text-Style-17"> <?php the_title() ?></h2>
        <div class="signature-dish_content_container">
            <div class="signature-dish_content_container_image">
                <img src="<?php echo $image?>" alt="">
            </div>
            <div class="signature-dish_content_container_title">
                <h3 class="Text-Style-21"><?php echo $plate->post_title; ?></h3>
            </div>
            <div class="signature-dish_content_container_ingredients">
                <p class="Text-Style-15 "><?php echo $plate->post_content; ?></p>
            </div>
            <div class="signature-dish_content_container_price">
                <div class="signature-dish_content_container_price_line"></div>
                <span>
                    ₪ <?php echo $dish['price_1_'] ?>
                </span>
                <div class="signature-dish_content_container_price_line"></div>
            </div>
        </div>
    </div>

    <?php endforeach;?>



<?php  endwhile;
wp_reset_postdata();?>