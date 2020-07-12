<?php
#######################################################
#  Multimenu version 1.1 pour Xoops 2.0.x	      #
#  						      #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )   #
#  						      #
#  Licence : GPL 				      #
#######################################################

// Nav box admin Menu
$i=0;
    $adminmenu[++$i]['title'] = _MI_MULTIMENU_INDEX;
    $adminmenu[$i]['link'] = "./";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_INDEX_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_MENU;
    $adminmenu[$i]['link'] = "admin/index.php?admin=menu";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_MENU_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_LINK;
    $adminmenu[$i]['link'] = "admin/index.php?admin=link";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_LINK_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_QUERY;
    $adminmenu[$i]['link'] = "admin/index.php?admin=query";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_QUERY_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_IMAGE;
    $adminmenu[$i]['link'] = "admin/index.php?admin=images";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_IMAGE_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_TEMPLATE;
    $adminmenu[$i]['link'] = "admin/index.php?admin=templates";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_TEMPLATE_DSC;
    
    $adminmenu[++$i]['title'] = _MI_MULTIMENU_BLOCK;
    $adminmenu[$i]['link'] = "admin/index.php?admin=blocks";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_BLOCK_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_SETTINGS;
    $adminmenu[$i]['link'] = "admin/index.php?admin=settings";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_SETTINGS_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_UTILS;
    $adminmenu[$i]['link'] = "admin/index.php?admin=utils";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_UTILS_DSC;

    $adminmenu[++$i]['title'] = _MI_MULTIMENU_HELP;
    $adminmenu[$i]['link'] = "admin/index.php?admin=help";
    $adminmenu[$i]['description'] = _MI_MULTIMENU_HELP_DSC;

?>
