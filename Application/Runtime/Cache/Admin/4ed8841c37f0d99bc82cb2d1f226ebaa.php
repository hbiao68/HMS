<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>跳转提示</title>

  <link href="/hms_web1/Public/Static/Admin/css/style.css" rel="stylesheet">
  <link href="/hms_web1/Public/Static/Admin/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/hms_web1/Public/Static/Admin/js/html5shiv.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="error-page">

<section>
    <div class="container ">

        <section class="error-wrapper text-center">
            <h1><img alt="" src="/hms_web1/Public/Static/Admin/images/junp.png"></h1>
            <?php if(isset($message)) {?>
            <h4><?php echo($message); ?></h4>
            <?php }else{?>
            <h4><?php echo($error); ?></h4>
            <?php }?>
            <h4>页面自动 <a id="href" href="<?php echo($jumpUrl); ?>" style="color: #fff;">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></h4>
            <a class="back-btn" href="<?php echo($jumpUrl); ?>"> 返回</a>
        </section>

    </div>
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/hms_web1/Public/Static/Admin/js/jquery-1.10.2.min.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/bootstrap.min.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/modernizr.min.js"></script>


<!--common scripts for all pages-->
<!--<script src="/hms_web1/Public/Static/Admin/js/scripts.js"></script>-->
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>