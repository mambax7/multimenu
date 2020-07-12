<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/


function multimenu_create_admin_links ( $admin_buttons, $select='0', $status='1',
                                        $icon_dir      = '../images/icon/',
                                        $icon_ext      = '.gif',
                                        $display_mode  = 'button',
                                        $icon_width    = '32', 
                                        $prefix        = '') {
$background = $status==1?'Green':'Red';
$background = $status=='2'?'Orange':$background;
$ret=$display_mode=='select'?'<select size="1"
          name="select"
          style="background-color:'.$background.'; color:White;"
          onchange="location=this.options[this.selectedIndex].value">
          <option value=""></option>
          <optgroup label="'.multimenu_define( 'edit', $prefix ).' : ">'
:'<nobr><ul>'; $tiddle='';
foreach( $admin_buttons as $name=>$value ) {
                $alt_name = $name;
                $name     = $name=='status'           ?$status==1?'on':'off':$name;
                $name     = $name=='off'&&$status=='2'?'hidden':$name;
                
                $alt_name = multimenu_define( $alt_name, $prefix );

  switch( $display_mode )
  {

// Image mode
  case ( 'image' ):
                if( $value ) {
                $ret .= '<li style="list-style: none; display:inline; margin:0px; padding:5px;"> ' . $tiddle . '
                          <a href="' . $value . '"           title ="' .  $alt_name . '">
                            <img src="' . $icon_dir . $name . $icon_ext . '" alt="' . $alt_name . '" width="' . $icon_width . '" align="absmiddle" />
                          </a>
                          </li>
                          ';
                          $tiddle = ' | ';
                }
  break;

// Button mode
  case ( 'button' ):
                if( $value ) {
                $ret .= '<li style="list-style: none; display:inline; text-align:center; background-color:White; border:1px outset grey; margin:0px; padding:5px;">
                          <a href="' . $value . '"           title ="' .  $alt_name . '">
                            ' .  $alt_name . '
                          </a>
                          </li>
                          ';
                }
  break;

// Button mode
  case ( 'select' ):
                if( !$value ) {
                $ret .= '</optgroup><optgroup label="' . $alt_name . ' : ">
                        ';
                  } else {
                $ret .= '<option value="' . $value . '">' .  $alt_name . '</option>
                        ';
                  }
  break;


  
  // Text mode
default:
                if( $value ) {
                $ret .= '<li style="display:inline;"> ' . $tiddle . '
                          <a href="' . $value . '"           title ="' .  $name . '">
                            ' .  $alt_name . '
                          </a>
                          </li>
                          ';
                $tiddle = ' | ';
                }
  break;

  }

}

$ret .= $display_mode=='select'?'</optroup></select>':'<ul></nobr>';
Return $ret;
}


function multimenu_define( $name='', $prefix='' ) {
  Global $xoopsModule;
  $define_name   = str_replace( '_', ' ',  $name);
  $constant_name = str_replace( ' ', '_',  $name); 

  Return constant( strtoupper( $prefix . '_'. $xoopsModule->dirname() . '_' . $constant_name) )?constant( strtoupper( $prefix . '_'. $xoopsModule->dirname() . '_' . $constant_name) ):ucfirst( $define_name ) . ' *';
}

?>