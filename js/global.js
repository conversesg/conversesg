<!--
function popup(url) 
{
 var width  = 630;
 var height = 900;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=yes';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'eventwindow', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->

// when the DOM is ready...
$(document).ready(function() {	
	
	//search - remove the watermark
	$("#cse-search-box input[name=q]")
		.css("background", "transparent")
		.css("border", "none")
		.val('Search');
	
	$("#cse-search-box input[name=q]").blur(function(){
		$(this).css("background", "transparent");
		if ($(this).val() == ""){
			$(this).val('Search');
		}
	});
	
	$("#cse-search-box input[name=q]").focus(function(){
		$(this).css("background", "transparent");
		if ($(this).val() == "Search"){
			$(this).val('');
		}
	});
	
	// menu effects
	$("div.menu div.section").not(".current").hover(
		function () {
			$(this).addClass("hover");
		},
		function () {
			$(this).removeClass("hover");
			$(this).removeClass("click"); 
		}
	);
	
	$("div.menu div.section").mouseup(function(){
      $(this).removeClass("click"); 
    })
	
	$("div.menu div.section").mousedown(function(){ 
      $(this).addClass("click");
    });

	//squares effects
	$(".item").hover(
		function () {
			$(this).addClass("selected");
			// fix for IE cleartype
			//$(this).find(".details").fadeIn("normal", function(){if ($.browser.msie){this.style.removeAttribute('filter');}});
			$(this).find(".pictures").fadeOut("normal");
			if ($.browser.msie) {
				$(this).find(".details").css('display', 'block');
			} else {
				$(this).find(".details").fadeIn("normal");
			}
		}, 
		function () {
			$(this).removeClass("selected");
			$(this).find(".pictures").fadeIn("normal");
			if ($.browser.msie) {
				$(this).find(".details").css('display', 'none');
			} else {
				$(this).find(".details").fadeOut("normal");
			}
		}
   );
   
});
/////////// toggle hide //////////////
$(document).ready(function() { 
   // slides down, up, and toggle the slickbox on click    
  $('#slick-slidetoggle').click(function() {
    $('#content-main').slideToggle(400);
    return false;
  });
});
///////// page flip jquery /////////////////
$(document).ready(function(){
	$("#pageflip").hover(function() {
		$("#pageflip img , .msg_block").stop()
			.animate({
				width: '307px', 
				height: '319px'
			}, 500); 
		} , function() {
		$("#pageflip img").stop() 
			.animate({
				width: '80px', 
				height: '82px'
			}, 220);
		$(".msg_block").stop() 
			.animate({
				width: '80px', 
				height: '80px'
			}, 200);
	});
	
});

// homepage banner hover fade //
$(document).ready(function(){
	$("#content-bottom img").fadeTo("normal", 1); // This sets the opacity of the thumbs to fade down to 100% when the page loads

$("#content-bottom img").hover(function(){
	$(this).fadeTo("normal", 0.7); // This should set the opacity to 50% on hover
},function(){
	$(this).fadeTo("normal", 1); // This should set the opacity back to 60% on mouseout
});
});


//hover menu//
//<![CDATA[
$(document).ready(function() {
  
	function megaHoverOver(){
		$(this).find(".submenu").stop().fadeTo('fast', 1).show();
	}
	
	function megaHoverOut(){ 
	  $(this).find(".submenu").stop().fadeTo('fast', 0, function() {
		  $(this).hide(); 
	  });
	}


	var config = {    
		 sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)    
		 interval: 100, // number = milliseconds for onMouseOver polling interval    
		 over: megaHoverOver, // function = onMouseOver callback (REQUIRED)    
		 timeout: 500, // number = milliseconds delay before onMouseOut    
		 out: megaHoverOut // function = onMouseOut callback (REQUIRED)    
	};

	$("#navigation li .submenu").css({'opacity':'0'});
	$("#navigation li").hoverIntent(config);



});

//]]>