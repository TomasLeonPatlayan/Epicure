<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epicure</title>
    <?php  wp_head(); ?>
</head>

<body>

<header>
    <nav class="nav container">
        <div class="nav_container">
<div class="nav_container_hamburguer-menu">
    <img src="<?php echo get_template_directory_uri()?>/img/group-13.svg" alt="">

.
    <div class="nav_container_hamburguer-menu_menus">
<!--        <a href="">Chef</a>-->
        <?php $urlres = get_page_by_title('Restaurants');
        $urlchef = get_page_by_title('Chefs'); ?>
        <a class="" href="<?php echo get_permalink($urlres->ID);?>">All Restaurants </a>
        <a class="" href="<?php echo get_permalink($urlchef->ID);?>">Chefs </a>

        <a href="#">Sign in</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Use</a>
    </div>


</div>
            <div class="nav_container_pages">

                <div class="nav_container_pages_logo">

                    <img src="<?php echo get_template_directory_uri()?>/img/logo.jpg" alt="">

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="Text-Style-6">EPICURE</a>
                </div>
                <?php
                $args = array(
                    'theme_location' =>'header-menu',
                    'container' => 'div',
                    'container_class' =>'nav_container_pages_menu',
                );
                wp_nav_menu($args);
                ?>
            </div>

            <div class="nav_container_information">
                <div class="nav_container_information_search">
                    <form action="<?php echo esc_url(home_url()) ?>" method="get" class="search-form">
                        <input type="text" id="search" placeholder="Search for restaurant cuisine, chef" name="s"  class="search-field">
                        <button type="submit"><img src="<?php echo get_template_directory_uri() ?>/img/search-icon.svg" alt=""></button>
                    </form>
                    <button type="submit"><img src="<?php echo get_template_directory_uri() ?>/img/search-icon.svg" alt=""></button>
                </div>
                <div class="nav_container_information_icon">
                    <img src="<?php  echo get_template_directory_uri()?>/img/user-icon.svg" alt="">
                </div>
                <div class="nav_container_information_icon">
                    <img src="<?php  echo get_template_directory_uri()?>/img/bag-icon.svg" alt="">
                </div>

            </div>
        </div>
    </nav>
</header>