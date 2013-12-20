<?php
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
define('DB_NAME', 'ab');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'IgE%dl}Twc[y`TfKf(qKB|]/$+>|P/[MQ-SpZO+Bks}ZH&95#C>O@BjoE=s>db,2');
define('SECURE_AUTH_KEY',  '1^WGp-d#)]u !TB`;Q!68$#fM_,7}NdC{uVK8|+-_P:hQ{(D5d[Nc+E-c}[#b^po');
define('LOGGED_IN_KEY',    'A!g)b;^F-Q;oDJH,uLp= `EK?r94-w{:!k$;37h;;)^YGP]+]m2mg8CTZEj-oCzC');
define('NONCE_KEY',        'a0!yJ4a)U1-iM7_IRI^S9&X/{|ww/9n}{q+G!+>H}ubT:=e#M5aKL31++;-Th;tw');
define('AUTH_SALT',        '3#{O$2MZ][B.kR3b|^L]4nIZ@G(~X~{LLN=j~haCSe1B<&iJrFp8yY;4&[=]3.2s');
define('SECURE_AUTH_SALT', '9K)mY}W.Y+#0MObr-}VT08XYYqib$z];Y/XL]+B]LDxN}EF,)EAM;A}e=JmauY`V');
define('LOGGED_IN_SALT',   'DB[CM_.xp0vPk-GSXg@KQllR8*kA~< .EILk{;c7>s?R] C+3gyB&g9ZL_Yo|Ei^');
define('NONCE_SALT',       'mv2^Tm6<)t`ep?^Z~Xa+gi]|W0qxGSM.n#O:?ArnhY0!-xfwOKJ)$> 9. zMbX~_');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
