<?php
include 'functions.php';
include 'autoload.php'
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Datein</h1>
        <div class="list">

          <!--  <div class="listItem">
                
                <div class="fileName">name.pdf</div>
                <div class="filetags">wichtig, Nerfig</div>
            </div>
            <div class="listItem">
                <img src="Bilder/icons8-microsoft-excel-2019.svg" alt="">
                <div class="fileName">name2.pdf</div>
                <div class="filetags">wichtig2, Nerfig2</div>
            </div>
-->
<a href="/upload.php">Upload</a>
<table>
    
    <tr>
        <th>Dateiname</th>
        <th>Tags</th>
        
        
    </tr>

<?php


    $data = fetchAllFiles();
    foreach ($data as $file) {
        
        
    
?>

    <tr class="<?php printCSSTags($file) ?>">
        <td> <a href="/download.php?id=<?php echo $file[0]; ?>">  <span><?php printFileName($file) ?> </span> </a></td>
        <td><?php printFileTags($file) ?> <a href="edit.php?id=<?php echo $file[0]; ?>"> Bearbeiten </a> </td>
    </tr>
<?php 
    }
?>
</table>

        </div>

    </div>
</body>
</html>