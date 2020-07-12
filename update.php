<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Multimenu v2.x								//
//  ------------------------------------------------------------------------ 	//

// include_once('header.php');
include_once("../../mainfile.php");

 $update_sql = "ALTER TABLE " . $xoopsDB->prefix("multimenu_link") . " ADD relative VARCHAR( 255 ) AFTER type";

 if( $xoopsDB->queryF( $update_sql ) ) { 	
     redirect_header('./', 2, _MULTIMENU_UPDATED);
        } else {
     redirect_header('./', 2, _MULTIMENU_NOTUPDATED);
   }
exit();

?>