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
    <style>
        #myModal2 input{
            width: 500px;
            margin-bottom: 10px;
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
                            景点管理
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
                                                添加<i class="fa fa-plus"></i></a>
                                            </button>
                                        </div>
                                    </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>名称</th>
                                            <th>地址</th>
                                            <th>简介</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($datas as $data){ ?>
                                        <tr class="">
                                            <td><?php echo $data->spot_name;?></td>
                                            <td><?php echo $data->spot_address;?></td>
                                            <td><?php echo $data->spot_intro;?></td>
                                            <td><a href="#myModal2" data-toggle="modal" class="updata" data-id="<?php echo $data->spot_id;?>">编辑</a> | <a href="spot/delect_spot_by_id/<?php echo $data->spot_id;?>">删除</a></td>
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




<footer class="">
</footer>


</div>
</section>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
<form action="spot/add_spot" method="post" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">添加景点</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">景点名</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="name" placeholder="景点名"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">地址</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="address" placeholder="地址"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">简介</label>
                        <textarea type="text" style="width: 500px; margin-bottom: 10px" class="form-control" id="exampleInputEmail5" name="intro" placeholder="简介"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">景点图片</label>
                        <input type="file" name="portrait" ></input>
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
<script src="js/scripts.js"></script>

<!--google map-->


<!--common scripts for all pages-->
<script src="js/message.js"></script>
<script>
    $(function(){
        $('.updata').on('click',function(){
            $('.modal-dialog').append('<input type="hidden" value="'+ $(this).attr('data-id')+'" name="id">')
        });
        $('.look').on('click',function () {
            // $.get('spot/get_spot_content',{'spot_id':$(this).attr('data-id')},function () {

            // },'json')
        })
    }); 
</script>

</body>
</html>
