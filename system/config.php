<?

/* Device */
if ($detect->isMobile()) {
    define('DEVICE', 'mobile');
}else{
    define('DEVICE', 'pc');
}

define('HOST', $_SERVER['SERVER_ADDR']);
define('CHARSET', 'UTF-8');
define('NAME', getenv('NAME'));
define('ENVIRONMENT', getenv('ENVIRONMENT'));
define('ROOTURL', getenv('ROOTURL'));

/* DB */ 
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PWD', getenv('DB_PWD'));

/* Development */
define('AUTHOR', getenv('AUTHOR'));
define('DEV', getenv('DEV'));
define('MAIL_DEV', getenv('MAIL_DEV'));
define('VERSION', getenv('VERSION'));

/* Send mails config */
define('SMTP_HOST', getenv('SMTP_HOST'));
define('SMTP_USER', getenv('SMTP_USER'));
define('SMTP_PWD', getenv('SMTP_PWD'));
define('SMTP_PORT', getenv('SMTP_PORT'));
//define('SMTP_CCO', getenv('SMTP_CCO'));

/* Contact */
define('CONTACT_EMAIL', getenv('EMAIL'));
define('CONTACT_PHONE', getenv('PHONE'));
define('CONTACT_ADDRESS', getenv('ADDRESS'));
define('CONTACT_GEOLOCATION', getenv('GEOLOCATION'));

/* Paths and dirs config */
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']);
define('CONTROLLERS', ROOTPATH . '/app/back/controllers/');
define('MODELS', ROOTPATH . '/app/back/models/');
define('TEMPLATES', ROOTPATH . '/app/front/templates/');
define('HELPERS', ROOTPATH . '/system/helpers/');
define('IMG', ROOTURL . '/app/front/img/');
define('CSS', ROOTURL . '/app/front/css/');
define('JS', ROOTURL . '/app/front/js/');

/* Smarty php template */
define('SMARTY_CACHE', ROOTPATH . '/cache/'); //path to cache dir
define('SMARTY_COMPILE', ROOTPATH . '/compile/'); //path to compile dir
define('SMARTY_CACHE_STATUS', true);
define('SMARTY_CACHE_LIFETIME', 3600);