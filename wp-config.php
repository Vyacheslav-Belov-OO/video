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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'video' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost:3406' );

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
define( 'AUTH_KEY',         '==PTtrGiA+Q|`mSiV:+-5`,X&.7LhQy}cq.ubA{=5fD~{AvPi0^3aP%5%Rc01ycq' );
define( 'SECURE_AUTH_KEY',  '%*XhWZ!qpW^m][xTMLv/!D[BC4CF7VN#tj~$<?6E2>1-zB;5IL;W!FD(1+.i]%$.' );
define( 'LOGGED_IN_KEY',    'CBeD2WHZxZ=Uj?ELgH{lbhO*y$|LKnRD19C~mpP*v9YJV%Dz#=vq]>z@)b#.$}$I' );
define( 'NONCE_KEY',        'ogYJAy32j`ddGnVa)XVmeb)m(XVyAJ)$=%Q7T*-UfBq6c5A`m9(ROxp-_F*PTSvF' );
define( 'AUTH_SALT',        '+|hk1?V2 lZ=>y3{&3-} {`$pmzzpe@v4.T66smTpisn)bA>lIzekrqv?vtwPG_P' );
define( 'SECURE_AUTH_SALT', '@0dAi%lA~`k?Hx/tet9pY,@a?>!/ySUN8l%A]mKaE0hgi[hpfv{?n&fE2q^^*LXF' );
define( 'LOGGED_IN_SALT',   'a_,:;1KMQ?jl{CYgW0Fjyn}]s~G2.bAaTOp|<+(M!=D6G696UPt!2XyIDj~wx~nC' );
define( 'NONCE_SALT',       '#9[:}H~Vrjx[H%3&jy.Z?72%OIz3+X8m+;O.7T*ZX]D%=3mVJe1F6T3lGE|J^m-H' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_video';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
