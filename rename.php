<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Multimenu v2.x								//
//  ------------------------------------------------------------------------ 	//

// include_once('header.php');
include_once('../../mainfile.php');
include_once(XOOPS_ROOT_PATH . '/class/xoopslists.php' );

// Define here your operator list + the default values
$ops = array( 
              'dir'        =>      ''
           );
include_once('admin/include/admin_op_retrieve.php');

      $file_list = is_dir( XOOPS_ROOT_PATH . '/' . $file_dir ) ? XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . $file_dir ) : array();

var_dump($file_list);


$result =''; $updated =0;
$result .= '<div style="text-align:left;margin-left:30%;">';
foreach( $file_list as $table ) {
echo $table;
/*
  $current_row = explode(' ', $table);
  $after          = isset($previous_table)?' AFTER '.$previous_table:' FIRST';
  $previous_table = $current_row[0];

 $update_sql = "ALTER TABLE " . $xoopsDB->prefix("mygals_content") . " ADD ".$table.$after."";

 if( $xoopsDB->queryF( $update_sql ) ) { $updated =1; $result .= '<br /><font style="color:Green;text-align:left;">'; } else { $result .= '<br /><font style="color:Red;">';}
                                         $result .= $table;
                                         $result .= '</font>';
 */
}
$result .= '</div>';

 if( $updated ) {
     redirect_header('./', 20, 'Updated<br />' . $result);
        } else {
     redirect_header('./', 4, 'Not Updated');
   }
exit();

?>