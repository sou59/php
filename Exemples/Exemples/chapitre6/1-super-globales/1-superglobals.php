<?php
    echo "<pre>";
        echo "<h1>\$_SERVER</h1>";  var_dump($_SERVER);
        echo "<h1>\$_GET</h1>";     var_dump($_GET);
        echo "<h1>\$_POST</h1>";    var_dump($_POST);
        echo "<h1>\$_FILES</h1>";   var_dump($_FILES);
        echo "<h1>\$_COOKIE</h1>";  var_dump($_COOKIE);
        echo "<h1>\$_SESSION</h1>"; var_dump($_SESSION);
        echo "<h1>\$_REQUEST</h1>"; var_dump($_REQUEST);
        echo "<h1>\$_ENV</h1>";     var_dump($_ENV);
        echo "<h1>\$GLOBALS</h1>";  var_dump($GLOBALS);
    echo "</pre>";
