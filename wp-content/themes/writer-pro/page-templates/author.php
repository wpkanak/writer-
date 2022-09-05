<?php 

/*

* Template Name: Author

*/ 

 ?>

<?php 
  the_post();
  get_header();

  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );  

  $page_title = get_field('page_title');

  $page_description = get_field('page_description');

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

                    <div class="author-bio">

                        <?php echo get_avatar( get_the_author_meta('ID'), 60);  ?>

                        <div class="author-bio__info">
                            <h1><?php the_author(); ?></h1>
                            <p><?php the_author_meta( 'description' );?></p>
                        </div>
                    </div>
                    <p>

                    <h2 class="favorites"><?php echo esc_html('Most Recent posts','writer-pro'); ?></h2>

                    <div class="posts-block animated fadeIn ">

                        <?php

                        $args = array(
                          'post_type' => 'post',
                          'posts_per_page' => 3,

                        );

                        $query = new WP_Query( $args );


                        while ($query -> have_posts() ) :
                             $query -> the_post();
                        ?>

                          <article class="post author-page" <?php post_class(); ?>>
                            <div class="post-preview col-10 col-sm-9  no-gutter">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                <p><?php the_excerpt(); ?></p>

                            </div>

                            <div class="col-sm-3 col-md-2 ml-auto hidden-sm hidden-xs no-gutter">
                                <p class="meta author-page">
                                    <span class="time"><i class="fa fa-bookmark"></i></span>
                                    <span class="min"><?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix_singular="minute"]'); ?></span>
                                </p>
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
                    </div>

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
