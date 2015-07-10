<?php

// Don't run any console commands if the security token does not exist, or does not match
if ( $_SESSION['sec_key'] != '' && $_POST['submit_console_command'] == $_SESSION['sec_key'] ) {
    
    $api_get = data_encryption(trim($_POST['mypasswd']), $dfdrdd_settings_options_api_get_encrypted, 'decrypt');
    $api_post = data_encryption(trim($_POST['mypasswd']), $dfdrdd_settings_options_api_post_encrypted, 'decrypt');
    
    
    /**
     * reddapi-php
     * example.php
     * Usage examples for ReddAPI.class.php
     * 
     * @author Devin Henderson <code@devhen.net>
     * @version 2014.04.05.1
     */
    
    // Include the ReddAPI class
    include_once(plugin_dir_path( __FILE__ )."../../classes/reddapi.class.php");
    
    // You can instantiate the ReddAPI object using no arguments and then set your API keys later:
    $api = new ReddAPI();
    // ...
    $api->set_key_get($api_get);
    $api->set_key_post($api_post);
    
    // Or you can instantiate the object using your API keys (first the GET key, then the POST key):
    $api = new ReddAPI(
            $api_get,
            $api_post
    );
    
    
    // Test out connection...
    $users = $api->get_user_list();
    if ( !$users ) {
    echo "<div align='center' class='dfd_rdd_alert redbox'>Your API Keys seem incorrect, a connection with ReddAPI could not be established. Please try updating your API keys on the <a href='options-general.php?page=dfd-reddcoin-tips-settings'>settings page</a></div>" . "<br />";
    exit;
    }
    
    
    // We can get an array of all of our users:
    if ( $_POST['console_mode'] == 'get_user_list' ) {
    $users = $api->get_user_list();
    
        if (is_array($users) || is_object($users)) {
            
            foreach ( $users as $user ) {
            
            $balance = $api->get_user_balance($user->Username);
            
            echo "<br /><br /><br />" . '====================================================================================' . "<br /><br /><br />";
            echo ' Creation Date:   ' .parse_unix_timestamp($user->DateCreated) . "<br /><br />";
            echo '     User Name:   ' .$user->Username . "<br /><br />";
            echo 'Wallet Address:   ' .$user->DepositAddress . "<br /><br />";
            echo '  Coin Balance:   ' .$balance. ' RDD' . "<br />";
            
            }
            
        }
    
    echo "<br /><br /><br />" . '====================================================================================' . "<br /><br /><br />";
    // Which returns something like this:
    //var_dump($users);
    }
    
    
    // We can get information on a particular user:
    if ( $_POST['console_mode'] == 'get_user_info' ) {
    $user = $api->get_user_info(trim($_POST['get_username_data']));
    $balance = $api->get_user_balance($user->Username);
 
    echo ' Creation Date:   ' .parse_unix_timestamp($user->DateCreated) . "<br /><br />";
    echo '     User Name:   ' .$user->Username . "<br /><br />";
    echo 'Wallet Address:   ' .$user->DepositAddress . "<br /><br />";
    echo '  Coin Balance:   ' .$balance. ' RDD' . "<br />";
    }
    
    
    // And we can create a new user:
    if ( $_POST['console_mode'] == 'create_new_user' ) {
    $user = $api->create_new_user(trim($_POST['username_create']));
    $balance = $api->get_user_balance($user->Username);

    echo ' Creation Date:   ' .parse_unix_timestamp($user->DateCreated) . "<br /><br />";
    echo '     User Name:   ' .$user->Username . "<br /><br />";
    echo 'Wallet Address:   ' .$user->DepositAddress . "<br /><br />";
    echo '  Coin Balance:   ' .$balance. ' RDD' . "<br />";
    
    //var_dump($user);
    }
    
    
    
    
    // We can now send coins from that user to any Reddcoin address:
    if ( $_POST['console_mode'] == 'send_to_address' ) {
    $tx = $api->send_to_address(trim($_POST['send_external_from_username']), trim($_POST['send_to_external_address']), trim($_POST['send_external_amount']));
    
    // Which returns the TX id for the transaction
    $dfd_rdd_trans_alert = 'You have sent ' . trim($_POST['send_external_amount']) . ' RDD to external address ' . trim($_POST['send_to_external_address']) . ', your transaction id is ' . $tx;
    
    echo $dfd_rdd_trans_alert . '.<br />';
    mail($current_user->user_email,"Reddcoin Transaction Alert",$dfd_rdd_trans_alert,"From: ".$current_user->user_email."\n");
    
    //var_dump($tx);
    }
    
    
    // We can also move coins from one user to another:
    if ( $_POST['console_mode'] == 'move_to_user' ) {
    $move_result = $api->move_to_user(trim($_POST['send_internal_from_username']), trim($_POST['send_internal_to_username']), trim($_POST['send_internal_amount']));
    
    // Which should return "Success":
    $dfd_rdd_trans_alert = 'You have sent ' . trim($_POST['send_internal_amount']) . ' RDD to internal username ' . trim($_POST['send_internal_to_username']) . ' from internal username ' .trim($_POST['send_internal_from_username']) . ', the internal move-to-user status is detected as: "' . $move_result . '".';
    
    echo $dfd_rdd_trans_alert . '<br />';
    mail($current_user->user_email,"Reddcoin Transaction Alert",$dfd_rdd_trans_alert,"From: ".$current_user->user_email."\n");
    
    //var_dump($move_result);
    }



}
else {
echo "<div align='center' class='dfd_rdd_alert redbox'>Security keys do not match, console commands cannot be run.</div>" . "<br />";
}
?>
<div align='center' class='dfd_rdd_alert'><a href='admin.php?page=dfd-reddcoin-tips-console'><b>Run another console command</b></a></div>