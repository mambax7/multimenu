<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2004 <http://www.xoops.org/>
*
* Functions: URL Rewriting 3.0
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- DuGris (http://www.dugris.info)
*/

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }

// Generate links
function multimenu_create_url( $link_url='', 
                               $title='',
                               $urw=0, 
                               $dirname='' ) {
 // Rewrite urls
        $target = XOOPS_ROOT_PATH.'/modules/multimenu/.htaccess';

        $link_url = is_file($target)&&!ereg('127.0.0.1', XOOPS_URL)&&$urw&&$link_url?multimenu_urw($link_url, $title, $urw):$link_url;
Return $link_url;
}

// Urw
function multimenu_cleankeywords( $content ) {
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
/*
function multimenu_replace_accents($s) {
    $s = htmlentities($s);
    $s = preg_replace ('/&([a-zA-Z])(uml|acute|grave|circ|tilde|cedil|ring|quot|apos|deg|ordm);/', '$1', $s);
    $s = html_entity_decode($s);
    return $s;
}


function multimenu_cleankeywords( $content ) {
        
        $content = multimenu_replace_accents(strtolower(trim(strip_tags($content))));
        $content = eregi_replace('[[:punct:]]','',  $content);
        $content = eregi_replace('[[:digit:]]','',  $content);
        $content = eregi_replace('  ',         '',  $content);
        $content = eregi_replace(' ',          '-', trim($content));

Return '-'.$content;
}
*/

function multimenu_urw($link_url='', $title='') {
        $title = multimenu_cleankeywords( $title );
        $id = explode('=', $link_url);
        if( strstr($id[0], '../') ) { $sub = '../'; } else { $sub = ''; }
        if( isset($id[1]) ) { $link_url = $sub.$id[1] . $title . '.html'; }

Return $link_url;
}
?>