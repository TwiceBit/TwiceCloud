<?php
include 'functions.php';
include 'autoload.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_FILES['file'])){

    $file = $_FILES['file'];
    $tags = "";

    if(isset($_POST["wichtig"])){
        if($_POST["wichtig"] == "on")$tags = $tags . "wichtig ";
    }
    if(isset($_POST["info"])){
        if($_POST["info"] == "on")$tags = $tags . "info ";
    }
    if(isset($_POST["nachweis"])){
        if($_POST["nachweis"] == "on")$tags = $tags . "nachweis ";
    }

    uploadFile($file, $tags);  
    
}

header("Location: /");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="#" method="post" enctype="multipart/form-data">

<p>
    <input type="file" name="file" required>
</p>
<p>
    <input type="checkbox" name="wichtig" value="on">Wichtig
    <input type="checkbox" name="info" value="on">Info
    <input type="checkbox" name="nachweis" value="on">Nachweis
</p>
<input type="submit" value="Los">

</form>


</body>
</html>