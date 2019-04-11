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
define('DB_NAME', 'admin_notebookdd');

/** MySQL database username */
define('DB_USER', 'admin_notebookdd');

/** MySQL database password */
define('DB_PASSWORD', 'TkIpkv7iQ3');

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
define('AUTH_KEY',         '8:}S%?4_l7BFVK}B~t3}d-d+c]X,H~]6G9Z}Xt>fz:CP)DU(#8E?:cYdc-bsCPin');
define('SECURE_AUTH_KEY',  '*Nxxv.f|Xp:~sh ?7|#&!05aG5>[#LEvg=t/Hs6lu*;}hd<9;IO,/i]qwHCDGyw/');
define('LOGGED_IN_KEY',    'sxYU-%F-4Ttk%T(5.-$me,DYW}fk Is_+ITy#[kSaZfbtz#+4SO|Z*W3tNH?.+*S');
define('NONCE_KEY',        'f#+LR|sa>c#3G0t3zb^Ha)8xn-o +( Sj2|-6ht6-PL;a79~]3Y`KT1MxvI>Get+');
define('AUTH_SALT',        '-_<jV*7(F3v5M<c+v|:r({%ylc7;53HEQ/Q..;Ey&2iBWHW>s~M)wDBulZhs% fJ');
define('SECURE_AUTH_SALT', 'f5-Pa]>GQrq~rToZUmsI32kgk{WCb0Gowa(R 4F8&+/4%3[$$DBc|tnXgEE:zHEm');
define('LOGGED_IN_SALT',   'EJ~^|*^RhId0Ulz46U>WeLghi+zSNt*@x_#(=E<CI&Z{+O`)Hm 1.:(t ;V.u$I-');
define('NONCE_SALT',       'e+R^9~7@nx2wcZ<ZpS~9i`Om~NB&g+;O)h+<?21[v!-e5D~>;hs,FXoPtF@r+uv4');

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
