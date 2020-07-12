<?php

//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    			//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                                //
//                   								//
//                  Authors :							//
//						- solo (www.wolfpackclan.com)   //
//                  Multimenu v2.0						//
//  ------------------------------------------------------------------------ 	//

    Global $xoopsModule, $xoopsModuleConfig, $module;

$modversion['name']        = _MI_MULTIMENU_NAME;
$modversion['version']     = 2.08;
$modversion['description'] = _MI_MULTIMENU_DSC;
$modversion['credits']     = "WolFactory (www.wolfpackclan.com/wolfactory)";
$modversion['author']      = "Solo";
$modversion['help']        = "";
$modversion['license']     = "GPL see LICENSE";
$modversion['official']    = 0;
$modversion['image']       = "images/multimenu_slogo.png";
$modversion['dirname']     = "multimenu";

// XoopsInfo
$modversion['developer_website_url'] 	= "http://wolfactory.wolfpackclan.com/";
$modversion['developer_website_name']	= "wolfactory.wolfpackclan.com";
$modversion['download_website']		= "http://www.arma-sa.com/modules/mydownloads/";
$modversion['status_fileinfo'] 		= "http://www.wolfpackclan.com/wolfactory/version/multimenu.version";
$modversion['status_version'] 		= "2.06";
$modversion['status'] 			= "2.06";
$modversion['date'] 			= "2008-05-01";
$modversion['demo_site_url']		= "http://wolfactory.wolfpackclan.com/";
$modversion['demo_site_name'] 		= "Wolfactory";
$modversion['support_site_url'] 	= "http://www.frxoops.org";
$modversion['support_site_name'] 	= "Xoops France";
$modversion['submit_bug']		= "";
$modversion['submit_feature'] 		= "";

// Install or update
$modversion['onInstall'] = 'include/multimenu_install.php';
$modversion['onUpdate']  = 'include/multimenu_update.php';

// sql tables
$i=0;
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][$i]       = "multimenu_menu";
$modversion['tables'][++$i]     = "multimenu_link";
$modversion['tables'][++$i]     = "multimenu_query";

// Templates
$i=0;
$modversion['templates'][$i]['file']        = 'multimenu_header.html';
$modversion['templates'][$i]['description'] = '';
$modversion['templates'][++$i]['file']      = 'multimenu_footer.html';
$modversion['templates'][$i]['description'] = '';
$modversion['templates'][++$i]['file']      = 'multimenu_index.html';
$modversion['templates'][$i]['description'] = '';
$modversion['templates'][++$i]['file']      = 'multimenu_item.html';
$modversion['templates'][$i]['description'] = '';
$modversion['templates'][++$i]['file']      = 'multimenu_tpl.html';
$modversion['templates'][$i]['description'] = '';

// included main templates

 if( isset( $module ) ) {
   include_once(XOOPS_ROOT_PATH . '/class/xoopslists.php' );
      $tpl_list = XoopsLists :: getHtmlListAsArray( '../multimenu/templates/include' );
      asort($tpl_list);
      foreach($tpl_list as $ii=>$data) {
        if( $data != 'index.html' ) {
            $value = str_replace('.html','',$data);
            $value = str_replace($modversion['dirname'].'_','',$value);
            $file_name = @constant(strtoupper('_MI_MULTIMENU_MODE_' . $value));
            $value = str_replace('_',' ',$value);
            $file  = $data;
            $name  = $file_name?$file_name:ucfirst($value);
        $modversion['templates'][++$i]['file']      = 'include/'.$file;
        $modversion['templates'][$i]['description'] = $name;
        $options_tpl[$name] = $file;
        }
      }


// included list templates

      $tpl_list = XoopsLists :: getHtmlListAsArray( '../multimenu/templates/list' );
      asort($tpl_list);
      foreach($tpl_list as $ii=>$data) {
        if( $data != 'index.html' ) {
            $value = str_replace('.html','',$data);
            $value = str_replace($modversion['dirname'].'_','',$value);
            $file_name = constant(strtoupper('_MI_MULTIMENU_MODE_' . $value));
            $value = str_replace('_',' ',$value);
            $file  = 'list/'.$data;
            $name  = $file_name?$file_name:ucfirst($value);
        $modversion['templates'][++$i]['file']      = $file;
        $modversion['templates'][$i]['description'] = $name;
        }
      }
}


// Admin
// Admin things
$i=0;
$modversion['hasAdmin']                     = 1;
$modversion['adminindex']                   = "admin/";
$modversion['adminmenu']                    = "admin/include/menu.php";
// $modversion['sub'][$i]['name']              =  _MI_MULTIMENU_INDEX;
// $modversion['sub'][$i++]['url']             = 'index.php';

/*
if( isset($xoopsModuleConfig) && $xoopsModule->dirname() == $modversion['dirname'] ) {
     foreach( $xoopsModuleConfig['index_activation'] as $value ) {
      if( $value!='item' ) {
      $modversion['sub'][$i]['name'] =  @constant(strtoupper('_MULTIMENU_' . $value));
      $modversion['sub'][$i++]['url'] = $value.'.php';
      }
     }
}
*/

// Main
$modversion['hasMain'] = 1;

// Blocks

/*if( isset( $module ) && isset( $xoopsModule ) && $xoopsModule->dirname() == 'system') {
include_once('blocks/block.php');
$max=multimenu_getmoduleoption('block_num', 'multimenu');
$max=$max?$max:4;
*/
$max=6;
$i=1;
for($i;$i<=$max;$i++) {
  $modversion['blocks'][$i]['file']        = "block.php";
  $modversion['blocks'][$i]['name']        = _MI_MULTIMENU_ITEM . ' ' . $i;
  $modversion['blocks'][$i]['description'] = "";
  $modversion['blocks'][$i]['show_func']   = 'a_multimenu_item_show';
  $modversion['blocks'][$i]['edit_func']   = 'a_multimenu_item_edit';
  $modversion['blocks'][$i]['options']     = 'multimenu_ul.html|is_title,is_image,is_infobulle,is_relative|1|0|1|32-|weight|128|';
  $modversion['blocks'][$i]['template']    = 'multimenu_block_'.$i.'.html';
}

// }

// Options
// Index Settings : User side
$i=0;
$modversion['config'][$i]['name']        = 'index_banner';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_BANNER';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_BANNERDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_BANNERHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'modules/multimenu/images/banners.gif';

$modversion['config'][$i]['name']        = 'index_background';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_BACKGROUND';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_BACKGROUNDDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_BANNERHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'modules/multimenu/images/background.gif';

/*            $options = array(  '_MI_MULTIMENU_INDEX'         =>     'index',
                               '_MI_MULTIMENU_ITEM'          =>     'item'
                               );

$modversion['config'][$i]['name']         = 'index_activation';
$modversion['config'][$i]['title']        = '_MI_MULTIMENU_ACTIVATION';
$modversion['config'][$i]['description']  = '_MI_MULTIMENU_ACTIVATIONDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_ACTIVATIONHLP';
$modversion['config'][$i]['formtype']     = 'select_multi';
$modversion['config'][$i]['valuetype']    = 'array';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']    = $options;
*/

$modversion['config'][$i]['name']         = 'index_description';
$modversion['config'][$i]['title']        = '_MI_MULTIMENU_DESC';
$modversion['config'][$i]['description']  = '_MI_MULTIMENU_DESCDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_DESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_MULTIMENU_WELCOME;


            $options = array( '_MI_MULTIMENU_DISPLAY_IMAGES'      => 'is_image',
                              '_MI_MULTIMENU_DISPLAY_DESCRIPTION' => 'is_description',
                              '_MI_MULTIMENU_DISPLAY_ADMIN'       => 'is_admin'  );

$modversion['config'][$i]['name']         = 'index_display';
$modversion['config'][$i]['title']        = '_MI_MULTIMENU_DISPLAY';
$modversion['config'][$i]['description']  = '_MI_MULTIMENU_DISPLAYDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_DISPLAYHLP';
$modversion['config'][$i]['formtype']     = 'select_multi';
$modversion['config'][$i]['valuetype']    = 'array';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']    = $options;

            $options = array( '5'  => 5,
                              '8'  => 8,
                              '10' => 10,
                              '12' => 12,
                              '15' => 15,
                              '20' => 20,
                              '30' => 30,
                              '50' => 50,
                              '100'=> 100,
                              '_MI_MULTIMENU_ALL'=> 100000  );

$modversion['config'][$i]['name']        = 'index_perpage';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_PERPAGEDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_PERPAGEHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = '12';

$modversion['config'][$i]['name'] = 'index_main';
$modversion['config'][$i]['title'] = '_MI_MULTIMENU_MAIN';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_MAINDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_MAINHLP';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i++]['default'] = '';

$modversion['config'][$i]['name'] = 'index_title_lenght';
$modversion['config'][$i]['title'] = '_MI_MULTIMENU_LENGHT';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_LENGHTDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_LENGHTHLP';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i++]['default'] = 64;

$modversion['config'][$i]['name'] = 'index_edit_mode';
$modversion['config'][$i]['title'] = '_MI_MULTIMENU_EDIT_MODE';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_EDIT_MODEDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_EDIT_MODEHLP';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i++]['default'] = 1;






// Item settings
            $options = array( '1' => 1,
                              '2' => 2,
                              '3' => 3,
                              '4' => 4,
                              '5' => 5  );

$modversion['config'][$i]['name']        = 'item_cols';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_COLS';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_COLSDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_COLSHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = '4';

            $options = array( '_MI_MULTIMENU_DISPLAY_NONE'   => 0,
                              '_MI_MULTIMENU_DISPLAY_UL'     => 'list/multimenu_list_ul.html',
                              '_MI_MULTIMENU_DISPLAY_SELECT' => 'list/multimenu_list_select.html',
                              '_MI_MULTIMENU_DISPLAY_IMAGES' => 'list/multimenu_list_image.html' );

$modversion['config'][$i]['name']        = 'item_list';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_ITEM_LIST';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_ITEM_LISTDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_ITEM_LISTHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = 'list/multimenu_list_ul.html';

$modversion['config'][$i]['name']        = 'item_max_size';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_THUMBMW';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_THUMBMWDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_THUMBMWHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '160|160';

$modversion['config'][$i]['name']        = 'item_thumb_color';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_COLOR';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_COLORDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_COLORHLP';
$modversion['config'][$i]['formtype']    = 'color';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '#FFFFFF';

$modversion['config'][$i]['name'] = 'item_mode';
$modversion['config'][$i]['title'] = '_MI_MULTIMENU_MODE';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_MODEDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_MODEHLP';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'multimenu_ul.html';
$modversion['config'][$i++]['options'] = isset($options_tpl)?$options_tpl:'';

$modversion['config'][$i]['name'] = 'item_display_selectmode';
$modversion['config'][$i]['title'] = '_MI_MULTIMENU_DISPSM';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_DISPSMDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_DISPSMDHLP';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i++]['default'] = 1;

$modversion['config'][$i]['name']      = 'item_selectmode';
$modversion['config'][$i]['title']     = '_MI_MULTIMENU_SELECTMODE';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_SELECTMODEDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_SELECTMODEHLP';
$modversion['config'][$i]['formtype']  = 'select_multi';
$modversion['config'][$i]['valuetype'] = 'array';
$modversion['config'][$i]['default']   = isset($options_tpl)?$options_tpl:'';
$modversion['config'][$i++]['options'] = isset($options_tpl)?$options_tpl:'';

    	$options = array( _MI_MULTIMENU_IMAGE   => 'image',
    	                  _MI_MULTIMENU_BUTTON  => 'button',
    	                  _MI_MULTIMENU_SELECT  => 'select',
    	                  _MI_MULTIMENU_TEXT    => 'text',
                              );
                              
$modversion['config'][$i]['name']        = 'item_name';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_ITEM_NAME';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_ITEM_NAMEDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_ITEM_NAMEHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'menus';

$modversion['config'][$i]['name']        = 'item_infobulle';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_INFOBULLE';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_INFOBULLEDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_INFOBULLEHLP';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i++]['default']   = 0;



// Bloc settings
$modversion['config'][$i]['name']        = 'block_num';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_BLOCKS';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_BLOCKSDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_BLOCKSHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 4;


// Edit settings
$modversion['config'][$i]['name']         = 'edit_button';
$modversion['config'][$i]['title']        = '_MI_MULTIMENU_BUTTONS';
$modversion['config'][$i]['description']  = '_MI_MULTIMENU_BUTTONSDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_BUTTONSHLP';
$modversion['config'][$i]['formtype']     = 'select';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i]['default']      = 'text';
$modversion['config'][$i++]['options']    = $options;

$modversion['config'][$i]['name']        = 'edit_dir';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_DIR';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_DIRDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_DIRHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'uploads/multimenu/';

$modversion['config'][$i]['name']        = 'edit_tips';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_TIP';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_TIPDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_TIPHLP';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i++]['default']   = 1;

$modversion['config'][$i]['name']        = 'edit_check_dir';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_CHECKDIR';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_CHECKDIRDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_CHECKDIRHLP';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i++]['default']   = 1;



// Meta settings
$modversion['config'][$i]['name']         = 'meta_keywords';
$modversion['config'][$i]['title']        = '_MI_MULTIMENU_METAKEYWORD';
$modversion['config'][$i]['description']  = '_MI_MULTIMENU_METAKEYWORDDSC';
$modversion['config'][$i]['help']         = '_MI_MULTIMENU_METAKEYWORDHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_MULTIMENU_METAKEYWORDS;

$modversion['config'][$i]['name']         = 'meta_description';
$modversion['config'][$i]['title']        = '_MI_MULTIMENU_METADESC';
$modversion['config'][$i]['description']  = '_MI_MULTIMENU_METADESCDSC';
$modversion['config'][$i]['help']         = '_MI_MULTIMENU_METADESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_MULTIMENU_METADESCRIPTION;

// Slideshow settings
$modversion['config'][$i]['name']        = 'slideshow_settings';
$modversion['config'][$i]['title']       = '_MI_MULTIMENU_SS';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_SSDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_SSHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '5|3';

// URL rewriting
$modversion['config'][$i]['name'] = 'urw_count';
$modversion['config'][$i]['title'] = '_MI_MULTIMENU_URW';
$modversion['config'][$i]['description'] = '_MI_MULTIMENU_URWDSC';
$modversion['config'][$i]['help']        = '_MI_MULTIMENU_URWHLP';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '0';
$modversion['config'][$i++]['options'] = array( _MI_MULTIMENU_DEACTIVATED => '0',
                                                _MI_MULTIMENU_ALL => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4', 
                                                '5' => '5' );
?>