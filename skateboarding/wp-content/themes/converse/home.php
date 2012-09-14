<?php get_header();  ?>	
	<div id="container">
    
	<?php	
		// Check if this is a post or page, if it has a thumbnail, and if it's a big one
		/*if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
				has_post_thumbnail( $post->ID ) &&
				( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
				$image[1] >= HEADER_IMAGE_WIDTH ) :
			// Houston, we have a new header image!
			echo get_the_post_thumbnail( $post->ID );
		elseif ( get_header_image() ) : */?>
			<!--<img src="<?php //header_image(); ?>" width="1205px<?php //echo HEADER_IMAGE_WIDTH; ?>" alt="" /><!--height="<?php //echo HEADER_IMAGE_HEIGHT; ?>"--> 
		
		<!--<div class="slider-wrapper theme-default">
			<div class="ribbon"></div>
			<div id="slider" class="nivoSlider">
			<a href="#"><img src="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/images/banner_home1.jpg" alt="title" title="#htmlcaption" data-transition="fade"/></a>
			<a href="#"><img src="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/images/banner_home4.jpg" alt="title" title="#htmlcaption" data-transition="fade"/></a>
			<a href="#"><img src="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/images/banner_home5.jpg" alt="title" title="#htmlcaption" data-transition="fade"/></a>			
			</div>
			<div id="htmlcaption" class="nivo-html-caption displayNone">
				<div class="htmlCaptionText"><strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.</div>
				<div class="htmlCaptionBg"></div>
			</div>
		</div>-->
		<!--data-transition="fade"  title="This is an example of a caption" -->
		
							<div id="homeSliderItems" class="contentslider homeSliderWidth">
								<div class="cs_wrapper">
									<div class="cs_slider">
										<?php //$i=0; while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++; ?>
											<!--<h2> <a href="#">Article Number One</a> </h2>-->
											<?php //$productimage = get_field('productimage'); //foreach($productimage as $product){?>
											
													
													<div class="cs_article homeSliderWidth">
															<a href="<?php echo get_bloginfo('url'); ?>/shoes/">
																<img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/converse/images/bannerHome3.jpg" title="Converse | The KA-ONE VULC Engineered for Destruction" alt="Converse | The KA-ONE VULC Engineered for Destruction"/>
															</a>
													</div><!-- End cs_article -->	
                                                    
													<div class="cs_article homeSliderWidth">
															<a href="<?php echo get_bloginfo('url'); ?>/technology">
																<img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/converse/images/bannerHome2.jpg" title="Converse | The Trapasso Pro II Engineered for Destruction" alt="Converse | The Trapasso Pro II Engineered for Destruction"/>
															</a>
													</div><!-- End cs_article -->	
                                                    
                                                    <div class="cs_article homeSliderWidth secondBannerHomeImage">
														<div class="buttonHomeBottom">	
															<!--<a href="<?php echo get_bloginfo('url'); ?>/registration?id=51" >
																<div class="buttonRegister"></div>
															</a>	
															<a onclick="gotoPage('3')">
																<div class="buttonWatch"></div>	
															</a>-->
															<a onclick="gotoPage('3')">
																<div class="buttonRegister"></div>
															</a>	
															<a href="<?php echo get_bloginfo('url'); ?>/gallery" >
																<div class="buttonWatch"></div>	
															</a>
														</div>	
													</div><!-- End cs_article -->	
													
													<div class="cs_article homeSliderWidth secondBannerHome">
														<?php /*if(isset($_GET['vid'])){ $i=0;  while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++;
																	if($_GET['vid'] == $post->ID){
																		$videoid = $_GET['vid'];
																		$videofile = get('videofile',1,1,$videoid);
																		$videourl = get('videourl',1,1,$videoid);
																		if ($videofile)
																			$videosrc = $videofile;
																		else 
																			$videosrc = $videourl;
																	}
																	else if($_GET['vid']==null)
																	{
																		$videofile = get_field('videofile');
																		foreach($videofile as $video){
																			$videosrc = $video;
																			//$videosrc = get_field('videofile',1,1,1);
																		}
																	} 
															id="playerVideo"   poster="<?php echo get_bloginfo('url'); ?>/wp-content/themes/converse/media/echo-hereweare.jpg"*/
															//$videosrc = get_bloginfo('url')."/wp-content/uploads/citycarnageteaser.mp4"; 
															//$videosrc2 = get_bloginfo('url')."/wp-content/uploads/citycarnageteaser.ogg"; 
															//$videosrc = get_bloginfo('url')."/wp-content/uploads/project_carnage_web_x264.mp4"; 
															$video3src = get_bloginfo('url')."/wp-content/uploads/archive/videos/1.mp4"; 
															$video3scwebm = get_bloginfo('url')."/wp-content/uploads/archive/videosothers/1.webm"; 
															$video3sogv = get_bloginfo('url')."/wp-content/uploads/archive/videosothers/1.ogv";
															?>
															<div id="videoPlayArea3" class="videoPlayArea3">
																<video id="videosGalleryHome" class="video-js vjs-default-skin" controls preload="auto" width="622" height="472" data-setup="{}">
																	<source type="video/mp4" src="<?php echo $video3src; ?>"/>
																	<source type='video/webm' src="<?php echo $video3scwebm; ?>" />
																	<source type='video/ogg' src="<?php echo $video3sogv; ?>" />
																	<!--<track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
																</video>
																
																<!--<video width="622px" height="472px" id="playerVideo" controls="controls" preload="none" autoplay="false">
																 title="Converse | City Carnage Contest Introduction" alt="Converse | City Carnage Contest Introduction"-->
																	<!-- MP4 source must come first for iOS  fullscreen="false" duration="false" loop="false" progress="false" volume="false"
																	<source type="video/mp4" src="<?php //echo $videosrc; ?>" />-->
																	<!-- WebM for Firefox 4 and Opera
																	<source type="video/webm" src="../media/echo-hereweare.webm" />-->
																	<!-- OGG for Firefox 3 
																	<source type="video/ogg" src="<?php //echo $videosrc2; ?>" />-->
																	<!-- Youtube embled 
																	<source type="video/youtube" src="http://www.youtube.com/watch?v=nOEw9iiopwI" />-->
																	<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off
																	<object width="622" height="472" type="application/x-shockwave-flash" data="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/build/flashmediaelement.swf"> 		
																		<param name="movie" value="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/build/flashmediaelement.swf" /> -->
																			<!-- video 622 414 - 472
																			City Carnage Contest Introduction
																		<param name="flashvars" value="controls=true&amp;file=<?php //echo $videosrc; ?>" /> -->		
																		<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed 
																		<img src="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/media/echo-hereweare.jpg" width="622" height="472" alt="Here we are" title="No video playback capabilities" />
																	</object> 	
																</video>-->
															</div>
					
															<div class="buttonHomeBottom thirdBannerHome" style="width:240px;">	
																	
																<a href="<?php echo get_bloginfo('url'); ?>/gallery" >
																	<div class="buttonWatch"></div>	
																</a>
															</div>	
														<!--<p>Hendrerit tincidunt vero vel eorum claritatem. Solutalegunt quod qui dolore typi. Vel dolore soluta qui odionon. Sollemnes minim eorum feugiat nihil nobis. Gothica	dolor in legentis nihil quinta.</p>
														<p>Iriure parum autem putamus lectores duis. Quam sit quis	me me zzril. Facer etiam in lectores hendrerit etiam. Exerci lorem liber tincidunt nostrud decima. Mutationem	est zzril ipsum facer nobis.</p>
														<a href="#" class="readmore">Read More</a>-->
													</div><!-- End cs_article -->
													
													<!--<div style="display: none;">
														<div id="detailProduct<?php //echo $i;?>" class="detailContentProduct">
															<h2><?php //echo get_the_title($post->ID); ?></h2>
															<img src="<?php //echo $product['original']; ?>" title="title" alt="alt" width="362px" height="276px" />
															<?php 
															//echo "<br>";
															//echo the_content($post->ID); 
															?>
														</div>
													</div>-->
													<?php
													//}
													?>
													<script>
													//$(window).load(function() {
													/*$(document).ready(function() {
														$("#detailProducts<?php echo $i;?>").fancybox({
															'padding'			: 5,
															'width'				: 500,
															'height'			: 700,
															'autoScale'			: false,
															'titleShow'			: false,
															'titlePosition'		: 'inside',//over
															'transitionIn'		: 'fade',//elastic
															'transitionOut'		: 'fade',
															'overlayShow'		: true,
															'overlayColor'		: '#000',
															'opacity'			: true,
															'overlayOpacity'	: 0.9,
															'showCloseButton'	: false,
															'showNavArrows' 	: false,
															'enableEscapeButton': false,
															'enableKeyboardNav' : false
														});
													});*/
													</script>
												<?php												
												//}
												?>	
									</div><!-- End cs_slider -->
								</div><!-- End cs_wrapper -->
							</div><!-- End contentslider -->
																	
	<?php //endif; ?>
	
	</div><!-- END HOME CONTENT -->
<?php get_footer(); ?>