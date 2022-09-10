<?php
var_dump($_POST);
require_once("../yandex-master/vendor/autoload.php");
require_once("../classes/diskHandler.php");
$diskHandler = new diskHandler($token);
$diskHandler->fileDownload($_POST['file_path']);

header('location: ../index.php');
?>
