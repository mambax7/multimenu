<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/
// 2.x

// Common values
$main_val_array =  array( 
// commons
                'IMAGE'        => 'Image',
                'ID'           => 'N&#176;',
                'TITLE'        => 'Titre',
                'ADMIN'        => 'Admin',
                'WEIGHT'       => 'Poids',
                'ONLINE'       => 'Activ&#233;',
                'OFFLINE'      => 'D&#233;sactiv&#233;',
                'HIDDEN'       => 'Cach&#233;',
                'HIDE'         => 'Cacher',
                'OPTIONS'      => 'Options',
                'UPDATE'       => 'Mettre &#224; jour',
                'NODATA'       => 'Aucune donn&#233;e s&#233;lectionn&#233;e !',
                'SITEMAP'      => 'Plan du site',
                'DESC'         => 'Description',
                'DESC'         => 'Descendant',
                'ASC'         => 'Ascendant',
                'OFF'          => 'En ligne',
                'ON'           => 'Hors ligne',

                'HELP'         => 'Aide',
                'INDEX'        => 'Index',
                'INDEXDSC'     => 'Index des pages',
                'CREDIT'       => '%s est une creation originale du %s.',
                'QUERIES'      => 'Requ&#234;tes',
                'MENU'         => 'Menus',
                'LINK'         => 'Liens',
                'URL'          => 'Url',
                'QUERY'        => 'Requ&#234;te',
                'BLOCKS'       => 'Blocs/Permissions',
                'IMAGES'       => 'Images',
                'SETTINGS'     => 'Pr&#233;f&#233;rences',
                'UTILS'        => 'Utilitaires',
                'STATUS'       => 'Status',
                'EDIT'         => 'Editer',
                'CLONE'        => 'Cloner',
                'CANCEL'       => 'Annuler',
                'SUBMIT'       => 'Enregistrer',
                'DELETE'       => 'Supprimer',
                'OTHER'        => 'Autre :',
                'CSS'          => 'Feuille de style',

// Admin tab menus
                'MENUDSC'      => '1. Cr&#233;er et administrer les menus',
                'LINKDSC'      => '2. Cr&#233;er et assigner les liens',
                'QUERYDSC'     => '3. Cr&#233;er une requ&#234;te dans la base de donn&#233;e',
                'IMAGESDSC'    => '4. G&#233;rer les vignettes',
                'TEMPLATESDSC' => '5. Editer les feuilles de style et scripts des menus',
                'BLOCKSDSC'    => '6. Activer et param&#233;trer les blocs',
                'SETTINGSDSC'  => '7. S&#233;lectionner les pr&#233;f&#233;rences g&#233;n&#233;rales du module',
                'UTILSDSC'     => '8. Utilitaire de clonage du module',
                'HELPDSC'      => '9. Aide sur le module.',

// SQL operations
                'INSERTED'     => 'Donn&#233;es cr&#233;&#233;es avec succ&#232;s.',
                'UPDATED'      => 'Donn&#233;es mises &#224; jour avec succ&#232;s.',
                'CONFIRM'      => 'Etes-vous certain de vouloir supprimer :',
                'DELETED'      => 'Donn&#233;es supprim&#233;es avec succ&#232;s !',
                'SUREDELETE'   => 'Etes-vous certain de vouloir supprimer ce lien ?',
                'NOTUPDATED'   => 'Impossible de mettre la Base de donn&#233; &#224; jour !',


// Images
                'RESIZE'       => 'Redimensionner',
                'UPLOAD'       => 'T&#233;l&#233;verser',
                'NEWIMAGE'     => 'T&#233;l&#233;verser une nouvelle image',
                'SERVER_CONF'  => 'Infos configuration serveur',
                'XOOPS_VERSION'=> 'Version XOOPS',
                'GRAPH_GD_LIB_VERSION'      => 'Librairie GD',

                'GIF_SUPPORT'  => 'Support GIF',
                'JPEG_SUPPORT' => 'Support JPG',
                'PNG_SUPPORT'  => 'Support PNG',

                'NORMAL'       => 'Normal',
                'ROUNDED'      => 'Bords arrondis',
                'BW'           => 'Noir & Blanc',
                'SHADOW'       => 'Ombr&#233;',
                'GRAD'         => 'D&#233;grad&#233;',
                'INFO'         => 'Texte',
                'CHECK_ALL'    => 'Tout s&#233;lectionner',

                'THUMBGEN'     => 'G&#233;n&#233;rateur de vignette',
                'TEXT'         => 'Texte',
                'WIDTH'        => 'Largeur',
                'HEIGHT'       => 'Hauteur',
                'BCKCOLOR'     => 'Couleur de fond',
                'DIR'          => 'R&#233;pertoire',
                'UPLOADED'     => 'Fichier t&#233;l&#233;vers&#233; avec succ&#232;s !',
                'NOTUPLOADED'  => 'Une erreure s\'est produite lors du t&#233;l&#233;versement du fichier !',
                'NOT_CREATED'  => 'Le r&#233;pertoire de stockage n\'existe pas !',

// Templates
                'TPL'          => 'Template',
                'SCRIPT'       => 'Script',
                'TEMPLATES'    => 'Templates',

// Queries
                'NEW_QUERY'    => 'Cr&#233;er une requ&#234;te dans la Base de donn&#233;e',
                'EDIT_QUERY'   => 'Editer une requ&#234;te',
                'TABLE'        => '[BD] Table',
                'QID'          => '[BD] Champ ID',
                'QSUBJECT'     => '[BD] Champ Sujet',
                'QDESCRIPTION' => '[BD] Champ alternatif',
                'QIMAGE'       => '[BD] Champ image',
                'QIMAGEURL'    => 'R&#233;pertoire de stockage des images',
                'QURL'         => 'Adresse des liens<br />
<font style="font-weight:normal;">{id} : valeur du champ id<br />
{urw} : r&#233;&#233;criture de l\'url<br />
{alt} : Champ alternatif</font>',
                'QWHERE'       => '[BD] Conditions<br />
<font style="font-weight:normal;">{date} : heure courante</font>',
                'QORDER'       => '[BD] Ordre d\'affichage des donn&#233;es',
                'QLIMIT'       => 'Nombre maximum de liens &#224; afficher',
                'TROUBLE'      => 'Signal d\'erreur',
                'NEXT'         => 'Etape suivante...',
                'TABLE_CHECK'  => 'Voir la table',

 // Menus
                'NEW_MENU'     => 'Cr&#233;er un menu',
                'EDIT_MENU'    => 'Editer un menu',
                'ALT_TITLE'    => 'Texte alternatif',
                'IMAGEDIR'     => 'R&#233;pertoire de stockages des images',
// Links
                'NEW_LINK'     => 'Cr&#233;er un lien',
                'EDIT_LINK'    => 'Editer un lien',
                'TYPE'         => 'Type',
                'WAITING'      => 'En attente...',
                'INFOS'        => 'Infos',
                'INFOBULLE'    => 'Infobulle',
                'IMAGEURL'     => 'Image distante',

                'LINKIN'       => 'Page locale',
                'LINKOUT'      => 'Page distante',
                'PERMANENT'    => 'Permanent',
                'RELATIVE'     => 'Relatif',
                'LINK_PERM'    => 'Permanent',
                'LINK_REL'     => 'Relatif',
                'LINK_IN'      => 'Local',
                'LINK_OUT'     => 'Distant',

                'TOP'          => 'Premier',
                'BOTTOM'       => 'Dernier',

                'TARG_AUTO'    => 'Auto (d&#233;tecter la meilleure configuration)',
                '_SELF'        => 'Self (ouvrir dans la m&#234;me page)',
                '_BLANK'       => 'Blank (ouvrir dans une nouvelle page)',

                'SELF'         => 'Ouvrir dans la m&#234;me page',
                'BLANK'        => 'Ouvrir dans une nouvelle page',

                'LINKTO'       => 'Lier &#224; :',
                'NONE'         => 'Aucun',

// Help

                'MENUCSSH'     => 'Aide sur la feuille de style des menus',
                'LINKCSSH'     => 'Aide sur la feuille de style des liens',
                'SAMPLE'       => 'Exemples',
                'ARTICLE'      => 'Article',

                'MAIN'         => 'Principal',
                'MAINDSC'      => 'Infos g&#233;n&#233;rales concernant le module.',
                'SMARTY'       => 'Variables Smarty',
                'SMARTYDSC'    => 'Liste des variables Smarty',
                'HELPS'        => 'Aide',
                'HELPSDSC'     => 'Aide &#224; l\'utilisation du module',
                'TIPSDSC'      => 'Liste des astuces et faits du module.',
                'INTRODUCTION' => 'Intro',
                'KNOW'         => 'Le saviez-vous ?',
                'TIPS'         => 'Astuces',

                'DEVELOPPERS'  => 'D&#233;veloppeurs',
                'INFORMATIONS' => 'Informations',
                'DISCLAIMER'   => 'Avertissement',
                'AUTHOR_WORD'  => 'Le mot de l\'auteur',
                'VERSION_HISTORY' => 'Historique des versions',
                'LANGUAGE_DEFINE' => 'D&#233;finitions de langue',
                'FIXES_ITEM'   => 'Variables g&#233;n&#233;rales',
                'VARIABLES_ITEM' => 'Variables des liens',

// Utils
                'CLONEDSC'     => 'Utilitaire de clonage du module.',
                'CLONE_NAME'   => 'Nom du clone',
                'CLEAR'        => 'Annuler',
                'TEMPLATE'     => 'Templates',


                'EDITIMENU'    => 'Editer',
                'NEW'          => 'Nouveau Lien',
                'SUBMENU'      => 'Type',
                'SUBMENUEXP'   => '',
                'SUBYES'       => 'Oui',
                'SUBNO'        => 'Non',
                'MAINLINK'     => 'Lien standard',
                'SUBLINK'      => 'Lien secondaire relatif',
                'PERMSUBLINK'  => 'Lien secondaire permanent',
                'TARGET'       => 'Cible',
                'GROUPS'       => 'Groupes',
                'OPERATION'    => 'Fonction',
                'TARG_SELF'    => 'self',
                'TARG_BLANK'   => 'blank',
                'TARG_PARENT'  => 'parent',
                'TARG_TOP'     => 'top',

                'clonetrouble' => 'Le clone a &#233;t&#233; cr&#233;&#233; dans le dossier "cache" &#224; la racine de votre site.<br />Vous devez simplement le d&#233;placer dans le dossier "modules" avec votre client ftp.
<br />
Et changer les attributs du clone et des sous-dossiers en 644, toujours avec votre client ftp par exemple.<br />
<br />
Vous pourrez ensuite installer votre clone comme n\'importe quel module.
',
                 'module_exists' => 'Le module existe d&#233;j&#224;. Changez le nom de votre clone.',
                 'cloned'      => 'Module clon&#233; avec succ&#232;s !',
                 'notcloned'   => 'Les param&#232;tres du clonage sont incorrectes!',

                 'import'      => 'Import SQL',
                 'importdsc'     => 'Importer des donn&#233;es directement dans la base de donn&#233;es !',
                 'db_datas'      => 'Donn&#233;es SQL',
                 'imported'      => 'Donn&#233;es acc&#233;pt&#233;es !',
                 'notimported'   => 'Donn&#233;es refus&#233;es !'
                 );

// Render defines

 	foreach ( $main_val_array as $item_lg=>$item_val ) {
                 define(strtoupper('_MD_MULTIMENU_'.$item_lg),$item_val);
	}
	
	
define('_MD_MULTIMENU_FIELD','Champ');
define('_MD_MULTIMENU_NULL','Null');
define('_MD_MULTIMENU_KEY','Cl&#233;');
define('_MD_MULTIMENU_DEFAULT','Defaut');
define('_MD_MULTIMENU_EXTRA','Extra');
define('_MD_MULTIMENU_N','N&#176;');
define('_MD_MULTIMENU_CLOSE','Fermer');
?>