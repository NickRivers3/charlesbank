<?php
//The entry below were created by iThemes Security to disable the file editor
define( 'DISALLOW_FILE_EDIT', true );


/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'charlesb_wordpress');

/** MySQL database username */
define('DB_USER', 'charlesb_webuser');

/** MySQL database password */
define('DB_PASSWORD', 'lwVyUePceg');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+_G:fXnGP^|f+k|Oq&EwHJe)a1B|n|S;{-/!/8+py[ABx6na}_[=+O]!kSwN|p|M');
define('SECURE_AUTH_KEY',  'GFZ,[_+z3=rqVh8M|iA=pYm9[lI:~t7#y7O5eS{A`Wl++2(Nl[U@j0$?emwV9)D|');
define('LOGGED_IN_KEY',    '0:`g+gc,xdJ3gH[WB$!kfO)]|# c5y~}Yyj7mXDkhIFdN{lDCClohcHf;jT?lNCH');
define('NONCE_KEY',        '=B*BJ}|29AC}%<|kNHjS9#[)! g6Rb!5OPcT`}V>!E-1>G4liM+WH(RhL{Oh4o;$');
define('AUTH_SALT',        'Y$DwQLK&)>B[;-Wbq/v|ihrVX^T@9T4TAvWkO@8T@m3z-IxnV~y+A!DF-Av-|[tg');
define('SECURE_AUTH_SALT', 'MNg7EGb&pPSzFUY_o6CD2E0{bP@}U,d`B=s(>xf5ZjEJ/Gg+N& mmrDYMNsPIs)b');
define('LOGGED_IN_SALT',   'Mg@Hc,Eu,O-&a22cs{a2ZfSI@Fa; xA>3ZOW<khl_K{Uh]nGzbT}Wf|:nID,i4%O');
define('NONCE_SALT',       '=x2YNduR;rCa4MGppq%+r|rZPGt ;-GU(WpNB[9#FQ?oN|^>p)jHtkPgu5DDsh[z');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'nsdr4ff3zb_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
