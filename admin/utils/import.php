<?php
/**
* Module: import
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/
$def_menu = 'index.php?admin=utils&sub=import';
                $ops = array(       'op'         =>  'new',
                                    'db_datas'   =>  ''
                                    );
// include_once('include/admin_op_retrieve.php');

                foreach( $ops as $op_name=>$op_value ) {

                                  if (!isset($_POST[$op_name])) {
                                      $$op_name       = isset($_GET[$op_name]) ? $_GET[$op_name] : $op_value;
                                  } else {
                                      $$op_name       = $_POST[$op_name];
                                  }
                  }

function multimenu_form()
	{
         include_once( XOOPS_ROOT_PATH . '/class/xoopsformloader.php' );
		$sform = new XoopsThemeForm( admin_define( 'import' ), "op", '?admin=utils&sub=import' );
		$sform -> setExtra( 'enctype="multipart/form-data"' );
                $sform->addElement(new XoopsFormTextArea(_MD_MULTIMENU_DB_DATAS,    'db_datas', '', 20, 90 ), TRUE );
		$button_tray = new XoopsFormElementTray( '', '' );
		$hidden = new XoopsFormHidden( 'op', 'database_feed' );
		$button_tray -> addElement( $hidden );
		$butt_create = new XoopsFormButton( '', '', admin_define( 'submit' ), 'submit' );
		$butt_create->setExtra('onclick="this.form.elements.op.value=\'post\'"');
		$button_tray->addElement( $butt_create );
		$butt_clear = new XoopsFormButton( '', '', admin_define( 'clear' ), 'reset' );
		$button_tray->addElement( $butt_clear );
		$sform -> addElement( $button_tray );
		$sform -> display();

	 } //end function utilities

/* -- Available operations -- */
switch ( $op )
{
  case ( $op=="post" && $db_datas ):
         $db_datas = explode(';', $db_datas);
         $actions='';
         foreach($db_datas as $datas) {
           if( $datas && (
               ereg($xoopsModule->dirname() . '_menu', $datas) ||
               ereg($xoopsModule->dirname() . '_link', $datas) ||
               ereg($xoopsModule->dirname() . '_query', $datas) )) {

               $datas = ereg_replace( $xoopsModule->dirname() . '_menu',
                                      $xoopsDB->prefix() . '_'.$xoopsModule->dirname().'_menu',
                                      $datas );
               $datas = ereg_replace( $xoopsModule->dirname() . '_link',
                                      $xoopsDB->prefix() . '_'.$xoopsModule->dirname().'_link',
                                      $datas );
               $datas = ereg_replace( $xoopsModule->dirname() . '_query',
                                      $xoopsDB->prefix() . '_'.$xoopsModule->dirname().'_query', 
                                      $datas );

               $action   = $xoopsDB->queryF( $datas )?'imported':'notimported';
               $actions .= admin_define( $action ) . '<br />';
           }
         }
         redirect_header( $def_menu, 1, $actions );
         exit();
    break;

  case "utilities":
  	default:
          multimenu_form();
          echo '<p />';
    break;

}

?>