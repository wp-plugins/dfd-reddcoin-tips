
<style type="text/css">
    
.dfd_rdd_text {

width: 450px;
font-size: 15px;
font-weight: bold;

}

.dfd_rdd_console {
border: 2px solid black;
padding: 15px;
margin: 10px;
background: white;
}

.dfd_rdd_alert {

display: block;
font-weight: bold;
color: red;
margin: 10px;

}
.dfd_rdd_alert_green {

display: block;
font-weight: bold;
color: green;
margin: 10px;

}


.redbox {

border: 2px solid red;
padding: 8px;

}

.greenbox {

border: 2px solid green;
padding: 8px;

}

.console_toggles {

display: block;
margin-left: 7px;
margin-right: 7px;
border: 2px solid black;
padding: 7px;

}

.console_titles {
font-weight: bold;
}

.dfd_rdd_amount {
width: 300px;
}

.dfd_rdd_address {
width: 450px;
}

.dfd_rdd_username {
width: 350px;
}
</style>

<script type='text/javascript'>

function toggle_console(field_value) {

document.getElementById('id_create_new_user').style.display = 'none';
document.getElementById('id_get_user_list').style.display = 'none';
document.getElementById('id_get_user_info').style.display = 'none';
document.getElementById('id_send_to_address').style.display = 'none';
document.getElementById('id_move_to_user').style.display = 'none';


document.getElementById('id_'+field_value+'').style.display = 'block';

}

</script>

<div class="wrap" id="dfd_reddcoin_tips_console">
<p><?php screen_icon(); echo "<h2>". __( 'DFD Reddcoin Tips Console', 'console_dfd_rddplugin' ) . "</h2>"; ?></p>
<?php if ( isset($_REQUEST['settings-updated']) ) : ?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong><?php _e( 'Your console has been updated...', 'console_dfd_rddplugin' ); ?></strong></p></div>
<br clear='all' />
<?php endif; ?> 

<form method="post" action="">
<?php

 // Checking for API key and tipping address
$dfdrdd_settings_options = get_option( 'dfdrdd_settings_plugin_options' );

$dfdrdd_settings_options_api_get_encrypted = get_option( 'dfdrdd_settings_plugin_options_api_get' );
$dfdrdd_settings_options_api_post_encrypted = get_option( 'dfdrdd_settings_plugin_options_api_post' );



if ( !$dfdrdd_settings_options_api_post_encrypted || !$dfdrdd_settings_options_api_get_encrypted ) {
?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong>Please enter your ReddAPI keys on the <a href='options-general.php?page=dfd-reddcoin-tips-settings'>settings page</a>, or you cannot connect to your ReddAPI account.</strong></p></div>
<br clear='all' />
<?php }
if ( !trim($dfdrdd_settings_options['reddcoin_tip_address']) ) {
?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong>Please enter your Widget Reddcoin Tipping Address on the <a href='options-general.php?page=dfd-reddcoin-tips-settings'>settings page</a>.</strong></p></div>
<br clear='all' />
<?php } ?> 



<a href='admin.php?page=dfd-reddcoin-tips-console'><b style='font-size: 17px;'>DFD Reddcoin Tips Managment Console</b></a>




<div align='center' style='margin: 10px;'>
<?php
global $current_user;
get_currentuserinfo();

      echo 'Username: ' . $current_user->user_login . " &nbsp;&nbsp;|&nbsp;&nbsp;\n";
      echo 'User email: ' . $current_user->user_email . " &nbsp;&nbsp;|&nbsp;&nbsp;\n";
      echo 'User first name: ' . $current_user->user_firstname . " &nbsp;&nbsp;|&nbsp;&nbsp;\n";
      echo 'User last name: ' . $current_user->user_lastname . " &nbsp;&nbsp;|&nbsp;&nbsp;\n";
      echo 'User display name: ' . $current_user->display_name . " &nbsp;&nbsp;|&nbsp;&nbsp;\n";
      echo 'User ID: ' . $current_user->ID . "\n";
      
//echo 'Password: ' .$_POST['mypasswd'] . "\n";
?>
</div>
<?php
if ( isset($_POST['mypasswd']) && $current_user && wp_check_password( trim($_POST['mypasswd']), $current_user->data->user_pass, $current_user->ID) ) {
echo "<div align='center' class='dfd_rdd_alert_green greenbox'>Your Wordpress password is correct, running requested console command(s) now...</div>" . "\n";
$run_commands = 1;
}
elseif ( !isset($_POST['mypasswd']) && isset($_POST['submit_console_command']) ) {
echo "<div align='center' class='dfd_rdd_alert redbox'>Your Wordpress password is required to run <i>all</i> console commands.</div>" . "\n";
$run_commands = NULL;
}
elseif ( !isset($_POST['mypasswd']) ) {
echo "<div align='center' class='dfd_rdd_alert'>Your Wordpress password is required to run <i>all</i> console commands.</div>" . "\n";
$run_commands = NULL;
}
else {
echo "<div align='center' class='dfd_rdd_alert redbox'>Password is not correct, all console command(s) require Wordpress account password verification.</div>" . "\n";
$run_commands = NULL;
}
?>

<div class='dfd_rdd_console'>
<?php
if ( $run_commands != 1 ) {
require(plugin_dir_path( __FILE__ )."console_submissions.php");
}
if ( $run_commands == 1 ) {
require(plugin_dir_path( __FILE__ )."reddapi_connect.php");
}
?>
</div>

<input type='hidden' name='submit_console_command' value='<?php echo $_SESSION['sec_key']; ?>' />

<p><span style='font-weight: bold; color: red;'>Wordpress password is required to continue:</span> <input type='password' name='mypasswd' /> &nbsp;&nbsp; 
<input type="submit" value="<?php _e( 'Run Chosen Console Command(s)', 'console_dfd_rddplugin' ); ?>" onclick='return confirm(" Please confirm you wish to proceed with the chosen console commands. \n Please note some types of commands cannot be undone (such as sending coins to an external address), so it is best to verify the data is correct before proceeding.");' />
</p>
</form>
</div>