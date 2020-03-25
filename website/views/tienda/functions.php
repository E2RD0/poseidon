<?php

class template {

    public static function getHeader($title, $isIndex = false) {
        $s_title = $title;
        $s_index = $isIndex;
        require_once('templates/header.php');
    }

    public static function getFooter() {
        require_once('templates/footer.php');
    }

    public static function getSimpleFooter() {
        require_once('templates/footer-simple.php');
    }
}