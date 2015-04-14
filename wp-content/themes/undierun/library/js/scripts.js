/*!
 * jquery.customSelect2() - v0.5.1
 * http://adam.co/lab/jquery/customselect2/
 * 2014-04-19
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License 
 */
(function(a){a.fn.extend({customSelect2:function(c){if(typeof document.body.style.maxHeight==="undefined"){return this}var e={customClass:"customSelect2",mapClass:true,mapStyle:true},c=a.extend(e,c),d=c.customClass,f=function(h,k){var g=h.find(":selected"),j=k.children(":first"),i=g.html()||"&nbsp;";j.html(i);if(g.attr("disabled")){k.addClass(b("DisabledOption"))}else{k.removeClass(b("DisabledOption"))}setTimeout(function(){k.removeClass(b("Open"));a(document).off("mouseup.customSelect2")},60)},b=function(g){return d+g};return this.each(function(){var g=a(this),i=a("<span />").addClass(b("Inner")),h=a("<span />");g.after(h.append(i));h.addClass(d);if(c.mapClass){h.addClass(g.attr("class"))}if(c.mapStyle){h.attr("style",g.attr("style"))}g.addClass("hasCustomSelect2").on("render.customSelect2",function(){f(g,h);g.css("width","");var k=parseInt(g.outerWidth(),10)-(parseInt(h.outerWidth(),10)-parseInt(h.width(),10));h.css({display:"inline-block"});var j=h.outerHeight();if(g.attr("disabled")){h.addClass(b("Disabled"))}else{h.removeClass(b("Disabled"))}i.css({width:k,display:"inline-block"});g.css({"-webkit-appearance":"menulist-button",width:h.outerWidth(),position:"absolute",opacity:0,height:j,fontSize:h.css("font-size")})}).on("change.customSelect2",function(){h.addClass(b("Changed"));f(g,h)}).on("keyup.customSelect2",function(j){if(!h.hasClass(b("Open"))){g.trigger("blur.customSelect2");g.trigger("focus.customSelect2")}else{if(j.which==13||j.which==27){f(g,h)}}}).on("mousedown.customSelect2",function(){h.removeClass(b("Changed"))}).on("mouseup.customSelect2",function(j){if(!h.hasClass(b("Open"))){if(a("."+b("Open")).not(h).length>0&&typeof InstallTrigger!=="undefined"){g.trigger("focus.customSelect2")}else{h.addClass(b("Open"));j.stopPropagation();a(document).one("mouseup.customSelect2",function(k){if(k.target!=g.get(0)&&a.inArray(k.target,g.find("*").get())<0){g.trigger("blur.customSelect2")}else{f(g,h)}})}}}).on("focus.customSelect2",function(){h.removeClass(b("Changed")).addClass(b("Focus"))}).on("blur.customSelect2",function(){h.removeClass(b("Focus")+" "+b("Open"))}).on("mouseenter.customSelect2",function(){h.addClass(b("Hover"))}).on("mouseleave.customSelect2",function(){h.removeClass(b("Hover"))}).trigger("render.customSelect2")})}})})(jQuery);


/*!
 * jquery.customSelect() - v0.5.1
 * http://adam.co/lab/jquery/customselect/
 * 2014-04-19
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License 
 */
(function(a){a.fn.extend({customSelect:function(c){if(typeof document.body.style.maxHeight==="undefined"){return this}var e={customClass:"customSelect",mapClass:true,mapStyle:true},c=a.extend(e,c),d=c.customClass,f=function(h,k){var g=h.find(":selected"),j=k.children(":first"),i=g.html()||"&nbsp;";j.html(i);if(g.attr("disabled")){k.addClass(b("DisabledOption"))}else{k.removeClass(b("DisabledOption"))}setTimeout(function(){k.removeClass(b("Open"));a(document).off("mouseup.customSelect")},60)},b=function(g){return d+g};return this.each(function(){var g=a(this),i=a("<span />").addClass(b("Inner")),h=a("<span />");g.after(h.append(i));h.addClass(d);if(c.mapClass){h.addClass(g.attr("class"))}if(c.mapStyle){h.attr("style",g.attr("style"))}g.addClass("hasCustomSelect").on("render.customSelect",function(){f(g,h);g.css("width","");var k=parseInt(g.outerWidth(),10)-(parseInt(h.outerWidth(),10)-parseInt(h.width(),10));h.css({display:"inline-block"});var j=h.outerHeight();if(g.attr("disabled")){h.addClass(b("Disabled"))}else{h.removeClass(b("Disabled"))}i.css({width:k,display:"inline-block"});g.css({"-webkit-appearance":"menulist-button",width:h.outerWidth(),position:"absolute",opacity:0,height:j,fontSize:h.css("font-size")})}).on("change.customSelect",function(){h.addClass(b("Changed"));f(g,h)}).on("keyup.customSelect",function(j){if(!h.hasClass(b("Open"))){g.trigger("blur.customSelect");g.trigger("focus.customSelect")}else{if(j.which==13||j.which==27){f(g,h)}}}).on("mousedown.customSelect",function(){h.removeClass(b("Changed"))}).on("mouseup.customSelect",function(j){if(!h.hasClass(b("Open"))){if(a("."+b("Open")).not(h).length>0&&typeof InstallTrigger!=="undefined"){g.trigger("focus.customSelect")}else{h.addClass(b("Open"));j.stopPropagation();a(document).one("mouseup.customSelect",function(k){if(k.target!=g.get(0)&&a.inArray(k.target,g.find("*").get())<0){g.trigger("blur.customSelect")}else{f(g,h)}})}}}).on("focus.customSelect",function(){h.removeClass(b("Changed")).addClass(b("Focus"))}).on("blur.customSelect",function(){h.removeClass(b("Focus")+" "+b("Open"))}).on("mouseenter.customSelect",function(){h.addClass(b("Hover"))}).on("mouseleave.customSelect",function(){h.removeClass(b("Hover"))}).trigger("render.customSelect")})}})})(jQuery);


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

function trackOutboundLink(url) {
   ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
     function () {
     document.location = url;
     }
   });
}

function fixupLinks(){
    $('a').each(function() {		
        if(window.location.hostname && window.location.hostname !== this.hostname  && !this.href.match(/^mailto\:/i)) {
            $(this).attr('target','_blank');
        }
    });     
    var filetypes = /\.(zip|exe|dmg|pdf|doc.*|xls.*|ppt.*|mp3|txt|rar|wma|mov|avi|wmv|flv|wav)$/i;
    var baseHref = '';
    if ($('base').attr('href') != undefined) baseHref = $('base').attr('href');
    if (typeof ga == 'function')
    {
        $('a').on('click', function(event) {
          
          var el = $(this);
          var track = true;
          var href = (typeof(el.attr('href')) != 'undefined' ) ? el.attr('href') :"";
          var isThisDomain = true;

          if (href.match(/^https?\:/i)) {
            var domain = href.match(/http[s]?\:\/\/(.*?)[\/$]/)[1]
            var isThisDomain = (window.location.hostname && window.location.hostname == domain) ? true : false;
          } 
          if (!href.match(/^javascript:/i)) {
            var elEv = []; elEv.value=0, elEv.non_i=false;
            if (el.hasClass('regCTA')){
                elEv.category = "Donate";
                elEv.action = "Donate_Button";
                if (el.parent('p.donate').length) elEv.label = "PhotoCompleteDonation";                
                else elEv.label = "Header";
                elEv.loc = href;
            } 
            else if (el.hasClass('upload-button')){
                elEv.category = "Upload";
                elEv.action = "Upload";
                elEv.label = "Photo_Menu";
                if (el.parent('.og-details').length) elEv.label = "Banner";
                elEv.loc = href;
            }
            else if (el.data('provider')!= '' && el.parent('.navbar-social-links').length){
                if (el.data('provider')!= 'facebook'){
                    elEv.action = "Share_FB";
                }
                else if (el.data('provider')!= 'instagram'){
                    elEv.action = "Share_Instag";
                }
                else if (el.data('provider')!= 'twitter'){
                    elEv.action = "Share_Twitter";
                }
                else if (el.data('provider')!= 'email'){
                    elEv.action = "Share_Email";
                }                
                elEv.category = "Share";
                elEv.label = "Header";
                elEv.loc = href;
            }
            else if (el.data('provider')!= '' && el.parent('.social-media-icons').length){
                if (el.data('provider')!= 'facebook'){
                    elEv.action = "Share_FB";
                }
                else if (el.data('provider')!= 'twitter'){
                    elEv.action = "Share_Twitter";
                }
                elEv.category = "Share";
                elEv.label = "Photo_Menu"; 
                elEv.loc = href;
            }  
            else if (el.data('did')!= ''){
                elEv.category = "Frontpage";
                elEv.action = "View";
                elEv.label = href;
                elEv.loc = href;
            }
            else if (href.match(/^mailto\:/i)) {
              elEv.category = "email";
              elEv.action = "click";
              elEv.label = href.replace(/^mailto\:/i, '');
              elEv.loc = href;
            }
            else if (href.match(filetypes)) {
              var extension = (/[.]/.exec(href)) ? /[^.]+$/.exec(href) : undefined;
              elEv.category = "download";
              elEv.action = "click-" + extension[0];
              elEv.label = href.replace(/ /g,"-");
              elEv.loc = baseHref + href;
            }
            else if (href.match(/^https?\:/i) && !isThisDomain) {
              elEv.category = "external";
              elEv.action = "click";
              elEv.label = href.replace(/^https?\:\/\//i, '');
              elEv.loc = href;
            }
            else if (href.match(/^tel\:/i)) {
              elEv.category = "telephone";
              elEv.action = "click";
              elEv.label = href.replace(/^tel\:/i, '');
              elEv.loc = href;
            }
            else track = false;
     
            if (track) {

              ga('send','event', elEv.category, elEv.action, elEv.label, elEv.value);
              if ( el.attr('target') == undefined || el.attr('target').toLowerCase() != '_blank') {
                setTimeout(function() { location.href = elEv.loc; }, 400);
                return false;
              }
            }
          }
        });
    }   
}
/*!
 * jquery.customSelect2() - v0.5.1
 * http://adam.co/lab/jquery/customselect2/
 * 2014-04-19
 *
 * Copyright 2013 Adam Coulombe
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @license http://www.gnu.org/licenses/gpl.html GPL2 License 
 */
(function(a){a.fn.extend({customSelect2:function(c){if(typeof document.body.style.maxHeight==="undefined"){return this}var e={customClass:"customSelect2",mapClass:true,mapStyle:true},c=a.extend(e,c),d=c.customClass,f=function(h,k){var g=h.find(":selected"),j=k.children(":first"),i=g.html()||"&nbsp;";j.html(i);if(g.attr("disabled")){k.addClass(b("DisabledOption"))}else{k.removeClass(b("DisabledOption"))}setTimeout(function(){k.removeClass(b("Open"));a(document).off("mouseup.customSelect2")},60)},b=function(g){return d+g};return this.each(function(){var g=a(this),i=a("<span />").addClass(b("Inner")),h=a("<span />");g.after(h.append(i));h.addClass(d);if(c.mapClass){h.addClass(g.attr("class"))}if(c.mapStyle){h.attr("style",g.attr("style"))}g.addClass("hasCustomSelect2").on("render.customSelect2",function(){f(g,h);g.css("width","");var k=parseInt(g.outerWidth(),10)-(parseInt(h.outerWidth(),10)-parseInt(h.width(),10));h.css({display:"inline-block"});var j=h.outerHeight();if(g.attr("disabled")){h.addClass(b("Disabled"))}else{h.removeClass(b("Disabled"))}i.css({width:k,display:"inline-block"});g.css({"-webkit-appearance":"menulist-button",width:h.outerWidth(),position:"absolute",opacity:0,height:j,fontSize:h.css("font-size")})}).on("change.customSelect2",function(){h.addClass(b("Changed"));f(g,h)}).on("keyup.customSelect2",function(j){if(!h.hasClass(b("Open"))){g.trigger("blur.customSelect2");g.trigger("focus.customSelect2")}else{if(j.which==13||j.which==27){f(g,h)}}}).on("mousedown.customSelect2",function(){h.removeClass(b("Changed"))}).on("mouseup.customSelect2",function(j){if(!h.hasClass(b("Open"))){if(a("."+b("Open")).not(h).length>0&&typeof InstallTrigger!=="undefined"){g.trigger("focus.customSelect2")}else{h.addClass(b("Open"));j.stopPropagation();a(document).one("mouseup.customSelect2",function(k){if(k.target!=g.get(0)&&a.inArray(k.target,g.find("*").get())<0){g.trigger("blur.customSelect2")}else{f(g,h)}})}}}).on("focus.customSelect2",function(){h.removeClass(b("Changed")).addClass(b("Focus"))}).on("blur.customSelect2",function(){h.removeClass(b("Focus")+" "+b("Open"))}).on("mouseenter.customSelect2",function(){h.addClass(b("Hover"))}).on("mouseleave.customSelect2",function(){h.removeClass(b("Hover"))}).trigger("render.customSelect2")})}})})(jQuery);

(function(a){a.fn.extend({customSelect:function(c){if(typeof document.body.style.maxHeight==="undefined"){return this}var e={customClass:"customSelect",mapClass:true,mapStyle:true},c=a.extend(e,c),d=c.customClass,f=function(h,k){var g=h.find(":selected"),j=k.children(":first"),i=g.html()||"&nbsp;";j.html(i);if(g.attr("disabled")){k.addClass(b("DisabledOption"))}else{k.removeClass(b("DisabledOption"))}setTimeout(function(){k.removeClass(b("Open"));a(document).off("mouseup.customSelect")},60)},b=function(g){return d+g};return this.each(function(){var g=a(this),i=a("<span />").addClass(b("Inner")),h=a("<span />");g.after(h.append(i));h.addClass(d);if(c.mapClass){h.addClass(g.attr("class"))}if(c.mapStyle){h.attr("style",g.attr("style"))}g.addClass("hasCustomSelect").on("render.customSelect",function(){f(g,h);g.css("width","");var k=parseInt(g.outerWidth(),10)-(parseInt(h.outerWidth(),10)-parseInt(h.width(),10));h.css({display:"inline-block"});var j=h.outerHeight();if(g.attr("disabled")){h.addClass(b("Disabled"))}else{h.removeClass(b("Disabled"))}i.css({width:k,display:"inline-block"});g.css({"-webkit-appearance":"menulist-button",width:h.outerWidth(),position:"absolute",opacity:0,height:j,fontSize:h.css("font-size")})}).on("change.customSelect",function(){h.addClass(b("Changed"));f(g,h)}).on("keyup.customSelect",function(j){if(!h.hasClass(b("Open"))){g.trigger("blur.customSelect");g.trigger("focus.customSelect")}else{if(j.which==13||j.which==27){f(g,h)}}}).on("mousedown.customSelect",function(){h.removeClass(b("Changed"))}).on("mouseup.customSelect",function(j){if(!h.hasClass(b("Open"))){if(a("."+b("Open")).not(h).length>0&&typeof InstallTrigger!=="undefined"){g.trigger("focus.customSelect")}else{h.addClass(b("Open"));j.stopPropagation();a(document).one("mouseup.customSelect",function(k){if(k.target!=g.get(0)&&a.inArray(k.target,g.find("*").get())<0){g.trigger("blur.customSelect")}else{f(g,h)}})}}}).on("focus.customSelect",function(){h.removeClass(b("Changed")).addClass(b("Focus"))}).on("blur.customSelect",function(){h.removeClass(b("Focus")+" "+b("Open"))}).on("mouseenter.customSelect",function(){h.addClass(b("Hover"))}).on("mouseleave.customSelect",function(){h.removeClass(b("Hover"))}).trigger("render.customSelect")})}})})(jQuery);

/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {
  var $cs = $('.styled').customSelect();
  var $cs = $('.styled2').customSelect();

      var inputQuantity = [];
    $(function() {
      $(".quantity").each(function(i) {
        inputQuantity[i]=this.defaultValue;
         $(this).data("idx",i); // save this field's index to access later
      });
      $(".quantity").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); // retrieve the index
//        window.console && console.log($field.is(":invalid"));
          //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 5);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });


  // document.getElementById('rpageshortname').onchange = function () {
  //   document.getElementById('pageshortname').value = event.target.value  
  // }

    fixupLinks();
}); /* end of as page load scripts */
