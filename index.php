<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="favicon.ico"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Label,标签设计打印,条形码设计打印,条码批量在线打印,条码标签批量打印" />
    <meta name="description" content="JMW-Label·标签设计打印工具，本工具由天际科技·筑梦司网络工作室开发制作，支持快速自定义纸张大小的标签设计打印，导入Excel表格数组绑定字段名可支持批量数据打印" />
    <meta name="baidu-site-verification" content="Pr19HUbbxc" />
    <title>JMW-Label·标签设计打印</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- hiprint -->
    <link href="css/hiprint.css" rel="stylesheet">
    <link href="css/print-lock.css" rel="stylesheet">
    <link href="css/print-lock.css" media="print" rel="stylesheet">
    <script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?bd0ee8f5df756afb0e40c3e3e796e5cd";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>
	<script>
		(function(){
		    var bp = document.createElement('script');
		    var curProtocol = window.location.protocol.split(':')[0];
		    if (curProtocol === 'https') {
		        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
		    }
		    else {
		        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
		    }
		    var s = document.getElementsByTagName("script")[0];
		    s.parentNode.insertBefore(bp, s);
		})();
	</script>
  </head>

<?php 
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header ( "Content-Type: text/html;charset=utf-8" );

if (isset($_COOKIE["user"])){
    $user='<a>'.$_COOKIE["user"].'</a><li><a href="./pass.php">退出</a><li>';$dlpd=1;
}else{
    $user='<a href="./login.php" title="点击登录">游客&登录&注册</a>';
}

$id=$_POST["modid"];
$zt=$_POST["modzt"];
$str=$_POST["modt"];

if ( $id!="") {
    $filename='./user/'.$_COOKIE["user"].'.json';
    $json_string = file_get_contents($filename);
    $data = json_decode($json_string, true);
    $Count = count($data['mod']);//查询条目数
    if ($zt=="0") {//载入模板
        for ($i=0; $i < $Count; $i++) {
            $ids = $data['mod'][$i]['id'];
            if ($id==$ids) {
                $str = $data['mod'][$i]['mod'];
            }
        }
    }else{//写入模板
        for ($i=0; $i < $Count; $i++) {
            $ids = $data['mod'][$i]['id'];
            if ($id==$ids) {
                $data['mod'][$i]["id"]=$id;
	            $data['mod'][$i]["mod"]=$str;
	            $json = json_encode($data);
	            file_put_contents($filename, $json);
            }else{
            	$pdzt=1;
            }
        }
        if ($pdzt==1) {//id不存在，写入数据
            $data['mod'][$i]["id"]=$id;
            $data['mod'][$i]["mod"]=$str;
            $json = json_encode($data);
            file_put_contents($filename, $json);
        }
    }
    echo '<script> var customPrintJson = '.$str.';</script>';//设置str内容为模板配置
}else{//id为空，设置默认模板配置
    echo '<script type="text/javascript">var customPrintJson = {"panels": [{"index": 0,"height": 150,"width": 100,"paperHeader": 0,"paperFooter": 0,"paperNumberDisabled":true,"paperNumberFormat":"paperCount","printElements": ""}]}</script>';
}
?>

  <body>
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse navbar-fixed-top">
		      <div class="container-fluid">
		        <div class="navbar-header">
		          <a class="navbar-brand" href="./">JMW-Label·标签设计打印</a>
		        </div>
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
		          <ul class="nav navbar-nav">
		            <li><a title="当前版本：V:1.0.0.6 &#10;&#10; 请注意：当前版本页面参数配置已关闭，暂时无法配置 &#10;&#10; 当前版本性能： &#10; 1.支持自由拖拽设计打印； &#10; 2.支持Excel表格导入数组批量打印； &#10;3.支持自定义组件大小&颜色；&#10; 4.自定义纸张大小；&#10; 5.登录账号云端获取及保存设计模板功能 &#10;&#10; 更多功能实现中： &#10; 1.对更大纸张的框架支持兼容； &#10; 2.导出PDF文件的功能实现； &#10; 3.常用设计模板内置一键调用； &#10; 4.常用模板数组自编功能； &#10; 5.打印预览功能实现 &#10;&#10; 温馨提示：建议您使用谷歌浏览器">V:1.0.0.6</a></li>
		            <li><a title="本标签设计打印程序由：天际科技·筑梦司网络工作室开发制作 &#10;&#10; 更多建议及意见欢迎反馈给我们：wyhuangzhaoqiang@163.com &#10;&#10; 感谢以下插件&框架提供驱动支持： &#10;&#10; bootstrap3 前端框架 &#10;&#10; Hiprint 打印插件 &#10;&#10; 以及其他的一些重要插件···">关于</a></li>
		            <li><a data-toggle="modal" data-target=".bs-example-modal-sm">开发不易，如果您觉得好用，欢迎赞助我们</a></li>
		          </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a>欢迎您：</a></li>
                    <li><?php echo $user; ?></li>
                    <li><a>.</a></li>
                    <li><a href="./say/" target="_blank">吐槽反馈</a></li>
                    <li><a>.</a></li>
                  </ul>
		        </div>
		      </div>
		    </nav>
		    
		</div>
	  <div class="col-md-2" style="padding-left:3%;padding-top:66px;">
		<div class="panel panel-primary" style="height:25vh;text-align:center;">
		  <div class="panel-heading">内容控件</div>
		  <div class="panel-body">
				<div class="row">
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.text" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-text-size" aria-hidden="true"></span><br> 文本
				  	</a>
				  </div>
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.image" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-picture" aria-hidden="true"></span><br> 图片
				  	</a>
				  </div>
				  <div class="col-md-12" style="height:2vh;"></div>
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.qrcode" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span><br> 二维码
				  	</a>
				  </div>
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.barcode" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span><br> 条形码
				  	</a>
				  </div>
				</div>
		  </div>
		</div>
		<div class="panel panel-primary" style="height:25vh;text-align: center;">
		  <div class="panel-heading">图形控件</div>
		  <div class="panel-body">
				<div class="row">
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.vline" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span><br> 竖线
				  	</a>
				  </div>
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.hline" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span><br> 横线
				  	</a>
				  </div>
				  <div class="col-md-12" style="height:2vh;"></div>
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.rect" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-retweet" aria-hidden="true"></span><br> 矩形
				  	</a>
				  </div>
				  <div class="col-md-6">
				  	<a class="ep-draggable-item" tid="testModule.oval" style="font-size:0.8vw;">
				  		<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span><br> 圆形
				  	</a>
				  </div>
				</div>
		  </div>
		</div>
		<div class="panel panel-primary" style="height:30vh;text-align: center;">
		  <div class="panel-heading">数组控件</div>
		  <div class="panel-body">
				<div class="row">
				  <div class="col-md-12">
				  	<button class="btn btn-default btn-block" type="file" style="font-size:0.7vw;" onchange="importf(this)">
				  		<span class="glyphicon glyphicon-level-up" aria-hidden="true"></span><br> 导入
				  		<input type="file" onchange="importf(this)"/>
				  	</button>
				  </div>
				  <div class="col-md-12" style="height:0.3vh;"></div>
				  <div class="col-md-12">
				  	<input  class="form-control" id="printDatas" disabled="disabled"/>
				  </div>
				  <div class="col-md-12" style="height:0.5vh;"></div>
				  <div class="col-md-12">
				  	<textarea class="form-control" id="textarea" style="display:none;"></textarea>
				  	<input class="form-control" id="datas" type="hidden" disabled="disabled"/>
				  </div>
				</div>
		  </div>
		</div>
	  </div>
	  <div class="col-md-8" style="padding-top:66px;min-height:85vh;">
	  	<div class="panel panel-primary">
		  <div class="panel-heading">效果画图区
				<div class="btn-group" style="padding-left:3vw;">
                    <button type="button" id="modbut" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:none;">模板文件</button>
				  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
				    纸张 <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				  	<li class="dropdown-header">常用LABEL纸张规格：毫米</li>
				    <li><a onclick="setPaper(100,150);customHeight.value=150;customWidth.value=100;">面单纸：100*150</a></li>
				    <li><a onclick="setPaper(80,50);customHeight.value=50;customWidth.value=80;">库位纸：80*50</a></li>
				    <li><a onclick="setPaper(58,27);customHeight.value=27;customWidth.value=58;">入库纸：58*27</a></li>
				    <li role="separator" class="divider"></li>
				    <li><button type="button" class="btn btn-warning btn-sm btn-block" onclick="rotatePaper()">旋转当前纸张方向</button></li>
				    <li role="separator" class="divider"></li>
				    <li class="dropdown-header">自定义纸张(高&宽)规格：MM</li>
				    <li style="padding-top:5px"><input type="number" class="form-control" id="customHeight" placeholder="高度：MM" value="150"></li>
				    <li style="padding-top:5px"><input type="number" class="form-control" id="customWidth" placeholder="宽度：MM" value="100"></li>
				    <li style="padding-top:5px"><button type="button" class="btn btn-primary btn-sm btn-block" onclick="setPaper($('#customWidth').val(),$('#customHeight').val())">确定</button></li>
				  </ul>
				</div>
				<button type="button" class="btn btn-danger" onclick="clearTemplate()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  清空</button>
				<button type="button" class="btn btn-danger"  onclick="directPrint()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>  单张打印</button>
				<button type="button" class="btn btn-warning" id="button_print"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>  批量打印</button>
				<!--<button type="button" class="btn btn-danger"  onclick="Printpdf()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>  导出PDF</button>-->
		  </div>
		  <div class="panel-body">
		    <div id="hiprint-printTemplate" class="hiprint-printTemplate"></div>
		  </div>
		</div>
	  </div>
	  <div class="col-md-2" style="padding-top:66px;min-height:85vh;">
		<div class="panel panel-primary">
		  <div class="panel-heading" style="text-align:center;">参数配置</div>
		  <div class="panel-body">
<div class="row">
    <div class="col-sm-12">
        <div id="PrintElementOptionSetting" style="margin-top:10px;"><div class="hiprint-option-items"><div class="hiprint-option-item">
        <div class="hiprint-option-item-label">
        打印规则
        </div>
        <div class="hiprint-option-item-field">
        <select class="auto-submit">
        <option value="">默认</option>
            <option value="odd">保持奇数</option>
            <option value="even">保持偶数</option>
        </select>
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        首页页尾
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="首页页尾" class="auto-submit">
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        偶数页页尾
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="偶数页页尾" class="auto-submit">
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        奇数页页尾
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="奇数页页尾" class="auto-submit">
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        尾页页尾
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="尾页页尾" class="auto-submit">
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        左偏移
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="偏移量pt" class="auto-submit">
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        顶部偏移
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="偏移量pt" class="auto-submit">
        </div>
    </div><div class="hiprint-option-item">
        <div class="hiprint-option-item-label">
        字体
        </div>
        <div class="hiprint-option-item-field">
        <select class="auto-submit">
        <option value="">默认</option>
            <option value="SimSun">宋体</option>
            <option value="Microsoft YaHei">微软雅黑</option>
        </select>
        </div>
    </div><div class="hiprint-option-item">
        <div class="hiprint-option-item-label">
        纸张方向(仅自定义纸质有效)
        </div>
        <div class="hiprint-option-item-field">
        <select class="auto-submit">
        <option value="">默认</option>
        <option value="1">纵向</option>
        <option value="2">横向</option>
        </select>
        </div>
    </div><div class="hiprint-option-item hiprint-option-item-row">
        <div class="hiprint-option-item-label">
        页码格式
        </div>
        <div class="hiprint-option-item-field">
        <input type="text" placeholder="paperNo-paperCount" class="auto-submit">
        </div>
    </div><button class="hiprint-option-item-settingBtn hiprint-option-item-submitBtn" type="button">确定</button></div></div>
                    </div>
                </div>
		  </div>
		</div>
	  </div>
	</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">JMW-Label·标签设计打印-----模板类操作</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <p class="text-danger">我的模板(点选名称后系统自动载入)</p>
            <div id="moddiv">
                <!--
                    <button type="submit" class="btn btn-primary" onclick="modid.value='测试模板';modzt.value='0';">测试模板</button>
                -->
            </div>
            <p>*</p><p>*</p><p class="text-success">保存当前配置为模板(请注意：暂不支持删除动作，键入相同模板名称更新)</p>
            <div class="form-group">
                <label for="exampleInputEmail1">请在下方输入框键入您要命名的模板名称<span style="color:red;">(键入名称后点击确定保存，暂不支持删除，慎重)</span></label>
                <input type="text" class="form-control" id="modid" aria-describedby="helpBlock2" name="modid" required autofocus autocomplete="off">
                <input type="hidden" class="form-control" id="modzt" aria-describedby="helpBlock2" name="modzt">
                <input type="hidden" class="form-control" id="modt" aria-describedby="helpBlock2" name="modt">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">退出</button>
        <button type="submit" class="btn btn-primary" onclick="getJsonTid();modzt.value='';modt.value=textarea.value;">确定</button>
      </div></form>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document" style="text-align:center;">
    <div class="modal-content">
      <p>开发不易，一分也是爱，好人一生平安(●'◡'●)</p>
      <img src="m.jpg">
    </div>
  </div>
</div>
    <!-- jQuery (hiprint 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

    <!-- 加载 hiprint 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="plugins/jquery.minicolors.min.js"></script>
    <script src="js/hiprint.bundle.js"></script>
    <!-- polyfill.min.js解决浏览器兼容性问题v6.26.0-->
    <script src="js/polyfill.min.js"></script>
    <!-- hiprint 核心js-->
    <script src="js/hiprint.bundle.js"></script>
    <!-- 条形码生成组件-->
    <script src="plugins/JsBarcode.all.min.js"></script>
    <!-- 二维码生成组件-->
    <script src="plugins/qrcode.js"></script>
    <!-- 调用浏览器打印窗口helper类，可自行替换-->
    <script src="plugins/jquery.hiwprint.js"></script>
	<!-- EXCEL读取转JSON 组件-->
    <script src='js/xlsx.full.min.js'></script>
    <!-- message 提示框组件-->
    <script type="text/javascript" src="js/message.js"></script>

	<script src="plugins/jspdf/canvas2image.js"></script>
	<script src="plugins/jspdf/canvg.min.js"></script>
	<script src="plugins/jspdf/html2canvas.min.js"></script>
	<script src="plugins/jspdf/jspdf.min.js"></script>
	<script src="plugins/socket.io.js"></script>
	<script src="js/hiprint.config.js"></script>

    <!--配置模板文件-->
    <script src="custom_test/custom-etype-provider.js"></script>
    
	<script>//excel转json
        function importf(obj) {
            if(!obj.files) {
                return;
            }
            var f = obj.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var data = e.target.result;
                    wb = XLSX.read(data, {
                        type: 'binary'
                    });
                var printDatast = JSON.stringify( XLSX.utils.sheet_to_json(wb.Sheets[wb.SheetNames[0]]) );
                document.getElementById("printDatas").value = printDatast;
            };
                reader.readAsBinaryString(f);
        }

        function fix(data) { 
            var o = "",
                l = 0,
                w = 10240;
            for(; l < data.byteLength / w; ++l) o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w, l * w + w)));
            o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w)));
            return o;
        }
    </script>
    <script>
        var hiprintTemplate;
        $(document).ready(function () {
           
            //初始化打印插件
            hiprint.init({
                providers: [new customElementTypeProvider()]
            });

            //hiprint.PrintElementTypeManager.build('.hiprintEpContainer', 'testModule');
            //设置左侧拖拽事件
            hiprint.PrintElementTypeManager.buildByHtml($('.ep-draggable-item'));

            hiprintTemplate = new hiprint.PrintTemplate({
                template: customPrintJson,
                settingContainer: '#PrintElementOptionSetting',
                paginationContainer: '.hiprint-printPagination'
            });
            //打印设计
            hiprintTemplate.design('#hiprint-printTemplate');
        });

        //调整纸张
        var setPaper = function (paperTypeOrWidth, height) {
            hiprintTemplate.setPaper(paperTypeOrWidth, height);
        }

        //清空
        var clearTemplate = function () {
            hiprintTemplate.clear();
        }

		//旋转
        var rotatePaper = function () {
            hiprintTemplate.rotatePaper();
        }

        //直接调用浏览器的打印
        var directPrint = function () {
            getJsonTid();//先生成JSON
            hiprintTemplate.print();
        }

        //生成JSON
        var getJsonTid = function () {
            $('#textarea').html(JSON.stringify(hiprintTemplate.getJsonTid()))
        }

        //导入模板应用
        var getups = function () {
            var Datast=document.getElementById('datas').value;
			window.alert(Datast);
        }

        //批量打印
        $('#button_print').click(function () {
        	getJsonTid();//先生成JSON
            var hiprintTemplate = new hiprint.PrintTemplate({ template: JSON.parse($('#textarea').val()) });
            //var printData=[{"text":'测试1',barcode:'A001',image:'001.jpg'},{text:'测试2',barcode:'A002',image:'002.jpg'},{text:'测试3',barcode:'A003',image:'003.jpg'}];
            
            //hiprintTemplate.print(printData);
            var printData=document.getElementById('printDatas').value;

			var obj=eval(printData); 
			//alert(obj.length);

            //window.alert(printData);

            hiprintTemplate.print(obj);
        });
    </script>
  </body>
</html>
<?php 
if ($dlpd==1) {
    $divstr="";
    echo '<script>document.getElementById("modbut").style.display="inline";</script>';
    $filename='./user/'.$_COOKIE["user"].'.json';
    $json_string = file_get_contents($filename);
    $data = json_decode($json_string, true);
    $Count = count($data['mod']);//查询条目数
    for ($i=0; $i < $Count; $i++) {
        $ids = $data['mod'][$i]['id'];
        $divstr=$divstr.'<button type=\"submit\" class=\"btn btn-primary\" onclick=\"modid.value=\''.$ids.'\';modzt.value=\'0\';\">'.$ids.'</button>';
    }
    echo '<script>document.getElementById("moddiv").innerHTML="'.$divstr.'";</script>';
    echo "<script>$.message({type:'success',message:'<div style=\"color:#333;font-weight:bold;font-size:16px;\">建议您使用谷歌浏览器<br>已知问题：火狐批量打印错位，浏览器兼容问题，请更换谷歌浏览器使用；<br>温馨提示：打印时空白，请检查您是否写入字段但是没有导入数据或者导入了数据却没有使用批量打印功能哦！<br>请注意：单张打印时，请输入内容而不是字段，字段名是为了识别导入的数组的<div><span style=\"color:lightgrey;font-size:small;\">本提示15秒后自动关闭</span>',duration:15000,center:true})</script>";
}else{
    echo "<script>$.message({type:'error',message:'<div style=\"color:#333;font-weight:bold;font-size:16px;\">建议您使用谷歌浏览器<br>另外：登录账号获取更多功能哦！<br>已知问题：火狐批量打印错位，浏览器兼容问题，请更换谷歌浏览器使用；<br>温馨提示：打印时空白，请检查您是否写入字段但是没有导入数据或者导入了数据却没有使用批量打印功能哦！<br>请注意：单张打印时，请输入内容而不是字段，字段名是为了识别导入的数组的<div><span style=\"color:lightgrey;font-size:small;\">本提示15秒后自动关闭</span>',duration:15000,center:true})</script>";
}
 ?>
<script type="text/javascript">
	document.onkeydown = function() {//F12
        var e = window.event || arguments[0];
        if (e.keyCode == 123) {
            return false;
        }
    }
    document.oncontextmenu = function() {//右键
        return false;
    }
    document.onkeydown = function() {
        if ((e.ctrlKey) && (e.keyCode == 83)) { //ctrl+s
            return false;
        }
    }
    document.onkeydown = function() {
        var e = window.event || arguments[0];
        //屏蔽F12
        if(e.keyCode == 123) {
            return false;
            //屏蔽Ctrl+Shift+I
        } else if((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)) {
            return false;
            //屏蔽Shift+F10
        } else if((e.shiftKey) && (e.keyCode == 121)){
            return false;
        }
    };
</script>