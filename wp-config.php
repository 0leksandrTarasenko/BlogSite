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
define( 'DB_NAME', 'wp_blog_site' );

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
define( 'AUTH_KEY',         '_W6t>W-bRO3i&HB[A&`cy?~lrz}.W=wzV`(6T4~a}jF>Sw==AeFZ3{D}2f}lN|h/' );
define( 'SECURE_AUTH_KEY',  ';*C#XIBwW344*L_UObEUNf{CVt`1xEj YG,JB0<p}~?@/i}4P&G20Ea?$U_LNqbK' );
define( 'LOGGED_IN_KEY',    'z5FLpUD7fell ME<wW?QSV(=N Dd^nKf~ZR 0Cx]cfB;:s{poF:g:)P(8SFoX}K6' );
define( 'NONCE_KEY',        'oCdbkl}HpN[jtd2H1}CEh~*7/D(Ob$0b.Y|XTqme`p2!`d!6jw>I|BF6z$Cm:q7<' );
define( 'AUTH_SALT',        '^64F)8`6WtH}o@8.$mG}:1M[*lqwp4:AFcLk+50-oPSB8pE-lJW u73{@[^(sJ$h' );
define( 'SECURE_AUTH_SALT', ' 2>WM;_a3h@<+;8HzQp*{uYrtk$5j._1ZA[iUOpT=jo.F5o+.Ye^{$uCiF:G^E8v' );
define( 'LOGGED_IN_SALT',   '9NEm]~:Ziu*AoUe6us})(^*6-&P^eOKn.kxBcSiy8~5toTkW`60m}Xe8k5pn@;!e' );
define( 'NONCE_SALT',       '@rs/9> _W&+`QD{g@T4EEwn*D[|U(Y&*93GQ#{$0| SP fM2=AcVUsvy(r bIJ:)' );

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




