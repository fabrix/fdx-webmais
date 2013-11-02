if(jQuery){(function(a){a.extend(a.fn,{selectBox:function(i,u){var b,s="";var n=function(B,x){if(navigator.userAgent.match(/iPad|iPhone|Android/i)){return false}if(B.tagName.toLowerCase()!=="select"){return false}B=a(B);if(B.data("selectBox-control")){return false}var w=a('<a class="selectBox" />'),z=B.attr("multiple")||parseInt(B.attr("size"))>1;var v=x||{};if(v.autoWidth===undefined){v.autoWidth=true}w.addClass(B.attr("class")).attr("style",B.attr("style")||"").attr("title",B.attr("title")||"").attr("tabindex",parseInt(B.attr("tabindex"))).css("display","inline-block").bind("focus.selectBox",function(){if(this!==document.activeElement){a(document.activeElement).blur()}if(w.hasClass("selectBox-active")){return}w.addClass("selectBox-active");B.trigger("focus")}).bind("blur.selectBox",function(){if(!w.hasClass("selectBox-active")){return}w.removeClass("selectBox-active");B.trigger("blur")});if(B.attr("disabled")){w.addClass("selectBox-disabled")}if(z){var E=j(B,"inline");w.append(E).data("selectBox-options",E).addClass("selectBox-inline").addClass("selectBox-menuShowing").bind("keydown.selectBox",function(F){k(B,F)}).bind("keypress.selectBox",function(F){c(B,F)}).bind("mousedown.selectBox",function(F){if(a(F.target).is("A.selectBox-inline")){F.preventDefault()}if(!w.hasClass("selectBox-focus")){w.focus()}}).insertAfter(B);if(!B[0].style.height){var D=B.attr("size")?parseInt(B.attr("size")):5;var y=w.clone().removeAttr("id").css({position:"absolute",top:"-9999em"}).show().appendTo("body");y.find(".selectBox-options").html("<li><a>\u00A0</a></li>");optionHeight=parseInt(y.find(".selectBox-options A:first").html("&nbsp;").outerHeight());y.remove();w.height(optionHeight*D)}g(w)}else{var A=a('<span class="selectBox-label" />'),C=a('<span class="selectBox-arrow" />');A.text(a(B).find("OPTION:selected").text()||"\u00A0");var E=j(B,"dropdown");E.appendTo("BODY");w.data("selectBox-options",E).addClass("selectBox-dropdown").append(A).append(C).bind("mousedown.selectBox",function(F){if(w.hasClass("selectBox-menuShowing")){f()}else{F.stopPropagation();E.data("selectBox-down-at-x",F.screenX).data("selectBox-down-at-y",F.screenY);m(B)}}).bind("keydown.selectBox",function(F){k(B,F)}).bind("keypress.selectBox",function(F){c(B,F)}).insertAfter(B);g(w)}B.addClass("selectBox").data("selectBox-control",w).data("selectBox-settings",v).hide()};var j=function(v,x){var w;switch(x){case"inline":w=a('<ul class="selectBox-options" />');if(v.find("OPTGROUP").length){v.find("OPTGROUP").each(function(){var y=a('<li class="selectBox-optgroup" />');y.text(a(this).attr("label"));w.append(y);a(this).find("OPTION").each(function(){var z=a("<li />"),A=a("<a />");z.addClass(a(this).attr("class"));A.attr("rel",a(this).val()).text(a(this).text());z.append(A);if(a(this).attr("disabled")){z.addClass("selectBox-disabled")}if(a(this).attr("selected")){z.addClass("selectBox-selected")}w.append(z)})})}else{v.find("OPTION").each(function(){var y=a("<li />"),z=a("<a />");y.addClass(a(this).attr("class"));z.attr("rel",a(this).val()).text(a(this).text());y.append(z);if(a(this).attr("disabled")){y.addClass("selectBox-disabled")}if(a(this).attr("selected")){y.addClass("selectBox-selected")}w.append(y)})}w.find("A").bind("mouseover.selectBox",function(y){q(v,a(this).parent())}).bind("mouseout.selectBox",function(y){t(v,a(this).parent())}).bind("mousedown.selectBox",function(y){y.preventDefault();if(!v.selectBox("control").hasClass("selectBox-active")){v.selectBox("control").focus()}}).bind("mouseup.selectBox",function(y){f();p(v,a(this).parent(),y)});g(w);return w;case"dropdown":w=a('<ul class="selectBox-dropdown-menu selectBox-options" />');if(v.find("OPTGROUP").length){v.find("OPTGROUP").each(function(){var y=a('<li class="selectBox-optgroup" />');y.text(a(this).attr("label"));w.append(y);a(this).find("OPTION").each(function(){var z=a("<li />"),A=a("<a />");z.addClass(a(this).attr("class"));A.attr("rel",a(this).val()).text(a(this).text());z.append(A);if(a(this).attr("disabled")){z.addClass("selectBox-disabled")}if(a(this).attr("selected")){z.addClass("selectBox-selected")}w.append(z)})})}else{if(v.find("OPTION").length>0){v.find("OPTION").each(function(){var y=a("<li />"),z=a("<a />");y.addClass(a(this).attr("class"));z.attr("rel",a(this).val()).text(a(this).text());y.append(z);if(a(this).attr("disabled")){y.addClass("selectBox-disabled")}if(a(this).attr("selected")){y.addClass("selectBox-selected")}w.append(y)})}else{w.append("<li>\u00A0</li>")}}w.data("selectBox-select",v).css("display","none").appendTo("BODY").find("A").bind("mousedown.selectBox",function(y){y.preventDefault();if(y.screenX===w.data("selectBox-down-at-x")&&y.screenY===w.data("selectBox-down-at-y")){w.removeData("selectBox-down-at-x").removeData("selectBox-down-at-y");f()}}).bind("mouseup.selectBox",function(y){if(y.screenX===w.data("selectBox-down-at-x")&&y.screenY===w.data("selectBox-down-at-y")){return}else{w.removeData("selectBox-down-at-x").removeData("selectBox-down-at-y")}p(v,a(this).parent());f()}).bind("mouseover.selectBox",function(y){q(v,a(this).parent())}).bind("mouseout.selectBox",function(y){t(v,a(this).parent())});g(w);return w}};var r=function(v){v=a(v);var x=v.data("selectBox-control");if(!x){return}var w=x.data("selectBox-options");w.remove();x.remove();v.removeClass("selectBox").removeData("selectBox-control").removeData("selectBox-settings").show()};var m=function(w){w=a(w);var z=w.data("selectBox-control"),y=w.data("selectBox-settings"),x=z.data("selectBox-options");if(z.hasClass("selectBox-disabled")){return false}f();if(y.autoWidth){x.css("width",z.innerWidth())}else{if(x.innerWidth()<z.innerWidth()){x.css("width",z.innerWidth()-parseInt(x.css("padding-left"))-parseInt(x.css("padding-right")))}}x.css({top:z.offset().top+z.outerHeight()-(parseInt(z.css("borderBottomWidth"))),left:z.offset().left});switch(y.menuTransition){case"fade":x.fadeIn(y.menuSpeed);break;case"slide":x.slideDown(y.menuSpeed);break;default:x.show(y.menuSpeed);break}var v=x.find(".selectBox-selected:first");d(w,v,true);q(w,v);z.addClass("selectBox-menuShowing");a(document).bind("mousedown.selectBox",function(A){if(a(A.target).parents().andSelf().hasClass("selectBox-options")){return}f()})};var f=function(){if(a(".selectBox-dropdown-menu").length===0){return}a(document).unbind("mousedown.selectBox");a(".selectBox-dropdown-menu").each(function(){var w=a(this),v=w.data("selectBox-select"),y=v.data("selectBox-control"),x=v.data("selectBox-settings");switch(x.menuTransition){case"fade":w.fadeOut(x.menuSpeed);break;case"slide":w.slideUp(x.menuSpeed);break;default:w.hide(x.menuSpeed);break}y.removeClass("selectBox-menuShowing")})};var p=function(w,v,B){w=a(w);v=a(v);var C=w.data("selectBox-control"),A=w.data("selectBox-settings");if(C.hasClass("selectBox-disabled")){return false}if(v.length===0||v.hasClass("selectBox-disabled")){return false}if(w.attr("multiple")){if(B.shiftKey&&C.data("selectBox-last-selected")){v.toggleClass("selectBox-selected");var x;if(v.index()>C.data("selectBox-last-selected").index()){x=v.siblings().slice(C.data("selectBox-last-selected").index(),v.index())}else{x=v.siblings().slice(v.index(),C.data("selectBox-last-selected").index())}x=x.not(".selectBox-optgroup, .selectBox-disabled");if(v.hasClass("selectBox-selected")){x.addClass("selectBox-selected")}else{x.removeClass("selectBox-selected")}}else{if(B.metaKey||B.ctrlKey){v.toggleClass("selectBox-selected")}else{v.siblings().removeClass("selectBox-selected");v.addClass("selectBox-selected")}}}else{v.siblings().removeClass("selectBox-selected");v.addClass("selectBox-selected")}if(C.hasClass("selectBox-dropdown")){C.find(".selectBox-label").text(v.text())}var y=0,z=[];if(w.attr("multiple")){C.find(".selectBox-selected A").each(function(){z[y++]=a(this).attr("rel")})}else{z=v.find("A").attr("rel")}C.data("selectBox-last-selected",v);if(w.val()!==z){w.val(z);w.trigger("change")}return true};var q=function(w,v){w=a(w);v=a(v);var y=w.data("selectBox-control"),x=y.data("selectBox-options");x.find(".selectBox-hover").removeClass("selectBox-hover");v.addClass("selectBox-hover")};var t=function(w,v){w=a(w);v=a(v);var y=w.data("selectBox-control"),x=y.data("selectBox-options");x.find(".selectBox-hover").removeClass("selectBox-hover")};var d=function(x,w,v){if(!w||w.length===0){return}x=a(x);var C=x.data("selectBox-control"),z=C.data("selectBox-options"),A=C.hasClass("selectBox-dropdown")?z:z.parent(),B=parseInt(w.offset().top-A.position().top),y=parseInt(B+w.outerHeight());if(v){A.scrollTop(w.offset().top-A.offset().top+A.scrollTop()-(A.height()/2))}else{if(B<0){A.scrollTop(w.offset().top-A.offset().top+A.scrollTop())}if(y>A.height()){A.scrollTop((w.offset().top+w.outerHeight())-A.offset().top+A.scrollTop()-A.height())}}};var k=function(v,A){v=a(v);var B=v.data("selectBox-control"),w=B.data("selectBox-options"),C=0,x=0;if(B.hasClass("selectBox-disabled")){return}switch(A.keyCode){case 8:A.preventDefault();s="";break;case 9:case 27:f();t(v);break;case 13:if(B.hasClass("selectBox-menuShowing")){p(v,w.find("LI.selectBox-hover:first"),A);if(B.hasClass("selectBox-dropdown")){f()}}else{m(v)}break;case 38:case 37:A.preventDefault();if(B.hasClass("selectBox-menuShowing")){var z=w.find(".selectBox-hover").prev("LI");C=w.find("LI:not(.selectBox-optgroup)").length;x=0;while(z.length===0||z.hasClass("selectBox-disabled")||z.hasClass("selectBox-optgroup")){z=z.prev("LI");if(z.length===0){z=w.find("LI:last")}if(++x>=C){break}}q(v,z);d(v,z)}else{m(v)}break;case 40:case 39:A.preventDefault();if(B.hasClass("selectBox-menuShowing")){var y=w.find(".selectBox-hover").next("LI");C=w.find("LI:not(.selectBox-optgroup)").length;x=0;while(y.length===0||y.hasClass("selectBox-disabled")||y.hasClass("selectBox-optgroup")){y=y.next("LI");if(y.length===0){y=w.find("LI:first")}if(++x>=C){break}}q(v,y);d(v,y)}else{m(v)}break}};var c=function(v,x){v=a(v);var y=v.data("selectBox-control"),w=y.data("selectBox-options");if(y.hasClass("selectBox-disabled")){return}switch(x.keyCode){case 9:case 27:case 13:case 38:case 37:case 40:case 39:break;default:if(!y.hasClass("selectBox-menuShowing")){m(v)}x.preventDefault();clearTimeout(b);s+=String.fromCharCode(x.charCode||x.keyCode);w.find("A").each(function(){if(a(this).text().substr(0,s.length).toLowerCase()===s.toLowerCase()){q(v,a(this).parent());d(v,a(this).parent());return false}});b=setTimeout(function(){s=""},1000);break}};var l=function(v){v=a(v);v.attr("disabled",false);var w=v.data("selectBox-control");if(!w){return}w.removeClass("selectBox-disabled")};var h=function(v){v=a(v);v.attr("disabled",true);var w=v.data("selectBox-control");if(!w){return}w.addClass("selectBox-disabled")};var e=function(v,y){v=a(v);v.val(y);y=v.val();var z=v.data("selectBox-control");if(!z){return}var x=v.data("selectBox-settings"),w=z.data("selectBox-options");z.find(".selectBox-label").text(a(v).find("OPTION:selected").text()||"\u00A0");w.find(".selectBox-selected").removeClass("selectBox-selected");w.find("A").each(function(){if(typeof(y)==="object"){for(var A=0;A<y.length;A++){if(a(this).attr("rel")==y[A]){a(this).parent().addClass("selectBox-selected")}}}else{if(a(this).attr("rel")==y){a(this).parent().addClass("selectBox-selected")}}});if(x.change){x.change.call(v)}};var o=function(C,D){C=a(C);var y=C.data("selectBox-control"),w=C.data("selectBox-settings");switch(typeof(u)){case"string":C.html(u);break;case"object":C.html("");for(var z in u){if(u[z]===null){continue}if(typeof(u[z])==="object"){var v=a('<optgroup label="'+z+'" />');for(var x in u[z]){v.append('<option value="'+x+'">'+u[z][x]+"</option>")}C.append(v)}else{var A=a('<option value="'+z+'">'+u[z]+"</option>");C.append(A)}}break}if(!y){return}y.data("selectBox-options").remove();var B=y.hasClass("selectBox-dropdown")?"dropdown":"inline",D=j(C,B);y.data("selectBox-options",D);switch(B){case"inline":y.append(D);break;case"dropdown":y.find(".selectBox-label").text(a(C).find("OPTION:selected").text()||"\u00A0");a("BODY").append(D);break}};var g=function(v){a(v).css("MozUserSelect","none").bind("selectstart",function(w){w.preventDefault()})};switch(i){case"control":return a(this).data("selectBox-control");break;case"settings":if(!u){return a(this).data("selectBox-settings")}a(this).each(function(){a(this).data("selectBox-settings",a.extend(true,a(this).data("selectBox-settings"),u))});break;case"options":a(this).each(function(){o(this,u)});break;case"value":if(u===undefined){return a(this).val()}a(this).each(function(){e(this,u)});break;case"enable":a(this).each(function(){l(this)});break;case"disable":a(this).each(function(){h(this)});break;case"destroy":a(this).each(function(){r(this)});break;default:a(this).each(function(){n(this,i)});break}return a(this)}})})(jQuery)};


/**
 * Tabs functionality
 */
jQuery(document).ready(function($) {
 
	$("SELECT").selectBox();
 
	
	//When page loads...
	$(".tab_content .sub").hide(); // Hide all subtabs
	
	$(".wz-parent").each(function() {
	    var id = $(this).attr("id");
	});

	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$("ul.tabs li:first li:first").addClass("active").show(); //Activate first subtab
	$(".tab_content:first").show(); //Show first tab content
	$(".tab_content:first .sub:first").show(); // Show first subtab content

    $("ul.tabs em").click(function() {
        var id = $(this).parent().attr("id");

        $(this).parent().find('ul').slideToggle('fast', function(){
            $(this).parent().toggleClass("a-open");

         });
        
    });

    $(".wz-parent > a").click(function() {
        // prevent flickering
        if ($(this).parent().hasClass('active')) {
            return false;
        }
        var id = $(this).parent().attr("id");
        var activeTab = $(this).attr('href');
        
        $(".wz-parent").removeClass('active');
        
        $(this).parent().find('ul').slideDown('fast', function() {
            $(this).parent().addClass('active');
        
            if ($(this).parent().hasClass('active')) {
                $(".sub").removeClass('active');

                $(this).parent().find('li:first').addClass('active');
                
                
                
                $(".zoomForms .sub").hide();
                $(".tab_content").hide();
                
                $(activeTab).show();
                $(activeTab + ' .sub').first().slideDown();
    
            }
        });

        return false;

    });
    
    $(".sub > a").click(function() {
        // prevent flickering
        if ($(this).parent().hasClass('active')) {
            return false;
        }
        $(".sub").removeClass('active');
        $(this).parent().addClass('active');
        var p = $(this).parent().parent().parent().find('a').first().attr('href');
        
        $(".wz-parent").removeClass('active');
        $(this).parent().parent().parent().addClass('active');
        
        $(".zoomForms .sub").hide();
        $(".tab_content").hide();
        

        var activeTab = $(this).attr('href');
        $(p).show();
        $(activeTab).slideDown();

        return false;
    });

});

/**
 * Autoselect export content on click
 */


/**
 * Ajax functionality
 */
jQuery(document).ready(function($) {
    $("#submitZoomForm").click(function() {
        $("#zoomForm").submit();
    });

    $("#zoomForm").submit(function() {
        var loading = $("#zoomLoading");
        var success = $("#zoomSuccess");
        var fail    = $("#zoomFail");
        
        success.find('p').text('Options successfully saved!');
        
        loading.fadeIn();
    
        function fData() {
            var values = $("#zoomForm").serialize();
            
            return values;
        }
        
        var data = {
            type: 'options',
            action: 'fdx_ajax_post',
            data: fData(),
            '_ajax_nonce': $("#nonce").val()
        };
        
      
        var ask;
        var fdx_import;
        
        if ($("#misc_import").val() != '') {
            ask = confirm('Are you sure you want to import these settings? All previous changes will be overwritten!');
            fdx_import = true;
        }
        
        
        if (!ask && fdx_import) {
                loading.fadeOut();
                return false;
		}
            
      
        $("#misc_export").html('Please refresh this page and then get export data. Don\'t forget to save if you changed something.');

        $.post(fdx_ajax_url, data, function(response) {
            if ($.trim(response) === 'success') {
                loading.fadeOut();
                success.fadeIn();
                window.setTimeout(function() {
                    success.fadeOut();
                    if (ask) {
                        location.href = location.href;
                    }
                }, 2000);
            } else {
                loading.fadeOut();
                fail.fadeIn();
                window.setTimeout(function() {
                    fail.fadeOut();
                }, 10000);
            }
        });
        
        return false;
    });

        $("#zoomReset").submit(function(event) {
        var ask = confirm('Are you sure you want to reset all settings? All changes made to theme options will be reset to default! Please think twice before doing this.');
        if (!ask) {
            event.preventDefault();
            return false;
        }
    });
    
});

/**
 * Color picker functionality
 */
jQuery(document).ready(function($) {
    $( '.colorSelector').each ( function () {
    	var colourPicker = $(this).ColorPicker({
    
        	color: $(this).next( 'input').attr( 'value' ),
        	
        	onShow: function (colpkr) {
        		$(colpkr).fadeIn(500);
        		return false;
        	},
        	onHide: function (colpkr) {
        		$(colpkr).fadeOut(500);
        		return false;
        	},
        	onChange: function (hsb, hex, rgb) {
        		$(colourPicker).children( 'div').css( 'backgroundColor', '#' + hex);
        		$(colourPicker).next( 'input').attr( 'value','#' + hex);
        	}
    	
    	});
    	
    	$(this).children( 'div').css( 'backgroundColor', $(this).next( 'input').attr( 'value' ));
    });
});

/**
 * Media Library Upload functionality
 */
jQuery(document).ready(function($) {
    mlu = {
    removeFile: function () {
        $('.mlu_remove').live('click', function(event) {
            $(this).hide();
            $(this).parents().parents().children('.upload').attr('value', '');
            $(this).parents('.screenshot').slideUp();
            $(this).parents('.screenshot').siblings('.of-background-properties').hide();
            return false;
        });
        $('a.delete-inline', "#option-1").hide();
 },
    

recreateFileField: function () {
        $('input.file').each(function(){
            var uploadbutton = '<input class="upload_file_button" type="button" value="Upload" />';
            $(this).wrap('<div class="file_wrap" />');
            $(this).addClass('file').css('opacity', 0);
            $(this).parent().append($('<div class="fake_file" />').append($('<input type="text" class="upload" />').attr('id',$(this).attr('id')+'_file')).val( $(this).val() ).append(uploadbutton));
            
            $(this).bind('change', function() {
                $('#'+$(this).attr('id')+'_file').val($(this).val());
            });
            
            $(this).bind('mouseout', function() {
                $('#'+$(this).attr('id')+'_file').val($(this).val());
            });
        });
    
    },
    
    mediaUpload: function () {
    
        $.noConflict();
        
        $( 'input.upload_button' ).removeAttr('style');
        
        var formfield,
            formID,
            btnContent = true,
            tbframe_interval;
        
        // On Click
        $('input.upload_button').live("click", function () {
            formfield = $(this).prev('input').attr('id');
            formID = $(this).attr('rel');

            tbframe_interval = setInterval(function() {
                jQuery("#TB_iframeContent").contents().find(".savesend .button").val("Use This Image");
                jQuery("#TB_iframeContent").contents().find("div#gallery-settings").hide();
            }, 2000);

            var fdx_title = '';
            
            if ($(this).parents('.section').find('.heading')) { fdx_title = $(this).parents('.section').find('.heading').text(); }
        
            tb_show( fdx_title, 'media-upload.php?post_id='+formID+'&TB_iframe=1&width=650' );
            return false;
        });
        
        window.original_send_to_editor = window.send_to_editor;
        window.send_to_editor = function(html) {
        
        if (formfield) {

            clearInterval(tbframe_interval);
            
            if ( $(html).html(html).find('img').length > 0 ) {
            
                itemurl = $(html).html(html).find('img').attr('src');
            
            } else {
                
                var htmlBits = html.split("'");
                itemurl = htmlBits[1];
                
                var itemtitle = htmlBits[2];
                
                itemtitle = itemtitle.replace( '>', '' );
                itemtitle = itemtitle.replace( '</a>', '' );
            
            }
            
            var image = /(^.*\.jpg|jpeg|png|gif|ico*)/gi;
            var document = /(^.*\.pdf|doc|docx|ppt|pptx|odt*)/gi;
            var audio = /(^.*\.mp3|m4a|ogg|wav*)/gi;
            var video = /(^.*\.mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2*)/gi;
            
            if (itemurl.match(image)) {
                btnContent = '<img src="'+itemurl+'" alt="" /><a href="#" class="mlu_remove button">Remove Image</a>';
            } else {
                html = '<a href="'+itemurl+'" target="_blank" rel="external">View File</a>';
                btnContent = '<div class="no_image"><span class="file_link">'+html+'</span><a href="#" class="mlu_remove button">Remove</a></div>';
            }
        
            $('#' + formfield).val(itemurl);
            $("#" + formfield + "_image").slideDown().html(btnContent);
            tb_remove();
            
            } else {
                window.original_send_to_editor(html);
            }

            formfield = '';
        }
    
    }
    
    };
    
    mlu.removeFile();
    mlu.recreateFileField();
    mlu.mediaUpload();  
});



/**
 * Custom jQuery radio buttons
 */

jQuery(document).ready(
function($)
{
	$(".RadioClass").change(function(){  
	    if($(this).is(":checked")){  
	        $(".RadioSelected:not(:checked)").removeClass("RadioSelected");  
	        $(this).next("label").addClass("RadioSelected");  
	    }  
	}); 
});