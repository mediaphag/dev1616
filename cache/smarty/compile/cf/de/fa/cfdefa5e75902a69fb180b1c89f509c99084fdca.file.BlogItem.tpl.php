<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:04
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/blog-row/BlogItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9132482095e64bedcb81b16-77596840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfdefa5e75902a69fb180b1c89f509c99084fdca' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/blog-row/BlogItem.tpl',
      1 => 1475557006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9132482095e64bedcb81b16-77596840',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blog' => 0,
    'formAtts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64bedcc5c400_36650489',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedcc5c400_36650489')) {function content_5e64bedcc5c400_36650489($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/mediaphag/data/www/dev1616/tools/smarty/plugins/modifier.date_format.php';
?>
<!-- @file modules\appagebuilder\views\templates\hook\BlogItem -->
<div class="blog-container row" itemscope itemtype="https://schema.org/Blog">
    <div class="left-block col-md-7 col-sm-7 col-xs-7 col-sp-12">
        <div class="blog-image-container">
            <a class="blog_img_link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url">
			<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_sima'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_sima']) {?>
				<img class="replace-2x img-responsive" src="<?php if ((isset($_smarty_tpl->tpl_vars['blog']->value['preview_thumb_url'])&&$_smarty_tpl->tpl_vars['blog']->value['preview_thumb_url']!='')) {?><?php echo $_smarty_tpl->tpl_vars['blog']->value['preview_thumb_url'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['blog']->value['preview_url'];?>
<?php }?>" 
					 alt="<?php if (!empty($_smarty_tpl->tpl_vars['blog']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" 
					 title="<?php if (!empty($_smarty_tpl->tpl_vars['blog']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" 
					 <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_width'])) {?>width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_width'], ENT_QUOTES, 'UTF-8', true);?>
" <?php }?>
					 <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_height'])) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_height'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>
					 itemprop="image" />
			<?php }?>
            </a>

			<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_scre'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_scre']) {?>
				<span class="created"><span class=""></span>
					<span class="created-icon icon-clock2"></span> 
					<time class="date" datetime="<?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['blog']->value['date_add']),"%Y");?>
">
						
						<!-- year -->
						<?php echo smartyTranslate(array('s'=>smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['blog']->value['date_add']),"%Y/"),'mod'=>'appagebuilder'),$_smarty_tpl);?>
	
						<!-- month-->
						<?php echo smartyTranslate(array('s'=>smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['blog']->value['date_add']),"%m/"),'mod'=>'appagebuilder'),$_smarty_tpl);?>

						<!-- day of month -->
						<?php echo smartyTranslate(array('s'=>smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['blog']->value['date_add']),"%d"),'mod'=>'appagebuilder'),$_smarty_tpl);?>

						<!-- end day of month -->

					</time>
				</span>
			<?php }?>

        </div>
    </div>
    <div class="right-block col-md-5 col-sm-5 col-xs-5 col-sp-12">
		<div class="blog-meta">
			<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_saut'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_saut']) {?>
			<span class="author">
				<i class="author-icon icon-user"></i> 
				<span class="meta-value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['author'], ENT_QUOTES, 'UTF-8', true);?>
</span>
			</span>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_scat'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_scat']) {?>
			<span class="cate">
				<i class="cate-icon icon-paper-stack"></i>
				<a href="<?php echo $_smarty_tpl->tpl_vars['blog']->value['category_link'];?>
" class="meta-value" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['category_title'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['category_title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
				
			</span>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_scoun'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_scoun']) {?>
			<span class="nbcomment">
				<i class="comment-icon icon-speech-bubble"></i> <span class="meta-value"> (<?php echo intval($_smarty_tpl->tpl_vars['blog']->value['comment_count']);?>
)</span>
			</span>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_shits'])&&$_smarty_tpl->tpl_vars['formAtts']->value['bleoblogs_shits']) {?>
			<span class="hits">
				<i class="hits-icon icon-heart"></i>
				<span class="meta-value"> (<?php echo intval($_smarty_tpl->tpl_vars['blog']->value['hits']);?>
)</span> 
			</span>	
			<?php }?>
		</div>
		
        <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['show_title'])&&$_smarty_tpl->tpl_vars['formAtts']->value['show_title']) {?>
        <h5 class="blog-title" itemprop="name"><a href="<?php echo $_smarty_tpl->tpl_vars['blog']->value['link'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['title']),80,'...');?>
</a></h5>
        <?php }?>

		
		<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['show_desc'])&&$_smarty_tpl->tpl_vars['formAtts']->value['show_desc']) {?>
        <p class="blog-desc" itemprop="description">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['description']),80,'...');?>

        </p>
        <?php }?>
        <p class="btn-more">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['blog']->value['link'];?>
" class="more btn btn-default" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smartyTranslate(array('s'=>'Read more','mod'=>'appagebuilder'),$_smarty_tpl);?>
</a>
        </p>
    </div>
</div>

<!---
	Translation Day of Week - NOT REMOVE
	<?php echo smartyTranslate(array('s'=>'Sunday','mod'=>'appagebuilder'),$_smarty_tpl);?>

	<?php echo smartyTranslate(array('s'=>'Monday','mod'=>'appagebuilder'),$_smarty_tpl);?>

	<?php echo smartyTranslate(array('s'=>'Tuesday','mod'=>'appagebuilder'),$_smarty_tpl);?>

	<?php echo smartyTranslate(array('s'=>'Wednesday','mod'=>'appagebuilder'),$_smarty_tpl);?>

	<?php echo smartyTranslate(array('s'=>'Thursday','mod'=>'appagebuilder'),$_smarty_tpl);?>

	<?php echo smartyTranslate(array('s'=>'Friday','mod'=>'appagebuilder'),$_smarty_tpl);?>

	<?php echo smartyTranslate(array('s'=>'Saturday','mod'=>'appagebuilder'),$_smarty_tpl);?>

-->
<!---
	Translation Month - NOT REMOVE
		<?php echo smartyTranslate(array('s'=>'January','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'February','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'March','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'April','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'May','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'June','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'July','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'August','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'September','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'October','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'November','mod'=>'appagebuilder'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'December','mod'=>'appagebuilder'),$_smarty_tpl);?>

--><?php }} ?>
