<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'majagrap_wor7');

/** MySQL database username */
define('DB_USER', 'majagrap_wor7');

/** MySQL database password */
define('DB_PASSWORD', 'l0P1SBxC');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'b>^TDQ#*o}9SNSZY931Y 1`ejjur|nLVF#n3_u%n71IGSX]}yXB?[Fo_RC9M(b4w');
define('SECURE_AUTH_KEY',  '-8{nV+x>C[Kh8H%d42NA|+4J(GiLL+pr?N]6Z+2r?B.X0zUywv^WAnmu7gTD5 Z+');
define('LOGGED_IN_KEY',    '>2a[^FtoAn  %,O`_}SKwk8]suPPPzt%)qIx?^D:*ETB7:A!9d=+D.KF3nF5q`fk');
define('NONCE_KEY',        '@!f||0U6ZU*F+O@|i8t UnESZl3CY_wy6:4@k$1p*w7u#o>g,6YFJbfq 0~yWGf!');
define('AUTH_SALT',        '~EHW_+A)()If8;D+<b$]Wj2a< /X^[Q,ytEirx{xD44un-/j-e|3e7+HueZltO8q');
define('SECURE_AUTH_SALT', '#)-S&?}9>]<02pbl_BU1+S%;?wc#(+Uw.7R2BlMA+hi`LCi~kb`<Fc@yKQBCIagA');
define('LOGGED_IN_SALT',   '6a@#&EcRP%!ejq7>~AIXm(^c[?KM)-!yK(#e s j~cL:VN9scT+:2j{v`@4#wccA');
define('NONCE_SALT',       '0|!x@oPhzPN>5k?qZK,#,ve}[Nm7,.`NlrRZuApt~s?<YfV`vQVHEK--!lS=s^_:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vcw_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
