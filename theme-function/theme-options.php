<?php 

/**
 * 
 *  CREATE MENU PAGE
 * 
 */
function createThemeOptionMenu() {
    add_menu_page(
        __( 'Theme Options'),
        __( 'Theme Options'),
        'edit_theme_options',
        'theme-option-settings',
        'themeOptionPageRaw',
        'dashicons-schedule',
        3
    );
}

/**
 * 
 *  Display SIDEBAR IN THEME OPTION
 * 
 */
function sideBarTabRaw() {
    $tabButton = array(
        'header' => 'Header', 
        'footer' => 'Footer', 
        'autor_box' => 'Author Box',
        'johnson_box' => 'Jhonson Box',
        'typography' => 'Typography',
        'global_fields' => 'Global'
    );
    
    $count = 1;
    foreach($tabButton as $key => $data) {
        if( $count === 1 ) {
            echo '<button role="tab" aria-selected="true" id="'.$key.'">'.$data.'</button>';
        } else {
            echo '<button role="tab" aria-selected="false" id="'.$key.'">'.$data.'</button>';
        }        
        $count++; 
    }
}

/**
 * 
 *  CREATE MENU RAW CALLBACK 
 * 
 */
function themeOptionPageRaw() { ?>
    <?php 
    $options = get_option('spk_theme_option');
    if(isset($_GET['status']) && $_GET['status'] == '1') {
        ?>
        <div class="notice notice-success inline" style="margin-left: -10px;padding: 10px;margin-top: 25px;">
            <?php esc_html_e('Settings Saved Successfully') ?>
        </div>
        <?php
    }
    ?>
    <div class="theme-option-wrapper">
        <header>
            <h1>Theme Options</h1>
        </header>
        <div class="tabs theme-option">
            <aside>
                <div role="tablist" aria-label="Theme Option Button">
                    <?php sideBarTabRaw(); ?>                   
                </div>
            </aside>                   
            <div class="tabPanel-result">                        
                <?php require_once get_template_directory() . '/include/theme-function/theme-option-raw.php'; ?>
            </div>              
        </div>
    </div>
<?php
}

/***
 * 
 *  ADD OPTION SETTING TO DATABASE
 * 
 */

function register_general_theme_option_settings() { 
    $options = get_option('spk_theme_option');
    // echo '<pre>';
    // print_r($options);
    // CHECK IF THE OPTION VARIABLE IS FALSE
    if( !$options ) {
        add_option('spk_theme_option', [
            'select_header_layout' => 'header_layout_1', 
            'header_bg_color' => '#023a55',      
            'body_text_color' => '#023a55',                             
            "author_img" => '',
            'author_img_description' => 'Loream Curabitur aliquet quam id dui.',
            'jonson_box_img' => '',
            'jonson_box_description' => 'Loream Curabitur aliquet quam id dui.',
            'select_footer_layout' => 'footer_layout1',
            'footer_bg_color' => '#023a55',  
            'footer_logo_description' => 'Loream Curabitur aliquet quam id dui.',
            'address' => 'ABC',
            'office_hours_lable' => 'Office Hours:',
            'office_hours' => '09:00 AM - 05:00 PM',
            'working_days' => '(Monday - Friday)',            
            'top_newslatter_description' => '',            
            'copyright_text' => 'Loream Curabitur aliquet quam id dui.',                                                                    
        ]);
    }

}

function spk_theme_save_options() {
    // print_r($_POST);
    // exit;
    if(!current_user_can('edit_theme_options')) {
        wp_die(
            __("You are not allowed to this page.")
        );

        }
        // if the nonce is invalid, the function will immediatelspk_theme_option_varifyy kill the script
        check_admin_referer( 'spk_theme_option_varify' );

        $options = get_option('spk_theme_option');

        $options['select_header_layout'] = $_POST['select_header_layout'];
        $options['header_bg_color'] = sanitize_hex_color($_POST['header_bg_color']);
        $options['body_text_color'] = sanitize_hex_color($_POST['body_text_color']);
        $options['author_img'] = sanitize_url($_POST['author_img']);
        $options['author_img_description'] = sanitize_textarea_field( $_POST['author_img_description'] ); 
        $options['jonson_box_img'] = sanitize_url($_POST['jonson_box_img'] );
        $options['jonson_box_description'] = sanitize_textarea_field( $_POST['jonson_box_description'] );
        $options['select_footer_layout'] = $_POST['select_footer_layout'];
        $options['footer_bg_color'] = sanitize_hex_color( $_POST['footer_bg_color'] );
        $options['footer_logo_description'] = sanitize_textarea_field( $_POST['footer_logo_description'] );
        $options['address'] = sanitize_textarea_field( $_POST['address'] );
        $options['office_hours_lable'] = sanitize_text_field( $_POST['office_hours_lable'] );
        $options['office_hours'] = sanitize_text_field( $_POST['office_hours'] );
        $options['working_days'] = sanitize_text_field( $_POST['working_days'] );
        $options['top_newslatter_description'] = sanitize_textarea_field( $_POST['top_newslatter_description'] );
        $options['copyright_text'] = sanitize_textarea_field( $_POST['copyright_text'] );

        update_option( 'spk_theme_option', $options );

        wp_redirect(admin_url('admin.php?page=theme-option-settings&status=1'));
    
}
