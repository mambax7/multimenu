<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2004 <http://www.xoops.org/>
*
* Functions: Dynamic Query 1.0
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }


// Generate query result
function multimenu_render_link_list( $link_list, $dir='', $text_max_length=64, $is_relative=0, $is_infobulle=0, $is_image=1, $is_title=1 ) {
Global $xoopsDB, $xoopsModule;
// Render data list

 $data = array(); $i=1; $main_i=1; $sublink_status=2; $backintime=0; $current_module_pid=0; $old_main_pid=0;
         while ( list( $data['id'],
                       $data['pid'],
                       $data['catid'],
                       $data['type'],
                       $data['relative'],
                       $data['status'],
                       $data['weight'],
                       $data['title'],
                       $data['alt_title'],
                       $data['link'],
                       $data['query'],
                       $data['target'],
                       $data['image'],
                       $data['groups'],
                       $data['css'] ) = $xoopsDB -> fetchrow( $link_list ) )
	{
                     $old_main_pid = !$data['pid']?$data['id']:$old_main_pid;
                     $is_displayed = 0; $status=0;
            if( $data['pid']==$old_main_pid || !$data['pid'] ) {
                     $link_status         = multimenu_link_status($data['pid'], $i );
                     $mainid              = $link_status=='top'||$link_status=='link'?$data['id']:$mainid;
                     $main_type           = !$data['pid']?$data['type']:$main_type;
                     $current_module_pid  = !empty($xoopsModule)&&eregi( "/".$xoopsModule->getVar('dirname')."/", $data['link'])&&!$data['pid']?$data['id']:$current_module_pid;
                     $current_module_pid  =  empty($xoopsModule)&&$data['link']=='.'?$data['id']:$current_module_pid;

             // Display conditions (yay!)
             // Relative datas
             if( $data['relative'] && $data['type']=='relative' ) {
                 $data['relative'] = explode('|',$data['relative']);

                 foreach( $data['relative'] as $relative ) {
                          $is_displayed = $relative=='index.php'&&$_SERVER['REQUEST_URI']=='/'?1:$is_displayed;
                          $is_displayed = strstr($_SERVER['REQUEST_URI'], trim($relative))?1:$is_displayed; }
                 }

                 $is_displayed = $data['type']=='permanent' && $main_type!='relative'?                                        1:$is_displayed;
                 $is_displayed = $data['type']=='relative'
                                 && ( $current_module_pid==$data['pid'] || $current_module_pid==$data['id'] )
                                 &&   $current_module_pid
                                 &&   !$data['relative']?                                                                    1:$is_displayed;
                 $is_displayed = $data['type']=='permanent'
                                 && ( $current_module_pid==$data['pid'] || $current_module_pid==$data['id'] )
                                 &&   $current_module_pid?                                                                    1:$is_displayed;
 //                $is_displayed = $is_relative?                                                                                1:$is_displayed;

          if( $is_displayed ) {

          $data['link']     = $data['link']?ereg('://', $data['link'])?$data['link']:XOOPS_URL.'/'.$data['link']:''; // Check relative and absolute path
          $data['target']   = multimenu_target( $data['link'], $data['target'] ); 
          $data['alt_title']= $is_infobulle&&!$data['alt_title']?strip_tags( $data['title'] ) :strip_tags( $data['alt_title'] );
          $data['alt_title']= str_replace('"', '', $data['alt_title']);
          $data['alt_title']= multimenu_short_title( $data['alt_title'], $text_max_length, '[...]' );


 // Images
 if( $is_image ) {
          $data['image']    = explode('|', $data['image']);
          $data['image_a']  = $data['image'][1];
          $data['image_b']  = $dir.$data['image'][0];
          $data['image'][0] = $data['image'][0]?$dir.$data['image'][0]:'';
          $data['image']    = $data['image'][1]?$data['image'][1]:$data['image'][0];
 } else { $data['image']    = '';
          $data['image_a']  = '';
          $data['image_b']  = ''; } // no images
          $data['title']    = $is_title?multimenu_short_title( $data['title'], $text_max_length, '[...]' ):'';

                    // Check sublink status
                     $link_status         = multimenu_link_status($data['pid'], $i );
                     $data['link_status'] =  $link_status;
                     $count_query_result  = 0;

                     if( $data['query'] ) {

                       if( (!$data['pid'] && $data['link']) || ($data['pid']&& $data['link']) ) {

                         $datas['data_list'][++$backintime]['has_sub'] = $data['pid']?1:0; // Check wether the précédent mainlink has a sublink
                         $datas['num_main']    = !$data['pid']?$main_i++:$main_i;
                         $datas['num']         =  $i++;
                         $datas['data_list'][] = $data; 
                         $status=1; $show = 1;
                         
                         } else { $status=$status?0:1; $show = 0; } // Display or not query's main link

                       $current_main_link = $i;
                       $data_query = multimenu_query( $data['query'] );
                       $count_query_result = count( $data_query['result'] );

                       if( $count_query_result ) {

                       foreach( $data_query['result'] as $data_q ) {

                         $data_q['id']        = 'sql';
                         $data_q['pid']       = $data['id'];
                         $data_q['catid']     = $data['catid'];
                         $data_q['type']      = $data['type'];
                         $data_q['status']    = $data['status'];
                         $data_q['weight']    = 0;
                         $data_q['title']     = $is_title?multimenu_short_title( $data_q['title'], $text_max_length, '[...]' ):'';
                         $data_q['alt_title'] = $is_infobulle&&!$data_q['alt_title'] ? strip_tags( $data_q['title'] ) : strip_tags( $data_q['alt_title'] );
                         $data_q['alt_title'] = str_replace('"', '', $data_q['alt_title']);
                         $data_q['alt_title'] = addslashes( substr($data_q['alt_title'], 0, 256) ); // addslashes(ereg_replace('"', '', $alt_title));
                         $data_q['alt_title'] = multimenu_short_title( $data_q['alt_title'], $text_max_length, '[...]' );
                         $data_q['image_a']   = $data_q['image'];
                         $data_q['image_b']   = $data_q['image'];

                         $data_q['query']     = '';
                         $data_q['target']    = multimenu_target( $data_q['link'], $data['target']);
                         $data_q['css']       = $data['css'];

                         // Check sublink status
                         $link_status = multimenu_link_status($status, $i );
                         $data_q['link_status'] =  $link_status;
                         $datas['num_main']   = $link_status=='link'?$main_i++:$main_i;
                         $datas['num']        = $i++;
                         $datas['data_list'][++$backintime]['has_sub'] = $data_q['pid']?1:0; // Check wether the précédent mainlink has a sublink
                         $datas['data_list'][] = $data_q; // $xoopsTpl->append('data_list', $data_q);

                       } // Foreach

                       } // if $count_query_result

                        if( $show ) { $count_query_result = $count_query_result?$count_query_result:'0';
                                      $datas['data_list'][$current_main_link]['title'] = $count_query_result?ereg_replace('#', '<font style="color:#E00;">'.$count_query_result.'</font>', $data['title']):ereg_replace('#', $count_query_result, $data['title']);
                                      $datas['data_list'][$current_main_link]['alt_title'] = ereg_replace('#', $count_query_result, $data['alt_title']); }

                    } else {

                         $datas['data_list'][++$backintime]['has_sub'] = $data['pid']?1:0; // Check wether the précédent mainlink has a sublink
                         $datas['num_main']    = !$data['pid']?$main_i++:$main_i;
                         $datas['num']         =  $i++;

                         $datas['data_list'][] = $data;

                     } // Query


              } // Absolute/relative

            } // Main pid is active

          } // While

             $datas['data_list'][++$backintime]['has_sub'] = 0;
             unset($datas['data_list'][1]);

Return $datas;
unset($datas);
}


function multimenu_tpl_rename( $file )
{
            $value = str_replace('include/','',$file);
            $value = str_replace('.css','',$value);
            $value = str_replace('.html','',$value);
            $file_name = str_replace('multimenu_','',$value);
            $value = str_replace('_',' ',$file_name);
            $name  = @constant(strtoupper('_MI_MULTIMENU_MODE_' . $value));
            
            $data['file']      = $file;
            $data['file_name'] = $file_name;
            $data['name']      = $name?$name:ucfirst($value);

Return $data;
}

function multimenu_link_status( $pid, $i=0 ) {
      $status=''; 
      if( !$pid && $i==1 ) { $status = 'top';  }
      if( !$pid && $i>1 )  { $status = 'link'; }
      if(  $pid && $i>1 )  { $status = 'sublink'; }

Return $status;
}

// Generate query result
function multimenu_query( $id, $limit=0 ) {
Global $xoopsDB;

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( 'multimenu_query' ) ."
                 WHERE id=" . $id;
         $result = $xoopsDB->queryF($sql);
         $myrow  = $xoopsDB->fetchArray( $result );

         $myrow['qlimit'] = $limit?$limit:$myrow['qlimit'];
         $is_uid = stristr($myrow['qid'], 'uid')?1:0;
         $is_uid = stristr($myrow['qid'], 'user_id')?1:$is_uid;

$datas['result'] = multimenu_render_query( $myrow['qtable'],
                                           $myrow['qid'],
                                           $myrow['qsubject'],
                                           $myrow['qdescription'],
                                           $myrow['qimage'],
                                           $myrow['qurl'],
                                           $myrow['qimageurl'],
                                           $myrow['qwhere'],
                                           $myrow['qorder'],
                                           $myrow['qlimit'],
                                           $is_uid  );

$datas['title'] = $myrow['title'];
 
 Return $datas;
}

// Fixe a date in time
// Sample = { sec=-1|min=-1|hou=-1|day=-1|mon=-1|yea=-1 }

function multimenu_fixe_date( $datas ) {
  
  if( ereg('{date', $datas ) ) {
  $datas       = explode('{date ', $datas);
  $datas       = str_replace('}', '', $datas[1]);
//  var_dump($datas);
  $values = explode('|', $datas);
  foreach( $values as $times ){
           $time = explode('=', $times);
           $$time[0] = date($time[1]);
  }
  
  $sec = isset($sec)?date('s')-$sec:0;
  $min = isset($min)?date('m')-$min:0;
  $hou = isset($hou)?date('h')-$hou:0;
  $day = isset($day)?date('d')-$day:0;
  $mon = isset($mon)?date('m')-$mon:0;
  $yea = isset($yea)?date('Y')-$yea:0;

  return date( mktime($h, $m, $s, $m,  $d, $y) );
}
return $datas;
}

// Generate query result
function multimenu_render_query( $table,
                                 $id, 
                                 $subject,
                                 $description='',
                                 $image='',
                                 $url='',
                                 $imageurl='',
                                 $where='',
                                 $order='',
                                 $limit='',
                                 $is_uid=0
                                   ) {
Global $xoopsDB, $xoopsUser;

        $query  = $image?', '.$image:'';
        $query .= $description?', '.$description:'';

        $where  = $where?ereg_replace('{date}', date(time()), $where):$where;

        $where_query = $where?' WHERE '.$where:'';
        $order_query = $where?' ORDER BY '.$order:'';

        $where_query = $xoopsUser?ereg_replace('{uid}', $xoopsUser->uid(), $where_query):ereg_replace('{uid}', 0, $where_query);

	$query = "SELECT ".$id.", ".$subject.$query."
		    FROM ".$xoopsDB->prefix($table).
                    $where_query . 
                    $order_query;

        $list       = $xoopsDB->queryF($query, $limit, 0);
//        $list_count = $xoopsDB->getRowsNum( $list );
        
        $datas=array(); 
        $i=0;
 if( $image && !$description ) {

    	while(list( $id, $title, $image ) = $xoopsDB->fetchRow($list))
     	{
          $uri   = ereg_replace('{id}', $id, $url);
          $uri   = ereg('{urw}', $uri) ? ereg_replace('{urw}', multimenu_urwkeywords( $title ), $uri) : $uri;
          $title = is_numeric($title)&&$is_uid?ereg_replace($title, XoopsUser::getUnameFromId($id), $title):$title;
          $datas[$i]['link']       = XOOPS_URL.'/'.$uri;
          $datas[$i]['title']      = $title;
          $datas[$i]['alt_title']  = '';
          $datas[$i++]['image']    = $image?XOOPS_URL.'/'.$imageurl.$image:'';
       }
         
} elseif( $description && !$image ) {

    	while(list( $id, $title, $description ) = $xoopsDB->fetchRow($list))
     	{ 
          $uri   = ereg_replace('{id}', $id, $url);
          $uri   = ereg_replace('{alt}', $description, $uri);
          $uri   = ereg('{urw}', $uri) ? ereg_replace('{urw}', multimenu_urwkeywords( $title ), $uri) : $uri;
          $title = is_numeric($title)&&$is_uid?ereg_replace($title, XoopsUser::getUnameFromId($id), $title):$title;
          $datas[$i]['link']        = XOOPS_URL.'/'.$uri;
          $datas[$i]['title']       = $title;
          $datas[$i]['alt_title']   = $description;
          $datas[$i++]['image']     = '';
       }

} elseif( $description && $image ) {
        
    	while(list( $id, $title, $image, $description ) = $xoopsDB->fetchRow($list))
     	{  
          $uri    = ereg_replace('{id}', $id, $url);
          $uri   = ereg_replace('{alt}', $description, $uri);
          $uri    = ereg('{urw}', $uri) ? ereg_replace('{urw}', multimenu_urwkeywords( $title ), $uri) : $uri;
          $title  = is_numeric($title)&&$is_uid?ereg_replace($title, XoopsUser::getUnameFromId($id), $title):$title;
          $datas[$i]['link']        = XOOPS_URL.'/'.$uri;
          $datas[$i]['title']       = $title;
          $datas[$i]['alt_title']   = $description;
          $datas[$i++]['image']     = $image?XOOPS_URL.'/'.$imageurl.$image:'';
       }

} else {

    	while(list( $id, $title ) = $xoopsDB->fetchRow($list))
     	{ 
          $uri   = ereg_replace('{id}', $id, $url);
          $uri   = ereg('{urw}', $uri) ? ereg_replace('{urw}', multimenu_urwkeywords( $title ), $uri) : $uri;
          $title = is_numeric($title)&&$is_uid?ereg_replace($title, XoopsUser::getUnameFromId($id), $title):$title;
          $datas[$i]['link']        = XOOPS_URL.'/'.$uri;
          $datas[$i]['title']       = $title;
          $datas[$i]['alt_title']   = '';
          $datas[$i++]['image']     = '';
         }
 }

Return $datas;
}

// Urw
function multimenu_urwkeywords( $content ) {
  Global $xoopsModuleConfig;
        $content = strtolower(trim(strip_tags(utf8_decode($content))));
        $content = html_entity_decode(htmlentities(utf8_encode($content)));
        $content = eregi_replace('[[:punct:]]',' ',  $content);
        $content = eregi_replace('[[:digit:]]',' ',  $content);
        $content = eregi_replace('  ',         '',  $content);
        $content = eregi_replace(' ',          ' ', trim($content));
        $content = explode(' ', $content);
        $words = array(); $i=0;
        foreach( $content as $word ) { $ret = strlen($word)>$xoopsModuleConfig['urw_count']&&$word?$word:'';
                                       if($ret) { $words[] = $ret; } }
        $content = implode('-', $words);
 Return $content;
}

// Function
function multimenu_query_display_table_rows( $table ) {

Global $xoopsConfig, $xoopsDB ;

$list=''; $ret=''; $i=1; $class='odd';

        $ret .= '<h3 align="center">'.$table.'</h3>';
        $ret .= '<div align="center">
                 <table class="outer" width="90%">
                 <tr class="header">
                 <th width="5%">'._MD_MULTIMENU_N.'</th>
                 <th width="15%">'._MD_MULTIMENU_FIELD.'</th>
                 <th width="15%">'._MD_MULTIMENU_TYPE.'</th>
                 <th width="10%">'._MD_MULTIMENU_NULL.'</th>
                 <th width="10%">'._MD_MULTIMENU_KEY.'</th>
                 <th width="15%">'._MD_MULTIMENU_DEFAULT.'</th>
                 <th width="20%">'._MD_MULTIMENU_EXTRA.'</th>
                 </tr>
          ';

          $sql = "DESCRIBE ".$xoopsDB->prefix( $table );
          $result = $xoopsDB->queryF( $sql);



          while ( list( $field, $type, $null, $key, $default, $extra ) = $xoopsDB -> fetchrow( $result ) )
	{

         $class = $class=='odd'?'even':'odd';
         if( eregi( 'id', $field ) ) { $field = '<font style="color:Red;font-weight:bold;">' . $field . '</font>'; }
         if( eregi( 'title', $field ) || 
             eregi( 'subject', $field ) || 
             eregi( 'name', $field )) { $field = '<font style="color:Green;font-weight:bold;">' . $field . '</font>'; }
         if( eregi( 'text', $field ) ||
             eregi( 'desc', $field ) ) { $field = '<font style="color:Blue;font-weight:bold;">' . $field . '</font>'; }
         if( eregi( 'image', $field )||
             eregi( 'avat', $field ) ) { $field = '<font style="color:Orange;font-weight:bold;">' . $field . '</font>'; }

         $list .= '
                  <tr>';

         $list .= '<td class="'.$class.'" align="center">
                  <b>'.$i++.'.</b>
                  </td>
                   ';

         $list .= '<td class="'.$class.'">
                  '.$field.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'">
                '.$type.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'" align="center">
                '.$null.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'">
                '.$key.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'" align="center">
                '.$default.'
                  </td>
                   ';
         $list .= '<td class="'.$class.'" align="center">
                '.$extra.'
                  </td>
                   ';
         $list .= '
                  </tr>';
         }


        $ret .= $list;
        $ret .= '</div></table><p />';
// Display result
   Return $ret;
 }
 
function multimenu_check_script_file( $file_name, $catid, $dest_dir, $file_type ) {

 $orignal_file = XOOPS_ROOT_PATH . '/modules/multimenu/templates/include/'.$file_name.'/'.$file_type.'_0.'.$file_type;
 $target_file  = XOOPS_ROOT_PATH . '/'.$dest_dir.$file_name.'_'.$catid.'.'.$file_type;
 $edited_file  = XOOPS_ROOT_PATH . '/'.$dest_dir.$file_name.'_0.'.$file_type;

    if( file_exists( $orignal_file ) && !file_exists( $edited_file ) ) { copy( $orignal_file, $edited_file ); }  // Backup original file for edition

    if( file_exists( $orignal_file ) && !file_exists( $target_file ) && !file_exists( $edited_file ) ) {     // Create a new file if no files in cache
      // Open file to read
        $handle = fopen ($orignal_file, "rb");
        $data = fread ($handle, filesize ($orignal_file));
        fclose ($handle);
        
        $data = ereg_replace('{id}', $catid, $data);
        $data = ereg_replace('{xoops_url}', XOOPS_URL, $data);
        $data = ereg_replace('{xoops_root}', XOOPS_ROOT_PATH, $data);
        
      
      // Open target file to write
       	$handle = fopen($target_file, 'w+');
		if ($handle) {
			fwrite($handle, $data);
                }
        fclose ($handle);
    }

    if( !file_exists( $target_file ) && file_exists( $edited_file ) ) {     // Use edited file to generate target file
      // Open file to read
        $handle = fopen ($edited_file, "rb");
        $data = fread ($handle, filesize ($edited_file));
        fclose ($handle);
        
        $data = ereg_replace('{id}', $catid, $data);
        $data = ereg_replace('{xoops_url}', XOOPS_URL, $data);
        $data = ereg_replace('{xoops_root}', XOOPS_ROOT_PATH, $data);

      // Open target file to write
       	$handle = fopen($target_file, 'w+');
		if ($handle) {
			fwrite($handle, $data);
                }
        fclose ($handle);
    }


   if( file_exists( $target_file ) ) {  // Use target file if exists
       $target_file = ereg_replace(XOOPS_ROOT_PATH, '', $target_file); 
       return $target_file; 
       } else { 
       return False;
       }
 }
 
function multimenu_target( $url='', $target='_self', $options='toolbar|scrollbars|status|resizable|fullscreen|titlebar' ) {
   $popgen_datas = '';

   if( eregi('.jpg',  $url) ||
       eregi('.jpeg', $url) ||
       eregi('.gif',  $url) ||
       eregi('.png',  $url) ) {
     $image_path = ereg_replace(XOOPS_URL, XOOPS_ROOT_PATH, $url);

     // Image options
     $images_infos = getimagesize( $image_path );
     if($images_infos) {
         $pop_width    = $images_infos[0] +10;
         $pop_height   = $images_infos[1] +10;

         // Popgen options
         $options = explode('|', $options);
         $popgen_options = '';
         foreach($options as $option) {
         $popgen_options .= $option . '=no, ';
         }

         // Render popgen datas
         $popgen_datas = "onclick=\"window.open('', 'wclose', 'width=".$pop_width.", height=".$pop_height.", ".$popgen_options." left=100, top=50', 'false')\"";
         $popgen_datas .= ' target="wclose"';
     }
   } else { 
         $popgen_datas = $target=='_blank'?' target="_blank"':'';
   }

  Return $popgen_datas;
 }
 
function multimenu_short_title( $title='', $length=32, $tiddle='[...]' )
{
  Global $xoopsUser;

     $user_id = is_object($xoopsUser)?$xoopsUser->uid():0;
     $title = ereg_replace('{username}', XoopsUser::getUnameFromId($user_id), $title);

//     $title = ereg_replace($title, XoopsUser::getUnameFromId($title), $title);
       
     $myts =& MyTextSanitizer::getInstance();
     $tiddle_length=round(strlen($tiddle)/4,1);
     $length=round($length-$tiddle_length,1);
     $part2=round($length/4,1);
     $part1=$part2*3;
     $length=round($length);
     $title = str_replace('"', '', $title);
     $title = $myts->makeTareaData4Show($title);
 if( strlen($title) > $length )
   { $title_01 = substr($title,0,$part1).$tiddle;
     $title_02 = substr($title,-$part2);
     $title=$title_01.$title_02;
   }
   Return $title;
}

// Generate Settings drop list
function multimenu_select_settings( $max=0, $settings='', $define='' ) {
 Global $xoopsModuleConfig;
$i=0; $set=''; $prev_prefix='';
$count = count( $xoopsModuleConfig );
$height= $max&&$count>$max?5:1;
      $set .= '
               <form action="">
               <select size="'.$height.'"
                       name="multimenu_settings"
                       onchange="location=this.options[this.selectedIndex].value"
               >
               <option value="" selected="selected"></option>
              ';
              
       $settings    = $settings?$settings:$xoopsModuleConfig;
      foreach( $settings as $name => $value ) {
      
       $prefix = explode('_', $name);
        $num    = isset($prefix[2])&&is_numeric($prefix[2]) ?' ' . $prefix[2]:'';
        $suffix = isset($prefix[2])&&!is_numeric($prefix[2])?'_' . $prefix[2]:'';
        $set .= $prefix[0]!=$prev_prefix?'
                </optgroup>
                <optgroup label="'.multimenu_define( $prefix[0], $define ).'">
                <option value="'.XOOPS_URL.'/modules/multimenu/admin/index.php?admin=settings&sub='.$prefix[0].'"
                        style="font-weight:bold;">
                [' . multimenu_define( $prefix[0].$suffix, $define ) . $num . ']
                </option>
                ':'';


        $set .= '
        <option value="'.XOOPS_URL.'/modules/multimenu/admin/index.php?admin=settings&sub='.$prefix[0].'&num='.$i++.'">';
        $set .= ' - ' . multimenu_define( $prefix[1].$suffix, $define ) . $num;
        $set .= '</option>';
      
        $prev_prefix = $prefix[0];   
      }
        $set .= '</optgroup>';
        $set .= '</select>';
        $set .= '</form>';
              
  Return $set;
}
 
 ?>