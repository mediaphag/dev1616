<?php /* Smarty version Smarty-3.1.19, created on 2020-03-07 11:33:53
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17953261185e63ccf1840bc8-17941353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b100dc2c4856c6995673f830e4ebd9c5d174df2' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/404.tpl',
      1 => 1475557002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17953261185e63ccf1840bc8-17941353',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'force_ssl' => 0,
    'base_dir_ssl' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e63ccf18818f5_21565110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e63ccf18818f5_21565110')) {function content_5e63ccf18818f5_21565110($_smarty_tpl) {?>
<div class="pagenotfound">
	<h1><?php echo smartyTranslate(array('s'=>'This page is not available'),$_smarty_tpl);?>
</h1>

	<p>
		<?php echo smartyTranslate(array('s'=>'We\'re sorry, but the Web address you\'ve entered is no longer available.'),$_smarty_tpl);?>

	</p>

	<h3><?php echo smartyTranslate(array('s'=>'To find a product, please type its name in the field below.'),$_smarty_tpl);?>
</h3>
	<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" method="post" class="std">
		<fieldset>
			<div>
				<label for="search_query"><?php echo smartyTranslate(array('s'=>'Search our product catalog:'),$_smarty_tpl);?>
</label>
				<input id="search_query" name="search_query" type="text" class="form-control grey" />
                <button type="submit" name="Submit" value="OK" class="btn btn-outline button button-small btn-sm"><span><?php echo smartyTranslate(array('s'=>'Ok'),$_smarty_tpl);?>
</span></button>
			</div>
		</fieldset>
	</form>

	<div class="buttons"><a class="btn btn-outline button button-medium" href="<?php if (isset($_smarty_tpl->tpl_vars['force_ssl']->value)&&$_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>" title="<?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
"><span><?php echo smartyTranslate(array('s'=>'Home page'),$_smarty_tpl);?>
</span></a></div>
</div>
<?php }} ?>
