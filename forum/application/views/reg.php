<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>登录页面</title>  
    <base href="<?php echo site_url(); ?>">
    <style>
        body {  
            background-color: #444;
            background-size: 100%;  
            background-repeat: no-repeat;  
        }  
          
        #login_frame {  
            width: 400px;  
            height: 260px;  
            padding: 13px;  
          
            position: absolute;  
            left: 50%;  
            top: 50%;  
            margin-left: -200px;  
            margin-top: -200px;  
          
            background-color: rgba(240, 255, 255, 0.5);  
          
            border-radius: 10px;  
            text-align: center;  
        }  
          
        form p > * {  
            display: inline-block;  
            vertical-align: middle;  
        }  
          
        #image_logo {  
            margin-top: 22px;  
        }  
          
        .label_input {  
            font-size: 14px;  
            font-family: 宋体;  
          
            width: 65px;  
            height: 28px;  
            line-height: 28px;  
            text-align: center;  
          
            color: white;  
            background-color: #3CD8FF;  
            border-top-left-radius: 5px;  
            border-bottom-left-radius: 5px;  
        }  
          
        .text_field {  
            width: 278px;  
            height: 28px;  
            border-top-right-radius: 5px;  
            border-bottom-right-radius: 5px;  
            border: 0;  
        }  
          
        #btn_login {  
            font-size: 14px;  
            font-family: 宋体;  
          
            width: 120px;  
            height: 28px;  
            line-height: 28px;  
            text-align: center;  
          
            color: white;  
            background-color: #3BD9FF;  
            border-radius: 6px;  
            border: 0;  
          
            float: left;  
        }  
          
        #forget_pwd {  
            font-size: 12px;  
            color: white;  
            text-decoration: none;  
            position: relative;  
            float: right;  
            top: 5px;  
          
        }  
          
        #forget_pwd:hover {  
            color: blue;  
            text-decoration: underline;  
        }  
          
        #login_control {  
            padding: 0 28px;  
        }  
    </style>
</head>  
  
<body>  
<div id="login_frame">  
  
    <p id="image_logo">校园生活系统登陆</p>  
  
    <form method="post" action="welcome/add_user">  
        <p><label class="label_input">用户名</label><input type="text" placeholder="请输入用户名" name="name" id="username" class="text_field"/></p>  
        <p><label class="label_input">电话号</label><input type="number" placeholder="请输入电话号" name="tel" id="tel" class="text_field"/></p>  
        <p><label class="label_input">密码</label><input type="password" placeholder="请输入密码" name="password" id="password" class="text_field"/></p>  
        <p><label class="label_input">确认密码</label><input type="password" placeholder="请输入再次输入密码" name="password" id="password2" class="text_field"/></p> 
        <div id="login_control">  
            <input type="submit" id="btn_login" value="注册"/>  
        </div>  
    </form>  
</div>  
  <script>
      function login() {  
      
        var username = document.getElementById("username");  
        var tel = document.getElementById("tel");  
        var pass = document.getElementById("password");  
        var pass2 = document.getElementById("password2");  
        tel.onblur = function () {
            if (tel.value == "") {  
                alert("请输入手机号");  
            } else if (tel.length != 11) {  
                alert("请输入正确手机号");  
            }
        }
        pass.onblur = function () {
            if (pass.value  == "") {  
                alert("请输入密码");  
            }
        }
        username.onblur = function () {
            if (username.value  == "") {  
                alert("请输入用户名");  
            }
        }
        pass2.onblur = function () {
            if (pass2.value  != pass.value) {  
                alert("两次密码不一致");  
            }
        }
    }  
  </script>
</body>  
</html>  