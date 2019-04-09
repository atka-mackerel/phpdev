<?php
/* Smarty version 3.1.34-dev-7, created on 2019-03-10 13:49:47
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\ErrorPage.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c8507ebdf1867_34763638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36cad9749a416e0fe976e23098e1255112e4ebc9' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\ErrorPage.html',
      1 => 1552148940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.html' => 1,
    'file:./script.html' => 1,
  ),
),false)) {
function content_5c8507ebdf1867_34763638 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->_subTemplateRender('file:./header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body>
	<div>
		<h2><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
	</div>
	<?php $_smarty_tpl->_subTemplateRender('file:./script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
