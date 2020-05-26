<?php
function redirect($page){
  header('localhost' . $_ENV['HOME_PATH'] . $page);
}
