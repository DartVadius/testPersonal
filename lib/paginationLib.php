<?php

/**
 * paginationLib
 *
 * @author DartVadius
 */
class paginationLib {
    public static function pagination($count, $page, $limit) {
        $pages = ceil($count / $limit);
        $_SESSION['page_num'] = $pages;
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $pages) {
            $page = $pages;
        }
        $start = $page * $limit - $limit;
        
        $output = array_slice($obj, $start, $limit);
        if (!empty($output)) {
            return $output;
        } else {
            return FALSE;
        }
    }

}
