<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:04
         compiled from "/var/www/mediaphag/data/www/dev1616/modules/blockpricerange/views/templates/hook/hookDisplayProductListReviews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21429204455e64bedc22fa10-34404712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9007a045bc74521a94b0501884114ba54c6532d' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/modules/blockpricerange/views/templates/hook/hookDisplayProductListReviews.tpl',
      1 => 1537775928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21429204455e64bedc22fa10-34404712',
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
  'unifunc' => 'content_5e64bedc239b13_43583373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedc239b13_43583373')) {function content_5e64bedc239b13_43583373($_smarty_tpl) {?>

<div id="blockpricerange" class="block">
    <?php echo smartyTranslate(array('s'=>'Prices range from ','mod'=>'blockpricerange'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['product_price_min']->value)),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'to ','mod'=>'blockpricerange'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['product_price_max']->value)),$_smarty_tpl);?>

</div><?php }} ?>
