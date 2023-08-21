<?php

    /**
     * Plugin Name:       Whatsapp Form
     * Plugin URI:        https://google.com
     * Description:       Custom Plugin for Whatsapp Form Submission.
     * Version:           1.0
     * Requires at least: 5.2
     * Requires PHP:      7.2
     * Author:            A-Logics
     * License:           GPL v2 or later
    */

//require_once('vendor/autoload.php');
include 'functions.php';


/* Initialize when plugin activates. */ 
    function whatsapp_msg_activate() {   
        //include 'functions.php';
        initialize_msg_db_table("whatsapp_msgs");
    }
    register_activation_hook(__FILE__,'whatsapp_msg_activate');

    /*function create_plugin_database_table()
    {
        global $table_prefix, $wpdb;

        $tblname = 'pin';
        $wp_track_table = $table_prefix . "$tblname ";

        #Check to see if the table exists already, if not, then create it

        if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table) 
        {

            $sql = "CREATE TABLE `". $wp_track_table . "` ( ";
            $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
            $sql .= "  `pincode`  int(128)   NOT NULL, ";
            $sql .= "  PRIMARY KEY `order_id` (`id`) "; 
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

            /*$sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            link1_name varchar(255) NOT NULL,
            link1_url varchar(255) NOT NULL,
            link1_type varchar(255) NOT NULL,
            link2_name varchar(255) NOT NULL,
            link2_url varchar(255) NOT NULL,
            link2_type varchar(255) NOT NULL,
            link3_name varchar(255) NOT NULL,
            link3_url varchar(255) NOT NULL,
            link3_type varchar(255) NOT NULL,
            enable_disable varchar(255) NOT NULL,
            date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }

     register_activation_hook( __FILE__, 'create_plugin_database_table' );*/
    
    /* Initialize when plugin deactivates.*/
    /*function notification_deactivate() {

    }
    register_deactivation_hook(__FILE__,'Whsatsapp_Send_Messages\notification_deactivate');

    /*Initialize when plugin deletes.*/
    function whatsapp_msg_uninstalled(){
        drop_msg_db_table("whatsapp_msgs");
    }
    register_uninstall_hook(__FILE__, 'Whsatsapp_Send_Messages\whatsapp_msg_uninstalled');



/*add_action('fluentform_submission_inserted', 'your_custom_after_submission_function', 20, 3);

function your_custom_after_submission_function($entryId, $formData, $form)
{
  if($form->id != 5) {
      return;
   }
   
   global $wpdb;
    
    if (isset($_POST['submitbtn'])) {
        global $wpdb;
        $GText = $_POST['input_text'];
        $wpdb->insert('sg_AdminPage',array('GymName'=>$Gtext));
        echo "record inserted";
    }
   
}*/

function initialize_msg_db_table ($table) {
        
        global $wpdb;
        $table_name = $wpdb->prefix . $table; 
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phonenumber varchar(255) NOT NULL,
        message varchar(255) NOT NULL,
        language varchar(255) NOT NULL,
        date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        $wpdb->query($sql);
    }


    /* Drop existing wayfinding table when plugin deletes.*/
    function drop_msg_db_table($table){
        
        global $wpdb;
        $table_name = $wpdb->prefix . $table; 
        
        $sql = "DROP TABLE IF EXISTS $table_name;";
        $wpdb->query($sql);
    }

?>