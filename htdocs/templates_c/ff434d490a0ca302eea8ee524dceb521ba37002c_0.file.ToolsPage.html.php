<?php
/* Smarty version 3.1.34-dev-7, created on 2019-03-21 07:19:44
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\ToolsPage.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c932d0012bd66_48043172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff434d490a0ca302eea8ee524dceb521ba37002c' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\ToolsPage.html',
      1 => 1553149182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.html' => 1,
    'file:./navigator.html' => 1,
    'file:./breadcrumb.html' => 1,
    'file:./footer.html' => 1,
    'file:./script.html' => 1,
  ),
),false)) {
function content_5c932d0012bd66_48043172 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html ng-app="myApp" lang="ja">
<head><?php $_smarty_tpl->_subTemplateRender('file:./header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body>
	<?php $_smarty_tpl->_subTemplateRender('file:./navigator.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="container-fluid main-conteiner">
		<?php $_smarty_tpl->_subTemplateRender('file:./breadcrumb.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<div class="widget-a">
			<div class="w-body-a">
				<ul class="list-unstyled">
					<li class="item-list-a"><i class="fas fa-angle-right color-b"></i><a href="/tools/csv">CSV解析</a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php $_smarty_tpl->_subTemplateRender('file:./footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php $_smarty_tpl->_subTemplateRender('file:./script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
