<?php
define( 'WP_CACHE', true );


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'realestate' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'XZG#URHo6jO%;69$0v_A0m`c`;6Z%v-zrt:K>+|<=tA, eG7Z&@#6#rrR p pX0B' );
define( 'SECURE_AUTH_KEY',  'J:PIYlQl~n[Ur2E`~fMRGS7m=T(OB]$Uq8Y5y$|^TA@8ukLJ6iw04}(FnIOs 4MF' );
define( 'LOGGED_IN_KEY',    'jyVWZ5,Lnkb70GMJe aLv8usv{C%_(<<pAq0U!*R3MyQFW-p)%^;)eyq*DK_-7pH' );
define( 'NONCE_KEY',        'Rd!Y$JoF^IDyipY)Fkt_=Q]Kj}4T (Cke=jx2}N.i.~:SZx7Zp<2K%:0s29OC2h!' );
define( 'AUTH_SALT',        'n}{1(&vmpu;W~|SPXuS~!Y_W$XD>Z)p|ym$ VzSFs#=qU}[IV2JO1+15{ge)/$L`' );
define( 'SECURE_AUTH_SALT', 'pZV_,*_xw28]b?_5in+YQf1Z2_+_KC+]e?34x^eGdr)T*zv4;1$FlQJ@CUH3zyG}' );
define( 'LOGGED_IN_SALT',   '$*K}rz}t2kig&4)XR@^EqF0Eeig$wync|%`po?+lnO<NT@DS@D99)i{H~]DOxR' );
define( 'NONCE_SALT',       '/9-B0#7>kMZ||mt#SQJZ%)*L^AJWCFc>@ECu(*5Rm#N34!SqJspkE#0tzs0y[|rY' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
//Disable File Edits
define('DISALLOW_FILE_EDIT', true);