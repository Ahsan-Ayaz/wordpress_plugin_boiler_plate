<?php 

/*function rpthem_enqueue_style(){
wp_enqueue_style( 'bootstrapcss','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, null );
}
function rpthem_enqueue_script() {
wp_enqueue_script( 'bootstapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', false, null );
}

add_action( 'wp_enqueue_scripts', 'rpthem_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'rpthem_enqueue_script' );*/

function whatsapp_msgs_enqueue_script() {   
	wp_enqueue_script( 'JS_library', plugin_dir_url( __FILE__ ) . 'assets/jquery-3.6.0.min.js' );
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'assets/custom.js' );
    wp_enqueue_style( 'my_custom_style', plugin_dir_url( __FILE__ ) . 'assets/custom.css' );
}
add_action('wp_enqueue_scripts', 'whatsapp_msgs_enqueue_script');

function watmsg_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        'Whatsapp Form',
        'manage_options',
        'Whsatsapp_Send_Messages/Whsatsapp_Send_Messages-admin.php',
        '',
        plugins_url( 'Whsatsapp_Send_Messages/images/whatsapp.jpg' ),
        6
    );
}
add_action( 'admin_menu', 'watmsg_register_my_custom_menu_page' );

function create_form(){
    $returnedcontent .= '<div class="container-fluid custom_cont alert">';
    $returnedcontent .= '<div class="row">';
    $returnedcontent .= '<div class="alert_body">';

    return $returnedcontent;
}
add_shortcode( 'create_form', 'create_form' );
?>