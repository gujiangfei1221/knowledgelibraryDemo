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
    <title>修改密码</title>

    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $this->config->item('base_url'); ?>/css/signin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <?php echo form_open('Changepwd/update', 'class="form-signin"') ?>
    <h2 class="form-signin-heading">修改密码</h2>
    <h5>（请使用ie9以上的浏览器，推荐使用火狐）</h5>

    <label for="loginid" class="sr-only">账号</label>
    <?php
    $data = array(
        'name'=>'loginid',
        'id' => 'loginid',
        'class' => 'form-control',
        'placeholder' => '账号',
        'required' => '',
        'autofocus' => '',
        'type' => 'text'
    );
    echo form_input($data);
    ?>
    <label for="oldpassword" class="sr-only">原密码</label>
    <?php
    $data = array(
        'name'=>'oldpassword',
        'id' => 'oldpassword',
        'class' => 'form-control',
        'placeholder' => '原密码',
        'required' => '',
        'autofocus' => '',
        'type' => 'password',
         'style'=>'margin-top: 10px'
    );
    echo form_input($data);
    ?>
    <label for="newpassword" class="sr-only">新密码</label>
    <?php
    $data = array(
        'name'=>'newpassword',
        'id' => 'newpassword',
        'class' => 'form-control',
        'placeholder' => '新密码',
        'required' => '',
        'type' => 'password',
        'style'=>'margin-top: 10px'
    );
    echo form_input($data);
    ?>
    <label for="newpassword2" class="sr-only">确认</label>
    <?php
    $data = array(
        'name'=>'newpassword2',
        'id' => 'newpassword2',
        'class' => 'form-control',
        'placeholder' => '确认密码',
        'required' => '',
        'type' => 'password',
        'style'=>'margin-top: 10px'
    );
    echo form_input($data);
    ?>
    <?php
    $data = array(
        'class' => 'btn btn-lg btn-primary btn-block',
        'type' => 'submit',
        'value' => '提交',
        'name' => 'submit'
    );
    echo form_submit($data);
    ?>
    <?php echo form_close() ?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
