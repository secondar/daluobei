<?php
/* Smarty version 3.1.33, created on 2019-02-28 02:12:26
  from 'D:\01_q\phpStudy\PHPTutorial\WWW\pan\install\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c77438abe2df3_81241641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05741a7d5f87df86abc790107676028734b9ab69' => 
    array (
      0 => 'D:\\01_q\\phpStudy\\PHPTutorial\\WWW\\pan\\install\\templates\\index.html',
      1 => 1550804286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c77438abe2df3_81241641 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>大萝北网盘安装向导</title>
</head>
<?php $_smarty_tpl->_assignInScope('file', dirname('__FILE__'));?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
/css/ystep.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
/js/jquery-1.9.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
/js/ystep.js"><?php echo '</script'; ?>
>
<style>
.licenseblock {
	margin-bottom: 15px;
	padding: 8px;
	height: 280px;
	border: 1px solid #EEE;
	background: #FFF;
	overflow: scroll;
	overflow-x: hidden;
}
.contain {
	margin: 20px;
}
.ystep2 {
	margin-top: 20px;
	float: right;
}
.bb {
	float: right;
	margin-top: 60px;
	margin-right: 45px;
}
.head {
	font-size: 30px;
	margin-left: 140px;
	margin-top: 10px;
	position: absolute;
}
.logo {
	background-image: url(../admin/images/logo.png);
	margin-top: 10px;
	margin-left: 50px;
	width: 85px;
	height: 71px;
	float: left;
}
body {
	font-family: "微软雅黑";
}
</style>
<body>
<div align="center">
  <div style="margin-top: 30px;width: 900px;height:550px;border: 1px solid #e7e7e7;box-shadow: 0px 0px 2px #BABABA;">
    <div style="height: 100px;border-bottom: 1px solid #e7e7e7;">
      <div class="logo"></div>
      <div class="head">
        <div>大萝北网盘</div>
        <div style="font-size:20px;color:#CCC;margin-left:45px;" align="rgiht">安装向导</div>
      </div>
      <div class="ystep2" align="left"></div>
    </div>
    <div class="contain" align="left">
      <div >
        <div class="licenseblock">
          <div class="license">
            <p>本程序由<a href="https:www.imoecg.com">一只大萝北</a>独立开发</p>
            <p>采用Bootstrap前端框架</p>
            <p>从零写起的Pure</p>
            <p>使用本程序须知以下:</p>
            <p>1.本程序为个人练手项目,并非成熟项目</p>
            <p>2.本程序所有权:一只大萝北</p>
            <p>3.您可以使用本程序作为二次开发,但需保留本程序中开发者版权信息</p>
          </div>
        </div>
        <div align="center"><a class="btn btn-success btn-lg" href="./?page=2">同意协议并开始安装</a></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php echo '<script'; ?>
>
$(".ystep2").loadStep({
 size: "large",
  color: "green",
  steps: [{
	title: "协议",

  },{
	title: "配置",

  },{
	title: "安装",

  },{
  title: "信息",

  },{
	title: "完成",
	
  }]
});
$(".ystep2").setStep(1);
<?php echo '</script'; ?>
><?php }
}
