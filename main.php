<?php
/**
 * DokuWiki Wallpaper Template
 *
 * @link:   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author: Andreas Gohr <andi@splitbrain.org>
 * @author: Klaus Vormweg <klaus.vormweg@gmx.de>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include custom template functions stolen from arctic template 
require_once(dirname(__FILE__).'/tpl_functions.php');

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="', $conf['lang'], '"
 lang="', $conf['lang'],'" dir="', $lang['direction'], '">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>
';
tpl_pagetitle();
echo '[', strip_tags($conf['title']), ']';
echo '</title>
';

tpl_metaheaders();
echo tpl_favicon(array('favicon', 'mobile'));

echo '  </head>

<body>
<div class="dokuwiki">'
   //<img id="fakebackground" src="', DOKU_TPL, 'images/bg.jpg" alt="" />
;
html_msgarea();
echo '  <div class="stylehead">
    <div class="header">
      <div class="pagename">';
      
tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[ALT+H]"');
echo '      </div>

     <div class="clearer"></div>
	   <div class="mainmenu">
';

_wp_tpl_mainmenu();
echo '      </div>
    </div>
    <div class="breadcrumbs">
';
if($conf['breadcrumbs']){
  tpl_breadcrumbs();
} elseif($conf['youarehere']){
  _wp_tpl_youarehere();
}
//$translation = &plugin_load('helper','translation');
//if ($translation) echo $translation->showTranslations();
echo '    </div>
  </div>
';
flush();
if($ACT != 'diff' && $ACT != 'edit' && $ACT != 'preview' && $ACT != 'admin' && $ACT != 'login' && $ACT != 'logout' && $ACT != 'profile' && $ACT != 'revisions') {
  echo '  <div class="wrap">
     <div class="fkssitebar" style=" float:right ;max-width: 20em;">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at nibh in justo blandit facilisis. Nam a arcu eget erat euismod elementum. In auctor, turpis ac gravida luctus, enim elit scelerisque elit, vel volutpat nunc diam in odio. Fusce commodo condimentum velit, vel lobortis nisl luctus vel. Cras eu urna imperdiet lectus scelerisque mollis. Nulla varius aliquet velit quis fringilla. Aenean egestas consequat quam, vel imperdiet sapien ullamcorper in. Donec non posuere dolor. Donec dictum enim iaculis mi tristique, nec tincidunt metus tristique.

Suspendisse consectetur porta sapien nec semper. Donec risus felis, venenatis vel sollicitudin non, dignissim vulputate arcu. Quisque eget velit commodo, ultrices nisi at, ullamcorper nibh. Nulla auctor arcu eu massa dignissim rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae euismod nunc, et auctor libero. Nunc mattis nibh et feugiat congue. In non congue odio. Pellentesque varius enim sed ultricies tempus. Nunc convallis quam vitae placerat molestie. Maecenas et elementum dolor, in vulputate lorem. Etiam sit amet purus malesuada, dignissim ante tempus, tincidunt sem. Proin nec laoreet neque, eget porttitor purus. Cras interdum elit a dolor ullamcorper, in rhoncus orci placerat. Mauris vestibulum pharetra arcu, porttitor placerat purus semper sed.

Mauris tincidunt hendrerit elementum. Etiam vitae lobortis velit. Praesent fermentum dui in nibh scelerisque lobortis. Suspendisse pulvinar lacus non molestie blandit. Aliquam vitae nisi est. Suspendisse potenti. Donec condimentum, erat quis blandit gravida, nulla sem viverra nibh, sit amet porta urna nibh vel tellus. Suspendisse et dolor in enim gravida pellentesque eget ut felis. Nulla et semper est. Morbi interdum elementum lectus eget accumsan.

Fusce nec fermentum turpis, eget iaculis diam. Nunc iaculis tellus lorem, ut tempor lectus aliquet ac. Vivamus ultricies dictum blandit. Vestibulum lobortis venenatis eros, sit amet congue lacus egestas id. Praesent eu nisl fringilla diam condimentum vehicula. Integer ac sem non velit porta sodales. Aenean malesuada dolor ut blandit dapibus.

Ut ac lobortis enim. Vestibulum tincidunt purus elit, pharetra laoreet massa lobortis ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla eu velit lorem. Fusce non varius est. Mauris tincidunt lectus eget neque blandit, sed condimentum enim viverra. Maecenas sodales at tellus ac facilisis. Praesent a tellus vitae nunc volutpat tincidunt. Suspendisse sagittis sit amet risus nec malesuada. Fusce iaculis vitae quam ut mattis. Etiam blandit odio dui, in rhoncus erat volutpat vel. Etiam ipsum mi, eleifend ut pretium ac, ultrices vel ipsum. Vestibulum purus enim, placerat quis lectus quis, luctus sollicitudin eros. Suspendisse ac ante odio. Aenean diam nisl, rhoncus at velit eu, lacinia consequat nisi.
</div>
     <div class="page">
';
  tpl_content();
  echo '
     </div>
  </div>';
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
echo '  <div class="stylefoot">
';
if($ACT != 'diff' && $ACT != 'edit' && $ACT != 'preview' && $ACT != 'admin' && $ACT != 'login' && $ACT != 'logout' && $ACT != 'profile' && $ACT != 'revisions') {
  echo '    <div class="meta">
     <div class="homelink">
  		   <a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki"><img src="', DOKU_TPL, 'images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" /></a>
   	 <a href="', DOKU_BASE, 'feed.php" title="Recent changes RSS feed"><img src="', DOKU_TPL, 'images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" /></a>
    </div>
';
  _wp_tpl_pageinfo();
  echo '  </div>
';
} else {
  echo '  <div class="meta">
     <div class="homelink">
  		   <a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki"><img src="', DOKU_TPL, 'images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" /></a>
    	 <a href="', DOKU_BASE, 'feed.php" title="Recent changes RSS feed"><img src="', DOKU_TPL, 'images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" /></a>
      </div>
    </div>
';
}
echo '    <div class="bar" id="bar__bottom">
       <div class="bar-left" id="bar__bottomleft">
';
tpl_button('admin');
if($ACT != 'login' && $ACT != 'logout') {        
  tpl_button('login');
  echo '&nbsp;';
}
if($_SERVER['REMOTE_USER']){
  tpl_button('subscribe');
  tpl_button('profile');
  tpl_button('history');
}
echo '&nbsp;
       </div>
       <div class="bar-right" id="bar__bottomright">
';
if(!$_SERVER['REMOTE_USER'] && $ACT != 'login' && $ACT != 'logout'){ 
  if(!$conf['tpl']['wallpaper']['showsearch']) {  
    tpl_searchform();
  }
  if($conf['tpl']['wallpaper']['showmedia']) {   
    tpl_button('media');
  }
} else {
  if($ACT != 'login' && $ACT != 'logout'){
    if($conf['tpl']['wallpaper']['showsearch']) {  
      tpl_searchform();
      echo '&nbsp';
    }
    tpl_button('media');
  }
}
tpl_button('edit');
$dw2pdf = &plugin_load('action','dw2pdf');
if($dw2pdf) {
	global $REV;
	echo '<form class="button" method="get" action="',wl($ID),'">
              <div class="no"><input type="hidden" name="do" value="export_pdf" />
              <input type="hidden" name="rev" value="', $REV, '" />
              <input type="hidden" name="id" value="', $ID, '" />
              <input type="submit" value="PDF-Export" class="button" title="PDF-Export" />
              </div></form>';
}
echo '    </div>
      <div class="clearer"></div>
    </div>
  </div>
  <div class="no">
';
/* provide DokuWiki housekeeping, required in all templates */ 
tpl_indexerWebBug();
echo '</div>
</div>
</body>
</html>
';
?>
