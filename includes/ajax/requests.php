  <?php

  
if ( $_GET['rdd_paid_usd'] ) {
  
require("../functions/main_functions.php");

$data = get_trade_price('cryptsy', 169);

//print_r($data);

$rdd_paid_usd = $_GET['rdd_paid_usd'];  // Amount to be paid in USD

$rdd_in_btc = $data;  // Amount one RDD coin goes for in BTC

$btc_usd = get_btc_usd('coinbase');  // USD Value of one bitcoin

$paid_in_btc = ($rdd_paid_usd / $btc_usd);  // Pay amount in bitcoin

$paid_in_rdd = round(($paid_in_btc / $rdd_in_btc),8);  // Converted amount in coin to be paid

echo $paid_in_rdd;

}



?>