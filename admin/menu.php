<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/

// Define here your operator list + the default values
$op = array(        'op'             =>      'new',
                    'cloneid'        =>      0,
                    'catid'          =>      0,
                    'old_catid'      =>      0,
                    'status'         =>      2,
                    'title'          =>      '',
                    'description'    =>      '',
                    'template'       =>      $xoopsModuleConfig['item_mode'],
                    'image_dir'      =>      $xoopsModuleConfig['edit_dir'],
                    'image'          =>      '',
                    'imageurl'       =>      '',
                    'groups'         =>      '',
                    'css'            =>      '',
                    'confirm'        =>      0
                    );
include_once('include/admin_op_retrieve.php');
include_once('include/admin_edit_functions.php');

$title            = $myts->AddSlashes($title);
$description      = $myts->AddSlashes($description);
$groups           = $groups&&is_array($groups) ? implode(' ', $groups) : '';
$image_dir        = $image_dir?multimenu_clean_url( $image_dir ):$image_dir;
$images           = $image . '|' . $imageurl;

if( !is_dir( '../../../'.$image_dir.'/orig' ) ) { admin_create_dir( '../../../'.$image_dir.'/orig' ); }


// So, what are we doing now?
switch( $op )
  {

// Edit a data
  case ( ($op=='edit' || $op=='clone') && $catid ):

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_menu' )."
                 WHERE catid=" . $catid;
         $result = $xoopsDB->queryF( $sql);
         echo multimenu_display_list( $catid, $def_menu );
         while ( list( $catid, $status, $title, $description, $template, $image_dir, $images, $groups, $css ) = $xoopsDB -> fetchrow( $result ) )
	{
          include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
          $old_catid = $catid;
          $catid = $op=='clone'?'':$catid;
          $title = $op=='clone'?'[CLONE] ' . $title:$title;
          $op = $op=='clone'?'dup':'update';
  	  $form = new XoopsThemeForm(_MD_MULTIMENU_EDIT_MENU . ' : ' . $title, 'newform', 'index.php?admin=menu&op='.$op.'&catid='.$catid);
  	  include 'form/menuform.inc.php';
  	  $form->display();
  	  if( $xoopsModuleConfig['edit_tips'] ) { echo admin_icon_legend(); }
          }
    break;


// Update a data
  case ( $op=='update' && $catid ):

  	$sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_menu')."
	        SET
                    status = '$status',
                    title = '$title',
                    description = '$description',
                    template = '$template',
                    image_dir= '$image_dir',
                    image='$images',
                    groups = '$groups',
                    css = '$css'
	        WHERE catid = '$catid'";
 	$xoopsDB->queryF($sql);
        redirect_header($def_menu, 1, _MD_MULTIMENU_UPDATED );
        exit();
    break;

// Switch on or off
  case ( $op=='status' && $catid ):

  	$sql = "UPDATE ".$xoopsDB->prefix($xoopsModule->dirname().'_menu')."
	        SET status = '$status'
	        WHERE catid = '$catid'";
 	$xoopsDB->queryF($sql);
        // redirect_header($def_menu, 1, _MD_MULTIMENU_UPDATED );
        header('Location: '.$def_menu);
        exit();
    break;

// Duplicate a data
  case ( ($op=='post' || $op=='dup') && !$catid ):

	$sql = "INSERT INTO ".$xoopsDB->prefix($xoopsModule->dirname().'_menu') . "
	        VALUES ('', '$status', '$title', '$description', '$template', '$image_dir', '$images', '$groups', '$css')";
	$xoopsDB->queryF($sql);

       // Duplicate any linked links
        if( $op=='clone' ) {
                          $new_id = $xoopsDB->getInsertId();

                 $sql = "SELECT *
                         FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_link' )."
                         WHERE catid=".$old_catid."
                         ORDER BY weight ASC";
         $old_id = 0;
         $result = $xoopsDB->queryF( $sql );
         while ( list( $id,
                       $pid,
                       $catid,
                       $type, 
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
                       $pid = $pid?$old_id:0;
     	               $insert = "INSERT INTO ".$xoopsDB->prefix($xoopsModule->dirname().'_link') . "
    	                          VALUES (     0,
                                               '$pid',
                                               '$new_id',
                                               '$type',
                                               '$status',
                                               '$weight',
                                               '$title',
                                               '$alt_title',
                                               '$link',
                                               '$query',
                                               '$target',
                                               '$images',
                                               '$groups',
                                               '$css' )";
    	               $xoopsDB->queryF($insert);
                       $old_id = $xoopsDB->getInsertId();
                    }

        }

      redirect_header($def_menu, 1, _MD_MULTIMENU_INSERTED);
        exit();
    break;

// Delete a data
  case ( ($op=='delete' || $op=='confirm') && $catid ):

       if ( $confirm )
		{
                    	$sql = "DELETE FROM ".$xoopsDB->prefix($xoopsModule->dirname().'_menu')."
                		WHERE catid='$catid'";
                	$xoopsDB->queryF($sql);
                	
                	$sql = "DELETE FROM ".$xoopsDB->prefix($xoopsModule->dirname().'_link')."
                		WHERE catid='$catid'";
                	$xoopsDB->queryF($sql);
                
                        redirect_header($def_menu, 1, _MD_MULTIMENU_DELETED );
                        exit();

		} else {
                        $sql = "SELECT title
                                FROM " . $xoopsDB -> prefix($xoopsModule->dirname().'_menu') . " 
                                WHERE catid=$catid";
			$result = $xoopsDB->queryF( $sql );
			// list( $id, $subject ) = $xoopsDB -> fetchrow( $result );
			$myrow 	= $xoopsDB->fetchArray( $result );
			xoops_cp_header();
			xoops_confirm( array( 'op' => 'confirm', 'catid' => $catid, 'confirm' => 1, 'subject' => $myrow['title'] ), $def_menu, _MD_MULTIMENU_CONFIRM . "<p />" . $myts->displayTarea($myrow['title']), _MD_MULTIMENU_DELETE );
                        xoops_cp_footer();
		}

        exit();
    break;


  default:
        echo multimenu_display_list( $catid, $def_menu );
  	include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
	$form = new XoopsThemeForm(_MD_MULTIMENU_NEW_MENU, "newform", "index.php?admin=menu&op=post");
	include 'form/menuform.inc.php';
	$form->display();
	if( $xoopsModuleConfig['edit_tips'] ) { echo admin_icon_legend(); }

    break;
}












function multimenu_display_list( $id, $def_menu ) {

  Global $xoopsDB, $xoopsModuleConfig, $myts;

  include_once('../include/functions_urw.php');

// Retrive data list

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( 'multimenu_menu' ) . "
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
          $ret .= '<tr style="text-align:center;">';
            $ret .= '<th width="5%">'._MD_MULTIMENU_ID.'</th>';
            $ret .= '<th width="5%">'._MD_MULTIMENU_IMAGE.'</th>';
            $ret .= '<th width="15%">'._MD_MULTIMENU_TITLE.'</th>';
            $ret .= '<th width="5%">'._MD_MULTIMENU_STATUS.'</th>';
            $ret .= '<th width="20%">'._MD_MULTIMENU_DESC.'</th>';
            $ret .= '<th width="40%">'._MD_MULTIMENU_ADMIN.'</th>';
          $ret .= '</tr>';
         $width = 48;
         $css_image = '<br />
                       <img src="../images/icon/css.gif"
                             width="'.round($width/2).'"
                             align="absmiddle"
                             alt="'._MD_MULTIMENU_CSS.'" />';
         $class = 'odd'; $i=1;
         while ( list( $l_catid, $l_status, $l_title, $l_description, $l_template, $l_imagedir, $l_image, $groups, $l_css ) = $xoopsDB -> fetchrow( $result ) )
	{
          $status_img  = $l_status?'on':'off'; // $status_img  = !$old_main_pid_status&&$l_pid?'hidden':$status_img;
          $status_img  = $l_status==2?'hidden':$status_img;
          $status_lnk = $l_status!=1?1:0;
          $css_img    = $l_css?$css_image:'';
          $class = $class=='odd'?'even':'odd';
          $class_select = $l_catid==$id?'_current':'';

          // Image
          $l_image    = explode('|', $l_image);
          $l_image[0] = $l_image[0]?'../../../'.$xoopsModuleConfig['edit_dir'].$l_image[0]:'';
          $l_image    = $l_image[1]?$l_image[1]:$l_image[0];
          $l_image    = $l_image?'<a title="'.$l_image.'"><img src="'.$l_image.'" width="64" alt="'.$l_image.'" /></a>':'';
          
          // Admin buttons
          $css_mode = multimenu_tpl_rename( $l_template );
          $admin_buttons = array(
                                  'edit'           =>      $def_menu.'&catid='.$l_catid.'&op=edit',
                                  'clone'          =>      $def_menu.'&catid='.$l_catid.'&op=clone',
                                  'delete'         =>      $def_menu.'&catid='.$l_catid.'&op=delete',
                                  'other'          =>      '',
                                  'link'           =>      '?admin=link&catid='.$l_catid,
                                  'images'         =>      '?admin=images&catid='.$l_catid,
                                  'templates'      =>      '?admin=templates&tpl='.$css_mode['name']
                       );
                       
                       
          $template_icon = '<img src="../images/icon/templates.png" width="'.round($width/2).'" alt="'.$l_template.'" align="absmiddle" /> '.$css_mode['file_name'];

          // link
          $title_link = $l_status?'<a class="tooltip" href="../item.php?id='.$l_catid.'">'.$myts->makeTareaData4Show($l_title) . 
                      ( $xoopsModuleConfig['edit_tips'] ? '<div><span></span>'. $template_icon . $css_img .  '</div>' : '' ) .
                      '</a>':$l_title;
          $urw        = $xoopsModuleConfig['urw_count']?multimenu_create_url( '../item.php?id='.$l_catid,
                                               $l_title,
                                               '_self',
                                               $xoopsModuleConfig['urw_count'] ):'';
          $urw        = $urw?ereg('html',$urw)?'<a href="'.$urw.'" title="'.$urw.'"><img src="../images/icon/rewriting.gif" align="absmiddle" alt="'.$urw.'" /></a> | ':'<a href="'.$urw.'" title="'.$urw.'"><img src="../images/icon/important.gif" align="absmiddle" alt="'.$urw.'" /></a> | ':'';
          
          $ret .= '<tr class="'.$class.$class_select.'"">';
            $ret .= '<td  style="text-align:center; border-bottom: #bcc2fc dotted 1px; font-weight:bold;">'.$i++.'.</td>';
            $ret .= '<td  style="text-align:center; border-bottom: #bcc2fc dotted 1px;">'.$l_image.'</td>';
            $ret .= '<td style="text-align:left; border-bottom: #bcc2fc dotted 1px;">'.$urw.$title_link.'</td>';
            $ret .= '<td style="text-align:center; border-bottom: #bcc2fc dotted 1px;">
                     <a href="'.$def_menu.'&catid='.$l_catid.'&op=status&status='.$status_lnk.'">
                     <img src="../images/icon/'.$status_img.'.gif" /></a>
                     </td>';

            $ret .= '<td style="text-align:left; border-bottom: #bcc2fc dotted 1px;">'.admin_short_title($l_description, $xoopsModuleConfig['index_title_lenght']).'</td>';
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
$ret .= '<p></p>';

Return $ret;
}

?>