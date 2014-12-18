<?php



function dfd_reddcoin_settings_general_init(){
 register_setting( 'dfdrdd_settings_general', 'dfdrdd_settings_plugin_options');
}

function dfd_reddcoin_settings_api_init(){
 register_setting( 'dfdrdd_settings_api', 'dfdrdd_settings_plugin_options_api_get');
 register_setting( 'dfdrdd_settings_api', 'dfdrdd_settings_plugin_options_api_post');
}

function dfd_reddcoin_console_options_init(){
 register_setting( 'dfdrdd_console_options', 'dfdrdd_console_plugin_options');
}


// Add scripts to wp_head()
function render_html_head_script() {
	
 // Get Reddcoin tipping address
$dfdrdd_settings_options = get_option( 'dfdrdd_settings_plugin_options' );
$rdd_tip_address = trim($dfdrdd_settings_options['reddcoin_tip_address']);

 echo "\n".'<meta name="reddcoin:address" content="'.$rdd_tip_address.'">'."\n";
 
	// Checking for Jquery toogle
       
       if ( isset($dfdrdd_settings_options['enable_jquery']) && $dfdrdd_settings_options['enable_jquery'] == 'yes' ) {

	echo "\n".'<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>'."\n";
	
	}
	
echo "\n".'<script>
var dfdrddtips_plugin_base = "'.$_SESSION['dfdrddtips_url'].'";
</script>'."\n";
echo "\n".'<script src="'.$_SESSION['dfdrddtips_url'].'/assets/js/ajax.requests.js"></script>'."\n";

}

function parse_unix_timestamp($time_string) {

    $parse_1 = $time_string;
    $parse_1 = strstr($parse_1, "(");
    $parse_1 = strrev($parse_1); 
    $parse_1 = strstr($parse_1, "+");
    $parse_1 = strrev($parse_1); 
    $parse_1 = substr_replace($parse_1, '', 0, 1);
    $parse_1 = substr_replace($parse_1, '', -4, 4);
    
    $timestamp = trim($parse_1);
    
    return gmdate("Y-m-d \ H:i:s", $timestamp);

}



function add_settings_page() {
add_options_page( __( 'DFD Reddcoin Tips Settings', 'dfd-reddcoin-tips' ) , __( 'DFD Reddcoin Tips Settings', 'dfd-reddcoin-tips' ) , 'manage_options' , 'dfd-reddcoin-tips-settings' ,  'settings_page' );
}

function settings_page() {
require(plugin_dir_path( __FILE__ ).'../pages/settings/settings.php');
}


function add_console_page() {

	//create new top-level menu
	add_menu_page('DFD Reddcoin Tips Console', 'DFD Reddcoin Tips Console', 'administrator', 'dfd-reddcoin-tips-console', 'dfdrddtips_console_page',plugins_url('../../assets/images/icon.png', __FILE__));

}


function dfdrddtips_console_page() {
require(plugin_dir_path( __FILE__ ).'../pages/console/console.php');
}


function data_encryption($plain_text_key, $data_value, $mode) {
	

# We're generating a 32 bit key to use 256 bit encryption
$key = pack('H*', hash('sha256', $plain_text_key));

# show key size use either 16, 24 or 32 byte keys for AES-128, 192
# and 256 respectively
//$key_size =  strlen($key);
//echo "Key size: " . $key_size . "<p>\n";

$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	
	
	if ( $mode == 'encrypt' && $data_value ) {
		
	# --- ENCRYPTION ---
    
	$plaintext = $data_value;
    
	# create a random IV to use with CBC encoding
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	
	# creates a cipher text compatible with AES (Rijndael block size = 128)
	# to keep the text confidential 
	# only suitable for encoded input that never ends with value 00h
	# (because of default zero padding)
	$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key,
				     $plaintext, MCRYPT_MODE_CBC, $iv);
    
	# prepend the IV for it to be available for decryption
	$ciphertext = $iv . $ciphertext;
	
	# encode the resulting cipher text so it can be represented by a string
	$ciphertext_base64 = base64_encode($ciphertext);
    
	//echo  $ciphertext_base64 . "<p>\n";
	
	return $ciphertext_base64;
    
	# === WARNING ===
    
	# Resulting cipher text has no integrity or authenticity added
	# and is not protected against padding oracle attacks.
	
	}
	
	elseif ( $mode == 'decrypt' && $data_value ) {
		
	# --- DECRYPTION ---
	
	$ciphertext_dec = base64_decode($data_value);
	
	# retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
	$iv_dec = substr($ciphertext_dec, 0, $iv_size);
	
	# retrieves the cipher text (everything except the $iv_size in the front)
	$ciphertext_dec = substr($ciphertext_dec, $iv_size);
    
	# may remove 00h valued characters from end of plain text
	$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key,
					$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
	
	//echo  $plaintext_dec . "<p>\n";
	
	return $plaintext_dec;
	
	}
	else {
	return NULL;
	}
    
    
}

function update_field_api( $new_value, $old_value ) {
	
	$new_value = data_encryption(trim($_POST['mypasswd']), $new_value, 'encrypt');
	
	return $new_value;
}

function encrypt_api() {
	add_filter( 'pre_update_option_dfdrdd_settings_plugin_options_api_get', 'update_field_api', 10, 2 );
	add_filter( 'pre_update_option_dfdrdd_settings_plugin_options_api_post', 'update_field_api', 10, 2 );
}


function get_btc_usd($btc_in_usd) {

  
    if ( strtolower($btc_in_usd) == 'coinbase' ) {
  
    
  
    $json_string = 'https://coinbase.com/api/v1/prices/spot_rate?currency=USD';
    
    $jsondata = file_get_contents($json_string);
    
    $data = json_decode($jsondata, TRUE);
    
    
    return $data['amount'];
  
    }
  

  

}

function get_trade_price($market, $market_id) {

$cryptsy_server = 'pubapi1.cryptsy.com';  // https://www.cryptsy.com/pages/publicapi

  if ( strtolower($market) == 'cryptsy' ) {
  
  $json_string = 'http://'.$cryptsy_server.'/api.php?method=singlemarketdata&marketid='.$market_id;
  
  $jsondata = file_get_contents($json_string);
  
  $data = json_decode($jsondata, TRUE);
  
  //print_r($data);
  
	  foreach ($data as $markets) {
	   if (is_array($markets)) {
	    foreach($markets as $market) {
	      foreach($market as $attributes) {
  
	  return $attributes["lasttradeprice"];
  
	  /*
		foreach($attributes["recenttrades"] as $recenttrade) { 
		  //echo "<pre>";
		  //print_r($recenttrade);
		  //echo "</pre>";
		  echo "VALUES('{quantity: " . $recenttrade['quantity'] ."}', 'price: {" . $recenttrade['price'] . "}')";
		}
  
	  */
  
	      }
	    }
	   }
	  }
  
  
  }


}



?>