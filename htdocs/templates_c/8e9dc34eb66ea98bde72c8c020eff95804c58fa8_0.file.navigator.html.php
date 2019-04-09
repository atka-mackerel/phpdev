<?php
/* Smarty version 3.1.34-dev-7, created on 2019-03-21 06:16:24
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\navigator.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c931e28e80a22_93541083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e9dc34eb66ea98bde72c8c020eff95804c58fa8' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\navigator.html',
      1 => 1553145383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c931e28e80a22_93541083 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
	<div class="container">
		<!-- <a class="navbar-brand" href="#">ブランド</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse"
			data-target="#Navber" aria-controls="Navber" aria-expanded="false"
			aria-label="ナビゲーションの切替">
			<span class="navbar-toggler-icon"></span>
		</button> -->

		<div class="collapse navbar-collapse" id="Navber">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php if ($_smarty_tpl->tpl_vars['activePage']->value === 0) {?>active<?php }?>"><a class="nav-link" href="/">Top</a></li>
				<li class="nav-item <?php if ($_smarty_tpl->tpl_vars['activePage']->value === 1) {?>active<?php }?>"><a class="nav-link" href="/tools">Tools</a></li>
				<!-- <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Links</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Github</a>
						<a
							class="dropdown-item" href="#">メニュー2</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">その他</a>
					</div></li> -->
				<!-- <li class="nav-item"><a class="nav-link disabled" href="#"
					tabindex="-1" aria-disabled="true">無効</a></li> -->
			</ul>
			<!-- <form class="form-inline my-2 my-lg-0">
				<input type="search" class="form-control mr-sm-2"
					placeholder="検索..." aria-label="検索...">
				<button type="submit" class="btn btn-outline-success my-2 my-sm-0">検索</button>
			</form> -->
		</div>
		<!-- /.navbar-collapse -->
	</div>
</nav><?php }
}
