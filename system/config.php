<?

define('NAME', 'Studio Raquel Pagani');
define('SLOGAN', '"Desde 2002"');
define('DESCRIPTION', 'xxx, xxx, xxx');
define('KEYWORDS', 'xxx, xxx, xxx, xxx');

define('AUTHOR', 'Thyago Ghelere');
define('MAIL_DEV', 'ghelere@outlook.com');
define('VERSION', '0.3.0');


//verifica se existe conexão com internet
// if (!$sock = @fsockopen('google.com', 80, $num, $error, 5)) {
//     define('CONNECTION', FALSE);
// } else {
//     define('CONNECTION', TRUE);
// }

define('HOST', $_SERVER['SERVER_ADDR']);

if (HOST == "127.0.0.1" || HOST == "localhost" || HOST == "::1") {
    define('AMBIENTE', 'local');
    define('ROOTURL', 'http://studioraquelpagani2.com.br');     //criar o virtual host e editar o arquivo de hosts
} else if (HOST == "192.168.1.3") {     //seu ip local ex: 192.168.1.3, para isso é preciso editar o httpd.conf
    define('AMBIENTE', 'rede');
    define('ROOTURL', 'http://192.168.1.3/studioraquelpagani2'); //seu ip local ex: 192.168.1.3
} else {
    define('AMBIENTE', 'producao');
    define('ROOTURL', 'http://www.raquelpagani.com.br/new2');
    define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']."/new2"); //se for o mesmo, tira da condição
    define('DBHOST', 'localhost');
    define('DBNAME', 'raquelpa_soft');
    define('DBUSER', 'raquelpa_dev');
    define('DBPWD', 'soft123thing' );
}

//servidor local
if (AMBIENTE == "local" || AMBIENTE == "rede") {
    define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']);
    define('DBHOST', 'localhost');
    define('DBNAME', 'raquelpa_soft');
    define('DBUSER', 'root');
    define('DBPWD', 'xixicoco');
}

/* Sistema de arquivos */
define('CONTROLLERS', ROOTPATH . '/app/back/controllers/');
define('MODELS', ROOTPATH . '/app/back/models/');
define('TEMPLATES', ROOTPATH . '/app/front/templates/');
define('HELPERS', ROOTPATH . '/system/helpers/');
define('IMG', ROOTURL . '/app/front/img/');
define('CSS', ROOTURL . '/app/front/css/');
define('JS', ROOTURL . '/app/front/js/');

define('SMARTY_CACHE', ROOTPATH . '/cache/');
define('SMARTY_COMPILE', ROOTPATH . '/compile/');
define('SMARTY_CACHE_STATUS', true);
define('SMARTY_CACHE_LIFETIME', 3600);


/* E-mail */
define('SMTP', 'smtp.xxx.com.br');
define('USER', 'contato@xxx.com.br');
define('PWD', '');
define('PORTA', 587);
//define('CC', MAIL_DEV); //com cópia para desenvolvedor

define('EMAIL_CONTATO', 'contato@xxx.com.br');
define('FONE_CONTATO', '(xx)XXXX-XXXX');
define('END_CONTATO', 'Rua xxx, Nº XXX - Bairro xxx');
define('CEP_CONTATO', 'XXXXX-XXX');
define('LOCAL_CONTATO', 'Xxx - XX');
