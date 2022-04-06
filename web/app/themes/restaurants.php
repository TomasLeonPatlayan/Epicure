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

<?php get_template_part('templates/restaurants', 'template');?>
<?php get_footer();?>