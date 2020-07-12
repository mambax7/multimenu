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

// General settings
include_once('header.php');
$xoopsOption['template_main'] = 'multimenu_item.html';
include_once(XOOPS_ROOT_PATH . '/header.php');

// Items pref activation
        foreach( $xoopsModuleConfig['index_display'] as $i=>$value )                { $$value = 1; $xoopsTpl->assign($value, 	1 ); }
        if ( !is_object($xoopsUser) || !$xoopsUser->isAdmin($xoopsModule->mid()) )   { $xoopsTpl->assign('is_admins', 	0 ); }

// Header informations
// Define here your operator list + the default values
$op = array( 'id'         =>      '',
             'mode'       =>      ''
           );
include_once('admin/include/admin_op_retrieve.php');

// Menu and like query?
        $like_multi = ereg_replace('groups', 'l.groups', $like);
        $link_result = "SELECT      l.id,
                                    l.pid,
                                    l.catid,
                                    l.type,
                                    l.status,
                                    l.relative,
                                    l.weight,
                                    l.title,
                                    l.alt_title,
                                    l.link,
                                    l.query,
                                    l.target,
                                    l.image,
                                    l.groups,
                                    l.css,

                                    m.status as menu_status,
                                    m.title as menu_title,
                                    m.image as menu_image,
                                    m.description,
                                    m.image_dir,
                                    m.template,
                                    m.css as menu_css

                          FROM " .      $xoopsDB->prefix("multimenu_menu") . " m
                          LEFT JOIN " . $xoopsDB->prefix("multimenu_link") . " l 
                          ON m.catid = l.catid
                          WHERE m.status>=1 AND l.status>=1 AND l.catid=$id AND ( m.catid='' ".$like_multi." )
                          ORDER BY l.weight";


        $link_list  = $xoopsDB->queryF( $link_result );
        $link_count = $xoopsDB->getRowsNum( $link_list );
                if( !$id || !$link_count )
                {
          	redirect_header('./', 2, _MULTIMENU_NOTACTIVE);
          	exit();
                }
        $menu_list  = $xoopsDB->queryF( $link_result );
        $myrow 	    = $xoopsDB->fetchArray( $menu_list, 1, 1 );

// Metagens
$description = $myrow['description'];
$title       = $myrow['menu_title'];

$image       = explode( '|', $myrow['menu_image'] );
$image[0]    = $image[0]?'../../'.$xoopsModuleConfig['edit_dir'].$image[0]:'';
$menu_image  = $image[1]?$image[1]:$image[0];


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


// Admin link
          $status_lnk = $myrow['menu_status']>0?0:1;
          $mode = $mode?$mode:$myrow['template'];
          $css_mode = multimenu_tpl_rename( $mode );
          if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid())) {
            include_once('admin/include/admin_buttons.php');
          $admin_buttons = array(
                                  'edit'           =>      'admin/index.php?admin=menu&catid='.$id.'&op=edit',
                                  'clone'          =>      'admin/index.php?admin=menu&catid='.$id.'&op=clone',
                                  'delete'         =>      'admin/index.php?admin=menu&catid='.$id.'&op=delete',
                                  'other'          =>      '',
                                  'link'           =>      'admin/index.php?admin=link&catid='.$id,
                                  'query'          =>      'admin/index.php?admin=query',
                                  'images'         =>      'admin/index.php?admin=images&catid='.$id,
                                  'blocks'         =>      'admin/index.php?admin=blocks',
                                  'templates'      =>      'admin/index.php?admin=templates&tpl='.$css_mode['file_name'],
                                  'settings'       =>      'admin/index.php?admin=settings',
                                  'help'           =>      'admin/index.php?admin=help'

                       );

          $admin  = multimenu_create_admin_links( $admin_buttons,
                                                 $id, $myrow['menu_status'],
                                                 'images/icon/',
                                                 '.png',
                                                 $xoopsModuleConfig['edit_button'],
                                                 '48'  );
          $admin .= multimenu_select_settings();
          } else { $admin = ''; }



// Language defines
  	$item_lg_array = array(  'index',
  	                         'other', 
  	                         'source_code'
                                 );

 	foreach ($item_lg_array as $item_lg) {
                 $xoopsTpl->assign($item_lg, 	constant( strtoupper('_'. $xoopsModule->dirname() . '_' . $item_lg) ));
	}


 // Datas
        $image  = explode('|', $xoopsModuleConfig['item_max_size']);
        $width  = $image[0]?' width="'.$image[0].'"' :'';
        $height = $image[1]?' height="'.$image[1].'"':'';

        $item_selectmode = $xoopsModuleConfig['item_selectmode'];
        if( $myrow['menu_status']==1 && $xoopsModuleConfig['item_list'] ) { include_once('item_list.php'); } elseif( $myrow['menu_status']!=1 ) { $banner = ''; }
        if( $xoopsModuleConfig['item_display_selectmode'] )          { include_once('template_list.php'); }

        $slideshow_settings = explode('|',$xoopsModuleConfig['slideshow_settings']);

// Style sheet && Scripts
$tpl_name = ereg_replace( '.html', '', $mode );
// $css_file = '../../'.$xoopsModuleConfig['edit_dir'].'cache/'.$css_name;
$css_link = multimenu_check_script_file( $tpl_name, $id, $xoopsModuleConfig['edit_dir'] . 'cache/', 'css' );
$script_link = multimenu_check_script_file( $tpl_name, $id, $xoopsModuleConfig['edit_dir'] . 'cache/', 'js' );

// Render Links
 $data['num'] = 1;
 $data = multimenu_render_link_list( $link_list, XOOPS_URL.'/'.$myrow['image_dir'], $xoopsModuleConfig['index_title_lenght'], 1, $xoopsModuleConfig['item_infobulle'], isset($is_image) );
 

 // Render values
  	$item_val_array = array( 'id'         => $id,
  	                         'css_link'   => $css_link,
  	                         'script_link'=> $script_link,
                                 'menu'       => $id,
                                 'data_list'  => $data['data_list'],
                                 'ii'         => $data['num'],
                                 'i'          => round($data['num']/$xoopsModuleConfig['item_cols']),
                                 'i_main'     => round($data['num_main']/$xoopsModuleConfig['item_cols']),
                                 'module'     => $xoopsModule->dirname(),
  	                         'status'     => $myrow['menu_status'],
  	                         'banner'     => $myrow['menu_status']==1&&$xoopsModuleConfig['index_banner']?'<a href="./" title="'.$xoopsModule -> getVar('name').'">'.$banner.'</a></h1>':'',
                                 'banner_url' => $myrow['menu_status']==1&&$xoopsModuleConfig['index_banner']?'../../'.$xoopsModuleConfig['index_banner']:'',
  	                         'background' => $myrow['menu_status']==1&&$xoopsModuleConfig['index_background']?'../../'.$xoopsModuleConfig['index_background']:'',
                                 'admin'      => $admin,
                                 'image_width'=> $width,
                                 'image_height'=> $height,
                                 'edit_mode'  => $xoopsModuleConfig['index_edit_mode'],
                                 'title'      => $myrow['menu_title']?$myts->makeTareaData4Show( $myrow['menu_title'] ):'',
  	                         'text'       => $myrow['description']?$myts->makeTareaData4Show( $myrow['description'] ):'',
  	                         'image'      => $menu_image,
                                 'cols'       => $xoopsModuleConfig['item_cols'],
                                 'mode'       => 'include/'.$mode,
                                 'duration'   => $slideshow_settings[0]*1000,
                                 'transition' => $slideshow_settings[1],
                                 'item_list'  => $myrow['menu_status']==1 && $xoopsModuleConfig['item_list']?$xoopsModuleConfig['item_list']:0,
                                 'item'       => $xoopsModuleConfig['item_name'],
                                 'css'        => ereg_replace('\{id}', $id, $myrow['menu_css']),
                                 'item_display_selectmode' => $xoopsModuleConfig['item_display_selectmode']
                                 );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}


include_once(XOOPS_ROOT_PATH."/footer.php");
?>