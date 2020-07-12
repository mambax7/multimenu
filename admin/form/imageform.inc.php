<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multimenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

        $image  = explode('|', $xoopsModuleConfig['item_max_size']);
        $width  = $image[0]?$image[0]:'';
        $height = $image[1]?$image[1]:'';

  //      $image_array = array();
        $image_array  = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/'.$image_dir );
//	$formimages = new XoopsFormCheckBox(_MD_MULTIMENU_IMAGES, 'image_select', $image_select);

    $formimages = '<tr><td colspan="2">
                  <script type="text/javascript">
                  	function checkUncheckAll(theElement) {
                                 var theForm = theElement.form, z = 0;
	                         for(z=0; z<theForm.length;z++){
                                          if(theForm[z].type == "checkbox" && theForm[z].name != "checkall"){
	                                     theForm[z].checked = theElement.checked;
	                                  }
                                 }
                         }
                    </script>
                  <div style="height:380px;
                        overflow:auto;
                        margin:0px;
                        border:1px solid #c2cdd6;
                        background: url(../images/background.gif) white no-repeat center center;">
                   <table width="100%" class="outer" cellspacing="1"><tr class="odd">
                   ';

	$div_width  = $width ?$width+28 :'260';
	$div_heigth = $height?$height+28:'120';
	$i=0; $ii=0; $class = 'odd'; $cols = $xoopsModuleConfig['item_cols']; $limit=$xoopsModuleConfig['index_perpage'];
        include_once (XOOPS_ROOT_PATH . '/class/pagenav.php');
        $pagenav = new XoopsPageNav( count($image_array), $xoopsModuleConfig['index_perpage'], $startart, 'admin=images&catid='.$catid.'&startart' );
        
        $array=0;
If( $image_array ) {
  
  $array = $startart;  $end_array = ($startart+$limit) >= count($image_array)?count($image_array):($startart+$limit);

//        foreach( $image_array as $image ) {
  sort($image_array);
          for( $array; $array<$end_array; $array++) {
        if( $i++>= $cols ) { $class = $class=='odd'?'even':'odd'; $formimages .= '</tr><tr class="'.$class.'">'; $i=1; }
        $size       = @getimagesize('../../../'.$image_dir.'/orig/'.$image_array[$array]);
        $thumb_size = @getimagesize('../../../'.$image_dir.$image_array[$array]);

        if( isset($size[0]) ) { $size[0]=$size[0]+25;$size[1]=$size[1]+25; }
        $formimages .= '<td align="center" width="'.round(100/$cols).'%">';
        $formimages .='<div style="margin: 3px; overflow: auto; text-align: center; height: '.$div_heigth.'px; width: '.$div_width.'px;">';
        if( isset($size[2]) ) {
        $orig_link = '
                        <a onclick="pop=window.open(\'\', \'wclose\', \'width='.$size[0].', height='.$size[1].', dependent=yes, toolbar=no, scrollbars=yes, status=no, resizable=yes, fullscreen=no, titlebar=no, left=100, top=30\', \'false\'); pop.focus(); "
                           href="../../../'.$image_dir.'orig/'.$image_array[$array].'"
                           target="wclose">'; } else { $orig_link = ''; }
        $formimages .= $orig_link;
        $formimages .= '<img src="../../../'.$image_dir.$image_array[$array].'" alt="'.$image_array[$array].'">';
        $formimages .= $size[2]?'</a>':'';
        $formimages .= '</div>
                        <div align="center"><input name="image_select[]" value="'.$image_array[$array].'" type="checkbox" />'.admin_short_title( $image_array[$array], 36, '[...]' ).' ['.$thumb_size[0].'*'.$thumb_size[1].']</div>
                        </td>
                 ';
          if( $ii==$limit ) { break; }

        } // Foreach

        $ii = $cols-$i;
        for( $ii; $ii>=0; --$ii ) { $formimages .= $ii?'<td width="'.round(100/$cols).'%"></td>':''; }
 } // if images
    $formimages .= '</tr></table>
                    </div>['.$array.'/'.count($image_array).']&nbsp;
                    <input type="checkbox" name="checkall" onclick="checkUncheckAll(this);" />'._MD_MULTIMENU_CHECK_ALL.'
                    &nbsp;&nbsp;&nbsp;&nbsp;' . $pagenav -> renderNav() . '

    ';

        
        $image_box = new XoopsFormFile(_MD_MULTIMENU_NEWIMAGE, 'image_file');
        $image_box->setExtra( 'size="80"');

// Options
// Thumb generator
	$formthumbgen = new XoopsFormSelect( _MD_MULTIMENU_THUMBGEN, 'thumb_gen', $thumb_gen );
        $formthumbgen->addOption( 'normal', _MD_MULTIMENU_NORMAL );
	$formthumbgen->addOption( 'rounded', _MD_MULTIMENU_ROUNDED );
        $formthumbgen->addOption( 'blackandwhite', _MD_MULTIMENU_BW );
	$formthumbgen->addOption( 'dropshadow', _MD_MULTIMENU_SHADOW );
	$formthumbgen->addOption( 'grad', _MD_MULTIMENU_GRAD );
	$formthumbgen->addOption( 'info', _MD_MULTIMENU_INFO );
	
// Text
        $formtext  = new XoopsFormText(_MD_MULTIMENU_TEXT,  "text", 60, 60, $text);

// Thumb size
        $formwidth  = new XoopsFormText(_MD_MULTIMENU_WIDTH,  "width", 5, 5, $width);
        $formheight = new XoopsFormText(_MD_MULTIMENU_HEIGHT, "height", 5, 5, $height);
        
/*      $formsubmit = new XoopsFormRadio(_MD_MULTIMENU_OPERATION, "op", $op);
        $formsubmit->addOption( 'del', _MD_MULTIMENU_DELETE );
        $formsubmit->addOption( 'resize', _MD_MULTIMENU_RESIZE );
*/        
        
// Thumb background color
        $formcolor = new XoopsFormColorPicker( _MD_MULTIMENU_BCKCOLOR, 'backgroundcolor', $backgroundcolor );

// Submit
        $button_upload = new XoopsFormButton('', 'op', _MD_MULTIMENU_UPLOAD, 'submit');
        $hidden_catid  = new XoopsFormHidden( 'catid', $catid );

// Render Form
    include('java.help.php');
    $options = multimenu_drop_form( _MD_MULTIMENU_OPTIONS, _HLP_MULTIMENU_IMAGE, _MD_MULTIMENU_HELP );


        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement($hidden_catid);
        $form->addElement($image_box);
        $form->addElement($button_upload);
$form->addElement($drop['in']);
$form -> addElement( $options['in'] );
        $form->addElement($formthumbgen);
        $form->addElement($formtext);
        $form->addElement($formwidth);
        $form->addElement($formheight);
        $form->addElement($formcolor);
     $form -> addElement( $options['out'] );
        $form->addElement($formimages);

	$button_tray = new XoopsFormElementTray( '', '' );

		$butt_clear = new XoopsFormButton( '', '', _MD_MULTIMENU_CANCEL, 'reset' );
		$button_tray->addElement( $butt_clear );

		$butt_delete = new XoopsFormButton( '', 'op', _MD_MULTIMENU_DELETE, 'submit' );
//		$butt_delete->setExtra('onclick="this.form.elements.operator.value=\'del\'"');
		$button_tray->addElement( $butt_delete );

		$butt_update = new XoopsFormButton( '', 'op', _MD_MULTIMENU_UPDATE, 'submit' );
//	 	$butt_update->setExtra('onclick="this.form.elements.operator.value=\'update\'"');
		$button_tray->addElement( $butt_update );
/*
		$butt_cancel = new XoopsFormButton( '', '', _MD_MULTIMENU_CANCEL, 'button' );
		$butt_cancel->setExtra('onclick="history.go(-1)"');
		$button_tray->addElement( $butt_cancel );
*/
        $form -> addElement( $button_tray );
	

?>