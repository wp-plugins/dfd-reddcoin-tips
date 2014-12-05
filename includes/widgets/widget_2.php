<?php

class dfd_rdd_widget_2 extends WP_Widget {

	function dfd_rdd_widget_2() {
		// Instantiate the parent object
		parent::__construct( false, 'DFD Reddcoin Tips Widget #2' );
	}

	function widget( $args, $instance ) {
            
            
            
 // Get Reddcoin tipping address
$dfdrdd_settings_options = get_option( 'dfdrdd_settings_plugin_options' );
$rdd_tip_address = trim($dfdrdd_settings_options['reddcoin_tip_address']);
	?>
        
    <style type="text/css">

        .coin_container {
            position: relative;
            margin-left: 17px;
            width: 240px;
            height: 53px;
            position: relative;
        }

        .coin_coinbackground {
            background-color: #fafafa;
            border: 1px solid #e9eaee;
            width: 230px;
            height: 45px;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: bold;
            color: #3a3a3a;
            position: relative;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            overflow: hidden;
        }

            .coin_coinbackground:hover {
                cursor: pointer;
            }

        .coin_accepted {
            position: absolute;
            left: 16px;
            top: 4px;
            width: 245px;
            height: 50px;
            -moz-transition: all 2s ease;
            -webkit-transition: all 2s ease;
            -o-transition: all 2s ease;
            -ms-transition: all 2s ease;
            transition: all 2s ease;
            background-color: #fafafa;
            padding: 13px 29px;
            color: black;
        }
        


        .coin_coin2 {
            position: absolute;
            height: 32px;
            left: -18px;
            top: 8px;
            width: 32px; 
            z-index: 2;
        }

        .coin_container:hover > .coin_coinbackground > .coin_accepted {
            -moz-transition: all 2s ease;
            -webkit-transition: all 2s ease;
            -o-transition: all 2s ease;
            -ms-transition: all 2s ease;
            transition: all 2s ease;
            opacity: 1;
            -webkit-transform: translateX(0px);
            -moz-transform: translateX(0);
            -o-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
            left: 280px;
        }

        .coin_container:hover > .coin_coin {
            -moz-transition: all 2s ease;
            -webkit-transition: all 2s ease;
            -o-transition: all 2s ease;
            -ms-transition: all 2s ease;
            transition: all 2s ease;
            -moz-transform: rotate(690deg);
            -webkit-transform: rotate(690deg);
            -o-transform: rotate(670deg);
            -ms-transform: rotate(670deg);
            transform: rotate(670deg);
            left: 270px;
        }

        .coin_textarea {
            position: absolute;
            left: 3px;
            top: 2px;
            width: 225px;
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -o-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
            padding: 4px;
            background-color: #fafafa;
            border: none;
            font-family: 'Comic Sans MS';
            font-size: 11px;
            font-weight: normal;
            color: #333333;
        }

        .coin_container:hover > .coin_textarea {
            -moz-transition: all 2s ease;
            -webkit-transition: all 2s ease;
            -o-transition: all 2s ease;
            -ms-transition: all 2s ease;
            transition: all 2s ease;
            opacity: 1;
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -o-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
        }

        .coin_textarea input {
            width: 178px;
            font-size: 8px;
            border: none;
            padding: 5px;
            background-color: #e9eaee;
            margin-top: 0px;
            margin-right: 5px;
            color: black;
        }

        .coin_wallet {
            position: relative;
            top: 4px;
        }
        
        
        .response_coins {
            color: #FF424B;
            font-weight: bold;
        }
	
	.coin_wrapper0 {
		position: relative;
		font-weight: bold;
		
	}
	.coin_wrapper0 span {
		position: relative;
		
	}


    </style>

<div align='center' class="coin_wrapper0">
<span>Reddcoin Tips Accepted</span>

    <div class="coin_container">
    <div class="coin_coin2">
    <img src="<?php echo plugins_url(); ?>/dfd-reddcoin-tips/assets/images/reddcoin_widget_2.png" width="32" height="32">
    </div>

    <div class="coin_coinbackground">
    <div class="coin_textarea" spellcheck="false">
    <input type="text" value="<?=$rdd_tip_address?>" onclick="this.select();" /><a href="Reddcoin:<?=$rdd_tip_address?>?amount=0&message=reddcoin_tips_payment" target="_blank"><img src="<?php echo plugins_url(); ?>/dfd-reddcoin-tips/assets/images/wallet--arrow.ico" border="0" class="coin_wallet" title="Click here if you are sending payment with a wallet on a PC." /></a><br /><a href='<?php echo plugins_url(); ?>/dfd-reddcoin-tips/assets/images/rdd-tip-address.php' style='color: black; position: relative; top: -5px; left: -8px; font-size: 10px;' target='_blank' title='Click here to scan this payment address as a QR Code image with a smartphone camera and app, to save and use on your phone.'>Scan QR Code With Your Phone Instead</a> &nbsp;
    </div>
    </div>
</div>
    <br clear='all' />
        
        <?php
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function dfd_rdd_register_widget_2() {
	register_widget( 'dfd_rdd_widget_2' );
}




?>