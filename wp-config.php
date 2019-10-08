<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'god' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*yTJ8vW/dVN2VLK8,!<+ivHnLp9N{~-Kki/_iiVXCo<Q4D- w(;zLPw,,w^SY4zp' );
define( 'SECURE_AUTH_KEY',  'myRe0gcFzVB^[4S),LLj$wH#8% HdjVs4f1+7r(1%S~h23bwHp{fla^_k ]JM{-j' );
define( 'LOGGED_IN_KEY',    '2k@_(tX.?;|srj`# JNCmHkI3/Np7;4.m2~/p,]D>y&x!vcg_rKrP_ us(!{TlBQ' );
define( 'NONCE_KEY',        ';I?GmsOvHC %;Cbth-}8.ossXU&B>.|u09J<pF3TY8V=5RaE])d=4-;jO@N`NA`<' );
define( 'AUTH_SALT',        'cY;]!4Zr6T)-VmbLp=9(_ln+%cg*[&mIqDYSB}@.=stgX_N;lt#EqzY= V.MkDw-' );
define( 'SECURE_AUTH_SALT', 'PZ $G-En#>6v?-2T#VY8@BKnor/M$FM)a~bAh7EAW:G!m;N/x|=iV(jD|2?heFq&' );
define( 'LOGGED_IN_SALT',   'PZ@E(>l8lnU&OxAj=G/jPa<h%E6Qf9vNMF{aPs`<(,bQEP]{_Nug_(B,(4f(Z+ct' );
define( 'NONCE_SALT',       '!XFw1+w7~SeuG+i#lt292od&b9b-!Q4cdF$X5:2YH2p4b%(XM*d]amRmL>y`Gw#G' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'prefix_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
