<?php

include "functions.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $tags = "";
    $name = $_POST["filename"];
    $id = $_POST["id"];
    if(isset($_POST["wichtig"])){
        if($_POST["wichtig"] == "on")$tags = $tags . "wichtig ";
    }
    if(isset($_POST["info"])){
        if($_POST["info"] == "on")$tags = $tags . "info ";
    }
    if(isset($_POST["nachweis"])){
        if($_POST["nachweis"] == "on")$tags = $tags . "nachweis ";
    }
    
    updateFileById($id, $name, $tags);
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
    
<form action="#" method="post" id="editform">

    <p><input type="text" name="filename" value="<?php echo getFilebyId($_GET['id'])["filename"] ?>"></p>
    
    <p>
        <input type="checkbox" name="wichtig" value="on">Wichtig
        <input type="checkbox" name="info" value="on">Info
        <input type="checkbox" name="nachweis" value="on">Nachweis
    </p>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" value="Bearbeiten">

</form>

<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" value="L&ouml;schen">
</form>

</body>
</html>