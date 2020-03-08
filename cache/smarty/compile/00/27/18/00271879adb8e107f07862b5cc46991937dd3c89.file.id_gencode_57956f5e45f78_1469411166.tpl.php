<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:03
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/profiles/profile1472820222/id_gencode_57956f5e45f78_1469411166.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15721431115e64bedb01c776-22782869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00271879adb8e107f07862b5cc46991937dd3c89' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/profiles/profile1472820222/id_gencode_57956f5e45f78_1469411166.tpl',
      1 => 1583660762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15721431115e64bedb01c776-22782869',
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
  'unifunc' => 'content_5e64bedb054e82_84166760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedb054e82_84166760')) {function content_5e64bedb054e82_84166760($_smarty_tpl) {?>                                    <a href="<?php if ($_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">                                        <img class="logo img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['logo_image_width']->value)&&$_smarty_tpl->tpl_vars['logo_image_width']->value) {?> width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['logo_image_height']->value)&&$_smarty_tpl->tpl_vars['logo_image_height']->value) {?> height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
"<?php }?>/>                                    </a><?php }} ?>
