<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2008 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

// Common values
$main_val_array =  array(        'index'        => 'Index',
  	                         'admin'        => 'Admin',
  	                         'admins'       => 'Admin',
  	                         'sitemap'      => 'Sitemap',

  	                         'n'            => 'N°',
  	                         'image'        => 'Image',
  	                         'title'        => 'Title',
  	                         'close'        => 'Close',
  	                         'item'         => 'Item',
  	                         'description'  => 'Description',

  	                         'source_code'  => 'Source code',
  	                         'edit'         => 'Edit',
  	                         'clone'        => 'Duplicate',
  	                         'alt_title'    => 'Tooltip',
  	                         'other'        => 'Other ',

  	                         'menu'         => 'Menus',
  	                         'images'       => 'Images',
  	                         'templates'    => 'Templates',
  	                         'blocks'       => 'Blocks',
  	                         'settings'     => 'Settings',
  	                         'utils'        => 'Utilities',
  	                         'delete'       => 'Delete',

  	                         'query'        => 'Query',
  	                         'link'         => 'Link',
  	                         'block'        => 'Block',
  	                         'template'     => 'Template',
  	                         'help'         => 'Help',

  	                         'notactive'    => 'This page is not active.'
                                 );
                                 
// Settings values
 	$sett_val_array =  array( 

 	                          'thumb'                  => 'Thumb color',
 	                          'button'                 => 'Admin links',
                                  'meta'                   => 'Meta',
 	                          'num'                    => 'Number',
 	                          'name'                   => 'Items\' name',
 	                          'slideshow'              => 'Slideshow',
 	                          'max_size'               => 'Maximum size',
 	                          'keywords'               => 'Keywords',
 	                          'count'                  => 'Number',
 	                          'title_lenght'           => 'Maximum title lenght',
 	                          'display_selectmode'     => 'Display available templates',


                                  'banner'                 => 'Banner',
                                  'background'             => 'Background picture',
                                  'activation'             => 'Active pages',
 	                          'desc'                   => 'Index page text',
 	                          'display'                => 'Displayed informations',
 	                          'cols'                   => 'Columns',
 	                          'list'                   => 'Pages list',
                                  'perpage'                => 'Items per page',
 	                          'thumbmw'                => 'Thumbs sizes',
 	                          'thumb_color'            => 'Thumbs colors',
                                  'infobulle'              => 'Tooltips',
                                  'lenght'                 => 'Maximum title size',
                                  'imagemw'                => 'Maximum thumb size',
                                  'main'                   => 'Home page',
                                  'template'               => 'Template',
 	                          'mode'                   => 'Template',
 	                          'dispsm'                 => 'Display available templates',
 	                          'edit_mode'              => 'Edit mode',
 	                          'selectmode'             => 'Available templates',
 	                          'item_name'              => 'Items name',
 	                          'metakeyword'            => 'Meta keywords',
 	                          'metadesc'               => 'Meta Description',
 	                          'dir'                    => 'Default file directory',
                                  'tip'                    => 'Tips',
 	                          'buttons'                => 'Admin links',
 	                          'urw'                    => 'URL Rewriting',
 	                          'ss'                     => 'Slideshow'
                                 );


                                 
// Render defines

        $item_val_array = array_merge( $main_val_array,
                                       $sett_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MULTIMENU_'.$item_lg),$item_val);
	}

?>