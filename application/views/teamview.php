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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url'); ?>/css/bootstrapDatepickr-1.0.0.min.css">

    <script src="//cdn.bootcss.com/jquery/1.7.1/jquery.min.js"></script>
    <script src="<?= $this->config->item('base_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?= $this->config->item('base_url'); ?>/js/bootstrapDatepickr-1.0.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#calendar1").bootstrapDatepickr({date_format: "Y-m-d"});
            $("#calendar2").bootstrapDatepickr({date_format: "Y-m-d"});
            $("#calendar3").bootstrapDatepickr({date_format: "Y-m-d"});
            $("#calendar4").bootstrapDatepickr({date_format: "Y-m-d"});
        });
    </script>

    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
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
    <h1>测试项目统计</h1>
    <div class="row">
        <div class="col-md-1">
            <button type="button" class="btn btn-primary" style="margin-bottom: 8px"
                    onclick="window.location.href='<?php echo site_url('Teamadd/index') ?>'">新增
            </button>
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
            <th width="2%">序</th>
            <th width="10%">测试类别</th>
            <th width="15%">项目名称</th>
            <th width="15%">计划名称</th>
            <th width="15%">测试内容概要</th>
            <th width="8%">测试人员</th>
            <th width="5%">开始时间</th>
            <th width="5%">结束时间</th>
            <th width="10%">备注</th>
            <th width="5%">修改</th>
            <th width="5%">删除</th>
        </tr>
        <?php
        $i = 1;
        foreach ($info as $item) {
            switch ($item['ceshileibie']) {
                case '功能测试':
                    echo "
                            <tr class='danger'>
                            <td>" . $i . "</td>
                            <td>" . $item['ceshileibie'] . "</td>
                            <td>" . $item['xiangmumingcheng'] . "</td>
                            <td>" . $item['jihuamingcheng'] . "</td>
                            <td>" . $item['ceshineirong'] . "</td>
                            <td>" . $item['ceshirenyuan'] . "</td>
                            <td>" . $item['kaishishijian'] . "</td>
                            <td>" . $item['jieshushijian'] . "</td>
                            <td>" . $item['beizhu'] . "</td>
                            <td><a href=\"" . site_url('Team/edit/' . $item['uid']) . "\">修改</a></td>
                            <td><a href=\"" . site_url('Team/delete/' . $item['uid']) . "\">删除</a></td>
                        </tr>";
                    break;
                case '性能测试':
                    echo "
                            <tr class='success'>
                            <td>" . $i . "</td>
                            <td>" . $item['ceshileibie'] . "</td>
                            <td>" . $item['xiangmumingcheng'] . "</td>
                            <td>" . $item['jihuamingcheng'] . "</td>
                            <td>" . $item['ceshineirong'] . "</td>
                            <td>" . $item['ceshirenyuan'] . "</td>
                            <td>" . $item['kaishishijian'] . "</td>
                            <td>" . $item['jieshushijian'] . "</td>
                            <td>" . $item['beizhu'] . "</td>
                            <td><a href=\"" . site_url('Team/edit/' . $item['uid']) . "\">修改</a></td>
                            <td><a href=\"" . site_url('Team/delete/' . $item['uid']) . "\">删除</a></td>
                        </tr>";
                    break;
                case '安全测试':
                    echo "
                            <tr class='warning'>
                            <td>" . $i . "</td>
                            <td>" . $item['ceshileibie'] . "</td>
                            <td>" . $item['xiangmumingcheng'] . "</td>
                            <td>" . $item['jihuamingcheng'] . "</td>
                            <td>" . $item['ceshineirong'] . "</td>
                            <td>" . $item['ceshirenyuan'] . "</td>
                            <td>" . $item['kaishishijian'] . "</td>
                            <td>" . $item['jieshushijian'] . "</td>
                            <td>" . $item['beizhu'] . "</td>
                            <td><a href=\"" . site_url('Team/edit/' . $item['uid']) . "\">修改</a></td>
                            <td><a href=\"" . site_url('Team/delete/' . $item['uid']) . "\">删除</a></td>
                        </tr>";
                    break;
                case '自动化测试':
                    echo "
                            <tr class='active'>
                            <td>" . $i . "</td>
                            <td>" . $item['ceshileibie'] . "</td>
                            <td>" . $item['xiangmumingcheng'] . "</td>
                            <td>" . $item['jihuamingcheng'] . "</td>
                            <td>" . $item['ceshineirong'] . "</td>
                            <td>" . $item['ceshirenyuan'] . "</td>
                            <td>" . $item['kaishishijian'] . "</td>
                            <td>" . $item['jieshushijian'] . "</td>
                            <td>" . $item['beizhu'] . "</td>
                            <td><a href=\"" . site_url('Team/edit/' . $item['uid']) . "\">修改</a></td>
                            <td><a href=\"" . site_url('Team/delete/' . $item['uid']) . "\">删除</a></td>
                        </tr>";
                    break;
                case '研究任务':
                    echo "
                            <tr class='info'>
                            <td>" . $i . "</td>
                            <td>" . $item['ceshileibie'] . "</td>
                            <td>" . $item['xiangmumingcheng'] . "</td>
                            <td>" . $item['jihuamingcheng'] . "</td>
                            <td>" . $item['ceshineirong'] . "</td>
                            <td>" . $item['ceshirenyuan'] . "</td>
                            <td>" . $item['kaishishijian'] . "</td>
                            <td>" . $item['jieshushijian'] . "</td>
                            <td>" . $item['beizhu'] . "</td>
                            <td><a href=\"" . site_url('Team/edit/' . $item['uid']) . "\">修改</a></td>
                            <td><a href=\"" . site_url('Team/delete/' . $item['uid']) . "\">删除</a></td>
                        </tr>";
                    break;
                case '服务器维护':
                    echo "
                            <tr>
                            <td>" . $i . "</td>
                            <td>" . $item['ceshileibie'] . "</td>
                            <td>" . $item['xiangmumingcheng'] . "</td>
                            <td>" . $item['jihuamingcheng'] . "</td>
                            <td>" . $item['ceshineirong'] . "</td>
                            <td>" . $item['ceshirenyuan'] . "</td>
                            <td>" . $item['kaishishijian'] . "</td>
                            <td>" . $item['jieshushijian'] . "</td>
                            <td>" . $item['beizhu'] . "</td>
                            <td><a href=\"" . site_url('Team/edit/' . $item['uid']) . "\">修改</a></td>
                            <td><a href=\"" . site_url('Team/delete/' . $item['uid']) . "\">删除</a></td>
                        </tr>";
                    break;
            }

            $i++;
        }
        ?>
    </table>
    <nav class="text-center" style="<?php if ($value != null && $value != '') {
        echo 'display:none';
    } ?>">
        <ul class="pagination">
            <li>
                <a href="<?php echo site_url('Team/index/1'); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php foreach ($page as $row): ?>
                <li><a href="<?php echo site_url('Team/index/' . $row); ?> " <?php if ($p == $row) {
                        echo "style=\"color: red\"";
                    } ?>><?php echo($row); ?></a>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="<?php
                if (count($page) == 0) {
                    echo site_url('Team/index/1');
                } else {
                    echo site_url('Team/index/' . count($page));
                }

                ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Modal -->
<!--修改密码 -->
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
                'controlname' => 'Select'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal2 -->
<!-- 修改测试环境信息 -->
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
                'controlname' => 'Select'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

</body>

</html>