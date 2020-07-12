<?php
########################################################
#  multimenu version 2.x pour Xoops 2.0.x	       #
#  						       #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )    #
#  						       #
#  Licence : GPL 	         		       #
########################################################

include_once("../../../../mainfile.php");


	if (file_exists('../../language/' . $xoopsConfig['language'] . '/admin.php')) {
		include_once '../../language/' . $xoopsConfig['language'] . '/admin.php';
	} else {
		include_once '../../language/english/admin.php';
	}

$id       = isset($_GET['id']) ? intval($_GET['id']) : '';

if(!$id) {
	redirect_header('index.php', 2, _MULTIMENU_PL_SELECT);
	exit();
}



include_once ("admin_functions.php");
include_once ("../../include/functions_query.php");

$datas = multimenu_dir( $id );
$list=''; $i=1; $class='odd';

foreach( $datas['files'] as $file )
     	{
         $ext = ereg_replace('\.','', strtolower(substr($file, strrpos($file, '.'))));
         $icon = '<img src="../../images/mime_type/'.$ext.'.png" align="absmiddle" width="40">';
         $image = eregi($ext, 'gif|jpg|jpeg|tif|png') ? '
                <img src="'. XOOPS_URL . '/' .$datas['qurl'] . $file.'" align="absmiddle" width="90">' : '';

 //        $datas['qwhere'] = $datas['qwhere']?$datas['qwhere']:'.';

 //        if( eregi($datas['qwhere'], $file) ) {

         $class = $class=='odd'?'even':'odd';

         $list .= '
                  <tr>';

         $list .= '<td class="'.$class.'" align="center">
                  '.$i++.'
                  </td>
                   ';

         $list .= '<td class="'.$class.'" align="center">
                  <a href="'. XOOPS_URL . '/' .$datas['qurl'] . $file.'"
                     title="'.$file.'"
                     target="_blank">
                  '.$image.'
                  </a>
                  </td>
                   ';
         $list .= '<td class="'.$class.'">
                  <a href="'. XOOPS_URL . '/' .$datas['qurl'] . $file.'"
                     title="'.$file.'"
                     target="_blank">
                  '.$icon.'
                  '.$file.'
                  </a>
                  </td>
                   ';
         $list .= '
                  </tr>';
//         }
         }

        $ret  = '';
        $ret .= '<link rel="stylesheet" 
                       type="text/css" 
                       media="all"
                       href="../../../../xoops.css" />
                 <link rel="stylesheet"
                       type="text/css" 
                       media="all" 
                       href="../../../../modules/system/style.css" />';

        $ret .= Admin_OpenTable();
        $ret .= '<h3 align="center">'.$datas['title'].'</h3>';
        $ret .= '<div align="center">
                 <table class="outer" width="90%">
                 <tr class="header">
                 <th width="10%">'._MD_MULTIMENU_N.'</th>
                 <th width="40%">'._MD_MULTIMENU_IMAGE.'</th>
                 <th width="50%">'._MD_MULTIMENU_TITLE.'</th>
                 </tr>
          ';
        $ret .= $list;
        $ret .= '</div></table>';
        $ret .=  Admin_CloseTable();
        $ret .=  '<div align="center">
                   <form action="0" align="center">
	           <input type="button" value="'._MD_MULTIMENU_CLOSE.'" onclick="self.close()">
                   </form>
                   </div>
                   ';

// Display result
   echo $ret;

function multimenu_file_type( $file ) {

    $path_info = mime_content_type($file);

    Return $path_info['extension'];


}

?>