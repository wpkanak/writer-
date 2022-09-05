<?php 
get_header();

?>
    <!-- if the user has javascript disabled they can still use the menu -->
        <noscript>
            <div class="no-js-menu">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'topmenu',
                            'menu_id' => 'mobilemenu',
                        )
                    );
                ?>
            </div>
        </noscript>
        <!-- end no script -->
        <section class="hero-image-4004"></section>
        <div class="error-area-wrapper">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h1 class="title-404"><?php echo esc_html(writer_options('not_found_404_title'));?></h1>
                    <p class="p-404"><?php echo esc_html(writer_options('not_found_subtitle'));?></p>
                </div>
            </div>
        </section>
        </div>


 <?php get_footer(); ?>