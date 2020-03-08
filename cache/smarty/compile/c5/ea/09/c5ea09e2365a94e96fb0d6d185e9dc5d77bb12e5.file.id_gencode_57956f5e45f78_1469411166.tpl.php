<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 06:22:22
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/profiles/profile1469378058/id_gencode_57956f5e45f78_1469411166.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4700301655e64c75edf82e1-71213652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5ea09e2365a94e96fb0d6d185e9dc5d77bb12e5' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/profiles/profile1469378058/id_gencode_57956f5e45f78_1469411166.tpl',
      1 => 1583662942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4700301655e64c75edf82e1-71213652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'force_ssl' => 0,
    'base_dir_ssl' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64c75ee2e359_30719366',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64c75ee2e359_30719366')) {function content_5e64c75ee2e359_30719366($_smarty_tpl) {?>                                    <a href="<?php if ($_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">                                        <img class="logo img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['logo_image_width']->value)&&$_smarty_tpl->tpl_vars['logo_image_width']->value) {?> width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['logo_image_height']->value)&&$_smarty_tpl->tpl_vars['logo_image_height']->value) {?> height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
"<?php }?>/>                                    </a><?php }} ?>
