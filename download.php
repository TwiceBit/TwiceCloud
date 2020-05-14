<?php

include 'functions.php';

if($_GET['id'] != null){


    $file = downloadFile($_GET['id']);
    
    header("Location: $file");

    exit;
}


?>