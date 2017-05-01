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
    <style>
        .food-img:hover{
            transform: scale(4);
            transition: all 0.5s ease;margin-left: 10px
        }
    </style>
</head>

<body class="sticky-header">
<?php include "common.php" ?>
     <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            美食管理
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="clearfix">
                                        <div class="btn-group">
                                            <a href="#myModal2" data-toggle="modal"><button id="editable-sample_new" class="btn btn-primary">
                                                添加<i class="fa fa-plus"></i>
                                            </button></a>
                                        </div>
                                    </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>名称</th>
                                            <th>图片</th>
                                            <th>简介</th>
                                            <th>景点</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($datas as $data){ ?>
                                        <tr class="">
                                            <td><?php echo $data->food_name;?></td>
                                            <td><img class="food-img" src="<?php echo $data->food_img;?>" style='' width=30 height=30 alt=""></td>
                                            <td><?php echo $data->food_descri;?></td>
                                            <td><?php echo $data->spot_name;?></td>
                                            <td><a href="#myModal2" data-toggle="modal" class="updata" data-id="<?php echo $data->food_id;?>">编辑</a>|<a href="food/delect_food_by_id/<?php echo $data->food_id;?>">删除</a></td>
                                            <!--  -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            </div>
            </div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
<form action="food/add_food" method="post" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">添加美食</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">美食名称</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="name" placeholder="用户名"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">食品介绍</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="content" placeholder="简介"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">景区</label>
                        <div class="col-lg-8">
                            <select class="form-control m-bot15" id="deve" name="deve">
                                <?php foreach ($row as $r) {?>
                                <option value="<?php echo $r->spot_id; ?>"><?php echo $r->spot_name; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">图片</label>
                        <input type="file" name="portrait" ></input>
                    </div>
                    <button type="submit" class="rec-btn-reason btn btn-primary">提交</button>
                </div>

            </div>

        </div>
    </div>
</form>
</div>

<footer class="">
</footer>


</div>
</section>

<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>

<!--google map-->


<!--common scripts for all pages-->
<script src="js/message.js"></script>
<script src="jquery.js"></script>
<script>
    $(function(){
        $('.updata').on('click',function(){
            $('.modal-dialog').append('<input type="hidden" value="'+ $(this).attr('data-id')+'" name="id">')
        });
    }); 
</script>

</body>
</html>
