<?php /*%%SmartyHeaderCode:17606273035bbb3a655eba52-75915035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1c0ed2cf640fc0d0ed80a19f9e88af1b0cfae30' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/blocksupplier/blocksupplier.tpl',
      1 => 1475557008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17606273035bbb3a655eba52-75915035',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c4ec3ed0c04d2_06903551',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4ec3ed0c04d2_06903551')) {function content_5c4ec3ed0c04d2_06903551($_smarty_tpl) {?>
<!-- Block suppliers module -->
<div id="suppliers_block_left" class="block blocksupplier">
	<h4 class="title_block">
					<a href="http://dev1616.freedomain.thehost.com.ua/en/supplier" title="Suppliers">
					Suppliers
					</a>
			</h4>
	<div class="block_content">
								<ul class="list-block list-group bullet">
											<li class="last_item">
                					<a 
					href="http://dev1616.freedomain.thehost.com.ua/en/1__fashion-supplier" 
					title="More about Fashion Supplier">
				                Fashion Supplier
                					</a>
                				</li>
										</ul>
										<form action="/index.php" method="get">
					<div class="form-group">
						<select class="form-control" name="supplier_list">
							<option value="0">All suppliers</option>
													<option value="http://dev1616.freedomain.thehost.com.ua/en/1__fashion-supplier">Fashion Supplier</option>
												</select>
					</div>
				</form>
						</div>
</div>
<!-- /Block suppliers module -->
<?php }} ?>
