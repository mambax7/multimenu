<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiquery 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/


//	$myts =& MyTextSanitizer::getInstance();
	$title = $myts->makeTboxData4Edit($title);
	$form_title = new XoopsFormText(_MD_MULTIMENU_TITLE, "title", 60, 255, $title);
          $sql = "SHOW TABLES";
          $result = $xoopsDB->queryF( $sql);

        $form_qtable = new XoopsFormSelect(_MD_MULTIMENU_TABLE, "qtable", $qtable);
        $form_qtable->addOption('dir', '[' . _MD_MULTIMENU_DIR. ']');
        while ( list( $table ) = $xoopsDB -> fetchrow( $result ) )
	{
          $qtitle = ereg_replace(XOOPS_DB_PREFIX.'_', '', $table);
          
         if (
             $qtitle != 'avatar' &&
             $qtitle != 'avatar_user_link' &&
             $qtitle != 'banner' &&
             $qtitle != 'bannerclient' &&
             $qtitle != 'bannerfinish' &&
             $qtitle != 'block_module_link' &&
             $qtitle != 'config' &&
             $qtitle != 'configcategory' &&
             $qtitle != 'configoption' &&
             $qtitle != 'group_permission' &&
             $qtitle != 'groups' &&
             $qtitle != 'groups_users_link' &&
             $qtitle != 'image' &&
             $qtitle != 'imagebody' &&
             $qtitle != 'imagecategory' &&
             $qtitle != 'imgset' &&
             $qtitle != 'imgset_tplset_link' &&
             $qtitle != 'imgsetimg' &&
             $qtitle != 'newblocks' &&
             $qtitle != 'ranks' &&
             $qtitle != 'session' &&
             $qtitle != 'smiles' &&
             $qtitle != 'tplfile' &&
             $qtitle != 'tplset' &&
             $qtitle != 'tplsource' &&
             $qtitle != 'xoopscomments' &&
             $qtitle != 'xoopsnotifications' &&
             $qtitle != 'cache_model'

          ) {
             $form_qtable->addOption($qtitle, $qtitle); }
           }

	$form_qsubject = new XoopsFormText(_MD_MULTIMENU_QSUBJECT, "qsubject", 25, 25, $qsubject);
	$form_qdescription = new XoopsFormText(_MD_MULTIMENU_QDESCRIPTION, "qdescription", 25, 25, $qdescription);
	$form_qid      = new XoopsFormText(_MD_MULTIMENU_QID,      "qid", 25, 25, $qid);
	$form_qimage   = new XoopsFormText(_MD_MULTIMENU_QIMAGE,   "qimage",  25, 255, $qimage);
	$form_qurl     = new XoopsFormText(_MD_MULTIMENU_QURL,     "qurl",  60, 255, $qurl);
	$form_qdir     = new XoopsFormText(_MD_MULTIMENU_DIR,     "qurl",  60, 255, $qurl);
        $form_qimageurl= new XoopsFormText(_MD_MULTIMENU_QIMAGEURL,"qimageurl",  60, 255, $qimageurl);
	$form_qwhere   = new XoopsFormText(_MD_MULTIMENU_QWHERE,   "qwhere", 40, 255, $qwhere);

	$form_dorder = new XoopsFormSelect(_MD_MULTIMENU_QORDER, "qorder", $qorder);
        $form_dorder->addOption('asc', _MD_MULTIMENU_ASC);
        $form_dorder->addOption('desc', _MD_MULTIMENU_DESC);

	$form_qorder   = new XoopsFormText(_MD_MULTIMENU_QORDER,   "qorder", 40, 255, $qorder);
	$form_qlimit   = new XoopsFormText(_MD_MULTIMENU_QLIMIT,   "qlimit", 5, 5, $qlimit);
        $submit_button = new XoopsFormButton("", "submit", _MD_MULTIMENU_SUBMIT, "submit");
        $next_button   = new XoopsFormButton("", "next", _MD_MULTIMENU_NEXT, "submit");


// Current table rows
if( $qtable && $qtable != 'dir' ) {
         $form_table_rows  = '<tr colspan="2"><td>';
         $form_table_rows .= multimenu_query_display_table_rows( $qtable );
         $form_table_rows .= '</td><tr>';
}

        

    include('java.help.php');
    $options    = multimenu_drop_form( _MD_MULTIMENU_OPTIONS );
    $table_rows = multimenu_drop_form( _MD_MULTIMENU_TABLE, _HLP_MULTIMENU_QUERY, _MD_MULTIMENU_HELP );

     $form->addElement($drop['in']);

	$form->setExtra('enctype="multipart/form-data"');

// Start Form
     if( $op == 'new' ) {
     $form->addElement($form_qtable);
     $form->addElement($next_button);
     }

// Dir Form
     if( $op != 'new' && $qtable == 'dir') {
	 $form->addElement(new XoopsFormHidden("id",  $id));
         $form->addElement(new XoopsFormHidden("qtable",  $qtable)); //$form->addElement($form_qtable);
	 $form->addElement($form_title,    true);
         $form->addElement($form_qdir,     true);
         
     $form -> addElement( $options['in'] );
	$form->addElement($form_qwhere,    false);
	$form->addElement($form_dorder,    false);
	$form->addElement($form_qlimit,    false);
     $form -> addElement( $options['out'] );

     $form->addElement($submit_button);
     }


// Query Form

if( $op != 'new' && $qtable != 'dir') {
     $form -> addElement( $table_rows['in'] );
     	$form->addElement($form_table_rows);
     $form -> addElement( $table_rows['out'] );

	$form->addElement(new XoopsFormHidden("id",  $id));
        $form->addElement(new XoopsFormHidden("qtable",  $qtable)); // $form->addElement($form_qtable);
	$form->addElement($form_title,    true);
        $form->addElement($form_qid,      true);
	$form->addElement($form_qsubject, true);
	$form->addElement($form_qurl,     true);

     $form -> addElement( $options['in'] );
     	$form->addElement($form_qdescription,    false);
     	$form->addElement($form_qimage,    false);
	$form->addElement($form_qimageurl, false);
	$form->addElement($form_qwhere,    false);
	$form->addElement($form_qorder,    false);
	$form->addElement($form_qlimit,    false);
     $form -> addElement( $options['out'] );

     $form->addElement($submit_button);
     }
?>