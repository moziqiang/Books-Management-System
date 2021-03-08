<?php
include ('mysql_connection.php');
include ('session_check.php');
?>
<!doctype html>
<html lang="CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form-group label{
            padding-left: 20px;
            padding-right: 20px;

        }
        .add_cate{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <?php
        include ('admin_header.php');
    ?>
    <h1>这是增加书籍页面</h1>

<div class="container-fluid">
    <div class="container">
        <form action="admin_add_book.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">书籍名称</span>
                </div>
                <input type="text" name="bookname" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">作者名称</span>
                </div>
                <input type="text" name="authorname" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">出版社</span>
                </div>
                <input type="text" name="chubanname" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">书籍code</span>
                </div>
                <input type="text" name="bookcode" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">简介</span>
                </div>
                <textarea class="form-control" name="bookintroduct" aria-label="With textarea"></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">价格</span>
                </div>
                <input type="text" name="bookprice" class="form-control" aria-describedby="basic-addon1">
            </div>
            <h3>选择分类</h3>
            <div class="form-group">
                <?php
                    $cate_sql = "select cate_id,cate_name from book_cate";
                    $result = mysqli_query($link_info,$cate_sql);
                foreach ($result as $res){
                    echo "<label class='checkbox-inline'>";
                    echo "<input type='checkbox' name='cate_id[]' value='$res[cate_id]'>".$res['cate_name'];
                    echo "</label>";
                }
                ?>
            </div>
            <button type="submit" class="btn btn-info" style="width: 100%">添加文章</button>
        </form>
        <div class="add_cate">
<!--           admin_add_cate.php-->
            <form action="#" method="post">
                <h5>没有想要的分类！？那就先添加一个吧！</h5>
                <input type="text" name="cate" id="cate">
                <button type="button" class="add_btn">添加分类</button>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $('.add_btn').click(function () {
        var cate = $("#cate").val();
        // console.log(cate);
        $.ajax({
            url:"admin_add_cate.php",
            type:"POST",
            data: "cate="+cate,
            dataType : 'json',
            success:function (data) {
                $('.form-group').append("<label class='checkbox-inline'>" +
                    "<input type='checkbox' value="+data.id+">"+data.name+
                    "</label>");
            }
        })
    })
</script>
</html>
