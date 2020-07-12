<?php
#######################################################
#  Multimenu version 2.x pour Xoops 2.0.x		#
#  							#
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )	#
#  							#
#  Licence : GPL 					#
#######################################################

	$sql_menu = "SELECT catid, title, image
		FROM ".$xoopsDB->prefix("multimenu_menu")."
		WHERE status='1' AND ( title='' ".$like." )
		ORDER BY title ASC";
        $list_menu = $xoopsDB->queryF($sql_menu);
        $count_list=0;

    	while(list( $iid, $title, $image ) = $xoopsDB->fetchRow($list_menu))
    	{  


        $image    = explode('|', $image);
        $image[0] = $image[0]?'../../'.$xoopsModuleConfig['edit_dir'].$image[0]:'';

           $item['image'] = $image[1]?$image[1]:$image[0];
           $item['id']    =  $iid;
           $item['title'] =  $myts->makeTareaData4Show( $title );
           $item['urw']   = multimenu_create_url( 'item.php?id='.$iid,
                                                $title,
                                                '_self',
                                                $xoopsModuleConfig['urw_count'] );
           $xoopsTpl->append('items_list', 	$item);
     }

     $xoopsTpl->assign('count_list', 	$count_list);
?>