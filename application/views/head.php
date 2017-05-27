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
                    echo "style='display:none'";} ?>>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">相关菜单<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('Main/index/1') ?>">下载文档</a></li>
                        <li><a href="<?php echo site_url('Add/index') ?>">上传文档</a></li>
                        <li><a href="<?php echo site_url('Loadrunner/index') ?>">性能测试结果归档</a></li>
                        <li><a href="<?php echo site_url('Deploy/index') ?>">部署手册</a></li>
                        <li><a href="<?php echo site_url('Xingnengtest/index') ?>">性能测试手册</a></li>
                    </ul>
                </li>
                <li <?php if ($_SESSION['team'] != 'yes') {
                    echo "style='display:none'";
                } ?>><a href="<?php echo site_url('Team/index') ?>">性能测试项目登记</a></li>
                <li <?php if ($_SESSION['team'] != 'yes') {
                    echo "style='display:none'";
                } ?>><a href="#" onclick="window.location.href='http://192.168.203.124/Security/index.aspx'" target="_blank">安全测试项目登记</a></li>
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
                </li>
                <li><a href="<?php echo site_url('Common/logout') ?>">退出</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>