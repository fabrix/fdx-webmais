/***************************************************************************
* sharebox (ads flutuante a esquerda)
****************************************************************************/
jQuery.fn.fluidbarr=function(options){var defaults={horizontal:true,swidth:0,position:'left',leftOffset:0,rightOffset:0};var opts=jQuery.extend(defaults,options);var o=jQuery.meta?jQuery.extend({},opts,jQueryjQuery.data()):opts;var w=jQuery(window).width();var fluidbarr=jQuery('#fluidbarr');var parent=jQuery(fluidbarr).parent().width();var start=fluidbarr_init();function fluidbarr_init(){jQuery(fluidbarr).css('width',o.swidth+'px');if(o.position=='left')jQuery(fluidbarr).css('marginLeft',(0-o.swidth-o.leftOffset));else{jQuery(fluidbarr).css('marginLeft',(parent+o.rightOffset))}jQuery(fluidbarr).fadeIn();jQuery.event.add(window,"scroll",fluidbarr_scroll);jQuery.event.add(window,"resize",fluidbarr_resize);return jQuery(fluidbarr).offset().top}function fluidbarr_resize(){var w=jQuery(window).width();jQuery(fluidbarr).fadeIn()}function fluidbarr_scroll(){var p=jQuery(window).scrollTop();var w=jQuery(window).width();jQuery(fluidbarr).css('position',((p+10)>start)?'fixed':'absolute');jQuery(fluidbarr).css('top',((p+10)>start)?'0':'')}};
/* config  */
jQuery(document).ready(function($) {
  $('.fluidbarr').fluidbarr({horizontal:'true',swidth:'0',position:'left',leftOffset:0,rightOffset:0});
});

/***************************************************************************
* jquery colorBox
****************************************************************************/
jQuery(document).ready(function () {
$('a.lightbox ').colorbox({ opacity:0.6 , rel:'group1'});
$('a.ajax').colorbox({width:560, height:510});
$("a.iframe").colorbox({iframe:true, width:600, height:600});
$("a.iframe2").colorbox({iframe:true, width:"90%", height:"90%"});
$("a.iframe3").colorbox({iframe:true, width:590, height:590, scrolling:false});

$("a.youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
});

/***************************************************************************
* Shortcodes tabs (menu usa tambem?????)
****************************************************************************/
jQuery(document).ready(function () {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});

//vtabs
jQuery(document).ready(function () {

	//When page loads...
	$(".vtab_content").hide(); //Hide all content
	$("ul.vtabs li:first").addClass("active").show(); //Activate first tab
	$(".vtab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.vtabs li").click(function() {

		$("ul.vtabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".vtab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});



/***************************************************************************
* BUTÃO TOPO
****************************************************************************/
//scroll to top
jQuery(document).ready(function () {
$('.scrollTo_top').hide();
	$(window).scroll(function () {
		if( $(this).scrollTop() > 100 ) {
			$('.scrollTo_top').fadeIn(300);
		}
		else {
			$('.scrollTo_top').fadeOut(300);
		}
	});

	$('.scrollTo_top a').click(function(){
		$('html, body').animate({scrollTop:0}, 1000 );
		return false;
	});
 });

/***************************************************************************
* form limpar campos busca
****************************************************************************/
jQuery(document).ready(function () {
  $('.clearc').focus(function() {
    $(this).val("");
  });
});


/***************************************************************************
* social barr
****************************************************************************/
jQuery(document).ready(function () {
	//When page loads...
	$(".tab_content2").hide(); //Hide all content
	$("ul.tabs2 li:first").addClass("active").show(); //Activate first tab
	$(".tab_content2:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs2 li").click(function() {

		$("ul.tabs2 li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content2").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});

/* popup normal para share
-------------------------------------------------------------- */
function PopupCenter(pageURL, title,w,h,scrol) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars='+scrol+', resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

/***************************************************************************
* next prev (SINGLE)
****************************************************************************/
jQuery(document).ready(function($){
    $('.fnp-previous').mouseenter(function(){
        $('.fnp-content-left').stop().animate({
            left:-10
        },700);
        $('.fnp-content-left .fnp-nav-title,.fnp-content-left .fnp-nav-link').stop().delay(500).animate({
            opacity:1
        },500);
    });
    $('.fnp-previous').mouseleave(function(){
        $('.fnp-content-left').stop().animate({
            left:-400
        },700);
        $('.fnp-content-left .fnp-nav-title,.fnp-content-left .fnp-nav-link').stop().animate({
            opacity:0},500)
    });
    $('.fnp-next').mouseenter(function(){
        $('.fnp-content-right').stop().animate({
            right:-10
        },700);
        $('.fnp-content-right .fnp-nav-title,.fnp-content-right .fnp-nav-link').stop().delay(500).animate({
            opacity:1
        },500);
    });
    $('.fnp-next').mouseleave(function(){
        $('.fnp-content-right').stop().animate({
            right:-400
        },700);
        $('.fnp-content-right .fnp-nav-title,.fnp-content-right .fnp-nav-link').stop().animate({
            opacity:0
        },500);
    });
});


/***************************************************************************
* BOOTSTRAP
****************************************************************************/
 jQuery(document).ready(function() {
            jQuery('.fdx_tooltip').tooltip();
        });

