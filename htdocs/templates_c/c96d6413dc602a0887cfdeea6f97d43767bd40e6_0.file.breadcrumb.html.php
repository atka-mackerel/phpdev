<?php
/* Smarty version 3.1.34-dev-7, created on 2019-03-21 07:14:08
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\breadcrumb.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c932bb0476327_07174556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c96d6413dc602a0887cfdeea6f97d43767bd40e6' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\breadcrumb.html',
      1 => 1553148845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c932bb0476327_07174556 (Smarty_Internal_Template $_smarty_tpl) {
?><nav aria-label="パンくずリスト">
	<ol class="breadcrumb">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumb']->value, 'item', true);
$_smarty_tpl->tpl_vars['item']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->iteration++;
$_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>
			<?php if ($_smarty_tpl->tpl_vars['item']->last) {?>
				<li class="breadcrumb-item active" aria-current="page">
			<?php } else { ?>
				<li class="breadcrumb-item" aria-current="page">
			<?php }?>
			<?php if (!$_smarty_tpl->tpl_vars['item']->last) {?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
			<?php } else { ?>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

			<?php }?>
			</li>
		<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
</nav><?php }
}
