<?php

/*	Ignore the following unless you want to customize the AJAX callback environment	*/
/*** The variable $callbackstring will contain the string you set (see below)		***/
/*** To customize, leave the sample code in place and insert callback processing	***/
/*** where shown below. Set your callback string immediately after creating the		***/
/*** grid object. The querystring key is "__cbstr". Because conf.php runs on		***/
/*** every callback.  It's the place user to modify to suit their own situation.	***/
/*** For example:																	***/
/***     $dg = new C_DataGrid($sql, $keyname='id', $tablename='', $credentials);	***/
/***     $dg->setCallbackString($customizing_string);								***/

if (isset($_GET['__cbstr'])) {
	$callbackstring = base64_decode(strtr($_GET['__cbstr'], '-_', '+/'));
	/********* Insert custom environment handling here ***********/
	
	//	require_once($callbackstring.'/foo.php');
	//	foo::getInstance()->startup();
	
	/********* End of custom environment handling ***********/
}

?>
