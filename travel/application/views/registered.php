<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
        <base href="<?php echo site_url(); ?>">

    <title>Registration</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="admin/add_admin" method="post" enctype="multipart/form-data" >
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">注册</h1>
            <!-- <img src="images/login-logo.png" alt=""/> -->
        </div>


        <div class="login-wrap">
            <p>请输入你的个人信息</p>
            <input type="text" autofocus="" name="name" placeholder="用户名" class="form-control">
            <input type="password" autofocus="" name="password" placeholder="密码" class="form-control">
            <input type="text" autofocus="" name="real_name" placeholder="真实姓名" class="form-control">
            <input type="text" autofocus="" name="tel" placeholder="电话" class="form-control">
            
            <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">图片</label>
                        <input type="file" name="portrait" ></input>
                    </div>
            <!-- <p> Enter your account details below</p>
            <input type="text" autofocus="" placeholder="User Name" class="form-control">
            <input type="password" placeholder="Password" class="form-control">
            <input type="password" placeholder="Re-type Password" class="form-control">
            <label class="checkbox">
                <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
            </label> -->
            <button type="submit" class="btn btn-lg btn-login btn-block">
                <!-- <i class="fa fa-check"></i> -->注册
            </button>

            <!-- <div class="registration">
                已经注册点此
                <a href="login.html" class="">
                    登陆
                </a>
            </div> -->

        </div>

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

</body>
</html>
