<?php
/**
 * Plugin Name: Atlas Content Modeler - Customer Logs
 * Plugin URI: https://rfmeier.net/
 * Description: Log WooCommerce customer orders using the Atlas Content Modeler php api.
 * Author: Ryan Meier
 * Author URI: https://rfmeier.net/
 * Text Domain: acm-customer-logs
 * Domain Path: /languages
 * Version: 0.1.1
 * Requires at least: 5.9
 * Requires PHP: 7.3
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package ACM_Customer_Logs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ACM_CUSTOMER_LOGS_FORM_VERSION', '0.1.1' );
define( 'ACM_CUSTOMER_LOGS_FORM_FILE', __FILE__ );
define( 'ACM_CUSTOMER_LOGS_FORM_DIR', dirname( ACM_CUSTOMER_LOGS_FORM_FILE ) );

require ACM_CUSTOMER_LOGS_FORM_DIR . '/includes/rest-callbacks.php';
