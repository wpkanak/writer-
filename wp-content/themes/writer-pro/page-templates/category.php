<?php 

/*

* Template Name: Category

*/ 

?>

<?php 
  the_post();
  get_header();

  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 

    $page_title = get_field('page_title');

    $page_description = get_field('page_description');

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

            <section class="sidebar category-sidebar col-lg-5 col-12 mr-auto" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; ">

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
                </div>

            </section>

            <section class="col-lg-7 col-12 ml-auto main-content">

                <div class="sub-nav">
                    <a href="#" class="select-posts active"><?php echo esc_html('Posts','writer-pro'); ?></a>
                </div>

                <div class="category-page-posts animated fadeIn ">
                	 <?php

                        $args = array(
                          'post_type' => 'post',
                          'posts_per_page' => 2,

                        );

                        $query = new WP_Query( $args );

                        while ($query -> have_posts() ) :
                             $query -> the_post();
                       ?>

                    <article class="post">
                        <div class="post-preview col-10  no-gutter">

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>

                        <p class="meta">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a> <?php echo esc_html('in','writer-pro'); ?> <?php the_category( " " ); ?> <i class="link-spacer"></i> <i class="fa fa-bookmark"></i> <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?>
                        </p>
                        </div>

                        <div class=" col-2  no-gutter">
                            <?php echo get_avatar( get_the_author_meta('ID'), 60);  ?>
                        </div>
                    </article>

                    <?php
                        endwhile; wp_reset_postdata();
                     ?>

                    <div class="post-pagination">
                            <?php
                                    the_posts_pagination( array(
                                        "screen_reader_text" => ' ',
                                        "prev_text"          => "New Posts",
                                        "next_text"          => "Old Posts"
                                    ) );
                             ?>
                    </div>
                </div><!-- Category page posts -->
            </section><!-- main content -->
        </div> <!--/row -->
    </main> <!-- /container -->


<?php get_footer(); ?>