<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<h1>Send Messages to the Whatsapp</h1>

<?php 
global $wpdb;
$table_name = $wpdb->prefix . 'whatsapp_msgs';

$results = $wpdb->get_results(

    "SELECT * FROM $table_name"

);

$data_results = file_get_contents('contact.json');
$tempArray = json_decode($data_results);
//print_r($tempArray->contact);
 ?>
<div class="container">
	<div class="row">
        <div class="col-sm-4">
            <form method="post" action="" id="save_no">
                <div class="form-group has-success has-feedback">
                  <label class="control-label" for="username">Contact No</label>
                  <input type="text" class="form-control" name="contact_no" placeholder="Whatsapp Number" value="<?php echo $tempArray->contact; ?>">
                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                  <span id="usernameStatus" class="help-block">Add Whatsap no on which form notifications are send</span>
                </div>
                <input type="submit" name="Save_data" value="submit" class="btn btn-primary">
            </form>
        </div>
		<div class="col-sm-4">
		</div>
	</div>
</div>


</body>
</html>

<?php  





if (isset($_POST['Save_data'])) {
    //print_r($_POST);

    //$response = json_encode($_POST);

    /*$fp = fopen('contact_no.json', 'w');
    fwrite($fp, json_encode($_POST, JSON_PRETTY_PRINT));   // here it will print the array pretty
    fclose($fp);*/
    
    $file = 'contact.json';
    $arr = array(
        'contact'     => $_POST['contact_no']
    );
    $json_string = json_encode($arr);
    file_put_contents($file, $json_string);
    echo $json_string;
}
/*
if (isset($_POST['createTable'])) {
    //print_r($_POST);

    global $table_prefix, $wpdb;

        $tblname = 'custom_notifications';
        $wp_track_table = $table_prefix . "$tblname ";
    if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table) 
        {
            $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL,
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
            date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);

            // Insert dummy data

            $data = array(
            'id' => '1',
            'link1_name' => '',
            'link1_url' => '',
            'link1_type' => '',
            'link2_name' => '',
            'link2_url' => '',
            'link2_type' => '',
            'link3_name' => '',
            'link3_url' => '',
            'link3_type' => '',
            'enable_disable' => '',
            );
            $format = array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            );
            $success=$wpdb->insert( $table_name, $data, $format );
            Header('Location: '.$_SERVER['PHP_SELF']);
            Exit();
    }
}

if (isset($_POST['saveData'])) {
        
        $table = $wpdb->prefix . 'custom_notifications';
        //print_r($_POST);
        $data = array(
            'link1_name' => $_POST['link1_name'],
            'link1_url' => $_POST['link1'],
            'link1_type' => $_POST['link1_newtab'],
            'link2_name' => $_POST['link2_name'],
            'link2_url' => $_POST['link2'],
            'link2_type' => $_POST['link2_newtab'],
            'link3_name' => $_POST['link3_name'],
            'link3_url' => $_POST['link3'],
            'link3_type' => $_POST['link3_newtab'],
            'enable_disable' => $_POST['enable_disable'],
        );
        $format = array(
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        );

$result = $wpdb->update($table, $data, array('ID' => '1'), $format, array('%d'));
        if($result){
            echo 'data has been updated' ;
            $page = $_SERVER['PHP_SELF'];
            echo '<meta http-equiv="Refresh" content="0;' . $page . '">'; 
        }
    }
*/