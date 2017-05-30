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
		.carousel-inner img{
			width: 100%;
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
					<li class="active"><a href="welcome">首页</a></li>
					<li><a href="welcome/goods">二手市场</a></li>
					<li><a href="welcome/love">表白墙</a></li>
					<li><a href="welcome/tree">黑大树洞</a></li>
					<li><a href="welcome/claim">失物招领</a></li>
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

		<div class="carousel slide" data-ride="carousel" id="slideshow" data-interval="1000" data-pause="hover" data-wrap="true">
			<ul class="carousel-indicators">
				<li data-target="#slideshow" data-slide-to="0" class="active"></li>
				<li data-target="#slideshow" data-slide-to="1"></li>
				<li data-target="#slideshow" data-slide-to="2"></li>
				<li data-target="#slideshow" data-slide-to="3"></li>
			</ul>
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/1.jpg">
					<div class="carousel-caption">
						<!-- <h2></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem erat, egestas quis luctus ut, rhoncus vitae risus. Integer venenatis libero sit amet sapien dictum, quis bibendum mi volutpat. Cras pretium quam quis magna facilisis, eget feugiat nisi lacinia.</p> -->
					</div>
				</div>
				<div class="item">
					<img src="img/2.jpg">
				</div>
				<div class="item">
					<img src="img/1.jpg">
				</div>
				<div class="item">
					<img src="img/2.jpg">
				</div>
			</div>
	
			<a href="#slideshow" class="left carousel-control" data-slide="prev" >
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a href="#slideshow" class="right carousel-control" data-slide="next" >
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>

	<div class="container">
		<h1 class="page-header">校内历史</h1>
		<p>黑龙江大学(Heilongjiang University)简称黑大(HLJU)，坐落于北国冰城哈尔滨，学校前身是1941年在延安成立的中国人民抗日军政大学第三分校俄文队。教育部、国家国防科技工业局与黑龙江省人民政府重点共建高校，国家首批“中西部高校基础能力建设工程”、“卓越法律人才教育培养计划”、“海外高层次人才引进计划(千人计划)”、“ 国家建设高水平大学公派研究生项目”入选高校，首批“世界翻译教育联盟”[1]  、“中俄新闻教育高校联盟”创始成员，全国17所国家教育体制改革试点学院所在高校之一。</p>
	</div>	
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
	<div class="container">
		<h1 class="page-header">二手市场</h1>
		<div class="row">
			<?php foreach ($goods as $g) { ?>
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="<?php echo $g->img_src; ?>" style="width:350px;height:232px;" alt="...">
				      <div class="caption">
				        <h3><?php echo $g->goods_name; ?><span style="float: right;"><small>￥<?php echo $g->price; ?></small></span></h3>
				        <p><?php echo $g->goods_detail; ?></p>
				        <p><button class="btn btn-primary goods_button"  data-toggle="modal" data-target="#goods-modal" data-id="<?php echo $g->goods_id; ?>" role="button">查看详情</button> <a href="<?php
				        if($this->session->user){
				        	echo "javascript:;";
				        }else{
				        	echo "welcome/login";
				        }
				        ?>" class="btn btn-default <?php if($this->session->user){echo "buy";}?>" data-id="<?php echo $g->goods_id; ?>" role="button">购买</a></p>
				      </div>
				    </div>
				  </div>
			<?php }?>
		</div>
	</div>
	<div class="container">
		<h1 class="page-header">黑大树洞</h1>
		<div class="row">
			<?php foreach ($tree as $t) { ?>
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="<?php echo $t->image;?>" style="width:350px;height:232px;" alt="...">
				      <div class="caption">
				        <h3><?php echo $t->username;?></h3>
				        <p><?php echo $t->tree_detail;?></p>
				        <p><span><?php echo $t->tree_time;?></span></p>
				      </div>
				    </div>
				  </div>
			<?php }?>
		</div>
	</div>
	<div class="container">
		<h1 class="page-header">表白墙</h1>
		<div class="row">
			<?php foreach ($love as $l) { ?>
			    <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				        <div class="caption">
				        <p><?php echo $l->content;?></p>
				        <p><span><?php echo $l->addtime;?></span></p>
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
	<div class="modal fade" id="goods-modal" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">商品详情</h4>
			    </div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
					<a href="<?php
				        if($this->session->user){
				        	echo "javascript:;";
				        }else{
				        	echo "welcome/login";
				        }
				        ?>" class="btn btn-default <?php if($this->session->user){echo "buy";}?>" data-dismiss="modal">购买</a>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="modal-backdrop in"></div> -->

	



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
			$('.goods_button').on('click',function () {
				$.get('welcome/get_goods',{'id':$(this).attr('data-id')},function (rs) {
					$('.modal-body div').remove()
					let _dom = '<div><img style="width: 150px;height: 100px" src="'+rs.img_src+'"><h3>'+rs.goods_name+'<span style="float: right;"><small>￥'+rs.price+'</small></span></h3><p>'+rs.goods_detail+'</p><p><samll>发布人：</samll>'+rs.username+'</p><p><small>联系电话：</small>'+rs.tel+'</p></div>'
					$('#goods-modal .modal-body').append(_dom)
					$('#goods-modal .buy').attr('data-id',rs.goods_id)
				},'json')
			})
			$('.buy').on('click',function () {
				$.get('welcome/buy',{'id':$(this).attr('data-id')},function (rs) {
					if (rs) {
						alert('购买成功')
					}
				})
			})
			$('.prev-slide').on('click', function(){
				$('#slideshow').carousel('prev');
			});
			$('.next-slide').on('click', function(){
				$('#slideshow').carousel('next');
			});

			$(document).on('keydown', function(e){
				switch (e.which){
					case 37:
						$('.prev-slide').trigger('click');
						break;
					case 39:
						$('.next-slide').trigger('click');
						break;
						
				}
			});
		});
	</script>
</body>
</html>	