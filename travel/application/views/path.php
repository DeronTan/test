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
     <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            路线管理
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="clearfix">
                                        <div class="btn-group">
                                            <a data-toggle="modal" href="#myModal2"><button id="editable-sample_new" class="btn btn-primary">
                                                添加<i class="fa fa-plus"></i>
                                            </button></a>
                                        </div>
                                    </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>开始</th>
                                            <th>途径</th>
                                            <th>结束</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($datas as $data){ ?>
                                        <tr class="">
                                            <td><?php echo $data->star;?></td>
                                            <td><?php echo $data->path_content;?></td>
                                            <td><?php echo $data->end;?></td>
                                            <td><a class="updata" data-toggle="modal" href="#myModal2" data-id="<?php echo $data->path_id;?>">编辑</a>|<a href="path/delect_path_by_id/<?php echo $data->path_id;?>">删除</a></td>
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
<form action="path/save_path" method="post">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">添加路线</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">起始</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="start" placeholder="起始"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">途径/中转</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="content" placeholder="途径"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">结束</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="end" placeholder="结束"></input>
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
$(function(){
    $('updata').on('click',function(){
         $('.modal-dialog').append('<input type="hidden" value="'+ $(this).attr('data-id')+'" name="id">')
    });
});   
</script>

</body>
</html>
