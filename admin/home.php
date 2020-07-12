<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/

// Menus
         $sql = "SELECT catid, title, description
                 FROM " . $xoopsDB->prefix( 'multimenu_menu' ) . "
                 ORDER BY title ASC";
         $result = $xoopsDB->queryF( $sql);
                  $ret_menu = '<ul>';
                  while ( list( $l_catid, $l_title, $l_description ) = $xoopsDB -> fetchrow( $result ) )
	{
                  $ret_menu .= '<li>';
                  $ret_menu .= ' [<a href="index.php?admin=menu&catid='.$l_catid.'&op=edit" title="'.strip_tags($l_description).'">'._MD_MULTIMENU_MENU.'</a>]';
                  $ret_menu .= ' [<a href="index.php?admin=link&catid='.$l_catid.'&op=edit" title="'.strip_tags($l_description).'">'._MD_MULTIMENU_LINK.'</a>] ';
                  $ret_menu .= $l_title . '</li>';
        }
                  $ret_menu .= '</ul>';

// sql
         $sql = "SELECT id, title, qtable
                 FROM " . $xoopsDB->prefix( 'multimenu_query' ) . "
                 ORDER BY title ASC";
         $result = $xoopsDB->queryF( $sql);
                  $ret_query = '<ul>';
                  while ( list( $l_id, $l_title, $l_description ) = $xoopsDB -> fetchrow( $result ) )
	{
                  $ret_query .= '<li>';
                  $ret_query .= '<a href="../index.php?admin=query&id='.$l_id.'&op=edit" title="'.strip_tags($l_description).'">'.$l_title.'</a>';
                  $ret_query .= '</li>';
        }
                  $ret_query .= '</ul>';

include('include/menu.php');
$ret = Admin_OpenTable();
$ret .= '<ul><dl>';

foreach( $adminmenu as $i=>$infos ) {
  $menus = $i==2?$ret_menu:'';
  $menus = $i==4?$ret_query:$menus;
  $ret .= '<li style="list-style-type:decimal;"><a href="../' . $infos['link'] . '">' . $infos['title'] . '</a>
           <dd style="font-style:italic;">' . $infos['description'] . '
           '.$menus.'</dd><br />
          </li>';
}

$ret .= '</dl></ul>';
$ret .= Admin_CloseTable();
echo $ret;


?>