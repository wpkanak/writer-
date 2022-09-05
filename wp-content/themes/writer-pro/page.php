
<?php 
the_post();
get_header(); 
 $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
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

        <header class="hero-image" role="banner" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; ">

            <span class="menu-trigger animated fadeInDown">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>

           <div id="menu-target">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'topmenu',
                            'menu_id' => 'mobilemenu',
                        )
                    );
                ?>
            </div>
        </header>

        <main class="writer-demo">
            <?php the_content(); ?>
        </main> <!-- /container -->

    <?php get_template_part( "inc/footer/footer" ); ?>

<?php get_footer(); ?>
