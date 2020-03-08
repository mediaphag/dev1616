<?php /* Smarty version Smarty-3.1.19, created on 2020-03-07 08:09:12
         compiled from "/var/www/mediaphag/data/www/dev1616/admin590ozb3an/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13050628035e639cf8043987-38578206%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ac2edc9bafd5d1b5733dd945339eddf27e6c11' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/admin590ozb3an/themes/default/template/content.tpl',
      1 => 1524491043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13050628035e639cf8043987-38578206',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e639cf80619b8_68592917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e639cf80619b8_68592917')) {function content_5e639cf80619b8_68592917($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
