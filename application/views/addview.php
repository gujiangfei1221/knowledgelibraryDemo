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
		<title>上传文档</title>

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
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">知识库</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">欢迎：顾疆飞</a></li>
						<li><a href="#">下载文档</a></li>
						<li><a href="#">上传文档</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">退出</a></li>
					</ul>
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="请输入">
						</div>
						<button type="submit" class="btn btn-default">搜索</button>
					</form>

				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form>
					<div class="form-group">
						<label for="exampleInputEmail1">标题</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入标题">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">描述</label>
						<!-- 加载编辑器的容器 -->
						<script id="container" name="content" type="text/plain">
							这里写你的初始化内容
						</script>
						<!-- 配置文件 -->
						<script type="text/javascript" src="<?=$this->config->item('base_url');?>/ueditor.config.js"></script>
						<!-- 编辑器源码文件 -->
						<script type="text/javascript" src="<?=$this->config->item('base_url');?>/ueditor.all.js"></script>
						<!-- 实例化编辑器 -->
						<script type="text/javascript">
							var ue = UE.getEditor('container');
						</script>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">附件上传</label>
						<input type="file" id="exampleInputFile">
						<p class="help-block">支持XX格式文件</p>
					</div>
					<button type="submit" class="btn btn-default">提交</button>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>

</html>