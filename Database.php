<?php
include 'autoload.php';
class Database {



static $connection = null;


static function init(){
    Database::runSqlCommand("CREATE TABLE IF NOT EXISTS Files (id int NOT NULL PRIMARY KEY AUTO_INCREMENT, filename Varchar(255), file Varchar(255), tags Varchar(255))");
}

static function ConntectToServer(){
    
    Database::$connection = new mysqli(Config::$server, Config::$user, Config::$password, Config::$database);
    
    Database::init();
    
        mkdir(Config::$dirName);
    
    
}

static function runSqlCommand($sql){
    if(Database::$connection == null){
        
        Database::ConntectToServer();
        
    }

    return Database::$connection->query($sql);
}

static function runPreparedCommand($sql, $file){
    if(Database::$connection == null){
       
        Database::ConntectToServer();

    
}
    
    $prepared = Database::$connection->prepare($sql);

    if(!$prepared){
        print($sql);
        print(mysqli_error(Database::$connection));
    }
    
    $prepared->bind_param('s',$uploadFile);
    $uploadFile = "". $file;
    $prepared->execute(); 
    $prepared->close();
    
}

static function fetchSQL($sql){
    
    if(Database::$connection == null){
        
        Database::ConntectToServer();
        
    }

    return Database::$connection->query($sql)->fetch_array();
}



}

?>