<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpestudo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'maS<$3dnE3EI~2XPn{Sl1RXO_Q{{6q26} }^E>Kq8{77v!?9bg,@f,1n~T]7CZ^d' );
define( 'SECURE_AUTH_KEY',  'Y$+Y!nD;,{%!(${|$%n?gxAUR?qzSyAlO3[&]DOftJACyIJN51L_jQQA]}7sLf#D' );
define( 'LOGGED_IN_KEY',    '36&WErj^fDbtV?Xu;]/5_|`-QY$?Q+lM7b%goEKi.2g3p5F@C>Y|}g#JRO-dv7U*' );
define( 'NONCE_KEY',        'Dm@8nD|Y*&fr2&rBxC i=Da|eSt>yTEB)YV+[~N2*ug6)VlmCy|R$S&89lu&|];/' );
define( 'AUTH_SALT',        'jb8Ud90;H=%e(`x%)1MJaZ>Am1U{aH(f^nkD4|yBxDPYV| htouMy,!$X%TH$x~k' );
define( 'SECURE_AUTH_SALT', 'Cn`}lD4^;!V)-D/B?ee|).xYzEyUQy7j#y:9kx9wSE1XU>mZ27^L){J7(ssxWHJn' );
define( 'LOGGED_IN_SALT',   'fsVu&bQl}`^s!a FO Bw7i7R-rJ]BueJm52QgzJUTW%mvgZQUo:rUSb(QwRN!&Ws' );
define( 'NONCE_SALT',       'LQ|`y1x`<D>LsVt]D<J94XBJL3<W=Mg^r1y}AE|}:Db)Q03({Xl{uDFUaXt8ZrZe' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
