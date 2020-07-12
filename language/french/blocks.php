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
  	                         'settings'   => 'Param&#232;tres',
  	                         'item'      => 'Item',

  	                         'admin'      => 'Admin',
  	                         'edit'      => 'Editer',
  	                         'clone'      => 'Dupliquer'
                                 );

// This block menu values
 	$block_val_array =  array( 'tpl'   => 'Template',
  	                           'tpldsc'=> 'Type d\'affichage du bloc.',
  	                           'ul'=> 'Liste &#224; puce',
  	                           'menu'=> 'Menu principal de Xoops',
  	                           'image'=> 'Images *',
  	                           'extended'=> 'Etendu **',

        	                   'display'      => 'Affichage',
        	                   'displaydsc'      => 'Information &#224; afficher',
        	                   'title'      => 'Titre',
        	                   'logo'      => 'Logo',

  	                           'status'   => 'Status',
  	                           'statusdsc'=> 'Status des pages &#224; afficher.',
  	                           'online'=> 'Activ&#233;',
  	                           'hidden'=> 'Cach&#233;',
  	                           'offline'=> 'D&#233;sactiv&#233;',

  	                           'description'=> 'Description',
  	                           'descriptiondsc'=> 'Texte de description &#224; afficher dans le block.',

  	                           'max'=> 'Maximum',
  	                           'maxdsc'=> 'Maximum de lien &#224; afficher.',


                                   'order'=> 'Classer par',
                                   'orderdsc'=> 'Attention : liens principaux et sous-liens seront m&#233;lang&#233;s.',
                                   'weight'=> 'Poids',
  	                           'titleasc'=> 'Ordre alphab&#233;tique',
                                   'titledesc'=> 'Ordre alphab&#233;tique inverse',
                                   

  	                           'relative'=> 'forcer les liens relatifs',

  	                           'cols'=> 'Colonnes **',
  	                           'colsdsc'=> 'Nombre de colonnes &#224; afficher.',

  	                           'maxwidth'=> 'Taille des vignettes * **',
  	                           'maxwidthdsc'=> 'Taille d\'affichage des vignettes.<br />
                                     (L-H).',
                                   'pix'=> 'pixels',

  	                           'maxtitle'=> 'Longueur des titres',
  	                           'maxtitledsc'=> 'Longueur maximum des titres de lien.',
                                   'char'=> 'caract&#232;res',

  	                           'ext'=> 'Extensions * **',
  	                           'extdsc'=> 'Formats autoris&#233;s des images &#224; afficher.',
  	                           'ast'=> '* Menus auxquels s\'appliquent ces param&#232;tres.'
                                 );
                                 
// This item values
 	$block_item_array =  array( 'link'       => 'Liens',
 	                           'description' => 'Description',
 	                           'random'      => 'Al&#233;atoire',
 	                           'latest'      => 'Dernier',
 	                           'popular'     => 'Populaire',
 	                           'slideshow'   => 'Diaporama **',
 	                           'select'      => 'Page',
 	                           'selectdsc'   => 'Choix de la page &#224; afficher.',
 	                           'list'        => 'Liste des menus',
 	                           'maxi'        => 'Nombre de lien',
 	                           'maxdsc'      => 'Nombre maximum de lien principaux &#224; afficher dans le bloc.<br />
                                    Attention : cette fonctionnalit&#233; d&#233;sactive les sous-liens !',
 	                           'all'         => '[Tous]',
 	                           'alt_title'   => 'Infobulles'
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