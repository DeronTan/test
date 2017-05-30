<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <base href="<?php echo site_url(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Document</title>
	<style type="text/css">
		body{
			height: 2000px;
			padding-top: 50px;
		}
		.navbar-inverse  input[type='text']{
			background: #313133;
			border : none;
			color: #999;
		}

		.navbar-inverse .navbar-form{
			position: relative;
		}
		.navbar-inverse button[type='submit']{
			position: absolute;
			top: 30%;
			right: 20px;
			background: none;
			border: none;
		}
		@media(min-width: 768px){
			.navbar-inverse button[type='submit']{
				top: 25%;
			}
		}
		.navbar-inverse .glyphicon{
			color: #999;
		}
		.profile{
			margin-right: 100px;
		}
		.form-group input{
			margin-bottom: 20px;
		}
		.form-group textarea{
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#response-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">
					<strong>校园生活</strong>系统
				</a>
			</div>
			<div class="collapse navbar-collapse" id="response-navbar">
				<ul class="nav navbar-nav">
					<li><a href="welcome">首页</a></li>
					<li><a href="welcome/goods">二手市场</a></li>
					<li><a href="welcome/love">表白墙</a></li>
					<li><a href="welcome/tree">黑大树洞</a></li>
					<li class="active"><a href="welcome/claim">失物招领</a></li>
					<li><a href="welcome/personal">个人中心</a></li>
				</ul>
				<div class="profile navbar-right">
					<ul class="nav navbar-nav ">
					<?php if(!$this->session->user){?>
						<li><a href="welcome/login">登录</a></li>
						<li><a href="welcome/re">注册</a></li>
						<?php }else{ ?>
						<p class="navbar-text">您好，<a href="welcome/personal" class="navbar-link"><?php echo $this->session->user->username;?></a> | <a href="welcome/loginout">退出</a></p>
						<?php }?>
					</ul>
					<!-- <p class="navbar-text">您好，<a href="" class="navbar-link">World</a></p> -->
				</div>
			</div>
		</div>
	</nav>
	<h4 class="page-header"><a <?php if($this->session->user){
echo " data-toggle='modal' data-target='#add-modal'";
}else{
	echo "href='welcome/login'";
} ?>><button class="btn btn-primary">添加失物招领</button></a></h4>
	<div class="container">
		<h1 class="page-header">失物招领</h1>
		<div class="row">
			<?php foreach ($claim as $c) { ?>
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="<?php echo $c->img; ?>" style="width:350px;height:232px;" alt="...">
			      <div class="caption">
			        <h3><?php echo $c->claim_title; ?></h3>
			        <p><?php echo $c->claim_detail; ?></p>
			        <p><button class="btn btn-primary claim_button"  data-toggle="modal" data-target="#claim-modal" data-id="<?php echo $c->claim_id; ?>" role="button">查看详情</button></p>
			      </div>
			    </div>
			  </div>
			<?php }?>
		</div>
	</div>
	<div class="modal fade" id="claim-modal" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">失物招领详情</h4>
			    </div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="add-modal" tabindex="-1">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">新增失物招领</h4>
			    </div>
				<div class="modal-body">
				<form action="welcome/add_claim"  method="post" enctype="multipart/form-data">
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
					    <div class="col-sm-10">
					        <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="请输入失物标题">
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">简介</label>
					    <div class="col-sm-10">
					        <textarea class="form-control" id="inputEmail3" name="detail" placeholder="请输入简介"></textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">上传图片</label>
					    <div class="col-sm-10">
					        <input type="file" class="form-control" id="inputEmail3" name="img_src">
					    </div>
					</div>
					<input type="submit" class="btn btn-default">

				</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(function(){
			$('.claim_button').on('click',function () {
				$.get('welcome/get_claim',{'id':$(this).attr('data-id')},function (rs) {
					$('.modal-body div').remove()
					let _dom = '<div><img style="width: 150px;height: 100px" src="'+rs.img+'"><h3>'+rs.claim_title+'</h3><p>'+rs.claim_detail+'</p><p><samll>发布人：</samll>'+rs.username+'</p><p><small>联系电话：</small>'+rs.tel+'</p></div>'
					$('#claim-modal .modal-body').append(_dom)
				},'json')
			})
		
		});
	</script>
</body>
</html>	