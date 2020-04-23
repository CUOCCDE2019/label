<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Label,标签设计打印,条形码设计打印,条码批量在线打印,条码标签批量打印" />
    <meta name="description" content="JMW-Label·标签设计打印工具，本工具由天际科技·筑梦司网络工作室开发制作，支持快速自定义纸张大小的标签设计打印，导入Excel表格数组绑定字段名可支持批量数据打印" />
    <meta name="baidu-site-verification" content="Pr19HUbbxc" />
    <title>JMW-Label·登录&注册</title>

	<!--响应式框架-->
	<link rel='stylesheet' href='css/bootstrap.min.css'>

	<!--主要样式-->
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
  
<div class="container">

	<div class="card-wrap">
	
		<div class="card border-0 shadow card--welcome is-show" id="welcome">
			<div class="card-body">
				<h2 class="card-title">JMW-Label·标签设计打印</h2>
				<p>欢迎进入登录&注册页面</p>
				<div class="btn-wrap"><a class="btn btn-lg btn-register js-btn" data-target="register">注册</a><a class="btn btn-lg btn-login js-btn" data-target="login">登录</a></div>
			</div>
		</div>
		
		<div class="card border-0 shadow card--register" id="register">
			<div class="card-body">
				<h2 class="card-title">有缘人，欢迎您</h2>
				<p>第二项验证问题为忘记&修改密码时使用的核对口令，请设置为您易记的任意数字或文本</p>
				<form  method="post" action="login.php">
					<div class="form-group">
						<input class="form-control" name="usernames" type="text" placeholder="账号名称" required="required" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control" name="da" type="text" placeholder="验证问题" required="required" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control" name="passwords" type="password" placeholder="账号密码" required="required" autocomplete="off">
					</div>
					<button class="btn btn-lg">注册</button>
				</form>
			</div>
			<button class="btn btn-back js-btn" data-target="welcome"><i class="fas fa-angle-left"></i></button>
		</div>
		
		<div class="card border-0 shadow card--login" id="login">
			<div class="card-body">
				<h2 class="card-title">有缘人，欢迎您</h2>
				<p>或用邮箱登录</p>
				<form method="post" action="login.php">
					<div class="form-group">
						<input class="form-control" name="username" type="text" placeholder="账号名称" required="required" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control" name="password" type="password" placeholder="账号密码" required="required" autocomplete="off">
					</div>
					<p><a title="抱歉，此功能暂不可用！">忘记密码?</a></p>
					<button class="btn btn-lg">登录</button>
				</form>
			</div>
			<button class="btn btn-back js-btn" data-target="welcome"><i class="fas fa-angle-left"></i></button>
		</div>
		
	</div>
	
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script src="js/index.js"></script>
<!-- message 提示框组件-->
<script type="text/javascript" src="js/message.js"></script>
</body>
</html>
<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header ( "Content-Type: text/html;charset=utf-8" );
if (isset($_COOKIE["user"])){
    header("location:../");
}
$username=$_POST["username"];
$password=$_POST["password"];

$usernames=$_POST["usernames"];
$passwords=$_POST["passwords"];
$da=$_POST["da"];

$filename='./user/'.$username.'.json';
$filenames='./user/'.$usernames.'.json';
if ($username!="" and $password!="") {
    if(file_exists($filename)){
        //echo "当前目录中，文件".$file."存在";
        $json_string = file_get_contents($filename);
        $data = json_decode($json_string, true);
        $passwords = $data['password'];
        if ($passwords==$password) {
            $expire=time()+60*60*1;//1小时
            setcookie("user", $username,$expire);
            header("location:./");
        }else{
            echo "<script>$.message({type:'error',message:\"您键入的密码不正确，请您检查后重试！\"})</script>";
        }
    }else{
        //echo "当前目录中，文件".$file."不存在";
        echo "<script>$.message({type:'error',message:\"您键入的账号不存在，请您检查后重试！\"})</script>";
    }
}
if ($usernames!="" and $passwords!="" and $da!="") {
    if(file_exists($filenames)){
        //echo "当前目录中，文件".$file."存在";
        echo "<script>$.message({type:'error',message:\"您键入的账号已存在！请您更换账户名重试！\"})</script>";
    }else{
        //echo "当前目录中，文件".$file."不存在";
        $data['username']=$usernames;
        $data['password']=$passwords;
        $data['da']=$da;
        $json = json_encode($data);
        file_put_contents($filenames, $json);
        echo "<script>$.message({type:'success',message:\"恭喜您！账号注册成功！即将转入登录页面！\"})</script>";
        $expire=time()+60*60*1;//1小时
        setcookie("user", $usernames,$expire);
        header("location:./");
    }
}
?>