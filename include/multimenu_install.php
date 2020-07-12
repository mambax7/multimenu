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

multimenu_create_all_dir();

function multimenu_create_all_dir() {
	$img_source = MULTIMENU_ROOT_PATH . "images/multimenu_slogo.png";
	$ind_source = XOOPS_ROOT_PATH . "/uploads/index.html";

	$dest = multimenu_create_dir();
    if ($dest) {
		$img_dest = $dest . "multimenu_slogo.png";
        $ind_dest = $dest . "index.html";
		multimenu_copyr($img_source, $img_dest);
		multimenu_copyr($ind_source, $ind_dest);
    }
}
function multimenu_create_dir( $directory = "" )
{
	$thePath = XOOPS_ROOT_PATH . "/uploads/multimenu/";
    if ($directory != "") {
	$thePath .= $directory . "/";
    }

	if(@is_writable($thePath)){
		multimenu_admin_chmod($thePath, $mode = 0777);
        return $thePath;
	} elseif(!@is_dir($thePath)) {
    	multimenu_admin_mkdir($thePath);
        return $thePath;
	}
    return 0;
}

/**
* Thanks to the NewBB2 Development Team
*/
function multimenu_admin_mkdir($target)
{
	// http://www.php.net/manual/en/function.mkdir.php
	// saint at corenova.com
	// bart at cdasites dot com
	if (is_dir($target) || empty($target)) {
		return true; // best case check first
	}

	if (file_exists($target) && !is_dir($target)) {
		return false;
	}

	if (multimenu_admin_mkdir(substr($target,0,strrpos($target,'/')))) {
		if (!file_exists($target)) {
			$res = mkdir($target, 0777); // crawl back up & create dir tree
			multimenu_admin_chmod($target);
	  	    return $res;
	  }
	}
    $res = is_dir($target);
	return $res;
}

/**
* Thanks to the NewBB2 Development Team
*/
function multimenu_admin_chmod($target, $mode = 0777)
{
	return @chmod($target, $mode);
}

/**
 * Copy a file, or a folder and its contents
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.0
 * @param       string   $source    The source
 * @param       string   $dest      The destination
 * @return      bool     Returns true on success, false on failure
 */
function multimenu_copyr($source, $dest)
{
    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        if (is_dir("$source/$entry") && ($dest !== "$source/$entry")) {
            copyr("$source/$entry", "$dest/$entry");
        } else {
            copy("$source/$entry", "$dest/$entry");
        }
    }

    // Clean up
    $dir->close();
    return true;
}
?>