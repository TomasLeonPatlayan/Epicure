<?php

$plates = get_field('rest_plates');

get_header();?>

  <div class="container hero"  style="background-image:url(<?php echo get_the_post_thumbnail_url('', 'hero')?>) ">  </div>
<div class="container rest">

      <h2 class="Text-Style-12"> <?php the_title(); ?></h2>
      <?php the_content(); ?>
    <div class="rest_time">
        <img src=" <?php echo the_field('timer_image') ?>" alt="">
        <span><?php   the_field('open_close');
	       ?></span>

    </div>

    <div class="rest_date-food">
        <span>Breakfast</span>
        <span>Lunch</span>
        <span>Dinner</span>
    </div>


</div>


<main class="container ">


  <div class="rest-dish">

        <?php
        foreach ($plates as $plate) : ?>
            <?php $dish = get_fields($plate->ID);
            $image=$dish['image_1'];
            $radio_button=  $dish['chenges_1']
            ?>

            <?php get_template_part('templates/modal', 'plate');?>
             <div class="rest-dish_content dish">

                 <a href="#<?php echo $plate->ID ?>" rel="modal:open" class="rest-dish_content_container">

                        <div class="rest-dish_content_container_image">
                            <img src="<?php echo $image?>" alt="">
                        </div>
                            <div class="rest-dish_content_container_title">
                                <h3 class="Text-Style-14"><?php echo $plate->post_title; ?></h3>
                            </div>
                            <div class="rest-dish_content_container_ingredients">
                                <p class="Text-Style-15 "><?php echo $plate->post_content; ?></p>
                            </div>
                            <div class="rest-dish_content_container_price">
                                <div class="rest-dish_content_container_price_line"></div>
                                <span>
                                    ₪ <?php echo $dish['price_1_'] ?>
                                </span>
                                <div class="rest-dish_content_container_price_line"></div>

                            </div>
                 </a>
             </div>
        <?php endforeach; ?>
  </div>

</main>

    <div class=" container title">
        <div class="title_line"></div>
        <h2 class="Text-Style-9">Lunch</h2>
        <div class="title_line"></div>
    </div>
    <section class="container ">

        <div class="rest-dish">
            <?php
            foreach ($plates as $plate) : ?>
                <?php $dish = get_fields($plate->ID);
                $image=$dish['image_1'];

                ?>

                <div class="rest-dish_content dish ">
                    <div class="rest-dish_content_container">
                        <div class="rest-dish_content_container_image">
                            <img src="<?php echo $image?>" alt="">
                        </div>
                        <div class="rest-dish_content_container_title">
                            <h3 class="Text-Style-14"><?php echo $plate->post_title; ?></h3>
                        </div>
                        <div class="rest-dish_content_container_ingredients">
                            <p class="Text-Style-15 "><?php echo $plate->post_content; ?></p>
                        </div>
                        <div class="rest-dish_content_container_price">
                            <div class="rest-dish_content_container_price_line"></div>
                            <span>
                            ₪ <?php echo $dish['price_1_'] ?>
                        </span>
                            <div class="rest-dish_content_container_price_line"></div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>



<?php get_footer();?>