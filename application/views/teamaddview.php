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
    <title>Bootstrap 101 Template</title>

    <script src="//cdn.bootcss.com/echarts/3.2.2/echarts.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url'); ?>/css/bootstrapDatepickr-1.0.0.min.css">
    <script src="<?= $this->config->item('base_url'); ?>/js/jquery-1.7.2.min.js"></script>
    <script src="<?= $this->config->item('base_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?= $this->config->item('base_url'); ?>/js/bootstrapDatepickr-1.0.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#calendar1").bootstrapDatepickr({date_format: "Y-m-d"});
            $("#calendar2").bootstrapDatepickr({date_format: "Y-m-d"});
        });
    </script>

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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo form_open('Team/add','class="form-horizontal"') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">测试类别</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="ceshileibie">
                            <option value="功能测试">功能测试</option>
                            <option value="性能测试">性能测试</option>
                            <option value="安全测试">安全测试</option>
                            <option value="自动化测试">自动化测试</option>
                            <option value="研究任务">研究任务</option>
                            <option value="服务器维护">服务器维护</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">项目名称</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="项目名称" class="form-control" name="xiangmumingcheng" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">计划名称</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="任务名称" class="form-control" name="jihuamingcheng" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">测试内容概要</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="测试内容概要" class="form-control" name="ceshineirong" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">测试人员</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="测试人员" class="form-control" name="ceshirenyuan" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">开始时间</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="calendar1" placeholder="开始时间" class="form-control" name="kaishishijian" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">结束时间</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="calendar2" placeholder="结束时间" class="form-control" name="jieshushijian" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3"  name="beizhu" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="<?php echo site_url('Team/index') ?>">关闭</a>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php
            $data = array(
                'controlname' => 'Team'
            );
            echo form_hidden($data);
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</body>
</html>
