<?php
require_once("ftp.class.php");
define("FTP_SERVER","xxxx.xxxx.xxxx.xxxx");
define("FTP_USER","xxxx");
define("FTP_PASS","xxxx");
define("LOCAL_DIR_PATH","C:/xxxx/xxxx/");
define("SERVER_DIR_PATH","xxxx/xxxx/");

$file="test.php";

$obj=new ftp(FTP_UPLOAD_SERVER,FTP_UPLOAD_USER,FTP_UPLOAD_PASS);
$obj->local_dir_path=LOCAL_DIR_PATH;
$obj->server_dir_path=SERVER_DIR_PATH;
$obj->upload($file);
//$obj->remove($file);
//$obj->download($file);
$obj->close();
?>
