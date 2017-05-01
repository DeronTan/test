<!DOCTYPE html>
<html lang="en">
<head>
	<title>李男的毕业设计</title>
	<base href="<?php echo site_url(); ?>">
	<!-- 使页面在跳转的时候路径的正确  -->
	<link href="./css/index.css" rel="stylesheet" type="text/css"  media="all" />	
	<!-- 就是为了引入一个css文件，css文件文件的作用就是为了是网页有样式 -->
	<meta charset="utf-8">
	<!-- meta:这是一个为utf-8的字符集 -->
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/responsiveslides.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	<!-- 主要就是是网页有交互 -->
	<script src="./js/responsiveslides.min.js"></script>
	<script>
	    // You can also use "$(window).load(function() {"
		    $(function () {
		      // Slideshow 1
		      $("#slider1").responsiveSlides({
		        maxwidth: 2500,
		        speed: 600
		      });
		});
	</script>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		ul{
			list-style: none;
		}
		#sidebar{
		    width: 370px;
		    height: 455px;
		    background: #fff;
		    float: left;
		    margin-top: 26px;
		    font-size: 18px;
		    font-family: 微软雅黑;
		}
		#sidebar{
		    margin-top: 33px;
		}
		#sidebar li{
		    width: 370px;
		    height: 60px;
		    line-height: 60px;
		    position: relative;
		    margin-bottom: 5px;
		    color: #333;
		}
		#sidebar li span{
		    position: absolute;
		    left: 163px;
		}
		.img-pos{
		    position: absolute;
		    left:120px;
		    top: 14px;
		}
		#sidebar li a{
			color: #333;
		}
		#sidebar .color{
		    color: #78e5b5;
		}
		#sidebar li.left-sidebar-active{
		    color: #78e5b5;
		}
		#content{
		    background: #fff;
		    float: left;
		    margin-top: 50px;
		    font-size: 18px;
		    font-family: 微软雅黑;
		}
		#content h3{
			margin-bottom: 20px;
		}
		#content p{
			padding: 0 50px;	
			margin-bottom: 20px;
		}
		#content p span{
			float: right;
		}
		#content li{
			display: none;
		}
		#content li:first-child{
			display: block;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="wrap">
			<!---start-logo---->
			<div class="logo">
				<a href="index.html"><img src="./images/logo.png" title="logo" /></a>
			</div>
			<!---End-logo---->
			<!---start-top-nav---->
			<div class="top-nav">
				<ul>
						<li><a href="welcome">首页</a></li>
						<li><a href="welcome/all_spot">景点游览</a></li>
						<!-- href->index.html   --welcome/index -->
						<li  class="active"><a href="welcome/personal">个人中心</a></li>
						<li><a href="welcome/comment">论坛中心</a></li>
						<?php if ($this->session->user){ ?>
							<li><a href="welcome/personal"><?php echo $this->session->user->username; ?></a></li>
						<?php }else{ ?>
						<li><a href="user/login">登陆</a></li>
						<li><a href="user/registered">注册</a></li>
						<?php }?>
					</ul>
			</div>
			<div class="clear"> </div>
			<!---End-top-nav---->
		</div>
		<!---End-header---->
	</div>
	<div style="clear: both;height: 800px;">
		<ul id="sidebar">
		    <li class="left-sidebar-active"><a class="color" href="javascript:;"><span>订单管理</span></a></li>
		    <li><a href="javascript:;"><span>个人资料</span></a></li>
		    <li><a href="javascript:;"><span>我的论坛</span></a></li>
		</ul>
		<div>
			<ul id="content">
				<li>
					<ul>
						<li>
							<h3>火车票订单</h3>
							<?php foreach ($order as $o) {?>
								<p><?php echo $o->order_start; ?>-><?php echo $o->order_end; ?><span>时间：<?php echo $o->addtime; ?>1</span></p>	
							<?php }?>
						</li>
					</ul>
					<ul>
						<li>
							<h3>酒店订单</h3>
							<?php foreach ($order_hostel as $o) {?>

								<p><?php echo $o->hostel_name; ?><span>时间：<?php echo $o->addtime; ?>1</span></p>
							<?php } ?>	
						</li>
					</ul>
				</li>
				<li>
					<div class="panel-body">
				        <form id="add-user-form" class="form-horizontal" role="form" enctype="multipart/form-data" action="user/user_add" method="post">
				        	<input type="hidden" name='id' value="<?php echo $this->session->user->user_id;?>">
				            <div class="form-group">
				                <label for="uname" class="col-lg-2 col-sm-2 control-label">用户名</label>
				                <div class="col-lg-8">
				                    <input id="uname" type="text" class="form-control" placeholder="请输入用户名" value="<?php echo $user->username; ?>" name="uname">
				                </div>
				            </div>
				            <div class="form-group">
				                <label for="password" class="col-lg-2 col-sm-2 control-label">密码</label>
				                <div class="col-lg-8">
				                    <input type="password" class="form-control" id="password" placeholder="请输入密码" value="<?php echo $user->password; ?>" name="password">
				                </div>
				            </div>
				            <div class="form-group">
				                <label for="sex" class="col-lg-2 col-sm-2 control-label">性别</label>
				                <div class="col-lg-8">
				                        <input style="" type="text" class="form-control" id="password" placeholder="请输入性别" value="<?php echo $user->sex; ?>" name="sex">
				                </div>
				            </div>
				            <div class="form-group">
				                <label for="email" class="col-lg-2 col-sm-2 control-label">邮箱</label>
				                <div class="col-lg-8">
				                    <input type="text" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="请输入邮箱" name="email">
				                </div>
				            </div>
				            <div class="form-group">
				                <label for="tel" class="col-lg-2 col-sm-2 control-label">手机号码</label>
				                <div class="col-lg-8">
				                    <input type="text" value="<?php echo $user->tel; ?>" class="form-control" id="tel" placeholder="请输入手机号码" name="tel">
				                </div>
				            </div>

				            <div class="form-group">
				                <label for="tel" class="col-lg-2 col-sm-2 control-label">头像</label>
				                <div class="col-lg-8">
				                    <div class="fileupload fileupload-new" data-provides="fileupload">
				                           <input type="file" class="default" multiple name="portrait">
				                        </div>
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="col-lg-offset-2 col-lg-10">
				                    <button type="submit" class="btn btn-primary" id="submit">提交</button>
				                </div>
				            </div>
				        </form>
				    </div>
				</li>
				<li>
					<ul>
						<!-- <h3>我的论坛</h3> -->
						<?php foreach ($comment as $c) {?>
							<li style="width: 600px;">
								<h3><?php echo $c->forum_title;?></h3>
								<p><?php echo $c->forum_content;?></p>	
								<p><?php echo $c->forum_addtime;?></p>
							</li>
						<?php }?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="footer">
			<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid">
					<h3>关于网站</h3>
					<p>本旅游网站意在弥补之前网站功能不够强大，品种单一的缺陷</p>
				</div>
				<div class="footer-grid">
					<h3>景点周边</h3>
					<ul>
						<li><a href="#">路线推荐</a></li>
						<li><a href="#">附近酒店</a></li>
						<li><a href="#">美食推荐</a></li>
						<li><a href="#">便捷交通</a></li>
					</ul>
				</div>
				<div class="footer-grid">
					<h3>便捷服务</h3>
					<ul>
						<li><a href="#">酒店预订</a></li>
						<li><a href="#">机票预订</a></li>
						<li><a href="#">车票预定</a></li>
						<!-- <li><a href="#">Donec ut lectus </a></li> -->
					</ul>
				</div>
				<div class="footer-grid footer-lastgrid">
					<h3>联系与反馈</h3>
					<div class="footer-grid-address">
						<p>电话.800-255-9999</p>
						<p><input class="message-value" type="text"  value="请留言"><a href="<?php if ($this->session->user) {
							echo 'javascript:;';
						}else{ echo 'welcome/login'; } ?>"><input class=" <?php if ($this->session->user) {
							echo 'message';
						}?>" type="submit"></a></p>
						<p>邮箱:<a class="email-link" href="javascript:;">123456789@163.com.com</a></p>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
		</div>
		<!---End-footer---->
		<div class="clear"> </div>
		<div class="copy-right">
			<p>Design by <a href="http://w3layouts.com/">linan</a></p>
		</div>
	<script src="js/jquery.js"></script>
	<script>
		$(function () {
			$('#sidebar a').on('click',function (i) {
				$('#sidebar a').removeClass('color');
				$(this).addClass('color');
				$('#content>li').hide();
				console.log($(this).parent().index())
				$('#content>li').eq($(this).parent().index()).show();
			})
			console.log($('.message'))
			$('.message').on('click',function(){
					$.get('message/add_message',{'message':$(".message-value").value},function(){
						alert('留言成功')})
			});
		})
	</script>
</body>
</html>