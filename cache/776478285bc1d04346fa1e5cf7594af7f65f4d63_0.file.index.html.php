<?php
/* Smarty version 3.1.33, created on 2019-02-28 11:46:54
  from 'G:\phpStudy\PHPTutorial\WWW\pan\install\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c77ca2e0bba63_38980306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '776478285bc1d04346fa1e5cf7594af7f65f4d63' => 
    array (
      0 => 'G:\\phpStudy\\PHPTutorial\\WWW\\pan\\install\\templates\\index.html',
      1 => 1551354411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c77ca2e0bba63_38980306 (Smarty_Internal_Template $_smarty_tpl) {
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
            <p>1.本程序由<a href="https://www.imoecg.com">一只大萝北</a>独立开发</p>
            <p>2.采用Bootstrap前端框架</p>
            <p>3.采用danielmg插件</p>
            <p>4.从零写起的Pure</p>
            <p>使用本程序须知以下:</p>
            <p>1.本程序为个人练手项目,并非成熟项目</p>
            <p>2.本程序所有权:一只大萝北</p>
            <p>3.您可以使用本程序作为二次开发,但需保留本程序中开发者版权信息</p>
            <p>4.使用过程中请保留&#60;a href="https://www.imoecg.com"&#62;一只大萝北&#60;/a&#62;作为底部链接</p>
            <p>本程序使用<a href="http://www.gnu.org/licenses/quick-guide-gplv3.html" target="_blank"> GPL V3许可证</a></p>
             <p>0.此许可证适用于任何包含版权所有者声明的程序和其他作品，版权所有者在声明中明确说明程序和作品可以在GPL条款的约束下发布。下面提到的“程序”指的是任何这样的程序或作品。而“基于程序的作品”指的是程序或者任何受版权法约束的衍生作品。也就是说包含程序或程序的一部分的作品。可以是原封不动的，或经过修改的和/或翻译成其他语言的（程序）。在下文中，翻译包含在修改的条款中。每个许可证接受人（licensee）用你来称呼。许可证条款不适用于复制，发布和修改以外的活动。这些活动超出这些条款的范围。运行程序的活动不受条款的限止。仅当程序的输出构成基于程序作品的内容时，这一条款才适用（如果只运行程序就无关）。是否普遍适用取决于程序具体用来做什么。</p>
            <p>1.只要你在每一副本上明显和恰当地出版版权声明和不承担担保声明，保持此许可证的声明和没有担保的声明完整无损，并和程序一起给每个其他的程序接受者一份许可证的副本，你就可以用任何媒体复制和发布你收到的原始的程序的源代码。你可以为转让副本的实际行动收取一定费用。你也有权选择提供担保以换取一定的费用。</p>
            <p>2.你可以修改程序的一个或几个副本或程序的任何部分，以此形成基于程序的作品。只要你同时满足下面的所有条件，你就可以按前面第一款的要求复制和发布这一经过修改的程序或作品。</p>
            <p>a） 你必须在修改的文件中附有明确的说明：你修改了这一文件及具体的修改日期。</p>
            <p>b） 你必须使你发布或出版的作品（它包含程序的全部或一部分，或包含由程序的全部或部分衍生的作品）允许第三方作为整体按许可证条款免费使用。</p>
            <p>c） 如果修改的程序在运行时以交互方式读取命令，你必须使它在开始进入常规的交互使用方式时打印或显示声明：包括适当的版权声明和没有担保的声明（或者你提供担保的声明）；用户可以按此许可证条款重新发布程序的说明；并告诉用户如何看到这一许可证的副本。（例外的情况：如果原始程序以交互方式工作，它并不打印这样的声明，你的基于程序的作品也就不用打印声明）。
            这些要求适用于修改了的作品的整体。如果能够确定作品的一部分并非程序的衍生产品，可以合理地认为这部分是独立的，是不同的作品。当你将它作为独立作品发布时，它不受此许可证和它的条款的约束。但是当你将这部分作为基于程序的作品的一部分发布时，作为整体它将受到许可证条款约束。准予其他许可证持有人的使用范围扩大到整个产品。也就是每个部分，不管它是谁写的。因此，本条款的意图不在于索取权利；或剥夺全部由你写成的作品的权利。而是履行权利来控制基于程序的集体作品或衍生作品的发布。此外，将与程序无关的作品和该程序或基于程序的作品一起放在存贮体或发布媒体的同一卷上，并不导致将其他作品置于此许可证的约束范围之内。</p>
            <p>3.你可以以目标码或可执行形式复制或发布程序（或符合第2款的基于程序的作品)，只要你遵守前面的第1，2款，并同时满足下列3条中的1条。</p>
            <p>a）在通常用作软件交换的媒体上，和目标码一起附有机器可读的完整的源码。这些源码的发布应符合上面第1，2款的要求。或者</p>
            <p>b）在通常用作软件交换的媒体上，和目标码一起，附有给第三方提供相应的机器可读的源码的书面报价。有效期不少于3年，费用不超过实际完成源程序发布的实际成本。源码的发布应符合上面的第1，2款的要求。或者</p>
            <p>c）和目标码一起，附有你收到的发布源码的报价信息。（这一条款只适用于非商业性发布，而且你只收到程序的目标码或可执行代码和按b）款要求提供的报价）。作品的源码指的是对作品进行修改最优先择取的形式。对可执行的作品讲，完整的源码包括：所有模块的所有源程序，加上有关的接口的定义，加上控制可执行作品的安装和编译的script。作为特殊例外，发布的源码不必包含任何常规发布的供可执行代码在上面运行的操作系统的主要组成部分（如编译程序，内核等）。除非这些组成部分和可执行作品结合在一起。如果采用提供对指定地点的访问和复制的方式发布可执行码或目标码，那么，提供对同一地点的访问和复制源码可以算作源码的发布，即使第三方不强求与目标码一起复制源码。</p>
            <p>4.除非你明确按许可证提出的要求去做，否则你不能复制，修改，转发许可证和发布程序。任何试图用其他方式复制，修改，转发许可证和发布程序是无效的。而且将自动结束许可证赋予你的权利。然而，对那些从你那里按许可证条款得到副本和权利的人们，只要他们继续全面履行条款，许可证赋予他们的权利仍然有效。</p>
            <p>5.你没有在许可证上签字，因而你没有必要一定接受这一许可证。然而，没有任何其他东西赋予你修改和发布程序及其衍生作品的权利。如果你不接受许可证，这些行为是法律禁止的。因此，如果你修改或发布程序（或任何基于程序的作品），你就表明你接受这一许可证以及它的所有有关复制，发布和修改程序或基于程序的作品的条款和条件。</p>
            <p>6.每当你重新发布程序（或任何基于程序的作品）时，接受者自动从原始许可证颁发者那里接到受这些条款和条件支配的复制，发布或修改程序的许可证。你不可以对接受者履行这里赋予他们的权利强加其他限制。你也没有强求第三方履行许可证条款的义务。</p>
            <p>7.如果由于法院判决或违反专利的指控或任何其他原因（不限于专利问题）的结果，强加于你的条件（不管是法院判决，协议或其他）和许可证的条件有冲突。他们也不能用许可证条款为你开脱。在你不能同时满足本许可证规定的义务及其他相关的义务时，作为结果，你可以根本不发布程序。例如，如果某一专利许可证不允许所有那些直接或间接从你那里接受副本的人们在不付专利费的情况下重新发布程序，唯一能同时满足两方面要求的办法是停止发布程序。</p>
            <p>如果本条款的任何部分在特定的环境下无效或无法实施，就使用条款的其余部分。并将条款作为整体用于其他环境。本条款的目的不在于引诱你侵犯专利或其他财产权的要求，或争论这种要求的有效性。本条款的主要目的在于保护自由软件发布系统的完整性。它是通过通用公共许可证的应用来实现的。许多人坚持应用这一系统，已经为通过这一系统发布大量自由软件作出慷慨的供献。作者/捐献者有权决定他/她是否通过任何其他系统发布软件。许可证持有人不能强制这种选择。
            本节的目的在于明确说明许可证其余部分可能产生的结果。</p>
            <p>8.如果由于专利或者由于有版权的接口问题使程序在某些国家的发布和使用受到限止，将此程序置于许可证约束下的原始版权拥有者可以增加限止发布地区的条款，将这些国家明确排除在外。并在这些国家以外的地区发布程序。在这种情况下，许可证包含的限止条款和许可证正文一样有效。</p>
            <p>9
            自由软件基金会可能随时出版通用公共许可证的修改版或新版。新版和当前的版本在原则上保持一致，但在提到新问题时或有关事项时，在细节上可能出现差别。
            每一版本都有不同的版本号。如果程序指定适用于它的许可证版本号以及“任何更新的版本”。你有权选择遵循指定的版本或自由软件基金会以后出版的新版本，如果程序未指定许可证版本，你可选择自由软件基金会已经出版的任何版本。
            <p>10.如果你愿意将程序的一部分结合到其他自由程序中，而它们的发布条件不同。写信给作者，要求准予使用。如果是自由软件基金会加以版权保护的软件，写信给自由软件基金会。我们有时会作为例外的情况处理。我们的决定受两个主要目标的指导。这两个主要目标是：我们的自由软件的衍生作品继续保持自由状态。以及从整体上促进软件的共享和重复利用。
            没有担保</p>
            <p>11.由于程序准予免费使用，在适用法准许的范围内，对程序没有担保。除非另有书面说明，版权所有者和/或其他提供程序的人们“一样”不提供任何类型的担保。不论是明确的，还是隐含的。包括但不限于隐含的适销和适合特定用途的保证。全部的风险，如程序的质量和性能问题都由你来承担。如果程序出现缺陷，你承担所有必要的服务，修复和改正的费用。</p>
            <p>12.除非适用法或书面协议的要求，在任何情况下，任何版权所有者或任何按许可证条款修改和发布程序的人们都不对你的损失负有任何责任。包括由于使用或不能使用程序引起的任何一般的，特殊的，偶然发生的或重大的损失（包括但不限于数据的损失，或者数据变得不精确，或者你或第三方的持续的损失，或者程序不能和其他程序协调运行等）。即使版权所有者和其他人提到这种损失的可能性也不例外。</p>
            <p>最后的条款和条件</p>
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
