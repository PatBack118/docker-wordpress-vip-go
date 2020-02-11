<?php
/**
 * WordPress local config
 *
 * @package docker-wordpress-vip-go
 */

ini_set( 'display_errors', 1 );
set_error_handler(function() {
	error_log(print_r(debug_backtrace(), true));
	return true;
}, E_USER_NOTICE);
defined( 'WP_DEBUG' ) or define( 'WP_DEBUG', true );
defined( 'WP_DEBUG_LOG' ) or define( 'WP_DEBUG_LOG', true );
// Conditionally turn on HTTPS since we're behind nginx-proxy.
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) { // Input var ok.
	$_SERVER['HTTPS'] = 'on';
}

if ( file_exists( __DIR__ . '/wp-content/vip-config/vip-config.php' ) ) {
    require_once( __DIR__ . '/wp-content/vip-config/vip-config.php' );
}

define( 'UPLOADS', 'wp-content/images' );

// Indicate VIP Go environment.
define( 'VIP_GO_ENV', 'local' );

// Disable automatic updates.
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', true );

// This provides the host and port of the development Memcached server. The host
// should match the container name in `docker-compose.memcached.yml`. If you
// aren't using Memcached, it will simply be ignored.

// VIP GO (old memcache) settings
$memcached_servers = array(
	'memcached:11211',
);

// Newer memcached (with a 'd') settings
// $memcached_servers = array(
// 	array(
// 		'memcached',
// 		11211,
// 	),
// );

// Put project-specific config below this line.
