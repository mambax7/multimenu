<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multimenu 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/

if( !defined("MULTIMENU_DIRNAME") ){
	define("MULTIMENU_DIRNAME", 'multimenu');
}

if( !defined("MULTIMENU_ROOT_PATH") ){
	define("MULTIMENU_ROOT_PATH", XOOPS_ROOT_PATH . '/modules/' . MULTIMENU_DIRNAME . '/');
}

include_once( MULTIMENU_ROOT_PATH . 'include/multimenu_install.php');
?>