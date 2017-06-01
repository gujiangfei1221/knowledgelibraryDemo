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
        <div class="col-md-6">
            <a class="btn btn-primary btn-lg" role="button" href="<?php echo site_url('Loadrunner/index'); ?>" style="margin-bottom: 8px">返回</a>
        </div>
        <div>
            <h4><strong style="color: red">后台每1分钟执行脚本，如果没有数据显示请稍等！</strong></h4>
        </div>
    </div>
    <table class="table table-striped">
        <tr>
            <th >序</th>
            <th >测试场景</th>
            <th >虚拟用户数</th>
            <th >吞吐量(bytes/second)</th>
            <th >点击率</th>
            <th >压测时长</th>
            <th >查看报告</th>
            <th >删除报告</th>
            <th >事务名称</th>
            <th >平均响应时间(s)</th>
            <th >90%响应时间(s)</th>
            <th >通过的事务数</th>
            <th >失败的事务数</th>
            <th >停止的事务数</th>
        </tr>
        <?php
        $i = 1;
        foreach ($info as $item) {
            echo "
                            <tr>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\">" . $i . "</td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\">" . $item['scenarioname'] . "</td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\">" . $item['vusers'] . "</td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\">" . $item['throughoutput'] . "</td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\">" . $item['hitpersec'] . "</td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\">" . $item['loadtime'] . "</td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\"><a href=\"".$item['fileurl']."\" target=\"_blank\">查看报告</a></td>
                            <td rowspan = ".count($item['info2'][0])." style = \"vertical-align: middle !important;\"><a href=\"".site_url('Loadrunner/delscenario/'.$item['ceshijihuaguid'].'/'.$item['uid'])."\" target=\"_blank\">删除报告</a></td>
            ";
            foreach ($item['info2'][0] as $item2) {
                    echo "
                            <td>" . $item2['transactionname'] . "</td>
                            <td>" . $item2['avgresponsetime'] . "</td>
                            <td>" . $item2['90percenttime'] . "</td>
                            <td>" . $item2['transactionpassed'] . "</td>
                            <td>" . $item2['transactionfailed'] . "</td>
                            <td>" . $item2['transactionstoped'] . "</td>
                            </tr>
            ";
            }
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