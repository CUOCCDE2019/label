<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header ( "Content-Type: text/html;charset=utf-8" );
// 设置 cookie 过期时间为过去 1 小时
setcookie("user", "", time()-3600);
header("location:index.php");
?>