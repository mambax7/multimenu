<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multilink 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/


//	$myts =& MyTextSanitizer::getInstance();
	$title      = $myts->makeTboxData4Edit($title);
	$alt_title  = $myts->makeTboxData4Edit($alt_title);
        $images     = explode('|', $images);
        $image      = $images[0];
        $imageurl   = $images[1];


	$formtitle = new XoopsFormText(_MD_MULTIMENU_TITLE, "title", 60, 255, $title);
	$formalt_title = new XoopsFormText(_MD_MULTIMENU_ALT_TITLE, "alt_title", 60, 60, $alt_title);
	$formlink = new XoopsFormText(_MD_MULTIMENU_URL, "link", 60, 255, $link);


	// image
	$image_array  = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/'.$image_dir );
	$image_select = new XoopsFormSelect( '', 'image', $image );
	$image_select->addOption( '', ' ' );
	$image_select->addOptionArray( $image_array );
	$image_select->setExtra( 'onchange="showImgSelected(\'image3\', \'image\', \''.$image_dir.'\', \'\', \'' . XOOPS_URL . '\')"' );
	$formimage    = new XoopsFormElementTray(_MD_MULTIMENU_IMAGE, '&nbsp;' );
	$formimage->addElement( $image_select );

/*	$max_size = 50000;
    if ( isset($image_select) ) {
		$image_box = new XoopsFormFile("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" , "image_file", $max_size);
	} else {
		$image_box = new XoopsFormFile("", "image_file", $max_size);
   	}
	$image_box->setExtra( 'size="40"');
	$formimage->addElement( $image_box );
*/	
	$formimage->addElement( new XoopsFormLabel( '', '<div style="height:120px; 
                                                                     width:468px; 
                                                                     overflow:auto; 
                                                                     text-align:center; 
                                                                     margin:10px; 
                                                                     background: white; 
                                                                     border:2px inset grey;">
                                                          <p />
                                                          <img src="' . XOOPS_URL . '/' . $image_dir . $image . '" 
                                                               name="image3" 
                                                               id="image3" 
                                                               alt="" />
                                                          </div>' ) );
	  
	
	// image url
	$formimageurl = new XoopsFormText(_MD_MULTIMENU_IMAGEURL, 'imageurl', 60, 255, $imageurl);

	// Status
	$formstatus = new XoopsFormRadio(_MD_MULTIMENU_STATUS, 'status', $status);
	$formstatus->addOption('1', '<img src="../images/icon/on.gif"  align="absmiddle"> ' . _MD_MULTIMENU_ONLINE . '<br />' );
	$formstatus->addOption('0', '<img src="../images/icon/off.gif" align="absmiddle"> ' . _MD_MULTIMENU_OFFLINE );

	$sql = "SELECT COUNT(id)
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_link' ) . "
                 WHERE pid = $id";

         $result = $xoopsDB->queryF( $sql);
         list( $numrows )=$xoopsDB->fetchRow($result);
        
        if( !$numrows || !$id ) {
        $id = $op=='clone'?0:$id;
        $formpid = new XoopsFormSelect(_MD_MULTIMENU_LINKTO, "pid", $pid);
        $formpid->addOption( 0, '< '._MD_MULTIMENU_NONE.' >' );

	$sql = "SELECT id, status, title
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_link' ) . "
                 WHERE catid = $catid AND id!=$id AND pid=0
                 ORDER BY weight ASC";
         $result = $xoopsDB->queryF( $sql);

         while ( list( $l_id,
                       $l_status,
                       $l_title
                                ) = $xoopsDB -> fetchrow( $result ) )
	{
          $l_status = $l_status?'on':'off';
	  $formpid->addOption( $l_id, '['.$l_status.'] ' . $l_title );
	}
        }


	$formtype = new XoopsFormRadio(_MD_MULTIMENU_TYPE, "type", $type);
	$formtype->addOption("permanent",     _MD_MULTIMENU_PERMANENT.'<br />');
	$formtype->addOption("relative",      _MD_MULTIMENU_RELATIVE );
	

	$formrelative = new XoopsFormTextArea(_MD_MULTIMENU_RELATIVE, "relative", $relative, 3);


	$formtarget  = new XoopsFormRadio(_MD_MULTIMENU_TARGET, "target", $target);
	$formtarget->addOption("_auto", _MD_MULTIMENU_TARG_AUTO.'<br />');
	$formtarget->addOption("_self", _MD_MULTIMENU_SELF.'<br />');
	$formtarget->addOption("_blank", _MD_MULTIMENU_BLANK.'<br />');
//	$formtarget->addOption("_parent", _MD_MULTIMENU_TARG_PARENT);
//	$formtarget->addOption("_top", _MD_MULTIMENU_TARG_TOP);

// Groups

// Groups
if(!$groups) {
        $member_handler =& xoops_gethandler('member');
	$xoopsgroups =& $member_handler->getGroups();
	$count = count($xoopsgroups);
	$groups = array();
	for ($i = 0; $i < $count; $i++)  $groups[] = $xoopsgroups[$i]->getVar('groupid');
} else {
        $groups = explode(' ', $groups);
}
	$formgroups = new XoopsFormSelectGroup(_MD_MULTIMENU_GROUPS, "groups", true, $groups, 5, true);
	
// Menu
         $sql = "SELECT catid, status, title
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_menu' );
         $result = $xoopsDB->queryF( $sql);
         
	$formmenu = new XoopsFormSelect(_MD_MULTIMENU_MENU, "catid", $catid);
        $formmenu->addOption(0, '< '._MD_MULTIMENU_WAITING.' >');
         while ( list( $l_catid, $l_status, $l_title ) = $xoopsDB -> fetchrow( $result ) )
	{
          $status_img = $l_status?'on':'off';
          $status_img = $l_status==2?'hidden':$status_img;

          $formmenu->addOption($l_catid, '['.$status_img.'] '.$l_title);  }

// Weight
         $where = $pid?'AND pid='.$pid:'AND pid=0';
         $sql = "SELECT title, weight
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_link' ) . "
                 WHERE catid=$catid $where
                 ORDER BY weight ASC";
         $result = $xoopsDB->queryF( $sql);
         
	$formweight = new XoopsFormSelect(_MD_MULTIMENU_WEIGHT, "weight", $weight);
        $formweight->addOption(0, '< '._MD_MULTIMENU_TOP.' >');
        $last_weight = 0;
         while ( list( $l_title, $l_weight ) = $xoopsDB -> fetchrow( $result ) )
	{
          $formweight->addOption($l_weight, '['.$l_weight.'] '.$l_title);
          $last_weight = $l_weight;
        }
          $formweight->addOption(($last_weight+10), '< '._MD_MULTIMENU_BOTTOM.' >');


/*         $sql = "SELECT id, catid, status, title, weight
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_link' ) . "
                 WHERE catid=".$catid."
                 ORDER BY weight DESC";
         $result = $xoopsDB->queryF( $sql);
         
  	$formweight = new XoopsFormSelect(_MD_MULTIMENU_WEIGHT, "weight", ($weight+1));
        $formweight->addOption('', '');
         while ( list( $l_id, $l_catid, $l_status, $l_title, $l_weight ) = $xoopsDB -> fetchrow( $result ) )
	{           
          $status_img = $l_status?'on':'off';
          $formweight->addOption($l_id, '['.$l_weight.']['.$status_img.'] '.$l_title);  }
 //         $formweight->addOption('', '[LAST]');
*/
// Query
         $sql = "SELECT id, title
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_query' );
         $result = $xoopsDB->queryF( $sql);

	$formquery = new XoopsFormSelect(_MD_MULTIMENU_QUERY, "query", $query);
	$formquery->addOption( 0, '< '._MD_MULTIMENU_NONE.' >' );
         while ( list( $l_id, $l_title ) = $xoopsDB -> fetchrow( $result ) )
	{ $formquery->addOption($l_id, $l_title); }

//CSS
        $formcss = new XoopsFormTextArea(_MD_MULTIMENU_CSS, "css", $css, 2);

	$submit_button = new XoopsFormButton("", "submit", _MD_MULTIMENU_SUBMIT, "submit");
	
    include('java.help.php');
    $options = multimenu_drop_form( _MD_MULTIMENU_OPTIONS, _HLP_MULTIMENU_LINKOPTH, _MD_MULTIMENU_HELP );
    $images  = multimenu_drop_form( _MD_MULTIMENU_IMAGE );
    $css     = multimenu_drop_form( _MD_MULTIMENU_CSS, _HLP_MULTIMENU_LINKCSSH, _MD_MULTIMENU_HELP );

     $form->addElement($drop['in']);

	$form->setExtra('enctype="multipart/form-data"');
	$form->addElement(new XoopsFormHidden("id",  $id));
	$form->addElement($formtitle,     true);
	$form->addElement($formlink,      false);
	$form->addElement($formstatus);
	if( !$numrows || !$id ) { $form->addElement($formpid); }
	$form->addElement($formweight);

if( $image_dir ) {
     $form -> addElement( $images['in'] );
	$form->addElement($formimageurl,  false);
  	$form->addElement($formimage,     false);
     $form -> addElement( $images['out'] );
}

     $form -> addElement( $options['in'] );
	$form->addElement($formalt_title, false);
	$form->addElement($formquery);
	$form->addElement($formmenu);
	$form->addElement($formtype);
	$form->addElement($formrelative);
	$form->addElement($formtarget);
	$form->addElement($formgroups);
     $form -> addElement( $options['out'] );
     
     $form -> addElement( $css['in'] );
	$form->addElement($formcss, false);
     $form -> addElement( $css['out'] );

	$form->addElement($submit_button);
?>