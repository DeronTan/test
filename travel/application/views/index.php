
<!DOCTYPE HTML>
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
				.grid:nth-child(3n){
					float: right;
					margin-right: 0;
				}
				.special-grid:nth-child(3n){
					float: right;
					margin-right: 0;
				}
				.special-grid img{
					width: 388px;
					height: 158px;
				}
			</style>
	</head>
	<body>
		<!---start-wrap---->
			<!---start-header---->
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
						<li class="active"><a href="welcome">首页</a></li>
						<li><a href="welcome/all_spot">景点游览</a></li>
						<!-- href->index.html   --welcome/index -->
						<li><a href="welcome/personal">个人中心</a></li>
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
		<!--start-image-slider---->
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      	<?php foreach ($notice as $n) {?>
						      	<li>
						      		<img height="400px" src="<?php echo $n->notice_img;?>" alt="">
						      		<div class="slider-info">
							      		<p><?php echo $n->notice_name;?></p>
							      		<span><?php echo $n->notice_content;?></span>
							      		<!-- <a href="#">ReadMore</a> -->
							      	</div>
						      	</li>
					      	<?php }?>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
			<!--End-image-slider---->
		<!---End-wrap---->
		<div class="clear"> </div>
		<!---start-content---->
		<div class="content">
			<div class="wrap">
			<div class="content-grids">
				<?php foreach ($spot as $s) {?>
					<div class="grid">
						<a href="welcome/content/<?php echo $s->spot_id; ?>"><img src="<?php echo $s->spot_img; ?>" title="image-name" /></a>
						<h3><?php echo $s->spot_name; ?></h3>
						<p><?php echo $s->spot_intro; ?></p>
						<a class="button" href="welcome/content/<?php echo $s->spot_id; ?>">查看详情</a>
					</div>
				<?php }?>
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<div class="specials">
					<div class="specials-heading">
						<h5> </h5><h3>推荐酒店</h3><h5> </h5>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
					<div class="specials-grids">
					<?php foreach ($hostel as $h) {?>
						<div class="special-grid">
							<img src="<?php echo $h->hostel_img; ?>" title="image-name" />
							<a href="#"><?php echo $h->hostel_name; ?></a>
							<p><?php echo $h->hostel_intro;?></p>
						</div>
					<?php }?>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
			</div>
			<div class="specials">
					<div class="specials-heading">
						<h5> </h5><h3>热点美食</h3><h5> </h5>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
					<div class="specials-grids">
						<?php foreach ($food as $f) {?>
							<div class="special-grid">
								<img src="<?php echo $f->food_img; ?>" title="image-name" />
								<a href="#"><?php echo $f->food_name; ?></a>
								<p><?php echo $f->food_descri; ?></p>
							</div>
						<?php }?>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
			</div>
			</div>	
			<div class="clear"> </div>
			<div class="testmonials">
				<div class="wrap">
				<div class="specials-heading">
						<h5> </h5><h3>最火论坛：</h3><h5> </h5>
						<div class="clear"> </div>
					</div>
					<div class="testmonial-grid">
						<h3><?php echo $forum->forum_title;?></h3>
						<p><?php echo $forum->forum_content;?></p>
						<a href="welcome/forum_content/<?php echo $forum->forum_id;?>"> 详情</a>
					</div>
				</div>
			</div>
		</div>
		<!---End-content---->
		<div class="clear"> </div>
		<!---start-footer---->
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
	</body>
	<script src="./js/jquery.js"></script>
	<script>
		$(function(){
			console.log($('.message'))
			$('.message').on('click',function(){
					$.get('message/add_message',{'message':$(".message-value").value},function(){
						alert('留言成功')})
			});
		});
	</script>
</html>

