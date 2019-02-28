<?php
/* Smarty version 3.1.33, created on 2019-02-28 12:02:40
  from 'G:\phpStudy\PHPTutorial\WWW\pan\install\templates\info.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c77cde0ed0e18_64454244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e15e3842ffcd343d04f2286036465a44a5d78f0' => 
    array (
      0 => 'G:\\phpStudy\\PHPTutorial\\WWW\\pan\\install\\templates\\info.html',
      1 => 1551182248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c77cde0ed0e18_64454244 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>大萝北网盘安装向导-填写信息</title>
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
.z {
	height: 99px;
	margin-left: 2PX;
	width: 300px;
	float: left;
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
.te {
	font-size: 20px;
	color: #CCC;
	margin-left: 45px;
}
.head {
	font-size: 30px;
	margin-left: 140px;
	margin-top: 10px;
	position: absolute;
}
.logo {
	background-image: url(logo.png);
	margin-top: 10px;
	margin-left: 50px;
	width: 85px;
	height: 71px;
	float: left;
}
.top {
	height: 100px;
	border-bottom: 1px solid #e7e7e7;
}
.zhu {
	margin-top: 30px;
	width: 900px;
	margin-bottom: 20px;
	border: 1px solid #e7e7e7;
	box-shadow: 0px 0px 2px #BABABA;
}
body {
	font-family: "微软雅黑";
}
</style>
<body>
<div align="center">
<div class="zhu">
<div class="top">
  <div class="logo"></div>
  <div class="head">
    <div>大萝北网盘</div>
    <div class="te" align="rgiht">安装向导</div>
  </div>
  <div class="ystep2" align="left"></div>
</div>
<div class="contain" align="left">
  <div id="gc">
    <div style="display:none;"class="alert alert-danger" id="cw"role="alert"></div>
    <tr>
      <td colspan="2"style="font-family: '微软雅黑';"><h3 align="center" >网站信息：</h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>网站信息</strong></p>
        <form name="form1" id="form1"action="./?page=4" method="post">
          <div align="center" style="font-family: '微软雅黑';">
          <table width="635" border="0">
          <tr>
            <td width="112">站点主标题：</td>
            <td width="245"><input type="text" value="大萝北网盘" class="form-control" name="title"></td>
            <td >*站点的主标题</td>
          </tr>
          <tr>
            <td>站点副标题：</td>
            <td><input type="text"value="一只大萝北哟" class="form-control" name="vicetitle"></td>
            <td >*站点的副标题，紧随主标题后的介绍文字</td>
          </tr>
          <tr>
            <td>主站URL：</td>
            <td><input type="text"value="http://<?php echo $_smarty_tpl->tpl_vars['servername']->value;?>
" class="form-control" name="url"></td>
            <td>*主站URL，注意填写http://或https://</td>
          </tr>
          <tr>
            <td>站点描述：</td>
            <td><input type="text"value="一只大萝北哟" class="form-control" name="describe"></td>
            <td>*用于描述站点的介绍性文字</td>
          </tr>
           <tr>
              <td colspan="3"><strong>管理员信息</strong></td>
            </tr>
          <tr>
            <td>管理员邮箱：</td>
            <td><input type="email"class="form-control" name="email"></td>
            <td>*管理员邮箱</td>
          </tr>
          <tr>
            <td>管理员账户：</td>
            <td><input type="text"class="form-control" name="aname"></td>
            <td>*管理员登录账号名</td>
          </tr>
          <tr>
            <td>管理员密码：</td>
            <td><input type="text"class="form-control" name="apwd"></td>
            <td>*管理员登录账号密码</td>
          </tr>
          <tr>
            <td>干扰码：</td>
            <td><input type="text"class="form-control" value="www.imoecg.com" name="jam"></td>
            <td>*干扰码</td>
          </tr>
          <tr>
        </table>
          <div style="position:relative; left:-70px;top:10px;"align="center">
            <input type="submit" name="" value="开始安装" class="btn btn-success btn-lg">
          </div>
        </form>
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
$(".ystep2").setStep(4);
<?php echo '</script'; ?>
><?php }
}
