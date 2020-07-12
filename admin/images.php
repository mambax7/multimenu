<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/


// Define here your operator list + the default values
$op = array(        'op'            =>      'new',
                    'catid'          =>      0,
                    'image_select'   =>      '',
                    'thumb_gen'      =>      '',
                    'width'          =>      '',
                    'height'         =>      '',
                    'text'           =>      '',
                    'backgroundcolor'=>      $xoopsModuleConfig['item_thumb_color'],
                    'image_file'     =>      '',
                    'startart'       =>      0
                    );
 include_once('include/admin_op_retrieve.php');
if( $catid ) {
         $sql = "SELECT image_dir
                 FROM " . $xoopsDB->prefix( $xoopsModule->dirname().'_menu' ) . "
                 WHERE catid=$catid";
         $result = $xoopsDB->queryF( $sql);
         $myrow  = $xoopsDB->fetchArray( $result );
         $image_dir = $myrow['image_dir']?$myrow['image_dir']:$xoopsModuleConfig['edit_dir'];
         } else {
         $image_dir = $xoopsModuleConfig['edit_dir'];
         }
 $def_menu = $catid?$def_menu.'&catid='.$catid:$def_menu;
 $def_menu = $startart?$def_menu.'&startart='.$startart:$def_menu;
 if( !is_dir( '../../../'.$image_dir.'/orig' ) ) { admin_create_dir( '../../../'.$image_dir.'/orig' ); }

// So, what are we doing now?
switch( $op )
  {
   case ( $op=='new' ):
  	include (XOOPS_ROOT_PATH.'/class/xoopsformloader.php');
        include_once('thumb_gen/thumb_gen_infos.php');

  	echo admin_url_selector( $catid,
                           '',
                           'index.php?admin=images&catid=',
                           _MAIN.'|index.php?admin=images',
                           'tab',
                           'multimenu_menu|catid|title|status',
                           1,
                           'self' );
	$form = new XoopsThemeForm(_MD_MULTIMENU_IMAGEDIR . ' : ' . $image_dir, '', $def_menu);
	include ('form/imageform.inc.php');
        $form->display();
    break;


  case ( $op && !$image_select && !$_FILES['image_file'] ):
     default:
        redirect_header($def_menu, 1, _MD_MULTIMENU_NODATA );
        exit();
   break;


  case ( $op==_MD_MULTIMENU_UPLOAD && $_FILES['image_file'] ):
  
/*
             include_once('thumb_gen/functions_upload_images.php');
             foreach ($_FILES as $keyname => $fileup) {
               if( $keyname) {
               $error = thumb_gen_uploading_image( $keyname, XOOPS_ROOT_PATH . '/'.$image_dir, '1024|2048|10000' );
               $upload = $error?$error:_MD_MULTIMENU_UPLOADED;
               redirect_header($def_menu, 2, $upload );
               }
             }
*/

        $images_weight = 800000;
        $images_width  = 4096;
        $images_height = 4096;
        $allowed_mimetype = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');
        $image_dir = XOOPS_ROOT_PATH . '/'.$image_dir;
        include_once (XOOPS_ROOT_PATH.'/class/uploader.php');
        $uploader = new XoopsMediaUploader($image_dir, $allowed_mimetype, $images_weight, $images_width, $images_height );
        $err = array();
        $ucount = count($_POST['xoops_upload_file']);
      for ($i = 0; $i < $ucount; $i++) {
            if ($uploader->fetchMedia($_POST['xoops_upload_file'][$i])) {

                  $image_name = multimenu_convert( $uploader->getMediaName() );
                  $uploader->setTargetFileName( $image_name );

                if( file_exists($image_dir . '/' . $image_name) ) { $replaced = 1;  }

                if (!$uploader->upload()) {
                    $err[] = $uploader->getErrors();
                } else {
                    $avt_handler =& xoops_gethandler('image');
                    $image =& $avt_handler->create();

                    if (!$avt_handler->insert($image)) {
                        $err[] = sprintf(_FAILSAVEIMG, $image->getVar('image_name'));
                    }
                }
            } else {
                $err[] = sprintf(_FAILFETCHIMG, ' : ' . $_FILES['image_file']['name']);
                $err = array_merge($err, $uploader->getErrors(false));
            }
        }
        
        // Resize File
        if (count($err) > 0) {
            $message = xoops_error($err);
            redirect_header($def_menu, 2, $message );
        } else {
            $message = isset($replaced)?_MULTIMENU_UPDATED:_MULTIMENU_UPLOADED;
            redirect_header($def_menu, 2, $message );
        }


        exit();
    break;


// Delete a data
  case ( $op==_MD_MULTIMENU_DELETE && $image_select ):

       foreach( $image_select as $image ) {
        unlink( XOOPS_ROOT_PATH . '/'.$image_dir.$image );
        if( file_exists(XOOPS_ROOT_PATH . '/'.$image_dir.$image )) {
            unlink( XOOPS_ROOT_PATH . '/'.$image_dir.$image );
        }
       }

        redirect_header($def_menu, 1, _MD_MULTIMENU_DELETED );
        exit();
    break;



// Resize a data
  case ( $op==_MD_MULTIMENU_UPDATE ):

       if( $image_select ) {
       include('thumb_gen/thumb_gen_'.$thumb_gen.'.php');

       foreach( $image_select as $image ) {
                $image_url = '../../../'.$image_dir.$image;
                $image_orig_url = '../../../'.$image_dir.'/orig/'.$image;

                if( !file_exists($image_orig_url) ) { 
                     copy($image_url, $image_orig_url); } else {
                     copy($image_orig_url, $image_url); }

                if($thumb_gen=='normal')        { $i = new imagethumbnail(); }
        	if($thumb_gen=='rounded')       { $i = new imagethumbnail_corners(); }
        	if($thumb_gen=='blackandwhite') { $i = new imagethumbnail_blackandwhite(); }
        	if($thumb_gen=='dropshadow')    { $i = new imagethumbnail_dropshadow(); }
        	if($thumb_gen=='grad')          { $i = new imagethumbnail_grad(); }
	        if($thumb_gen=='info')          { $i = new imagethumbnail_info(); }
	        

                $image_url = '../../../'.$image_dir.$image;
                $i->open( $image_url );
        	if( $width )  { $i->setX($width);  }
        	if( $height ) { $i->setY($height); }

//	        if($thumb_gen=='normal')
        	if($thumb_gen=='rounded')       { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->clipcorners(); }
        	if($thumb_gen=='blackandwhite') { $i->blackandwhite(); }
        	if($thumb_gen=='dropshadow')    { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->dropshadow(); }
        	if($thumb_gen=='grad')          { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->grad(); }
	        if($thumb_gen=='info')          { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->info($text); }

         	$i->imagejpeg($image_url);
        }


        redirect_header($def_menu, 1, _MD_MULTIMENU_UPDATED );
        exit(); 
        } else {
          redirect_header($def_menu, 1, _MD_MULTIMENU_NODATA );
          exit();
        }
    break;
}

function multimenu_convert( $file_name ) {

   $file_name = ereg_replace(' ', '_', $file_name);
   $file_name = strtolower( $file_name );
   $file_name = strtr($file_name, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ\'"',
                                  'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY--');

   Return $file_name;

}

?>