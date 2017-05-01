
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .admin-img{
            width: 20px;
            height: 20px;
            -webkit-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }
        .admin-img:hover{
            transform: scale(6);
        }
        td{
            text-align: center;
        }
        tr th{
            text-align: center;
        }
    </style>
</head>
<body>
	<?php include "common.php" ?>
	 <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    管理员管理
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <a href="#myModal2" data-toggle="modal"><button class="btn btn-primary">
                            添加管理员 <i class="fa fa-plus"></i>
                        </button></a>
                    </div>
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>管理员名</th>
                    <th>管理员真实姓名</th>
                    <th>管理员电话</th>
                    <th>管理员头像</th>
                    <th>修改</th>
                    <th>删除</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($blogs as $admin_val) {?>
                	<tr class="">
	                    <td><?php echo $admin_val->admin_name;?></td>
                        <td><?php echo $admin_val->real_name;?></td>
	                    <td><?php echo $admin_val->telephone;?></td>
	                    <td><img src="<?php echo $admin_val->admin_img;?>" class='admin-img' alt=""></td>
	                    <td><a href="#myModal2" data-toggle="modal" class="updata" data-id="<?php echo $admin_val->admin_id;?>">修改</a></td>
	                    <td><a class="delete" href="admin/del_admin/<?php echo $admin_val->admin_id;?>">删除</a></td>

	                </tr>
               <?php  }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
</div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
<form action="admin/add_admin" method="post" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">添加/修改管理员</h4>
            </div>
            <div class="modal-body">
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">管理员名</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="name" placeholder="管理员名"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">密码</label>
                        <input type="password" class="form-control" id="exampleInputEmail5" name="password" placeholder="密码"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">管理员真实姓名</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="real_name" placeholder="管理员真实姓名"></input>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">管理员电话</label>
                        <input type="text" class="form-control" id="exampleInputEmail5" name="tel" placeholder="管理员电话"></input>
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
<script src="js/bootstrap.js"></script>
<!-- <script src="js/admin.js"></script> -->
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