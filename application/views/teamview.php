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
    <script src="//cdn.bootcss.com/echarts/3.2.2/echarts.min.js"></script>
    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= $this->config->item('base_url'); ?>/css/dashboard.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
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
                <li><a href="<?php echo site_url('Main/index/1') ?>">下载文档</a></li>
                <li><a href="<?php echo site_url('Add/index') ?>">上传文档</a></li>
                <li><a href="<?php echo site_url('Urltool/index') ?>">编解码小工具</a></li>
                <li><a href="<?php echo site_url('Testinfo/index') ?>">测试环境查看</a></li>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#home" data-toggle="tab">总览</a></li>
                <li><a href="#home2" data-toggle="tab">测试项目统计</a></li>
                <li><a href="#home3" data-toggle="tab">研究任务统计</a></li>
                <li><a href="#home4" data-toggle="tab">服务器自动巡检结果</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <h1>总览</h1>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ceshixiangmu"
                            style="margin-bottom: 8px">
                        新增
                    </button>
                    <table class="table table-striped">
                        <tr>
                            <th>序号</th>
                            <th>项目名称</th>
                            <th>任务名称</th>
                            <th>测试人员</th>
                            <th>起止时间</th>
                            <th>工时(小时)</th>
                            <th>备注</th>
                            <th>删除</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>F9标版</td>
                            <td>工程建设</td>
                            <td>顾疆飞</td>
                            <td>2016/7/29~2016/7/30</td>
                            <td>8</td>
                            <td>备注</td>
                            <td>删除</td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="home2">
                    <h1>测试项目统计</h1>
                </div>
                <div class="tab-pane fade" id="home3">
                    <h1>研究任务统计</h1>
                </div>
                <div class="tab-pane fade" id="home4">
                    <h1>服务器自动巡检结果</h1>
                </div>
            </div>
        </div>
    </div>
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
                        'value'=>''
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
                'controlname' => 'Select'
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
                'controlname' => 'Select'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- ceshixiangmu -->
<div class="modal fade" id="ceshixiangmu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('Common/xiugaimima') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新增</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="oldpassword">项目名称</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'xiangmumingcheng',
                        'placeholder' => '项目名称',
                        'name' => 'xiangmumingcheng',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="oldpassword">任务名称</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'renwumingcheng',
                        'placeholder' => '任务名称',
                        'name' => 'renwumingcheng',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="oldpassword">测试人员</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'renwumingcheng',
                        'placeholder' => '任务名称',
                        'name' => 'renwumingcheng',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="oldpassword">起止时间</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'renwumingcheng',
                        'placeholder' => '任务名称',
                        'name' => 'renwumingcheng',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="oldpassword">任务工时</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'renwumingcheng',
                        'placeholder' => '任务名称',
                        'name' => 'renwumingcheng',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label for="oldpassword">备注</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'renwumingcheng',
                        'placeholder' => '任务名称',
                        'name' => 'renwumingcheng',
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
                'controlname' => 'Select'
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