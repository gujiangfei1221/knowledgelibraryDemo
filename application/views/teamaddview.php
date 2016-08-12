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
                    <label class="col-sm-2 control-label">项目名称</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="项目名称" class="form-control" name="xiangmumingcheng" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">任务名称</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="任务名称" class="form-control" name="remwumingcheng" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">类别</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="leibie">
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
                    <label class="col-sm-2 control-label">测试人员</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="ceshirenyuan">
                            <option value="顾疆飞">顾疆飞</option>
                            <option value="姜志伟">姜志伟</option>
                            <option value="田园">田园</option>
                            <option value="杨剑">杨剑</option>
                            <option value="张榆">张榆</option>
                            <option value="姜志伟、田园">姜志伟、田园</option>
                            <option value="顾疆飞、杨剑">顾疆飞、杨剑</option>
                            <option value="张榆、杨剑">张榆、杨剑</option>
                            <option value="张榆、顾疆飞">张榆、顾疆飞</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">测试轮次</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="测试轮次" class="form-control" name="ceshilunci">
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
                    <label class="col-sm-2 control-label">任务工时</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="任务工时" class="form-control" name="renwugongshi" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">预算来源</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="预算来源" class="form-control" name="yusuanlaiyuan" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="备注" class="form-control" name="beizhu" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">关闭</button>
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
