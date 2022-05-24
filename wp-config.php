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
define( 'DB_NAME', 'clinicadentaldurcal' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'perla' );

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
define( 'AUTH_KEY',         '.AA=c,.(UPgbV.lYg+j{[D4P7(A`:cQG*;`*r31l7fmr Y]3dp94p!5?1Tn9yr=t' );
define( 'SECURE_AUTH_KEY',  'AI9TWZMq=#?X}(i;1zE>~EJDh#ez^]HCfuTNo*x!u2SVPw*eMtfRVwjdK9#M>iNJ' );
define( 'LOGGED_IN_KEY',    '/#m|TC#igGExUQ=%^x@?a9k+48x,(Ka~FP^485MeA0>Oq:I>*6QLMis{3A@.81F]' );
define( 'NONCE_KEY',        'A[{MNM[n=b_k9~Nq`sBHM1S& wx@:6]= (/gHr/]LAdBTpj?qpzC39a/X</*xyYH' );
define( 'AUTH_SALT',        '?MU$-2<Us;#$3) #oPOuO;&FKgLt],)_&srgU;+_ae:~.f MXddu)@9vZFT8mM(<' );
define( 'SECURE_AUTH_SALT', 'On(f9fW*T6q+9V#Tc?EuofFOEQUE/mbX&i(4820VW?W0-wTA eTL71wcMG9ym.)6' );
define( 'LOGGED_IN_SALT',   'b4Gf%f>eYF[78N|=#5JL$#td#jf-IxicuO{4gR)mr()T{R/xg=L,U7SKSd7+AL0`' );
define( 'NONCE_SALT',       'x:e2-#6G%^)Scb7pj H~Z?p3c2Z]2YBHD(IZ~{8iGTT,[l2t;l#Rft!t6d oD[i(' );

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
