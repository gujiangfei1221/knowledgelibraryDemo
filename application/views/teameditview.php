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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo form_open('Team/update') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>项目名称</label>
                    <input type="text" placeholder="项目名称" class="form-control" name="xiangmumingcheng" value="<?php echo $info['xiangmumingcheng'] ?>">
                </div>
                <div class="form-group">
                    <label>任务名称</label>
                    <input type="text" placeholder="任务名称" class="form-control" name="remwumingcheng" value="<?php echo $info['renwumingcheng'] ?>">
                </div>
                <div class="form-group">
                    <label>类别</label>
                    <select class="form-control" name="leibie">
                        <option <?php if($info['leibie']=='功能测试'){echo "selected='selected'";} ?> value="功能测试">功能测试</option>
                        <option <?php if($info['leibie']=='性能测试'){echo "selected='selected'";} ?> value="性能测试">性能测试</option>
                        <option <?php if($info['leibie']=='安全测试'){echo "selected='selected'";} ?> value="安全测试">安全测试</option>
                        <option <?php if($info['leibie']=='自动化测试'){echo "selected='selected'";} ?> value="自动化测试">自动化测试</option>
                        <option <?php if($info['leibie']=='研究任务'){echo "selected='selected'";} ?> value="研究任务">研究任务</option>
                        <option <?php if($info['leibie']=='服务器维护'){echo "selected='selected'";} ?> value="服务器维护">服务器维护</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>测试人员</label>
                    <select class="form-control" name="ceshirenyuan">
                        <option <?php if($info['ceshirenyuan']=='顾疆飞'){echo "selected='selected'";} ?> value="顾疆飞">顾疆飞</option>
                        <option <?php if($info['ceshirenyuan']=='姜志伟'){echo "selected='selected'";} ?>value="姜志伟">姜志伟</option>
                        <option <?php if($info['ceshirenyuan']=='田园'){echo "selected='selected'";} ?>value="田园">田园</option>
                        <option <?php if($info['ceshirenyuan']=='杨剑'){echo "selected='selected'";} ?>value="杨剑">杨剑</option>
                        <option <?php if($info['ceshirenyuan']=='张榆'){echo "selected='selected'";} ?>value="张榆">张榆</option>
                        <option <?php if($info['ceshirenyuan']=='姜志伟、田园'){echo "selected='selected'";} ?>value="姜志伟、田园">姜志伟、田园</option>
                        <option <?php if($info['ceshirenyuan']=='顾疆飞、杨剑'){echo "selected='selected'";} ?>value="顾疆飞、杨剑">顾疆飞、杨剑</option>
                        <option <?php if($info['ceshirenyuan']=='张榆、杨剑'){echo "selected='selected'";} ?>value="张榆、杨剑">张榆、杨剑</option>
                        <option <?php if($info['ceshirenyuan']=='张榆、顾疆飞'){echo "selected='selected'";} ?>value="张榆、顾疆飞">张榆、顾疆飞</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>测试轮次</label>
                    <input type="text" placeholder="测试轮次" class="form-control" name="ceshilunci" value="<?php echo $info['ceshilunci'] ?>">
                </div>
                <div class="form-group">
                    <label>开始时间</label>
                    <input type="text" placeholder="开始时间" class="form-control" name="kaishishijian" value="<?php echo $info['kaishishijian'] ?>">
                </div>
                <div class="form-group">
                    <label>结束时间</label>
                    <input type="text" placeholder="结束时间" class="form-control" name="jieshushijian" value="<?php echo $info['jieshushijian'] ?>">
                </div>
                <div class="form-group">
                    <label>任务工时</label>
                    <input type="text" placeholder="任务工时" class="form-control" name="renwugongshi" value="<?php echo $info['gongshi'] ?>">
                </div>
                <div class="form-group">
                    <label>预算来源</label>
                    <input type="text" placeholder="预算来源" class="form-control" name="yusuanlaiyuan" value="<?php echo $info['yusuanlaiyuan'] ?>">
                </div>
                <div class="form-group">
                    <label>备注</label>
                    <input type="text" placeholder="备注" class="form-control" name="beizhu" value="<?php echo $info['beizhu'] ?>">
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php
            $data = array(
                'uid' => $info['uid']
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
