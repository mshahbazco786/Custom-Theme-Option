<?php 


require_once get_template_directory() . '/include/theme-function/theme-options.php';

if ( is_admin() ) { 

    add_action( 'admin_menu', 'createThemeOptionMenu' );
    add_action( 'admin_init', 'register_general_theme_option_settings' );

}

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function theme_options_enqueue_scripts() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/include/theme-function/css/theme-options.css', false, '1.0.0' );       
        wp_register_script( 'theme-option', get_template_directory_uri() .'/include/theme-function/js/theme-option.js', array('jquery','media-upload','thickbox') );        
        if ( get_current_screen() === 'theme-option-settings' ) {
            wp_enqueue_script('jquery'); 
            wp_enqueue_script('theme-option');
            wp_enqueue_style( 'custom_wp_admin_css' );
        }
}
add_action( 'admin_enqueue_scripts', 'theme_options_enqueue_scripts' );

function load_wp_media_files($hook_suffix) {
    // Check if the current menu page is toplevel_page_theme
    if($hook_suffix === 'toplevel_page_theme-option-settings') {
        wp_enqueue_media();
    }
    
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

