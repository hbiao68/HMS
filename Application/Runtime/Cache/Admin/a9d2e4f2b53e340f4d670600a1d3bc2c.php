<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>HMS 后台管理系统</title>

  <link href="/Public/Static/Admin/css/style.css" rel="stylesheet">
  <link href="/Public/Static/Admin/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/Public/Static/Admin/js/html5shiv.js"></script>
  <script src="/Public/Static/Admin/js/respond.min.js"></script>
  <![endif]-->
  <!-- Placed js at the end of the document so the pages load faster -->
  <script src="/Public/Static/Admin/js/jquery-1.10.2.min.js"></script>
  <script src="/Public/Static/Admin/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="/Public/Static/Admin/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/Public/Static/Admin/js/bootstrap.min.js"></script>
  <script src="/Public/Static/Admin/js/modernizr.min.js"></script>
  <script src="/Public/Static/Admin/js/jquery.nicescroll.js"></script>
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="<?php echo U('Index/index');?>"><img src="/Public/Static/Admin/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="<?php echo U('Index/index');?>"><img src="/Public/Static/Admin/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="/Public/Static/Admin/images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#"><?php echo (session('USERNAME')); ?></a></h4>
                        <span></span>
                    </div>
                </div>

                <h5 class="left-nav-title"></h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                 	<li><a href="<?php echo U('AdminUser/mySettings');?>"><i class="fa fa-cog"></i>  管理员设置</a></li>
                 
                   
                </ul>
            </div>
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i> <span>仪表盘</span></a></li>
                <?php if(is_array($this_menu)): $i = 0; $__LIST__ = $this_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="menu-list <?php if(($vo["mark"]) == $parent_mark): ?>nav-active<?php endif; ?>"><a href=""><i class="fa <?php echo ($vo["icon"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span></a>
                    <ul class="sub-menu-list">
                    	<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_child): $mod = ($i % 2 );++$i;?><li class="<?php if(($vo_child["this_url"]) == $this_url): ?>active<?php endif; ?>"><a href="<?php echo ($vo_child["url"]); ?>"> <?php echo ($vo_child["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li><a href="<?php echo U('Login/loginOut');?>"><i class="fa fa-sign-in"></i> <span>退 出</span></a></li>
            </ul>
            <!--sidebar nav end-->
        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->


        <!--notification menu start -->
        <div class="menu-right">
            <ul class="notification-menu">
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <img src="/Public/Static/Admin/images/photos/user-avatar.png" alt="" />
                        <?php echo (session('USERNAME')); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="<?php echo U('AdminUser/mySettings');?>"><i class="fa fa-cog"></i>  管理员设置</a></li>
                        <li><a href="<?php echo U('Login/loginOut');?>"><i class="fa fa-sign-out"></i> 退 出</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <ul class="breadcrumb">
             <?php if(is_array($navPath)): foreach($navPath as $key=>$path): if(($path["status"]) != "1"): ?><li> <a href="<?php echo ($path["url"]); ?>" title="<?php echo ($path["desc"]); ?>"><?php echo ($path["desc"]); ?></a></li><?php endif; ?>
                 <?php if(($path["status"]) == "1"): ?><li class="active"><?php echo ($path["desc"]); ?></li><?php endif; endforeach; endif; ?>
            </ul>
        </div>
        <!-- page heading end-->
<!--body wrapper start-->
<div class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                	添加广告位
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="<?php echo U('Advertisement/ad_locationAdd');?>">
                        <div class="form-group ">
                            <label for="title" class="control-label col-lg-2">广告位名称</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="" id="name" name="name"  type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">是否可用</label>
                            <div class="col-lg-10">
                                <select class="form-control m-bot15" name="flag">
                                <option value="1">可用</option>
                                <option value="2">不可用</option>
                            	</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            	<input type="hidden" name="submit" value="submit" />
                                <button class="btn btn-primary" type="submit">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
<!--body wrapper end-->
<script>
function ajaxSelectSort(obj){
	var url = "<?php echo U('AuthRule/ajaxSelectSort');?>";
    $.ajax({
       type:'POST',
       url:url,
       data:{'id':obj},
       success: function(response){
          response = eval("("+response+")");
          if(response.status == 1){
        	  //弹出提示信息
        	  $("#sort").val(response.sort);
          }
       }
    });
}
</script>
<!--footer section start-->
        <footer class="sticky-footer">
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>




<script type="text/javascript" src="/Public/Static/Admin/js/jquery.validate.min.js"></script>
<script src="/Public/Static/Admin/js/validation-init.js"></script>


<!--icheck -->
<script src="/Public/Static/Admin/js/iCheck/jquery.icheck.js"></script>
<script src="/Public/Static/Admin/js/icheck-init.js"></script>

<!--common scripts for all pages-->
<script src="/Public/Static/Admin/js/scripts.js"></script>

</body>
</html>