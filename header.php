<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>


<body data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0" <?php body_class(); ?>>

<!-- Start slider -->
<section class="showcase">

    <header>
        <div class="header-wrap">
            <div class="container-fluid">
                <div class="nav-wrapper">
                    <nav class="navbar navbar-expand-lg d-flex align-items-start">

                        <a class="navbar-brand" href="<?php echo home_url();?>">

                            <?php
                            $logo_img = '';
                            if( $custom_logo_id = get_theme_mod('custom_logo') ){
                                $logo_img = wp_get_attachment_image_url( $custom_logo_id, 'full', false);
                            } ?>

                            <img src="<?php echo $logo_img;?>" alt="Brayx logo" class="Brayx logo">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars navbar-toggler-icon"></span>
                        </button>

                        <?php if ( has_nav_menu( 'top' ) ) : ?>

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'top',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => 'menu',
                                    'menu_id'         => 'top',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav d-flex justify-content-between mb-2">%3$s</ul>',
                                    'depth'           => 0,
                                    'walker'          => ''

                                ) ); ?>

                            </div>

                        <?php endif; ?>

                    </nav>
                </div>
            </div>
        </div>
    </header>

