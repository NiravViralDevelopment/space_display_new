<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

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
define( 'AUTH_KEY',         '-~qqVVE),_RS!=9pun}c*8$>MV(oYU=lP9^a#$>@n__~f_&ci^?kF_mp&i,H)S0*' );
define( 'SECURE_AUTH_KEY',  '8}V~#[>,?Mn-Xa2rH*6qIyS2:4JyimGc?_loNu-#4IaxOx&mlE-2Z[~xXL:lonrk' );
define( 'LOGGED_IN_KEY',    '^p[sF0UbzV-kH_)[{mwzYO6DVIkVpXE|)J5#;FI0z/|erEvBu8IcqmnYaKx+{Zac' );
define( 'NONCE_KEY',        '4ht^:}$hImOt8H5OTSs/gQKun*u0k!mC+F&HpJ,!_X%Mr1OqHq~U7XX>]4BB[uSG' );
define( 'AUTH_SALT',        '?r*[E#=(Vl&Cy*+DT=PVl;co2Wr~NxO6ghU6y4Js{}RnNunNV8zb|D|dzFlidRv1' );
define( 'SECURE_AUTH_SALT', 'Q)0nm!3P1Fvx`CLzGgqBt(bQhE@Q@|I3{p(L-W6u}r7A7{NCqqAB9qS5e|V3SFx$' );
define( 'LOGGED_IN_SALT',   'F.KkKh7Urq*Qk(8NZd)MON8OM=kEg&4b<SX-5{HLEu#j~t>D&>m!t47Q_nnX9uKO' );
define( 'NONCE_SALT',       'wJ5.e:pit3iz~c&~R;,;3RA=),U[i/VuBQk[WrY^T7]SG[q*qz182g&`CJ~C@.Yt' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
