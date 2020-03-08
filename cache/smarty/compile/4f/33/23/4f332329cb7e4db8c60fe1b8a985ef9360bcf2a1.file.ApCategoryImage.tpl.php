<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:46:03
         compiled from "/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/ApCategoryImage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:744269885e64bedba0fc31-11506886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f332329cb7e4db8c60fe1b8a985ef9360bcf2a1' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/appagebuilder/views/templates/hook/ApCategoryImage.tpl',
      1 => 1475557006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '744269885e64bedba0fc31-11506886',
  'function' => 
  array (
    'menu' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'level' => 0,
    'data' => 0,
    'category' => 0,
    'formAtts' => 0,
    'link' => 0,
    'categories' => 0,
    'apLiveEdit' => 0,
    'cate' => 0,
    'random' => 0,
    'apLiveEditEnd' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64bedbb65376_94173246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64bedbb65376_94173246')) {function content_5e64bedbb65376_94173246($_smarty_tpl) {?>
<!-- @file modules\appagebuilder\views\templates\hook\ApCategoryImage -->
<?php if (!function_exists('smarty_template_function_menu')) {
    function smarty_template_function_menu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['menu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<ul class="level<?php echo intval($_smarty_tpl->tpl_vars['level']->value);?>
">
	<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['category']->value['children'])&&is_array($_smarty_tpl->tpl_vars['category']->value['children'])) {?>
			<li class="cate_content cate_<?php echo intval($_smarty_tpl->tpl_vars['category']->value['id_category']);?>
" >
				<div class="cate-img">
					<?php if ($_smarty_tpl->tpl_vars['formAtts']->value['cate_depth']==1) {?>
						<span id="leo-cat-<?php echo $_smarty_tpl->tpl_vars['category']->value['id_category'];?>
" style="display:none" class="leo-qty badge"></span>
					<?php }?>
					<span style="display:none" class="label-qty"><?php echo smartyTranslate(array('s'=>'products','mod'=>'appagebuilder'),$_smarty_tpl);?>
</span>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
">
						<?php if (isset($_smarty_tpl->tpl_vars['category']->value['image'])) {?>
						<img class="img-responsive" src='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value["image"], ENT_QUOTES, 'UTF-8', true);?>
' alt='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value["name"], ENT_QUOTES, 'UTF-8', true);?>
' 
							 <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['showicons']==0||($_smarty_tpl->tpl_vars['level']->value>0&&$_smarty_tpl->tpl_vars['formAtts']->value['showicons']==2)) {?> style="display:none"<?php }?>/>
						<?php }?>
					</a>
				</div>
				<div class="cate-meta">
			 		<div class="nbproducts">
						<h3 class="cat_name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
						
						
					</div>
					<?php smarty_template_function_menu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['category']->value['children'],'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>
 	
				</div>
			</li>
		<?php } else { ?>
			<li class="cate_content cate_<?php echo intval($_smarty_tpl->tpl_vars['category']->value['id_category']);?>
">
				<div class="cover-img">
					<?php if ($_smarty_tpl->tpl_vars['formAtts']->value['cate_depth']==1) {?>
						<span id="leo-cat-<?php echo $_smarty_tpl->tpl_vars['category']->value['id_category'];?>
" class="leo-qty badge" data-str="<?php echo smartyTranslate(array('s'=>' products','mod'=>'appagebuilder'),$_smarty_tpl);?>
"></span>
					<?php }?>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
">
						<?php if (isset($_smarty_tpl->tpl_vars['category']->value['image'])) {?>
						<img class="img-responsive" src='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value["image"], ENT_QUOTES, 'UTF-8', true);?>
' alt='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value["name"], ENT_QUOTES, 'UTF-8', true);?>
' 
							 <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['showicons']==0||($_smarty_tpl->tpl_vars['level']->value>0&&$_smarty_tpl->tpl_vars['formAtts']->value['showicons']==2)) {?> style="display:none"<?php }?>/>
						<?php }?>
					</a>
				</div>
				<div class="nbproducts">
					
					<h3 class="cat_name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
					
					
				</div>
				
			</li>
		<?php }?>
	<?php } ?>
</ul>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<div class="block-table">
	<?php if (isset($_smarty_tpl->tpl_vars['categories']->value)) {?>
	<div class="widget-category_image block block-table-cell">
		<?php echo $_smarty_tpl->tpl_vars['apLiveEdit']->value ? $_smarty_tpl->tpl_vars['apLiveEdit']->value : '';?>

		<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['title'])&&!empty($_smarty_tpl->tpl_vars['formAtts']->value['title'])) {?>
		<h4 class="title_block">
			<?php echo rtrim($_smarty_tpl->tpl_vars['formAtts']->value['title']);?>

		</h4>
		<?php }?>
		<div class="block_content">
			<?php  $_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cate']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cate']->key => $_smarty_tpl->tpl_vars['cate']->value) {
$_smarty_tpl->tpl_vars['cate']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['cate']->key;
?>
				<?php smarty_template_function_menu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['cate']->value));?>

			<?php } ?>
			<div id="view_all_wapper_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['random']->value, ENT_QUOTES, 'UTF-8', true);?>
" style="display:none">
				<span class ="view_all"><a href="javascript:void(0)"><?php echo smartyTranslate(array('s'=>'View all','mod'=>'appagebuilder'),$_smarty_tpl);?>
</a></span>
			</div> 
		</div>
		<?php echo $_smarty_tpl->tpl_vars['apLiveEditEnd']->value ? $_smarty_tpl->tpl_vars['apLiveEditEnd']->value : '';?>

	</div>
	<?php }?>
</div>
<script type="text/javascript">
 
	jQuery(document).ready(function() {
		$(".view_all_wapper").hide();
		var limit = <?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['limit']);?>
;
		var level = <?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['cate_depth']);?>
 - 1;
		$("ul.ul-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['random']->value, ENT_QUOTES, 'UTF-8', true);?>
, ul.ul-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['random']->value, ENT_QUOTES, 'UTF-8', true);?>
 ul").each(function(){
			var element = $(this).find(">li").length;
			var count = 0;
			$(this).find(">li").each(function(){
				count = count + 1;
				if(count > limit){
					// $(this).remove();
					$(this).hide();
				}
			});
			if(element > limit){
				view = $(".view_all","#view_all_wapper_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['random']->value, ENT_QUOTES, 'UTF-8', true);?>
").clone(1);
				// view.appendTo($(this).find("ul.level" + level));
				view.appendTo($(this));
				var href = $(this).closest("li").find('a:first-child').attr('href');
				$(view).attr("href", href);
			}
		})
	});

</script><?php }} ?>
