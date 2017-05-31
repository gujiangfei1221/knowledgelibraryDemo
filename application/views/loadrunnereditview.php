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
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php echo form_open('Loadrunner/doedit/'.$info[0]['uid']) ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">修改项目</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="xiangmumingcheng">项目名称</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'xiangmumingcheng',
                    'placeholder' => '项目名称',
                    'name' => 'xiangmumingcheng',
                    'value' => $info[0]['xiangmumingcheng']
                );
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label for="ceshijihua">测试计划</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'ceshijihua',
                    'placeholder' => '测试计划',
                    'name' => 'ceshijihua',
                    'value' => $info[0]['ceshijihua']
                );
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label for="ceshineirong">测试内容概要</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'ceshineirong',
                    'placeholder' => '测试内容概要',
                    'name' => 'ceshineirong',
                    'value' => $info[0]['ceshineirong']
                );
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label for="ceshirenyuan">测试人员</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'ceshirenyuan',
                    'placeholder' => '测试人员',
                    'name' => 'ceshirenyuan',
                    'value' => $info[0]['ceshirenyuan']
                );
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label for="ceshirenyuan">测试版本</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'ceshibanben',
                    'placeholder' => '比如招投标6.0',
                    'name' => 'ceshibanben',
                    'value' => $info[0]['ceshibanben']
                );
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">开始时间</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'calendar1',
                    'placeholder' => '开始时间',
                    'name' => 'kaishishijian',
                    'value' => $info[0]['kaishishijian']
                );
                echo form_input($data);
                ?>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">结束时间</label>
                <?php
                $data = array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'calendar2',
                    'placeholder' => '结束时间',
                    'name' => 'jieshushijian',
                    'value' => $info[0]['jieshushijian']
                );
                echo form_input($data);
                ?>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" role="button" href="<?php echo site_url('Loadrunner/index'); ?>" style="margin-bottom: 8px">返回</a>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 8px">保存</button>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</body>
</html>
