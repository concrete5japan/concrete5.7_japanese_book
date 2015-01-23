<?php defined('C5_EXECUTE') or die('Access Denied.');
    
    $content = $controller->getContent();

    $class = "class = 'button large radius'";
    $search = "<a href=";
    $replace = "<a " . $class . "href=";
    $content = str_replace($search, $replace, $content);

    print $content;
?>
