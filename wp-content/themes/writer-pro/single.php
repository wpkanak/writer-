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
   <main class="container">
        <div class="row">
            <div class="col-xs-12 single-content">
                <p class="meta">
                    <a class="" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> <?php echo esc_html('in','writer-pro'); ?> <?php the_category( " " ); ?> <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> 
                    <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?>
                </p>

                <h1><?php the_title(); ?></h1>

                <p><?php the_content(); ?> </p>


            </div><!-- main-content/col -->
        </div> <!--/row -->
   </main> <!-- /container -->

   <footer class="single">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <?php echo get_avatar( get_the_author_meta('ID'), 60);  ?> 
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="category-list">
                            <p><?php echo esc_html('Published','writer-pro'); ?> <span><?php the_time( get_option('date_format') ); ?></span></p>
                            <p><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> <?php echo esc_html('in','writer-pro'); ?> <?php the_category( " " ); ?></p>

                            <div class="other-catergories">
                                <?php if ( get_the_tag_list() ): ?>
                                <h3><?php echo esc_html('Also found in','writer-pro'); ?></h3>
                                <ul>
                                    <?php echo get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                                </ul>
                               <?php endif; ?>
                            </div>

                        </div>
                    </div><!-- end col -->
                    <div class="col-xs-12 col-md-4">
                        <div class="social">
                            <p><?php echo esc_html('Share this article','writer-pro'); ?>
                            </p><div class="social-links">
                               <?php echo do_shortcode('[cvw_social_links]'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div>
            <div class="row read-another-section">

             <?php
                $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 6,

                );

                $query = new WP_Query( $args );

                while ($query -> have_posts() ) :
                     $query -> the_post();
                ?>

                <div class="col-6 col-md-2 no-gutter read-another-container">
                  <a href="<?php the_permalink(); ?>">
                    <div class="overlay"></div>
                     <?php the_post_thumbnail(); ?>
                    <h3 class="read-another"><?php the_title(); ?></h3>
                  </a>
                </div>

            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </footer>


<?php get_footer(); ?>
