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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'write' );

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
define( 'AUTH_KEY',         'Q0@@.MF0Vf,R3a@}?1DuZ$d{GG0_]%/`QuGpe9Pr05Vf*<7]JLZHrp+rHaA>Xwz1' );
define( 'SECURE_AUTH_KEY',  '7uIJ+ >+`JXiG6}eq,1*zE!.z=[.2%;ewLM<T+u]N]SDt9y!iL3vTHs/>@KbWUg_' );
define( 'LOGGED_IN_KEY',    'B;v-4F )z6,)T8]PiU>.p_CEbY ^?7|Tq ^1&McOa|$&6d,2A{~M8:.Esi0aR4=8' );
define( 'NONCE_KEY',        'Dh0E6>iQmOg$&1@m}z.D/*w0Q0Z:0{p4D*;>nj! Fn}8H4^(aS|?l]+J]y38j4oK' );
define( 'AUTH_SALT',        '(C)l3EDRj.yCK| NbA,<yAK~9`zlq=X8`fuDmoR)A5QKN8vgV{Lm67OG0NEx.{}l' );
define( 'SECURE_AUTH_SALT', '9Lek?TE<h?c^:$c=If/pj+Rmic._Yqm&H95m$<!!DJBvp)083ljOsh_arD+%%`_B' );
define( 'LOGGED_IN_SALT',   'TT]&dWQF[8eU]?egT>GqC}T@iBXOZE2Y(iNt$C8d4f^Di(A#@#[SuGy=t lTGC{E' );
define( 'NONCE_SALT',       '%l]5`{Wa6^ujpQ+)x]7p{bR[Gi-Iagp:vPwsX31KQ;S%6 P,H8T^.20]M d&v[k>' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define( 'WP_SITEURL', 'http://localhost/wp/writer' );  
define( 'WP_HOME',    'http://localhost/wp/writer' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
