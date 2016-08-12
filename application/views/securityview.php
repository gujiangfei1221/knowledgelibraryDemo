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
    <title>下载文档</title>

    <!-- Bootstrap -->
    <!--<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?= $this->config->item('base_url'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?= $this->config->item('base_url'); ?>/js/jquery.js"></script>
    <script src="<?= $this->config->item('base_url'); ?>/js/bootstrap-treeview.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('Select/index') ?>">知识库</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('Select/index') ?>">欢迎：<?php echo $_SESSION['name'] ?></a></li>
                <li class="dropdown" <?php if ($_SESSION['duiwai'] == 'yes') {
                    echo "style='display:none'";
                } ?>><a class="dropdown-toggle" data-toggle="dropdown" href="#">下载文档和上传文档<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Main/index/1') ?>">下载文档</a></li>
                        <li><a href="<?php echo site_url('Add/index') ?>">上传文档</a></li>
                    </ul>
                </li>
                <li class="dropdown" <?php if ($_SESSION['duiwai'] == 'yes') {
                    echo "style='display:none'";
                } ?>><a class="dropdown-toggle" data-toggle="dropdown" href="#">其他菜单<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Urltool/index') ?>">编解码小工具</a></li>
                        <li><a href="<?php echo site_url('Testinfo/index') ?>">测试环境查看</a></li>
                    </ul>
                </li>
                <li <?php if ($_SESSION['team'] != 'yes') {
                    echo "style='display:none'";
                } ?>><a href="<?php echo site_url('Team/index') ?>">技术研究小组</a></li>
                <li><a href="<?php echo site_url('Security/index') ?>">安全测试结果下载</a></li>
                <?php
                if ($_SESSION['quanxian'] == '管理员') {
                    echo '<li><a href="' . site_url('Manage/index') . '">后台管理</a></li>';
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"
                            style="margin-top: 8px">
                        修改密码
                    </button>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2"
                            style="margin-top: 8px">
                        修改测试环境
                    </button>
                </li>
                <li><a href="<?php echo site_url('Common/logout') ?>">退出</a></li>
            </ul>
            <?php echo form_open('Security/index/1', 'class="navbar-form navbar-right" role="search"') ?>
            <div class="form-group">
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'placeholder' => '请输入标题进行搜索',
                    'name' => 'search'
                );
                echo form_input($data);
                ?>
            </div>
            <?php
            $data = array(
                'type' => 'submit',
                'class' => 'btn btn-default',
                'name' => 'submit',
                'value' => '搜索'
            );
            echo form_submit($data);
            ?>
            <?php echo form_close() ?>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="row">
    <div class="col-md-3">
        <div id="treeview6" class="treeview">
        </div>
    </div>
    <div class="col-md-9">
        <table class="table table-striped table-hover text-center">
            <tr>
                <td>序号</td>
                <td>标题</td>
                <td>所属栏目</td>
                <td>上传者</td>
                <td>下载</td>
                <td>删除</td>
            </tr>
            <?php
            $i = 1;
            foreach ($content as $row) {
                if ($_SESSION['name'] != $row['user']) {
                    echo "<tr>
                        <td>" . $i . "</td>
                        <td class=\"text-left\"><a href=\"" . site_url('Detail/index/' . $row['uid']) . "\">" . $row['title'] . "</a></td>
                        <td>" . $row['lanmupath'] . "</td>
                        <td>" . $row['user'] . "</td>
                        <td><a href=\"" . site_url('Security/download/' . $row['filename']) . "\">下载</a></td>
                        <td style='display:none;'><a href=\"" . site_url('Security/deletecontent/' . $row['title']) . "\"> 删除</a ></td >
            </tr>";
                } else {
                    echo "<tr>
                        <td>" . $i . "</td>
                        <td class=\"text-left\"><a href=\"" . site_url('Detail/index/' . $row['uid']) . "\" >" . $row['title'] . "</a></td>
                        <td>" . $row['lanmupath'] . "</td>
                        <td>" . $row['user'] . "</td>
                        <td><a href=\"" . site_url('Security/download/' . $row['filename']) . "\">下载</a></td>
                        <td><a href=\"" . site_url('Security/deletecontent/' . $row['uid']) . "\"> 删除</a ></td >
            </tr>";
                }
                $i++;
            }
            ?>
        </table>
        <nav class="text-center" style="<?php if($value != null && $value != ''){echo 'display:none';} ?>">
            <ul class="pagination">
                <li>
                    <a href="<?php echo site_url('Security/index/1/' . $lanmu2); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php foreach ($page as $row): ?>
                    <li><a href="<?php echo site_url('Security/index/' . $row . '/' . $lanmu2); ?> " <?php if($p == $row){echo "style=\"color: red\"";} ?>><?php echo($row); ?></a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="<?php
                    if (count($page) == 0) {
                        echo site_url('Security/index/1/' . $lanmu2);
                    } else {
                        echo site_url('Security/index/' . count($page) . '/' . $lanmu2);
                    }

                    ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        var defaultData =
            <?php echo $lanmu ?>
            ;

        $('#treeview6').treeview({
            color: "#428bca",
            expandIcon: "glyphicon glyphicon-chevron-up",
            collapseIcon: "glyphicon glyphicon-chevron-down",
            nodeIcon: "glyphicon glyphicon-folder-close",
            enableLinks: true,
            showCheckbox: false,
            levels: 2,
            showTags: true,
            data: defaultData
        });

    });
</script>
</body>

</html>

