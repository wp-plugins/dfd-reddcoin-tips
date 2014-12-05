<?php 

session_start();
$rdd_coin_address = trim($_SESSION[rdd_coin_address]);


    include('../../includes/addons/phpqrcode/qrlib.php'); 
     
    // outputs image directly into browser, as PNG stream 
    QRcode::png($rdd_coin_address, false, 4, 8);  // Litecoin receiving address for customer payments

?>