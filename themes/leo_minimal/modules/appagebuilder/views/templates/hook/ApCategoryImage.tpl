{* 
* @Module Name: AP Page Builder
* @Website: apollotheme.com - prestashop template provider
* @author Apollotheme <apollotheme@gmail.com>
* @copyright  2007-2015 Apollotheme
* @description: ApPageBuilder is module help you can build content for your shop
*}
<!-- @file modules\appagebuilder\views\templates\hook\ApCategoryImage -->
{function name=menu level=0}
<ul class="level{$level|intval}">
	{foreach $data as $category}
		{if isset($category.children) && is_array($category.children)}
			<li class="cate_content cate_{$category.id_category|intval}" >
				<div class="cate-img">
					{if $formAtts.cate_depth == 1}
						<span id="leo-cat-{$category.id_category}" style="display:none" class="leo-qty badge"></span>
					{/if}
					<span style="display:none" class="label-qty">{l s='products' mod='appagebuilder'}</span>
					<a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}">
						{if isset($category.image)}
						<img class="img-responsive" src='{$category["image"]|escape:'html':'UTF-8'}' alt='{$category["name"]|escape:'html':'UTF-8'}' 
							 {if $formAtts.showicons == 0 || ($level gt 0 && $formAtts.showicons == 2)} style="display:none"{/if}/>
						{/if}
					</a>
				</div>
				<div class="cate-meta">
			 		<div class="nbproducts">
						<h3 class="cat_name"><a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}">{$category.name|escape:'html':'UTF-8'}</a></h3>
						{* {if isset($category.description)}
							<div class="cate-desc">{$category.description|truncate:125:'...'}</div>
						{/if} *}
						{* <a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}" class="btn btn-cate" title="{l s='Shop now' mod='appagebuilder'}">{l s='Shop now' mod='appagebuilder'}</a> *}
					</div>
					{menu data=$category.children level=$level+1} 	
				</div>
			</li>
		{else}
			<li class="cate_content cate_{$category.id_category|intval}">
				<div class="cover-img">
					{if $formAtts.cate_depth == 1}
						<span id="leo-cat-{$category.id_category}" class="leo-qty badge" data-str="{l s=' products' mod='appagebuilder'}"></span>
					{/if}
					<a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}">
						{if isset($category.image)}
						<img class="img-responsive" src='{$category["image"]|escape:'html':'UTF-8'}' alt='{$category["name"]|escape:'html':'UTF-8'}' 
							 {if $formAtts.showicons == 0 || ($level gt 0 && $formAtts.showicons == 2)} style="display:none"{/if}/>
						{/if}
					</a>
				</div>
				<div class="nbproducts">
					
					<h3 class="cat_name"><a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}">{$category.name|escape:'html':'UTF-8'}</a></h3>
					{* {if isset($category.description)}
						<div class="cate-desc">{$category.description|truncate:125:'...'}</div>
					{/if} *}
					{* <a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'html':'UTF-8'}" class="btn btn-cate" title="{l s='Shop now' mod='appagebuilder'}">{l s='Shop now' mod='appagebuilder'}</a> *}
				</div>
				
			</li>
		{/if}
	{/foreach}
</ul>
{/function}
<div class="block-table">
	{if isset($categories)}
	<div class="widget-category_image block block-table-cell">
		{($apLiveEdit)?$apLiveEdit:''}{* HTML form , no escape necessary *}
		{if isset($formAtts.title) && !empty($formAtts.title)}
		<h4 class="title_block">
			{$formAtts.title|rtrim}
		</h4>
		{/if}
		<div class="block_content">
			{foreach from = $categories key=key item =cate}
				{menu data=$cate}
			{/foreach}
			<div id="view_all_wapper_{$random|escape:'html':'UTF-8'}" style="display:none">
				<span class ="view_all"><a href="javascript:void(0)">{l s='View all' mod='appagebuilder'}</a></span>
			</div> 
		</div>
		{($apLiveEditEnd)?$apLiveEditEnd:''}{* HTML form , no escape necessary *}
	</div>
	{/if}
</div>
<script type="text/javascript">
{literal} 
	jQuery(document).ready(function() {
		$(".view_all_wapper").hide();
		var limit = {/literal}{$formAtts.limit|intval}{literal};
		var level = {/literal}{$formAtts.cate_depth|intval}{literal} - 1;
		$("ul.ul-{/literal}{$random|escape:'html':'UTF-8'}, ul.ul-{$random|escape:'html':'UTF-8'} ul"{literal}).each(function(){
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
				view = $(".view_all","#view_all_wapper_{/literal}{$random|escape:'html':'UTF-8'}"){literal}.clone(1);
				// view.appendTo($(this).find("ul.level" + level));
				view.appendTo($(this));
				var href = $(this).closest("li").find('a:first-child').attr('href');
				$(view).attr("href", href);
			}
		})
	});
{/literal}
</script>