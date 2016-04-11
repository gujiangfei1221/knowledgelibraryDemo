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
            <a class="navbar-brand" href="#">知识库</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">欢迎：<?php echo $_SESSION['name'] ?></a></li>
                <li><a href="<?php echo site_url('Main/index') ?>">下载文档</a></li>
                <li><a href="<?php echo site_url('Add/index') ?>">上传文档</a></li>
                <?php
                    if($_SESSION['quanxian'] == '管理员'){
                        echo '<li><a href="'.site_url('Manage/index').'">后台管理</a></li>';
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">修改密码</a></li>
                <li><a href="<?php echo site_url('Login/logout') ?>">退出</a></li>
            </ul>
            <?php echo form_open('Select/search', 'class="navbar-form navbar-right" role="search"') ?>
            <div class="form-group">
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'placeholder' => '请输入',
                    'name' => 'search'
                );
                echo form_input($data);
                ?>
            </div>
            <?php
            $data = array(
                'type'=>'submit',
                'class'=>'btn btn-default',
                'name'=>'submit',
                'value'=>'搜索'
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
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <div class="jumbotron text-center">
            <h2>下载文档或搜索问题</h2>

            <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('Main/index') ?>" role="button">下载文档</a></p>
        </div>
    </div>
    <div class="col-md-5">
        <div class="jumbotron text-center">
            <h2>上传文档或登记问题</h2>

            <p><a class="btn btn-primary btn-lg" href="<?php echo site_url('Add/index') ?>" role="button">上传文档</a></p>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>