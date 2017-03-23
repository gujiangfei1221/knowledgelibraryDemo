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
    <!--<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?= $this->config->item('base_url'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?= $this->config->item('base_url'); ?>/js/jquery.js"></script>
    <script src="<?= $this->config->item('base_url'); ?>/js/bootstrap-treeview.js"></script>
</head>

<body>
<?php include('head.php'); ?>
<div class="row">
    <div class="col-md-3">
        <div id="treeview6" class="treeview">
        </div>
    </div>
    <div class="col-md-9">
        <table class="table table-striped table-hover text-center">
            <tr>
                <td>序号</td>
                <td>标题</td>
                <td>所属栏目</td>
                <td>上传者</td>
                <td>下载</td>
                <td>删除</td>
            </tr>
            <?php
            $i = 1;
            foreach ($content as $row) {
                if ($_SESSION['name'] != $row['user']) {
                    echo "<tr>
                        <td>" . $i . "</td>
                        <td class=\"text-left\"><a href=\"" . site_url('Detail/index/' . $row['uid']) . "\">" . $row['title'] . "</a></td>
                        <td>" . $row['lanmupath'] . "</td>
                        <td>" . $row['user'] . "</td>
                        <td><a href=\"" . site_url('Security/download/' . $row['filename']) . "\">下载</a></td>
                        <td style='display:none;'><a href=\"" . site_url('Security/deletecontent/' . $row['title']) . "\"> 删除</a ></td >
            </tr>";
                } else {
                    echo "<tr>
                        <td>" . $i . "</td>
                        <td class=\"text-left\"><a href=\"" . site_url('Detail/index/' . $row['uid']) . "\" >" . $row['title'] . "</a></td>
                        <td>" . $row['lanmupath'] . "</td>
                        <td>" . $row['user'] . "</td>
                        <td><a href=\"" . site_url('Security/download/' . $row['filename']) . "\">下载</a></td>
                        <td><a href=\"" . site_url('Security/deletecontent/' . $row['uid']) . "\"> 删除</a ></td >
            </tr>";
                }
                $i++;
            }
            ?>
        </table>
        <nav class="text-center" style="<?php if($value != null && $value != ''){echo 'display:none';} ?>">
            <ul class="pagination">
                <li>
                    <a href="<?php echo site_url('Security/index/1/' . $lanmu2); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php foreach ($page as $row): ?>
                    <li><a href="<?php echo site_url('Security/index/' . $row . '/' . $lanmu2); ?> " <?php if($p == $row){echo "style=\"color: red\"";} ?>><?php echo($row); ?></a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="<?php
                    if (count($page) == 0) {
                        echo site_url('Security/index/1/' . $lanmu2);
                    } else {
                        echo site_url('Security/index/' . count($page) . '/' . $lanmu2);
                    }

                    ?>" aria-label="Next">
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
    $(function () {
        var defaultData =
            <?php echo $lanmu ?>
            ;

        $('#treeview6').treeview({
            color: "#428bca",
            expandIcon: "glyphicon glyphicon-chevron-up",
            collapseIcon: "glyphicon glyphicon-chevron-down",
            nodeIcon: "glyphicon glyphicon-folder-close",
            enableLinks: true,
            showCheckbox: false,
            levels: 2,
            showTags: true,
            data: defaultData
        });

    });
</script>
</body>

</html>

