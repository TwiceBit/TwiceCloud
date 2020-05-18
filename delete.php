<?php
include "functions.php";

deleteFile($_POST["id"]);
header("Location: /");

?>