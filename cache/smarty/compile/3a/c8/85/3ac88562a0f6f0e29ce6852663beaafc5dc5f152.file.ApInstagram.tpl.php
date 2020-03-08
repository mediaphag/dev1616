<?php /* Smarty version Smarty-3.1.19, created on 2020-03-08 05:45:27
         compiled from "/var/www/mediaphag/data/www/dev1616/modules/appagebuilder/views/templates/hook/ApInstagram.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13462810505e64beb71deb67-42386740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ac88562a0f6f0e29ce6852663beaafc5dc5f152' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/modules/appagebuilder/views/templates/hook/ApInstagram.tpl',
      1 => 1475557018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13462810505e64beb71deb67-42386740',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'apLiveEdit' => 0,
    'formAtts' => 0,
    'apLiveEditEnd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5e64beb74aef86_92769422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e64beb74aef86_92769422')) {function content_5e64beb74aef86_92769422($_smarty_tpl) {?>
<!-- @file modules\appagebuilder\views\templates\hook\ApInstagram -->
 <div class="instagram-block">
	<?php echo $_smarty_tpl->tpl_vars['apLiveEdit']->value ? $_smarty_tpl->tpl_vars['apLiveEdit']->value : '';?>

    <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['title'])&&$_smarty_tpl->tpl_vars['formAtts']->value['title']) {?>
    <h4 class="title_block"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['client_id'])&&$_smarty_tpl->tpl_vars['formAtts']->value['client_id']) {?>
    <div class="block-content">
        <div id="instafeed"></div>
		<p class="link-instagram">
		<?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['profile_link'])&&$_smarty_tpl->tpl_vars['formAtts']->value['profile_link']) {?>
			<a href="https://instagram.com/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['profile_link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View all in instagram','mod'=>'appagebuilder'),$_smarty_tpl);?>
"><i class="fa fa-instagram"></i>&nbsp;&nbsp;<?php echo smartyTranslate(array('s'=>'View all in instagram','mod'=>'appagebuilder'),$_smarty_tpl);?>
</a>
		<?php }?>
		</p>
    </div>
    <script type="text/javascript">
         var feed = new Instafeed({
            clientId: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['client_id'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['access_token'])&&$_smarty_tpl->tpl_vars['formAtts']->value['access_token']) {?>
            accessToken: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['access_token'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['target'])&&$_smarty_tpl->tpl_vars['formAtts']->value['target']) {?>
            target: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['target'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['template'])&&$_smarty_tpl->tpl_vars['formAtts']->value['template']) {?>
            template: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['template'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['get'])&&$_smarty_tpl->tpl_vars['formAtts']->value['get']) {?>
            get: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['get'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
             <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['tag_name'])&&$_smarty_tpl->tpl_vars['formAtts']->value['tag_name']) {?>
            tagName: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['tag_name'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
             <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['location_id'])&&$_smarty_tpl->tpl_vars['formAtts']->value['location_id']) {?>
            locationId: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['get'], ENT_QUOTES, 'UTF-8', true);?>
,
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['user_id'])&&$_smarty_tpl->tpl_vars['formAtts']->value['user_id']) {?>
            userId: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['user_id'], ENT_QUOTES, 'UTF-8', true);?>
,
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['sort_by'])&&$_smarty_tpl->tpl_vars['formAtts']->value['sort_by']) {?>
            sortBy: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['sort_by'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['links'])&&$_smarty_tpl->tpl_vars['formAtts']->value['links']) {?>
            links: "<?php echo $_smarty_tpl->tpl_vars['formAtts']->value['links'];?>
",
            <?php }?>    
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['limit'])&&$_smarty_tpl->tpl_vars['formAtts']->value['limit']) {?>
            limit: "<?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['limit']);?>
",
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['resolution'])&&$_smarty_tpl->tpl_vars['formAtts']->value['resolution']) {?>
            resolution: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['resolution'], ENT_QUOTES, 'UTF-8', true);?>
",
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['carousel_type'])&&$_smarty_tpl->tpl_vars['formAtts']->value['carousel_type']!=="list") {?>
            after: function() {
                <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['carousel_type']=="boostrap") {?>

                <?php } else { ?>
                    <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['itempercolumn'])&&$_smarty_tpl->tpl_vars['formAtts']->value['itempercolumn']>1) {?>
                        // CASE : 2,3 images in one column
                        var photos = [];
                        $("#instafeed a").each(function(img) {
                            photos.push($(this).html());
                        });
                        $("#instafeed").html('');
                        var itempercolumn = <?php echo $_smarty_tpl->tpl_vars['formAtts']->value['itempercolumn'];?>
;

                        var photos = array_chunk(photos,itempercolumn);
                        var total_column = photos.length;

                        for (i = 0; i < total_column; i++)
                        {
                            var img_html = '<div class="item">';

                            for(j=0; j<photos[i].length; j++)
                            {
                                img_html += '<div class="block-carousel-container">';
                                img_html += '   <div class="left-block">';
                                img_html += '       <div class="block-carousel-image-container image">';

                                img_html += photos[i][j];

                                img_html += '       </div>';
                                img_html += '   </div>';
                                img_html += '</div>';
                            }

                            $("#instafeed").html( $("#instafeed").html() + img_html );
                        }
                    <?php }?>
                        
                        
                    $('#instafeed').owlCarousel({
                        items : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['items']) {?><?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['items']);?>
<?php } else { ?>false<?php }?>,
                        <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['itemsdesktop'])&&$_smarty_tpl->tpl_vars['formAtts']->value['itemsdesktop']) {?>itemsDesktop : [1199,<?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['itemsdesktop']);?>
],<?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['itemsdesktopsmall'])&&$_smarty_tpl->tpl_vars['formAtts']->value['itemsdesktopsmall']) {?>itemsDesktopSmall : [979,<?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['itemsdesktopsmall']);?>
],<?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['itemstablet'])&&$_smarty_tpl->tpl_vars['formAtts']->value['itemstablet']) {?>itemsTablet : [768,<?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['itemstablet']);?>
],<?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['itemsmobile'])&&$_smarty_tpl->tpl_vars['formAtts']->value['itemsmobile']) {?>itemsMobile : [479,<?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['itemsmobile']);?>
],<?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['formAtts']->value['itemscustom'])&&$_smarty_tpl->tpl_vars['formAtts']->value['itemscustom']) {?>itemsCustom : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['itemscustom'], ENT_QUOTES, 'UTF-8', true);?>
,<?php }?>
                        singleItem : false,         // true : show only 1 item
                        itemsScaleUp : false,
                        slideSpeed : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['slidespeed']) {?><?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['slidespeed']);?>
<?php } else { ?>200<?php }?>,  //  change speed when drag and drop a item
                        paginationSpeed : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['paginationspeed']) {?><?php echo intval($_smarty_tpl->tpl_vars['formAtts']->value['paginationspeed']);?>
<?php } else { ?>800<?php }?>, // change speed when go next page

                        autoPlay : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['autoplay'], ENT_QUOTES, 'UTF-8', true);?>
,   // time to show each item
                        stopOnHover : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['stoponhover']) {?>true<?php } else { ?>false<?php }?>,
                        navigation : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['navigation']) {?>true<?php } else { ?>false<?php }?>,
                        navigationText : ["&lsaquo;", "&rsaquo;"],

                        scrollPerPage : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['scrollperpage']) {?>true<?php } else { ?>false<?php }?>,

                        pagination : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['pagination'], ENT_QUOTES, 'UTF-8', true);?>
, // show bullist
                        paginationNumbers : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['paginationnumbers']) {?>true<?php } else { ?>false<?php }?>, // show number

                        responsive : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['responsive']) {?>true<?php } else { ?>false<?php }?>,

                        lazyLoad : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['lazyload'], ENT_QUOTES, 'UTF-8', true);?>
,
                        lazyFollow : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['lazyfollow']) {?>true<?php } else { ?>false<?php }?>,  // true : go to page 7th and load all images page 1...7. false : go to page 7th and load only images of page 7th
                        lazyEffect : "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['formAtts']->value['lazyeffect'], ENT_QUOTES, 'UTF-8', true);?>
",

                        autoHeight : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['autoheight']) {?>true<?php } else { ?>false<?php }?>,

                        //jsonPath : false,
                        //jsonSuccess : false,

                        //dragBeforeAnimFinish
                        mouseDrag : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['mousedrag']) {?>true<?php } else { ?>false<?php }?>,
                        touchDrag : <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['touchdrag']) {?>true<?php } else { ?>false<?php }?>,

                        addClassActive : true,
                        <?php if ($_smarty_tpl->tpl_vars['formAtts']->value['rtl']) {?>direction:'rtl',<?php }?>
						//transitionStyle : "owl_transitionStyle",

						//beforeUpdate : false,
						//afterUpdate : false,
						//beforeInit : false,
						//afterInit : false,
						//beforeMove : false,
						//afterMove : false,
						afterAction : SetOwlCarouselFirstLast,
						//startDragging : false,
						//afterLazyLoad: false


                    });
                <?php }?>
            }
            <?php }?>
        });
        feed.run();
		
		function SetOwlCarouselFirstLast(el){
			el.find(".owl-item").removeClass("first");
			el.find(".owl-item.active").first().addClass("first");

			el.find(".owl-item").removeClass("last");
			el.find(".owl-item.active").last().addClass("last");
		}
        
		var array_chunk = function(arr, chunkSize) {
			var groups = [], i;
			for (i = 0; i < arr.length; i += chunkSize) {
				groups.push(arr.slice(i, i + chunkSize));
			}
			return groups;
		}
    </script>    
    <?php }?>
	<?php echo $_smarty_tpl->tpl_vars['apLiveEditEnd']->value ? $_smarty_tpl->tpl_vars['apLiveEditEnd']->value : '';?>

</div><?php }} ?>
