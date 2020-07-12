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
  	                         'dsc'         => 'Module de gestion de menus',
  	                         'clone'       => 'Cloner',
  	                         'submit'      => 'Envoyer',
  	                         'menu'        => 'Menu',
  	                         'link'        => 'Liens',
  	                         'query'        => 'Requ&#234;tes',
  	                         'block'        => 'Blocs',
  	                         'utils'        => 'Utilitaires',

  	                         'index'       => 'Index',
  	                         'sitemap'     => 'Plan du site',
  	                         'edit'        => 'Edition',
  	                         'help'        => 'Aide',
  	                         'settings'    => 'Param&#232;tres',
  	                         'item'        => 'Item',
  	                         'meta'        => 'Meta',
  	                         'slideshow'   => 'Diapo',

  	                         'indexdsc'       => 'Param&#232;tres de la page d\'index du module.',
  	                         'editdsc'        => 'Param&#232;tres d\'&#233;dition des pages du module.',
  	                         'helpdsc'        => 'Aide du module',
  	                         'settingsdsc'    => 'Liste de tous les param&#232;tres g&#233;n&#233;raux du module',
  	                         'itemdsc'        => 'Param&#232;tres des pages du module.',
  	                         'metadsc'        => 'Param&#232;tres des metas du module.',
  	                         'slideshowdsc'   => 'Param&#232;tres du mode diaporama.',

  	                         'index_dsc'       => 'Retourner &#224; la page d\'accueil du module.',
  	                         'menu_dsc'        => 'Ajouter, supprimer, dupliquer, &#233;diter un menu.',
  	                         'link_dsc'        => 'Ajouter, supprimer, dupliquer, &#233;diter un lien.',
  	                         'query_dsc'       => 'Ajouter, supprimer, dupliquer, &#233;diter une requ&#234;te dans la base de donn&#233;e.',
  	                         'image_dsc'       => 'Ajouter, supprimer, modifier une image.',
  	                         'template_dsc'    => 'Personnaliser les templates, feuilles de style et script d\'un menu.',
  	                         'block_dsc'       => 'Param&#233;ter un bloc.',
  	                         'settings_dsc'    => 'Param&#233;trer les pr&#233;f&#233;rences g&#233;n&#233;rales du module.',
  	                         'utils_dsc'       => 'Cloner le module.',
  	                         'help_dsc'        => 'Aide sur le module.'
                                 );

// Modinfo values
 	$pref_val_array =  array(
 	                          'mode_test'             => '* Valeurs',

 	                          'mode_item_thumb'        => 'Vignettes',
 	                          'mode_item_slideshow'    => 'Diaporama',

 	                          'mode_list_image'        => 'Images',
 	                          'mode_list_select'       => 'Bo&#238;te de s&#233;lection',
 	                          'mode_list_ul'           => 'Liste &#224; puce',

 	                          'welcome'                => '',
 	                          'metakeywords'           => '',
 	                          'metadescription'        => '',


 	                          'deactivated'            => 'D&#233;sactiv&#233;',
 	                          'all'                    => 'Tous'
                                 );

// Settings values
 	$sett_val_array =  array( 'banner'                 => 'Banni&#232;re',
 	                          'bannerdsc'                 => 'Url de la banni&#232;re &#224; afficher sur tout le module.',
 	                          'bannerhlp'                 => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'background'             => 'Image de fond',
 	                          'backgrounddsc'             => 'Url de l\'image de fond &#224; afficher sur tout le module.',
 	                          'backgroundhlp'             => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'activation'             => 'Pages actives',
 	                          'activationdsc'             => 'Liste des pages actives.',
                                  'activationhlp'             => 'Permet de d&#233;terminer quelles pages du modules sont actives en partie publique.',

 	                          'desc'                   => 'Texte de la page d\'index',
 	                          'descdsc'                   => 'Texte &#224; afficher sur la page d\'index du module.',
 	                          'deschlp'                   => 'Supporte le hmtl et les codes Xoops (smilies et balises). Laisser vide pour ne rien afficher.',

 	                          'display'                => 'Infos affich&#233;es',
 	                          'displaydsc'                => 'Liste des informations &#224; afficher en page d\'accueil du module.',
 	                          'displayhlp'                => 'S&#233;lection des types d\'informations &#224; afficher dans les pages publiques du module.',
 	                          'display_thumb'                => 'Vignette',
 	                          'display_description'          => 'Description',
 	                          'display_admin'                => 'Liens admin',

 	                          'cols'                   => 'Colonnes',
 	                          'colsdsc'                   => 'Nombre de colonnes souhait&#233;es.',
 	                          'colshlp'                   => 'Cette valeur concerne &#224; la fois l\'affichage des donn&#233;es sous forme de tableau en partie publique et administrative (ex : les images).',

 	                          'item_list'              => 'Liste des pages',
 	                          'item_listdsc'              => 'Mode d\'affichage de la liste des autres pages disponibles du module.',
 	                          'item_listhlp'              => 'Active et s&#233;lectionne la liste des autres pages disponibles en parte publique du module.',
 	                          'display_none'                 => '- Aucune -',
 	                          'display_images'               => 'Vignettes',
 	                          'display_select'               => 'Bo&#238;te de s&#233;lection',
 	                          'display_ul'                   => 'Liste &#224; puce',

 	                          'perpage'               =>  'Nombre d\'items par page',
 	                          'perpagedsc'                => 'Nombre maximum d\'items &#224; afficher par page.',
 	                          'perpagehlp'                => 'D&#233;termine le nombre d\'informations &#224; afficher par pages du module (liste de menus, de lien, d\'images, etc.) en partie publique et administrative.',

 	                          'thumbmw'                => 'Taille des vignettes',
 	                          'thumbmwdsc'                => 'D&#233;fini la largeur et la hauteur des vignettes en px.',
 	                          'thumbmwhlp'                => '',

 	                          'color'                  => 'Couleurs des vignettes',
 	                          'colordsc'                  => 'D&#233;fini la couleur de fond des vignettes.',
 	                          'colorhlp'                  => '',
 	                          
                                  'infobulle'              => 'Infobulles',
 	                          'infobulledsc'           => 'Forcer l\'affichage des infobulles.',
 	                          'infobullehlp'           => '',

 	                          'lenght'                 =>  'Longueur max des titres',
 	                          'lenghtdsc'              =>  'Taille maximum des titres en nombre de caract&#232;res.',
 	                          'lenghthlp'              =>  '',

 	                          'blocks'                 => 'Nombre de blocs',
 	                          'blocksdsc'              => 'D&#233;finir le nombre de bloc actifs.',
 	                          'blockshlp'              => 'D&#233;finir le nombre de bloc actifs.',

 	                          'imagemw'                => 'Taille des vignettes',
 	                          'imagemwdsc'                => 'D&#233;fini la largeur et la hauteur maximum des images en px.',
 	                          'imagemwhlp'                => 'D&#233;fini la largeur et la hauteur maximum des images en px.',

 	                          'main'                   => 'Page d\'accueil',
 	                          'maindsc'                   => 'D&#233;fini la page d\'accueil par d&#233;faut du module. Peut &#234;tre une url externe ou l\'ID d\'une des pages du module.',
 	                          'mainhlp'                   => '',

 	                          'template'               => 'Template',
 	                          'mode'                   => 'Template',
                                  'modedsc'                   => 'Mode d\'affichage par d&#233;faut du module.',
                                  'modehlp'                   => '',


 	                          'dispsm'                 => 'Affichage des templates',
 	                          'dispsmdsc'                 => 'Active ou non la liste de choix des diff&#233;rents modes d\'affichage des pages du module.',
 	                          'dispsmdhlp'                => '',

 	                          'edit_mode'              => 'Edition des template',
 	                          'edit_modedsc'              => 'Activer le mode "Edition de template"',
 	                          'edit_modehlp'              => '',

 	                          'selectmode'             => 'Templates disponibles',
 	                          'selectmodedsc'             => 'Active les diff&#233;rents modes d\'affichages des pages du module. ',
                                  'selectmodehlp'             => 'Attention : tous les modes restent utilisables ! Ce param&#232;tre ne d&#233;fini que les modes disponibles dans la bo&#238;te de s&#233;lection des modes disponibles c&#244;t&#233; utilisateur. ',

 	                          'item_name'              => 'Nom des items',
 	                          'item_namedsc'              => 'Nom de remplacement pour le terme \'Item\'.',
 	                          'item_namehlp'              => '',

 	                          'metakeyword'            => 'Mots cl&#233;s',
 	                          'metakeyworddsc'            => 'Mots cl&#233;s &#224; utiliser par d&#233;faut sur l\'ensemble du module.',
 	                          'metakeywordhlp'            => '',

 	                          'metadesc'               => 'Meta Description',
                                  'metadescdsc'               => 'Meta Description &#224; utiliser par d&#233;faut sur l\'ensemble du module.',
 	                          'metadeschlp'               => '',
 	                          
 	                          'dir'                    => 'R&#233;pertoire de stockage',
                                  'dirdsc'                    => 'R&#233;pertoire de stockage par d&#233;faut utilis&#233; lors de la cr&#233;ation d\'une nouvelle page.',
                                  'dirhlp'                    => '',
                                  
                                  'tip'                    => 'Astuces',
                                  'tipdsc'                    => 'Afficher les astuces.',
                                  'tiphlp'                    => '',

 	                          'buttons'                => 'Boutons admin',
 	                          'buttonsdsc'                => 'Format d\'affichage des boutons d\'administration.',
 	                          'buttonshlp'                => '',
 	                          'image'                        => 'Images',
 	                          'text'                         => 'Texte',
 	                          'button'                       => 'Bouton',
 	                          'select'                       => 'Bo&#238;te de s&#233;lection',
 	                          
 	                          'urw'                    => 'URL Rewriting',
 	                          'urwdsc'                    => 'Param&#232;tre de l\'url rewriting du module. 
                                                                  D&#233;fini le nombre de caract&#232;res minimum &#224; employer pour g&#233;n&#233;rer les mots utilis&#233;s dans l\'adresse de la page. ',
 	                          'urwhlp'                    => '',

 	                          'ss'                    => 'Diaporama',
                                  'ssdsc'                     => 'Param&#232;tre de transition des diaporamas en secondes. [Dur&#233;e d\'affichage&#124;Temps de transition]',
                                  'sshlp'                    => '',

 	                          'checkdir'                    => 'V&#233;rifier les liens',
                                  'checkdirdsc'                     => 'V&#233;rifier automatiquement la notation des liens lors de leur cr&#233;ation.',
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

