<?php /*%%SmartyHeaderCode:12276883045ba69846222140-89751837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '12276883045ba69846222140-89751837',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c758605ae97c5_45978135',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c758605ae97c5_45978135')) {function content_5c758605ae97c5_45978135($_smarty_tpl) {?><!-- Block search module TOP --> 
<div class="btn-search">
  	<a class="icon-search2" href="#" id="click_show_search" title="Search"><em>Search</em>
  	</a>
	<div id="search_block_top" class="e-translate-down">
		<div class="form-search">
			<form id="searchbox" method="get" action="//dev1616.freedomain.thehost.com.ua/en/search" >
				<input type="hidden" name="controller" value="search" />
				<input type="hidden" name="orderby" value="position" />
				<input type="hidden" name="orderway" value="desc" />
				<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Search..." value="" autocomplete="off"/>
				<button type="submit" name="submit_search" class="search-button fa fa-search"></button> 
			</form>
		</div>
	</div>
</div>
<!-- /Block search module TOP --><?php }} ?>
