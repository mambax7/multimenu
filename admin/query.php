<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/



$op = array(        'op'           =>      'new',
                    'id'           =>      0,
                    'title'        =>      '',
                    'qdescription' =>      '',
                    'qtable'       =>      '',
                    'qid'          =>      'id',
                    'qsubject'     =>      'subject',
                    'qimage'       =>      'image',
                    'qurl'         =>      'modules/edito/content.php?id={id}',
                    'qimageurl'    =>      'uploads/edito/images/',
                    'qwhere'       =>      'status=1',
                    'qorder'       =>      'subject ASC',
                    'qlimit'       =>      10,
                    'confirm'      =>      0
                    );
include_once('include/admin_op_retrieve.php');
include_once('include/admin_edit_functions.php');

$title      = $myts->AddSlashes($title);
$qimageurl  = $qimageurl?multimenu_clean_url( $qimageurl ):$qimageurl;
$qurl       = $qurl?multimenu_clean_url( $qurl ):$qurl;



// So, what are we doing now?
switch( $op )
  {

// Edit a data
  case ( ($op=='edit' || $op=='clone') && $id ):
        

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_query' )."
                 WHERE id=" . $id;
         $result = $xoopsDB->queryF( $sql);
         echo multimenu_display_list( $id, $def_menu );
         while ( list( $id, 
                       $title, 
                       $qtable, 
                       $qid, 
                       $qsubject, 
                       $qdescription, 
                       $qimage, 
                       $qurl,
                       $qimageurl, 
                       $qwhere, 
                       $qorder, 
                       $qlimit ) = $xoopsDB -> fetchrow( $result ) )
	{
          include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
          $id = $op=='clone'?'':$id;
          $title = $op=='clone'?'[CLONE] ' . $title:$title;
          $op = $op=='clone'?'post':'update';
  	  $form = new XoopsThemeForm(_MD_MULTIMENU_NEW_QUERY . ' : ' . $title, "newform", $def_menu.'&op='.$op.'&id='.$id);
  	  include 'form/queryform.inc.php';
  	  $form->display();
  	  if( $xoopsModuleConfig['edit_tips'] ) { echo admin_icon_legend(); }
          }
    break;


// Update a data
  case ( $op=='update' && $id ):

  	$sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_query')."
	        SET
                    title     = '".trim($title)."',
                    qtable    = '$qtable',
                    qid       = '".trim($qid)."',
                    qsubject  = '".trim($qsubject)."',
                    qdescription  = '".trim($qdescription)."',
                    qimage    = '".trim($qimage)."',
                    qurl      = '".trim($qurl)."',
                    qimageurl = '".trim($qimageurl)."',
                    qwhere    = '".trim($qwhere)."',
                    qorder    = '".trim($qorder)."',
                    qlimit    = '".trim($qlimit)."'
	        WHERE id = '$id'";
 	$xoopsDB->queryF($sql);
        redirect_header($def_menu, 1, _MD_MULTIMENU_UPDATED );
        exit();
    break;

// Post a new data
  case ( ($op=='next'||$op=='post') && !$id && $title):

	$sql = "INSERT INTO ".$xoopsDB->prefix($xoopsModule->dirname().'_query') . "
	        VALUES (0,
                        '".trim($title)."',
                        '$qtable',
                        '".trim($qid)."',
                        '".trim($qsubject)."',
                        '".trim($qdescription)."',
                        '".trim($qimage)."',
                        '".trim($qurl)."',
                        '".trim($qimageurl)."',
                        '".trim($qwhere)."',
                        '".trim($qorder)."',
                        '".trim($qlimit)."')";
	$xoopsDB->queryF($sql);
      redirect_header($def_menu, 1, _MD_MULTIMENU_INSERTED);
        exit();
    break;


// Delete a data
  case ( ($op=='delete' || $op=='confirm') && $id ):

       if ( $confirm )
		{
                    	// Delete query
                        $sql = "DELETE FROM ".$xoopsDB->prefix($xoopsModule->dirname().'_query')."
                		WHERE id='$id'";
                	$xoopsDB->queryF($sql);
                	
                        // Update related links
                        $sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_link')."
	                        SET query = ''
	                        WHERE query  = '$id'";
 	                $xoopsDB->queryF($sql);

                        redirect_header($def_menu, 1, _MD_MULTIMENU_DELETED );

                        exit();

		} else {

                        $sql = "SELECT title
                                FROM " . $xoopsDB -> prefix($xoopsModule->dirname().'_query') . "
                                WHERE id=$id";
			$result = $xoopsDB->queryF( $sql );
			$myrow 	= $xoopsDB->fetchArray( $result );
			xoops_cp_header();
			xoops_confirm( array( 'op' => 'confirm', 'id' => $id, 'confirm' => 1, 'subject' => $myrow['title'] ), $def_menu, _MD_MULTIMENU_CONFIRM . "<p />" . $myts->displayTarea($myrow['title']), _MD_MULTIMENU_DELETE );
                        xoops_cp_footer();

		}

        exit();
    break;


  default:
        echo multimenu_display_list( $id, $def_menu );

  	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$form = new XoopsThemeForm(_MD_MULTIMENU_NEW_QUERY, "newform", "index.php?admin=query&op=next");
	include 'form/queryform.inc.php';
	$form->display();
	if( $xoopsModuleConfig['edit_tips'] ) { echo admin_icon_legend(); }
    break;
}















// Retrive data list
function multimenu_display_list( $id, $def_menu ) {

  Global $xoopsDB, $xoopsModuleConfig;

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( 'multimenu_query' ) . "
                 ORDER BY title ASC";
         $result = $xoopsDB->queryF( $sql);

$ret = "
    	<style type='text/css'>
		tr .odd_current, .even_current { background-color:LightBlue; color:White;  }

                a.tooltip div {
                    display:none;
                }
                a.tooltip:hover {
                    border: 0;
                    position: relative;
                    z-index: 500;
                    text-decoration:none;
                }
                a.tooltip:hover div {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 80%;
                    display: block;
                    position: absolute;
                    top: 18px;
                    left: 10px;
                    padding: 5px;
                    color: #000;
                    border: 1px outset Black;
                    background: White;
                    width:260px;
                }
                a.tooltip:hover div span {
                    position: absolute;
                    top: -7px;
                    left: 12px;
                    height: 7px;
                    width: 160px;
                    background: transparent url(../images/infobulletop.gif) no-repeat;
                    margin:0;
                    padding: 0;
                    border: 0;
                }

	</style>
    ";

$ret  .= '<div style="height:410px;
                     overflow:auto;
                     ext-align:center; 
                     margin:0px; 
                     border:1px solid #c2cdd6; 
                     background: url(../images/background.gif) transparent no-repeat center center;">';
$ret .= '<table border="0" cellspacing="0" cellpadding="5" class="outer" width="100%">';

$ret .= '<table border="0" cellspacing="0" cellpadding="5" class="outer" width="100%">';
          $ret .= '<tr style="text-align:center;">';
            $ret .= '<th width="5%">'._MD_MULTIMENU_ID.'</th>';
            $ret .= '<th width="45%">'._MD_MULTIMENU_TITLE.'</th>';
            $ret .= '<th width="10%">'._MD_MULTIMENU_STATUS.'</th>';
            $ret .= '<th width="40%">'._MD_MULTIMENU_ADMIN.'</th>';
          $ret .= '</tr>';
         $class = 'odd'; $i=1;
         while ( list( $l_id, 
                       $l_title, 
                       $l_qtable,
                       $l_qid,
                       $l_qsubject,
                       $l_qdescription,
                       $l_qimage,
                       $l_qurl,
                       $l_qimageurl,
                       $l_qwhere, 
                       $l_qorder, 
                       $l_qlimit ) = $xoopsDB -> fetchrow( $result ) )
	{
          
          // Admin buttons
          $table_link = 'include/admin_check_table.php?table='.$l_qtable.'"
                             onclick="pop=window.open(\'\', \'wclose\', \'width=768, height=600, dependent=yes, toolbar=no, scrollbars=yes, status=no, resizable=yes, fullscreen=no, titlebar=no, left=24, top=40\', \'false\');
                             pop.focus(); "
                             target="wclose"
                             ';

          $admin_buttons = array( 'table_check'    =>      $l_qtable=='dir'?'':$table_link,
                                  'edit'           =>      $def_menu.'&id='.$l_id.'&op=edit',
                                  'clone'          =>      $def_menu.'&id='.$l_id.'&op=clone',
                                  'delete'         =>      $def_menu.'&id='.$l_id.'&op=delete'
                       );


          $test = $l_qtable=='dir' ? 0 :  multimenu_query( $l_id, 1 );
          



          $test = $test['result']?'<img src="../images/icon/on.gif" align="absmiddle"/>':'<img src="../images/icon/none.gif" align="absmiddle"/>';
          $test = $l_qtable=='dir'?'<img src="../images/icon/dir.gif" align="absmiddle"/>':$test;
          $class = $class=='odd'?'even':'odd';
          $class_select = $l_id==$id?'_current':'';

          $l_qid        = '<li>' . $l_qid . '</li>';
          $l_qsubject   = '<li>' . $l_qsubject . '</li>';
          $l_qdescription     = '<hr /> <li>' . $l_qdescription . '</li>';
          $l_qimage     = '<li>' . $l_qimage . '</li>';
          $l_qurl       = '<li>' . multimenu_short_title($l_qurl, 28) . '</li>';
          $l_qimageurl  = '<li>' . $l_qimageurl . '</li>';
          $l_qwhere     = '<li>' . $l_qwhere . '</li>';
          $l_qorder     = '<li>' . $l_qorder . '</li>';
          $l_qlimit     = '<li>' . $l_qlimit . '</li>';

          $ret .= '<tr class="'.$class.$class_select.'"">';
            $ret .= '<td style="text-align:center; border-bottom: #bcc2fc dotted 1px; font-weight:bold;">'.$i++.'.</td>';
            $ret .= '<td style="text-align:left; border-bottom: #bcc2fc dotted 1px;">
                         <a class="tooltip"
                            href="include/admin_check_'.($l_qtable=='dir'?'dir':'query').'.php?id='.$l_id.'"
                            onclick="pop=window.open(\'\', \'wclose\', \'width=568, height=600, dependent=yes, toolbar=no, scrollbars=yes, status=no, resizable=yes, fullscreen=no, titlebar=no, left=200, top=40\', \'false\');
                            pop.focus(); "
                            target="wclose">
                            '.$l_title;

            $ret .= $xoopsModuleConfig['edit_tips']?'<div><span></span><b>' . $l_qtable . '</b><ul>' . $l_qid
                                                                            . $l_qsubject
                                                                            . $l_qurl
                                                                            . $l_qdescription
                                                                            . $l_qimage
                                                                            . $l_qimageurl
                                                                            . $l_qwhere
                                                                            . $l_qorder
                                                                            . $l_qlimit . '</ul></div>':'';
            $ret .= '</a>
                     </td>';
            $ret .= '<td style="text-align:center; border-bottom: #bcc2fc dotted 1px;"><nobr>'.$test.'</nobr></td>';
            $ret .= '<td  style="text-align:center; border-bottom: #bcc2fc dotted 1px;">'.
                     multimenu_create_admin_links( $admin_buttons,
                                                   $id, 2,
                                                   '../images/icon/',
                                                   '.png',
                                                   $xoopsModuleConfig['edit_button'],
                                                   '48',
                                                   '_MD' )
                     .'</td>';
          $ret .= '</tr>';
          }
$ret .= '</table>';

$ret .= '</div>';
$ret .= '<p></p>';

Return $ret;
}
?>