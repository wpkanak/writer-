<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'writer_theme_options';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => esc_html__('Theme Options','writer-pro'),
     'framework_title' => wp_kses(
      sprintf(__("Writer Options <small>By Writer</small>", 'writer-pro')),
      array('small'   => array())
    ),
    'menu_slug'  => 'writer-option',
    'menu_parent'     => 'themes.php',
    'menu_type'       => 'submenu',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => esc_html__('Footer Settings', 'writer-pro'),
    'fields' => array(

      //
      // A text field
      array(
        'id'    => 'footer_copyright_text',
        'type'  => 'text',
        'title' => esc_html__('Footer Copyright Text','writer-pro'),
      ),
      array(
        'id'    => 'footer_copyright_button_text',
        'type'  => 'text',
        'title' => esc_html__('Footer Copyright Button Text','writer-pro'),
      ),
       array(
        'id'    => 'footer_copyright_url',
        'type'  => 'text',
        'title' => esc_html__('Footer Copyright URL','writer-pro'),
      ),

    )
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => '404 Page settings',
    'fields' => array(

     array(
        'id'    => 'not_found_404_title',
        'type'  => 'text',
        'title' => esc_html__('Not Found Title','writer-pro'),
      ),
     array(
        'id'      => 'not_found_subtitle',
        'type'    => 'text',
        'title'   => esc_html__('Not Found Sub Title','writer-pro'),

    ),
    array(
          'id'                    => 'error-page-bg',
          'type'                  => 'background',
          'title'                 => esc_html__('Error BG', 'writer-pro'),
          'output'                => '.error-area-wrapper',
          'background_gradient'   => false,
          'background_origin'     => false,
          'background_clip'       => false,
          'background_blend_mode' => false,
        ),

    )
  ) );


    //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Post Info settings',
    'fields' => array(

     array(
        'id'    => 'post_info_title',
        'type'  => 'text',
        'title' => esc_html__('Post Info Title','writer-pro'),
      ),
     array(
        'id'      => 'post_info_des',
        'type'    => 'textarea',
        'title'   => esc_html__('Post Info Description','writer-pro'),

    ),
    array(
        'id'    => 'post_info_des_btn_text',
        'type'  => 'text',
        'title' => esc_html__('Post Description Button Text','writer-pro'),
    ),
    array(
        'id'    => 'post_info_des_btn_url',
        'type'  => 'text',
        'title' => esc_html__('Post Description Button URL','writer-pro'),
    ),
    array(
        'id'    => 'post_info_des_btn_subtitle',
        'type'  => 'text',
        'title' => esc_html__('Post Sub Title','writer-pro'),
    ),
    array(
        'id'    => 'post_info_btn_text',
        'type'  => 'text',
        'title' => esc_html__('Button Text','writer-pro'),
    ),
    array(
        'id'    => 'post_info_btn_url',
        'type'  => 'text',
        'title' => esc_html__('Button URL','writer-pro'),
    ),

    )
  ) );

}
