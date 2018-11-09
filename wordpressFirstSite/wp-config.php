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
define('AUTH_KEY',         '!wHw*iy;5,pyL#<*_&+Kjdri77f/O&+y&J</GYOQ0-+O&}l2,2!x1eX!K`|;,6OO');
define('SECURE_AUTH_KEY',  '2C=;-s+a+bNKgF<79tw:VisXZ~Lh}5yg>.mFnt}UTY>Q-!|3I]54?UgPI).0IsTZ');
define('LOGGED_IN_KEY',    'MQocB-a.Hf>~d(-,/DevS,q9Hpn:>f*b-JR]2sTWk+k|-&!*qE;QFx(jZna$pag4');
define('NONCE_KEY',        '@lB?OI,F?D5&xU2RmS5AA(Amhu{>#YHfu%}UgYw|r>2iSHJB,n[9W.usXBih#A9R');
define('AUTH_SALT',        ']G^qMDLwiSv[,lW5~e#f0Iw)}[y- kL9Uep#G-Mf%EPKeTjQ!Ylt~-qjuAF(}h`v');
define('SECURE_AUTH_SALT', '_cfyu8&XkVJc70A rObc|zB*pP/-Dw[iQA%iP(!}e)QgwbKb_E+PT_*}{ G`8NBK');
define('LOGGED_IN_SALT',   '=<yoeKaPMW|^;{GgTEtwJT wMNTrGE +&Kk@V<kF!0Sy>vWE|#mTJ]cpgc|H,)`C');
define('NONCE_SALT',       'r:Gi&UDq1brCw3N~VEL$prLj-aRf9t1~]~pE6#{=|]oz-RdaJd%<.3]W`+f{QQtp');

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
