<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<title>数据保存</title>

<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header ( "Content-Type: text/html;charset=utf-8" );
$sj=$_POST["sj"];
if (!empty($sj)) {
	$json=@file_get_contents('s.json');
	if($json){
		$data=json_decode($json,TRUE);
	}
	else{
		$data=array();
	}
	$time=date("Y/m/d H:i:s");

	$data[]=array('sj'=>$sj,'time'=>$time);
	$json=json_encode($data);
	file_put_contents('s.json',$json);
}else{
	echo "错误了，数据空！"; 
}

$url = "index.php"; 
echo "<script language='javascript'
type='text/javascript'>"; 
echo "window.location.href='$url'"; 
echo "</script>";  
 ?>
</body>
</html>
