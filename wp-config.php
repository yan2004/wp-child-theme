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
define( 'DB_NAME', 'creation-web-2-tp2' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '%&/3`iY<{d:%O94_K^/G?EKa,&*?wOLXmpP&D{@|h^87s+5[SD|N;NfV_9sy&br!' );
define( 'SECURE_AUTH_KEY',  '6z%)@5U]u<1IXVZL?$%IDuq)>a=*}}R<,$:q:UJnGUNS|PnK?D],Iz>uj)M%TufA' );
define( 'LOGGED_IN_KEY',    '}#/}#e%xXqCZ@FN5#[&qfHstUj8*klU+P]ic;3XHz?V^m*Ox]E Yn[+8i%/)OX,j' );
define( 'NONCE_KEY',        '&=]zJdB`}H!9F; 9eB:#Gsx)[;En18:~nR++)8yI=#mE7hrpEl<!YD5aAq0axmub' );
define( 'AUTH_SALT',        'R3V0Cjf<)`<<PQ0MPLQq])%&7L3:9P/$edAXL[6,f}u563 V+]7A(VA>-LTb%5uA' );
define( 'SECURE_AUTH_SALT', 'KL%i8-Qt|XP;7rP.Yh/whT1tA$x{>q#m>}ubm<>hYGL^ P_;d*KMoE*3j[=2>!0%' );
define( 'LOGGED_IN_SALT',   'AJ%+VR-6GN?gLza#H--~vh&IA-Zrm=?}2`Osd>~[m!/Fy m~wX 66($@e35R1jIa' );
define( 'NONCE_SALT',       'y}fi&x37bYG?V*Al!t94T.@2z4%<4XOL0fMR:{[.+W*Z.aGNdBax:x5/{4joDzqo' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
