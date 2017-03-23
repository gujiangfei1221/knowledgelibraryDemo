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
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

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
<?php include('head.php'); ?>
<div class="row">
    <div class="col-md-3">
        <div id="treeview6" class="treeview">
        </div>

    </div>
    <div class="col-md-9">
        <table class="table table-striped table-hover text-center">
            <tr>
                <td>序号</td>
                <td >标题</td>
                <td>所属栏目</td>
                <td>上传者</td>
                <td>下载</td>
                <td>修改</td>
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
                        <td><a href=\"" . site_url('Main/download/' . $row['filename']) . "\">下载</a></td>
                        <td><a href=\"". site_url('Main/edit/' . $row['uid'])."\">修改</a></td>
                        <td style='display:none;'><a href=\"" . site_url('Main/deletecontent/' . $row['uid']) . "\"> 删除</a ></td >
            </tr>";
                } else {
                    echo "<tr>
                        <td>" . $i . "</td>
                        <td class=\"text-left\"><a href=\"" . site_url('Detail/index/' . $row['uid']) . "\" >" . $row['title'] . "</a></td>
                        <td>" . $row['lanmupath'] . "</td>
                        <td>" . $row['user'] . "</td>
                        <td><a href=\"" . site_url('Main/download/' . $row['filename']) . "\">下载</a></td>
                        <td><a href=\"". site_url('Main/edit/' . $row['uid'])."\" > 修改</a ></td >
                        <td><a href=\"" . site_url('Main/deletecontent/' . $row['uid']) . "\"> 删除</a ></td >
            </tr>";
                }
                $i++;
            }
            ?>
        </table>
        <nav class="text-center" style="<?php if($value != null && $value != ''){echo 'display:none';} ?>">
            <ul class="pagination">
                <li>
                    <a href="<?php echo site_url('Main/index/1/' . $lanmu2); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php foreach ($page as $row): ?>
                    <li><a href="<?php echo site_url('Main/index/' . $row . '/' . $lanmu2); ?> " <?php if($p == $row){echo "style=\"color: red\"";} ?>><?php echo($row); ?></a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="<?php
                    if (count($page) == 0) {
                        echo site_url('Main/index/1/' . $lanmu2);
                    } else {
                        echo site_url('Main/index/' . count($page) . '/' . $lanmu2);
                    }

                    ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
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
                'controlname' => 'Main'
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
                'controlname' => 'Main'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
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
            levels: 1,
            showTags: true,
            data: defaultData
        });

    });
</script>
</body>

</html>