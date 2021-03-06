<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<link rel="shortcut icon" href="#" type="image/png">

    <title>系统登录</title>

    <link href="/hms_web1/Public/Static/Admin/css/style.css" rel="stylesheet">
    <link href="/hms_web1/Public/Static/Admin/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/hms_web1/Public/Static/Admin/js/html5shiv.js"></script>
    <script src="/hms_web1/Public/Static/Admin/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-body">
<div class="container">
    <form class="form-signin" method="post" action="<?php echo U('Login/login');?>">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登录</h1>
            <img src="/hms_web1/Public/Static/Admin/images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" name="username" class="form-control" placeholder="用户名" autofocus>
            <input type="password" name="password" class="form-control" placeholder="密码">
            <input type="text" name="verifycode" class="form-control" placeholder="验证码" >
            <img src="/hms_web1/Admin/Login/verify/" id="verifyImg" onclick="freshVerify('<?php echo U('Login/verify');?>')" class="img-rounded" title="刷新验证码" style="cursor:pointer">
            <input type="hidden" name="submit" value="submit">
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>
            <div class="registration">
                xxx管理系统后台
                <a class="" href="registration.html" target="_blank">
                    	访问前台
                </a>
            </div>
            <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label> -->

        </div>

        <!-- Modal -->
        <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- modal -->
    </form>
</div>
<!-- Placed js at the end of the document so the pages load faster -->
<!-- Placed js at the end of the document so the pages load faster -->
<script src="/hms_web1/Public/Static/Admin/js/jquery-1.10.2.min.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/bootstrap.min.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/modernizr.min.js"></script>
<script type="text/javascript">
function freshVerify(url){
	$('#verifyImg').attr('src', url+"?time="+ (new Date()).getTime());
}
</script>
</body>
</html>