<?php /*%%SmartyHeaderCode:2665788775ba6984608dcc4-12200426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d5015d2093d31984d4c30bdc715338f49b82ef3' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/themes/leo_minimal/modules/leobootstrapmenu/views/templates/hook/megamenu.tpl',
      1 => 1475557010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2665788775ba6984608dcc4-12200426',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c0c8c5fa07581_52246957',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c0c8c5fa07581_52246957')) {function content_5c0c8c5fa07581_52246957($_smarty_tpl) {?><div id="leo-megamenu" class="clearfix">
<nav id="cavas_menu" class="sf-contener leo-megamenu">
    <div role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle btn-outline-inverse" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="leo-top-menu" class="collapse navbar-collapse navbar-ex1-collapse">
            
        </div>
    </div>
</nav>
</div>

<script type="text/javascript">
// <![CDATA[
	var current_link = "";
	//alert(request);
    var currentURL = window.location;
    currentURL = String(currentURL);
    currentURL = currentURL.replace("https://","").replace("http://","").replace("www.","").replace( /#\w*/, "" );
    current_link = current_link.replace("https://","").replace("http://","").replace("www.","");
    isHomeMenu = 0;
    if($("body").attr("id")=="index") isHomeMenu = 1;
    $(".megamenu > li > a").each(function() {
        menuURL = $(this).attr("href").replace("https://","").replace("http://","").replace("www.","").replace( /#\w*/, "" );
		if( (currentURL == menuURL) || (currentURL.replace(current_link,"") == menuURL) || isHomeMenu){
			$(this).parent().addClass("active");
            return false;
		}
    });
// ]]>
</script>
<script type="text/javascript">
        $(document).ready(function() {
            if($(window).width() <= 767){
                $('#cavas_menu').addClass("off-canvas-type");
            }
            $(document.body).on('click', '[data-toggle="dropdown"]' ,function(){
                if(!$(this).parent().hasClass('open') && this.href && this.href != '#' && !$('#cavas_menu').hasClass('off-canvas-type')){
                    window.location.href = this.href;
                }
            });
        });
        
        $(window).resize(function() {
            if( $(window).width() <= 767 ){
                 $('#cavas_menu').addClass("off-canvas-type");  
            }
            else {
                $('#cavas_menu').removeClass("off-canvas-type");
            }
        });
</script>
<?php }} ?>
