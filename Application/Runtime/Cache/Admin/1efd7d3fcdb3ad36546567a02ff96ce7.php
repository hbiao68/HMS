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

        <!--search start-->
        <form class="searchform" action="index.html" method="post">
            <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
        </form>
        <!--search end-->

        <!--notification menu start -->
        <div class="menu-right">
            <ul class="notification-menu">
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="badge">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 8 pending task</h5>
                        <ul class="dropdown-list user-list">
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>Database update</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                            <span class="">40%</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>Dashboard done</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
                                            <span class="">90%</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Web Development</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66" role="progressbar" class="progress-bar progress-bar-info">
                                            <span class="">66% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Mobile App</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar progress-bar-danger">
                                            <span class="">33% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Issues fixed</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar">
                                            <span class="">80% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="new"><a href="">See All Pending Task</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 5 Mails </h5>
                        <ul class="dropdown-list normal-list">
                            <li class="new">
                                <a href="">
                                    <span class="thumb"><img src="/Public/Static/Admin/images/photos/user1.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">John Doe <span class="badge badge-success">new</span></span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="/Public/Static/Admin/images/photos/user2.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jonathan Smith</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="/Public/Static/Admin/images/photos/user3.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jane Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="/Public/Static/Admin/images/photos/user4.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Mark Henry</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="/Public/Static/Admin/images/photos/user5.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jim Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li class="new"><a href="">Read All Mails</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">Notifications</h5>
                        <ul class="dropdown-list normal-list">
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #1 overloaded.  </span>
                                    <em class="small">34 mins</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #3 overloaded.  </span>
                                    <em class="small">1 hrs</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #5 overloaded.  </span>
                                    <em class="small">4 hrs</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #31 overloaded.  </span>
                                    <em class="small">4 hrs</em>
                                </a>
                            </li>
                            <li class="new"><a href="">See All Notifications</a></li>
                        </ul>
                    </div>
                </li>
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
<!--file upload-->
<link rel="stylesheet" type="text/css" href="/Public/Static/Admin/css/bootstrap-fileupload.min.css" />
<!--body wrapper start-->
<div class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            	修改广告
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal adminex-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo U('Advertisement/adEdit');?>">
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">广告标题</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo ($list["name"]); ?>" id="name" name="name" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">广告位</label>
                            <div class="col-lg-10">
                                <select class="form-control m-bot15" name="l_id">
                                <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $list["l_id"]): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            	</select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="author" class="control-label col-lg-2">链接地址</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo ($list["url"]); ?>" id="url" name="url" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="author" class="control-label col-lg-2">开始显示时间</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo ($list["begin_time"]); ?>" id="startdate" name="begin_time" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="author" class="control-label col-lg-2">结束显示时间</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo ($list["end_time"]); ?>" id="enddate" name="end_time" type="text" />
                            </div>
                        </div>
                       
                        <div class="form-group last">
								<label class="control-label col-lg-2" for="legal_id_img">广告图片</label>
								<div class="col-md-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="<?php echo ($list["img"]); ?>" alt="" />
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
										<div>
											<span class="btn btn-default btn-file"> 
												<span class="fileupload-new"><i class="fa fa-paper-clip"></i>选择图片</span>
												<span class="fileupload-exists"><i class="fa fa-undo"></i>换一张</span>
												<input type="file" name="img" class="default" />
											</span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
												<i class="fa fa-trash"></i>删除
											</a>
										</div>
									</div>
								</div>
						</div>
                        <div class="form-group ">
                            <label for="author" class="control-label col-lg-2">排序</label>
                            <div class="col-lg-10">
                                <input class="form-control " value="<?php echo ($list["sort"]); ?>" id="sort" name="sort" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">是否显示</label>
                            <div class="col-lg-10">
                                <select class="form-control m-bot15" name="is_show">
                                <option value="1" <?php if(($list["is_show"]) == "1"): ?>selected="selected"<?php endif; ?>>显示</option>
                                <option value="2" <?php if(($list["is_show"]) == "2"): ?>selected="selected"<?php endif; ?>>不显示</option>
                            	</select>
                            </div>
                        </div>
						

						<div class="form-group">
                           <div class="col-lg-offset-2 col-lg-10">
                            <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>" />
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
<!--file upload-->
<script type="text/javascript" src="/Public/Static/Admin/js/bootstrap-fileupload.min.js"></script>
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="/Public/Static/Admin/js/bootstrap-datepicker/css/datepicker-custom.css" />
<link rel="stylesheet" type="text/css" href="/Public/Static/Admin/js/bootstrap-timepicker/css/timepicker.css" />
<link rel="stylesheet" type="text/css" href="/Public/Static/Admin/js/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="/Public/Static/Admin/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css" href="/Public/Static/Admin/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
<script type="text/javascript" src="/Public/Static/Admin/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/Public/Static/Admin/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/Public/Static/Admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/Public/Static/Admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/Static/Admin/js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
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




<script type="text/javascript" src="/Public/Static/Admin/js/jquery.validate.min.js"></script>
<script src="/Public/Static/Admin/js/validation-init.js"></script>


<!--icheck -->
<script src="/Public/Static/Admin/js/iCheck/jquery.icheck.js"></script>
<script src="/Public/Static/Admin/js/icheck-init.js"></script>

<!--common scripts for all pages-->
<script src="/Public/Static/Admin/js/scripts.js"></script>

</body>
</html>