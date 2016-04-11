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
		<script src="<?=$this->config->item('base_url');?>/js/jquery.js"></script>
		<script src="<?=$this->config->item('base_url');?>/js/bootstrap-treeview.js"></script>
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
			<div class="col-md-3">
				<div id="treeview6" class="treeview">
				</div>
			</div>
			<div class="col-md-9">
				<table class="table table-striped table-hover">
					<tr>
						<td>序号</td>
						<td>标题</td>
						<td>下载</td>
					</tr>
					<tr>
						<td>1</td>
						<td>loadrunner处理关联</td>
						<td>下载</td>
					</tr>
				</table>
				<nav class="text-center">
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>-->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function() {
				var defaultData = [{
					text: 'Parent 1',
					href: '#parent1',
					tags: ['4'],
					nodes: [{
						text: 'Child 1',
						href: '#child1',
						tags: ['2'],
						nodes: [{
							text: 'Grandchild 1',
							href: '#grandchild1',
							tags: ['1']
						}, {
							text: 'Grandchild 2',
							href: '#grandchild2',
							tags: ['1']
						}]
					}, {
						text: 'Child 2',
						href: '#child2',
						tags: ['2']
					}]
				}, {
					text: 'Parent 2',
					href: '#parent2',
					tags: ['0']
				}, {
					text: 'Parent 3',
					href: '#parent3',
					tags: ['0']
				}, {
					text: 'Parent 4',
					href: '#parent4',
					tags: ['0']
				}, {
					text: 'Parent 5',
					href: '#parent5',
					tags: ['0']
				}];
				
				$('#treeview6').treeview({
					color: "#428bca",
					expandIcon: "glyphicon glyphicon-chevron-up",
					collapseIcon: "glyphicon glyphicon-chevron-down",
					nodeIcon: "glyphicon glyphicon-folder-close",
					showTags: true,
					data: defaultData
				});
				
			});
		</script>
	</body>

</html>