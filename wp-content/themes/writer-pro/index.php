<?php get_header(); 

$category_image = get_field('category_image');

?>

    <?php get_template_part( "inc/header/navigation" ); ?>

    <main class="container left-container">
        <div class="row">
            <section class="col-lg-7 col-12 ml-auto main-content">

                <div class="sub-nav">
                    <a href="#" class="select-posts active"><?php echo esc_html('Posts','writer-pro'); ?></a>
                    <a href="#" class="select-categories"><?php echo esc_html('Categories','writer-pro'); ?></a>
                </div>

                <div class="home-page-posts animated fadeIn ">

                <?php
                while ( have_posts() ) :
                      the_post();
                ?>
                    <article class="post" <?php post_class(); ?>>
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
                endwhile;
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
                </div><!-- Home page posts -->


                <div class="home-page-categories hide animated fadeIn ">
                    <div class="category row">
                        <?php 
                         $categories = get_categories(array ('parent' => 0));
                         foreach($categories as $category) : 
                         $image = get_field('category_image', $category->taxonomy . '_' . $category->term_id ); ?>
                         <div class="category-preview col-6 col-sm-4  ">
                            <h2><?php  echo $category->name; ?></h2>
                          <?php if( $image ){ ?>   <a href="<?php echo get_category_link($category->term_id); ?>">
                            
                           <img src="<?php echo esc_attr($image); ?>" alt="<?php  echo $category->name; ?>"></a> <?php } ?>
                        </div>

                       <?php 
                          endforeach;
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

            </section><!-- main content -->
        </div> <!--/row -->
    </main> <!-- /container -->


<?php get_footer(); ?>