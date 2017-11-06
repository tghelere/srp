<?
define('NAME', 'Studio Raquel Pagani');
define('HOST', $_SERVER['SERVER_ADDR']);
define('CHARSET', 'UTF-8');

if (HOST == "127.0.0.1" || HOST == "localhost" || HOST == "::1") {
    define('AMBIENTE', 'local');
    define('ROOTURL', 'http://studioraquelpagani2.com.br');     //criar o virtual host e editar o arquivo de hosts
} else if (HOST == "192.168.1.3") {     //seu ip local ex: 192.168.1.3, para isso é preciso editar o httpd.conf
    define('AMBIENTE', 'rede');
    define('ROOTURL', 'http://192.168.1.3/studioraquelpagani2'); //seu ip local ex: 192.168.1.3
} else {
    define('AMBIENTE', 'producao');
    define('ROOTURL', 'http://www.raquelpagani.com.br');
    // define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']."/new2"); //se for o mesmo, tira da condição
    define('DBHOST', 'localhost');
    define('DBNAME', 'raquelpa_soft');
    define('DBUSER', 'raquelpa_dev');
    define('DBPWD', 'soft123thing' );
}

/* Servidor local */
if (AMBIENTE == "local" || AMBIENTE == "rede") {
    define('DBHOST', '177.70.22.208');
    define('DBNAME', 'raquelpa_soft');
    define('DBUSER', 'raquelpa_dev');
    define('DBPWD', 'soft123thing');
}
// if (AMBIENTE == "local" || AMBIENTE == "rede") {
//     define('DBHOST', '172.17.0.2');
//     define('DBNAME', 'raquelpa_soft');
//     define('DBUSER', 'root');
//     define('DBPWD', 'root');
// }

/* Sistema de arquivos */
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']);
define('CONTROLLERS', ROOTPATH . '/app/back/controllers/');
define('MODELS', ROOTPATH . '/app/back/models/');
define('TEMPLATES', ROOTPATH . '/app/front/templates/');
define('HELPERS', ROOTPATH . '/system/helpers/');
define('IMG', ROOTURL . '/app/front/img/');
define('CSS', ROOTURL . '/app/front/css/');
define('JS', ROOTURL . '/app/front/js/');

/* Smarty */
define('SMARTY_CACHE', ROOTPATH . '/cache/');
define('SMARTY_COMPILE', ROOTPATH . '/compile/');
define('SMARTY_CACHE_STATUS', true);
define('SMARTY_CACHE_LIFETIME', 3600);

/* Development */
define('AUTHOR', 'Thyago Ghelere');
define('MAIL_DEV', 'ghelere@outlook.com');
define('VERSION', '0.3.0');

/* E-mail */
define('SMTP', 'smtp.gmail.com');
define('USER', 'pagani.ads@gmail.com');
define('PWD', '32252411');
define('PORTA', 587);
define('CCO', MAIL_DEV); //com cópia oculta para desenvolvedor

define('EMAIL_CONTATO', 'contato@raquelpagani.com.br');
define('FONE_CONTATO', '(44) 3225-2411');
define('END_CONTATO', 'Avenida Nóbrega, Nº 536');
define('LOCAL_CONTATO', 'Maringá – PR');
