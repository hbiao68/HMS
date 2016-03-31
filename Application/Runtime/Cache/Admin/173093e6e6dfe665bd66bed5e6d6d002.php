<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>HMS 后台管理系统</title>

  <link href="/hms_web1/Public/Static/Admin/css/style.css" rel="stylesheet">
  <link href="/hms_web1/Public/Static/Admin/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/hms_web1/Public/Static/Admin/js/html5shiv.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/respond.min.js"></script>
  <![endif]-->
  <!-- Placed js at the end of the document so the pages load faster -->
  <script src="/hms_web1/Public/Static/Admin/js/jquery-1.10.2.min.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/bootstrap.min.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/modernizr.min.js"></script>
  <script src="/hms_web1/Public/Static/Admin/js/jquery.nicescroll.js"></script>
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="<?php echo U('Index/index');?>"><img src="/hms_web1/Public/Static/Admin/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="<?php echo U('Index/index');?>"><img src="/hms_web1/Public/Static/Admin/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="/hms_web1/Public/Static/Admin/images/photos/user-avatar.png" class="media-object">
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
                <!-- <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i> <span>仪表盘</span></a></li> -->
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
                        <img src="/hms_web1/Public/Static/Admin/images/photos/user-avatar.png" alt="" />
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
<!--search start-->
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<div class="panel-body">
				<form class="form-inline" role="form" method="get" action="<?php echo U('AuthGroup/index');?>">
					<div class="form-group">
						<label class="sr-only" for="title">title</label> 
						<input type="text" class="form-control" id="title" name="title" placeholder="用户组名称" value="<?php echo ($_GET['title']); ?>" />
					</div>
					<div class="form-group">
						<label class="sr-only" for="status">status</label> 
						<select class="form-control" name="status">
							<option value="">请选择状态</option>
                        	<option value="1" <?php if(($_GET['status']) == "1"): ?>selected="selected"<?php endif; ?>>可用</option>
                        	<option value="2" <?php if(($_GET['status']) == "2"): ?>selected="selected"<?php endif; ?>>关闭</option>
                        </select>
					</div>
					<div class="form-group" style="width:320px;">
						<label class="sr-only">Date Range</label>
							<div class="input-group input-large custom-date-range" data-date="2013-07-13" data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control dpd1" name="createtime1" id="startdate" style="background-color: #fff;" readonly value="<?php echo ($_GET['createtime1']); ?>" placeholder="创建时间">
								<span class="input-group-addon">至</span> 
								<input type="text" class="form-control dpd2" name="createtime2" id="enddate" style="background-color: #fff;" readonly value="<?php echo ($_GET['createtime2']); ?>" placeholder="创建时间">
							</div>
					</div>
					<button type="submit" class="btn btn-primary">搜索</button>
				</form>

			</div>
		</section>

	</div>
</div>
<!--search end-->
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                	用户组列表
                        <span class="tools pull-right">
                        	<a href="<?php echo U('AuthGroup/add');?>" class="fa">添加用户组</a>
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <!-- <a href="javascript:;" class="fa fa-times"></a> -->
                         </span>
            </header>
            <div class="panel-body">
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户组名称</th>
                            <th class="numeric">状态</th>
                            <th class="numeric">创建时间</th>
                            <th class="numeric">权限</th>
                            <th class="numeric">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["title"]); ?></td>
                            <td><?php echo ($vo["status"]); ?></td>
                            <td class="numeric"><?php echo (date("Y-m-d H:i:s",$vo["createtime"])); ?></td>
                            <td class="numeric"><a href="<?php echo U('AuthGroup/setRule',array('id'=>$vo['id']));?>" class="edit">设置权限</a></td>
                            <td class="numeric"><a href="<?php echo U('AuthGroup/edit',array('id'=>$vo['id']));?>" class="edit">修改</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                	<div>
                    	<ul class="pagination">
                            <?php echo ($page); ?>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
        
        </div>
        </div>
        </div>
        <!--body wrapper end-->
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="/hms_web1/Public/Static/Admin/js/bootstrap-datepicker/css/datepicker-custom.css" />
<link rel="stylesheet" type="text/css" href="/hms_web1/Public/Static/Admin/js/bootstrap-timepicker/css/timepicker.css" />
<link rel="stylesheet" type="text/css" href="/hms_web1/Public/Static/Admin/js/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="/hms_web1/Public/Static/Admin/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css" href="/hms_web1/Public/Static/Admin/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
<script type="text/javascript" src="/hms_web1/Public/Static/Admin/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/hms_web1/Public/Static/Admin/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/hms_web1/Public/Static/Admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/hms_web1/Public/Static/Admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/hms_web1/Public/Static/Admin/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script>
	
$("#startdate").datetimepicker({
	format: 'yyyy-mm-dd',
	language:  'zh-CN',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});
$("#enddate").datetimepicker({
	format: 'yyyy-mm-dd',
	language:  'zh-CN',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});

</script>

<!--footer section start-->
        <footer class="sticky-footer">
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>




<script type="text/javascript" src="/hms_web1/Public/Static/Admin/js/jquery.validate.min.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/validation-init.js"></script>


<!--icheck -->
<script src="/hms_web1/Public/Static/Admin/js/iCheck/jquery.icheck.js"></script>
<script src="/hms_web1/Public/Static/Admin/js/icheck-init.js"></script>

<!--common scripts for all pages-->
<script src="/hms_web1/Public/Static/Admin/js/scripts.js"></script>

</body>
</html>