<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    			//
//                    Copyright (c) 2004 XOOPS.org                       	//
  //                       <http://www.xoops.org/>                              //
//                   								//
//                  Authors :							//
//						- solo (www.wolfpackclan.com)   //
//                  Multimenu v1.0							//
//  ------------------------------------------------------------------------ 	//

include('include/item.php');


function multimenu_getmoduleoption($option, $repmodule='multimenu')
{
	global $xoopsModuleConfig, $xoopsModule;
	static $tbloptions= Array();
	if(is_array($tbloptions) && array_key_exists($option,$tbloptions)) {
		return $tbloptions[$option];
	}

	$retval=false;
	if (isset($xoopsModuleConfig) && (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $repmodule && $xoopsModule->getVar('isactive')))
	{
		if(isset($xoopsModuleConfig[$option])) {
			$retval= $xoopsModuleConfig[$option];
		}

	} else {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($repmodule);
		$config_handler =& xoops_gethandler('config');
		if ($module) {
		    $moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	    	if(isset($moduleConfig[$option])) {
	    		$retval= $moduleConfig[$option];
	    	}
		}
	}
	$tbloptions[$option]=$retval;
	return $retval;
}

/*if( !function_exists('multimenu_short_title') ) {
function multimenu_short_title( $title='', $length=18, $tiddle='[...]' )
{
  if( $length ) {
     $tiddle_length=round(strlen($tiddle)/4,1);
     $length=round($length-$tiddle_length,1);
     $part2=round($length/4,1);
     $part1=$part2*3;
     $length=round($length);
 if( strlen($title) > $length )
   { $title_01 = substr($title,0,$part1).$tiddle;
     $title_02 = substr($title,-$part2);
     $title=$title_01.$title_02;
   }
}   
   Return $title;
}
}
*/

?>