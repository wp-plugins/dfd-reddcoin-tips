



function update_conversion(coin_conversion, the_form, coin_paid_usd, pay_link, paid_in_coin, status_field) {


                        
var http_request = false;

	// If *POST* occurs in Netscape (disables script in MSIE if not run inside an IF statement!)
	if (http_request.overrideMimeType)
	{ http_request.overrideMimeType('text/xml');
	}

// Create a xmlhttp request...

	// Mozilla, Safari, etc
	if (window.XMLHttpRequest)
	{ http_request = new XMLHttpRequest();
	}
	// MSIE
	else if (window.ActiveXObject)
	{ http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{ alert('Your browser settings don\'t seem to support AJAX,\n or you need to upgrade your browser :(');
	return false;
	}

// Javascript function to call as the xmlhttp request is processed and sent back
http_request.onreadystatechange = function() { alertContents_coins(http_request, coin_conversion, the_form, pay_link, paid_in_coin, status_field); };

// Were're ready to make the xmlhttp request now...

// SEND DATA




http_request.open('GET', dfdrddtips_plugin_base + '/includes/ajax/requests.php?'+coin_conversion+'='+coin_paid_usd, true);
http_request.send(null);

}

//////////////////////////////////////////////////////////////////////////////////////

function alertContents_coins(http_request, coin_conversion, the_form, pay_link, paid_in_coin, status_field) {

/* 
Display "Loading...", and see if the request has been responded to, and that it wasn't a 404/500 etc...
*/
	if (http_request.readyState == 4 && http_request.status == 200) {
	
        var trim_response = http_request.responseText;
        var trimmed_response = trim_response.trim();
	paid_in_coin.value = trimmed_response;
        var link_regex = /amount=(.*)/i;
        pay_link.href = pay_link.href.replace(link_regex, "amount="+trimmed_response+"&message=reddcoin_tip");
	document.getElementById("request_status_"+status_field).innerHTML = "Exchange rate was calculated, and PC wallet tipping link updated.";
	}
	else if (http_request.readyState == 4 && http_request.status != 200) {
	document.getElementById("request_status_"+status_field).innerHTML = "There was a problem with the request. Please Try Again.";
	}
	else {
	document.getElementById("request_status_"+status_field).innerHTML = "Loading, Please Wait...";
	}

}


///////////////////////////////////////////////////////////////////////////////////////
