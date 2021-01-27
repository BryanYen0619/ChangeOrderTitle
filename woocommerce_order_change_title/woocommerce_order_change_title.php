<?php
/*
	Plugin Name: Woocommerce Order & Order Detail Change Title
	Plugin URI: http://www.livebricks.com
	Description: Plugin for Woocommerce Change title with Order View & Order Detail View
	Author: Bryan Yen
	Version: 1.1
	Author URI: http://www.livebricks.com
*/

// Rename order list title
function rename_order_title( $translated_text, $untranslated_text, $domain ) {
   	global $wp;
    $request = explode( '/', $wp->request );

    // If in My account dashboard page
    if( (end($request) == 'my-account' && is_account_page() ) ){    
		if( $translated_text === 'Recent Request') {
	       $translated_text = __( 'Order','woocommerce' );
	    }
	}
    return $translated_text;
}

add_filter('gettext', 'rename_order_title', 20, 3);

// Rename order detail list title
function rename_order_detail_title( $translated_text, $untranslated_text, $domain ) {
    // If in Order Detail dashboard page
    global $wp;
    $request = explode( '/', $wp->request );

    // If in My account dashboard page
    if(array_search( 'view-order',$request)){       
		if( $translated_text === 'Request Details') {
	       $translated_text = __( 'Order Detail','woocommerce' );
	    }
	}
    return $translated_text;
}

add_filter('gettext', 'rename_order_detail_title', 20, 3);

?>