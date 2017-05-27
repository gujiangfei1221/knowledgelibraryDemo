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
    <title>上传结果</title>

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
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php echo form_open_multipart('Imagemap/do_upload/', 'id="upoad-form"'); ?>
        <div class="form-group">
            <label>图片上传</label>
            <input type="file" id="userfile" name="userfile">
            <p class="help-block">只支持“jpg,jepg,bmp,gif,png”格式文件</p>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
        <?php echo form_close() ?>
        <p></p>
        <textarea rows="10" cols="100" onclick="this.focus();this.select()" readonly="readonly"><?php echo '![](http://192.168.203.223/imagemap/' . $this->uri->segment(3) . ')'; ?></textarea>
    </div>
    <div class="col-md-4"></div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>