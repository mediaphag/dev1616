<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:04
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/blog-row/ApBlog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14533058575e64bedca67177-61770395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc1294406f955c31b45794b600879ce8c4b8ea05' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/blog-row/ApBlog.tpl',
      1 => 1475557006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14533058575e64bedca67177-61770395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formAtts' => 0,
    'apLiveEdit' => 0,
    'products' => 0,
    'apLiveEditEnd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64bedcaaf0a9_52887705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedcaaf0a9_52887705')) {function content_5e64bedcaaf0a9_52887705($_smarty_tpl) {?>
<!-- @file modules\appagebuilder\views\templates\hook\ApBlog -->
<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['isEnabled'])&&$_smarty_tpl->tpl_vars['formAtts']->value['isEnabled']==true) {?>
<div class="block latest-blogs exclusive appagebuilder <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['class'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['class'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" id="blog-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['form_id'], ENT_QUOTES, 'UTF-8', true);?>
" >
	<?php echo $_smarty_tpl->tpl_vars['apLiveEdit']->value ? $_smarty_tpl->tpl_vars['apLiveEdit']->value : '';?>

	<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['title'])&&!empty($_smarty_tpl->tpl_vars['formAtts']->value['title'])) {?>
	<h4 class="title_block">
		<?php echo rtrim($_smarty_tpl->tpl_vars['formAtts']->value['title']);?>

	</h4>
	<?php }?>
	<div class="block_content">	
		<div class="row">
			<?php if (!empty($_smarty_tpl->tpl_vars['products']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['formAtts']->value['carousel_type']=='boostrap') {?>
					<?php echo $_smarty_tpl->getSubTemplate ('./BlogCarousel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->getSubTemplate ('./BlogOwlCarousel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php }?>
			<?php } else { ?>
				<p class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No blog at this time.','mod'=>'appagebuilder'),$_smarty_tpl);?>
</p>	
			<?php }?>
		</div>
	</div>
	<?php echo $_smarty_tpl->tpl_vars['apLiveEditEnd']->value ? $_smarty_tpl->tpl_vars['apLiveEditEnd']->value : '';?>

</div>
<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_show'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_show']) {?>
    <a class="pull-right" href="<?php echo $_smarty_tpl->tpl_vars['formAtts']->value['leo_blog_helper']->getFontBlogLink();?>
" title="<?php echo smartyTranslate(array('s'=>'View All','mod'=>'appagebuilder'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'View All','mod'=>'appagebuilder'),$_smarty_tpl);?>
</a>
<?php }?>
<?php }?><?php }} ?>
