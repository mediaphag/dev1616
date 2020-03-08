<?php /* Smarty version Smarty-3.1.19, created on 2020-03-07 08:09:12
         compiled from "/var/www/mediaphag/data/www/dev1616/admin590ozb3an/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7834345055e639cf81db6e8-44381868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023364404f1c45d8b333723ce62fa239aba82360' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/admin590ozb3an/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1524491044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7834345055e639cf81db6e8-44381868',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e639cf81ddfb2_13582860',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e639cf81ddfb2_13582860')) {function content_5e639cf81ddfb2_13582860($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
