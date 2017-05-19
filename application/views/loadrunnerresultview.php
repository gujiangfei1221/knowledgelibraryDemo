<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>选择</title>

    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php include('head.php'); ?>
<div class="col-md-12">
    <h1>测试结果统计</h1>
    <div class="row">
        <div class="col-md-1">

        </div>
        <?php echo form_open('Team/search2') ?>
        <div class="col-md-3">
            <input class="form-control" placeholder="请输入值" name="search2">
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                <input type="text" id="calendar3" placeholder="开始时间" class="form-control"
                       name="kaishishijian2">
            </div>

        </div>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                <input type="text" id="calendar4" placeholder="结束时间" class="form-control"
                       name="jieshushijian2">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">搜索</button>
        </div>
        <?php echo form_close() ?>
    </div>


    <table class="table table-striped">
        <tr>
            <th >序</th>
            <th >测试场景</th>
            <th >查看报告</th>
        </tr>
        <?php
        $i = 1;
        foreach ($info as $item) {
            echo "
                            <tr>
                            <td>" . $i . "</td>
                            <td>" . $item['scenarioname'] . "</td>
                            <td><a href=\"".$item['fileurl']."\">查看报告</a></td>
                            </tr>
            ";
            $i++;
        }
        ?>
    </table>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>