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

include('../xoops_version.php');

        $i=1; $ii=0;

 	$settings_val_array =  array();
                               foreach( $modversion['config'] as $x => $datas ) {
        $settings_val_array[$i++] = 'Param&#232;tres : ' . constant($datas['title']) . '|<ul><li>' . constant($datas['description']) . '</li><li style="font-style:italic;">' . constant($datas['help']) . '</li></ul>|index.php?admin=settings&num='.$ii++;
                               }


  	 $tips_val_array =  array(
                                  $i++        => 'Astuce : Revenez nous voir !|Lorsque vous cr&#233;ez un lien externe, assignez lui un target "blank" pour que vos visiteurs reviennent plus facilement !',
  	                          $i++        => 'Astuce : Le mode auto|En mode auto, le param&#232;tre "target" d&#233;fini automatiquement le mode &#224; adopter si vous cr&#233;ez un lien interne ou externe.',
  	                          $i++        => 'Astuce : En plein dans le mille !|Un target "blank" ouvre le lien dans une nouvelle page. Utilisez-le si vous souhaitez que vos visiteurs retrouvent plus facilement leur chemin.',
  	                          $i++        => 'Astuce : Restez chez nous !|Un target "self" ouvre le lien dans la m&#234;me page. Le mode de navigation id&#233;al pour rester &#224; l\'int&#233;rieur du site.',
  	                          $i++        => 'Astuce : Cr&#233;ez vos propres templates !| ...puis glissez les dans le r&#233;pertoire "templates/include/", mettez le module &#224; jour, puis activer la nouvelle template dans les pr&#233;f&#233;rences du module.',
  	                          $i++        => 'Astuce : Utilisez le cache !|Surtout si vos menus ne font pas appelle &#224; des liens dynamiques (requ&#234;tes, liens relatifs, groupes d\'acc&#232;s), optimisez les temps d\'acc&#232;s en activant le cache de vos blocs.',
                                  $i++        => 'Astuce : Les CSS|Les feuilles de style permettent de personnaliser l\'affichage des liens et/ou des menus. Pour plus d\'info visitez <a href="http://www.w3.org/Style/CSS/" target="_blank">W3C</a>.',
                                  $i++        => 'Astuce : Menu cach&#233;|Un menu cach&#233; ne s\'affichera pas dans les pages d\'index du module. Mais est tout aussi accessbile et actif qu\'un menu "activ&#233;".',
                                  $i++        => 'Astuce : Templates identiques|Les templates des pages d\'index et des blocs sont identiques. Plus besoin de chipoter &#224; deux endroits pour les modifier.',
                                  $i++        => 'Astuce : Onglet image|Le gestionnaire d\'images vous permet de g&#233;rer les illustrations de vos liens et de vos menus. Uniformisez leur format en quelques clics...',
                                  $i++        => 'Astuce : Onglet template|Le gestionnaire de template vous permet d\&#233;diter facilement les templates, feuilles de styles et scripts des menus.',
                                  $i++        => 'Astuce : Onglet requ&#234;te|Le gestionnaire de requ&#234;tes permet de g&#233;n&#233;rer des listes de lien dynamiquement &#224; partir de la base de donn&#233;e du site. Choisissez la table qui vous int&#233;resse et cliquez sur <b>[-][[BD] Table]</b> pour en savoir plus &#224; son sujet.',
                                  $i++        => 'Astuce : Supprimer|Lorsque vous supprimez un menu, vous supprimez en m&#234;me temps tous les liens qui lui sont rattach&#233;s !',
                                  $i++        => 'Astuce : Auto-correction|Lorsque vous ins&#233;rez une url avec le nom de domaine de votre site, multimenu r&#233;&#233;crira automatiquement l\'adresse pour en faire un lien interne.',
                                  $i++        => 'Astuce : Images|N\'utilisez que des images au format .jpg, .jpeg, .gif ou .png. Les autres formats d\'images sont &#224; proscrire sur le web.',
                                  $i++        => 'Astuce : Images|Attention aux images de trop grande taille ! Passez par le gestionnaire d\'images pour les redimensionner au bon format &#224; la vol&#233;e.',
                                  $i++        => 'Astuce : Faites vos jeux !|Faites un tour par les pr&#233;f&#233;rences du module. R&#233;glez les param&#232;tres selon vos choix, et n\'y touchez plus.',
                                  $i++        => 'Astuce : Soyez "Robot Friendly".|Utilisez les textes alternatifs (infobulles) dans vos liens et placez-y vos mots cl&#233;s.',
                                  $i++        => 'Astuce : Lien permanent|Un lien permanent s\'affichera en toute circonstance... pour peu que lui en donniez la permission.',
                                  $i++        => 'Astuce : Lien relatif|Un lien relatif ne s\'affichera que si le module indiqu&#233; dans le lien principal correspond au module de la page en cours.',
                                  $i++        => 'Astuce : Les permissions|Les groupes permettent de d&#233;finir qui a acc&#232;s &#224; quel menu et/ou quel lien. Soyez coh&#233;rent dans vos choix !',
                                  $i++        => 'Astuce : Besoin de blocs suppl&#233;mentaires ?|Dans les pr&#233;f&#233;rences g&#233;n&#233;rales du module, indiquez exactement le nombre qu\'il vous faut, et mettez votre module &#224; jour !',
                                  $i++        => 'Astuce : Besoin de cloner le module ?|Allez voir dans les <a href="index.php?admin=utils">"utilitaires"</a>, et dupliquez votre module en deux clics de souris.',
                                  $i++        => 'Astuce : Requ&#234;te|Pour cr&#233;er une nouvelle requ&#234;te dans la base de donn&#233;e, inspirez-vous des requ&#234;tes fournies par d&#233;faut.',
                                  $i++        => 'Astuce : Ayez de l\'{id}.| Que ce soient pour les requ&#234;tes, les feuilles de style ou les scripts, le tag {id} est utile pour r&#233;f&#233;renc&#233; le menu en cours.',
                                  $i++        => 'Astuce : Clonage|Vous pouvez cloner un module avec tout ses liens en un seul clic. N\'oubliez pas de modifier son titre !',
                                  $i++        => 'Astuce : Image distante ou locale ?|Pr&#233;f&#233;rez les images stock&#233;es sur votre serveur. Ce sont les seules sur lesquelles vous ayez un cont&#244;le total !',
                                  $i++        => 'Astuce : Image distante|Une image distante peut &#234;tre h&#233;berg&#233;e ailleurs que sur votre site. Mais attention aux petites croix rouges si on vient &#224; les renommer, d&#233;placer ou supprimer !',
                                  $i++        => 'Astuce : Image locale|Les images locales sont h&#233;berg&#233;es sur votre propre serveur. Vous pouvez aussi les redimenssionner &#224; l\'aide du gestionnaire d\'image du module.',
                                  $i++        => 'Astuce : Facilitez la navigation !|T&#226;chez de respecter la "r&#232;gle des 3 clics" qui stipule que toute information do&#238;t &#234;tre accessible en moins de 3 clics',
                                  $i++        => 'Astuce : Facilitez la navigation !|Une liste d\'items doit de pr&#233;f&#233;rence comporter moins de 7 &#233;l&#233;ments. Evitez les menus "trop longs".',
                                  $i++        => 'Astuce : Optimisez vos images !|Il convient d\'optimiser au maximum la taille des images, en choisissant un format adapt&#233; et un nombre de couleurs le plus petit possible. Il est recommand&#233; de ne pas d&#233;passer 30 &#224; 40 ko maximum par image',
                                  $i++        => 'Astuce : Bien concevoir le menu principal !|A tout moment le visiteur doit pouvoir &#234;tre en mesure de se rep&#233;rer dans le site (et retrouver la Home page).',
                                  $i++        => 'Astuce : Uniformisez votre menu !|Les &#233;l&#233;ments de navigation doivent &#234;tre situ&#233;s au m&#234;me endroit sur toutes les pages, si possible avec une pr&#233;sentation uniforme d\'une page &#224; une autre.',
                                  $i++        => 'Astuce : De bon titres !|Cr&#233;ez des liens privil&#233;giant le texte, aux libell&#233;s clairs, sans "devinettes" ou messages cach&#233;s, avec une pr&#233;sentation standard.',
                                  $i++        => 'Astuce : Plan du site !|Offrez des pistes vers l\'ensemble des informations disponibles d&#232;s la page d\'accueil',
                                  $i++        => 'Astuce : Allez &#224; l\'essentiel !|Les liens les plus importants doivent &#234;tre fortement mis en valeur (la boutique pour un site de vente en ligne, les nouveaut&#233;s sur le site, etc.), mais cela n\'interdit pas que la page d\'accueil soit tr&#232;s riche d\'autres liens.',
                                  $i++        => 'Astuce : Evitez les textes en image !|Le texte sous forme d\'image, m&#234;me si cela permet de mieux en contr&#244;ler la pr&#233;sentation, est non seulement r&#233;dhibitoire du point de vue du temps de chargement, mais &#233;galement pour les moteurs de recherche.',
                                  $i++        => 'Astuce : "Keep it simple !"|Le syst&#232;me de navigation doit &#234;tre simple et intuitif. Inutile de proposer tous les liens sur la page accueil. Une barre de navigation vers les principales rubriques suffit (cela n\'interdit pas, n&#233;anmoins, de proposer un syst&#232;me d\'acc&#232;s rapide sous forme, par exemple, de menu d&#233;roulant en Javascript).',
                                  $i++        => 'Astuce : Deux valent mieux qu\'un !|Multipliez les syst&#232;mes de navigation alternatifs (Ex: une barre de menu sous forme graphique, avec des effets "rollovers" simples, une barre de navigation texte, etc.) pourvu que ces syst&#232;mes soient bien distincts visuellement. Evitez de les grouper tous au m&#234;me endroit, et r&#233;partissez les en tenant compte du parcours de l\'internaute.',
                                  $i++        => 'Astuce : HELP !|Cliquez sur le lien "[+][Aide]" pour afficher l\'aide en ligne dans les formulaires d\'&#233;dition.',
                                  $i++        => 'Astuce : Virez-moi !|Pas besoin de ces astuces encombrantes ? D&#233;sactivez les dans <a href="index.php?admin=settings&sub=edit">les pr&#233;f&#233;rences du module</a>.',
                                  $i++        => 'Astuce : Faites votre choix !|Choisissez vos templates pr&#233;f&#233;r&#233;es et d&#233;sactivez les autres dans <a href="index.php?admin=settings&sub=item">les pr&#233;f&#233;rences du module</a>.',
                                  $i++        => 'Astuce : Voir le code|Lorsque vous cr&#233;ez ou modifiez un template, visualisez directement le code g&#233;n&#233;r&#233; en activant la fonction <b>Activer le mode "Editon de template"</b> les dans <a href="index.php?admin=settings&sub=index">les pr&#233;f&#233;rences du module</a>.',
                                  $i++        => 'Astuce : Prenez le bon chemin|En cr&#233;ant un menu, vous avez la possibilit&#233; de d&#233;terminer le r&#233;pertoire de stockage des images. V&#233;rifiez que celui-ci est bien ouvert en &#233;criture !',
                                  $i++        => 'Astuce : Changement d\'adresse|Lorsque vous d&#233;placez un lien avec une image d\'un menu &#224; l\'autre, v&#233;rifiez bien que le r&#233;pertoire de stockage du nouveau menu dispose de l\'image.',
                                  $i++        => 'Astuce : A chaque menu son r&#233;pertoire|En cr&#233;ant un nouveau  menu, ajoutez lui son propre r&#233;pertoire de stockage (cr&#233;&#233; automatiquement par le module) pour &#233;viter tout conflit ult&#233;rieur.',
                                  $i++        => 'Astuce : Au bon menu le bon bon bloc|Choisissez le bloc qui affichera votre menu dans <a href="index.php?admin=blocks">l\'onglet blocs</a>, et profitez-en pour v&#233;rifier les param&#232;tres de groupes du module.'
                                  );

 	$info_val_array =  array( $i++        => 'Le saviez-vous ?|A l\'origine, multimenu &#233;tait une version am&#233;lior&#233;e de imenu, d&#233;velopp&#233; par un autre belge Linthuin.',
  	                          $i++        => 'Le saviez-vous ?|Dans sa version 1, multimenu &#224; connu plus de 9 versions successives. La derni&#232;re &#233;tant la 1.9.',
  	                          $i++        => 'Le saviez-vous ?|Pour leur majorit&#233;, les personnes qui ont contribu&#233; &#224; la r&#233;alisation de ce modules ne sont pas des d&#233;veloppeurs professionnel !',
                                  $i++        => 'Le saviez-vous ?|multimenu a &#233;t&#233; d&#233;velopp&#233; avec le logiciel &#233;diteur de texte <a href="http://www.contexteditor.org/" target="_blank">ConTEXT</a>.',
                                  $i++        => 'Le saviez-vous ?|Dans sa premi&#232;re version, multimenu s\'&#233;crivait "multiMenu". Le M a &#233;t&#233; r&#233;duit en minuscule pour faciliter le clonage du module. Sur la toile, cela fait toute la diff&#233;rence !',
                                  $i++        => 'Le saviez-vous ?|Le nombre d\'heures consacr&#233;es au d&#233;veloppement de ce module est incalculable. Depuis sa premi&#232;res versions, des milliers d\'heures lui ont &#233;t&#233; consacr&#233;...',
                                  $i++        => 'Le saviez-vous ?|Lors de la sortie de multiMenu 1.8, plus de 600 posts ont &#233;t&#233; publi&#233;s &#224; son sujet dans les forums de www.frxoops.org et www.xoops.org.',
                                  $i++        => 'Le saviez-vous ?|Les d&#233;veloppeurs qui ont contribu&#233; &#224; multimenu n\'en ont pas touch&#233; un seul franc. C\'est &#231;a l\'open source !',
                                  $i++        => 'Le saviez-vous ?|multimenu a &#233;t&#233; d&#233;velopp&#233; pour Xoops 2.x uniquement. On ne retrouve aucun module similaire dans d\'autre CMS.',
                                  $i++        => 'Le saviez-vous ?|Les d&#233;veloppeurs de multimenu sont majoritairement  francophones et membres actifs de <a href="http://www.frxoops.org" target="_blank">FRXoops</a>.',
                                  $i++        => 'Le saviez-vous ?| Loi de Murphy : principe empirique &#233;non&#231;ant que s\'il existe une possibilit&#233; de mauvaise manipulation d\'un produit ou d\'une m&#233;thode, quelqu\'un fera un jour cette erreur d\'utilisation. Cette loi &#224; pr&#233;sid&#233; &#224; la r&#233;alisation de ce module, mais les ressources de Murphy restent toujours imp&#233;n&#233;trables. ;-)'
                                  );

if(!isset($only_data)) {
        $item_val_array = $info_val_array + $settings_val_array + $tips_val_array;
        $tips_count = count($item_val_array);

// Render defines
        $i=1;
 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_TI_MULTIMENU_'.$item_lg),$item_val);
	}
}
?>