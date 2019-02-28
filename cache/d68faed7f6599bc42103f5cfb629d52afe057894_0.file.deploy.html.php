<?php
/* Smarty version 3.1.33, created on 2019-02-28 12:02:30
  from 'G:\phpStudy\PHPTutorial\WWW\pan\install\templates\deploy.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c77cdd6292dd0_38280442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd68faed7f6599bc42103f5cfb629d52afe057894' => 
    array (
      0 => 'G:\\phpStudy\\PHPTutorial\\WWW\\pan\\install\\templates\\deploy.html',
      1 => 1550824482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c77cdd6292dd0_38280442 (Smarty_Internal_Template $_smarty_tpl) {
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
	background-image: url(../admin/images/logo.png);
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
      <td colspan="2"style="font-family: '微软雅黑';"><h3 align="center" >请填写数据库信息：</h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>数据库信息</strong></p>
        <form name="form1" id="form1"action="./?page=3" method="post">
          <div align="center" style="font-family: '微软雅黑';">
          <table width="635" border="0">
          <tr>
            <td width="112">数据库服务器：</td>
            <td width="245"><input type="text" value="localhost" class="form-control" name="host"></td>
            <td width="264">*数据库的服务器地址，一般为localhost</td>
          </tr>
          <tr>
            <td>数据库端口：</td>
            <td><input type="text"value="3306" class="form-control" name="port"></td>
            <td>*</td>
          </tr>
          <tr>
            <td>数据库用户名：</td>
            <td><input type="text"value="root" class="form-control" name="name"></td>
            <td>*</td>
          </tr>
          <tr>
            <td>数据库密码：</td>
            <td><input type="text"value="root" class="form-control" name="pwd"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>数据库名：</td>
            <td><input type="text"class="form-control" name="db"></td>
            <td>*</td>
          </tr>
          <tr>
            <td>数据库表前缀：</td>
            <td><input type="text"class="form-control" name="prefix" value="lb_"></td>
            <td>*</td>
          </tr>
          <tr>
        </table>
          <div style="position:relative; left:-70px;top:10px;"align="center">
            <input type="submit" name="" value="开始安装" class="btn btn-success btn-lg">
          </div>
        </form>
        
  </div>
  </td>
  </tr>

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
$(".ystep2").setStep(2);
<?php echo '</script'; ?>
><?php }
}
