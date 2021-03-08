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
<h1>这是书籍编辑更新页面</h1>

<div class="container-fluid">
    <div class="container">
        <?php
            $bid = $_GET['id'];
            $sql = "SELECT book_info.book_id as bid,book_name,book_author,book_chuban,book_code,book_Introduction,book_price,GROUP_CONCAT( book_cate.cate_id) AS cate_id_list FROM book_info,book_cate,book_info_cate WHERE book_info.book_id = book_info_cate.book_id AND book_cate.cate_id = book_info_cate.cate_id AND book_info.book_id = '$bid' GROUP BY book_info.book_id";
//            echo $sql;
            $res = mysqli_query($link_info,$sql);
//            var_dump($res);
            $row = mysqli_fetch_assoc($res);
            echo $row['cate_id_list'];
            echo $row['book_name'];
            // explode — 使用一个字符串分割另一个字符串，返回一个数组
            $cateid_array = explode(",",$row['cate_id_list']);

        ?>
        <form action="admin_update_book.php" method="post">
            <?php echo "<input type='text' name='bid' value='$row[bid]' style='display: none;'>"?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">书籍名称</span>
                </div>
                <?php echo "<input type='text' name='bookname' value='$row[book_name]' class='form-control' aria-describedby='basic-addon1'>"?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">作者名称</span>
                </div>
                <?php echo "<input type='text' name='authorname' value='$row[book_author]' class='form-control' aria-describedby='basic-addon1'>"?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">出版社</span>
                </div>
                <?php echo "<input t ype='text' name='chubanname' value='$row[book_chuban]' class='form-control' aria-describedby='basic-addon1'>"?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">书籍code</span>
                </div>
                <?php echo"<input type='text' name='bookcode' value='$row[book_code]' class='form-control' aria-describedby='basic-addon1'>"?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">简介</span>
                </div>
                <?php echo "<textarea class='form-control' name='bookintroduct' aria-label='With textarea'>$row[book_Introduction]</textarea>"?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">价格</span>
                </div>
                <?php echo "<input type='text' value='$row[book_price]' name='bookprice' class='form-control' aria-describedby='basic-addon1'>"?>
            </div>
            <h3>选择分类</h3>
            <div class="form-group">
                <?php
                $cate_sql = "select cate_id,cate_name from book_cate";
                $result = mysqli_query($link_info,$cate_sql);
                foreach ($result as $res){
                    echo "<label class='checkbox-inline'>";
//                    var_dump($res['cate_id']);
//                    var_dump($row['cate_id_list']);
                    if(in_array($res['cate_id'],$cateid_array)){
                        echo "<input type='checkbox' name='cate_id[]' checked='checked' value='$res[cate_id]'>".$res['cate_name'];
                    }else{
                        echo "<input type='checkbox' name='cate_id[]' value='$res[cate_id]'>".$res['cate_name'];

                    }

                    echo "</label>";
                }
                ?>
            </div>
            <button type="submit" class="btn btn-info" style="width: 100%">更新文章</button>
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
                console.log(data);
                console.log(data.id);
                // console.log(typeof data);
                $('.form-group').append("<label class='checkbox-inline'>" +
                    "<input type='checkbox' value="+data.id+">"+data.name+
                    "</label>");
            }
        })
    })
</script>
</html>
