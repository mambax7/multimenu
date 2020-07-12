<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System    		     //
//                    Copyright (c) 2004 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                   							     //
//                  Authors :						     //
//						- solo (www.wolfpackclan.com)//
//                  Multimenu v1.0						     //
//  ------------------------------------------------------------------------ //

// Common values
 	$com_val_array =  array( 'name'        => 'Multimenu',
  	                         'dsc'         => 'Menu and navigation managing module',
  	                         'clone'       => 'Duplicate',
  	                         'submit'      => 'Submit',
  	                         'menu'        => 'Menu',
  	                         'link'        => 'Link',
  	                         'query'        => 'Query',
  	                         'block'        => 'Blocks',
  	                         'utils'        => 'Utilities',

  	                         'index'       => 'Index',
  	                         'sitemap'     => 'Sitemap',
  	                         'edit'        => 'Edit',
  	                         'help'        => 'Help',
  	                         'settings'    => 'Settings',
  	                         'item'        => 'Item',
  	                         'meta'        => 'Meta',
  	                         'slideshow'   => 'Slideshow',

  	                         'indexdsc'       => 'Module index pages settings (User side).',
  	                         'editdsc'        => 'Module edition pages settings (Admin side).',
  	                         'helpdsc'        => 'Help on module',
  	                         'settingsdsc'    => 'Module general settings list',
  	                         'itemdsc'        => 'Module items settings.',
  	                         'metadsc'        => 'Module meta settings.',
  	                         'slideshowdsc'   => 'Slideshow settings.',

  	                         'index_dsc'       => 'Go back to module index page (User side).',
  	                         'menu_dsc'        => 'Add, delete, duplicate, edit a menu.',
  	                         'link_dsc'        => 'Add, delete, duplicate, edit a link.',
  	                         'query_dsc'       => 'Add, delete, duplicate, edit a database query.',
  	                         'image_dsc'       => 'Add, delete, edit an image.',
  	                         'template_dsc'    => 'Customise templates, style sheet and script.',
  	                         'block_dsc'       => 'Set a block up.',
  	                         'settings_dsc'    => 'Set general modules preferences up.',
  	                         'utils_dsc'       => 'Duplicate module.',
  	                         'help_dsc'        => 'Help about the module.'
                                 );

// Modinfo values
 	$pref_val_array =  array(
 	                          'mode_test'             => 'Values',

 	                          'mode_item_thumb'        => 'Thumb',
 	                          'mode_item_slideshow'    => 'Slideshow',

 	                          'mode_list_image'        => 'Images',
 	                          'mode_list_select'       => 'Select box',
 	                          'mode_list_ul'           => 'Unordered list',

 	                          'welcome'                => '',
 	                          'metakeywords'           => '',
 	                          'metadescription'        => '',


 	                          'deactivated'            => 'Off',
 	                          'all'                    => 'All'
                                 );

// Settings values
 	$sett_val_array =  array( 'banner'                 => 'Banner',
 	                          'bannerdsc'                 => 'Banner\'s url displayed on the module.',
 	                          'bannerhlp'                 => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'background'             => 'Background picture',
 	                          'backgrounddsc'             => 'Background image\'s url displayed on the module.',
 	                          'backgroundhlp'             => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'activation'             => 'Active pages',
 	                          'activationdsc'             => 'List of active page.',
                                  'activationhlp'             => 'Permet de d&eacute;terminer quelles pages du modules sont actives en partie publique.',

 	                          'desc'                   => 'Index page text',
 	                          'descdsc'                   => 'Text displayed on the module\'s index page.',
 	                          'deschlp'                   => 'Supporte le hmtl et les codes Xoops (smilies et balises). Laisser vide pour ne rien afficher.',

 	                          'display'                => 'Displayed infos',
 	                          'displaydsc'                => 'List of informations displayed on the index page.',
 	                          'displayhlp'                => 'S&eacute;lection des types d\'informations &agrave; afficher dans les pages publiques du module.',
 	                          'display_thumb'                => 'Vignette',
 	                          'display_description'          => 'Description',
 	                          'display_admin'                => 'Liens admin',

 	                          'cols'                   => 'Columns',
 	                          'colsdsc'                   => 'Number of columns.',
 	                          'colshlp'                   => 'Cette valeur concerne &agrave; la fois l\'affichage des donn&eacute;es sous forme de tableau en partie publique et administrative (ex : les images).',

 	                          'item_list'              => 'Page list',
 	                          'item_listdsc'              => 'Display module\'s page list.',
 	                          'item_listhlp'              => 'Active et s&eacute;lectionne la liste des autres pages disponibles en parte publique du module.',
 	                          'display_none'                 => '- None -',
 	                          'display_images'               => 'Thumb',
 	                          'display_select'               => 'Select box',
 	                          'display_ul'                   => 'Unordered list',

 	                          'perpage'               =>  'Items per page',
 	                          'perpagedsc'                => 'Number of items displayed per page.',
 	                          'perpagehlp'                => 'D&eacute;termine le nombre d\'informations &agrave; afficher par pages du module (liste de menus, de lien, d\'images, etc.) en partie publique et administrative.',

 	                          'thumbmw'                => 'Thumb size',
 	                          'thumbmwdsc'                => 'Default height and width of thumb images.',
 	                          'thumbmwhlp'                => '',

 	                          'color'                  => 'Thumb colors',
 	                          'colordsc'                  => 'Default color used to generate thumbs.',
 	                          'colorhlp'                  => '',
 	                          
                                  'infobulle'              => 'Tooltips',
 	                          'infobulledsc'           => 'Force tooltips display on links.',
 	                          'infobullehlp'           => '',

 	                          'lenght'                 =>  'Max title size',
 	                          'lenghtdsc'              =>  'Maximum caracter used on links.',
 	                          'lenghthlp'              =>  '',

 	                          'blocks'                 => 'Number of Blocks',
 	                          'blocksdsc'              => 'Number of blocks generated by the module. If value changed, update module to generate required blocks.',
 	                          'blockshlp'              => '',

 	                          'main'                   => 'Index redirection',
 	                          'maindsc'                   => 'Set a redirection on the main index page. <br />
                                   May be a relative or absolute url.',
 	                          'mainhlp'                   => '',

 	                          'template'               => 'Template',
 	                          'mode'                   => 'Template',
                                  'modedsc'                   => 'Default display mode.',
                                  'modehlp'                   => '',

 	                          'dispsm'                 => 'Template display',
 	                          'dispsmdsc'                 => 'Display template selector on item pages (user side).',
 	                          'dispsmdhlp'                => '',

 	                          'selectmode'             => 'Active templates visible',
 	                          'selectmodedsc'             => 'Select active templates for use in the module (user and admin side). ',
                                  'selectmodehlp'             => 'Attention : tous les modes restent utilisables ! Ce param&egrave;tre ne d&eacute;fini que les modes disponibles dans la bo&icirc;te de s&eacute;lection des modes disponibles c&ocirc;t&eacute; utilisateur. ',

 	                          'edit_mode'              => 'Template edition',
 	                          'edit_modedsc'              => 'Display template code on item pages (Admin only!).',
 	                          'edit_modehlp'              => '',

 	                          'item_name'              => 'Items name',
 	                          'item_namedsc'              => 'Replacement item name.',
 	                          'item_namehlp'              => '',

 	                          'metakeyword'            => 'Meta Keywords',
 	                          'metakeyworddsc'            => 'Meta keywords used on the module.',
 	                          'metakeywordhlp'            => '',

 	                          'metadesc'               => 'Meta Description',
                                  'metadescdsc'               => 'Default meta description used on the module (replaced by menu description if any).',
 	                          'metadeschlp'               => '',
 	                          
 	                          'dir'                    => 'Image directory',
                                  'dirdsc'                    => 'Image directory where module images are stocked.',
                                  'dirhlp'                    => '',
                                  
                                  'tip'                    => 'Tips',
                                  'tipdsc'                    => 'Display tips and tricks in a box (Admin side).',
                                  'tiphlp'                    => '',

 	                          'buttons'                => 'Admin links',
 	                          'buttonsdsc'                => 'Selecte admin links display mode (Admin only)',
 	                          'buttonshlp'                => '',
 	                          'image'                        => 'Image',
 	                          'text'                         => 'Text',
 	                          'button'                       => 'Buttons',
 	                          'select'                       => 'Select box',
 	                          
 	                          'urw'                    => 'URL Rewriting',
 	                          'urwdsc'                    => 'Modules\'s url rewriting settings.
                                                                  Set number of characters used to generate urw rewriting adress (based on menu title). ',
 	                          'urwhlp'                    => '',

 	                          'ss'                    => 'Slideshow settings',
                                  'ssdsc'                     => 'Slideshow general settings in milliseconds. [Duration&amp;#124;Transition]',
                                  'sshlp'                     => '',

 	                          'checkdir'                    => 'Check links',
                                  'checkdirdsc'                     => 'Automatically check links notation.',
                                  'checkdirhlp'                     => ''

                                 );


// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $pref_val_array,
                                       $sett_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MI_MULTIMENU_'.$item_lg),$item_val);
	}
?>

