<?php 

/*

* Template Name: Post Sidebar
* Template Post Type: post

*/ 

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
                <div class="col-12 col-lg-8 single-content-sidebar">


                    <h1><?php the_title(); ?></h1>

                    <p><?php the_content(); ?></p>

                    
                </div><!-- main-content/col -->
                <div class="col-12 col-lg-3 ml-auto single-content-sidebar-area">

                    <?php echo get_avatar( get_the_author_meta('ID'), 60);  ?> 
                    <div class="meta">

                        <div class="sidebar-info">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> in <?php the_category( " " ); ?>
                        </div>

                        <div class="sidebar-readtime">
                            <i class="fa fa-bookmark"></i> <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?>
                        </div>

                    </div>

                    <h2 class="favorites"><?php echo esc_html('Similar Categories','writer-pro'); ?></h2>

                    <?php 
                         $categories = get_categories(array ('parent' => 0));
                         foreach($categories as $category) : 
                         $image = get_field('category_image', $category->taxonomy . '_' . $category->term_id ); ?>
                    <a href="<?php echo get_category_link($category->term_id); ?>" >
                        <div class="similar-cat">
                           <?php if( $image ){ ?> <img src="<?php echo esc_attr($image); ?>">  <?php } ?>
                            <h3><?php  echo $category->name; ?></h3>
                        </div>
                    </a>
                    <?php endforeach; ?>

                     <?php
                        if ( is_active_sidebar( "sidebar-right" ) ) {
                            dynamic_sidebar( "sidebar-right" );
                        }
                    ?>

                </div>
            </div> <!--/row -->

        </main> <!-- /container -->

        <footer class="single without-readmore">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <?php echo get_avatar( get_the_author_meta('ID'), 60);  ?> 
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="category-list">
                            <p><?php echo esc_html('Published','writer-pro'); ?> <span><?php the_time( get_option('date_format') ); ?></span></p>
                            <p><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> <?php echo esc_html('in','writer-pro') ?> <?php the_category( " " ); ?></p>

                            <div class="other-catergories">
                                <h3><?php echo esc_html('Also found in','writer-pro'); ?></h3>

                                <ul>
                                    <?php echo get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                                </ul>
                            </div>

                        </div>
                    </div><!-- end col -->
                    <div class="col-xs-12 col-md-4">
                        <div class="social">
                            <p><?php echo esc_html('Share this article','writer-pro'); ?></a>
                            <div class="social-links">
                                <?php echo do_shortcode('[cvw_social_links]'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div>

        </footer>

  <?php get_footer(); ?>      