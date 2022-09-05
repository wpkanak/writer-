<?php get_header(); 

 $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );



?>

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
                <h1><?php echo esc_html(writer_options('post_info_title'));?></h1>
                <p><?php echo esc_html(writer_options('post_info_des'));?> <a href="<?php echo esc_url(writer_options('post_info_des_btn_url'));?>"><?php echo esc_html(writer_options('post_info_des_btn_text'));?></a> </p>

                <p><?php echo esc_html(writer_options('post_info_des_btn_subtitle'));?></p>
            </div>
            <div class="secondary-info">
                <p>
                    <a class="btn btn-primary" href="<?php echo esc_url(writer_options('post_info_btn_url'));?>"><i class="fa fa-user-plus"></i><?php echo esc_html(writer_options('post_info_btn_text'));?></a>
                </p>
            </div>
        </div>
  </section><!-- end sidebar -->