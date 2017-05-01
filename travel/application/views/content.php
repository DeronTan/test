<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
	<head>
		<title>李男的毕业设计</title>
		<base href="<?php echo site_url(); ?>">
		<link href="./css/index.css" rel="stylesheet" type="text/css"  media="all" />	
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="./css/responsiveslides.css">
		<meta charset="utf-8">
		<style>
			.grid:nth-child(3n){
				float: right;
				margin-right: 0;
				margin-bottom: 50px;
			}
			.view{
				width: 100%;
				height: 500px;
/*				background: pink;
*/				position: relative;
			}
			.viewimg{
				position: absolute;
				margin-top: 100px;
				margin-left: 50px;
				background: blue;
				width: 500px;
				height: 300px;
			}
			.viewintro{
				width: 500px;
				height: 500px;
				float: right;
/*				background: blue;
*/			}
			.viewintro p{
				width: 500px;
				height: 180px;
				text-align: center;
				line-height: 180px;
				font-size: 38px;
				letter-spacing: 10px;
				color: #289cd8;
			}
			.viewcontent{
				width: 80%;
				margin: 0 auto;
/*				background: yellow;		
*/				height: 350px;	
			}
			.viewintro p1{
				letter-spacing: 3px;
				line-height: 10px;
				
			}
			.hotel{
				height: 300px;
/*				background: yellow;
*/				position: relative;
			}
			.hotelimg{
				height: 200px;
				width: 300px;
				position: absolute;
				margin-top: 45px;
				margin-left: 80px;
				background: red;
			}
			.hotel_details{
				height: 300px;
				width: 500px;
				position: absolute;
				margin-left: 500px;
/*				background: red;
*/			}
			.hotel_details p{
				height: 100px;
				line-height: 100px;
				text-align: center;
				font-size: 30px;
			}
			.hotel_details h3{
				height: 40px;
			}
			.button1{
				position: absolute;
				margin-left: 960px;
				margin-top: 250px;
			}
			.way_details p{
				font-size: 20px;
				height: 60px;
				line-height: 60px;
			}
			.food{
				height: 300px;
				position: relative;
			}
			.foodimg{
				height: 200px;
				width: 300px;
				/*position: absolute;*/
				float: left;
				margin-top: 45px;
				margin-left: 80px;
				background: red;
			}
			.food_details{
				height: 300px;
				width: 500px;
				margin-top: 30px;
				/*position: absolute;*/
				margin-left: 150px;
				float: left;
/*				background: red;
*/			}
			.food_details p{
				height: 100px;
				line-height: 100px;
				text-align: center;
				font-size: 30px;
			}
			.food_details h1,h2,h3{
				height: 40px;
				text-align: center;
				line-height: 40px;
			}
			.station{
				width: 300px;
				height: 40px;
				font-size: 30px;
				line-height: 40px;
				text-align: center;
				border-radius: 5px;
			}
			.ticket_details p{
				height: 50px;
			}
			.button2{
				width: 300px;
				height: 25px;
				line-height: 30px;
				font-size: 25px;
				text-align: center;
				border-radius: 5px;
			}
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
						<li><a href="welcome">首页</a></li>
						<li><a href="welcome/all_spot">景点游览</a></li>
						<!-- href->index.html   --welcome/index -->
						<li><a href="welcome/user">个人中心</a></li>
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
		<!--start-content -->
		<div class="content">
			<div class="wrap">
			<!--start-view -->	
				<div class="view">
					<img src="<?php echo $spot->spot_img;?>" class="viewimg">
					<div class="viewintro">
						<p><?php echo $spot->spot_name;?></p>
                        <div class="viewcontent">
                            <h4 style="font-size: 22px ;margin-bottom: 10px;">简介：</h4>
                            <h5 style="padding-left: 30px;"><?php echo $spot->spot_intro;?></h5>
                            <h4 style="font-size: 22px ;margin-bottom: 10px; margin-top: 10px">地址：</h4>
                            <h5 style="padding-left: 30px;"><?php echo $spot->spot_address;?></h5>
                        </div>
					</div>
				</div>
			<!--end-view-->
			<!-- start-hotel -->
			<div class="specials-heading">
						<h5> </h5><h3>附近酒店</h3><h5> </h5>
						<div class="clear"> </div>
			</div>
			<?php foreach ($hostel as $h) {?>
				<div class="hotel">
					<img src="<?php echo $h->hostel_img;?>" class="hotelimg">
					<div class="hotel_details">
						<p><?php echo $h->hostel_name;?></p>
						<h1>&nbsp&nbsp&nbsp&nbsp简介 ：<?php echo $h->hostel_intro;?></h1>
						<h3></h3>
						<h2>&nbsp&nbsp&nbsp&nbsp地址：<?php echo $h->hostel_address;?></h2>
					</div>
					<a href="<?php if ($this->session->user) {
							echo 'javascript:;';
						}else{ echo 'welcome/login'; } ?>" data-id='<?php echo $h->hostel_id;?>' class="button button1 <?php if ($this->session->user) {
							echo 'order-hotel';
						} ?>">预定</a>
				</div>
			<?php }?>
			<!-- end-hotel -->
			<!-- start-way -->
			<div class="way">
				<div class="specials-heading">
						<h5> </h5><h3>推荐路线</h3><h5> </h5>
						<div class="clear"></div>
				</div>
				<div class="way_details" style="margin: 20px 0;">
					<?php foreach ($path as $p) {?>
						<p style="text-align: center;"><?php echo $p->star;?>-><?php echo $p->path_content;?>-><?php echo $p->end;?></p>
					<?php }?>
				</div>
			</div>
			<!-- end-way -->
			<!-- start-food -->
			<div class="food">
				<div class="specials-heading">
						<h5> </h5><h3>周边美食</h3><h5> </h5>
						<div class="clear"></div>
				</div>
				<?php foreach ($food as $f) {?>
				<div>
					<img src="<?php echo $f->food_img;?>" class="foodimg">
					<div class="food_details">
						<p><?php echo $f->food_name;?></p>
						<h1>&nbsp&nbsp&nbsp&nbsp简介：<?php echo $f->food_descri;?></h1>
						<h3></h3>
						<!-- <h2>&nbsp&nbsp&nbsp&nbsp地址：哈尔滨市南岗区学府四道街</h2> -->
					</div>
				</div>
				<?php }?>
			</div>
			<!-- end-food -->
			<!-- start-ticket -->
			<div class="ticket">
				<div class="specials-heading">
						<h5> </h5><h3>车票预订</h3><h5> </h5>
						<div class="clear"></div>
				</div>
				<div class="ticket_details">
					<p></p>
					<input id="start_station" type="text" name="start" placeholder="请输入出发点" class="station">
					<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
					<input id="end_station" type="text" name="end" placeholder="请输入终点站" class="station">
					<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
					<a href="<?php if ($this->session->user) {
							echo 'javascript:;';
						}else{ echo 'welcome/login'; } ?>"  class="order_t button button2<?php if ($this->session->user) {
							echo 'order_t';
						} ?>">预定</a>
					<p></p>
				</div>
			</div>
			<!-- end-ticket -->
			<!-- start-views -->
			<div class="views">
				<div class="specials-heading">
						<h5> </h5><h3>热门景点</h3><h5> </h5>
						<div class="clear"></div>
				</div>
			</div>
			<div class="content-grids">
				<?php foreach ($spots as $s) {?>
					<div class="grid">
						<a href="welcome/content/<?php echo $s->spot_id; ?>"><img src="<?php echo $s->spot_img; ?>" title="image-name" /></a>
						<h3><?php echo $s->spot_name; ?></h3>
						<p><?php echo $s->spot_intro; ?></p>
						<a class="button" href="welcome/content/<?php echo $s->spot_id; ?>">查看详情</a>
					</div>
				<?php }?>
			<!-- end-views -->
		</div>
		</div>	
		<!-- end- content -->
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
		<script src="js/jquery.js"></script>
		<script>
			// var aorderHotel = document.getElementById('order-hotel');
			// aorderHotel.onclick = function () {
			// 	alert('预定成功')
			// }
			$('.order_t').on('click',function () {
					$.get('welcome/add_orders',{'start':$("#start_station").val(),'end':$('#end_station').val()},function(){
						alert('预定成功')
					})
			});
			$('.order-hotel').on('click',function () {
					$.get('welcome/add_orders',{'hostel':$("#start_station").attr('data-id')},function(rs){
						alert('预定成功')
					})
			})
			$('.message').on('click',function(){
					$.get('message/add_message',{'message':$(".message-value").value},function(){
						alert('留言成功')})
			});
		</script>
	</body>
</html>

