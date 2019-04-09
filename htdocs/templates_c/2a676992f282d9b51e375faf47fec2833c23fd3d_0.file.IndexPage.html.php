<?php
/* Smarty version 3.1.34-dev-7, created on 2019-03-21 07:34:03
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\IndexPage.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c93305b27ae89_96703781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a676992f282d9b51e375faf47fec2833c23fd3d' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\IndexPage.html',
      1 => 1553150040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.html' => 1,
    'file:./navigator.html' => 1,
    'file:./footer.html' => 1,
    'file:./script.html' => 1,
  ),
),false)) {
function content_5c93305b27ae89_96703781 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html ng-app="myApp" lang="ja">
<head><?php $_smarty_tpl->_subTemplateRender('file:./header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body>
	<?php $_smarty_tpl->_subTemplateRender('file:./navigator.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="container-fluid main-conteiner">
		このページはPHPの勉強用に作成したページです。
	</div>

	<?php $_smarty_tpl->_subTemplateRender('file:./footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php $_smarty_tpl->_subTemplateRender('file:./script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
