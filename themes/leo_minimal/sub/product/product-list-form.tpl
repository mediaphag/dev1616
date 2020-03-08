<div class="content_sortPagiBar clearfix">
	<div class="sortPagiBar row">					
			<div class="col-md-6 col-sm-6 col-xs-0">				
				<div class="sort">
				{include file="$tpl_dir./product-sort.tpl"}
				</div>
			</div>
			<div class="product-compare col-md-6 col-sm-6 col-xs-12">
				{include file="$tpl_dir./nbr-product-page.tpl"}	
				{include file="$tpl_dir./product-compare.tpl"}
			</div>
    </div> 
</div>

{include file="$tpl_dir./product-list.tpl" products=$products}

<div class="content_sortPagiBar">
	<div class="bottom-pagination-content row">
		<div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
			{include file="$tpl_dir./pagination.tpl" no_follow=1 paginationId='bottom'}
		</div>
		<div class="product-compare col-lg-4 col-md-3 col-sm-4 col-xs-12">
			{include file="$tpl_dir./product-compare.tpl" paginationId='bottom'}
		</div>
	</div>
</div>