<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Multimenu v2.x								//
//  ------------------------------------------------------------------------ 	//


function a_multimenu_item_show( $options ) {

include_once(XOOPS_ROOT_PATH.'/modules/multimenu/include/functions_common.php');
Global $xoopsDB, $xoopsUser;
$myts =& MyTextSanitizer::getInstance();
// if( !function_exists('multimenu_query') ) { include_once(XOOPS_ROOT_PATH . '/modules/multimenu/include/functions_query.php'); }
// User groups
        $user_group  = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
        $like = '';
        foreach( $user_group as $group_id ) { $like .= " OR groups LIKE '%".$group_id."%'"; }
        
        

// Is the menu available?
  	$menu_result = "SELECT image_dir
        	   FROM ".$xoopsDB->prefix('multimenu_menu')."
        	   WHERE status>=1 AND catid=" . $options[2] . " AND ( title='' ".$like." )";
        $menu_list  = $xoopsDB->queryF( $menu_result );
        $menu_count = $xoopsDB->getRowsNum( $menu_list ); if( !$menu_count ) { Return False; }
        $myrow 	    = $xoopsDB->fetchArray( $menu_list );

$data_list = array();

// Settings and general preferences
$background  = multimenu_getmoduleoption('index_background');
$data_list['background'] = $background?XOOPS_URL.'/'.$background:'';

$data_list['cols']        = $options[4];
$data_list['menu']        = $options[2];

$slideshow_settings = explode('|', multimenu_getmoduleoption('slideshow_settings'));
$data_list['duration']    = $slideshow_settings[0];
$data_list['transition']  = $slideshow_settings[1];

$max_size = explode('|', multimenu_getmoduleoption('item_max_size'));
$data_list['image_max_width']  = $max_size[0];
$data_list['image_max_height'] = $max_size[1];

$data_list['admin']       = $xoopsUser && $xoopsUser->isAdmin()&&ereg('is_admin', $options[1])&&isset($options[9])?'
                             <a  href="'.XOOPS_URL.'/modules/multimenu/admin/blocks/admin.php?fct=blocksadmin&op=edit&bid='.$options[9].'" title="'._MB_MULTIMENU_EDIT.'">
                             '._MB_MULTIMENU_EDIT.'
                             </a> |
                             <a  href="'.XOOPS_URL.'/modules/multimenu/admin/index.php?admin=link&catid='.$options[2].'" title="'._MB_MULTIMENU_LINK.'">
                             '._MB_MULTIMENU_LINK.'
                             </a>
                             ':'';



$banner_url               = multimenu_getmoduleoption('index_banner');
$data_list['banner_url']  = $banner_url?XOOPS_URL.'/'.$banner_url:'';
$data_list['banner']      = $data_list['banner_url']?'<a href="'.XOOPS_URL.'/modules/multimenu/">
<image src="'.$data_list['banner_url'].'" alt="" />
</a>':'';

$data_list['description'] = $myts->makeTareaData4Show($options[8]);
$data_list['mode']        = is_file(XOOPS_ROOT_PATH.'/modules/multimenu/templates/include/'.$options[0])?'include/'.$options[0]:'include/multimenu_ul.html';

$image = explode('-', $options[5]);
$data_list['image_width']  = $image[0]?' width="'.$image[0].'"' :'';
$data_list['image_height'] = $image[1]?' height="'.$image[1].'"':'';

// Style sheet && Java
$edit_dir = multimenu_getmoduleoption('edit_dir');
$mode = ereg_replace( 'include/', '', $data_list['mode'] );
$menu_name = ereg_replace( '.html', '', $mode );
$data_list['css_link']    = multimenu_check_script_file( $menu_name, $options[2], $edit_dir . 'cache/', 'css' );
$data_list['script_link'] = multimenu_check_script_file( $menu_name, $options[2], $edit_dir . 'cache/', 'js' );

// Query datas

if(  $options[3]=='rand' ) {
        $result = $xoopsDB->queryF("SELECT COUNT(*)
                                    FROM " . $xoopsDB->prefix('multimenu_link') . "
                                    WHERE catid=".$options[2]." AND status>0 AND pid=0 AND ( title='' ".$like." )");
        list( $total )=$xoopsDB->fetchRow($result);
        $rand  = rand(0,($total-1));
        $options[3] = 1;
} else { $rand = 0; $where = ''; }
$where = $options[3]?'AND pid=0':'';

 	$result = "SELECT *
		FROM  ".$xoopsDB->prefix("multimenu_link")."
		WHERE catid=".$options[2]." AND status>0 AND ( title='' ".$like." ) " . $where ."
                ORDER BY " . $options[6];
                ;

        $link_list = $xoopsDB->queryF($result, $options[3], $rand);

// Render links
    $is_relative  = ereg('is_relative', $options[1])?1:0;
    $is_image     = ereg('is_image',    $options[1])?1:0;
    $is_title     = ereg('is_title',    $options[1])?1:0;
    $is_infobulle = ereg('is_infobulle',$options[1])?1:0;
    $data = multimenu_render_link_list( $link_list, XOOPS_URL.'/'.$myrow['image_dir'], $options[7], $is_relative, $is_infobulle, $is_image, $is_title );
    $data_list['ii']         = isset($data['num'])?$data['num']:0;
    $data_list['i']          = isset($data['num'])?round($data['num']/$options[4]):0;
    $data_list['data_list']  = $data['data_list'];
    
Return count($data['data_list'])?$data_list:0;
}




function a_multimenu_item_edit( $options ) {
        Global $xoopsDB;
        $myts =& MyTextSanitizer::getInstance();
        if( !function_exists('multimenu_query') ) { include_once(XOOPS_ROOT_PATH . '/modules/multimenu/include/functions_query.php'); }
        $form = '<style>a.info {cursor:selector; color:black; }</style>';
        $form .= '<table class="bg2">';
        
        $form .= '<tr>
                  <th width="30%">'._MB_MULTIMENU_OPTION.'</th>
                  <th width="70%">'._MB_MULTIMENU_SETTINGS.'</th>
                  </tr>
        ';

        $form .= '<tr>';

        $td       = '</td>         <td class="even">';
        $tr       = '</td></tr><tr><td class="odd">';
        $td_end   = '</td>';

        $form .= '<td class="odd">';


// Templates
        $radio = multimenu_getmoduleoption('item_selectmode');
        $n_tpl = count($radio);
        $n_tpl = $n_tpl>=10?4:2;
        $i=0; $ii=0; $max=round(count($radio)/$n_tpl); $checked = " checked='checked'";
        $form .= '<b>';
        $form .= '<a title="Option '.$i.'" class="info">'._MB_MULTIMENU_TPL.'</a>';
        $form .= '</b><p />';
        $form .= _MB_MULTIMENU_TPLDSC;
        $form .= $td;
        $form .= '<table><tr><td width="160">';
        foreach ($radio as $item_lg=>$item_val) {
        if($ii>$max){ $tdd = '</td><td width="160">'; $ii=1; } else { $tdd=''; $ii++; }
        $file = multimenu_tpl_rename ( $item_val );
        $form .= $tdd;
        $check =  $options[$i]==$item_val?$checked:'';
        $form .= '     <input type="radio"
                        id="options['.$i.']"
                        name="options['.$i.']"
                        value="'.$file['file'].'"
                        '.$check.'
                   />
                  '
                  . $file['name'] .
                  '<br />';
	}
	for($ii;$ii<($max-1);$ii++) { $form .= '<br />'; }
	$form .= '</td></tr></table>';
	$form .= $tr;
	
// Check box
  	$radio = array( _MB_MULTIMENU_TITLE       => "is_title",
  	                _MB_MULTIMENU_IMAGE       => "is_image",
  	                _MB_MULTIMENU_ALT_TITLE   => "is_infobulle",
  	                _MB_MULTIMENU_RELATIVE    => "is_relative",
  	                _MB_MULTIMENU_ADMIN       => "is_admin"
                       );
        $i++; $ii = 0; $max=round(count($radio)/2);  $checked = " checked='checked'";
        $form.= '<b>';
        $form  .= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_DISPLAY.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_DISPLAYDSC;
        $form .= $td;
        $form .= '<table><tr><td width="50%">';
        $form .= '<input type="hidden"
                         id="options['.$i.']"
                         name="options['.$i.'][]"
                         value=""
                         checked="checked"
                   />';

 	foreach ($radio as $item_lg=>$item_val) {
          if($ii>=$max){ $tdd = '</td><td width="50%"><br />'; $ii=0; } else { $tdd=''; $ii++; }
        $form .= $tdd;
        $check =  ereg($item_val,$options[$i])?$checked:'';
        $form .= '<input type="checkbox"
                        id="options['.$i.']"
                        name="options['.$i.'][]"
                        value="'.$item_val.'"
                        '.$check.'
                   />
                  '
                  . $item_lg .
                  '<br />';
	} 
	for($ii;$ii<$max;$ii++) { $form .= '<br />'; }
	$form .= '</td></tr></table>';

	$form .= $tr;

	
// Select
//  	$select = array( _MB_MULTIMENU_RANDOM  => 'rand' );

 	$result = " SELECT catid, title
		    FROM  ".$xoopsDB->prefix("multimenu_menu")."
		    WHERE status>0
                    ORDER BY title ASC";
        // $sel_n= count($select);
        $list = $xoopsDB->queryF( $result );
        $count=1;
        $block = array();
    	while(list( $id, $title ) = $xoopsDB->fetchRow($list))
    	{
                    $select[$count++.'. '.$myts->makeTareaData4Show( $title )]       = $id;
         }

        $i++; $ii = 0; $max=3;  $selected = " selected='selected'";
        $form.= '<b>';
        $form  .= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_SELECT.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_SELECTDSC;
        $form .= $td;
        $form .= '
                <select name="options['.$i.']" size="5">';
//        $form .= '<optgroup label="'._MB_MULTIMENU_OPTION.'">';
//        $optgroup = '</optgroup>
//        $optgroup = '<optgroup label="'._MB_MULTIMENU_LIST.'">';
 	foreach ($select as $item_lg=>$item_val) {
        $sel =  $options[$i]==$item_val?$selected:'';
 //       $form .= $ii++==$sel_n?$optgroup:'';
        $form .= '
                   <option value="'.$item_val.'"
                         '.$sel.'
                   >'
                  . $item_lg .
                  '</option>';
	}
	$form.= '</optgroup>';
	$form.= '</select>';

	$form .= $tr;

// Select
  	$select = array( _MB_MULTIMENU_ALL => 0, 
  	                 _MB_MULTIMENU_RANDOM  => 'rand'
                        );
                        /*
                        ,
  	                 1 => 1,
  	                 2 => 2,
  	                 3 => 3,
  	                 4 => 4,
  	                 5 => 5,

  	                 10 => 10,
  	                 20 => 20,
  	                 30 => 30,
  	                 40 => 40,
  	                 50 => 50,

  	                 100 => 100*/

           $sel_n= count($select);
       for($counter=1;$counter<=120;$counter) {
           $select[$counter]       = $counter;
           $y = $counter<5?1:$y;
           $y = $counter>=5&&$counter<30?5:$y;
           $y = $counter>=30&&$counter<50?10:$y;
           $y = $counter>=50?20:$y;
           $counter = $counter+$y;
       }

        $i++; $ii=0; $selected = " selected='selected'";

        $form.= '<b>';
        $form.= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_MAX.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_MAXDSC;
        $form .= $td;
        $form.= '
                <select name="options['.$i.']">';
        $form .= '<optgroup label="'._MB_MULTIMENU_OPTION.'">';
        $optgroup = '</optgroup>
        <optgroup label="'._MB_MULTIMENU_MAX.'">';
 	foreach ($select as $item_lg=>$item_val) {
        $sel =  $options[$i]==$item_val?$selected:'';
        $form .= $ii++==$sel_n?$optgroup:'';
        $form .= '
                   <option value="'.$item_val.'"
                         '.$sel.'
                   >'
                  . $item_lg .
                  '</option>';
	}
	$form.= '</optgroup>';
	$form.= '</select>';

	$form .= $tr;
	
// Select
  	$select = array( 1 => '1',
  	                 2 => '2',
  	                 3 => '3',
  	                 4 => '4',
  	                 5 => '5',
  	                 6 => '6'
                        );
        $i++; $selected = " selected='selected'";

        $form.= '<b>';
        $form.= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_COLS.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_COLSDSC;
        $form .= $td;
        $form.= '
                <select name="options['.$i.']">';

 	foreach ($select as $item_lg=>$item_val) {
        $sel =  $options[$i]==$item_val?$selected:'';
        $form .= '
                   <option value="'.$item_val.'"
                         '.$sel.'
                   >'
                  . $item_lg .
                  '</option>';
	}
	$form.= '</select>';

	$form .= $tr;
	
// Textbox
        $i++;
        $form.= '<b>';
        $form .= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_MAXWIDTH.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_MAXWIDTHDSC;
        $form .= $td;
        $form .= '<input type="text" 
                         size="9"
                         name="options['.$i.']" 
                         value="' . $options[$i] . '" 
                   />';
        $form .= '&nbsp;';
        $form .= _MB_MULTIMENU_PIX;

        $form .= $tr;
        
// Select multi
  	$select = array( _MB_MULTIMENU_WEIGHT      =>     'weight ASC',
    	                 _MB_MULTIMENU_TITLEASC    =>     'title ASC',
    	                 _MB_MULTIMENU_TITLEDESC   =>     'title DESC'
                        );
        $i++; $selected = " selected='selected'";

        $form.= '<b>';
        $form.= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_ORDER.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_ORDERDSC;
        $form .= $td;
        $form.= '
                <select name="options['.$i.']">';

 	foreach ($select as $item_lg=>$item_val) {
        $sel =  $options[$i]==$item_val?$selected:'';
        $form .= '
                   <option value="'.$item_val.'"
                         '.$sel.'
                   >'
                  . $item_lg .
                  '</option>';
	}
	$form.= '</select>';

	$form .= $tr;


// Textbox
        $i++;
        $form.= '<b>';
        $form .= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_MAXTITLE.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_MAXTITLEDSC;
        $form .= $td;
        $form .= '<input type="text" 
                         size="5"
                         name="options['.$i.']" 
                         value="' . $options[$i] . '" 
                   /> ';
        $form .= _MB_MULTIMENU_CHAR;
        $form .= $tr;

// Textarea
        $i++;
        $form.= '<b>';
        $form .= '<a title="Option n° '.$i.'" class="info">'._MB_MULTIMENU_DESCRIPTION.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MULTIMENU_DESCRIPTIONDSC;
        $form .= $td;
        $form .= '<textarea  
                         cols="4"
                         rows="10"
                         name="options['.$i.']"
                   />';
        $form .= $options[$i];
        $form .= '</textarea>';


        $form .= '</td>';
        $form .= '</tr>';
        $form .= '</table>';

        $i++;
        $form .= '<input type="hidden"
                         name="options['.$i.']"
                         value="' . $_GET['bid'] . '"
                   />';

return $form;
}

?>