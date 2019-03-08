<?php
/* Smarty version 3.1.33, created on 2019-03-08 05:23:09
  from 'D:\01_q\phpStudy\PHPTutorial\WWW\pan\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c81fc3da3f958_32152196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '690ab71b365f7f15f17a5e6bd624a9f1e10d7a70' => 
    array (
      0 => 'D:\\01_q\\phpStudy\\PHPTutorial\\WWW\\pan\\templates\\index.html',
      1 => 1551402909,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c81fc3da3f958_32152196 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $_smarty_tpl->tpl_vars['web']->value['title'];?>
-<?php echo $_smarty_tpl->tpl_vars['web']->value['vicetitle'];?>
</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- Custom styles -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/templates/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/templates/css/styles.css" rel="stylesheet">
    <style type="text/css">
      .a_button{
        text-align: center;
        width: 80px;
        float: right;
        margin: 12px 15px 12px 0px;
        border: solid 1px;
        padding: 3px;
        border-radius:10px;
        text-decoration:none;
        color: #FFFF;
      }
      .a_button:link{
        text-decoration:none;
      }
      .a_button:visited{
        text-decoration:none;
      }
      .a_button:hover{
        text-decoration:none;
      }
      .a_button:active{
        text-decoration:none;
      }
    </style>
  </head>
  <body>
  <div style="margin: 0;padding: 0; width: 100%;height: 50px; background:#26CEE8; color:#FFF">
    <?php if (!empty($_SESSION['u_name']) || !empty($_COOKIE['u_name'])) {?>
    <a class="a_button" href="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/adminu">个人中心</a>
    <?php } else { ?>
    <a class="a_button" href="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/adminu/regin.php">注册</a>
    <a class="a_button" href="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/adminu/login.php">登录</a>
    <?php }?>
  </div>
  <div style="padding-top: 3rem">
    <main role="main" class="container">
      <h1><?php echo $_smarty_tpl->tpl_vars['web']->value['title'];?>
-<?php echo $_smarty_tpl->tpl_vars['web']->value['vicetitle'];?>
</h1>
      <p class="lead mb-4">
        <?php echo $_smarty_tpl->tpl_vars['web']->value['describe'];?>

      </p>

      <div class="row">
        <div class="col-md-6 col-sm-12">
          
          <!-- Our markup, the important part here! -->
          <div id="drag-and-drop-zone" class="dm-uploader p-5">
            <h3 class="mb-5 mt-5 text-muted">将文件拖放到此处</h3>

            <div class="btn btn-primary btn-block mb-5">
                <span>选择文件</span>
                <input type="file" title='Click to add Files' />
            </div>
          </div><!-- /uploader -->

        </div>
        <div class="col-md-6 col-sm-12">
          <div class="card h-100">
            <div class="card-header">
              文件列表
            </div>

            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
              <li class="text-muted text-center empty">未选中任何文件.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
           <div class="card h-100">
            <div class="card-header">
              消息列队
            </div>

            <ul class="list-group list-group-flush" id="debug">
              <li class="list-group-item text-muted empty">插件载入中....</li>
            </ul>
          </div>
        </div>
      </div> <!-- /debug -->

    </main> <!-- /container -->
</div>
    <footer class="text-center">
        <p>&copy; 一颗大萝北 &middot; <a href="https://www.imoecg.com" >www.imoecg.com</a>&middot; <a href="https://www.imoecg.com">一颗大萝北</a></p>
    </footer>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/templates/js/jquery.dm-uploader.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/templates/js/demo-ui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['web']->value['url'];?>
/templates/js/demo-config.js"><?php echo '</script'; ?>
>

    <!-- File item template -->
    <?php echo '<script'; ?>
 type="text/html" id="files-template">
      <li class="media">
        <div class="media-body mb-1">
          <p class="mb-2">
            <strong>%%filename%%</strong> - 进度: <span class="text-muted">等待处理</span>
          </p>
          <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
              role="progressbar"
              style="width: 0%" 
              aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <hr class="mt-1 mb-1" />
        </div>
      </li>
    <?php echo '</script'; ?>
>

    <!-- Debug item template -->
    <?php echo '<script'; ?>
 type="text/html" id="debug-template">
      <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    <?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
