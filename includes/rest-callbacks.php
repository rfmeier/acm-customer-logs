<?php
/**
 * REST Related callbacks.
 *
 * @since 0.1.0
 * @package ACM_Customer_Logs
 * @subpackage REST
 */

declare(strict_types=1);

use function WPE\AtlasContentModeler\API\insert_model_entry;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'rest_api_init', 'acm_customer_logs_register_routes' );
/**
 * Callback for WordPress 'rest_api_init' action.
 *
 * Register rest routes.
 *
 * @since 0.1.0
 *
 * @return void
 */
function acm_customer_logs_register_routes(): void {
	\register_rest_route(
		'acm',
		'/customers/',
		array(
			'methods'             => 'POST',
			'callback'            => 'acm_customer_logs_handle_payload',
			'permission_callback' => '__return_true',
		)
	);
}

/**
 * Callback for WordPress register_rest_route() 'callback' parameter.
 *
 * Handle POST acm/customers/ endpoint.
 *
 * @since 0.1.0
 *
 * @param \WP_REST_Request $request The request object.
 *
 * @return array|\WP_Error|\WP_REST_Response
 */
function acm_customer_logs_handle_payload( \WP_REST_Request $request ) {
	$data   = (array) $request->get_json_params();
	$status = $data['status'] ?? '';

	if ( 'processing' !== $status ) {
		return new \WP_REST_Response( null );
	}

	$post_data  = array( 'post_status' => 'publish' );
	$model_data = array(
		'orderId'   => "Order: {$data['id']}",
		'firstName' => $data['billing']['first_name'] ?? '',
		'lastName'  => $data['billing']['last_name'] ?? '',
		'email'     => $data['billing']['email'] ?? '',
		'address'   => "{$data['billing']['address_1']}\n{$data['billing']['city']}, {$data['billing']['state']}\n{$data['billing']['postcode']}\n{$data['billing']['country']}",
		'total'     => (float) $data['total'] ?? 0,
	);

	insert_model_entry( 'customer', $model_data, $post_data );

	return new \WP_REST_Response( null );
}
