<?php
var_dump($_FILES);
require_once("../yandex-master/vendor/autoload.php");
require_once("../classes/diskHandler.php");
$diskHandler = new diskHandler($token);
$diskHandler->fileUpload($_FILES['file']);

header('location: ../index.php');
?>