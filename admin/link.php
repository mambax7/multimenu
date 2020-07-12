<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/


// Define here your operator list + the default values
$op = array(        'op'             =>      'new',
                    'id'             =>      0,
                    'pid'            =>      0,
                    'catid'          =>      0,
                    'type'           =>      'permanent',
                    'relative'       =>      '',
                    'status'         =>      1,
                    'weight'         =>      0,
                    'title'          =>      '',
                    'alt_title'      =>      '',
                    'link'           =>      '',
                    'query'          =>      '',
                    'target'         =>      '_auto',
                    'image'          =>      '',
                    'imageurl'       =>      '',
                    'groups'         =>      '',
                    'css'            =>      '',
                    'confirm'        =>      0
                    );
include_once('include/admin_op_retrieve.php');
include_once('include/admin_edit_functions.php');

        $title      = $myts->AddSlashes($title);
        $alt_title  = $myts->AddSlashes($alt_title);
        $link       = $link?multimenu_clean_url( $link ):$link;

        $link_type  = $link&&$target=='_auto'?ereg('://', $link)?'_blank':'_self':$target;
        $target     = $target='_auto'?$link_type :$target;
        $groups     = $groups&&is_array($groups) ? implode(' ', $groups) : '';
        $images     = $image . '|' . $imageurl;
        
         $sql = "SELECT image_dir
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_menu' ) . "
                 WHERE catid=$catid";
         $result = $xoopsDB->queryF( $sql);
         $myrow 	= $xoopsDB->fetchArray( $result );
         $image_dir     = $myrow['image_dir'];
         if( !is_dir( '../../../'.$image_dir ) ) { admin_create_dir( '../../../'.$image_dir ); }













// So, what are we doing now?
switch( $op )
  {

// Edit a data
  case ( ($op=='edit' || $op=='clone') && $id ):


         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_link' )."
                 WHERE id=" . $id;
         $result = $xoopsDB->queryF( $sql);
         echo multimenu_display_list($id, $catid, $image_dir, $def_menu);
         while ( list( $id,
                       $pid,
                       $catid,
                       $type,
                       $relative,
                       $status,
                       $weight,
                       $title, 
                       $alt_title,
                       $link,
                       $query,
                       $target,
                       $images,
                       $groups,
                       $css  ) = $xoopsDB -> fetchrow( $result ) )
	{
          include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
          $id = $op=='clone'?'':$id;
          $title = $op=='clone'?'[CLONE] ' . $title:$title;
//          $weight = $op=='clone'&&!$pid?$weight+10:$weight;
          $op = $op=='clone'?'post':'update';
  	  $form = new XoopsThemeForm(_MD_MULTIMENU_EDIT_LINK . ' : '. $title, 'newform', $def_menu.'&op='.$op.'&id='.$id.'&catid='.$catid);
  	  include 'form/linkform.inc.php';
  	  $form->display();
  	  if( $xoopsModuleConfig['edit_tips'] ) { echo admin_icon_legend(); }
          }
    break;


// Update a data
  case ( $op=='update' && $id ):
//        $weight = multimenu_check_sort( $pid, $weight );
        --$weight;
  	$sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_link')."
	        SET
                    catid      = '$catid',
                    pid        = '$pid',
                    status     = '$status',
                    type       = '$type',
                    relative   = '$relative',
                    title      = '$title',
                    weight     = '$weight',
                    title      = '$title',
                    alt_title  = '$alt_title',
                    link       = '$link',
                    query      = '$query',
                    target     = '$target',
                    image      = '$images',
                    title      = '$title',
                    groups     = '$groups',
                    css        = '$css'
	        WHERE id       = '$id'";
 	$xoopsDB->queryF($sql);

        multimenu_sort_links( $catid );
        redirect_header($def_menu.'&catid='.$catid, 1, _MD_MULTIMENU_UPDATED );
        exit();
    break;

// Post a new data
  case ( $op=='post' && !$id ):
//        $weight = multimenu_check_sort( $pid, $weight );
        --$weight;
	$sql = "INSERT INTO ".$xoopsDB->prefix($xoopsModule->dirname().'_link') . "
	        VALUES (
                       0,
                       '$pid',
                       '$catid',
                       '$type',
                       '$relative',
                       '$status',
                       '$weight',
                       '$title',
                       '$alt_title',
                       '$link',
                       '$query',
                       '$target',
                       '$images',
                       '$groups',
                       '$css')";
	$xoopsDB->queryF($sql);

	if($catid) { multimenu_sort_links( $catid ); }

      redirect_header($def_menu.'&catid='.$catid, 1, _MD_MULTIMENU_INSERTED);
        exit();
    break;

// Switch on or off
  case ( $op=='status' && $id ):

  	$sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_link')."
	        SET status = '$status'
	        WHERE id = '$id'";

 	$xoopsDB->queryF($sql);
        // redirect_header($def_menu.'&catid='.$catid, 1, _MD_MULTIMENU_UPDATED );
        header('Location: '.$def_menu.'&catid='.$catid);
        exit();
    break;
    
// Change link weight
  case ( $op=='weight' && $id ):

         --$weight;
         $sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_link')."
	         SET weight = '$weight'
	         WHERE id   = '$id'";
 	$xoopsDB->queryF($sql);

        if($catid) { multimenu_sort_links( $catid ); }
        
        header('Location: '.$def_menu.'&catid='.$catid);
        exit();
    break;

// Delete a data
  case ( ($op=='delete' || $op=='confirm') && $id ):

       if ( $confirm )
		{
                    	$sql = "DELETE FROM ".$xoopsDB->prefix($xoopsModule->dirname().'_link')."
                		WHERE id='$id'";
                	$xoopsDB->queryF($sql);
                        redirect_header($def_menu.'&catid='.$catid, 1, _MD_MULTIMENU_DELETED );

                        exit();

		} else {
                        $sql = "SELECT title
                                FROM " . $xoopsDB -> prefix($xoopsModule->dirname().'_link') . "
                                WHERE id=$id";
			$result = $xoopsDB->queryF( $sql );
			$myrow 	= $xoopsDB->fetchArray( $result );
			xoops_cp_header();
			xoops_confirm( array( 'op' => 'confirm', 'id' => $id, 'confirm' => 1, 'subject' => $myrow['title'] ), $def_menu.'&catid='.$catid, _MD_MULTIMENU_CONFIRM . "<p />" . $myts->displayTarea($myrow['title']), _MD_MULTIMENU_DELETE );
                        xoops_cp_footer();
		}

        exit();
    break;




  default:
        echo multimenu_display_list($id, $catid, $image_dir, $def_menu);
  	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$form = new XoopsThemeForm(_MD_MULTIMENU_NEW_LINK, "newform", "index.php?admin=link&op=post");
	include 'form/linkform.inc.php';
        $form->display();
        if( $xoopsModuleConfig['edit_tips'] ) { echo admin_icon_legend(); }
    break;
}



















// Sorting function
function multimenu_sort_links( $catid ) {
Global $xoopsDB;
         $sql = "SELECT id, pid
                 FROM " . $xoopsDB->prefix( 'multimenu_link' )."
                 WHERE catid=$catid AND pid=0
                 ORDER BY weight ASC";
         $result = $xoopsDB->queryF( $sql); $weight=0;
         while ( list( $id, $pid ) = $xoopsDB -> fetchrow( $result ) )
	{
          $weight     = round($weight, -1)+100;
          $sql = "UPDATE ".$xoopsDB->prefix( 'multimenu_link' )."
	          SET   weight  = '$weight'
	          WHERE id      = '$id'";
 	$xoopsDB->queryF($sql);
 	
 	multimenu_sort_sublinks( $id, $catid, $weight );

 	}
}

function multimenu_sort_sublinks( $id, $catid, $weight ) {
Global $xoopsDB;
         $sql = "SELECT id, pid
                 FROM " . $xoopsDB->prefix( 'multimenu_link' )."
                 WHERE catid=$catid AND pid=$id
                 ORDER BY pid ASC, weight ASC";
         $result = $xoopsDB->queryF( $sql);
         while ( list( $id, $pid ) = $xoopsDB -> fetchrow( $result ) )
	{
          ++$weight;

          $sql = "UPDATE ".$xoopsDB->prefix( 'multimenu_link' )."
	          SET   weight  = '$weight'
	          WHERE id      = '$id'";
 	$xoopsDB->queryF($sql);
 	}
}


function multimenu_check_sort( $pid, $weight ) {
Global $xoopsDB;
    if( $pid ) {
         $sql = "SELECT weight
                 FROM " . $xoopsDB->prefix( 'multimenu_link' )."
                 WHERE id=" . $pid;
         $result = $xoopsDB->queryF( $sql);
         $myrow  = $xoopsDB->fetchArray( $result );
         $weight = $weight<=$myrow['weight']?++$myrow['weight']:$weight;
         $weight = $weight>=($myrow['weight']+10)?($myrow['weight']+9):$weight;
  }
  
  Return $weight;
}


// Retrive data list
function multimenu_display_list( $id=0, $catid=0, $image_dir, $def_menu ) {

  Global $xoopsDB, $xoopsModuleConfig;
  $width = 48;

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( 'multimenu_link' ) . "
                 WHERE catid=$catid
                 ORDER BY weight ASC";
         $result = $xoopsDB->queryF( $sql);

$ret = '
  <script type="text/javascript" language="JavaScript">
          <!--
          function Go(x) {
             location.href = x;
             document.forms[0].reset();
             document.forms[0].elements[0].blur();

          }
          //-->
          </script>
';

$ret .= admin_url_selector( $catid,
                           '',
                           'index.php?admin=link&catid=',
                           _MD_MULTIMENU_WAITING.'|index.php?admin=link',
                           'tab',
                           'multimenu_menu|catid|title|status',
                           1,
                           'self' );


$ret .= "
    	<style type='text/css'>
		td .link_perm a { color:black; font-style:normal; font-weight:bold;  padding-left:6px;  }
		td .link_rel  a { color:black; font-style:italic; font-weight:bold;  padding-left:6px;  }
		td .permanent a { color:grey;  font-style:normal; padding-left:12px; font-weight:normal; }
		td .relative  a { color:grey;  font-style:italic; padding-left:12px; font-weight:normal; }
		tr .odd_current, .even_current { background-color:LightBlue; color:White; }
		option .selected { font-color:White; }
		
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
//     http://www.peutetreunereponse.net/article-6614978.html
$ret .= '<div style="height:380px;
                     overflow:auto;
                     margin:0px; 
                     border:1px solid #c2cdd6; 
                     background: url(../images/background.gif) white no-repeat center center;">';
$ret .= '<table cellspacing="0" cellpadding="5" class="outer" border="0" width="100%">';
          $ret .= '<tr style="text-align:center;">';
            $ret .= '<th width="5%">'._MD_MULTIMENU_ID.'</th>';
            $ret .= '<th width="5%">'._MD_MULTIMENU_IMAGE.'</th>';
            $ret .= '<th width="15%">'._MD_MULTIMENU_TITLE.'</th>';
            $ret .= '<th width="5%">'._MD_MULTIMENU_STATUS.'</th>';
            $ret .= '<th width="30%">'._MD_MULTIMENU_URL.'</th>';
            $ret .= '<th width="5%">'._MD_MULTIMENU_WEIGHT.'</th>';
            $ret .= '<th width="45%">'._MD_MULTIMENU_ADMIN.'</th>';
          $ret .= '</tr>';
          
          $css_image = '
                        <img src="../images/icon/css.gif"
                             width="'.round($width/2).'"
                             alt="'._MD_MULTIMENU_CSS.'"
                             align="absmiddle" />
                        '._MD_MULTIMENU_CSS;

         $class = 'odd'; $i=1;
         while ( list( $l_id,
                       $l_pid,
                       $l_catid, 
                       $l_type,
                       $l_relative, 
                       $l_status,
                       $l_weight, 
                       $l_title, 
                       $l_alt_title,
                       $l_link,
                       $l_query,
                       $l_target,
                       $l_image, 
                       $l_groups,
                       $l_css ) = $xoopsDB -> fetchrow( $result ) )
	{

// Check queries
if( $l_query ){
   $sql_query = "SELECT title, qtable
                 FROM " . $xoopsDB->prefix( 'multimenu_query' ) . "
                 WHERE id=".$l_query;

                 $sql_query  = $xoopsDB->queryF( $sql_query );
                 $myrow     = $xoopsDB->fetchArray( $sql_query );
                 $query_icon = '<a title="'.$myrow['title'].'">
                                <img src="../images/icon/query.png"
                                     width="'.$width.'"
                                     alt="'.$myrow['title'].'" />
                                 </a>';
                 $query_link = '<br />
                        <a   href="include/admin_check_query.php?id='.$l_query.'"
                             onclick="pop=window.open(\'\', \'wclose\', \'width=468, height=600, dependent=yes, toolbar=no, scrollbars=yes, status=no, resizable=yes, fullscreen=no, titlebar=no, left=200, top=40\', \'false\');
                             pop.focus(); "
                             target="wclose"
                             title="'.$myrow['title'].'">
                        <img src="../images/icon/query.png"
                             width="'.$width.'"
                             alt="'.$myrow['title'].'"
                             align="absmiddle" />
                             '.$myrow['title'].'
                             </a>
                             ';
           } else { $query_link = ''; $query_icon = ''; }
           
          $old_main_pid_status    = !$l_pid?$l_status:$old_main_pid_status;
          $l_type      = $l_pid   ? $l_type=='permanent' ? 'permanent'  : 'relative' : $l_type;
          $l_type      = !$l_pid  ? $l_type=='permanent' ? 'link_perm'  : 'link_rel' : $l_type;
          $status_img  = $l_status?'on':'off'; $status_img  = !$old_main_pid_status&&$l_pid?'hidden':$status_img;
          $status_img  = $l_query&&!$l_link&&$l_status?'hidden':$status_img;
          $status_lnk = $l_status>0?0:1;
          $css_icon     = $l_css?$css_image:'';

          $l_link_url  = $l_link?ereg('://', $l_link)?$l_link:'../../../'.$l_link:'';
          $l_link_type = $l_link?ereg('://', $l_link)?'link_out':'link_in':'none';

          $link_icon   = $l_link_type!='none'?'<img src="../images/icon/'.$l_link_type.'.png" width="'.round($width/2).'" alt="'.$l_alt_title.'" align="absmiddle" /> '.admin_define( $l_link_type ).'<br />':'';
          $alt_icon    = $l_alt_title?'<img src="../images/icon/bulle.png" width="'.round($width/2).'" alt="'._MD_MULTIMENU_INFOBULLE.':'.$l_alt_title.'" align="absmiddle" /> '.$l_alt_title.'<br />':'';
          $target_icon = $l_link?'<img src="../images/icon/'.$l_target.'.png" width="'.round($width/2).'" alt="'._MD_MULTIMENU_TARGET.':'.$l_target.'" align="absmiddle" /> '.admin_define( $l_target ).'<br />':'';
          $type_icon   = $l_link?'<img src="../images/icon/'.$l_type.'.png" width="'.round($width/2).'" alt="'._MD_MULTIMENU_TYPE.':'.$l_type.'" align="absmiddle" /> '.admin_define( $l_type ).'<br />':'';

// Admin buttons
          $admin_buttons = array(
                                  'edit'           =>      $def_menu.'&catid='.$catid.'&id='.$l_id.'&op=edit',
                                  'clone'          =>      $def_menu.'&catid='.$catid.'&id='.$l_id.'&op=clone',
                                  'delete'         =>      $def_menu.'&catid='.$catid.'&id='.$l_id.'&op=delete',
                                  'images'         =>      '?admin=images&catid='.$catid
                       );

// Images
          $l_image    = explode('|', $l_image);
          $l_image[0] = $l_image[0]?'../../../'.$image_dir.$l_image[0]:'';
          $l_images   = $l_image[1]?$l_image[1]:$l_image[0]; $check_image = @getimagesize($l_images);
          $l_images   = $l_image[0]&&!$check_image&&!$l_image[1]?'../images/icon/none.png':$l_images;
          $l_image    = $l_images?'<img src="'.$l_images.'" width="32" alt="'.$l_images.'" align="right" />':'';
//          $l_image    = $l_images?$l_images:'';

// Display data list
          $class = $class=='odd'?'even':'odd';
          $class_select = $l_id==$id?'_current':'';
            $ret .= '<tr class="'.$class.$class_select.'">';

            $ret .= '<td style="text-align:center; border-bottom: #bcc2fc dotted 1px; font-weight:bold;">'.$i++.'.</td>';

            $ret .= '<td style="text-align:center; border-bottom: #bcc2fc dotted 1px;">
                    '.$l_image.'</td>';

            $ret .= '<td style="text-align:left; border-bottom: #bcc2fc dotted 1px;" class="'.$l_type.'">
                     <a class="tooltip" href="'.$l_link_url.'" target="_blank" title="" style="'.$l_css.'">
                     '.$l_title;

            $ret .= $xoopsModuleConfig['edit_tips']?'<div><span></span>'. $type_icon . $link_icon . $target_icon . $css_icon . $alt_icon . $l_relative . '</div>':'';

            $ret .= '
                     </a></td>';

            $ret .= '<td style="text-align:center; border-bottom: #bcc2fc dotted 1px;">
                     <a href="'.$def_menu.'&catid='.$catid.'&id='.$l_id.'&op=status&status='.$status_lnk.'">
                     <img src="../images/icon/'.$status_img.'.gif" /></a>
                     </td>';

            $ret .= '<td style="text-align:left; border-bottom: #bcc2fc dotted 1px;">
                     ' . admin_short_title($l_link, $xoopsModuleConfig['index_title_lenght']) . '<br />
                     '.$query_link.'
                     </td>';
                     
                     
                     // Weight
         $where = $l_pid?'AND pid='.$l_pid:'AND pid=0';
         $sql_weight = "SELECT title, weight
                 FROM " . $xoopsDB->prefix( 'multimenu_link' ) . "
                 WHERE catid=$l_catid $where
                 ORDER BY weight ASC";
         $result_weight = $xoopsDB->queryF( $sql_weight);
        $last_weight = 0;
        $select_list ='<option style="background-color:LightGrey;" value="'.$def_menu.'&catid='.$catid.'&id='.$l_id.'&op=weight&weight=0">< '._MD_MULTIMENU_TOP.' ></option>';
         while ( list( $weight_title, $weight_weight ) = $xoopsDB -> fetchrow( $result_weight ) )
	{
          $selected = $weight_weight==$l_weight?' selected':'none';
          $select_list .='<option value="'.$def_menu.'&catid='.$catid.'&id='.$l_id.'&op=weight&weight='.$weight_weight.'"'.$selected.'>'.admin_short_title($weight_title, $xoopsModuleConfig['index_title_lenght']).'</option>';
        }
          $select_list .='<option style="background-color:LightGrey;" value="'.$def_menu.'&catid='.$catid.'&id='.$l_id.'&op=weight&weight=1000000">< '._MD_MULTIMENU_BOTTOM.' ></option>';




            $ret .= '<td style="text-align:left; border-bottom: #bcc2fc dotted 1px;">
                     <form action="">
                     <select size="1" name="multimenu" onchange="Go(multimenu.options[multimenu.options.selectedIndex].value)">>
                     '.$select_list.'
                     </select>
                     </form>
                     </td>';
            $ret .= '<td  style="text-align:center; border-bottom: #bcc2fc dotted 1px;">'.
                     multimenu_create_admin_links( $admin_buttons,
                                                   $id, $l_status,
                                                   '../images/icon/',
                                                   '.png',
                                                   $xoopsModuleConfig['edit_button'],
                                                   $width,
                                                   '_MD'  )
                     .'</td>';
          $ret .= '</tr>';
          }
$ret .= '</table>';
$ret .= '</div>';
/*
$ret .= '<p /><div align="center"><table style="width:100px;"><tr><td>
	 <form action="index.php?admin=menu" method="post" name="form">
        	<input type="submit" name="submit" value="'._MD_MULTIMENU_NEW_MENU.'">
	 </form>
	';
	
$ret .= '</td><td>
	 <form action="index.php?admin=link&catid='.$catid.'" method="post" name="form">
        	<input type="submit" name="submit" value="'._MD_MULTIMENU_NEW_LINK.'">
	 </form>
	';
	
$ret .= '</td><td>
	 <form action="index.php?admin=query" method="post" name="form">
        	<input type="submit" name="submit" value="'._MD_MULTIMENU_NEW_QUERY.'">
	 </form>
	 </td><tr></table>
 	</div>
	';
*/
$ret .= '<p />';

Return $ret;
}
?>