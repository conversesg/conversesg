<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<!--<meta http-equiv="X-UA-Compatible" content="IE=8" />-->
	<meta name="viewport" content="width=985" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset="<?php bloginfo( 'charset' ); ?>" />
	
	<link rel = "shortcut icon" href = "<?php bloginfo('template_directory'); ?>/images/favicon.ico">
	<!--<title><?php bloginfo('name'); ?><?php wp_title(); ?></title />-->
	<title>
		<?php
		/* Print the <title> tag based on what is being viewed. */
		global $page, $paged;
		wp_title( '|', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'converse' ), max( $paged, $page ) );
		?>
	</title>
	
	<!--<meta name="description" content="<?php /*if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }*/
    ?>" />
	<?php //if(is_single() || is_page() || is_home()) { ?>
    <meta name="googlebot" content="index,noarchive,follow,noodp" />
    <meta name="robots" content="all,index,follow" />
	  <meta name="msnbot" content="all,index,follow" />
	<?php //} else { ?>
		<meta name="googlebot" content="noindex,noarchive,follow,noodp" />
		<meta name="robots" content="noindex,follow" />
	  <meta name="msnbot" content="noindex,follow" />
	<?php //}?>
	
	<?php
	/*
	  $custom_fields = get_post_custom(72);
	  $my_custom_field = $custom_fields['my_custom_field'];
	  foreach ( $my_custom_field as $key => $value )
		echo $key . " => " . $value . "<br />";
	*/
	?>-->

	<link rel="profile" href="http://gmpg.org/xfn/11" />	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		
		comments_popup_script(); // off by default */
				
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.*/
		wp_head();
	?>
	
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/build/jquery.js"></script>-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.3.2.js"></script>-->
	
	<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/build/mediaelement-and-player.min.js"></script>-->
	<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/build/mediaelementplayer.min.js"></script>-->
		<!--<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/build/mediaelementplayer.min.css" />-->
	<!--<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/build/mejs-skins.css" />-->

	<!-- Chang URLs to wherever Video.js files will be hosted -->
	  <link href="<?php bloginfo('template_directory'); ?>/css/video-js.css" rel="stylesheet" type="text/css">
	  <!-- video.js must be in the <head> for older IEs to work. -->
	  <script src="<?php bloginfo('template_directory'); ?>/js/video.js"></script>
	  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
	  <script>
		_V_.options.flash.swf = "<?php bloginfo('template_directory'); ?>/js/video-js.swf";
	  </script>	
	
	<!--<script type="text/javascript" src="/assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.pikachoose.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.3.pack.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.3.css" media="screen" />-->
   
	<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nivo-theme/default.css" type="text/css" media="screen" />-->
	
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
	<?php if(is_home() or is_front_page()) { ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.ennui.contentslider.js"></script>
	<?php } else if(is_page(8) or (is_category() and post_type_exists('product')) ){ ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.ennui.contentslider_product.js"></script>
	<?php } ?>
	<link href="<?php bloginfo('template_directory'); ?>/css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	
	<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.3.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.3.css" media="screen" />-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	
	<!--<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>-->
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mousewheel.min.js"></script>
			
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/equalheight.js"></script>
			
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.ad-gallery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.ad-gallery.css">-->
	
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
	

<!--[if IE 6]>
	<style type="text/css">
	html { /*overflow-y: hidden; */}
	body { /*overflow-y: auto; */}
	#homeBg {position:absolute; z-index:-1; position:fixed; top:0; left:0; width:100%; height:100%;}
	#pageBg {position:absolute; z-index:-1; position:fixed; top:0; left:0; width:100%; height:100%;}
	#lineBg {position:absolute; z-index:-1; position:fixed; top:0; left:0; width:100%; height:100%;}
	</style>
<![endif]-->

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/basic.css" type="text/css" />-->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/galleriffic-2.css" type="text/css" />
	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.galleriffic.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.opacityrollover.js"></script>
	<!-- We only want the thumbnails to display when javascript is disabled -->
	<script type="text/javascript">
		document.write('<style>.noscript { display: none; }</style>');
	</script>
	
	<script>
			function show_content(contentID){
				$('.contentArea').slideUp();
				$('#contentArea'+contentID).slideDown();
				//$('.containerGallery').slideUp();
				//$('#containerGallery'+contentID).slideDown();

				if(contentID!='51')
					$('.buttonDownloadRegistration').hide();	
				
				$('.skaterContent a').css('opacity',0.4);
				$('.skaterName').css('opacity',0);
				$('#skaterName'+contentID).css('opacity',1);				
				$('#skaterContent'+contentID+" a").css('opacity',1);
			}
			
			function gotoPage(step){
            $(".cs_rightBtnHome").trigger('click');
					
			}
			
			
		$(document).ready(function() {
			
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top}, 2000);
			});		
			
			$(".scrollUp").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top}, 1000);
			});	
			
 			
		});
		
		
		$(window).load(function() {			
					
			$('.cs_leftBtn img').mousedown(function() {
			  $(this).css('width','120px');
			});
			
			$('.cs_leftBtn img').mouseup(function() {			  
			  $(this).css('width','141px');				
			});
			
			$('.cs_rightBtnProduct img').mousedown(function() {
			  $(this).css('width','120px');
			});
			
			$('.cs_rightBtnProduct img').mouseup(function() {			  
			  $(this).css('width','141px');				
			});
			
			
			/*$('.skaterContent a').mouseenter(function() {
			  $(this).css('opacity',1);
			  $('.skaterName').css('opacity',1);	
			}).mouseleave(function() {
			  $(this).css('opacity',0.4);
			  $('.skaterName').css('opacity',0.4);
			});*/
						
			/*$('#s').mouseenter(function() {
			  $(this).fadeTo("slow", 0.6);
			});*/
			
			//HOME SLIDER
			/*$('#slider').nivoSlider();	
			
			$('.nivo-prevNav').mouseenter(function() {
			  $(this).animate({'opacity': 1});
			});
			
			$('.nivo-prevNav').mouseleave(function() {
			  $(this).animate({'opacity': 0.5});
			});
			
			
			$('.nivo-nextNav').mouseenter(function() {
			  $(this).animate({'opacity': 1});
			});
			
			$('.nivo-nextNav').mouseleave(function() {
			  $(this).animate({'opacity': 0.5});
			});*/
			
			/*
			$('.cs_leftBtn').mouseenter(function() {
			  $(this).animate({'opacity': 1});
			});
			
			$('.cs_leftBtn').mouseleave(function() {
			  $(this).animate({'opacity': 0.5});
			});
			
			
			$('.cs_rightBtn').mouseenter(function() {
			  $(this).animate({'opacity': 1});
			});
			
			$('.cs_rightBtn').mouseleave(function() {
			  $(this).animate({'opacity': 0.5});
			});*/
			
			
			/*var timerid = setInterval(function() {
				$('a.cs_leftBtn').trigger('click');
			}, speed);
			*/
			//clearInterval(timerid);
					
				
		});
		
		
		
		//$(function() {
		window.onload = $(function() {
			$('.eventContent').equalHeights();
			$('.regisContent').equalHeights();
			
			// TOP SEARCH 
			$('#s').focus(function() {
					$(this).animate({width: "150"}, 300 );	
					$(this).fadeTo("slow", 1).val('');
			});

			$('#s').blur(function() {
					$(this).animate({width: "150"}, 300 );
					$(this).fadeTo("slow", 0.8);
			});
			
			<?php if(is_home() or is_front_page()) { ?>
				$('#homeSliderItems').ContentSlider1({
					width:'981px',
					height:'697px',
					speed : 800,
					easing : 'easeInOutBack'//easeOutQuad easeInOutBack
				});
				
				/*var autoslide = setInterval(headline_rotate, 8000);

				$("#homeSliderItems").hover(function() {
				clearInterval(autoslide);
				}, function() {
				autoslide = setInterval(headline_rotate, 8000);
				});

				function headline_rotate() {
				$leftD = $(".cs_leftBtn").css("display");
				$rightD = $(".cs_rightBtn").css("display");
				if($leftD == "none"){
				$dir = "goRight";
				}
				if($rightD == "none"){
				$dir = "goLeft";
				}
				($dir == "goRight") ? $curButt=".cs_rightBtn" : $curButt=".cs_leftBtn";
				$($curButt).trigger("click");
				}*/
				
				
			<?php } else if(is_page(8) or (is_category() and post_type_exists('product'))){ ?>
				$('#productSliderItems').ContentSlider2({
					width:'955px',
					height:'450px',
					speed : 800,
					easing : 'easeInOutBack'//easeOutQuad easeInOutBack
				});
			<?php } ?>
		});
		
	</script>
</head>

<body <?php body_class(); ?>>
	<div id="rulerBg"></div>
	<?php //if(is_page(113) or is_page(164)){ ?><!--<div id="archiveBg"></div>--><?php //} ?>


<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<a href="<?php bloginfo('url'); ?>/">
					<div id="logo">
					</div>
				</a>
				
				<!-- BEGIN TOP SEARCH -->
					<form id="searchform" action="<?php bloginfo('url'); ?>/" method="get">
						<input type="submit" value="" id="searchsubmit"/>
						<input type="text" id="s" name="s" value="<?php _e( 'Search', 'conversesg' ) ?>" />
					</form>
				<?php	
				//if ( 'blank' == get_header_textcolor() ) :
					?>
						<!--<div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
						<?php //get_search_form(); ?>
						</div>-->
					<?php
						//else :
					?>
						<?php //get_search_form(); ?>
				<?php //endif; ?>
				<!-- END TOP SEARCH -->				
				
			</div><!-- #branding -->
			
			
			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'Primary Navigation' , 'container_id' => 'mainMenu', 'fallback_cb'=>'primaryMenu', 'after'=> '<span class="separatorMenu">/</span>') ); ?>				
			</div><!-- #access -->
			<!--
			<?php 
			/*$file= get_bloginfo('url')."/wp-content/uploads/City Carnage KIT v.2.pdf";
			$filepathinfo = mb_pathinfo($file);
			$filename =  $filepathinfo['basename'];
			$filepath =  $filepathinfo['dirname'];
			$encodeurl = encode($filepath,5);*/
			?>
			<?php if(/*!is_home() or !is_front_page()*/is_page(11)) { ?>
			<a href="<?php echo get_bloginfo('url'); ?>/download?action=<?php echo $encodeurl;?>&file=<?php echo $filename;?>">
				<div class="buttonDownloadCoupon">
				</div>
			</a>
			<?php } ?>
			-->
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">