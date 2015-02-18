<?php

/**
 * DokuWiki Wallpaper Template
 *
 *
 */
// must be run from within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}

// include custom template functions stolen from arctic template 
require_once(dirname(__FILE__) . '/tpl_functions.php');


require_once (DOKU_PLUGIN . plugin_directory('fksimageshow') . '/helper.php');
$tpl_season = 'winter';
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
        
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        ';
if (preg_match('/výfuk/i', tpl_pagetitle($ID, true))) {
    echo'
        <title> ', tpl_pagetitle($ID, true), ' </title>
';
} else {
    echo'
        <title> ', tpl_pagetitle($ID, true), '::', strip_tags($conf['title']), ' </title>
';
}



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
    </head>
    <body data-do="' . $ACT . '">
        <div class="clearer">
        </div>
        <!--<div id="fb-root">
        </div>-->
        <div class="dokuwiki" id="dokuwiki" data-do="' . $ACT . '">
        
        
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
        
            <div class="wrap">
                <div class="stylehead">
                    <div class="header">
                        <div class="clearer">
                        </div>
                        <div class="fkspagename" style="text-align:center">
                            <div class="fks_vyfuk_logo" >
                                <a href="' . DOKU_BASE . '">
                                    <img src="' . fksimage::_fks_season_image('logo_vyfuk', 'png') . '" style="height:150px;" alt="logo_vyfuk" /> ';

echo '
                                </a>
                            </div>
                            <div class="fks_mrak_1">
                        
                                <img src="' . fksimage::_fks_season_image('vyfuk_mrak_1', 'png', $tpl_season) . '" alt="logo_vyfuk"  style="height:90px" />
                            </div>            
                            <div class="fks_mrak_2">
                                <img src="' . fksimage::_fks_season_image('vyfuk_mrak_2', 'png', $tpl_season) . '" alt="logo_vyfuk"  style="height:80px" />
                            </div>
                            <div class="fks_vyfucek">
                                <img src="' . fksimage::_fks_season_image('vyfuk_tabule', 'png', $tpl_season) . '" alt="logo_vyfuk"  style="height:150px" />
                            </div>           
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
                <div class="page" >';
_fks_noscript()
;

tpl_content();

echo '</div>';
global $ACT;
if ($ACT == 'show') {
    echo'<div class="fkssidebar_R">'
    . p_render("xhtml", p_get_instructions(io_readFile("data/pages/fkssidebar.txt", false)), $info)
    . '</div>'
    . '<div class="clearer"></div>';
}

echo'

            ';

tpl_flush();
echo '
            <div class="no">';
/* provide DokuWiki housekeeping, required in all templates */
tpl_indexerWebBug();
echo '
            </div>
                </div>
                <div class="fksfootbar">
                    ' . _fks_footbar() . '
                    <a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki">
                        <img src="', DOKU_TPL, 'images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" />
                    </a>
                    <a href="', DOKU_BASE, 'feed.php" title="Recent changes RSS feed">
                        <img src="', DOKU_TPL, 'images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" />
                    </a>
                </div>
            
           
        </div>
    </body>
</html>
';

