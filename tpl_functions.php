<?php
/**
 * Functions used by the dokuwiki-template-vyfuk
 *
 * @author Miroslav Jarý <jason@vyfuk.mff.cuni.cz>
 * @copyright 2021, Výfuk
 * @license https://www.php.net/license/3_01.txt
 *
 */

namespace vyfukTemplate;

class templateFunctions {
    static function get_title($ID) {
        $prefix = '';
        if ($ID == "start")
            return "Tady je Výfučí!";
        elseif (!page_exists($ID))
            $prefix = "Stránka nenalezena";
        else
            tpl_pagetitle();

        return $prefix . ' • Výfuk';
    }

    static function draw_content($path) {
        if (page_exists($path)) {
            tpl_include_page($path);
        } else {
            echo sprintf("<p style='color: red'>Chybějící stránka <b>%s</b>.</p>", $path);
        }
    }
}
