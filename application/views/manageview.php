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
    <title>后台管理</title>

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
                <li <?php if ($_SESSION['duiwai'] == 'yes'){echo "style='display:none'"; } ?>><a href="<?php echo site_url('Main/index/1') ?>">下载文档</a></li>
                <li <?php if ($_SESSION['duiwai'] == 'yes'){echo "style='display:none'"; } ?>><a href="<?php echo site_url('Add/index') ?>">上传文档</a></li>
                <li <?php if ($_SESSION['duiwai'] == 'yes'){echo "style='display:none'"; } ?>><a href="<?php echo site_url('Urltool/index') ?>">编解码小工具</a></li>
                <li <?php if ($_SESSION['duiwai'] == 'yes'){echo "style='display:none'"; } ?>><a href="<?php echo site_url('Testinfo/index') ?>">测试环境查看</a></li>
                <li <?php if ($_SESSION['team'] != 'yes'){echo "style='display:none'"; } ?>><a href="<?php echo site_url('Team/index') ?>">技术研究小组</a></li>
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
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal22"
                            style="margin-top: 8px">
                        修改测试环境
                    </button>
                </li>
                <li><a href="<?php echo site_url('Common/logout') ?>">退出</a></li>
            </ul>
            <!--            <form class="navbar-form navbar-right" role="search">-->
            <!--                <div class="form-group">-->
            <!--                    <input type="text" class="form-control" placeholder="请输入">-->
            <!--                </div>-->
            <!--                <button type="submit" class="btn btn-default">搜索</button>-->
            <!--            </form>-->

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                  data-toggle="tab">栏目维护</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">用户维护</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!--栏目维护-->
        <div role="tabpanel" class="tab-pane active" id="home">
            <?php echo form_open('Manage/deletelanmu') ?>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1"
                    style="margin-top: 8px">
                新增
            </button>
            <button class="btn btn-default" style="margin-top: 8px" type="submit">删除</button>
            <label><h5 style="color: red">*删除目录会删除该目录下的子目录和目录下所有的文件,谨慎删除!</h5></label>
            <table class="table table-striped table-hover text-center" style="margin-top: 5px;">
                <tr>
                    <td></td>
                    <td>序号</td>
                    <td>名称</td>
                    <td>父级目录</td>
                </tr>
                <?php
                $i = 1;
                foreach ($lanmu as $row) {
                    echo "<tr>
                    <td><input type=\"checkbox\" name=\"lanmu[]\" value=\"" . $row['name'] . "\"></td>
                    <td>" . $i . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['parentname'] . "</td>
                </tr>";
                    $i++;
                }
                ?>
            </table>
            <?php echo form_close() ?>
        </div>

        <!--用户维护-->
        <div role="tabpanel" class="tab-pane" id="settings">

            <?php echo form_open('Manage/deleteuser') ?>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal4"
                    style="margin-top: 8px">
                新增
            </button>
            <button class="btn btn-default" style="margin-top: 8px" type="submit">删除</button>
            <table class="table table-striped table-hover text-center" style="margin-top: 5px;">
                <tr>
                    <td></td>
                    <td>序号</td>
                    <td>登录账号</td>
                    <td>姓名</td>
                    <td>重置密码</td>
                </tr>
                <?php
                $i = 1;
                foreach ($user as $row) {
                    echo "<tr>
                    <td><input type=\"checkbox\" name=\"user[]\" value=\"" . $row['username'] . "\"></td>
                    <td>" . $i . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td><a href=\"" . site_url('Manage/resetpassword/' . $row['uid']) . "\">重置密码</a></td>
                </tr>";
                    $i++;
                }
                ?>
            </table>
            <?php echo form_close() ?>
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
                'controlname' => 'Manage'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('Manage/addlanmu') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新增栏目</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="oldpassword">栏目名称</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'lanmuname',
                        'placeholder' => '栏目名称',
                        'name' => 'lanmuname',
                        'value' => '',
                        'required' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>父级目录</label>
                    <?php
                    $options = array('root' => 'root');
                    foreach ($lanmu as $row):
                        $options[$row['name']] = $row['name'];
                    endforeach;
                    echo form_dropdown('lanmus', $options, 'root', 'class="form-control"');
                    ?>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="duiwai2"> 是否对外用户
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php
            $data = array(
                'controlname' => 'Manage'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal4 -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('Manage/adduser') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新增用户</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>登录账号</label>
                    <input type="text" class="form-control" id="loginid" placeholder="登录账号" name="loginid" required="">
                </div>
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" class="form-control" id="loginname" placeholder="用户名" name="loginname"
                           required="">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" class="form-control" id="password" placeholder="密码" name="password"
                           required="">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="duiwai"> 是否对外用户
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal22 -->
<div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        'value' => ''
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
                'controlname' => 'Manage'
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