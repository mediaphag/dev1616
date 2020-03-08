<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 06:22:23
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/blocksearch/blocksearch-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4791966835e64c75f0a7c48-15646335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35eb08e5649cca81953fac7be2d19d204f948704' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/blocksearch/blocksearch-top.tpl',
      1 => 1475557008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4791966835e64c75f0a7c48-15646335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64c75f0cca67_47073357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64c75f0cca67_47073357')) {function content_5e64c75f0cca67_47073357($_smarty_tpl) {?>
<!-- Block search module TOP --> 
<div class="btn-search">
  	<a class="icon-search2" href="#" id="click_show_search" title="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearch'),$_smarty_tpl);?>
"><em><?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearch'),$_smarty_tpl);?>
</em>
  	</a>
	<div id="search_block_top" class="e-translate-down">
		<div class="form-search">
			<form id="searchbox" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',null,null,null,false,null,true), ENT_QUOTES, 'UTF-8', true);?>
" >
				<input type="hidden" name="controller" value="search" />
				<input type="hidden" name="orderby" value="position" />
				<input type="hidden" name="orderway" value="desc" />
				<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search...','mod'=>'blocksearch'),$_smarty_tpl);?>
" value="<?php echo stripslashes(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
" autocomplete="off"/>
				<button type="submit" name="submit_search" class="search-button fa fa-search"></button> 
			</form>
		</div>
	</div>
</div>
<!-- /Block search module TOP --><?php }} ?>
