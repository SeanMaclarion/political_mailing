jQuery(function() {
	var rotation = 0, 
	scrollLoc = jQuery(document).scrollTop();
    jQuery(window).scroll(function() {
		var newLoc = jQuery(document).scrollTop();
		var diff = scrollLoc - newLoc;
		rotation += diff, scrollLoc = newLoc;
		var rotationStr = "rotate(" + rotation + "deg)";
        jQuery("#content-3 #our-process .third #third_cycle #third_cycle_img").css({
            "-webkit-transform": rotationStr, "-moz-transform": rotationStr, "transform": rotationStr
        });
    });
})
jQuery(document).ready(function(){
	var img_h = jQuery('img.home-inbound-top').height();
	jQuery('img.home-inbound-top').css('top','-'+img_h+'px');
	jQuery("#keyblocks .box").on({
    mouseenter: function () {jQuery(this).addClass('active').find('.hover').fadeTo('fast','0.9');},
    mouseleave: function () {jQuery(this).removeClass('active');}
	});
	function switchsocial(){
		var cur = jQuery(".connectwithus_block .switch .title a.active").attr('class').replace("active", "").replace(" ", "");
		if(cur=='inst')  jQuery(".connectwithus_block .switch .title a.active").parents('.box').removeClass('blue').addClass('navy');
		else jQuery(".connectwithus_block .switch .title a.active").parents('.box').removeClass('navy').addClass('blue');
		jQuery(".connectwithus_block .switch .title a.active img").fadeTo('fast','1');
		jQuery(".connectwithus_block .switch .title a:not(.active) img").fadeTo('fast','0.25');
		jQuery(".connectwithus_block .box.switch .box_content div.content_inner").hide();
		jQuery(".connectwithus_block .box.switch .box_content div.content_inner."+cur+'_inner').show();
	}
	switchsocial();
	jQuery(".connectwithus_block .switch .title").on('click','a',function(){
		jQuery(".connectwithus_block .switch .title a").removeClass('active');
		jQuery(this).addClass('active');
		switchsocial();
	});
	/*jQuery(".connectwithus_block .latest_tweet").on('click','.title',function(){
		jQuery(this).parents('.box').addClass('flip');
	});
	jQuery(".connectwithus_block .latest_inst").on('click','.title',function(){
		jQuery(this).parents('.box').removeClass('flip');
	});*/
	jQuery( ".metaslider" ).append( "<div class='case-tag'></div>" );
// Initialize Slides
	jQuery('#slides').slides({
		effect: 'fade',
		preload: true,
		preloadImage: null,
		generatePagination: false,
		play: 7000,
		pause: 2500,
		fadeSpeed: 100,
		hoverPause: true,
		// Get the starting slide
		start: 1,
		animationComplete: function(current){
			//jQuery('.sl'+current).css('opacity',0).animate({opacity:1}, 800);
			//if(current==4) {jQuery('.spanmenu span').toggleClass('active');setTimeout(function(){switchslides()},4500);}
			if(current!=5){
				jQuery('#new-overlay').removeClass('s52');
				jQuery('#content-1').removeClass('s52');
				jQuery('#span1').addClass('active');
				jQuery('#span2').removeClass('active');
			}
			jQuery('#new-overlay').removeClass('s1 s2 s3 s4 s5 s6 s42').addClass('s'+current).css('opacity','1').stop(1,1).animate({left: 0}, 800,function(){
			jQuery('#content-1').removeClass('s1 s2 s3 s4 s5 s6 s42').addClass('s'+current);
			jQuery('#new-overlay').css('opacity','0');
			if(current!=5) jQuery('#new-overlay').css('left','-3000px');
			});
		}
	});
	var width = jQuery(window).width(); 
	if(width > 830){
var controller = jQuery.superscrollorama();
controller.addTween('#our-process .first', TweenMax.from( jQuery('#our-process .first'), .5, {css:{opacity: 0}}),0.5,-100);
controller.addTween('#our-process .second', TweenMax.from( jQuery('#our-process .second'), .5, {css:{opacity: 0}}),0.5,-100);
controller.addTween('#our-process .third', TweenMax.from( jQuery('#our-process .third'), .5, {css:{opacity: 0}}),0.5,-100);
controller.addTween('#our-process .fourth', TweenMax.from( jQuery('#our-process .fourth'), .5, {css:{opacity: 0}}),0.5,-150);
}

/*controller.addTween('#success-block', TweenMax.fromTo( jQuery('#success-block'), .25, {css:{opacity:0, width:'71',height:'11'}, immediateRender:true, ease:Quad.easeInOut}, {css:{opacity:1, width:'710',height:'113'}, ease:Quad.easeInOut}));*/
/*controller.addTween('#request-quote', TweenMax.from( jQuery('#request-quote'), 1, {css:{opacity: 0}}));*/
	var etop = jQuery('#home-inbound').offset().top
	jQuery(window).scroll(function(){
	    if( etop < jQuery(this).height() + jQuery(this).scrollTop()+100){
		 /*if(jQuery('#home-inbound .home-inbound-top').css('top') < img_h) */jQuery('#home-inbound .home-inbound-top').animate({'top':0},2000);
	    }
	});
});



