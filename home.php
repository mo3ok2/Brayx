<?php
/*
Template Name: Home page
*/

get_header();
$brayx = get_post_meta($post->ID);
?>


    <div class="main-slide">
        <div id="fullpage">


            <div data-anchor="slide1" class="section slide1 page1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="main-slide-content">
                                <div id="animated-circle1">
                                    <div class="animation-shapes">
                                        <svg class="shape1" width="300" height="300" viewBox="0 0 700 700"
                                             xmlns="https://www.w3.org/2000/svg">
                                            <path id="path1"
                                                  d="M451.3975552717992,635.9640624004 C547.9852772017997,620.9158754154003 679.4490247351997,355.1603768498013 664.3356148085999,260.36240597040074 C630.8339228434002,97.75929118912069 358.9682570642012,83.43722214269974 217.01148125880104,133.25621452859934 C111.20598962760057,165.57056131179908 113.43558020279949,268.26091485839936 113.43558020279949,433.94633985839937 C113.43558020279949,599.6317648583994 291.46892529179917,667.5835412285999 451.3975552717992,635.9640624004 Z"></path>
                                        </svg>

                                        <svg class="shape2" width="350" height="350" viewBox="0 0 700 700"
                                             xmlns="https://www.w3.org/2000/svg">
                                            <path id="path2"
                                                  d="M451.3975552717992,635.9640624004 C547.9852772017997,620.9158754154003 679.4490247351997,355.1603768498013 664.3356148085999,260.36240597040074 C630.8339228434002,97.75929118912069 358.9682570642012,83.43722214269974 217.01148125880104,133.25621452859934 C111.20598962760057,165.57056131179908 113.43558020279949,268.26091485839936 113.43558020279949,433.94633985839937 C113.43558020279949,599.6317648583994 291.46892529179917,667.5835412285999 451.3975552717992,635.9640624004 Z"></path>
                                        </svg>

                                        <div class="shape3"> </div>
                                        <div class="shape4"> </div>
                                    </div>
                                </div>
                                <h2><?php echo $brayx['brayx_slide1_title'][0] ?></h2>
                                <p><?php echo $brayx['brayx_slide1_desc'][0] ?></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="black-wooman">
                                <img src="<?php echo wp_get_attachment_url($brayx['brayx_slide1_image'][0])?>" alt="Brayx">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div data-anchor="slide2" class="section slide2 page2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-slide-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2><?php echo $brayx['brayx_slide2_title'][0] ?></h2>
                                        <?php echo $brayx['brayx_slide2_desc'][0] ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="img-grey-man">
                                            <div class="img-grey-man-wrapper">
                                                <img src="<?php echo wp_get_attachment_url($brayx['brayx_slide2_image_circle'][0])?>" alt="Brayx">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-three-icons">
                                    <h3><?php echo $brayx['brayx_slide2_small_title'][0] ?></h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text-with-icon" data-aos="fade-up">
                                                <div class="text-with-icon-content first">
                                                    <div class="img-wrapper">
                                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/architect.png" alt="<?php echo $brayx['brayx_slide2_icon1_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide2_icon1_title'][0] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-with-icon" data-aos="fade-up" data-aos-delay="500">
                                                <div class="text-with-icon-content center">
                                                    <div class="img-wrapper">
                                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/design.png" alt="<?php echo $brayx['brayx_slide2_icon2_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide2_icon2_title'][0] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-with-icon" data-aos="fade-up" data-aos-delay="1000">
                                                <div class="text-with-icon-content last">
                                                    <div class="img-wrapper">
                                                        <img src="<?php echo get_template_directory_uri()?>/assets/img/column.png" alt="<?php echo $brayx['brayx_slide2_icon3_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide2_icon3_title'][0] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div data-anchor="slide3" class="section slide3 page3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-slide-content">
                                <h2><?php echo $brayx['brayx_slide3_title'][0] ?></h2>
                                <p><?php echo $brayx['brayx_slide3_desc'][0] ?></p>


                                <div class="owl-carousel">

                                    <?php
                                    // Дістаємо всі опубліковані пости портфоліо і закидаємо в карусель
                                    // создаем экземпляр
                                    $my_posts = new WP_Query;

                                    // делаем запрос
                                    $myposts = $my_posts->query( array(
                                        'post_type'     => 'portfolio',
                                        'post_status'   => 'publish'
                                    ) );

                                    // обрабатываем результат
                                    foreach( $myposts as $pst ){ ?>

                                        <div class="my-slide" data-aos="fade-up">
                                            <div class="portfolio-item">
                                                <div class="img-wrapper">
                                                    <img src="<?php echo get_the_post_thumbnail_url($pst->ID, 'full') ;?>" alt="<?php echo esc_html( $pst->post_title )?>">
                                                </div>
                                                <div class="text-wrapper">
                                                    <div class="title-wrap">
                                                        <h4><?php echo esc_html( $pst->post_title )?></h4>
                                                    </div>
                                                    <div class="p-wrap">
                                                        <p><?php echo esc_html( $pst->post_excerpt )?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div data-anchor="slide4" class="section slide4 page4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-slide-content">
                                <h2><?php echo $brayx['brayx_slide4_title'][0] ?></h2>
                                <p><?php echo $brayx['brayx_slide4_desc'][0] ?></p>

                                <div class="row">


                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon" data-aos="fade-down-right" data-aos-anchor-placement="top-bottom">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="img-wrapper">
                                                        <img class="img-first-hover" src="<?php echo get_template_directory_uri()?>/assets/img/architect.png" alt="<?php echo $brayx['brayx_slide4_icon1_title'][0] ?>">
                                                        <img class="img-second-hover" src="<?php echo get_template_directory_uri()?>/assets/img/architect_white.png" alt="<?php echo $brayx['brayx_slide4_icon1_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide4_icon1_title'][0] ?></span>
                                                    <p><?php echo $brayx['brayx_slide4_icon1_desc'][0] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon" data-aos="fade-down" data-aos-anchor-placement="top-bottom"  data-aos-delay="300">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="img-wrapper">
                                                        <img class="img-first-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/design.png" alt="<?php echo $brayx['brayx_slide4_icon2_title'][0] ?>">
                                                        <img class="img-second-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/design_white.png" alt="<?php echo $brayx['brayx_slide4_icon2_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide4_icon2_title'][0] ?></span>
                                                    <p><?php echo $brayx['brayx_slide4_icon2_desc'][0] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon" data-aos="fade-down-left" data-aos-anchor-placement="top-bottom"  data-aos-delay="600">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="img-wrapper">
                                                        <img class="img-first-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/column.png" alt="<?php echo $brayx['brayx_slide4_icon3_title'][0] ?>">
                                                        <img class="img-second-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/column_white.png" alt="<?php echo $brayx['brayx_slide4_icon3_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide4_icon3_title'][0] ?></span>
                                                    <p><?php echo $brayx['brayx_slide4_icon3_desc'][0] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon" data-aos="fade-up-right" data-aos-anchor-placement="top-bottom"  data-aos-delay="900">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="img-wrapper">
                                                        <img class="img-first-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/consulting.png" alt="<?php echo $brayx['brayx_slide4_icon4_title'][0] ?>">
                                                        <img class="img-second-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/consulting_white.png" alt="<?php echo $brayx['brayx_slide4_icon4_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide4_icon4_title'][0] ?></span>
                                                    <p><?php echo $brayx['brayx_slide4_icon4_desc'][0] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-delay="1200">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="img-wrapper">
                                                        <img class="img-first-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/author.png" alt="<?php echo $brayx['brayx_slide4_icon5_title'][0] ?>">
                                                        <img class="img-second-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/author_white.png" alt="<?php echo $brayx['brayx_slide4_icon5_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide4_icon5_title'][0] ?></span>
                                                    <p><?php echo $brayx['brayx_slide4_icon5_desc'][0] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon" data-aos="fade-up-left" data-aos-anchor-placement="top-bottom"  data-aos-delay="1500">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="img-wrapper">
                                                        <img class="img-first-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/3d-visualization.png" alt="<?php echo $brayx['brayx_slide4_icon6_title'][0] ?>">
                                                        <img class="img-second-hover"  src="<?php echo get_template_directory_uri()?>/assets/img/3d-visualization_white.png" alt="<?php echo $brayx['brayx_slide4_icon6_title'][0] ?>">
                                                    </div>
                                                    <span><?php echo $brayx['brayx_slide4_icon6_title'][0] ?></span>
                                                    <p><?php echo $brayx['brayx_slide4_icon6_desc'][0] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div data-anchor="slide5" class="section slide5 page5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-slide-content">
                                <h2><?php echo $brayx['brayx_slide5_title'][0] ?></h2>
                                <p><?php echo $brayx['brayx_slide5_desc'][0] ?></p>
                                <div class="row">


                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon"  data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="wrap_text">
                                                        <span><?php echo $brayx['brayx_slide5_black_circle1_title'][0] ?></span>
                                                        <div class="price-text"><?php echo $brayx['brayx_slide5_black_circle1_content_from'][0] ?> <span class="price"> <?php echo $brayx['brayx_slide5_black_circle1_content_price'][0] ?></span><?php echo $brayx['brayx_slide5_black_circle1_content_unit'][0] ?></div>
                                                        <a href="<?php echo $brayx['brayx_slide5_black_circle1_button_link'][0] ?>" class="order-button"><?php echo $brayx['brayx_slide5_black_circle1_button_text'][0] ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="text-with-icon"  data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-delay="300">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="wrap_text">
                                                        <span><?php echo $brayx['brayx_slide5_black_circle2_title'][0] ?></span>
                                                        <div class="price-text"><?php echo $brayx['brayx_slide5_black_circle2_content_from'][0] ?> <span class="price"> <?php echo $brayx['brayx_slide5_black_circle2_content_price'][0] ?></span><?php echo $brayx['brayx_slide5_black_circle2_content_unit'][0] ?></div>
                                                        <a href="<?php echo $brayx['brayx_slide5_black_circle2_button_link'][0] ?>" class="order-button"><?php echo $brayx['brayx_slide5_black_circle2_button_text'][0] ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <div class="text-with-icon" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-delay="600">
                                            <div class="text-with-icon-content center">
                                                <div class="bg-wrapp-circle">
                                                    <div class="wrap_text">
                                                        <span><?php echo $brayx['brayx_slide5_black_circle3_title'][0] ?></span>
                                                        <div class="price-text"><?php echo $brayx['brayx_slide5_black_circle3_content_from'][0] ?> <span class="price"> <?php echo $brayx['brayx_slide5_black_circle3_content_price'][0] ?></span><?php echo $brayx['brayx_slide5_black_circle3_content_unit'][0] ?></div>
                                                        <a href="<?php echo $brayx['brayx_slide5_black_circle3_button_link'][0] ?>" class="order-button"><?php echo $brayx['brayx_slide5_black_circle3_button_text'][0] ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div data-anchor="slide6" class="section slide6 page6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-slide-content">
                                <h2><?php echo $brayx['brayx_slide6_title'][0] ?></h2>
                                <div class="three-contact-icons">

                                    <div class="row">

                                        <div class="col-lg-6 col-md-12">
                                            <div class="wrapper-contact-icon addr" data-aos="zoom-in-left" data-aos-anchor-placement="top-bottom">
                                                <div class="icon-contacts"><i class="fas fa-map-marker-alt"></i></div>
                                                <span class="address">Address</span>
                                                <span class="address-content"><?php echo $brayx['brayx_slide6_addr'][0] ?></span>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 col-md-12">
                                            <div class="wrapper-contact-icon addr" data-aos="zoom-in" data-aos-anchor-placement="top-bottom">
                                                <div class="icon-contacts"><i class="far fa-envelope"></i></div>
                                                <span class="address">E-mail</span>
                                                <span class="address-content"><?php echo $brayx['brayx_slide6_email'][0] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12">
                                            <div class="wrapper-contact-icon addr" data-aos="zoom-in-right" data-aos-anchor-placement="top-bottom">
                                                <div class="icon-contacts"><i class="fas fa-phone"></i></div>
                                                <span class="address">Phone</span>
                                                <span class="address-content"><?php echo $brayx['brayx_slide6_phone'][0] ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 d-none d-lg-block">
                                            <div class="contact-zombie-hand" data-aos="fade-right" data-aos-anchor-placement="top-bottom"  data-aos-delay="300">
                                                <img src="<?php echo wp_get_attachment_url($brayx['brayx_slide6_image'][0])?>" alt="Brayx">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="contact-form" data-aos="fade-left" data-aos-anchor-placement="top-bottom"  data-aos-delay="300">
                                                <?php echo do_shortcode('[contact-form-7 id="35" title="Home page form"]')?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </section>
    <!-- End slider -->


<?php get_footer();
