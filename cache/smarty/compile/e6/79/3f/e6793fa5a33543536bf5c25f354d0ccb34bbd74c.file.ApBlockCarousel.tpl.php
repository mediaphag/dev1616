<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:04
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/testimonials/ApBlockCarousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1664885835e64bedc74aa70-47354651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6793fa5a33543536bf5c25f354d0ccb34bbd74c' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/testimonials/ApBlockCarousel.tpl',
      1 => 1475557006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1664885835e64bedc74aa70-47354651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'apLiveEdit' => 0,
    'formAtts' => 0,
    'apLiveEditEnd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64bedc7623c9_69737191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedc7623c9_69737191')) {function content_5e64bedc7623c9_69737191($_smarty_tpl) {?>
<!-- @file modules\appagebuilder\views\templates\hook\ApBlockCarousel -->
<div class="block block_carousel exclusive testimonials appagebuilder">
	<?php echo $_smarty_tpl->tpl_vars['apLiveEdit']->value ? $_smarty_tpl->tpl_vars['apLiveEdit']->value : '';?>

	<div class="block_content">
		
			<?php if (!empty($_smarty_tpl->tpl_vars['formAtts']->value['slides'])) {?>
				<?php if ($_smarty_tpl->tpl_vars['formAtts']->value['carousel_type']=='boostrap') {?>
					<?php echo $_smarty_tpl->getSubTemplate ('./ApBlockCarouselItem.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->getSubTemplate ('./ApBlockOwlCarouselItem.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php }?>
			<?php } else { ?>
				<p class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No slide at this time.','mod'=>'appagebuilder'),$_smarty_tpl);?>
</p>
			<?php }?>
		
	</div>
	<?php echo $_smarty_tpl->tpl_vars['apLiveEditEnd']->value ? $_smarty_tpl->tpl_vars['apLiveEditEnd']->value : '';?>

</div><?php }} ?>
