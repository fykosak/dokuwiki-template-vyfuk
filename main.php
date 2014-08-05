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

 './/<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
  //<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,300,400italic,400,600italic,600,700italic,700,800italic,800" rel="stylesheet" type="text/css" />
  //<script src="//use.edgefonts.net/gloria-hallelujah:n4:all;source-sans-pro.js"></script>
' <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>
';
echo ' ', strip_tags($conf['title']), ' | ';
tpl_pagetitle();
echo '</title>
';

tpl_metaheaders();
echo tpl_favicon(array('favicon', 'mobile'));

echo '<script type="text/javascript" charset="utf-8" src="' . DOKU_BASE . 'lib/tpl/wallpaper/script.js"></script>';
echo '  
<script>
  (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

  ga("create", "UA-51523765-1", "cuni.cz");
  ga("send", "pageview");</script>';


echo'

</head>

<body>
<div class="scrollmenu_dis" id="scrollmenu" >
<ul class="idx"><li class="level0">';
_fks_topbarlogo();
echo '</li><li class="level0">';
_wp_tpl_mainmenu();
echo '</li><li class="level0">';
_fks_topbaruser();
echo '</li></ul>';
echo '</div>
     <div class="clearer"></div>
     <div id="fb-root"></div>

<div class="dokuwiki" id="dokuwiki">'
;
//html_msgarea(); 
/*
 * irituje ma to hore !!!! ide to do preč :) 
 */
echo '  <div class="stylehead">
    <div class="header">
      
     <div class="clearer"></div>';
echo' <div class="fksmenu">
      <div class="mainmenu">
';
_wp_tpl_mainmenu();
_fks_topbaruser();
;
echo '      <div class="clearer"></div></div>
     </div>
     <div class="fkspagename">
';
tpl_link(wl(), $conf['title'], 'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[ALT+H]"');

echo '  </div>  
    </div>'; //end stylehead 
echo'<div class="clearer"></div> 
    </div>
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
