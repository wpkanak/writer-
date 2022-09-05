<?php 

/*

* Template Name: Contact

*/ 
  the_post();
  get_header();

  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

   $page_title = get_field('page_title');

   $page_description = get_field('page_description');

   $sub_title_ = get_field('sub_title_');
   
   $button_text = get_field('button_text');
   
   $button_url = get_field('button_url');

 ?>

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

        <main class="container left-container">
            <div class="row">
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


                <section class="sidebar col-lg-5 col-12" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; ">

                    <span class="menu-trigger animated fadeInDown">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>

                    <div class="site-info">
                        <div class="primary-info">
                        <h1><?php if ($page_title) { echo $page_title; } ?></h1>
                            <p><?php if ($page_description) { echo $page_description; } ?></p>
                        </div>
                        <div class="secondary-info">

                            <p><a class="btn btn-default" href="<?php if ($button_url) { echo $button_url; } ?>"><i class="fa fa-paper-plane"></i><?php if ($button_text) { echo $button_text; } ?></a>
                        </div>
                    </div>

                </section>

                <div class="col-lg-7 col-12 ml-auto main-content">

                    <h3><?php echo esc_html('Contact our Team','writer-pro'); ?></h3>

                     <?php echo do_shortcode( '[contact-form-7 id="43" title="Contact Form"]' ); ?>

                    <footer class="split-footer">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footermenu',
                                        'menu_id' => 'mobilemenu',
                                    )
                                );
                           ?>
                        <i class="link-spacer"></i>
                    </footer>
                </div><!-- main content -->
            </div> <!--/row -->

        </main> <!-- /container -->

        <?php get_footer(); ?>