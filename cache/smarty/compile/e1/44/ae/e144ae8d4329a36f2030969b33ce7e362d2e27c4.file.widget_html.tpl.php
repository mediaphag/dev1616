<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 06:22:22
         compiled from "/var/www/mediaphag/data/www/dev1616/modules/leobootstrapmenu/views/widgets/widget_html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13838205235e64c75ed27fa2-09367310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e144ae8d4329a36f2030969b33ce7e362d2e27c4' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/modules/leobootstrapmenu/views/widgets/widget_html.tpl',
      1 => 1475557020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13838205235e64c75ed27fa2-09367310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'html' => 0,
    'widget_heading' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64c75ed43035_50028584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64c75ed43035_50028584')) {function content_5e64c75ed43035_50028584($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['html']->value)) {?>
<div class="widget-html">
	<?php if (isset($_smarty_tpl->tpl_vars['widget_heading']->value)&&!empty($_smarty_tpl->tpl_vars['widget_heading']->value)) {?>
	<div class="menu-title">
		<?php echo $_smarty_tpl->tpl_vars['widget_heading']->value;?>

	</div>
	<?php }?>
	<div class="widget-inner">
		<?php echo $_smarty_tpl->tpl_vars['html']->value;?>

	</div>
</div>
<?php }?><?php }} ?>
