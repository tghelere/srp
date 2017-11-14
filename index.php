<?
/**
 * Softhing Framework
 *
 * LICENSE
 *
 * Esse código e demais pertencentes à Softhing Developers S/S
 * são de uso exclusivo, somente funcionários da empresa podem dar manutenção,
 * qualquer outra pessoa que venha a alterar/editar qualquer linha do código
 * pode ser processada por violar os direitos autorais.
 *
 * @category   	Softhing
 * @copyright  	Copyright(c) Softhing Developers S/S BR Inc. (http://www.softhing.com.br)
 * @license    	Utilização restrita a Softhing Developers S/S
 * @version    	2016-09-23
 * @author 	    Thyago Ghelere "ghelere@outlook.com"
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php');
$detect = new Mobile_Detect;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

require_once($_SERVER['DOCUMENT_ROOT'].'/system/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/system/setup.php');
