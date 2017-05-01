<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url(); ?>">
	<link href="./css/index.css" rel="stylesheet" type="text/css"  media="all" />	
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="./css/responsiveslides.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ThemeBucket">
	<link rel="shortcut icon" href="#" type="image/png">
	
    <title>论坛</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/message.css">
		<style>
			.form-group img{
				width: 50px;height: 50px;padding: 10px;
			}
			.form-group p{
				color: #555;font-size: 16px
			}
			.form-group{
				width: 100%;
			}
			.form-group>div:first-child{
				width: 80px; float: left;
			}
			.form-group>div:last-child{
				padding: 20px
			}
		</style>
	<style>
		.user{
			width: 50px;
			float: left;
		}
		.forum{
			border: 1px solid #fd8381;
			border-bottom: none;
		}
		.forum:last-child{
			border-bottom: 1px solid #fd8381;
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
						<li ><a href="welcome">首页</a></li>
						<li><a href="welcome/all_spot">景点游览</a></li>
						<!-- href->index.html   --welcome/index -->
						<li><a href="welcome/personal">个人中心</a></li>
						<li class="active"><a href="welcome/comment">论坛中心</a></li>
						<?php 
						if ($this->session->user){ 
							// echo '<li><a href="welcome/personal"><?php echo $this->session->user->username; ?></a></li>';
						}else{ 
						echo '<li><a href="user/login">登陆</a></li>
						<li><a href="user/registered">注册</a></li>';
						 }?>
					</ul>
				</div>
				<div class="clear"> </div>
				<!---End-top-nav---->
			</div>
			<!---End-header---->
		</div>
		<!--start-content -->
		<div class="content">
			<div class="wrap">
				<div class="specials-heading" style="padding-top: 50px;">
					<h5> </h5><h3 >论坛</h3><h5> </h5>
					<div class="clear"> </div>
				</div>
				<div style="text-align: right;padding-right: 100px">
					<a <?php if ($this->session->user) {
						echo 'href="#myModal"';echo 'data-toggle="modal"';
					}else{ echo ' href="javascript:;"'; } ?>><button class="new-fornum"  style="margin-top: 20px; margin-bottom: 30px; width: 150px;background: #fff;height: 50px; border: 1px #f48524 solid;border-radius: 5px">创建论坛</button></a>
				</div>
				<?php foreach ($forum as $f) {?>
					<div>
							<div class="forum">
								<div class="user" style="width: 230px;height: 230px;padding-top: 50px;padding-left: 20px; margin-right: 50px;">
									<img style="width: 200px ;height: 200px;padding: 15px" src="<?php echo $f->portrait;?>" alt="头像">
									<p style="margin-bottom: 10px;text-align: center;"><?php echo $f->username;?></p >
								</div>
								<div style="margin-left: 100px; padding: 50px 80px 20px 0;">
								<h1 style="font-size: 26px ;text-align: center;margin-bottom: 50px;"><?php echo $f->forum_title;?></h1>
								<p style="font-size: 18px ;color:#050701;text-align: center; margin-bottom: 20px;"><?php echo $f->forum_content;?></p>
								<p style="font-size: 14px ;color:#888;text-align: right; padding-right: 50px;"><span>时间:<?php echo $f->forum_addtime;?></span></p>
								<a href="#myModal2"  data-toggle="modal"><button class="com" data-id="<?php echo $f->forum_id;?>" style=" width: 100px;margin-top: 20px;margin-left: 300px; background: #fff;height: 40px; border: 1px #f48524 solid;border-radius: 5px">详情</button></a>
								</div>
							</div>
					</div>
				<?php }?>
			</div>
		</div>
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">论坛详情</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline" role="form">
                	<div id="comment"></div>
                   
                    
                    <form action="welcome/add_comment" method="post">
	                    <div class="form-group">
	                        <label class="" for="exampleInputEmail2">发表评论</label>
	                        <input type="text" class="form-control" id="exampleInputEmail5" name="content" placeholder="内容"></input>
	                    </div>
	                    <a href="<?php if ($this->session->user) {
	                    	echo 'javascript';
	                    }else{echo 'welcome/login';}?>" class="rec-btn-reason btn btn-primary">提交</a>
                    </form>
                </div>

            </div>

        </div>
    </div>
</form>
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
					<p>有任何问题请拨打客服电话</p>
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
	</body>
	<script src="./js/jquery.js"></script>
	<script>
		$(function(){
			console.log($('.message'))
			$('.message').on('click',function(){
					$.get('message/add_message',{'message':$(".message-value").value},function(){
						alert('留言成功')})
			});
			$('.com').on('click',function () {
				console.log($(this).attr('data-id'))
				$.get('forum/comment',{'id':$(this).attr('data-id')},function (rs) {
					console.log(rs)
					for(var i=0;i<rs.length;i++){
					var _dr = '<div  class="form-group" style="width: 100%;"><div style="width: 80px; float: left;"><img style="width: 50px;height: 50px;padding: 10px;" src="'+rs[i].portrait+'" alt=""><p style="color: #555;font-size: 16px">'+rs[i].username+'</p></div><div style="padding: 20px">'+rs[i].comment_content+'</div></div>'
					$("#comment").append(_dr)
					}
				},'json')
			});
		});
	</script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>
<script src="js/scripts.js"></script>
<!--google map-->


<!--common scripts for all pages-->
<script src="js/message.js"></script>
</body>
</html>