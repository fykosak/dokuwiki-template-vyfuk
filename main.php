<?php

/**
 * DokuWiki Wallpaper Template
 *
 * @link:   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author: Andreas Gohr <andi@splitbrain.org>
 * @author: Klaus Vormweg <klaus.vormweg@gmx.de>
 */
// must be run from within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}

// include custom template functions stolen from arctic template 
require_once(dirname(__FILE__) . '/tpl_functions.php');

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="', $conf['lang'], '"
 lang="', $conf['lang'], '" dir="', $lang['direction'], '">
    <head>

        <link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,300,400italic,400,600italic,600,700italic,700,800italic,800" rel="stylesheet" type="text/css" />
        <script src="//use.edgefonts.net/gloria-hallelujah:n4:all;source-sans-pro.js">
        </script>
        <script type="text/javascript" src="http://jakiestfu.github.io/Behave.js/behave.js">
        </script>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title> ', tpl_pagetitle(), '::', strip_tags($conf['title']), ' </title>
';

tpl_metaheaders();
echo tpl_favicon(array('favicon', 'mobile'));

echo '
        <script>
  (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

  ga("create", "UA-51523765-1", "cuni.cz");
  ga("send", "pageview");
        </script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="' . DOKU_BASE . 'lib/tpl/' . $conf['template'] . '/bootstrap.min.js"></script>
    
        <!--<script src="' . DOKU_BASE . 'lib/tpl/' . $conf['template'] . '/script.js"></script>-->

    </head>
    <body data-do="' . $ACT . '">
        <div class="clearer">
        </div>
        <div id="fb-root">
        </div>
        
        
        <div class="fksmenu">            
';
_wp_tpl_mainmenu();
echo '          
        </div>
        <div class="fks_minimenu">
            ';
_fks_minimenu();
echo'
        </div>
        <div class="clearer">
        </div>
        <div class="dokuwiki" id="dokuwiki" data-do="' . $ACT . '">
            <div class="stylehead">
                <div class="header">
                    <div class="clearer">
                    </div>
                    <div class="fkspagename">
';
tpl_link(wl(), $conf['title'], 'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[ALT+H]"');
echo '  
                    </div> 
                </div>
                <div class="clearer">
                </div> 
            </div>
'; //end stylehead 
flush();

echo '      
            <div class="clearer">
            </div>
            <div class="wrap">
                <div class="page" >
';
tpl_content();
echo '
                </div>
            </div>';

tpl_flush();
echo '
            <div class="no">';
/* provide DokuWiki housekeeping, required in all templates */
tpl_indexerWebBug();
echo '
            </div>
            <div class="bar" id="bar__bottom">     
                <div class="fksfootbar">
                    ' . _fks_footbar() . '
                    <a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki"><img src="', DOKU_TPL, 'images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" /></a>
                    <a href="', DOKU_BASE, 'feed.php" title="Recent changes RSS feed"><img src="', DOKU_TPL, 'images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" /></a>
                </div>
            </div>
        </div>
    </body>
</html>
';

