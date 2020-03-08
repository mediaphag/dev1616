{* 
* @Module Name: AP Page Builder
* @Website: apollotheme.com - prestashop template provider
* @author Apollotheme <apollotheme@gmail.com>
* @copyright  2007-2016 Apollotheme
* @description: ApPageBuilder is module help you can build content for your shop
*}
<!-- @file modules\appagebuilder\views\templates\front\products\compare -->
{if isset($comparator_max_item) && $comparator_max_item}
	<div class="compare">
		<a class="add_to_compare btn-product" href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}" title="{l s='Add to Compare' mod='appagebuilder'}">
			<i class="icon-stack-2"></i> <span>{l s='Add to Compare' mod='appagebuilder'}</span>
		</a>
	</div>
{/if}


