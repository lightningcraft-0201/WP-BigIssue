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
define('DB_NAME', 'wordpress_2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'm>J/|UxD yPppLxxEa:d|_jV&1G QNjkNdg&Y]6z+*q@i7!8N;FlRf*dW3KbJ&^p');
define('SECURE_AUTH_KEY',  'B^y,[Il-Y TSdzq)FJ_DsH59D19$FI2%u?UG0N+tE9P,p#}?/~zGch4~SDH[5Psc');
define('LOGGED_IN_KEY',    'wf5@`#d4RB7r?9_apVE0-n(rXCg?4js(5P6*&#R 0ggHEae_KCy;[j#5x>>1?BvQ');
define('NONCE_KEY',        '&A5P@3`;u*.BE?0Vo.4u@Chy#,2 ;$tg99~aGNeFD~/W*NRozaV>S$qSo]YhqVR-');
define('AUTH_SALT',        'e`1H4?I |XF+g@FLD.IZ&7PwK:-/5PF9%{$dN:D++|wAWKg|{5[5;|9Mw&$Z=d@v');
define('SECURE_AUTH_SALT', '9<tJexA3?6HmPAeM_^toJ=Q.K`$-b 9N5renp5ls^zUJY6uBg--B1EYI@cuT]Tl ');
define('LOGGED_IN_SALT',   'D~.x{j>CBmOn~d*aJ}8P!^5_7[}_,)Z= $_wp2#B-c5?,-ntf+w?w?2yaY/xH+%7');
define('NONCE_SALT',       '_1t!vu}8PyUV~[u9jyJg+-I/veb%GKRmS:S0Hd^(0k.Qk=*7uu2ybrg*.Hrifu /');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
