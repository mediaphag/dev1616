<?php /*%%SmartyHeaderCode:16986325885ba69892cc81c8-52975479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a79987268531a83b1a07674185b0f75ef9249dab' => 
    array (
      0 => '/var/www/mediaphag/data/www/dev1616/modules/leoslideshow/views/templates/front/leoslideshow.tpl',
      1 => 1475557022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16986325885ba69892cc81c8-52975479',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c0dda30ad3f82_61593319',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c0dda30ad3f82_61593319')) {function content_5c0dda30ad3f82_61593319($_smarty_tpl) {?><div class="bannercontainer banner-fullwidth" style="padding: 0px;margin: 0px;">
	<div class="iview iview-group-5">
					
									
					<!-- SLIDE IMAGE BEGIN -->
					<div class="slide_config "
						 data-leo_image="/themes/leo_minimal/img/modules/leoslideshow/bg-slide-1-1.jpg"												
						
						data-leo_pausetime="5000"
						data-leo_thumbnail="/themes/leo_minimal/img/modules/leoslideshow/bg-slide-1-1.jpg"
						data-leo_background="image"
						
												
						
						>
						
						
																					
								<div class="tp-caption  medium_text" 
									 data-x="892"
									 data-y="296"
									 data-transition="fade"
									 									 style="font-size:20px;color:#ffffff;"									 >
									
									<!-- LAYER TEXT BEGIN -->
										<span>Style series</span>
									<!-- LAYER TEXT END -->


									<!-- LAYER IMAGE END -->


									<!-- LAYER VIDEO END -->
									
									
								</div>
															
								<div class="tp-caption  large_text" 
									 data-x="889"
									 data-y="342"
									 data-transition="fade"
									 									 style="font-size:80px;color:#ffffff;"									 >
									
									<!-- LAYER TEXT BEGIN -->
										Look We Love.
									<!-- LAYER TEXT END -->


									<!-- LAYER IMAGE END -->


									<!-- LAYER VIDEO END -->
									
									
								</div>
															
								<div class="tp-caption " 
									 data-x="898"
									 data-y="503"
									 data-transition="expandleft"
									 									 									 >
									
									<!-- LAYER TEXT BEGIN -->
										<div class="group-btn-slide" style="width: 335px"><a href="https://www.prestashop.com/" class="btn active">Women's</a><a href="https://www.prestashop.com/" class="btn">Men's</a></div>
									<!-- LAYER TEXT END -->


									<!-- LAYER IMAGE END -->


									<!-- LAYER VIDEO END -->
									
									
								</div>
																			
				</div><!-- SLIDE IMAGE END -->
				
			
									
					<!-- SLIDE IMAGE BEGIN -->
					<div class="slide_config "
						 data-leo_image="/themes/leo_minimal/img/modules/leoslideshow/bg-slide-1-2.jpg"												
						
						data-leo_pausetime="5000"
						data-leo_thumbnail="/themes/leo_minimal/img/modules/leoslideshow/bg-slide-1-2.jpg"
						data-leo_background="image"
						
												
						
						>
						
						
																					
								<div class="tp-caption  medium_text" 
									 data-x="892"
									 data-y="296"
									 data-transition="fade"
									 									 style="font-size:20px;color:#ffffff;"									 >
									
									<!-- LAYER TEXT BEGIN -->
										<span>Style series</span>
									<!-- LAYER TEXT END -->


									<!-- LAYER IMAGE END -->


									<!-- LAYER VIDEO END -->
									
									
								</div>
															
								<div class="tp-caption  large_text" 
									 data-x="889"
									 data-y="342"
									 data-transition="fade"
									 									 style="font-size:80px;color:#ffffff;"									 >
									
									<!-- LAYER TEXT BEGIN -->
										Look We Love.
									<!-- LAYER TEXT END -->


									<!-- LAYER IMAGE END -->


									<!-- LAYER VIDEO END -->
									
									
								</div>
															
								<div class="tp-caption " 
									 data-x="898"
									 data-y="503"
									 data-transition="expandleft"
									 									 									 >
									
									<!-- LAYER TEXT BEGIN -->
										<div class="group-btn-slide" style="width: 335px"><a href="https://www.prestashop.com/" class="btn active">Women's</a><a href="https://www.prestashop.com/" class="btn">Men's</a></div>
									<!-- LAYER TEXT END -->


									<!-- LAYER IMAGE END -->


									<!-- LAYER VIDEO END -->
									
									
								</div>
																			
				</div><!-- SLIDE IMAGE END -->
				
						</div>
</div>



<script type="text/javascript">
$( document ).ready(function() {

	jQuery(".iview-group-5").iView({
		// COMMON
		pauseTime:9000, // delay
		startSlide:0,
		autoAdvance: 1,	// enable timer thá»�i gian auto next slide
		pauseOnHover: 1,
		randomStart: 0, // Ramdom slide when start

		// TIMER
		timer: "360Bar",
		timerPosition: "top-right", // Top-right, top left ....
		timerX: 10,
		timerY: 10,
		timerOpacity: 0.5,
		timerBg: "#000",
		timerColor: "#EEE",
		timerDiameter: 30,
		timerPadding: 4,
		timerStroke: 3,
		timerBarStroke: 1,
		timerBarStrokeColor: "#EEE",
		timerBarStrokeStyle: "solid",
		playLabel: "Play",
		pauseLabel: "Pause",
		closeLabel: "Close", // Muli language

		// NAVIGATOR controlNav
		controlNav: 1, // true : enable navigate - default:'false'
		keyboardNav: 1, // true : enable keybroad
		controlNavThumbs: 0, // true show thumbnail, false show number ( bullet )
		controlNavTooltip: 1, // true : hover to bullet show thumnail
		tooltipX: 5,
		tooltipY: -5,
		controlNavHoverOpacity: 1, // opacity navigator

		// DIRECTION
		controlNavNextPrev: false, // false dont show direction at navigator
		directionNav: 1, // true  show direction at image ( in this case : enable direction )
		directionNavHoverOpacity: 0.6, // direction opacity at image
		nextLabel: "Next",				// Muli language
		previousLabel: "Previous", // Muli language

		// ANIMATION 
		fx: 'random', // Animation
		animationSpeed: 500, // time to change slide
//		strips: 20,
		strips: 1, // set value is 1 -> fix animation full background
		blockCols: 10, // number of columns
		blockRows: 5, // number of rows

		captionSpeed: 500, // speed to show caption
		captionOpacity: 1, // caption opacity
		captionEasing: 'easeInOutSine', // caption transition easing effect, use JQuery Easings effect
		customWidth: 1920,
		customHtmlBullet: false,
		rtl: false,
		height:780,
		timer_show : 3,

		//onBeforeChange: function(){}, // Triggers before a slide transition
		//onAfterChange: function(){}, // Triggers after a slide transition
		//onSlideshowEnd: function(){}, // Triggers after all slides have been shown
		//onLastSlide: function(){}, // Triggers when last slide is shown
		//onPause: function(){}, // Triggers when slider has paused
		//onPlay: function(){} // Triggers when slider has played

		onAfterLoad: function() 
		{
			// THUMBNAIL
						
			// BULLET
						
			// Display timer
					},

	});
});

$( document ).ready(function(){
	$(".img_disable_drag").bind('dragstart', function() {
		return false;
	});
});

// Fix : Slide link, image cant swipe
$( document ).ready(function(){
	// step 1
	var link_event = 'click';

	// step 3
	$(".iview-group-5 .slide_config").on("click",function(){
		
		if(link_event !== 'click'){
			link_event = 'click';
			return;
		}

		if($(this).data('link') != undefined && $(this).data('link') != '') {
			window.open($(this).data('link'),$(this).data('target'));
		}
		
	});

	// step 2
	$(".iview-group-5 .slide_config").on('swipe',function(){
		link_event = 'swiped';	// do not click event
	});
});
				 
</script>
<?php }} ?>
