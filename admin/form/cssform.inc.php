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


//CSS
        $file_name = 'multimenu_'.$tpl;
        $css_file = '../../../'.$xoopsModuleConfig['edit_dir'].'css/'.$file_name.'.css';
        $css = file_exists( $css_file )?multimenu_read_file( $css_file ):'';  


        $tpl_file = '../templates/include/'.$file_name.'.html';
        $tpl_code = file_exists( $tpl_file )?multimenu_read_file( $tpl_file ):'';

        $formcss = new XoopsFormTextArea(_MD_MULTIMENU_CSS, "css", $css, 25);
        $formtpl = new XoopsFormTextArea(_MD_MULTIMENU_TPL . ' : ' . $file_name.'.html', "tpl", $tpl_code, 25);
        $formtpl->setExtra( 'disabled' );

	$submit_button = new XoopsFormButton('', 'submit', _MD_MULTIMENU_SUBMIT, 'submit');

// Display form
if($tpl_code) {
include('java.help.php');
    $template = multimenu_drop_form( _MD_MULTIMENU_TPL );

    $form->addElement($drop['in']);

	$form->setExtra('enctype="multipart/form-data"');
	$form->addElement(new XoopsFormHidden("tpl",  $tpl));
	$form->addElement(new XoopsFormHidden("file",  $css_file));
	$form->addElement($formcss, true);

     $form -> addElement( $template['in'] );
	$form->addElement($formtpl,  false);
     $form -> addElement( $template['out'] );

	$form->addElement($submit_button);
}

?>