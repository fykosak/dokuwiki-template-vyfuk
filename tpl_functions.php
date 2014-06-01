<?php

/*
 * DokuWiki Template Wallpaper Functions - adapted from arctic template
 *
 * @license GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Michael Klier <chi@chimeric.de>
 * @author Klaus Vormweg <klaus.vormweg@gmx.de>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}

/* prints the menu */

function _fks_topbar() {
    //echo p_render("xhtml", p_get_instructions(io_readFile("data/pages/fkstopbar.txt", false)), $info);

    require_once(DOKU_INC . 'inc/search.php');
    global $conf;
    global $ID;

    /* options for search() function */
    $opts = array(
        'depth' => 0,
        'listfiles' => true,
        'listdirs' => true,
        'pagesonly' => true,
        'firsthead' => true,
        'sneakyacl' => true
    );

    $dir = $conf['datadir'];
    $tpl = $conf['template'];
    if (isset($conf['start'])) {
        $start = $conf['start'];
    } else {
        $start = 'start';
    }

    $ns = dirname(str_replace(':', '/', $ID));
    if ($ns == '.') {
        $ns = '';
    }
    $ns = utf8_encodeFN(str_replace(':', '/', $ns));

    $data = array();
    $ff = TRUE;
    if ($conf['tpl'][$tpl]['usemenufile']) {

        $menufilename = 'fkstopbar';

        $filepath = wikiFN($menufilename);
        if (!file_exists($filepath)) {
            $ff = FALSE;
        } else {
            _wp_tpl_parsemenufile($data, $menufilename, $start);
        }
    }
    if (!$conf['tpl'][$tpl]['usemenufile'] or ($conf['tpl'][$tpl]['usemenufile'] and !$ff)) {
        search($data, $conf['datadir'], 'search_universal', $opts);
    }
    $i = 0;
    $cleanindexlist = array();
    if ($conf['tpl'][$tpl]['cleanindexlist']) {
        $cleanindexlist = explode(',', $conf['tpl'][$tpl]['cleanindexlist']);
        $i = 0;
        foreach ($cleanindexlist as $tmpitem) {
            $cleanindexlist[$i] = trim($tmpitem);
            $i++;
        }
    }
    $data2 = array();
    $first = true;
    foreach ($data as $item) {
        if (preg_match('#https?://#', $item['id'])) {
            $item['type'] = 'abs';
            $data2[] = $item;
            continue;
        }
        if ($conf['tpl'][$tpl]['cleanindex']) {
            if (strpos($item['id'], 'playground') !== false or strpos($item['id'], 'wiki') !== false) {
                continue;
            }
            if (count($cleanindexlist)) {
                if (strpos($item['id'], ':')) {
                    list($tmpitem) = explode(':', $item['id']);
                } else {
                    $tmpitem = $item['id'];
                }
                if (in_array($tmpitem, $cleanindexlist)) {
                    continue;
                }
            }
        }
        if (strpos($item['id'], $menufilename) !== false and $item['level'] == 1) {
            continue;
        }
        if ($conf['tpl'][$tpl]['hiderootlinks']) {
            $item2 = array();
            if ($item['type'] == 'f' and !$item['ns'] and $item['id']) {
                if ($first) {
                    $item2['id'] = 'start';
                    $item2['ns'] = 'root';
                    $item2['perm'] = 8;
                    $item2['type'] = 'd';
                    $item2['level'] = 1;
                    $item2['open'] = 1;
                    $item2['title'] = 'Start';
                    $data2[] = $item2;
                    $first = false;
                }
                $item['ns'] = 'root';
                $item['level'] = 2;
            }
        }
        if ($item['id'] == $start or preg_match('/:' . $start . '$/', $item['id'])) {
            continue;
        }
        $data2[] = $item;
    }
    echo html_buildlist($data2, 'idx', '_wp_tpl_list_index', 'html_li_index');
}

function _fks_topbarlogo() {
    echo '<ul class="fkstopbarlogo">
        <li class="open"><div class="li">
    <a href="' . wl() . '">  <span> Výfuk </span><span class="fkstopbatbeta">beta</span></a>
    </div></li></ul>';
}

function _fks_footbar() {

    return p_render("xhtml", p_get_instructions(io_readFile("data/pages/fksfootbar.txt", false)), $info);
}

/*
 * začiatok mišoveho šialenstva!!!
 * deti nepite moc energeťaku lebo vám z toho žačne šibať
 */

function _fks_topbaruser() {
    global $INFO;
    //echo '<ul class="fkstopbaruser"><li> <div class="li"><span class="fkstopbaruserinfo">';
    echo '<ul class="fkstopbaruser"><li class="open"> <div class="li">';
    if ($_SERVER['REMOTE_USER']) {
        echo '<a class="fkstopbaruserinfo"> <!--<span class="fkstopbaruserinfo"></span>--> ' . $INFO['userinfo']['name'] . '</a></div>';
        //print_r($INFO['userinfo']);
        echo '<ul class="idx">';


        echo '<li class="level2"><div class="li">';
        tpl_button('admin');
        echo '</div></li>';

        echo '<li class="level2"><div class="li">';
        tpl_button('edit');
        echo '</div></li>';


        if ($_SERVER['REMOTE_USER']) {
            /*
             * nepotrebné kvôli auth FKSDB 
             */
            //echo '<li class="level2"><div class="li">';
            //tpl_button('subscribe');
            //echo '</div></li>';
            //echo '<li class="level2"><div class="li">';
            //tpl_button('profile');
            //echo '</div></li>';

            echo '<li class="level2"><div class="li">';
            tpl_button('history');
            echo '</div></li>';
        }

        if (!$_SERVER['REMOTE_USER'] && $ACT != 'login' && $ACT != 'logout') {
            if (!$conf['tpl']['wallpaper']['showsearch']) {
                echo '<li class="level2"><div class="li">';
                tpl_searchform();
                echo '</div></li>';
            }
            if ($conf['tpl']['wallpaper']['showmedia']) {
                echo '<li class="level2"><div class="li">';
                tpl_button('media');
                echo '</div></li>';
            }
        } else {
            if ($ACT != 'login' && $ACT != 'logout') {
                if ($conf['tpl']['wallpaper']['showsearch']) {
                    echo '<li class="level2"><div class="li">';
                    tpl_searchform();
                    echo '</div></li>';
                    //echo '&nbsp';
                }
                echo '<li class="level2"><div class="li">';
                tpl_button('media');
                echo '</div></li>';
            }
            echo '<li class="level2"><div class="li">'
            . '<form class="button btn_admin" method="post" action="http://vyfuk.mff.cuni.cz/wiki">'
            . '<div class="no">'
            . '<input type="submit" value="Wiki" class="button" title="wiki">'
            . '</div></form>'
            //. '<a href="http://vyfuk.mff.cuni.cz/wiki">WIKI</a>'
            . '</div></li>';
        }



        $dw2pdf = &plugin_load('action', 'dw2pdf');
        if ($dw2pdf) {
            global $REV;
            echo '<li class="level2"><div class="li">';
            echo '<form class="button" method="get" action="', wl($ID), '">
              <div class="no"><input type="hidden" name="do" value="export_pdf" />
              <input type="hidden" name="rev" value="', $REV, '" />
              <input type="hidden" name="id" value="', $ID, '" />
              <input type="submit" value="PDF-Export" class="button" title="PDF-Export" />
              </div></form>';
            echo '</div></li>';
        }
        if ($ACT != 'login' && $ACT != 'logout') {
            echo '<li class="level2"><div class="li">';
            tpl_button('login');
            echo '</div></li>';
            //echo '&nbsp;';
        }


//echo '    </div>
        echo'    </ul></li>';
    } else {
        echo '<li class="level2"><div class="li">';
        tpl_button('login');
        echo '</div></li>';
    }
    echo '</ul>';
}

/*
 * koniec mišoveho šialenstva!!!
 */

function _wp_tpl_mainmenu() {
    require_once(DOKU_INC . 'inc/search.php');
    global $conf;
    global $ID;

    /* options for search() function */
    $opts = array(
        'depth' => 0,
        'listfiles' => true,
        'listdirs' => true,
        'pagesonly' => true,
        'firsthead' => true,
        'sneakyacl' => true
    );

    $dir = $conf['datadir'];
    $tpl = $conf['template'];
    if (isset($conf['start'])) {
        $start = $conf['start'];
    } else {
        $start = 'start';
    }

    $ns = dirname(str_replace(':', '/', $ID));
    if ($ns == '.') {
        $ns = '';
    }
    $ns = utf8_encodeFN(str_replace(':', '/', $ns));

    $data = array();
    $ff = TRUE;
    if ($conf['tpl'][$tpl]['usemenufile']) {
        if ($conf['tpl'][$tpl]['menufilename']) {
            $menufilename = $conf['tpl'][$tpl]['menufilename'];
        } else {
            $menufilename = 'menu';
        }
        $filepath = wikiFN($menufilename);
        if (!file_exists($filepath)) {
            $ff = FALSE;
        } else {
            _wp_tpl_parsemenufile($data, $menufilename, $start);
        }
    }
    if (!$conf['tpl'][$tpl]['usemenufile'] or ($conf['tpl'][$tpl]['usemenufile'] and !$ff)) {
        search($data, $conf['datadir'], 'search_universal', $opts);
    }
    $i = 0;
    $cleanindexlist = array();
    if ($conf['tpl'][$tpl]['cleanindexlist']) {
        $cleanindexlist = explode(',', $conf['tpl'][$tpl]['cleanindexlist']);
        $i = 0;
        foreach ($cleanindexlist as $tmpitem) {
            $cleanindexlist[$i] = trim($tmpitem);
            $i++;
        }
    }
    $data2 = array();
    $first = true;
    foreach ($data as $item) {
        if (preg_match('#https?://#', $item['id'])) {
            $item['type'] = 'abs';
            $data2[] = $item;
            continue;
        }
        if ($conf['tpl'][$tpl]['cleanindex']) {
            if (strpos($item['id'], 'playground') !== false or strpos($item['id'], 'wiki') !== false) {
                continue;
            }
            if (count($cleanindexlist)) {
                if (strpos($item['id'], ':')) {
                    list($tmpitem) = explode(':', $item['id']);
                } else {
                    $tmpitem = $item['id'];
                }
                if (in_array($tmpitem, $cleanindexlist)) {
                    continue;
                }
            }
        }
        if (strpos($item['id'], $menufilename) !== false and $item['level'] == 1) {
            continue;
        }
        if ($conf['tpl'][$tpl]['hiderootlinks']) {
            $item2 = array();
            if ($item['type'] == 'f' and !$item['ns'] and $item['id']) {
                if ($first) {
                    $item2['id'] = 'start';
                    $item2['ns'] = 'root';
                    $item2['perm'] = 8;
                    $item2['type'] = 'd';
                    $item2['level'] = 1;
                    $item2['open'] = 1;
                    $item2['title'] = 'Start';
                    $data2[] = $item2;
                    $first = false;
                }
                $item['ns'] = 'root';
                $item['level'] = 2;
            }
        }
        if ($item['id'] == $start or preg_match('/:' . $start . '$/', $item['id'])) {
            continue;
        }
        $data2[] = $item;
    }
    echo html_buildlist($data2, 'idx', '_wp_tpl_list_index', 'html_li_index');
}

/* Index item formatter
 * Callback function for html_buildlist()
 */

function _wp_tpl_list_index($item) {
    global $ID;
    global $conf;
    $ret = '';
    if ($item['type'] == 'd') {
        if (@file_exists(wikiFN($item['id'] . ':' . $conf['start']))) {
            $ret .= html_wikilink($item['id'] . ':' . $conf['start'], $item['title']);
        } else {
            $ret .= html_wikilink($item['id'] . ':', $item['title']);
        }
    } elseif ($item['type'] == 'abs') {
        $ret .= '<a href="' . $item['id'] . '">' . $item['title'] . '</a>';
    } else {
        $ret .= html_wikilink(':' . $item['id'], $item['title']);
    }
    return $ret;
}

function _wp_tpl_parsemenufile(&$data, $filename, $start) {
    $ret = TRUE;
    $filepath = wikiFN($filename);
    if (file_exists($filepath)) {
        $lines = file($filepath);
        $i = 0;
        $lines2 = array();
// read only lines formatted as wiki lists
        foreach ($lines as $line) {
            if (preg_match('/^\s+\*/', $line)) {
                $lines2[] = $line;
            }
            $i++;
        }
        $numlines = count($lines2);
        $oldlevel = 0;
// Array is read back to forth so pages with children can be found easier
// you do not have to go back in the array if a child entry is found		
        for ($i = $numlines - 1; $i >= 0; $i--) {
            if (!$lines2[$i]) {
                continue;
            }
            $tmparr = explode('*', $lines2[$i]);
            $level = intval(strlen($tmparr[0]) / 2);
            if ($level > 3) {
                $level = 3;
            }
// ignore lines without links			
            if (!preg_match('/\s*\[\[[^\]]+\]\]/', $tmparr[1])) {
                continue;
            }
            $tmparr[1] = str_replace(array(']', '['), '', trim($tmparr[1]));
            list($id, $title) = explode('|', $tmparr[1]);
// ignore links to non-existing pages			
            if (!file_exists(wikiFN($id))) {
                if (preg_match('#https?://#', $id)) {
                    if (!$title) {
                        $title = $id;
                    }
                } else {
                    continue;
                }
            }
            if (!$title) {
                $title = p_get_first_heading($id);
            }
            $data[$i]['id'] = $id;
            $data[$i]['ns'] = '';
            $data[$i]['perm'] = 8;
            $data[$i]['type'] = 'f';
            $data[$i]['level'] = $level;
            $data[$i]['open'] = 1;
            $data[$i]['title'] = $title;
// namespaces must be tagged correctly (type = 'd') or they will not be found by the
// html_wikilink function : means that they will marked as having subpages
// even if there is no submenu			
            if (strpos($id, ':') !== FALSE) {
                $nsarray = explode(':', $id);
                $pid = array_pop($nsarray);
                $nspace = implode(':', $nsarray);
                if ($pid == $start) {
                    $data[$i]['id'] = $nspace;
                    $data[$i]['type'] = 'd';
                } else {
                    $data[$i]['ns'] = $nspace;
                }
            }
            if ($oldlevel > $level) {
                $data[$i]['type'] = 'd';
            }
            $oldlevel = $level;
        }
    } else {
        $ret = FALSE;
    }
    ksort($data);
    return $ret;
}

# wallpaper modified version of pageinfo 

function _wp_tpl_pageinfo() {
    global $conf;
    global $lang;
    global $INFO;
    global $REV;
    global $ID;

    // return if we are not allowed to view the page
    if (!auth_quickaclcheck($ID)) {
        return;
    }

    // prepare date
    $date = dformat($INFO['lastmod']);

    // echo it
    if ($INFO['exists']) {
        echo $lang['lastmod'];
        echo ': ';
        echo $date;
        if ($_SERVER['REMOTE_USER']) {
            if ($INFO['editor']) {
                echo ' ', $lang['by'], ' ', $INFO['editor'];
            } else {
                echo ' (', $lang['external_edit'], ')';
            }
            if ($INFO['locked']) {
                echo ' &middot; ', $lang['lockedby'], ': ', $INFO['locked'];
            }
        }
        return true;
    }
    return false;
}

/* /**
 * Hierarchical breadcrumbs
 *
 * This code was suggested as replacement for the usual breadcrumbs.
 * It only makes sense with a deep site structure.
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Nigel McNie <oracle.shinoda@gmail.com>
 * @author Sean Coates <sean@caedmon.net>
 * @author <fredrik@averpil.com>
 * @todo   May behave strangely in RTL languages
 * @param string $sep Separator between entries
 * @return bool
 */

function _wp_tpl_youarehere($sep = ' » ') {
    global $conf;
    global $ID;
    global $lang;

    $lspace = $_SESSION[DOKU_COOKIE]['translationlc'];

    // check if enabled
    if (!$conf['youarehere']) {
        return false;
    }

    $parts = explode(':', $ID);
    $count = count($parts);

    echo '<span class="bchead">' . $lang['youarehere'] . ': </span>';

    // always print the startpage
    if (!$lspace) {
        tpl_pagelink(':' . $conf['start']);
    }

    // print intermediate namespace links
    $part = '';
    for ($i = 0; $i < $count - 1; $i++) {
        $part .= $parts[$i] . ':';
        $page = $part;
        if ($page == $conf['start']) {
            continue;
        } // Skip startpage
// output
        echo $sep;
        tpl_pagelink($page);
    }

    // print current page, skipping start page, skipping for namespace index
    resolve_pageid('', $page, $exists);
    if (isset($page) && $page == $part . $parts[$i]) {
        return true;
    }
    $page = $part . $parts[$i];
    if ($page == $conf['start']) {
        return true;
    }
    echo $sep;
    tpl_pagelink($page);
    return true;
}

function _fkssidebar() {
    echo '<div class="fkssidebar">';
    echo p_render("xhtml", p_get_instructions(io_readFile("data/pages/fkssidebar.txt", false)), $info);
    _fks_image_show();
    echo '</div> ';
    return 0;
}

