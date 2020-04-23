<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文本数据传输&留言板</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="sm.min.css">
    <link rel="stylesheet" href="sm-extend.min.css">

    <style type="text/css">
    	    span{
        word-break:normal; 
        width:auto; 
        display:block; 
        white-space:pre-wrap;
        word-wrap : break-word ;
        overflow: hidden ;
    }  
    </style>
  </head>
  <body>

    <div class="page-group">
        <div class="page page-current">
			<header class="bar bar-nav">
			  <h1 class='title'>文本数据传输&留言#内容</h1>
			</header>
			<div class="content">

			  <div class="list-block">
			    <ul>
				    <form action="sj.php" method="post">
				        <div class="item-content">
				          <div class="item-inner">
				              <textarea name="sj" style="height:70vH;background:#DCDCDC;"></textarea>
				          </div>
				        </div>
				      <input type="submit" class="button button-big button-fill button-success" value="提交">
				    </form>
			    </ul>
			  </div>

	<?php
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	$file='s.json';
	if(false===file_exists($file)){
	    echo '<span>暂无信息数据内容！</span>';
	}else{
	    $json_string = file_get_contents($file);
	    $data = json_decode($json_string,true);
	    array_multisort(array_column($data,'time'),SORT_DESC,$data);
			foreach($data as $datas) {
			  echo '<div class="card"><div class="card-content"><div class="card-content"><div class="card-content-inner"><span>'.$datas[sj].'</span></div></div></div><div class="card-footer"><span></span><span>'.$datas[time].'</span></div></div>';
			}
	}
	?>

        </div>
    </div>

    <script type='text/javascript' src='zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='sm-extend.min.js' charset='utf-8'></script>

  </body>
</html>