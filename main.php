<?php

/**
 * DokuWiki Wallpaper Template
 *
 * @link:   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author: Andreas Gohr <andi@splitbrain.org>
 * @author: Klaus Vormweg <klaus.vormweg@gmx.de>
 */
// must be run from within DokuWiki
if (!defined('DOKU_INC'))
    die();

// include custom template functions stolen from arctic template 
require_once(dirname(__FILE__) . '/tpl_functions.php');

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="', $conf['lang'], '"
 lang="', $conf['lang'], '" dir="', $lang['direction'], '">
<head>
  <link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two&subset=latin,latin-ext" rel="stylesheet" type="text/css">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>
';
echo ' ', strip_tags($conf['title']), ' | ';
tpl_pagetitle();
echo '</title>
';

tpl_metaheaders();
echo tpl_favicon(array('favicon', 'mobile'));
echo '<script type="text/javascript" charset="utf-8" src="lib/tpl/wallpaper/script.js"></script>';
echo '  </head>

<body>
<div class="scrollmenu" id="scrollmenu" style="display:none">';
_fks_scrollmenu();
_fks_topbaruser();
echo '</div>
     <div class="clearer"></div>
<div class="dokuwiki" id="dokuwiki">'
//<img id="fakebackground" src="', DOKU_TPL, 'images/bg.jpg" alt="" />
;
//html_msgarea(); 
/*
 * irituje ma to hore !!!! ide to do preč :) 
 */
echo '  <div class="stylehead">
    <div class="header">
      
     <div class="clearer"></div>
     <div class="fkstopbar">';
_fks_topbarlogo();
_fks_topbar();
_fks_topbaruser();
echo '<div class="clearer"></div>
     </div>
     <div class="clearer"></div>

     <div class="fksmenu">
      <div class="mainmenu">
';
_wp_tpl_mainmenu();
echo '      <div class="clearer"></div></div>
     </div>
     <div class="fkspagename">
';
tpl_link(wl(), $conf['title'], 'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[ALT+H]"');

echo '  </div>  



    </div>'; //end stylehead 

echo'<div class="clearer"></div> 

	   
    '; //<div class="breadcrumbs"> 
//<div class="clearer"></div>
//';
//if ($conf['breadcrumbs']) {
//    tpl_breadcrumbs();
//} elseif ($conf['youarehere']) {
//    _wp_tpl_youarehere();
//}
//$translation = &plugin_load('helper','translation');
//if ($translation) echo $translation->showTranslations();
//echo '    </div>
echo '</div>
';
flush();
if ($ACT != 'diff' && $ACT != 'edit' && $ACT != 'preview' && $ACT != 'admin' && $ACT != 'login' && $ACT != 'logout' && $ACT != 'profile' && $ACT != 'revisions') {
    echo '      <div class="clearer"></div>
<div class="wrap">
     ';

    echo '
     <div class="page" >
';
    tpl_content();
    echo '
     </div>';
    _fkssidebar();
    echo'</div>';
} else {
    echo '  <div class="wrap">
<div class="page" style="margin-left:0; max-width: 60em;"> 
';
    tpl_content();
    echo '   </div>
  </div>
';
}
tpl_flush();
///echo '  <div class="stylefoot"></div>';
echo '<div class="no">';
/* provide DokuWiki housekeeping, required in all templates */
tpl_indexerWebBug();
echo '</div>';

echo '    <div class="bar" id="bar__bottom"> 
    
<div class="fksfootbar">
 ' . _fks_footbar();

if ($ACT != 'diff' && $ACT != 'edit' && $ACT != 'preview' && $ACT != 'admin' && $ACT != 'login' && $ACT != 'logout' && $ACT != 'profile' && $ACT != 'revisions') {
    echo '<a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki"><img src="', DOKU_TPL, 'images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" /></a>
   	 <a href="', DOKU_BASE, 'feed.php" title="Recent changes RSS feed"><img src="', DOKU_TPL, 'images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" /></a>
   ';
} else {
    echo '<a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki"><img src="', DOKU_TPL, 'images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" /></a>
    	 <a href="', DOKU_BASE, 'feed.php" title="Recent changes RSS feed"><img src="', DOKU_TPL, 'images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" /></a>';
}

echo '</div></div>
</div>
</body>
</html>
';
?>
