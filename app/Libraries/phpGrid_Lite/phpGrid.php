<?php                                             
error_reporting(E_ALL);
// error_reporting(E_STRICT);
ini_set('display_errors', 1);

require_once(dirname(__FILE__) .'/conf.php');  
require_once(dirname(__FILE__) .'/callbackstr.php');  
require_once(dirname(__FILE__) .'/server/classes/cls_db.php');  
require_once(dirname(__FILE__) .'/server/classes/cls_dataarray.php');  
require_once(dirname(__FILE__) .'/server/classes/cls_datagrid.php');  
require_once(dirname(__FILE__) .'/server/classes/cls_util.php');  
require_once(dirname(__FILE__) .'/server/classes/cls_control.php');  
require_once(dirname(__FILE__) .'/server/adodb5/adodb.inc.php');  

// fix missing DOCUMENT_ROOT in IIS
if(!isset($_SERVER['DOCUMENT_ROOT'])){ if(isset($_SERVER['SCRIPT_FILENAME'])){
		$_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0-strlen($_SERVER['PHP_SELF'])));
}; };
if(!isset($_SERVER['DOCUMENT_ROOT'])){ if(isset($_SERVER['PATH_TRANSLATED'])){
		$_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0-strlen($_SERVER['PHP_SELF'])));
}; };

define('GRID_SESSION_KEY', '_oPHPGRID');
define('JQGRID_ROWID_KEY', 'id');
define("CHECKBOX", "checkbox");
define("SELECT", "select");
define("MULTISELECT", "multiselect");  
define('FPDF_FONTPATH',dirname(__FILE__).'/server/pdftable/font/');
define('PK_DELIMITER', '---');     // must be 3 characters
?>