<?php

// Enqueue styles and scripts
function cvw_enqueue_script() {
    global $post;
    if( isset($post) && ( is_single() || has_shortcode( $post->post_content, 'cvw_social_links' ) ) ) {
        $cvw_social_options = get_option( 'cvw_social_options' );
        wp_enqueue_style( 'cvw_common_styles', plugins_url( '../css/common.css' , __FILE__ ) );
        wp_enqueue_style( 'cvw_social_styles', plugins_url( '../css/cvw-social-'.$cvw_social_options['option_style'].'.css' , __FILE__ ) );
    
        wp_register_script( 'cvw_social_js', plugins_url( '../js/cvw-social-js.js' , __FILE__ ), false, false, true );
        wp_enqueue_script( 'cvw_social_js' );
    }    
}

add_action( 'wp_enqueue_scripts', 'cvw_enqueue_script', 100 );


//Html social links
function cvw_social_links_html ( $value ) {
    global $post;
    
    $url = get_permalink( $post );
    $title = get_the_title( $post );
        
    $cvw_social_options = get_option( 'cvw_social_options' );

    $social_order = explode( ',', $cvw_social_options['option_order'] );
    
    $title_social = '';
    
    switch ( $value ) {
        case 'posts':
            if ( isset($cvw_social_options['option_title_posts']) ) {
                $title_social = $cvw_social_options['option_title_posts'];
            }
            
            break;
        case 'products':
            if ( isset($cvw_social_options['option_title_products']) ) {
                $title_social = $cvw_social_options['option_title_products'];
            }
            break;
        default:
            if ( isset($cvw_social_options['option_title_shortcode']) ) {
                $title_social = $cvw_social_options['option_title_shortcode'];
            }
            break;
    }
    
    $links = '<div class="social-link-content"><div class="social-link-title">'.$title_social.'</div>';
    
    foreach ( $social_order as $social_name ) {
        switch ( $social_name ) {
            case 'facebook':
                if ( $cvw_social_options['option_facebook'] == 'on' ) {
                    $links .= '<a href="http://www.facebook.com/sharer.php?u='. $url .'" target="_blank" rel="noopener" class="social-link social-link-facebook"><i class="fa fa-facebook"></i></a>';
                }
                break;            
            case 'twitter':
                if ( $cvw_social_options['option_twitter'] == 'on' ) {
                    $links .= '<a href="http://twitter.com/share?url='. $url .'&text='. $title .'" rel="noopener" class="social-link social-link-twitter"><i class="fa fa-twitter"></i></a>';
                }
                break;        
            case 'linkedin':
                if ( $cvw_social_options['option_linkedin'] == 'on' ) {                  
                    $links .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url='. $url .'" target="_blank" rel="noopener" class="social-link social-link-linkedin"><i class="fa fa-linkedin"></i></a>';
                }
                break;
            case 'pinterest':
                if ( $cvw_social_options['option_pinterest'] == 'on' ) {
                    $links .= '<a href="javascript:void((function()%7Bvar%20e=document.createElement(\'script\');e.setAttribute(\'type\',\'text/javascript\');e.setAttribute(\'charset\',\'UTF-8\');e.setAttribute(\'src\',\'//assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);document.body.appendChild(e)%7D)());" class="social-link-1 social-link-pinterest"><i class="fa fa-pinterest-p"></i></a>';
                }
                break;                
            case 'whatsapp':
                if ( $cvw_social_options['option_whatsapp'] == 'on' ) {
                    $links .= '<a href="https://wa.me/?text='. $url.'" target="_blank" rel="noopener" class="social-link-1 social-link-whatsapp"><i class="fa fa-whatsapp"></i></a>';
                }
                break;
            case 'email':
                if ( $cvw_social_options['option_email'] == 'on' ) {
                    $links .= '<a href="mailto:?subject='. $title .'&amp;body='. $url.'" rel="noopener" class="social-link-1 social-link-email"><i class="fa fa-envelope-o"></i></a>';
                }
                break;
        }
    }    

    $links .= '</div>';
    
    return $links;
}

//Shortcode
add_shortcode('cvw_social_links', 'cvw_social_links_html');

//Links on posts
function add_social_links_posts( $content ) {   
    
    if( is_singular( 'post' ) ) {
        $content .= cvw_social_links_html('posts');        
    }
    
    return $content;
}

//Links on WooCommerce products
function add_social_links_products( $content ) {        
    echo cvw_social_links_html('products');
}

//Show links
$cvw_social_options = get_option( 'cvw_social_options' );

if ( isset($cvw_social_options['option_posts']) && $cvw_social_options['option_posts'] == 'on' ) {
    add_filter( 'the_content', 'add_social_links_posts' );
}

if ( isset($cvw_social_options['option_posts']) && $cvw_social_options['option_products'] == 'on' ) {
    if ( $cvw_social_options['option_products_pos'] == '2' ) {    
        add_action( 'woocommerce_after_single_product_summary', 'add_social_links_products', 12 );
    } else {
        add_action( 'woocommerce_share', 'add_social_links_products' );
    }    
}