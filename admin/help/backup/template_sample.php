<?php
########################################################
#  Admin version 1.1 pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################
defined( 'XOOPS_ROOT_PATH' )?'':header('Location: ./');

 $i=0;
 $main_val_array=array();
 
  $main_val_array['table']  =  array( ''      => '[code]

// Initier le compteur pour le tableau
<{counter start=1 print=false assign=count}>

// Défini les nombre exact de colonnes
<{math assign=col_width equation="round(y / x)" x=$cols y=100}>

// Afficher le texte de la gallerie
<div class="itemText"><{$text}></div>

// Ouvrir le tableau
<table>
  <tr>

// Créer les colonnes en fonction du nombre de colonne souhaité
            <{foreach item=item from=$image_list}>
                   <{if $count > $cols}>
                            </tr>
                            <tr>
                       <{counter start=1 print=false assign=count}>
                       <{/if}>
                       <{counter print=false assign=count}>

// Créer la vignette clicable et appeler l\'image
          <td width="<{$col_width}>%" align="center">

                  <a
                       onclick="pop=window.open(\'\', 
                                                \'wclose\', 
                                                \'width=<{$item.image_width+20}>, 
                                                  height=<{$item.image_height+20}>, 
                                                  dependent=yes, 
                                                  toolbar=no, 
                                                  scrollbars=no, 
                                                  status=no, 
                                                  resizable=yes, 
                                                  fullscreen=no, 
                                                  titlebar=no, 
                                                  left=189, 
                                                  top=0\',
                                                \'false\'); 
                                pop.focus();"
                       href="<{$image_url}><{$item.image_file}>"
                       target="wclose"
                       title="<{$title}> : <{$item.image_file}>">
                  <img src="<{$thumb_url}><{$item.thumb_file}>"
                       style="width:<{$item.thumb_max_width}>px; border:<{$item_thumb_style}>; spacing:2px"
                       alt="<{$title}> : <{$item.thumb_file}>"
                  />
                 </a>
          </td>

          <{/foreach}>
          
// Afficher le nombre de colonnes restantes
          <{math assign=last equation="x - y" x=$cols y=$count-1}>
          <{section name=td loop=$last}>
          <td>&nbsp;</td>
          <{/section}>

// Refermer le tableau
   </tr>
 </table>
[/code]' );
                  echo'<div align="center">';

                  echo '<h1>'.admin_define( $sub ).'</h1>';



$i=0;
foreach ( $main_val_array as $items=>$items_val ) {
                  echo '<table cellspacing="1" cellpadding="3" class="outer" width="360px">';
                  echo '<tr>';
                        echo '<th colspan="2" align="left">';
                        echo admin_define( $items );
                        echo '</th>';
                  echo '</tr>';

 	foreach ( $items_val as $item_lg=>$item_val ) {

                 $item_val = explode('|',$item_val);

                        echo '<tr>';
                 if( $item_lg ) {
                        echo '<td class="head" width="25%">';
                        echo $item_lg;
                        echo '</td>';

                 } else { $colspan = ' colspan="2"'; }
                        echo '<td class="even"'.$colspan.'>';
                        $text = isset($item_val[1])?' <a href="' . trim($item_val[1]) . '" target="_blank"> '.$item_val[0].'</a>':$item_val[0];
                        echo $myts->makeTareaData4Show( $text );
                        echo '</td>';
                  echo '</tr>';

	}

                  echo '</table><p />';
}
                  echo'</div><p />';

//                  echo Admin_CloseTable();
?>