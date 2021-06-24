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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-3!^xJ?@ ,]RgnPKhi[BI .#0GRBPC@YnfA%vM}gT4TxTO>:(8PzE+MzVMxFFP_V' );
define( 'SECURE_AUTH_KEY',  '$w8VO?u]|JQu[<[B;U!%(WgVd+U&b]1?AmpW;nzVYD#u.rPcrWL fe6b7H*IeqV=' );
define( 'LOGGED_IN_KEY',    'LV:as^-5@X[u*21x]U6u]nR(;5{xX1T}qpR>O9zwo?(R N;<s@cSJ@,n]+J7=H:;' );
define( 'NONCE_KEY',        '/d&9r#AeOSv89,!g>+LY-Fb9*5c~-6<D^^rsE!oH]m$%kG#Mv;K!uj!{BAr:Ql@ ' );
define( 'AUTH_SALT',        '$7f&avC_0xr/H7V#<~sXVm]5~z6vKj~? [&7SMpm^i9%U|hyvIN|w_4fAC0lJfN#' );
define( 'SECURE_AUTH_SALT', 'q]$`3i@9$R_X/Jcv>`nb0|g(+y?(8*l$+,c6(/Km$$IW^:Xc.pte@B,iV_[iwy*G' );
define( 'LOGGED_IN_SALT',   '%lkc:s^>qOh<s_}#TuspUfyh?i4C;/l}UreF%9%yA~o+=47?DMkn$0)CnA)EFUHj' );
define( 'NONCE_SALT',       'MD*H0uoiNUqx>9h,|x$(lIbW+s3rrqH~R:8d+SA&OiQF_rUQh.+GKhWe,y@E<5=3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
