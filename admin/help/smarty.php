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


                  $ret = '<div align="center">';

//                  $ret .='<h1>'.admin_define( $sub ).'</h1>';



$i=0; $class='even';
foreach ( $main_val_array as $items=>$items_val ) {
  
  
  // Table content generator
        $ret_table =''; $sample=0; $colspan='';
 	foreach ( $items_val as $item_lg=>$item_val ) {
                 $item_val = explode('|',$item_val);
                 $class = $class=='odd'?'even':'odd';
                 $ret_table .='<tr>';
                 if( $item_lg ) {

                        $ret_table .='<td class="head" width="25%">';
                        $ret_table .=$item_lg;
                        $ret_table .='</td>';
                        $colspan = ' colspan="2"';
                 }

                        $ret_table .='<td class="'.$class.'">';
                        $text = $item_val[0];
                        $ret_table .=$myts->makeTareaData4Show( $text );
                        $ret_table .='</td>';

                 if( $item_lg && isset($item_val[1]) ) {

                        $sample=1;
                        $ret_table .='<td class="'.$class.'">';
                        $text = isset($item_val[1])?$item_val[1]:'';
                        $ret_table .=$myts->makeTareaData4Show( $text );
                        $ret_table .='</td>';

                 }

                  $ret_table .='</tr>';
	}
// Table content generator


                  $ret .='<table cellspacing="1" cellpadding="3" class="outer" width="80%">';
                  $ret .='<tr>';
                        $ret .='<th'.$colspan.' align="left">';
                        $ret .=admin_define( $items );
                        $ret .='</th>';
                        if($sample) {
                        $ret .='<th align="left">';
                        $ret .=admin_define( 'sample' );
                        $ret .='</th>';
                        }
                  $ret .='</tr>';
                  $ret .= $ret_table;
                  $ret .='</table><p />';
}
                  $ret .='</div><p />';

echo $ret;
?>