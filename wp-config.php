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
define( 'DB_NAME', 'wordpress1st' );

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
define( 'AUTH_KEY',         '_A+3Gd8}n0?wT90Y6+gdYXY?-VtHpG7xHb66Pj,Thmp8;/LbhDG]O#bx9<2Un+#i' );
define( 'SECURE_AUTH_KEY',  'x8?B0PQDbJxQ8*|U^.F+~n#yLeIPC~Gp2|(k@z/hoG,j=$ZeFkH<%mUCV FZU?{P' );
define( 'LOGGED_IN_KEY',    'i<Xp{7bCf,0Z-7I+<4#eftAFK?kkP*+f6*kjkgxm?4%*ALBXD,3 ^&oIyldtwgW^' );
define( 'NONCE_KEY',        'T=`x8B.:)QUs|GUNql0;%?F9!5#Nw7%7,sl3r:g$a2lxa@w{355H2OIAFNZC(fn8' );
define( 'AUTH_SALT',        '{oOagR}kIj69bq$Ji2~Q]8aWjY<)gL~Ss^L<;Jm#LQ}R2%aJ%3SykT!y;9~QAZ(y' );
define( 'SECURE_AUTH_SALT', 'I#-7yESz0gR:bk7j8BaggO$$YsuaGx_%eAQuW,in<pGUAjc/9]:@_0uO<3U011i,' );
define( 'LOGGED_IN_SALT',   '@-MwQgxHQn=zM:^CbMWW2eSc=_P;w;n4Fa6dJ.]f{2qvekNAh-HA$C-Y7eh^(.!y' );
define( 'NONCE_SALT',       'e+H88Ai|8YNk`hRGK`;D6yZCLPM-t5vXcnob1 3O)_S?j# _6;G]m`0F!hIXukjr' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
