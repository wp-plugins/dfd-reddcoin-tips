

<style type="text/css">
    
.dfd_rdd_text {

width: 450px;
font-size: 15px;
font-weight: bold;

}

.api_key {

width: 550px;
font-size: 12px;
font-weight: bold;

}

.dfd_rdd_alert {

display: block;
font-weight: bold;
color: red;
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
</style>

<div class="wrap">
<p><?php screen_icon(); echo "<h2>". __( 'DFD Reddcoin Tips Settings', 'settings_dfd_rddplugin' ) . "</h2>"; ?></p>

<form method="post" action="options.php">
<?php settings_fields( 'dfdrdd_settings_api' ); ?>  

<?php
$dfdrdd_settings_options_api_get = get_option( 'dfdrdd_settings_plugin_options_api_get' );
$dfdrdd_settings_options_api_post = get_option( 'dfdrdd_settings_plugin_options_api_post' ); 

echo "<div align='center' class='dfd_rdd_alert redbox'>To maintain a high level of security, your current Wordpress password is required to store API keys with secure 265 bit encryption on this settings page. If you ever change your Wordpress password in the future, or you enter the wrong password while storing your API keys, you will need to re-enter a set of API keys with the correct Wordpress password to connect to your ReddAPI account.</div>" . "\n";

if ( !trim($dfdrdd_settings_options_api_post) || !trim($dfdrdd_settings_options_api_get) ) {
?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong>Please enter your ReddAPI keys.</strong></p></div>
<br clear='all' />
<?php }
else {
?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong>Your API settings are completed, visit the <a href='admin.php?page=dfd-reddcoin-tips-console'>console page</a> to view / transfer Reddcoin balances.</strong></p></div>
<br clear='all' />
<?php } ?>


<b style='font-size: 17px;'>DFD Reddcoin Tips API configuration settings</b>

<p> &nbsp; </p>

<p>
	<b>Enter New ReddAPI GET Key (from your account at <a href='http://www.reddapi.com' target='_blank'>www.reddapi.com</a>. Must be type=GET)</b><br />
	<input id="dfdrdd_settings_plugin_options_api_get" name="dfdrdd_settings_plugin_options_api_get" value="" class='dfd_rdd_text api_key' />

</p>


<p>
	<b>Enter New ReddAPI POST Key (from your account at <a href='http://www.reddapi.com' target='_blank'>www.reddapi.com</a>. Must be type=POST)</b><br />
	<input id="dfdrdd_settings_plugin_options_api_post" name="dfdrdd_settings_plugin_options_api_post" value="" class='dfd_rdd_text api_key' />

</p>


<p><span style='font-weight: bold; color: red;'>Your Wordpress password is required to securely encrypt your new API keys:</span> <input id="mypasswd" name="mypasswd" type='password' value="" /> 
</p>




<p>
<input type="submit" value="<?php _e( 'Update API Settings', 'settings_dfd_rddplugin' ); ?>" />
</p>
</form>



<form method="post" action="options.php">
<?php settings_fields( 'dfdrdd_settings_general' ); ?>  

<?php
$dfdrdd_settings_options = get_option( 'dfdrdd_settings_plugin_options' );
?> 
<?php

if ( !trim($dfdrdd_settings_options['reddcoin_tip_address']) ) {
?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong>Please enter your Widget Reddcoin Tipping Address.</strong></p></div>
<br clear='all' />
<?php }
else {
?>
<div>
<br clear='all' />
<p style='padding: 8px; margin: 20px; background: #FFFBCC; font-size: 20px; border: 1px solid red; color: red;'><strong>Your general settings are completed.</strong></p></div>
<br clear='all' />
<?php } ?>


<b style='font-size: 17px;'>DFD Reddcoin Tips general configuration settings</b>

<p> &nbsp; </p>



<p>
	<b>Enable Jquery? (needed for some payment widgets, <i>-if- jquery is not already enabled on your site</i>...this being enabled may conflict if already running another jquery instance on your site)</b><br />
	<select id="dfdrdd_settings_plugin_options[enable_jquery]" name="dfdrdd_settings_plugin_options[enable_jquery]">
	<option value='no' <?php echo ( $dfdrdd_settings_options['enable_jquery'] == 'no' ? ' selected' : '' ); ?>> No </option>
	<option value='yes' <?php echo ( $dfdrdd_settings_options['enable_jquery'] == 'yes' ? ' selected' : '' ); ?>> Yes </option>
	</select>

</p>



<p>
	<b>Widget Reddcoin Tipping Address (Reddcoin payment recieving address you want tips sent to, shown on widgets on the website)</b><br />
	<input id="dfdrdd_settings_plugin_options[reddcoin_tip_address]" type="text" name="dfdrdd_settings_plugin_options[reddcoin_tip_address]" value="<?php esc_attr_e( $dfdrdd_settings_options['reddcoin_tip_address'] ); ?>" class='dfd_rdd_text' />

</p>





<p>
<input type="submit" value="<?php _e( 'Update General Settings', 'settings_dfd_rddplugin' ); ?>" />
</p>
</form>


</div>

