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
	</div>
<div class="main">
   <div class="main_l">
     <div class="title"><img src="/Public/Static/Web/imgaes/img_03.jpg" /><div>大旗位置</div></div>
     <div class="contact_us_zy">
        <span>欢迎您亲临大旗参观指导！</span>
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>
  <!--百度地图容器-->
  <div style="width:643px;height:412px;border:#ccc solid 1px;" id="dituContent"></div>
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.031769,28.175809);//定义一个中心点坐标
        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_PAN});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"长沙大旗广告有限公司",content:"公交站：高桥大市场南，经停线路：19路, 121路, 160路, 348路, 368路, 703路, 星沙107路",point:"113.031612|28.175825",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
     </div>
   </div>
   <div class="main_r">
       <div class="contact_us">
          <div class="about_title"><img src="/Public/Static/Web/imgaes/img_03.jpg" /><div>联系我们</div></div>
          <?php echo ($contact["content"]); ?>
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