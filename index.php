<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Multimenu v2.0								//
//  ------------------------------------------------------------------------ 	//

// General settings
include_once('header.php');


/* ----------------------------------------------------------------------- */
/*                    Redirect index to a specific page                    */
/* ----------------------------------------------------------------------- */

if ($xoopsModuleConfig['index_main']) {
	if ((eregi("http://", $xoopsModuleConfig['index_main'])) || (eregi("https://", $xoopsModuleConfig['index_main']))) {
		header ("location: ".$xoopsModuleConfig['index_main']);
		exit();
	} else {
		$sql = "SELECT COUNT(catid) FROM " . $xoopsDB->prefix($xoopsModule->dirname()."_menu")."
			       WHERE catid=".$xoopsModuleConfig['index_main']." AND status=1 AND ( title='' ".$like." )";
        $result = $xoopsDB -> queryF( $sql );
        list( $numrows )=$xoopsDB->fetchRow($result);
        if ( $numrows ) {
			header ('location: item.php?id='.$xoopsModuleConfig['index_main']);
			exit();
		}
	}
}


$xoopsOption['template_main'] = 'multimenu_index.html';
include_once(XOOPS_ROOT_PATH . '/header.php');

        $page_title = $xoopsModuleConfig['item_name']?$xoopsModuleConfig['item_name']:$xoopsModule -> getVar('name');
        $page_title = $myts->makeTareaData4Show( $page_title );


// include_once('include/functions_directory.php');
// Header informations
// Metagens
$title       = $page_title;
$description = $xoopsModuleConfig['index_description'];
include_once('include/metagen.php');

// Module Banner
if ( eregi('.swf', $xoopsModuleConfig['index_banner']) ) {
	$banner = '<object
    			classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/ swflash.cab#version=6,0,40,0" ;=""
                        height="60"
                        width="468">
                <param  name="movie"
                value="' . trim($xoopsModuleConfig['index_banner']) . '">
                <param name="quality" value="high">
                <embed src="' . trim($xoopsModuleConfig['index_banner']) . '"
                quality="high"
                pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" ;=""
                type="application/x-shockwave-flash"
                height="60"
                width="468">
                </object>';
} elseif ( $xoopsModuleConfig['index_banner'] ) {
	$banner = '
                   <img src="../../'.trim($xoopsModuleConfig['index_banner']).'"
                        alt="'.$xoopsModule -> getVar('name').'" />
                  ';
} else {
	$banner = '';
}


// Items pref activation
        foreach( $xoopsModuleConfig['index_display'] as $i=>$value )                { $$value = 1; $xoopsTpl->assign($value, 	1 ); }
        if ( !is_object($xoopsUser) || !$xoopsUser->isAdmin($xoopsModule->mid()) )   { $xoopsTpl->assign('is_admins', 	0 ); }

// Admin buttons
if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid())) {
    include_once('admin/include/admin_buttons.php');
          $admin_buttons = array( 'menu'           =>      'admin/index.php?admin=menu',
                                  'link'           =>      'admin/index.php?admin=link',
                                  'query'          =>      'admin/index.php?admin=query',
                                  'images'         =>      'admin/index.php?admin=images',
                                  'templates'       =>     'admin/index.php?admin=templates',
                                  'blocks'         =>      'admin/index.php?admin=blocks',
                                  'settings'       =>      'admin/index.php?admin=settings',
                                  'utils'          =>      'admin/index.php?admin=utils',
                                  'help'           =>      'admin/index.php?admin=help'
                       );

          $admin = multimenu_create_admin_links( $admin_buttons,
                                                 0, 2,
                                                 'images/icon/',
                                                 '.png',
                                                 $xoopsModuleConfig['edit_button'],
                                                 '48' );
          $admin .= multimenu_select_settings();
          } else { $admin = ''; }

// Language defines
  	$item_lg_array = array(  'description',
                                 'admins',
                                 'edit',
                                 'clone'
                                 );

 	foreach ($item_lg_array as $item_lg) {
                 $xoopsTpl->assign($item_lg, 	constant( strtoupper('_'. $xoopsModule->dirname() . '_' . $item_lg) ));
	}

// Other values
  	$item_val_array = array(
  	                         'banner'     =>          $banner,
                                 'banner_url' =>          $xoopsModuleConfig['index_banner']?'../../'.$xoopsModuleConfig['index_banner']:'',
  	                         'item'       =>          $xoopsModuleConfig['item_name'],
  	                         'background' =>          $background,
                                 'admin'      =>          $admin,
                                 'title'      =>          $page_title,
  	                         'text'       =>          $xoopsModuleConfig['index_description']?$myts->makeTareaData4Show( $xoopsModuleConfig['index_description'] ):''
                                 );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}
	
 // Datas
        $startpage = isset($_GET['startpage']) ? $_GET['startpage'] : 0;
 	$result = "SELECT catid, status, title, description, template, image
		   FROM ".$xoopsDB->prefix($xoopsModule->dirname()."_menu")."
		   WHERE status=1 AND ( catid='' ".$like." )
		   ORDER BY title ASC";
        $list = $xoopsDB->queryF($result, $xoopsModuleConfig['index_perpage'], $startpage);
        $count=1;
        $xoopsModuleConfig['item_max_size'] = explode('|', $xoopsModuleConfig['item_max_size']);
        $item['thumb_max_width'] = $xoopsModuleConfig['item_max_size'][0];

    	while(list( $id, $status, $title, $description, $template, $image ) = $xoopsDB->fetchRow($list))
    	{
          
          $status_lnk = $status>0?0:1;

          $image       = explode( '|', $image );
          $image[0]    = $image[0]?'../../'.$xoopsModuleConfig['edit_dir'].$image[0]:'';
          $item['logo']  = $image[1]?$image[1]:$image[0];

          $css_mode = multimenu_tpl_rename( $template );

if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid())) {

          $admin_buttons = array(
                                  'edit'           =>      'admin/index.php?admin=menu&catid='.$id.'&op=edit',
                                  'clone'          =>      'admin/index.php?admin=menu&catid='.$id.'&op=clone',
                                  'delete'         =>      'admin/index.php?admin=menu&catid='.$id.'&op=delete',
                                  'other'          =>      '',
                                  'link'           =>      'admin/index.php?admin=link&catid='.$id,
                                  'query'          =>      'admin/index.php?admin=query',
                                  'images'         =>      'admin/index.php?admin=images&catid='.$id,
                                  'templates'      =>      'admin/index.php?admin=templates&tpl='.$css_mode['file_name']

                       );
          $status_img  = $status?'on':'off'; // $status_img  = !$old_main_pid_status&&$l_pid?'hidden':$status_img;
          $status_lnk = $status!=1?1:0;

          $item['status']  = '<a href="admin/index.php?admin=menu&catid='.$id.'&op=status&status='.$status_lnk.'">
                     <img src="images/icon/'.$status_img.'.gif" />';

          $item['admin'] = multimenu_create_admin_links( $admin_buttons,
                                                         $id, $status,
                                                         'images/icon/',
                                                         '.png',
                                                         $xoopsModuleConfig['edit_button'],
                                                         '32'  );
          } else { $item['admin'] = ''; }

                    $item['id']          = $id;
                    $item['title']       = $myts->makeTareaData4Show( $title );
                    $item['description'] = $myts->makeTareaData4Show( $description );
                    $item['urw']         = multimenu_create_url( 'item.php?id='.$id,
                                                                 $title,
                                                                 '_self',
                                                                 $xoopsModuleConfig['urw_count'] );
                    $xoopsTpl->append('items', $item);
                    unset($item);
     }
     
// Page navigation

		$sql = "SELECT COUNT(catid) FROM " . $xoopsDB->prefix($xoopsModule->dirname()."_menu")."
				WHERE status=1 AND ( title='' ".$like." )";

                $result = $xoopsDB -> queryF( $sql );
                list( $numrows )=$xoopsDB->fetchRow($result);

               $pagenav = new XoopsPageNav( $numrows, $xoopsModuleConfig['index_perpage'], $startpage, 'startpage',''  );
	       $xoopsTpl->assign('pagenav', $pagenav->renderImageNav());

include_once(XOOPS_ROOT_PATH."/footer.php");
?>