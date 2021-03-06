{* 
* @Module Name: AP Page Builder
* @Website: apollotheme.com - prestashop template provider
* @author Apollotheme <apollotheme@gmail.com>
* @copyright  2007-2015 Apollotheme
* @description: ApPageBuilder is module help you can build content for your shop
*}
<!-- @file modules\appagebuilder\views\templates\hook\ApBlog -->
{if isset($formAtts.isEnabled) && $formAtts.isEnabled == true}
<div class="block latest-blogs exclusive appagebuilder {if isset($formAtts.class)}{$formAtts.class|escape:'html':'UTF-8'}{/if}" id="blog-{$formAtts.form_id|escape:'html':'UTF-8'}" >
	{($apLiveEdit) ? $apLiveEdit : ''}{* HTML form , no escape necessary *}
	{if isset($formAtts.title)&&!empty($formAtts.title)}
	<h4 class="title_block">
		{$formAtts.title|rtrim}
	</h4>
	{/if}
	<div class="block_content">	
		<div class="row">
			{if !empty($products)}
				{if $formAtts.carousel_type == 'boostrap'}
					{include file='./BlogCarousel.tpl'}
				{else}
					{include file='./BlogOwlCarousel.tpl'}
				{/if}
			{else}
				<p class="alert alert-info">{l s='No blog at this time.' mod='appagebuilder'}</p>	
			{/if}
		</div>
	</div>
	{($apLiveEditEnd)?$apLiveEditEnd:''}{* HTML form , no escape necessary *}{* HTML form , no escape necessary *}
</div>
{if isset($formAtts.bleoblogs_show) && $formAtts.bleoblogs_show}
    <a class="pull-right" href="{$formAtts.leo_blog_helper->getFontBlogLink()}" title="{l s='View All' mod='appagebuilder'}">{l s='View All' mod='appagebuilder'}</a>
{/if}
{/if}