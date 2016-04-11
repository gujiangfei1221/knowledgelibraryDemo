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
		<title>后台管理</title>

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
		<div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">栏目维护</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">文档维护</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">问题维护</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">用户维护</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<button class="btn btn-default">新增</button>
					<button class="btn btn-default">删除 </button>
					<table class="table table-striped table-hover" style="margin-top: 5px;">
						<tr>
							<td>序号</td>
							<td>名称</td>
							<td>维护</td>
						</tr>
						<tr>
							<td>1</td>
							<td>loadrunner处理关联</td>
							<td>维护</td>
						</tr>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					<button class="btn btn-default">新增</button>
					<button class="btn btn-default">删除 </button>
					<table class="table table-striped table-hover" style="margin-top: 5px;">
						<tr>
							<td>序号</td>
							<td>名称</td>
							<td>维护</td>
						</tr>
						<tr>
							<td>1</td>
							<td>loadrunner处理关联2</td>
							<td>维护</td>
						</tr>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="messages">
					<button class="btn btn-default">新增</button>
					<button class="btn btn-default">删除 </button>
					<table class="table table-striped table-hover" style="margin-top: 5px;">
						<tr>
							<td>序号</td>
							<td>名称</td>
							<td>维护</td>
						</tr>
						<tr>
							<td>1</td>
							<td>loadrunner处理关联3</td>
							<td>维护</td>
						</tr>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="settings">
					<button class="btn btn-default">新增</button>
					<button class="btn btn-default">删除 </button>
					<table class="table table-striped table-hover" style="margin-top: 5px;">
						<tr>
							<td>序号</td>
							<td>名称</td>
							<td>维护</td>
						</tr>
						<tr>
							<td>1</td>
							<td>loadrunner处理关联4</td>
							<td>维护</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>

</html>