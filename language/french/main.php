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
  	                         'admIn'        => 'Admin',
  	                         'sitemap'      => 'Plan du site',

  	                         'n'            => 'N&#176;',
  	                         'image'        => 'Image',
  	                         'thumb'        => 'Vignette',

  	                         'title'        => 'Titre',
  	                         'close'        => 'Fermer',
  	                         'item'         => 'Item',
  	                         'description'  => 'Description',

  	                         'source_code'  => 'Code source',

  	                         'admins'       => 'Admin',
  	                         'edit'         => 'Editer',
  	                         'clone'        => 'Cloner',
  	                         'alt_title'    => 'Alternatif',
  	                         'other'        => 'Liste des ',

  	                         'menu'         => 'Menus',
  	                         'images'       => 'Images',
  	                         'templates'    => 'Templates',
  	                         'blocks'       => 'Blocs',
  	                         'settings'     => 'Param&#232;tres',
  	                         'utils'        => 'Utilitaires',
  	                         'delete'       => 'Supprimer',

  	                         'query'        => 'Requ&#234;te',
  	                         'link'         => 'Lien',
  	                         'block'        => 'Bloc',
  	                         'template'     => 'Templates',
  	                         'help'         => 'Aide',

  	                         'notactive'    => 'Cette page est indisponible.'
                                 );
                                 
// Settings values
 	$sett_val_array =  array( 

 	                          'thumb'                  => 'Couleur des vignettes',
 	                          'button'                 => 'Liens admin',
                                  'meta'                   => 'Meta',
 	                          'num'                    => 'Nombre',
 	                          'name'                   => 'Nom des items',
 	                          'slideshow'              => 'Diaporama',
 	                          'max_size'               => 'Taille maximum',
 	                          'keywords'               => 'Mots cl&#233;s',
 	                          'count'                  => 'Nombre',
 	                          'title_lenght'           => 'Longueur max des titres',
 	                          'display_selectmode'     => 'Afficher les diff&#233;rents modes',


                                  'banner'                 => 'Banni&#232;re',
                                  'background'             => 'Image de fond',
                                  'activation'             => 'Pages actives',
 	                          'desc'                   => 'Texte de la page d\'index',
 	                          'display'                => 'Infos affich&#233;es',
 	                          'cols'                   => 'Colonnes',
 	                          'list'                   => 'Liste des pages',
                                  'perpage'                => 'Items par page',
 	                          'thumbmw'                => 'Taille des vignettes',
 	                          'thumb_color'            => 'Couleurs des vignettes',
                                  'infobulle'              => 'Infobulles',
                                  'lenght'                 => 'Longueur max des titres',
                                  'imagemw'                => 'Taille des vignettes',
                                  'main'                   => 'Page d\'accueil',
                                  'template'               => 'Template',
 	                          'mode'                   => 'Template',
 	                          'dispsm'                 => 'Affichage des templates',
 	                          'edit_mode'              => 'Edition des template',
 	                          'selectmode'             => 'Templates disponibles',
 	                          'item_name'              => 'Nom des items',
 	                          'metakeyword'            => 'Mots cl&#233;s',
 	                          'metadesc'               => 'Meta Description',
 	                          'dir'                    => 'R&#233;pertoire de stockage',
                                  'tips'                    => 'Astuces',
 	                          'buttons'                => 'Boutons admin',
 	                          'urw'                    => 'URL Rewriting',
 	                          'ss'                    => 'Diaporama',
                                 );


                                 
// Render defines

        $item_val_array = array_merge( $main_val_array,
                                       $sett_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MULTIMENU_'.$item_lg),$item_val);
	}

?>