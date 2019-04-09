<?php
/* Smarty version 3.1.34-dev-7, created on 2019-04-07 17:25:36
  from 'C:\xampp7.1\htdocs\sleepy-fish\view\template\CsvPage.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5caa1670821a16_24181137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39301d10e06a5544ebb0793a11a32b0835b4c52b' => 
    array (
      0 => 'C:\\xampp7.1\\htdocs\\sleepy-fish\\view\\template\\CsvPage.html',
      1 => 1554650706,
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
function content_5caa1670821a16_24181137 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html ng-app="myApp" lang="ja">
<head><?php $_smarty_tpl->_subTemplateRender('file:./header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>
<body class="contents">
	<?php $_smarty_tpl->_subTemplateRender('file:./navigator.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="container-fluid main-conteiner" ng-cloak ng-controller="AppController">
		<?php $_smarty_tpl->_subTemplateRender('file:./breadcrumb.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<form>
			<div class="row">
				<!-- 入力設定 -->
				<div class="col">
					<h5>入力設定</h5>
					<!-- 区切り文字 -->
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">
								区切り文字<i class="fas fa-question-circle" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
									data-placement="right" data-html="true" data-content="ここで指定した文字で<br/>文字列が区切られます。" title="区切り文字の指定"></i>
							</legend>
							<div class="col-sm-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delimiters" id="delim1" value="," ng-model="delimiter"
										ng-checked="true"> <label class="form-check-label" for="delim1">,（カンマ） </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delimiters" id="delim2" value="\t" ng-model="delimiter">
									<label class="form-check-label" for="delim2">\t（タブ） </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delimiters" id="delim3" value="other" ng-model="delimiter">
									<label class="form-check-label" for="delim3">その他</label>
								</div>
								<div class="form-check">
									<input type="text" class="form-control col-sm-3" ng-model="otherDelimiter" ng-disabled="delimiter !== 'other'" />
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 囲み文字 -->
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">
								囲み文字<i class="fas fa-question-circle" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
									data-placement="right" data-html="true" data-content="ここで指定した文字を<br/>囲み文字として使用します。" title="囲み文字の指定"></i>
							</legend>
							<div class="col-sm-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="enclosures" id="enclosure1" value='"' ng-model="enclosure"
										ng-checked="true"> <label class="form-check-label" for="enclosure1">"（ダブルクォーテーション）</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="enclosures" id="enclosure2" value="" ng-model="enclosure">
									<label class="form-check-label" for="enclosure2">無し</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="enclosures" id="enclosure3" value="other"
										ng-model="enclosure"> <label class="form-check-label" for="enclosure3">その他</label>
								</div>
								<div class="form-check">
									<input type="text" class="form-control col-sm-3" ng-model="otherEnclosure" ng-disabled="enclosure !== 'other'" />
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 入力方法 -->
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">
								入力方法<i class="fas fa-question-circle" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
									data-placement="right" data-html="true"
									data-content="入力方法を選択します。<br/>テキストを選択すると「テキスト入力」エリアが入力可能となります。<br/>ファイルを選択すると「ファイル選択」からファイルの選択が可能となります。"
									title="入力方法の指定"></i>
							</legend>
							<div class="col-sm-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="inputType" id="inputType1" value="0" ng-model="inputType"
										ng-checked="true"> <label class="form-check-label" for="inputType1">テキスト</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="inputType" id="inputType2" value="1" ng-model="inputType">
									<label class="form-check-label" for="inputType2">ファイル</label>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<!-- 出力設定 -->
				<div class="col">
					<h5>出力設定</h5>
					<!-- 区切り文字 -->
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">
								区切り文字<i class="fas fa-question-circle" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
									data-placement="right" data-html="true" data-content="ここで指定した文字によって区切られたCSVデータが出力されます。" title="区切り文字の指定"></i>
							</legend>
							<div class="col-sm-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delimitersOut" id="delimOut1" value=","
										ng-model="delimiterOut" ng-checked="true"> <label class="form-check-label" for="delimOut1">,（カンマ）
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delimitersOut" id="delimOut2" value="\t"
										ng-model="delimiterOut"> <label class="form-check-label" for="delimOut2">\t（タブ） </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delimitersOut" id="delimOut3" value="other"
										ng-model="delimiterOut"> <label class="form-check-label" for="delimOut3">その他</label>
								</div>
								<div class="form-check">
									<input type="text" class="form-control col-sm-3" ng-model="otherDelimiterOut"
										ng-disabled="delimiterOut !== 'other'" />
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 囲み文字 -->
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">
								囲み文字<i class="fas fa-question-circle" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
									data-placement="right" data-html="true" data-content="ここで指定した文字によってカラムが囲まれたCSVデータが出力されます。" title="囲み文字の指定"></i>
							</legend>
							<div class="col-sm-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="enclosuresOut" id="enclosureOut1" value='"'
										ng-model="enclosureOut" ng-checked="true"> <label class="form-check-label" for="enclosureOut1">"（ダブルクォーテーション）
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="enclosuresOut" id="enclosureOut2" value=""
										ng-model="enclosureOut"> <label class="form-check-label" for="enclosureOut2">無し </label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="enclosuresOut" id="enclosureOut3" value="other"
										ng-model="enclosureOut"> <label class="form-check-label" for="enclosureOut3">その他</label>
								</div>
								<div class="form-check">
									<input type="text" class="form-control col-sm-3" ng-model="otherEnclosureOut"
										ng-disabled="enclosureOut !== 'other'" />
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 出力方法 -->
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">
								出力方法<i class="fas fa-question-circle" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
									data-placement="right" data-html="true"
									data-content="出力方法を指定します。<br/>プレビュー表示を選択した場合は、出力結果がブラウザ上のモーダルに表示されます。<br/>ファイルを選択した場合は、出力結果をCSVファイルとしてダウンロード可能です。"
									title="出力方法の指定"></i>
							</legend>
							<div class="col-sm-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="outputType" id="outputType1" value="0" ng-model="outputType"
										ng-checked="true"> <label class="form-check-label" for="outputType1">プレビュー表示</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="outputType" id="outputType2" value="1" ng-model="outputType">
									<label class="form-check-label" for="outputType2">ファイル</label>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<!-- 入力エリア -->
			<div class="form-group row">
				<label class="col-form-label col-sm-1 pt-0">テキスト入力</label>
				<div class="col-sm-11">
					<textarea class="form-control" ng-model="inputData" ng-disabled="inputType === '1'"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-1 pt-0">ファイル選択</label>
				<div class="col-sm-10">
					<input id="uploadFile" name="file" type="file" class="form-control-file" ngf-select ng-model="files"
						ngf-multiple="false" ng-disabled="inputType === '0'" />
				</div>
			</div>
			<button class="btn btn-primary mx-auto" ng-click="parse()" ng-disabled="parseBtnDisabled()">
				<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ng-show="processing"></span> CVS解析
			</button>

			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" ng-disabled="!result">結果表示</button>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<!-- 結果表示 -->
							<h5>プレビュー表示</h5>
							<!-- タブ部分 -->
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li class="nav-item"><a href="#text" id="text-tab" class="nav-link active" role="tab" data-toggle="tab"
									aria-controls="text" aria-selected="true">テキスト表示</a></li>
								<li class="nav-item"><a href="#table" id="table-tab" class="nav-link" role="tab" data-toggle="tab"
									aria-controls="table" aria-selected="false">テーブル表示</a></li>
							</ul>

							<!-- パネル部分 -->
							<div id="myTabContent" class="tab-content mt-3">
								<div id="text" class="tab-pane active" role="tabpanel" aria-labelledby="text-tab">
									<!-- <input type="text" class="invisible" id="clipboardText" ng-model="resultText" /> -->
									<button class="btn btn-sm btn-outline-secondary float-right clipboardBtn" data-clipboard-target="#clipboardText">コピー</button>
									
									<textarea id="clipboardText" class="previewText">{{resultText}}</textarea>
									
									<!-- <pre>
<code ng-bind-html="resultText | newlines"></code>
</pre> -->
								</div>
								<div id="table" class="tab-pane table-responsive" role="tabpanel" aria-labelledby="table-tab">
									<table class="table table-striped table-sm text-nowrap">
										<thead class="thead-dark" ng-if="hasHeader">
											<tr>
												<th ng-repeat="col in result[0] track by $index" ng-bind-html="col | newlines"></th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="row in result track by $index" ng-if="!(hasHeader && $index === 0)">
												<td ng-repeat="col in row track by $index" ng-bind-html="col | newlines"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

		<?php $_smarty_tpl->_subTemplateRender('file:./footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</div>

	<?php $_smarty_tpl->_subTemplateRender('file:./script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/js/csv/app.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
