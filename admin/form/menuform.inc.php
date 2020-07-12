<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multimenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/


//	$myts =& MyTextSanitizer::getInstance();


	$title       = $myts->makeTboxData4Edit($title);
	$description = $myts->makeTboxData4Edit($description);
        $images     = explode('|', $images);
        $image      = $images[0];
        $imageurl   = $images[1];

        $formtitle = new XoopsFormText(_MD_MULTIMENU_TITLE, "title", 60, 255, $title);
	$formdesc = new XoopsFormTextArea(_MD_MULTIMENU_DESC, "description", $description, 5);
	$formimage_dir = new XoopsFormText(_MD_MULTIMENU_IMAGEDIR, "image_dir", 60, 255, $image_dir);
	
	$formstatus = new XoopsFormRadio(_MD_MULTIMENU_STATUS, 'status', $status);
	$formstatus->addOption('1', '<img src="../images/icon/on.gif"     align="absmiddle"> ' . _MD_MULTIMENU_ONLINE . '<br />' );
	$formstatus->addOption('2', '<img src="../images/icon/hidden.gif" align="absmiddle"> ' . _MD_MULTIMENU_HIDDEN . '<br />' );
	$formstatus->addOption('0', '<img src="../images/icon/off.gif"    align="absmiddle"> ' . _MD_MULTIMENU_OFFLINE );
        
	// image
	$image_array  = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/'.$xoopsModuleConfig['edit_dir'] );
	$image_select = new XoopsFormSelect( '', 'image', $image );
	$image_select->addOption( '', ' ' );
	$image_select->addOptionArray( $image_array );
	$image_select->setExtra( 'onchange="showImgSelected(\'image3\', \'image\', \''.$xoopsModuleConfig['edit_dir'].'\', \'\', \'' . XOOPS_URL . '\')"' );
	$formimage    = new XoopsFormElementTray(_MD_MULTIMENU_IMAGE, '&nbsp;' );
	$formimage->addElement( $image_select );

/*
	$max_size = 50000;
    if ( isset($image_select) ) {
		$image_box = new XoopsFormFile("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" , "image_file", $max_size);
	} else {
		$image_box = new XoopsFormFile("", "image_file", $max_size);
   	}
	$image_box->setExtra( 'size="40"');
	$formimage->addElement( $image_box );
*/
	$formimage->addElement( new XoopsFormLabel( '', '<div style="height:120px; width:468px; overflow:auto; text-align:center; margin:10px; background: white; border:2px inset grey;"><p /><img src="' . XOOPS_URL . '/'.$xoopsModuleConfig['edit_dir'] . $image . '" name="image3" id="image3" alt="" /></div>' ) );
	
	
	// image url
	$formimageurl = new XoopsFormText(_MD_MULTIMENU_IMAGEURL, 'imageurl', 60, 255, $imageurl);
	

	$formtemplates = new XoopsFormSelect(_MD_MULTIMENU_TEMPLATE, "template", $template);

        foreach($xoopsModuleConfig['item_selectmode'] as $i=>$file_data){
          $file = multimenu_tpl_rename ( $file_data );
	  $formtemplates->addOption( $file['file'], $file['name'] );
	       }

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

	$formgroups    = new XoopsFormSelectGroup(_MD_MULTIMENU_GROUPS, 'groups', true, $groups, 5, true);

//CSS
        $formcss = new XoopsFormTextArea(_MD_MULTIMENU_CSS, "css", $css, 25);

	$submit_button = new XoopsFormButton('', 'submit', _MD_MULTIMENU_SUBMIT, 'submit');

// Display form
	
include('java.help.php');
    $options = multimenu_drop_form( _MD_MULTIMENU_OPTIONS, _HLP_MULTIMENU_MENUOPTH, _MD_MULTIMENU_HELP );
    $images  = multimenu_drop_form( _MD_MULTIMENU_IMAGE );
    $css     = multimenu_drop_form( _MD_MULTIMENU_CSS, _HLP_MULTIMENU_MENUCSSH, _MD_MULTIMENU_HELP );

    $form->addElement($drop['in']);

	$form->setExtra('enctype="multipart/form-data"');
	$form->addElement(new XoopsFormHidden("catid",  $catid));
	$form->addElement(new XoopsFormHidden("old_catid",  $old_catid));
	$form->addElement($formtitle, true);
	$form->addElement($formstatus);
     	$form->addElement($formdesc, false);
     	
     $form -> addElement( $images['in'] );
	$form->addElement($formimageurl,  false);
  	$form->addElement($formimage,     false);
     $form -> addElement( $images['out'] );
     	
     $form -> addElement( $options['in'] );
	$form->addElement($formimage_dir);
	$form->addElement($formtemplates);
	$form->addElement($formgroups);
     $form -> addElement( $options['out'] );
     
     $form -> addElement( $css['in'] );
	$form->addElement($formcss);
     $form -> addElement( $css['out'] );

	$form->addElement($submit_button);
?>