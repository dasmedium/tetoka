<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tkdb2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '3xtrat3rr3str3fu3rt3');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ee953b1e12e6fada38bf70982509fe3da77c4a55');
define('SECURE_AUTH_KEY',  '565867a20883d1c7e947b30e15e8b5d94ad4a310');
define('LOGGED_IN_KEY',    '4bdbcf01e2bd43da7821f317e3e060a0b752e724');
define('NONCE_KEY',        'f9368c28dca25c5ddb3a8b9d0baed68448438216');
define('AUTH_SALT',        'bb672bd837fff53bba3bad87112d0a2b8a959898');
define('SECURE_AUTH_SALT', 'da82742178da6f6b2d43f96386affddb052910d3');
define('LOGGED_IN_SALT',   'c0b3a8fc227bfe5302a49c7cbcadcc65fbc8b5c2');
define('NONCE_SALT',       '7c4e6a38c5dd1faa735fd3735de685f520c5753f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}


// MEMORY ALLOCATION

define( 'WP_MEMORY_LIMIT', '96M' );

// MYCRED DEFAULT KEY TYPE
//define( 'MYCRED_DEFAULT_TYPE_KEY', 'tetoka_default' );
// MYCRED DEFAULT LABEL (WHITELABEL)
define( 'MYCRED_DEFAULT_LABEL', 'Tetoka' );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

