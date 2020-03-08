<?php /*%%SmartyHeaderCode:6710958895ba8983055d3f3-41478791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0ddefac9d57c42f63bb54489282a3f8a0d132eb' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/blockwishlist/blockwishlist_button.tpl',
      1 => 1475557010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6710958895ba8983055d3f3-41478791',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c7515fec20ad3_02925652',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c7515fec20ad3_02925652')) {function content_5c7515fec20ad3_02925652($_smarty_tpl) {?>
	<div class="wishlist">
		<a class="addToWishlist wishlistProd_2 btn-product" data-link="2" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '2', false, 1); return false;" title="Add to my wishlist">
			<i class="icon-heart2"></i> <span>Add to Wishlist</span>
		</a>	
	</div>
<?php }} ?>
