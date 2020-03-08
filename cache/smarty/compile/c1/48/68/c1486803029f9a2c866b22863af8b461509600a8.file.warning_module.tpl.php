<?php /* Smarty version Smarty-3.1.19, created on 2020-03-07 08:08:55
         compiled from "/var/www/mediaphag/data/www/dev1616/admin590ozb3an/themes/default/template/controllers/modules/warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1664546585e639ce7c138c9-90174313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1486803029f9a2c866b22863af8b461509600a8' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/admin590ozb3an/themes/default/template/controllers/modules/warning_module.tpl',
      1 => 1524491043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1664546585e639ce7c138c9-90174313',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_link' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e639ce7c55504_37859462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e639ce7c55504_37859462')) {function content_5e639ce7c55504_37859462($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a>
<?php }} ?>
