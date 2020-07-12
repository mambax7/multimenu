<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/

 $main_val_array['introduction']  =  array( ''      => 'Ce module permet de g&#233;n&#233;rer des listes de lien ou menus manuellement ou automatiquement.

Voici les variables de template disponibles pour vos templates personnalis&#233;es.

2 types de variables : <ul>
<li><b>les variables fixes</b>
<i>Ces variables sont pour la plupart d&#233;finies par d&#233;faut, ou dans les pr&#233;f&#233;rences du module.</i>
</li>
<li><b>les variables dynamiques </b>
<i>Ces variables sont d&#233;finies en fonction du contenu de chaque menu, ou des pages cr&#233;&#233;es par l\'utilisateur. 
Elles sont valables aussi bien pour les pages de contenu du module que des blocs.</i></li>
</ul>' );

 $main_val_array['language_define'] =  array(
                                  '<{$index}>'        => 'Index',
                                  '<{$other}>'        => 'Autre',
                                  '<{$sourcecode}>'   => 'Code source'
                                   );


 $main_val_array['fixes_item'] =  array(
                                  '<{$id}>'            => '[MENU] id du menu.|1',
                                  '<{$css_link}>'      => '[MENU] Lien pointant vers le fichier CSS du menu en cours.|http:&#47;&#47;[..]/multimenu_my_menu.css',
                                  '<{$script_link}>'   => '[MENU] Lien pointant vers le fichier de script .JS du menu en cours.|http:&#47;&#47;[..]/multimenu_my_menu.js',
                                  '<{$menu}>'          => '[MENU] id du menu.|1',
                                  '<{$status}>'        => '[MENU] Status du menu en cours (0 : Hors ligne, 1 : en ligne, 2 : cach&#233;).|1',
                                  '<{$title}>'         => '[MENU] Titre du menu en cours.|Menu Utilisateur',
                                  '<{$css}>'           => '[MENU] Feuille de style du menu.|multimenu_1 {color:Red;}',
                                  '<{$description}>'   => '[MENU] Description du menu en cours.|Voici le menu utilisateur.',

                                  '<{$banner_url}>'    => '[PREF] URL de la banni&#232;re du module.|http:&#47;&#47;[..]/banner.gif',
                                  '<{$background}>'    => '[PREF] URL de l\'Image de fond du module.|http:&#47;&#47;[..]/background_image.gif',
                                  '<{$image_width}>'   => '[PREF] Largeur par d&#233;faut des images.|160',
                                  '<{$image_height}>'  => '[PREF] Hauteur par d&#233;faut des images.|160',
                                  '<{$edit_mode}>'     => '[PREF] Activation ou nom du mode "&#233;dition" (affichage du code source du menu par d&#233;faut).|1',
                                  '<{$cols}>'          => '[PREF] Nombre de colonnes.|3',
                                  '<{$duration}>'      => '[PREF] Dur&#233;e en millisecondes.|1000',
                                  '<{$transition}>'    => '[PREF] Transition en millisecondes.|1000',
                                  '<{$item_list}>'     => '[PREF] Mode d\'affichage de la liste des menus disponibles.|1',
                                  '<{$item}>'          => '[PREF] Nom g&#233;n&#233;rique des "items".|Menus',
                                  '<{$item_display_selectmode}>'   => '[PREF] Mode d\'affichage des templates disponibles des menus.|ul.html',

                                  '<{$ii}>'            => 'Nombre total de liens.|10',
                                  '<{$i}>'             => 'Nombre de liens total par colonne (chiffre arrondi &#224; l\'unit&#233;).|5',
                                  '<{$i_main}>'        => 'Nombre de liens principaux (sans les liens secondaires) par colonne (chiffre arrondi &#224; l\'unit&#233;).|3',
                                  '<{$mode}>'          => 'Mode ou template de la page en cours (ou d&#233;fini par d&#233;faut dans les pr&#233;f&#233;rences du module).|include/multimenu_ul.html',
                                  '<{$module}>'        => 'R&#233;pertoire du module (ex : multimenu)|multimenu',
                                  '<{$banner}>'        => 'Code html de la banni&#232;re du module.|&lt;img src="http:&#47;&#47;[..]/banner.gif" /&gt;',
                                  '<{$admin}>'         => 'Liens admin.|',
                                  '<{$data_list}>'     => 'Liste des donn&#233;es g&#233;n&#233;r&#233;es par le lien. Liste compl&#232;te ci-dessous.|Array'
                                   );


 $main_val_array['variables_item'] =  array(
                                  '<{item.id}>'          => 'ID du lien.|2',
                                  '<{$item.pid}>'        => 'ID du lien parent (principal).|1',
                                  '<{$item.catid}>'      => 'ID du menu.|1',
                                  '<{$item.type}>'       => 'Type de lien (permanent ou relatif).|permanent',
                                  '<{$item.status}>'     => 'Status du lien en cours (0 : Hors ligne ou 1 : en ligne).|1',
                                  '<{$item.weight}>'     => 'Poids du lien.|100',

                                  '<{$item.title}>'      => 'Titre du lien.|Accueil',
                                  '<{$item.title|addslashes}>'=>'Titre du lien prot&#233;g&#233; (pour les codes javascript).|L\\\'accueil',
                                  '<{$item.alt_title}>'  => 'Balise alternative (ou texte compl&#233;mentaire).|Page d\'accueil du site',

                                  '<{$item.image}>'     => 'Url de l\'image par d&#233;faut. L\'image distante est prioritaire sur l\'image locale.|http:&#47;&#47;[..]/image.gif',
                                  '<{$item.image_a}>'   => 'Url de l\'image distante.|http:&#47;&#47;[..]/image.gif',
                                  '<{$item.image_b}>'   => 'Url de l\'image locale.|http:&#47;&#47;[..]/image_b.gif',

                                  '<{$item.query}>'      => 'Requ&#234;te li&#233;e &#224; ce lien.|news',
                                  '<{$item.target}>'     => 'Cible du lien (target="_blank" ou code popgen pour une image).|_blank',
                                  '<{$item.css}>'        => 'D&#233;finitions CSS (pas de class, ni ID).|color:Red;',
                                  '<{$item.link_status}>'=> 'Type de lien (top, link ou sublink).|link',
                                  '<{$item.num}>'        => 'Num&#233;ro du lien en cours.|1',
                                  '<{$item.num_main}>'   => 'Num&#233;ro du lien principal en cours.|1'
                                 );

$main_val_array['author word'] =  array( ''      => 'Pour activer votre template personalis&#233;e :
 1. copier la template dans le r&#233;pertoire "templates/include/" ;
 2. mettre le module &#224; jour ;
 3. activer la nouvelle template dans les pr&#233;f&#233;rences du module.' );

?>