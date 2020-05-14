<?php
include 'functions.php';
include 'autoload.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $file = $_FILES['file'];
    $tags = "wichtig info";
    uploadFile($file, $tags);  
    
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

<input type="file" name="file">
<input type="submit" value="Los">

</form>


</body>
</html>