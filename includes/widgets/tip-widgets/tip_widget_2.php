<?php

class dfd_rdd_tip_widget_2 extends WP_Widget {


    var $textdomain;

	function __construct() {
	    $this->textdomain = 'dfdrddtipwidget2';

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
    
	    $this->WP_Widget( 
		'dfdrddtipwidget2', 
		'DFD Reddcoin Tips Widget #2', 
		array( 'classname' => 'dfdrddtipwidget2', 'description' => 'Reddcoin tipping badge widget #2' ),
		array( 'width' => 460, 'height' => 350, 'id_base' => 'dfdrddtipwidget2' )
	    );
	}

	
	
	function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}
	
	
	function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}
	
	
	function widget( $args, $instance ) {
            
            
            
 // Get Reddcoin tipping address
$dfdrdd_settings_options = get_option( 'dfdrdd_settings_plugin_options' );
$rdd_tip_address = trim($dfdrdd_settings_options['reddcoin_tip_address']);
	?>
        
    <style type="text/css">
	
	div#rdd_widget_tip_widget_2 {
		position: relative;
		z-index: 2;
		width: 270px;
		overflow: visible;
	border: 0px dotted blue;
	color: <?=$instance['widget_text_color']?>;
	}
	
	div#rdd_widget_tip_widget_2, div#rdd_widget_tip_widget_2 div, div#rdd_widget_tip_widget_2 a {
	margin: 0px;
	border: 0px;
	padding: 0px;
	font-size: 13px;
	line-height: 15px;
	}
	
	div#rdd_widget_tip_widget_2 img {
	margin: 0px;
	border: 0px;
	padding: 0px;
	}
	}
	
	div#rdd_widget_tip_widget_2 input {
	margin: 0px;
	}


        .coin_container_tip_widget_2 {
            position: relative;
            margin-left: 0px;
            width: 240px;
            height: 53px;
            position: relative;
        }

        .coin_coinbackground_tip_widget_2 {
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

            .coin_coinbackground_tip_widget_2:hover {
                cursor: pointer;
            }

        .coin_accepted_tip_widget_2 {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 232px;
            height: 50px;
            -moz-transition: all 2s ease;
            -webkit-transition: all 2s ease;
            -o-transition: all 2s ease;
            -ms-transition: all 2s ease;
            transition: all 2s ease;
            background-color: #fafafa;
            padding: 13px;
            color: black;
        }
        


        .coin_coin_tip_widget_2 {
            position: absolute;
            height: 32px;
            left: -10px;
            top: 8px;
            width: 32px; 
            z-index: 2;
            -moz-transition: all 2s ease;
            -webkit-transition: all 2s ease;
            -o-transition: all 2s ease;
            -ms-transition: all 2s ease;
            transition: all 2s ease;
        }

        .coin_container_tip_widget_2:hover > .coin_coinbackground_tip_widget_2 > .coin_accepted_tip_widget_2 {
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

        .coin_container_tip_widget_2:hover > .coin_coin_tip_widget_2 {
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
            left: 232px;
        }

        .coin_textarea_tip_widget_2 {
            position: absolute;
            left: -7px;
	    top: 0px;
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

        .coin_container_tip_widget_2:hover > .coin_textarea_tip_widget_2 {
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

        .coin_textarea_tip_widget_2 input {
        }

        .coin_wallet_tip_widget_2 {
            position: absolute;
	    top: 8px;
	    right: 2px;
        }
        
        .response_coins_tip_widget_2 {
            font-weight: normal;
	    margin-left: 9px;
	    margin-right: 9px;
        }
	
	.coin_wrapper0 {
		position: relative;
		font-weight: bold;
		
	}
	.rdd_widget_trade_value_widget_2 {
	font-size: 11px;
	font-weight: normal;
	}
	
	.dfd_calc_items {
	width: 200px;
	font-size: 13px;
	}
	
	.calc_area {
	font-size: 13px;
	}
	

    </style>

<div align='center' id='rdd_widget_tip_widget_2'>
	
<div align='center' class="coin_wrapper0">

    <div align='center' class="coin_container_tip_widget_2">
    <div align='center' class="coin_coin_tip_widget_2">
    <img src="<?php echo plugins_url(); ?>/dfd-reddcoin-tips/assets/images/reddcoin_widget_2.png" width="32" height="32">
    </div>

    <div align='center' class="coin_coinbackground_tip_widget_2">
    <div align='center' class="coin_textarea_tip_widget_2" spellcheck="false">
    <input type="text" value="<?=$rdd_tip_address?>" onclick="this.select();" style='top: 0px; margin: 0px;  margin-top: 6px; margin-bottom: 0px;
            width: 178px;
            height: 20px;
            font-size: 8px;
	    line-height: 10px;
            border: none;
            padding: 0px;
            padding-left: 5px;
            background-color: #e9eaee;
	    font-family: sans-serif;
            color: black;' /><a href="Reddcoin:<?=$rdd_tip_address?>?amount=0&message=reddcoin_tip" id='rdd_pay_link_tip_widget_2' target="_blank"><img src="<?php echo plugins_url(); ?>/dfd-reddcoin-tips/assets/images/wallet--arrow.ico" border="0" class="coin_wallet_tip_widget_2" style='margin: 0px;' title="Click here if you are sending a tip with a wallet on a PC." /></a>
    <div align='center' style='clear: both; height: 1px;'></div><a href='<?php echo plugins_url(); ?>/dfd-reddcoin-tips/assets/images/rdd-tip-address.php' style='color: black; position: relative; font-size: 10px;' target='_blank' title='Click here to scan this tipping address as a QR Code image with a smartphone camera and app, to save and use on your phone.'>Scan QR Code With Your Phone Instead</a>
    </div>
    <div align='center' class="coin_accepted_tip_widget_2" style='padding-top: 15px;'>Reddcoin Tips Accepted</div> 
    </div>
	<?php
	if ( $instance[ 'show_trade_value' ] == 'yes' ) {
	?>
	<div align='center' class='rdd_widget_trade_value_widget_2' style='font-size: 11px;'>Reddcoin Trade Value (Bitcoin): <?=get_trade_price('cryptsy', 169)?></div>
	<?php
	}
	?>
</div>
</div>
	<?php
	if ( $instance[ 'show_trade_value' ] == 'yes' && $instance[ 'show_value_calc' ] != 'yes' ) { // Needs this spacing here for athetics
	?>
    <br clear='all' />
	<?php
	}
	?>
	
	<?php
	if ( $instance[ 'show_value_calc' ] == 'yes' ) {
	?>
    
    <br clear='all' />
    
	 <div style='display: none;'>
	 <form id='usd_to_rdd_tip_widget_2'>
         </div>
	
    <div align="center" class='calc_area'>
	
        US Dollar Amount: <br /><input class='dfd_calc_items' type='text' size='20' maxlength='10' id='rdd_paid_usd_tip_widget_2' value='' /> <div style='height: 7px;'></div>
        Reddcoin Equivalent: <br /><input class='dfd_calc_items' type='text' id='paid_in_rdd_tip_widget_2' size='20' value='0.00000000' disabled /> <div style='height: 7px;'></div>
	
        <input class='dfd_calc_items' style='width: auto;' type='button' value='Calculate Reddcoin Tip' onclick='update_conversion("rdd_paid_usd", document.getElementById("usd_to_rdd_tip_widget_2"), document.getElementById("rdd_paid_usd_tip_widget_2").value, document.getElementById("rdd_pay_link_tip_widget_2"), document.getElementById("paid_in_rdd_tip_widget_2"), "tip_widget_2"); ' /> <div style='height: 7px;'></div>
     
        <div id='request_status_tip_widget_2' class='response_coins_tip_widget_2' style=' 
            font-weight: normal;
	    margin-left: 9px;
	    margin-right: 9px;'>Convert USD amount to Reddcoin tip amount above.</div>
     
	</div>
    
	 <div style='display: none;'>
         </form>
	 </div>
	
	<?php
	}
	?>
	
</div>      <!-- #rdd_widget_tip_widget_2 END -->
    <br clear='all' />
        
        <?php
	}

	function update( $new_instance, $old_instance ) {
		
	$instance = array();
	$instance['show_trade_value'] = ( ! empty( $new_instance['show_trade_value'] ) ) ? strip_tags( $new_instance['show_trade_value'] ) : '';
	$instance['show_value_calc'] = ( ! empty( $new_instance['show_value_calc'] ) ) ? strip_tags( $new_instance['show_value_calc'] ) : '';
	$instance['widget_text_color'] = ( ! empty( $new_instance['widget_text_color'] ) ) ? strip_tags( $new_instance['widget_text_color'] ) : '';
	return $instance;

	}

	function form( $instance ) {
		
	if ( isset( $instance[ 'show_trade_value' ] ) ) {
	    $show_trade_value = $instance[ 'show_trade_value' ];
	}
	else {
	    $show_trade_value = __( 'no', 'wpb_widget_domain' );
	}
	
	
	if ( isset( $instance[ 'show_value_calc' ] ) ) {
	    $show_value_calc = $instance[ 'show_value_calc' ];
	}
	else {
	    $show_value_calc = __( 'no', 'wpb_widget_domain' );
	}
	
	
	if ( isset( $instance[ 'widget_text_color' ] ) ) {
	    $widget_text_color = $instance[ 'widget_text_color' ];
	}
	else {
	    $widget_text_color = __( '#808080', 'wpb_widget_domain' );
	}
	
	?>
	<script>
        var elems = jQuery('#widgets-right .color-picker, .inactive-sidebar .color-picker');
        var widget_id = 'my-widget-id';
        jQuery(document).ready(function($) {
            elems.wpColorPicker();
        }).ajaxComplete(function(e, xhr, settings) {
            if( settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id) != -1 ) {  
                elems.wpColorPicker();
            }
        });
	</script>
    <p>
    Please report any theme compatibility issues at the <a href='https://wordpress.org/support/plugin/dfd-reddcoin-tips' target='_blank'>support page for DFD Reddcoin Tips</a>, to have the issue resolved for you.
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'show_trade_value' ); ?>"><?php _e( 'Show Trade Value:' ); ?></label> 
    <select class="widefat" id="<?php echo $this->get_field_id( 'show_trade_value' ); ?>" name="<?php echo $this->get_field_name( 'show_trade_value' ); ?>">
    <option value="no" <?php echo ( esc_attr( $show_trade_value ) =='no' ? ' selected' : '' ); ?>> No </option>
    <option value="yes" <?php echo ( esc_attr( $show_trade_value ) =='yes' ? ' selected' : '' ); ?>> Yes </option>
    </select>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'show_value_calc' ); ?>"><?php _e( 'Show Value Calculator:' ); ?></label> 
    <select class="widefat" id="<?php echo $this->get_field_id( 'show_value_calc' ); ?>" name="<?php echo $this->get_field_name( 'show_value_calc' ); ?>">
    <option value="no" <?php echo ( esc_attr( $show_value_calc ) =='no' ? ' selected' : '' ); ?>> No </option>
    <option value="yes" <?php echo ( esc_attr( $show_value_calc ) =='yes' ? ' selected' : '' ); ?>> Yes </option>
    </select>
    </p>
	<p>
            <label for="<?php echo $this->get_field_id( 'widget_text_color' ); ?>"><?php _e( 'Widget Text Color: ', $this->textdomain ); ?></label>
            <input class="color-picker" type="text" id="<?php echo $this->get_field_id( 'widget_text_color' ); ?>" name="<?php echo $this->get_field_name( 'widget_text_color' ); ?>" value="<?php echo esc_attr( $instance['widget_text_color'] ); ?>" />                            
        </p>
    <?php
    
	}
	
}

function dfd_rdd_register_tip_widget_2() {
	register_widget( 'dfd_rdd_tip_widget_2' );
}




?>