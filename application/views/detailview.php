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
    <title>详细</title>

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
<!--            --><?php //echo form_open('Common/search', 'class="navbar-form navbar-right" role="search"') ?>
<!--            <div class="form-group">-->
<!--                --><?php
//                $data = array(
//                    'type' => 'text',
//                    'class' => 'form-control',
//                    'placeholder' => '请输入',
//                    'name' => 'search'
//                );
//                echo form_input($data);
//                ?>
<!--            </div>-->
<!--            --><?php
//            $data = array(
//                'type' => 'submit',
//                'class' => 'btn btn-default',
//                'name' => 'submit',
//                'value' => '搜索'
//            );
//            echo form_submit($data);
//            ?>
<!--            --><?php //echo form_close() ?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="row" style="margin-top: 100px">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <td width="35%">文档名称:</td>
                <td width="65%"><?php echo $content[0]['title'] ?></td>
            </tr>
            <tr>
                <td>所属目录:</td>
                <td><?php echo $content[0]['lanmu'] ?></td>
            </tr>
            <tr>
                <td>上传者:</td>
                <td><?php echo $content[0]['user'] ?></td>
            </tr>
            <tr>
                <td>详细描述:</td>
                <td><?php echo $content[0]['content'] ?></td>
            </tr>
            <tr>
                <td>下载:</td>
                <td><a href="<?php echo site_url('Main/download/' . $content[0]['filename']) ?>">下载</a></td>
            </tr>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('Common/xiugaimima') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改密码</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="oldpassword">原密码</label>
                    <?php
                    $data = array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'id' => 'oldpassword',
                        'placeholder' => '原密码',
                        'name' => 'oldpassword',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="newpassword">新密码</label>
                    <?php
                    $data = array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'id' => 'newpassword',
                        'placeholder' => '新密码',
                        'name' => 'newpassword',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php
            $data = array(
                'controlname' => 'Detail'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('Common/xiugaitestinfo') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改测试环境</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="oldpassword">操作系统</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => '操作系统版本',
                        'name' => 'osinfo',
                        'value'=>''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="newpassword">浏览器版本</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => '浏览器版本',
                        'name' => 'ieinfo',
                        'value'=>''
                    );
                    echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php
            $data = array(
                'controlname' => 'Deatil'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>