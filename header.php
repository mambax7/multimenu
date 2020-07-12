<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  multimenu v1.1								//
//  ------------------------------------------------------------------------ 	//

include_once("../../mainfile.php");

 // Datas
 /*
if( !$xoopsModuleConfig['urw_count'] ) {
 $is_active=0; $ii=1; $sel=0;
 $current_url = pathinfo( $_SERVER['REQUEST_URI'] );
 foreach( $xoopsModuleConfig['index_activation'] as $value ) {
  $name         = constant(strtoupper('_' . $xoopsModule->dirname() . '_' . $value));
  $check[$name] = $value;
  $nav[$name]   = $value.'.php';
  // Check page activation & selection
  if( ereg($check[$name], $current_url['basename']) ) { $is_active=1; $sel=$ii; }
  $ii++;
 }
  if( $current_url['basename']=='index.php'||$current_url['basename']==$xoopsModule->dirname() ) { $sel=0; $is_active=1; }

if( !$is_active )
{
	redirect_header('./', 2, _MULTIMENU_NOTACTIVE);
	exit();
}
}
*/

// Module Background
 $background = $xoopsModuleConfig['index_background']?'../../'.$xoopsModuleConfig['index_background']:'';

// Module Banner
        if (file_exists(XOOPS_ROOT_PATH.'/language/' . $xoopsConfig['language'] . '/calendar.php')) {
		include_once (XOOPS_ROOT_PATH.'/language/' . $xoopsConfig['language'] . '/calendar.php');
	} else {
		include_once (XOOPS_ROOT_PATH.'/language/english/calendar.php');
	}

// User groups	
        $user_group  = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
        $like = '';
        foreach( $user_group as $group_id ) { $like .= " OR groups LIKE '%".$group_id."%'"; }
        


// include_once('include/functions_adminmenu.php');
include_once('include/functions_common.php');
include_once('include/functions_urw.php');

include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
$myts =& MyTextSanitizer::getInstance();

?>