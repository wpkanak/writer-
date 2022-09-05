<?php 

/*

* Template Name: Favorites

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

                            <p><?php if ($sub_title_) { echo $sub_title_; } ?></p>
                        </div>
                        <div class="secondary-info">

                            <p><a class="btn btn-primary" href="<?php if ($button_url) { echo $button_url; } ?>"><i class="fa fa-user-plus"></i><?php if ($button_text) { echo $button_text; } ?></a>
                        </div>
                    </div>

                </section>

                <div class="col-lg-7 col-12 ml-auto main-content">
                    <section class="row">
                        <div class="col-sm-12">
                            <h2 class="favorites"><?php echo esc_html('Favorite posts','writer-pro'); ?></h2>
                        </div>
                        <?php

                            $args = array(
                              'post_type' => 'post',
                              'posts_per_page' => 3,

                            );

                            $query = new WP_Query( $args );


                            while ($query -> have_posts() ) :
                                 $query -> the_post();
                        ?>
                        <article class="post-favorite col-xs-12 col-sm-6 ">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                        </article>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </section><!-- end fav posts -->

                    <section class="row favorite-categories animated fadeIn">
                        <div class="col-sm-12">
                            <h2 class="favorites"><?php echo esc_html('Favorite categories','writer-pro'); ?><h2>
                        </div>

                        <?php 
                         $categories = get_categories(array ('parent' => 0));
                         foreach($categories as $category) : 
                         $image = get_field('category_image', $category->taxonomy . '_' . $category->term_id ); ?>
                        <div class="category-preview col-6 col-sm-4 ">
                            <h2><?php  echo $category->name; ?></h2>
                         <?php if( $image ){ ?> <a href="<?php echo get_category_link($category->term_id); ?>"><img src="<?php echo esc_attr($image); ?>" alt="<?php  echo $category->name; ?>"></a> <?php } ?>
                        </div>

                        <?php 
                          endforeach;
                        ?>

                    </section>

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
