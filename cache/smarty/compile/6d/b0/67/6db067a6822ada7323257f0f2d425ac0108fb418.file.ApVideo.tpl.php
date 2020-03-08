<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:04
         compiled from "/var/www/mediaphag/data/www/dev1616/modules/appagebuilder/views/templates/hook/ApVideo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1572146885e64bedc6c1ad6-00220136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6db067a6822ada7323257f0f2d425ac0108fb418' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/modules/appagebuilder/views/templates/hook/ApVideo.tpl',
      1 => 1475557018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1572146885e64bedc6c1ad6-00220136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formAtts' => 0,
    'apLiveEdit' => 0,
    'apLiveEditEnd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64bedc70dd97_34240486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedc70dd97_34240486')) {function content_5e64bedc70dd97_34240486($_smarty_tpl) {?>
 <!-- @file modules\appagebuilder\views\templates\hook\ApVideo -->
 <div id="video-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['form_id'], ENT_QUOTES, 'UTF-8', true);?>
" class="video" style="clear:both;">
	<?php echo $_smarty_tpl->tpl_vars['apLiveEdit']->value ? $_smarty_tpl->tpl_vars['apLiveEdit']->value : '';?>

	<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['title'])&&!empty($_smarty_tpl->tpl_vars['formAtts']->value['title'])) {?>
	<h4 class="title_block">
		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['title'], ENT_QUOTES, 'UTF-8', true);?>

	</h4>
	<?php }?>
	<div style="text-align:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['align'], ENT_QUOTES, 'UTF-8', true);?>
">
		<?php echo isset($_smarty_tpl->tpl_vars['formAtts']->value['content_html']) ? $_smarty_tpl->tpl_vars['formAtts']->value['content_html'] : '';?>

	</div>
	<?php echo $_smarty_tpl->tpl_vars['apLiveEditEnd']->value ? $_smarty_tpl->tpl_vars['apLiveEditEnd']->value : '';?>

</div><?php }} ?>
