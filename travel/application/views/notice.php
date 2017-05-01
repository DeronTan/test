
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <base href="<?php echo site_url(); ?>">

    <link rel="shortcut icon" href="#" type="image/png">

    <title>Profile</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/message.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sticky-header">
<?php include "common.php" ?>
<!-- left side start-->


<!-- header section end-->

<!-- page heading start-->
<!--<div class="page-heading">-->
<!--Page Tittle goes here-->
<!--</div>-->
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    <div class="message">
     <header class="title-head">公告管理</header>
        <section class="mail-list">
            <ul class="message-mune">

                <li>
                    <a href="#myModal2" data-toggle="modal">添加</a>
                </li>
            </ul>
            <hr>
            <form action="notice/del_some" method="post" id="del-some">
                <ul class="list-group ">
                    <?php
                    foreach ($blogs as $val){
                        ?>
                        <li class="list-group-item">
                                                        <span class="pull-left chk">
                                                        </span>
                            <div class="sender">
                                <a class="thumb pull-left" href="#"> <img src="<?php echo $val->notice_img; ?>"> <strong><?php echo $val->notice_name; ?></strong></a>
                            </div>

                            <div class="message-del">
                                <a class="del-btn" href="notice/del_notice/<?php echo $val->notice_id;?>" delid="<?php echo $val->notice_id;?>"> 删除 </a>
                            </div>
                            <div class="message-con">
                                <p class="content"><?php echo $val->notice_content; ?></p>
                                <p class="message-time"> <span>添加时间<?php echo $val->addtime; ?></span></p>
                            </div>
                            <input type="hidden" class="message-hide" value="<?php echo $val->notice_id; ?>">
                        </li>
                    <?php }?>
                </ul>
            </form>
            </ul>
            <div class="cancel_page">
                <ul>
                    <?php echo $this->pagination->create_links();?>
                </ul>
            </div>
        </section>
    </div>
</div>
<!--footer section start-->
<footer class="">
</footer>


</div>
</section>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
<form action="notice/add_notice" method="post" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">添加公告</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline" role="form">
                    <div class="form-group" >
                        <label class="sr-only" for="exampleInputEmail2">公告名</label>
                        <input type="text" class="form-control" style="width: 560px; margin-bottom: 10px;" id="exampleInputEmail5" name="name" placeholder="公告名"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">公告内容</label>
                        <textarea type="text" class="form-control" id="exampleInputEmail5" style="width: 560px;margin-bottom: 10px" name="content" placeholder="公告内容"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">url地址</label>
                        <input type="text" class="form-control" style="width: 560px;margin-bottom: 10px" id="exampleInputEmail5" name="url" placeholder="地址"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">图片</label>
                         <div class="col-lg-8">
                    <div class="fileupload fileupload-new" data-provides="fileupload" style="height: 10px; ">
                        <!-- <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"> -->
                            <!-- <img src="img/head-default.png" alt="" > -->
                        </div><!-- 
                        <div class="fileupload-preview fileupload-exists thumbnail"
                             style="width: 150px; height: 150px; line-height: 20px;"></div>
                        <div> -->
                           <span class="btn btn-default btn-file">
                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i>选择图片</span>
                           <!-- <span class="fileupload-exists"><i class="fa fa-undo"></i>修改</span> -->
                           <input type="file" class="default" multiple name="portrait">
                           </span>
                        </div>
                    </div>
                </div>
                    </div>
                    <button type="submit" class="rec-btn-reason btn btn-primary">提交</button>
                </div>

            </div>

        </div>
    </div>
</form>
</div>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>

<!--google map-->


<!--common scripts for all pages-->
<script src="js/message.js"></script>
<script>
</script>

</body>
</html>
