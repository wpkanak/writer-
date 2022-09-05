<?php

//Add menu in admin
add_action( 'admin_menu', 'cvw_social_create_menu' );

function cvw_social_create_menu(){
    add_menu_page( 'Social Share', 'Social Share', 'administrator', 'cvw_social_main_menu', 'cvw_social_main_plugin_page', plugins_url( '../images/logo.png' , __FILE__ ) );
    
    add_action( 'admin_init', 'cvw_social_register_settings' );
}

//Plugin variable
function cvw_social_register_settings() {
    register_setting ( 'cvw-social-settings-group', 'cvw_social_options', 'cvw_social_sanitize_options' );
}

function cvw_social_admin_scripts() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'jquery-ui' );
    wp_register_script( 'cvw-social-admin-js', plugins_url( '../js/admin.js', __FILE__ ) );
	wp_enqueue_script( 'cvw-social-admin-js' );
}

function cvw_social_admin_styles() {
	wp_enqueue_style( 'cvw_social_styles', plugins_url( '../css/admin.css' , __FILE__ ) );
}

// Check if viewing the admin page
if ( isset( $_GET['page'] ) && $_GET['page'] == 'cvw_social_main_menu' ) {
	add_action( 'admin_print_styles', 'cvw_social_admin_styles' );
	add_action( 'admin_print_scripts', 'cvw_social_admin_scripts' );
}

//Settings page
function cvw_social_main_plugin_page() { 
    ?>
    <div class="wrap">
        <h2><?php _e( 'Social Share Settings', 'cvw-social-share' ) ?></h2>
        <div class="cvw-social-wrap">  
            <div class="cvw-social-content-cell">       
                <form method="post" action="options.php">
                    <?php 

		            $defaults = array(
					  'option_posts' => 'off',
					  'option_products' => 'off',
					  'option_products_pos' => '1',
					  'option_facebook' => 'on',
					  'option_twitter' => 'on',
					  'option_linkedin' => 'on',
					  'option_pinterest' => 'on',
					  'option_whatsapp' => 'on',
					  'option_email' => 'on',
					  'option_order' => 'facebook,twitter,linkedin,pinterest,whatsapp,email',
					  'option_style' => 'square',
					  'option_title_posts' => '',
					  'option_title_products' => '',
					  'option_title_shortcode' => ''
					);
					
                    settings_fields( 'cvw-social-settings-group' );
                    $cvw_social_options = wp_parse_args(get_option('cvw_social_options'), $defaults);

                    
                    if ($cvw_social_options['option_products_pos'] === NULL) {
                        $cvw_social_options['option_products_pos'] = '1';
                    }
                    
                    ?>
                    <h3><?php _e( 'Visualitation', 'cvw-social-share' ) ?></h3>
                    <table class="form-table cvw-social-table">
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Show on Posts', 'cvw-social-share' ) ?></th>
                            <td><input type="checkbox" name="cvw_social_options[option_posts]" <?php echo checked( $cvw_social_options['option_posts'], 'on' ); ?> /></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Show on Products', 'cvw-social-share' ) ?></th>
                            <td><input type="checkbox" name="cvw_social_options[option_products]" <?php echo checked( $cvw_social_options['option_products'], 'on' ); ?> /> <em>- <?php _e( 'You need to have Woocommerce installed', 'cvw-social-share' ) ?></em></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row" style="text-align: right; padding-right: 20px;"><?php _e( 'Position in product', 'cvw-social-share' ) ?>:</th>
                            <td><input type="radio" name="cvw_social_options[option_products_pos]" value="1" <?php checked('1', $cvw_social_options['option_products_pos']); ?> /> <?php _e( 'After short description', 'cvw-social-share' ) ?><br />
                                <input type="radio" name="cvw_social_options[option_products_pos]" value="2" <?php checked('2', $cvw_social_options['option_products_pos']); ?> /> <?php _e( 'After content', 'cvw-social-share' ) ?></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Add manually with shortcode', 'cvw-social-share' ) ?></th>
                            <td>[cvw_social_links]</td>
                        </tr>
                    </table>
                    <h3><?php _e( 'Social networks', 'cvw-social-share' ) ?></h3>
                    <?php
                    if ($cvw_social_options['option_order'] === NULL) {
                        $cvw_social_options['option_order'] = 'facebook,twitter,linkedin,pinterest,whatsapp,email';
                    }
                    
                    $social_order = explode( ',', $cvw_social_options['option_order'] );
        
                    $name['facebook']   = 'Facebook';
                    $name['twitter']    = 'Twitter';
                    $name['linkedin']   = 'LinkedIn';
                    $name['pinterest']  = 'Pinterest';
                    $name['whatsapp']   = 'WhatsApp';    
                    $name['email']      = 'Email';        
                    ?>
                    <ul id="sortList" class="form-table cvw-social-table">
                        <?php
                        foreach ( $social_order as $social_name ) {
                            if ( 'googleplus' != $social_name ) { ?>
                            <li id="<?php echo $social_name; ?>">
                                <input type="checkbox" name="cvw_social_options[option_<?php echo $social_name; ?>]" <?php echo checked( $cvw_social_options['option_'.$social_name], 'on' ); ?> /> <?php echo $name[$social_name]; ?>
                            </li>
                            <?php }
                        }
                        
                        foreach ( $name as $key => $value ) {
                            if( !in_array( $key, $social_order ) ) {
                                ?>
                                <li id="<?php echo $key; ?>">
                                    <input type="checkbox" name="cvw_social_options[option_<?php echo $key; ?>]" <?php echo checked( $cvw_social_options['option_'.$key], 'on' ); ?> /> <?php echo $name[$key]; ?>
                                </li>
                                <?php    
                            }
                        }
                        ?>
                    </ul>
                    <input type="hidden" name="cvw_social_options[option_order]" id="cvw-social-order" value="" />
                    
                    <h3><?php _e( 'Style', 'cvw-social-share' ) ?></h3>
                    <table class="form-table cvw-social-table">
                        <tr valign="top">
                            <td colspan="2">
                                <img src="<?php echo plugins_url( '../images/square.png' , __FILE__ ); ?>" /> <input type="radio" name="cvw_social_options[option_style]" value="square" <?php checked( 'square' == $cvw_social_options['option_style'] ); ?> />
                                <img src="<?php echo plugins_url( '../images/square-plain.png' , __FILE__ ); ?>" /> <input type="radio" name="cvw_social_options[option_style]" value="square-plain" <?php checked( 'square-plain' == $cvw_social_options['option_style'] ); ?> />
                                <img src="<?php echo plugins_url( '../images/round.png' , __FILE__ ); ?>" /> <input type="radio" name="cvw_social_options[option_style]" value="round" <?php checked( 'round' == $cvw_social_options['option_style'] ); ?> />
                                <img src="<?php echo plugins_url( '../images/round-plain.png' , __FILE__ ); ?>" /> <input type="radio" name="cvw_social_options[option_style]" value="round-plain" <?php checked( 'round-plain' == $cvw_social_options['option_style'] ); ?> />
                            </td>
                        </tr>
                    </table>
                    
                    <h3><?php _e( 'Call to action', 'cvw-social-share' ) ?></h3>
                    <p><?php _e( 'Title to be shown before social links. These titles are optional.', 'cvw-social-share' ) ?></p>
                    <table class="form-table cvw-social-table">
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Title for Posts', 'cvw-social-share' ) ?></th>
                            <td><input type="text" name="cvw_social_options[option_title_posts]" value="<?php if ( isset($cvw_social_options['option_title_posts']) ) echo $cvw_social_options['option_title_posts']; ?>" size="40" /></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Title for Products', 'cvw-social-share' ) ?></th>
                            <td><input type="text" name="cvw_social_options[option_title_products]" value="<?php if ( isset($cvw_social_options['option_title_products']) ) echo $cvw_social_options['option_title_products']; ?>" size="40" /></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e( 'Title for Shortcode', 'cvw-social-share' ) ?></th>
                            <td><input type="text" name="cvw_social_options[option_title_shortcode]" value="<?php if ( isset($cvw_social_options['option_title_shortcode']) ) echo $cvw_social_options['option_title_shortcode']; ?>" size="40" /></td>
                        </tr>
                    </table>
                    <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'cvw-social-share' ); ?>" />
                    </p>
                </form>
            </div>
            <div class="cvw-social-content-sidebar">       
                <a href="https://covalenciawebs.com" target="_blank"><img src="<?php echo plugins_url( '../images/covalenciawebs.png' , __FILE__ ); ?>" /></a>
                <h3>Dise&ntilde;o web y Marketing Digital</h3>
            </div>
        </div>
    </div>    
<?php
}

//Sanitize inputs
function cvw_social_sanitize_options( $input ) {
    $input['option_posts'] = sanitize_text_field( $input['option_posts'] );
    $input['option_products'] = sanitize_text_field( $input['option_products'] );
    $input['option_products_pos'] = sanitize_text_field( $input['option_products_pos'] );

    $input['option_facebook'] = sanitize_text_field( $input['option_facebook'] );
    $input['option_twitter'] = sanitize_text_field( $input['option_twitter'] );
    $input['option_linkedin'] = sanitize_text_field( $input['option_linkedin'] );
    $input['option_pinterest'] = sanitize_text_field( $input['option_pinterest'] );
    $input['option_whatsapp'] = sanitize_text_field( $input['option_whatsapp'] );
    $input['option_email'] = sanitize_text_field( $input['option_email'] );
    $input['option_order'] = sanitize_text_field( $input['option_order'] );
    
    $input['option_style'] = sanitize_text_field( $input['option_style'] );
    
    $input['option_title_posts'] = sanitize_text_field( $input['option_title_posts'] );
    $input['option_title_products'] = sanitize_text_field( $input['option_title_products'] );
    $input['option_title_shortcode'] = sanitize_text_field( $input['option_title_shortcode'] );    

    return $input;
}