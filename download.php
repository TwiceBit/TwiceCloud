<?php

include 'functions.php';

if($_GET['id'] != null){


    $file = Config::$dirName . "/" . downloadFile($_GET['id']);
    
    header("Location: $file");

    exit;
}


?>