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

function multimenu_dir( $id, $limit=0 ) {
include_once(XOOPS_ROOT_PATH . '/class/xoopslists.php' );
Global $xoopsDB;

         $sql = "SELECT *
                 FROM " . $xoopsDB->prefix( 'multimenu_query' ) ."
                 WHERE id=" . $id;
         $result = $xoopsDB->queryF($sql);
         $myrow  = $xoopsDB->fetchArray( $result );
         $myrow['qlimit'] = $limit?$limit:$myrow['qlimit'];

         $file_list = XoopsLists :: getFileListAsArray( XOOPS_ROOT_PATH . '/' . $myrow['qurl'] );
         $file_list = $myrow['qwhere']?  multimenu_select_dir_files($file_list, $myrow['qwhere']) : $file_list;
         $myrow['qorder']=='asc' ? asort($file_list) : rsort($file_list);
         $file_list = $myrow['qlimit'] ? array_slice($file_list, 0, $myrow['qlimit'])             : $file_list;
         $myrow['files'] = $file_list;
 Return $myrow;
}

  function multimenu_select_dir_files( $datas, $where ) {
         $file_list = array();
         foreach( $datas as $file ) { if( eregi($where, $file) ) {$file_list[] = $file;}}
    Return $file_list;
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

function multimenu_link_status( $pid, $i=0 ) {

      if( !$pid && $i==0 ) { $status = 'top';  }
      if( !$pid && $i )    { $status = 'link'; }
      if(  $pid && $i )    { $status = 'sublink'; }

Return $status;
}


function multimenu_tpl_rename ( $file )
{
            $value = str_replace('include/','',$file);
            $value = str_replace('.html','',$value);
            $value = str_replace('multimenu_','',$value);
            $value = str_replace('_',' ',$value);
            $file_name = @constant(strtoupper('_MI_MULTIMENU_MODE_' . $value));
            
            $data['file'] = $file;
            $data['name'] = $file_name?$file_name:ucfirst($value);

Return $data;
}


// Function
function multimenu_query_display_table_rows( $table ) {

Global $xoopsConfig, $xoopsDB ;

$list=''; $ret=''; $i=1; $class='odd';

        $ret .= '<h3 align="center">'.$table.'</h3>';
        $ret .= '<div align="center">
                 <table class="outer" width="90%">
                 <tr class="header">
                 <th width="5%">'._MULTIMENU_N.'</th>
                 <th width="15%">'._MULTIMENU_FIELD.'</th>
                 <th width="15%">'._MULTIMENU_TYPE.'</th>
                 <th width="10%">'._MULTIMENU_NULL.'</th>
                 <th width="10%">'._MULTIMENU_KEY.'</th>
                 <th width="15%">'._MULTIMENU_DEFAULT.'</th>
                 <th width="20%">'._MULTIMENU_EXTRA.'</th>
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
         if( eregi( 'imag', $field )||
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


?>