<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>长沙大旗广告有限公司</title>
    <meta name="keywords" content="长沙大旗广告有限公司" />
<meta name="description" content="长沙大旗广告有限公司成立于2005年，长期服务于快消品、房地产等多领域，是一家集品牌营销策划、创意展示设计、活动策划执行、广宣物料制作于一体的综合型广告公司。" />
    <link rel="shortcut icon" href="http://adhao.hnjyhb.com.cn/favicon.ico" type="image/x-icon" />
<script src="/Public/Static/Web/js/jquery-1.4.4.min.js"></script>

    <script src="/Public/Static/Web/js/banner_tu.js"></script>
<base target="_self" />
    <script src="/Public/Static/Web/js/slides.min.jquery.js"></script>
    <link href="/Public/Static/Web/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>


    
<script src="/Public/Static/Web/js/jquery.min.js" type="text/javascript"></script>
<div class="head_bg">
    <div class="ad"><img src="/Public/Static/Web/imgaes/img_16.png" /></div>
    <div class="head">
       <div class="logo"><img src="/Public/Static/Web/imgaes/logo.jpg" /></div>
       <div class="nav">
       <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
    </div>
</div>
<div class="clear"></div>
 <div id="container">
 		<?php if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="zy_banner"><a href="<?php echo ($vo["url"]); ?>" target="_blank"><img src="<?php echo ($vo["img"]); ?>" / ></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="main">
<div style="float: left;">
   <div class="main_l">
      <div class="title"><img src="/Public/Static/Web/imgaes/img_03.jpg" /><div>新闻</div><span><?php echo ($newCat); ?></span></div>
      <div class="wisdom" >
       	 <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="border:1px solid #CCCCCC;">
             <h3><a href="#" style="color:#052f83;"><?php echo ($vo["name"]); ?></a></h3>
             <p><?php if(empty($vo["img"])): else: ?><img src="<?php echo ($vo["img"]); ?>" /><?php endif; ?></p>
             <p><?php echo ($vo["content"]); ?></p>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>
         
         
      </div>
      
   </div>
   <div style="clear: both;"></div>
   		<div class="pages">
      	<ul class="pagination_page">
      	<?php echo ($page); ?>
      	</ul>
      </div>
   </div>
   <div class="main_r">
       <div class="service">
          <div class="about_title"><img src="/Public/Static/Web/imgaes/img_03.jpg" /><div>目录</div></div>
          <div class="directory">
              <ul>
              	<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($_GET['cid']) == $vo["id"]): ?>class="bcdqxsxg"<?php endif; ?>><a href="<?php echo U('News/index',array('cid'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </div>
       </div>
       
       
   </div>
</div>
</div>
<div class="clear"></div>
<div class="footer">
   <div class="footer_t">
   <?php if(is_array($getMenuFooter)): $i = 0; $__LIST__ = $getMenuFooter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a><span>│</span><?php endforeach; endif; else: echo "" ;endif; ?>
     <!-- <img src="/Public/Static/Web/imgaes/img_17.png" /> -->
   </div>
   <div class="footer_b">
    <?php echo ($footer_content); ?> 
	<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F85c5cb416d29180e3b57cf4a657505a6' type='text/javascript'%3E%3C/script%3E"));
</script></p>
   </div>
   <script type="text/javascript">
$(document).ready(function(){
  $(".hide").click(function(){
  $("#facebox").hide();
  });
  $(".show").click(function(){
  $("#facebox").show();
  });
});
</script>
   <div id="facebox">
    <div class="popup">
      <table>
        <tbody>
          <tr>
            <td class="tl"/><td class="b"/><td class="tr"/>
          </tr>
          <tr>
            <td class="b"/>
            <td class="body">
              <div class="content">
              </div>
              <div class="footer">
                <a href="#" class="hide close"><img src="/Public/Static/Web/imgaes/djxtp.jpg" /></a>
                <ul>
                  <li>
                    <p></p>
                    <h2>大旗案例手册</h2>
                    <a href="http://adhao.hnjyhb.com.cn/adhao.rar" target="_blank"><img src="/Public/Static/Web/imgaes/djxzan.jpg" /></a>
                  </li>
                  
                  
                </ul>
              </div>
            </td>
            <td class="b"/>
          </tr>
          <tr>
            <td class="bl"/><td class="b"/><td class="br"/>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
function closed()
{ var aaa=document.getElementById("zxkfck");
 aaa.style.display="none"}
</script>
  <div id="zxkfck" class="zxkfck">
    <div class="zxkfckt">
      <h2>QQ在线咨询</h2>
      <span title="点击关闭" onclick="closed();">x</span>
    </div>
    <div class="zxkfcktnr">
      <ul>
      	<?php if(is_array($qq)): $i = 0; $__LIST__ = $qq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a  target=blank href=tencent://message/?uin=<?php echo ($vo); ?>&Site=在线客服1&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:<?php echo ($vo); ?>:3 alt="点击这里给我发消息"> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
	<div class="zxkfckt">
      <h2><?php echo ($phone); ?></h2>
      
    </div>
  </div>
   <script type="text/javascript" src="/Public/Static/Web/js/manhuatoTop.1.0.js"></script>
<script type="text/javascript">
$(function (){
	$(window).manhuatoTop({
		showHeight : 100,//设置滚动高度时显示
		speed : 500 //返回顶部的速度以毫秒为单位
	});
});
</script>
</div>
</body>
</html>