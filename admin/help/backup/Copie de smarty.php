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
 
	if (file_exists('../language/' . $xoopsConfig['language'] . '/smarty.php')) {
                $only_data = 1;
		include ('../language/' . $xoopsConfig['language'] . '/smarty.php');
	} else {
                $only_data = 1;
		include ('../../language/english/tips.php');
	}


                  echo'<div align="center">';

//                  echo '<h1>'.admin_define( $sub ).'</h1>';



$i=0;
foreach ( $main_val_array as $items=>$items_val ) { 
                  echo '<table cellspacing="1" cellpadding="3" class="outer" width="80%">';
                  echo '<tr>';
                        echo '<th colspan="3" align="left">';
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

                 } else { $colspan = ''; }

                        echo '<td class="even"'.$colspan.'>';
                        $text = $item_val[0];
                        echo $myts->makeTareaData4Show( $text );
                        echo '</td>';
                 if( $item_lg && isset($item_val[1]) ) {
                        echo '<td class="even">';
                        $text = isset($item_val[1])?$item_val[1]:'';
                        echo $myts->makeTareaData4Show( $text );
                        echo '</td>';
                 }


                  echo '</tr>';

	}

                  echo '</table><p />';
}
                  echo'</div><p />';

//                  echo Admin_CloseTable();
?>