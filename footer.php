<footer>
    <div class="footer-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="footer-content">

                    <?php
                    if ( is_active_sidebar( 'sidebar-2' ) ||
                        is_active_sidebar( 'sidebar-3' ) ) : ?>

                        <div class="d-flex justify-content-between">
                            <div class="copyright">


                                <?php if ( is_active_sidebar( 'sidebar-2' ) ) {
                                    dynamic_sidebar( 'sidebar-2' );
                                } ?>

                            </div>
                            <div class="arrow">
                                <div class="arrow-wrap">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/img/arrow-down.png" alt="Next slide">
                                </div>
                            </div>

                            <div class="share-button">
                                <div class="share">

                                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) {
                                        dynamic_sidebar( 'sidebar-3' );
                                    } ?>

                                    <img src="<?php echo get_template_directory_uri()?>/assets/img/share.png" alt="Share">
                                </div>
                            </div>

                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
