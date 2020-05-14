<?php

require 'Database.php';
require 'autoload.php';
function fetchAllFiles() {

    if(Database::$connection == null){
        Database::ConntectToServer();
    }

    $result = Database::$connection->query("SELECT id,filename, tags from Files");
    $arrays = [];

    while($data = $result->fetch_array()){
        array_push($arrays, $data);
    }
    return $arrays;
}

function printFileTags($file){
    $wichtig = '<span class="wichtig">Wichtig</span>';
    $info = '<span class="info">Info</span>';
    $nachweis = '<span class="nachweis">Nachweis</span>';

    
    $tags = explode(' ', strtolower($file['tags']));
    
    if(in_array("wichtig", $tags)){
        echo $wichtig;
    }
    if(in_array("info", $tags)){
        echo $info;
    }
    if(in_array("nachweis",$tags)){
        echo $nachweis;
    }


}

function printFileName($file){
    echo $file[1];
}

function getFile($id){
    return Database::runSQlCommand("SELECT file from Files")[0];
}

function downloadFile($id){
    if(Database::$connection == null) Database::ConntectToServer();
    $prep = Database::$connection->prepare("SELECT file FROM Files where id = ?");
    if(!$prep) echo mysqli_error(Database::$connection);
    $prep->bind_param('i', $target);
    $target = $id;
    $prep->execute();
    $res = $prep->get_result()->fetch_array();
    $prep->close();
    return $res[0];
}

function uploadFile($formfile, $tags){
    Database::init();
    
    $uuid = "." . uniqid() . uniqid() .  uniqid();
    $path = Config::$dirName . "/" . $uuid;
    $name = $formfile['name'];
    if(mkdir($path)){
        move_uploaded_file($formfile['tmp_name'], "$path/$name");
        $sql = "INSERT INTO Files (filename, file, tags) VALUES (\"$name\", ?, \"$tags\")";
        Database::runpreparedCommand($sql, "$path/$name");
    }
    
}

function printCSSTags($file){
    $filename = $file[1];
    $fileinfo = explode('.', strtolower($filename));
    $type = end($fileinfo);
    $tabelle = array('xl', 'xlr', 'xls', 'xlcs', 'ods', 'xlsx', 'csv' );
    $doc = array('doc', 'docs', 'odt');
    $presintation = array('pptx', 'odp');

    foreach ($tabelle as $end) {
        if($type == $end){
            echo "tabelle ";
            return;
        }
    }
    foreach ($doc as $end) {
        if($type == $end){
            echo "doc ";
            return;
        }
    }
    foreach ($presintation as $end) {
        if($type == $end){
            echo "presintation ";
            return;
        }
    }
    
        if($type == "pdf"){
            echo "pdf ";
            return;
        }
    
}

?>

