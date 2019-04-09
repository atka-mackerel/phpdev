<?php
/* Smarty version 3.1.34-dev-7, created on 2019-03-16 10:12:35
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\AlertPage.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c8cbe03d32eb2_53442124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb2214d92efbd8d59e5786d93eacb7b071ffc150' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\AlertPage.html',
      1 => 1552709376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8cbe03d32eb2_53442124 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<?php echo '<script'; ?>
>
	!callbackFunc || callbackFunc();
	alert('<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
');
<?php echo '</script'; ?>
>
</head>
</html>
<?php }
}
