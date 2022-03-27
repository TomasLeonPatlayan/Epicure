<?php
$plates = get_field('rest_plates');
foreach ($plates as $plate) : ?>
    <?php $dish = get_fields($plate->ID);
    $image=$dish['image_1'];
    $radio_button=  $dish['chenges_1'];
    $checkboxs = $dish['chose_a_saide_1'];
    ?>
<div id="<?php echo $plate->ID ?>" class="modal dish-modal">

        <div class="dish-modal_container">
            <div class="dish-modal_container_image" style="background-image:url(<?php echo $image?>) ">
<!--                <img src="--><?php //echo $image?><!--" alt="">-->
            </div>
            <div class="dish-modal_container_title">
                <h3 class="Text-Style-14"><?php echo $plate->post_title; ?></h3>
            </div>
            <div class="dish-modal_container_price">
                <div class="dish-modal_container_price_line"></div>
               <span>₪ <?php echo $dish['price_1_'] ?></span>
                <div class="dish-modal_container_price_line"></div>
            </div>
            <div class="dish-modal_container_content">
                <div class="dish-modal_container_content_reset">
                   <?php echo $plate->post_content; ?>
                </div>
                <h4>Choose a Side</h4>
                <div class="dish-modal_container_content_radio">

                    <?php foreach ($radio_button as $radio) : ?>
                        <div class="dish-modal_container_content_radio_entry">
                            <label for=""><?php echo $radio ?></label>
                            <input type="radio">
                        </div>

                    <?php endforeach; ?>
                </div>
                <h4>Changes</h4>
                <div class="dish-modal_container_content_checkbox">

                    <?php foreach ($checkboxs as $checkbox) : ?>
                    <div class="dish-modal_container_content_checkbox_entry">
                        <label for=""><?php echo $checkbox ?></label>
                        <input type="checkbox">
                    </div>

                    <?php endforeach; ?>
                </div>

                <button>ADD TO BAG</button>
            </div>
    </div>
</div>

<?php endforeach;    ?>