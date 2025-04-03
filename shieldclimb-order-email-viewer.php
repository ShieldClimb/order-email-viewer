<?php

/**
 * Plugin Name: ShieldClimb – Order Email Viewer for WooCommerce
 * Plugin URI: https://shieldclimb.com/free-woocommerce-plugins/order-email-viewer/
 * Description: Order Email Viewer for WooCommerce displays customer emails on the admin order page, saving time and boosting efficiency. Install now!
 * Version: 1.0.1
 * Requires Plugins: woocommerce
 * Requires at least: 5.8
 * Tested up to: 6.7
 * WC requires at least: 5.8
 * WC tested up to: 9.7.1
 * Requires PHP: 7.2
 * Author: shieldclimb.com
 * Author URI: https://shieldclimb.com/about-us/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_filter( 'manage_edit-shop_order_columns', 'shieldclimb_order_email_viewer_header' );

function shieldclimb_order_email_viewer_header( $columns ) {
    $columns['customer_email'] = __( 'Customer Email', 'shieldclimb-order-email-viewer' );
    return $columns;
}

add_action( 'manage_shop_order_posts_custom_column', 'shieldclimb_order_email_viewer_content', 10, 2 );

function shieldclimb_order_email_viewer_content( $column, $post_id ) {
    if ( 'customer_email' === $column ) {
        $order = wc_get_order( $post_id );
        $customer_email = $order->get_billing_email();
        echo esc_html( $customer_email );
    }
}

?>