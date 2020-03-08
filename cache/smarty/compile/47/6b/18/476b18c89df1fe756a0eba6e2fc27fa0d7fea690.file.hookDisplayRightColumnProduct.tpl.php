<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 06:22:24
         compiled from "/var/www/mediaphag/data/www/dev1616/modules/blockpricerange/views/templates/hook/hookDisplayRightColumnProduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15580141135e64c76006f7d1-42654440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '476b18c89df1fe756a0eba6e2fc27fa0d7fea690' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/modules/blockpricerange/views/templates/hook/hookDisplayRightColumnProduct.tpl',
      1 => 1537775928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15580141135e64c76006f7d1-42654440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_price_min' => 0,
    'product_price_max' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64c760079934_36146663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64c760079934_36146663')) {function content_5e64c760079934_36146663($_smarty_tpl) {?>

<div id="blockpricerange" class="block">
    <?php echo smartyTranslate(array('s'=>'Prices range from ','mod'=>'blockpricerange'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['product_price_min']->value)),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'to ','mod'=>'blockpricerange'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['product_price_max']->value)),$_smarty_tpl);?>

</div><?php }} ?>
