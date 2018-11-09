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
define('DB_NAME', 'startwordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '04(Y+{&}]@h]?~XL+*JprW(R)=mr>A#BS|kq#etLjG>Yj?]qc>PxOz;bQ HRQm*3');
define('SECURE_AUTH_KEY',  'g uS,kNab[|_PV+g!G+|Y+1Ax(([7_^+Mwp0oR.u1sr$s#Dvoi?!oW!wCt+&v$6T'');
define('LOGGED_IN_KEY',    'yWG1#m8JbLKL4L999GWQ+=]|s=$su(MO3J,[jFDt0|U*7w(e}.IYQcTVuqHQzQ&)');
define('NONCE_KEY',        ']yB*YKg_=CG%=io-8ij~jLnlJb&+$Zn>A?g4rqD}|O, blM0NAsnAh.7 G#2C1(F');
define('AUTH_SALT',        '=P,I+*{v)mkd>xwps`4:CYSWNG?)8iM!tk;+kl|w]Y#IE!QjF6yG|my7/]8&D{O|');
define('SECURE_AUTH_SALT', 'g_TqpT8L,42+[i#XW44!R-kql0eTkH1 Z^9bD+}q!m_ /G)Or&SzPUoXshl&G 9K');
define('LOGGED_IN_SALT',   'u{U(@LCP9+_P[YtJ]&ljNA(LC2<!+pBxFCTDokxnHqAtl~vDU>j>|-/VL/nk*xQK');
define('NONCE_SALT',       '+oMKxjrgE$<` ZHV@L2E&+/1Z009TfZLB3kv0-Y:+$/RWf.+iUS{e}U#tY[gRYSt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xyz77_';

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
