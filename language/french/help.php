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

 	$help_val_array =  array( 
'menuopth'        => '<h3>Options des menus</h3>
         Voici quelques options compl&#233;mentaires concernant les menus.<ul>
         <li><b>R&#233;pertoire de stockages des images :</b> D&#233;terminer le r&#233;pertoire dans lequel seront stock&#233;s les images du menu.</li>
         <li><b>Template :</b> D&#233;terminer le style de menu (template) qui sera appliqu&#233; par d&#233;faut &#224; ce menu.</li>
         <li><b>Groupes :</b> D&#233;terminer quels groupes d\'utilisateurs auront acc&#232;s &#224; ce menu.</li>
         </ul>
         ',
         
'menucssh'        => '<h3>Style des menus</h3>
         Vous pouvez attribuer un style sp&#233;cifique &#224; chaque menu.
         Les informations indiqu&#233;es seront r&#233;percut&#233;es dans une feuille de style qui s\'affichera dans le code source de la page.
         Vous devez donc &#233;crire vos d&#233;finitions comme pour une feuille de style normale.
         La balise {id} permettra de sp&#233;cifier exactement &#224; quel class ou id, les modifications s\'appliqueront et permettront ainsi de ne pas interf&#233;rer avec un autre menu.

         <b><u>Exemple</u> :</b>
         <div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">#multimenu_{id} { 
   border: 2px Outset Red;
            }
#multimenu_{id} a { 
   color:Red;
   }
#multimenu_{id} a:hover { 
   color:Green;
   }</div>

         Notez que le style sera appliqu&#233; aux liens de l\'ensemble du menu concern&#233;.
         
         Les d&#233;finitions indiqu&#233;es prioritaire sur toute d&#233;finition d&#233;clar&#233;es pr&#233;c&#233;demment (th&#232;me du site, feuille de style du module ou de la template en cours,...)
         ',

'linkopth'        => '<h3>Options des liens</h3>
         Voici quelques options compl&#233;mentaires concernant les liens.<ul>
         <li><b>Texte alternatif :</b> Ajouter un texte descriptif qui compl&#232;tera les informations relatives au lien. Notez que cet aspect est important pour un meilleur r&#233;f&#233;rencement de vos pages, ainsi que l\'accessibilit&#233; aux personns non voyantes.</li>
         <li><b>Requ&#234;te :</b> D&#233;termine quelle requ&#234;te (permettant de g&#233;n&#233;rer automatiquement une liste de liens) affecter &#224; ce lien. 3 cas de figure :
         <ol><li><b>Lien principal avec url</b> : afficher le lien principal avec tous les liens de la requ&#234;te en sous-lien.</li>
         <li><b>Lien principal sans url</b> : masque le lien principal et affiche tous les liens de la requ&#234;te en lien principal.</li>
         <li><b>Lien secondaire avec url</b> : affiche le lien principal et tous les liens de la requ&#234;te en lien secondaire.</li>
         <li><b>Lien secondaire sans url</b> : masque le lien principal et affiche tous les liens de la requ&#234;te en lien secondaire.</li></ol></li>
         <li><b>Menus :</b> s&#233;lectionner &#224; quel menu est affect&#233; le lien.
         Attention, changer un sous-lien de menu n&#233;cessite de lui r&#233;attribuer un lien principal !
         Attention, si une image est affect&#233; au lien et que le r&#233;pertoire de stockage n\'est pas le m&#234;me pour le nouveau menu, lui affecter une nouvelle image.</li>
         <li><b>Type :</b> 2 types de liens possible :<ol>
         <li><b>permanent</b> : le lien s\'affichera en permanence.</li>
         <li><b>relatif</b> : le lien ne s\'affichera que si l\'adresse du lien principal correspond au module en cours.</li></ol></li>
         <li><b>Relatif</b> : param&#233;trage des liens relatifs. Ex: /multimenu/|index.php|content.php?id=1</li>
         <li><b>Cible :</b> 3 types de cible :<ol>
         <li><b>Auto</b> : le module d&#233;tecte lui-m&#234;me la meilleur configuration selon l\'adresse (url) utilis&#233;e.</li>
         <li><b>Self</b> : le lien s\'ouvrira dans la m&#234;me page. Id&#233;al pour les liens pointant vers des pages <u>internes</u> du site.</li>
         <li><b>Blank</b> : le lien s\'ouvrira dans une nouvelle page. Id&#233;al pour les liens pointant vers des pages <u>externes</u> du site.</li></ol></li>
         <li><b>Groupes :</b> D&#233;terminer quels groupes d\'utilisateurs auront acc&#232;s &#224; ce lien.</li>
         </ul>
         ',
         
'linkcssh'        => '<h3>Style des liens</h3>
         Vous pouvez attribuer un style sp&#233;cifique &#224; chaque lien.
         Les informations indiqu&#233;es ici, seront r&#233;percut&#233;es dans la balise : <i>style=""</i>.
         Vous devez donc &#233;crire vos d&#233;finitions comme dans une feuille de style normale, sans indiquer de class ou d\'id.

         <b><u>Exemple</u> :</b>
         <div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">color:Red; font-weight:bold; border: 1px plain Red;</div>
         
         Notez que le style sera appliqu&#233; au lien dans la liste admin des liens, pour mieux vous rendre compte du r&#233;sultat.
         
         Les d&#233;finitions indiqu&#233;es pour chaque lien seront donc prioritaire sur toute d&#233;finition d&#233;clar&#233;es pr&#233;c&#233;demment (th&#232;me du site, feuille de style du module ou du menu en cours,...)
         Si le style ne s\'applique pas, v&#233;rifiez bien que la template du menu activ&#233; comporte bien la code suivant <input style="border:1px Inset Black; background:LightGrey;" value=\'<{if $item.css}>style="<{$item.css}>"<{/if}>\' size="45" /> dans la d&#233;finition du lien.
         
         <b><u>Exemple</u> :</b>
         <textarea style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;"><a href="<{$item.link}>" <{if $item.css}>style="<{$item.css}>"<{/if}> > <{$item.title}> </a></textarea>
         ',
         
'query'        => '<h3>Requ&#234;tes</h3>
         Vous pouvez cr&#233;er une liste de liens &#224; partir des donn&#233;es enregistr&#233;es dans la base de donn&#233;e, &#224; partir de n\'importe quel module.
         
         Une fois la table s&#233;l&#233;ctionn&#233;e, vous pouvez en visualiser le contenu en ouvrant le panneau <b>"[+][[BD] Table]"</b>. 
         Le tableau affiche alors la composition de la table s&#233;lectionn&#233;e.
         Pour vous aider dans vos param&#233;trage le tableau fera une s&#233;l&#233;ction color&#233;es des donn&#233;es qui pourraient vous int&#233;resser :
         <ul>
         <li style="color:Red;"><b>En rouge :</b> les cl&#233;s ID</li>
         <li style="color:Green;"><b>En vert :</b> les sujets (champs pour g&#233;n&#233;rer les titres des liens)</li>
         <li style="color:Blue;"><b>En bleu :</b> les contenu (champs pour g&#233;n&#233;rer les balises alternatives)</li>
         <li style="color:Orange;"><b>En orange :</b> les images (champs pour g&#233;n&#233;rer les vignettes ou images des liens)</li>
         </ul>Une fois la table bien analys&#233;e, vous pouvez cr&#233;er la requ&#234;te qui va g&#233;n&#233;rer la liste de lien qui vous int&#233;resse. 2 &#233;tapes :
         <ul>
         <li><b><u>Etape 1</u> : les indispensables</b>
         <ol>
         <li><b>Titre :</b> indiquer un titre significatif. Ce titre vous permettra de retrouver facilement la requ&#234;te souhait&#233;e pour la g&#233;n&#233;ration de vos liens.</li>
         <li><b>[BD] Table :</b> Nom de la table s&#233;lectionn&#233;e.</li>
         <li><b>[BD] Champ ID :</b> Champ d\'identification des donn&#233;es. C\'est cette valeur qui se retrouvera dans les op&#233;rateurs du lien.</li>
         <li><b>[BD] Champ sujet :</b> Champ reprenant le nom ou le titre du lien.</li>
         <li><b>Adresse des liens :</b> URL utilis&#233;e pour la g&#233;n&#233;ration des liens.
         Pour retrouver l\'url correcte, s&#233;lectionner et recopier l\'url de l\'une des pages du module concern&#233;. Remplacer l\'id de l\'url par la balise <b>{id}</b>. </li>
         </ol>
         </li><li><b><u>Etape 2</u> : les options</b>
         <ol>
         <li><b>[BD] Champ alternatif :</b> Champ contenant des informations &#224; afficher comme texte alternatif.</li>
         <li><b>[BD] Champ image :</b> Champ contenant l\'image &#224; lier &#224; ce lien. Uniquement si le module propose une images sp&#233;cifique pour chaque entr&#233;e.</li>
         <li><b>R&#233;pertoire de stockage des images :</b> Utilis&#233; uniquement si le champ <b>[BD] Champ image</b> a &#233;t&#233; renseign&#233;. Indiquer l\'adresse de stockage des images du module (si n&#233;cessaire). .</li>
         <li><b>[BD] Conditions :</b> Correspond &#224; la clause <b>WHERE</b> d\'une requ&#234;te.
         Effectue un tri parmi les liens &#224; partir de n\'importe quelle condition li&#233; &#224; un champ de la table s&#233;lectionn&#233;e. 
         Les conditions multiples peuvent &#234;tre s&#233;par&#233;e par les op&#233;rateur <b>AND</b> et/ou <b>OR</b>. 
         La balise <b>{date}</b> et <b>{uid}</b> peuvent-&#234;tre utilis&#233;es pour ins&#233;rer les valeurs dynamiques de la date ou de l\'utilisateur courant.
         (Exemple : to_userid={uid} AND read_msg=0)</li>
         <li><b>[BD] Ordre d\'affichage des donn&#233;es :</b> Correspond &#224; la clause <b>ORDER BY</b> d\'une requ&#234;te. 
         Permet d\'indiquer l\'ordre dans lequel on veut voir s\'afficher la liste de lien.
         Indiquer un ou plusieurs champs de la table s&#233;lectionn&#233;e suivi de <b>ASC</b> ou <b>DESC</b> et s&#233;par&#233;s par une virgule.
         (Exemple : from_userid ASC, msg_time DESC ).</li>
         <li><b>Nombre maximum de liens &#224; afficher :</b> Indiquer le nombre maximum de liens &#224; afficher &#224; l\'aide de cette requ&#234;te.</li>
         </ol>
         </li>
         </ul>
         ',

'image'        => '<h3>Gestionnaire d\'images</h3>
         Vous pouvez g&#233;rer ici les images/vignettes/logos utilis&#233;s pour agr&#233;menter vos listes de liens.
         Chaque menu peut disposer de sa propre liste d\'images, dans son propre r&#233;pertoire de stockage.

         Quelques fonctionnalit&#233;s vous permettrons d\'uniformiser l\'aspect des vignettes <u>tout en pr&#233;servant les images originales</u> !
         Chaque images modifi&#233;es est sauvegard&#233;e au pr&#233;alable pour pouvoir lui restaurer ses propri&#233;t&#233;s (taille, couleur, format) d\'origine.
         
         <b>Descriptions des options disponibles :</b>
         <ol>
         <li><b>G&#233;n&#233;rateur de vignette :</b> S&#233;lectionnez ici le type de modification que vous souhaitez apporter &#224; vos vignettes.
         <table width="100%"><tr>
         <td align="center"><img src="../images/sample/flag_normal.jpg" />
         Normal</td><td align="center"><img src="../images/sample/flag_rounded.jpg" />
         Bord arrondis</td><td align="center"><img src="../images/sample/flag_b-w.jpg" />
         Noir & blanc</td><td align="center"><img src="../images/sample/flag_shadow.jpg" />
         Ombr&#233;</td><td align="center"><img src="../images/sample/flag_deg.jpg" />
         D&#233;grad&#233;</td><td align="center"><img src="../images/sample/flag_text.jpg" />
         Texte</td></tr></table>
         </li>
         <li><b>Texte :</b> Texte &#224; afficher en mode <b>Texte</b>.</li>
         <li><b>Largeur :</b> Largeur absolue de l\'image. Facultatif.</li>
         <li><b>Hauteur :</b> Hauteur absolue de l\'image. Facultatif.</li>
         <li><b>Couleur de fond :</b> Couleur de fond pour la cr&#233;ation de la vignette en mode <b>Bord arrondis</b>, <b>Ombr&#233;</b> et <b>D&#233;grad&#233;</b>.</li></ol>
         ',

'css'        => '<h3>Feuille de style li&#233;e &#224; la template</h3>
         Vous pouvez affecter une feuille de style sp&#233;cifique &#224; chaque template de menu.
         Ces feuilles de style peuvent &#234;tre : <ul>
         <li>pr&#233;-existantes et li&#233;e &#224; la template.</li>
         <li>inexistantes et cr&#233;&#233;e par vos soins. Elle sera automatiquement li&#233;e &#224; la template ainsi &#233;dit&#233;e et aff&#233;ct&#233;e &#224; tous les menus qui feront appel &#224; elle.</li></ul>

         A l\'instar des feuilles de styles des menus, la balise {id} permettra de distinguer automatiquement une caract&#233;ristique li&#233;e &#224; un menu sp&#233;cifique.
         Exemple :<div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">/* Sub links */
          #dropmenudiv_{id} {
            position:absolute;
            margin-left:10px;
            margin-top:-1px;
            border: 1px outset black;
            }
            </div>
         ',

'script'        => '<h3>Script Java</h3>
         Certaines templates de menu font appel &#224; un script java.
         Certains script font parfois appel &#224; des param&#232;tres pass&#233;s en variables.
         Vous pouvez editer ce script ou ces variables dans cette fen&#234;tre.
         ',

'tpl'        => '<h3>Templates de menu</h3>
         Les templates de menu est le code html et smarty employ&#233; pour g&#233;n&#233;rer les menus. 
         Les templates disponibles sont celles propos&#233;es dans le gestionnaire de templates de Xoops.
         Seules les templates cr&#233;&#233;es via un jeu de template personnalis&#233; sont disponibles.
         Si la fen&#234;tre d\'&#233;dition s\'affiche gris&#233;e, c\'est qu\'elle n\'est pas modifiable pour l\'une des raisons suivantes :
         <ul><li>il n\'y a pas de jeu de template personnalis&#233; ;</li>
         <li>le jeu de template personnalis&#233; n\'a pas &#233;t&#233; mis &#224; jour.</li></ul>
         '
                                  );



//        $item_val_array = $info_val_array + $tips_val_array;
//        $tips_count = count($item_val_array);

// Render defines
 	foreach ($help_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_HLP_MULTIMENU_'.$item_lg),$item_val);
	}
?>