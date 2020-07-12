<?php
#######################################################
#  Multimenu version 1.0 pour Xoops 2.0.x		#
#  							#
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )	#
#  							#
#  Licence : GPL 					#
#######################################################


$temp_list ='';
if( $item_selectmode )   {
//    $file = multimenu_tpl_rename ( $xoopsModuleConfig['item_mode'] );
//    $temp_list .= '<option value="'.$file['file'].'" selected>'.$file['name'].'</option>';
$mode = ereg_replace('include/', '', $mode);
foreach($item_selectmode as $i=>$file_data){
//            if( $xoopsModuleConfig['item_mode'] != $file_data) {
                $file = multimenu_tpl_rename( $file_data ); 
                $selected=(!$mode&&$file['file']==$xoopsModuleConfig['item_mode'])||$file['file']==$mode?' selected':'';
                $temp_list .= '<option value="'.$file['file'].'"'.$selected.'>'.$file['name'].'</option>';
//            }

        }
 }
     $xoopsTpl->assign('tpl_list', 	$temp_list);

?>