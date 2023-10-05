<?php
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
define( 'DB_NAME', 'nolok2' );

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
define( 'AUTH_KEY',         '/2Ca=Q5YZu{bekoPp>w9I$8L*}N(j[6LH3z_YTjffz%A,hVfg3 u_*Nv]F_MxEBE' );
define( 'SECURE_AUTH_KEY',  ' (lGLu=b_nD.>^X0f$z#QdV*u#R1A$Y]7%,z`WGQc?<N0fQIDw#db~b0X7k@5//>' );
define( 'LOGGED_IN_KEY',    'A!dPSfjwMb5X4GU=+(H?u%bKsnvY~8+<u@^f.[WCw/nUlI~cXkQ{W&~xr|{SD3mH' );
define( 'NONCE_KEY',        'hd7h`vF1)`U_AEO-tWJRjx9hXd)k^-=kpxYE{m>ycI 9x&>C,`>c;(mh7!5,faH?' );
define( 'AUTH_SALT',        'Zn2@6ai*}$e$Fh32_=e:xPGiV+?2%Rb8)>F#Hevlug7r%1CeH.x7]cRsi*LR9NP2' );
define( 'SECURE_AUTH_SALT', 'Ho-_uk!T}c6eC+-D#`kg~C1Us^1@ExIgD %1?hTno6y?}$Agm~l+0$4]&zzXsgG ' );
define( 'LOGGED_IN_SALT',   'D:YP4~2ub@!$!zkc>l-0DpZQ> vD`e{bN6qjsU<XCP8?mqb}XIXAi*]KCm,4h>h#' );
define( 'NONCE_SALT',       'JmRfNhdq!-NCM]_ p9i0:]Pagkdwc+dB>># z@h1~[PL{M*A,{{`o-J;C{dblWf0' );

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
