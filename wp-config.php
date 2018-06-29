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
define('DB_NAME', 'sfg_db');

/** MySQL database username */
define('DB_USER', 'chard');

/** MySQL database password */
define('DB_PASSWORD', 'qwe321!@#');

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
define('AUTH_KEY',         'C#X_|@%jA2@TW)jE]h9Gtw[K 3981fn:3ypwhYrAkl/qan_W> ]&^7FVSnNN;e_<');
define('SECURE_AUTH_KEY',  '^8V{?o`^xIfYu+|FtBDyl^vIoaD{TM~+l-c[q!fKM[J3c~*n/7eA!3 ]Xo_M`@jh');
define('LOGGED_IN_KEY',    '?e;ZBN>Ex}c#UpT>7F$0_y`.K#(cR[B]9C;PN])OzK^@o:x_S.6nbdv+hWs87n5?');
define('NONCE_KEY',        'dJ8|w!yeJ8t9(wexkr`Fl$63);5nse-wPYCK9:XJ2I?~3#rO(_C.$^]`LmZA28j!');
define('AUTH_SALT',        '2c:Q.c+U+ZLzmEL:w=XY,H:B#D[D`J.Y~0X4c=T| 3@: 9WKI33U-v@(:n*pUoMf');
define('SECURE_AUTH_SALT', 'lSq]^x|{-E@/N>~quc:,xf{a=S1FgD^-$eW:sMS<KOZd~AYM5v#6gKl`B:kbZuNf');
define('LOGGED_IN_SALT',   '!NrWLWB!(Wv&jykYjKQ2t#Oe0y8l/&3i}{s$[*B4@dgE(sBoEpF):~S]-l325+gA');
define('NONCE_SALT',       'zU<M[XS^]V6!kRG)/2Kqt5n%@7S]!&u$FZ1W}P)m.BPV#Z~FUG*dt)vjXqH+yC ?');

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
