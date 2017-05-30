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
        #tab{
            margin-top: 20px;
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
                    <li><a href="welcome/claim">失物招领</a></li>
                    <li class="active"><a href="welcome/personal">个人中心</a></li>
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
    <div class="container" id="tab">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#claim"  data-toggle="tab">失物招领</a></li>
            <li><a href="#goods" data-toggle="tab">我的二手</a></li>
            <li><a href="#tree" data-toggle="tab">我的树洞</a></li>
            <li><a href="#love" data-toggle="tab">我的表白</a></li>
            <li><a href="#order" data-toggle="tab">我的订单</a></li>
        </ul>

            <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="claim">
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
                                <p><a href="javascript:;" data-id="<?php echo $c->claim_id; ?>" class="btn btn-primary del_claim">删除</a></p>
                              </div>
                            </div>
                          </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="goods">
                <div class="container">
                    <h1 class="page-header">我的二手</h1>
                    <div class="row">
                        <?php foreach ($goods as $g) { ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <img src="<?php echo $g->img_src; ?>" style="width:350px;height:232px;" alt="...">
                                  <div class="caption">
                                    <h3><?php echo $g->goods_name; ?><span style="float: right;"><small>￥<?php echo $g->price; ?></small></span></h3>
                                    <p><?php echo $g->goods_detail; ?></p>
                                    <p><a href="javascript:;" data-id="<?php echo $g->goods_id; ?>" class="btn btn-primary del_goods">删除</a></p>
                                  </div>
                                </div>
                              </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tree">
                <div class="container">
                    <h1 class="page-header">我的树洞</h1>
                    <div class="row">
                        <?php foreach ($tree as $t) { ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <img src="<?php echo $t->image;?>" style="width:350px;height:232px;" alt="...">
                                  <div class="caption">
                                    <h3><?php echo $t->username;?></h3>
                                    <p><?php echo $t->tree_detail;?></p>
                                    <p><span><?php echo $t->tree_time;?></span></p>
                                    <p><a href="javascript:;" data-id="<?php echo $t->tree_id; ?>" class="btn btn-primary del_tree">删除</a></p>
                                  </div>
                                </div>
                              </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="love">
                <div class="container">
                    <h1 class="page-header">我的表白</h1>
                    <div class="row">
                        <?php foreach ($love as $l) { ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                    <p><?php echo $l->content;?></p>
                                    <p><span><?php echo $l->addtime;?></span></p>
                                    <p><a href="javascript:;" data-id="<?php echo $l->love_id; ?>" class="btn btn-primary del_love">删除</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="order">
                <div class="container">
                    <h1 class="page-header">订单</h1>
                    <div class="row">
                        <?php foreach ($order as $o) { ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <img src="<?php echo $o->img_src; ?>" style="width:350px;height:232px;" alt="...">
                                  <div class="caption">
                                    <h3><?php echo $o->goods_name; ?><span style="float: right;"><small>￥<?php echo $o->price; ?></small></span></h3>
                                    <p><?php echo $o->goods_detail; ?></p>
                                    <p><a href="javascript:;" data-id="<?php echo $o->order_id; ?>" class="btn btn-primary del_order">删除</a></p>
                                  </div>
                                </div>
                              </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('.del_claim').on('click',function () {
                $.get('welcome/del_claim',{'id':$(this).attr('data-id')},function () {
                },'json')
                $(this).parents('.col-sm-6.col-md-4').remove()

            })
            $('.del_goods').on('click',function () {
                $.get('welcome/del_goods',{'id':$(this).attr('data-id')},function () {
                },'json')
                $(this).parents('.col-sm-6.col-md-4').remove()

            })
            $('.del_tree').on('click',function () {
                $.get('welcome/del_tree',{'id':$(this).attr('data-id')},function () {
                },'json')
                $(this).parents('.col-sm-6.col-md-4').remove()

            })
            $('.del_love').on('click',function () {
                $.get('welcome/del_love',{'id':$(this).attr('data-id')},function () {
                },'json')
                $(this).parents('.col-sm-6.col-md-4').remove()
            })
            $('.del_order').on('click',function () {
                $.get('welcome/del_order',{'id':$(this).attr('data-id')},function () {
                },'json')
                $(this).parents('.col-sm-6.col-md-4').remove()
            })
        })
    </script>
</body>
</html> 