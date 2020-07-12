<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Multimenu v1.0								//
//  ------------------------------------------------------------------------ 	//

// Common values
 	$com_val_array =  array( 'option'     => 'Options',
  	                         'settings'   => 'Settings',
  	                         'item'       => 'Item',

  	                         'admin'      => 'Admin',
  	                         'edit'       => 'Edit',
  	                         'clone'      => 'Duplicate'
                                 );

// This block menu values
 	$block_val_array =  array( 'tpl'      => 'Template',
  	                           'tpldsc'   => 'Display mode.',
  	                           'ul'       => 'Unordered list',
  	                           'menu'     => 'Xoops main menu',
  	                           'image'    => 'Image',
  	                           'extended' => 'Extended',

        	                   'display'      => 'Display',
        	                   'displaydsc'      => 'Informations to display',
        	                   'title'           => 'Title',
        	                   'logo'            => 'Logo',

  	                           'status'   => 'Status',
  	                           'statusdsc'   => 'Displayed pages status.',
  	                           'online'          => 'Online',
  	                           'hidden'          => 'Hidden',
  	                           'offline'         => 'Offline',

  	                           'description'     => 'Description',
  	                           'descriptiondsc'  => 'Description text to be displayed in the block.',

  	                           'max'      => 'Maximum',
  	                           'maxdsc'          => 'Maximum links to display.<br />
                                    Warning : this function deactivate all sublinks except query sublinks !',


                                   'order'    => 'Order by',
                                   'orderdsc'    => 'Warning: mainlinks and sublinks would be mixed.',
                                   'weight'          => 'Weight',
  	                           'titleasc'        => 'Alphabetical order',
                                   'titledesc'       => 'Reversed alphabetical order',
                                   

  	                           'relative' => 'Display relatives links',

  	                           'cols'     => 'Columns',
  	                           'colsdsc'     => 'Number of columns.',

  	                           'maxwidth' => 'Thumbs sizes',
  	                           'maxwidthdsc' => 'Set default picture size.<br />
                                     (W-H).',
                                   'pix'         => 'pixels',

  	                           'maxtitle'  => 'Title lenght',
  	                           'maxtitledsc' => 'Set maximum caracters lenght of link title.',
                                   'char'        => 'caracters'
                                 );
                                 
// This item values
 	$block_item_array =  array('link'       => 'Links',
 	                           'random'         => 'Random',
 	                           'latest'         => 'Latest',
 	                           'popular'        => 'Popular',
 	                           'slideshow'   => 'Slideshow',
 	                           'select'      => 'Menu',
 	                           'selectdsc'      => 'Set which menu to display.',
 	                           'list'            => 'Menus\'s list',
 	                           'all'         => '[ALL]',
 	                           'alt_title'   => 'Tooltip'
                                 );

// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $block_val_array,
                                       $block_item_array
                                      );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MB_MULTIMENU_'.$item_lg),$item_val);
	}
?>