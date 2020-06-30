<?php

class template {

    public static function getHeader($title, $isIndex = false) {
        $s_title = $title;
        $s_index = $isIndex;
        require_once(__DIR__ . '/templates/header.php');
    }

    public static function getFooter(...$ajax) {
        require_once(__DIR__ . '/templates/footer.php');
    }

    public static function getSimpleFooter(...$ajax) {
        require_once(__DIR__ . '/templates/footer-simple.php');
    }
}
