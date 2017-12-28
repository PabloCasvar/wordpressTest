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
define('DB_NAME', 'wordpressdb');

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
define('AUTH_KEY',         '<m[_ekZqgAY7$Khq.N5OIA>]O|orqlWGMMse,3Q%&qLvCj1~F$V H%sorgm7J)wm');
define('SECURE_AUTH_KEY',  'sr$_|X*rhkPmHX$Ms*kT=O*sDV WuEm2lNi4Z!B=zld/<nJ_9eds{8Ikj;9LA#)@');
define('LOGGED_IN_KEY',    'a#6FG:,0?LR?SV{2RnE3qz?e^]GrT42X-SP>W,}98$$5A^@7M#T/&:n:.``5030/');
define('NONCE_KEY',        '8C$,U#OjqX^DJaCa8(F][`nmBM frFigKAcyvY,Iy[z(>M?T$BX1G#=BOSy5xWK_');
define('AUTH_SALT',        'zUFko}cDInRk#!&%1]G1>j&.Q7ocoxqH5O^{+cai<E@bURH2m$%BA!c;x?u4kIU~');
define('SECURE_AUTH_SALT', '?4Pv++T,;;ncwlp&Ha&r7#w!.[>}gE0;}pQXP!_<gvHd][ExXxwrNm)h}!8s{4B7');
define('LOGGED_IN_SALT',   'GV/902{>ER1uvI35Xd+%7^f?xRh[rX<?Mgd1!dY.x}ZoYg7o$r<OzJH+n@>&{zZv');
define('NONCE_SALT',       'Gk|4QJXM(On=Utn@;T4uqV#Nza^,qcC&pDux|dS=pnRC&@|3E5BzV<r| %R.?U}^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpp_';

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
