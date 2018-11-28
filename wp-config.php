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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'avenue_my');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+6I@r*]W!b(#~2$,5B2S M>H&6l-wUXdI:B.{D<-nNGQjUxNoZ7]WomUR/y,Ze/]');
define('SECURE_AUTH_KEY',  'MhIGw*XS&!`KlZ9IDh<q;w_TvW-!:2lZUy)j{kq{Efk{}{Q_$Fzu&Kf7gkmeV[*D');
define('LOGGED_IN_KEY',    '5$tyQ`^[-eD8qybY.qw;u3ubu 2`VgTX||A(B6Y:,o~ fe5?f^5!sIx)<2e?t(_M');
define('NONCE_KEY',        'Li*DQQw}QJXKto-2`e1YJ*EP~,[8xq|edes3AVNK c(SmwgrT92)LrlwcBkC)P`5');
define('AUTH_SALT',        'kD =Z$^VUwaSn=<IdZIrz-c-4Obo*UJE8|7B,b?v2}(j[uxK}(u[S Qs0?]5*L!9');
define('SECURE_AUTH_SALT', '7F2YIK^x!z:G5lvs[X,Dl]i3.TI84Qz_eDlPR6i!lFU^Y6`3XCNen82qj|Ijb|dJ');
define('LOGGED_IN_SALT',   'fyX{fO*,M:S%k7LJKP>?CX.H;HDLm?(5jR0$eI3Ky|<PD&d~|H+Bd8%3$3>?X>du');
define('NONCE_SALT',       '@<=alXlvmE@W$~-aqP~9uE JuP;;F.Lfm`+NCb> aAhl4[@&QCin3G(5.t[g!s>O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
