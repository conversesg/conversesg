<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
	if(is_page(8)){
		$items = "product";
		$counts = -1;
		$orderby = "name";
		$pageTitle = "Shoes";
		$order = "ASC";
	} 
	else if(is_page(214)){
		$items = "tech";
		$counts = -1;
		$orderby = "menu_order";
		$pageTitle = "Technology & Innovation";
		$order = "ASC";
	}
	else if(is_page(22)){
		$items = "event";
		$counts = -1;
		$orderby = "menu_order";
		$pageTitle = "Event";
		$order = "ASC";
	} else if(is_page(11)){
		$items = "registration";
		$counts = -1;
		//$ex = 84;
		$orderby = "id";
		$pageTitle = "Registration";
		$order = "ASC";
	} else if(is_page(25)){ 
		$items = "skater"; 
		$counts = -1;
		$orderby = "title";
		$pageTitle = "Converse Skaters";
		$order = "ASC";
	} else if(is_page(16)){ 
		$items = "store"; 
		$counts = -1;
		$orderby = "name";
		$pageTitle = "Store Locator";
		$order = "ASC";
	} else if(is_page(113) or is_page(164)){ 
		$items = "gallery"; 
		$counts = -1;
		$orderby = "id";
		$pageTitle = "Gallery";
		$order = "ASC";
	}
	
	$Cquery = new WP_Query(array( 
		'post_type' => $items,
		'posts_per_page' => $counts,
		'post_type' => $items,
		//'paged' => get_query_var('paged'),		
		'orderby' => $orderby, //none ID author title date modified parent rand comment_count menu_order meta_value meta_value_num
		'order' => $order,
		'post_status' => array( 'publish' )
	));
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( /*is_front_page() &&*/ is_page() && !is_page(16) ) { ?>
						<h1 class="entry-title-page"><?php _e( $pageTitle, 'converse' ); ?></h1>
						<?php $contentPage = get_the_content(); ?>
					<?php } 
					
					if(is_page(8)){ ?>
							<div class="breadcrumbPage">
							<?php 
							 $args = array(
								//'show_option_all'    => ,
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								//'use_desc_for_title' => 1,
								'child_of'           => 12,
								//'feed'               => ,
								//'feed_type'          => ,
								//'feed_image'         => '/images/rss.gif',
								//'exclude'            => 12,
								//'exclude_tree'       => ,
								//'include'            => ,
								'hierarchical'       => true,
								'title_li'           => '',/*__( 'Categories' )*/
								//'show_option_none'   => __('No categories'),
								'number'             => NULL,
								//'echo'               => 1,
								//'depth'              => 2,
								//'current_category'   => 12,
								'pad_counts'         => 0,
								'taxonomy'           => 'category',
								//'walker'             => 'Walker_Category' 
								);
							?>
							<ul class="subNavigation lowerNavigation">
								<?php 
								//$variable = wp_list_categories($args);
								//$variable = preg_replace('~\((\d+)\)(?=\s*+<)~', '$1', $variable);
								//echo $variable;
								?>
							</ul>
							</div>
							<div style="clear:left"></div>
							<div id="productSliderItems" class="contentslider productSliderWidth">
								<div class="cs_wrapper">
									<div class="cs_slider">
										<?php $i=0;  
											while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++; ?>
											<?php $productimage = get_field('productimage');
												foreach($productimage as $product){?>
												<div class="cs_article productSliderWidth">
													<!--<a id="detailProducts<?php echo $i;?>" href="#detailProduct<?php echo $i;?>" >-->
														<img class="centerXYZ" src="<?php echo $product['thumb']; ?>" width="477px" height="205px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>" />
													<!--</a>-->
													<div class="sliderStaticCaption">	
														<?php 
														echo "<h2 class='entry-title-product'>".get_the_title($post->ID)."</h2><br />"; 
														echo _e( "SKU # : ", 'converse' ).get('sku')."<br />";
														echo _e( "Color : ", 'converse' ).get('color')."<br />";
														?>
													</div>	
												</div><!-- End cs_article -->
												
												<div style="display: none;">
													<div id="detailProduct<?php echo $i;?>" class="detailContentProduct">
														<h2><?php echo get_the_title($post->ID); ?></h2>
														<img src="<?php echo $product['original']; ?>" width="362px" height="276px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>" />
														<?php 
														echo "<br>";
														echo the_content($post->ID); 
														?>
													</div>
												</div>
												<?php
												}
												?>
												<script>
												//$(window).load(function() {
												$(document).ready(function() {
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
												});
												</script>
										<?php												
										}
										?>	

									</div><!-- End cs_slider -->
								</div><!-- End cs_wrapper -->
							</div><!-- End contentslider -->	
							
					<?php } else if(is_page(22)){ ?>
							<div class="breadcrumbPage">
								<ul class="subNavigation lowerNavigation"> 
								<?php $i=0;  
									while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++; ?>
										<li class="<?php if( $_GET['id']==$post->ID){echo "activeLeftList";}else{echo "notActiveLeftList";} ?>">
											<a href="<?php echo get_bloginfo('url');?>/event?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" class='scroll' onclick="show_content('<?php echo $post->ID;?>')"><?php echo get('title_breadcrumb'); ?></a>
										<span class="separatorMenu">/</span></li><?php
									}
								?>
								</ul>
							</div>	
							<div style="clear:left"></div>
							<!--<div class="pagesContent">
								<?php  //echo $contentPage; ?>
							</div>-->
							<div class="eventContentList">
								<div>
								<?php while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID;
									//$photos_thumbnail = array ("w" => 100, "h" => 100);
									//$photos_atributos = array('id' => "photos_thumb", "class" => "photos_thumb", "rel" => "un rel");
									//$eventimage = get_field('eventimage');
									//foreach($eventimage as $event){
									//printf('<img src="%s" class="my_class" alt="a image" />', $foto['thumb'] );\
									
									//echo $videofile = get('videofile',$post->ID);
									//echo $videourl = get('videourl',$post->ID);
									//the_title(); 
																						
									if (has_post_thumbnail($post->ID ) ){ 
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnails' ); }
									$image160 = get_bloginfo('url')."/wp-content/uploads/about.jpg";
									?>		
									<div class="eventContent">
										 
										<?php if($post->ID=="160"){?>	
											<a href="<?php echo get_bloginfo('url');?>/event?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="thumb scroll">
												<img src="<?php echo $image160; ?>" width="195px" height="151px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>">
											</a>
										<?php } else {?>
											<a href="<?php echo get_bloginfo('url');?>/event?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="thumb scroll">
												<img src="<?php echo $image[0]; ?>" width="195px" height="151px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>">
											</a>
										<?php } ?>
										<!--<div class="eventImage">
											<a rel="images_group" href="<?php echo $event['original']; ?>" class="thumb">
												<?php //echo get_image('photosimage',1,1,$photos_thumbnail,$photos_atributos); ?>
												<img src="<?php echo $event['thumb']; ?>" title="title" alt="alt" width="195px" height="151px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>" />
											</a>
										</div>-->
										<div class="detailEvent">										
											<h2 class='entry-title-event'><?php echo get_the_title(); ?></h2>
											<?php 
											$contentlimit = substr(get_the_content(), 0, 65);
											echo $contentlimit."..";
											?>
										</div>
										<a href="<?php echo get_bloginfo('url');?>/event?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class='scroll'>
											<div class="readMoreButtonEvent">Read More</div>	
										</a>	
									</div>	
									<?php
									}
							if ($i%4==0)
								echo '</div><div style="clear:left"></div>';
						if ($i%4!=0)
							echo '</div>
							<div style="clear:left"></div>';
							while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; ?>
								<div id="contentArea<?php echo $post->ID;?>" class="contentArea">
									<div id="rulerBg2ndLevel"></div>
									<h2 class='entry-title-event contentAreaTitle'><?php _e( get_the_title(), 'converse' ); ?></h2>
									<div class="contentDetail">
										<?php the_content(); ?>
									</div>	
									<a href="#wrapper" class="scrollUp buttonBackToTop">back to top</a>	
								</div>								
							<?php
							} ?> 						
					<?php } else if(is_page(113) or is_page(164)){ ?>
							<div class="breadcrumbPage">
								<ul class="subNavigation lowerNavigation"> 
								<!--<?php //$i=0;  
									//while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++; ?>
										<li class="<?php if( $_GET['id']==$post->ID){echo "activeLeftList";}else{echo "notActiveLeftList";} ?>">
											<a href="<?php echo get_bloginfo('url');?>/event?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" class='scroll' onclick="show_content('<?php echo $post->ID;?>')"><?php echo get('title_breadcrumb'); ?></a>
										<span class="separatorMenu">/</span></li><?php
									//}									
								?>-->
									Photos / Video
								</ul>
							</div>	
							<div style="clear:left"></div>
							<!--<div class="pagesContent">
								<?php  //echo $contentPage; ?>
							</div>-->								
							<div class="eventContentList">
								<div>
								<?php //while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID;
									//$photos_thumbnail = array ("w" => 100, "h" => 100);
									//$photos_atributos = array('id' => "photos_thumb", "class" => "photos_thumb", "rel" => "un rel");
									//$eventimage = get_field('eventimage');
									//foreach($eventimage as $event){
									//printf('<img src="%s" class="my_class" alt="a image" />', $foto['thumb'] );\
									
									//echo $videofile = get('videofile',$post->ID);
									//echo $videourl = get('videourl',$post->ID);
									//the_title(); 
																						
									//if (has_post_thumbnail($post->ID ) ){ 
									//$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnails' ); }
										
										//$imageThumbnail = get_field('thumbnail');
										//foreach($imageThumbnail as $imageThumb){
										//$type = get_field('type'); 
									
									$statusDev="3";
									if($statusDev=="1"){
										$dir=$_SERVER["DOCUMENT_ROOT"].'/converse.sg/';
									}else if($statusDev=="2"){
										$dir=$_SERVER["DOCUMENT_ROOT"].'/dev/';
									}else if($statusDev=="3"){
										$dir=$_SERVER["DOCUMENT_ROOT"].'/skateboarding/';
									}
									
									$filesImageContent = ReadFolderDirectory($dir.'/wp-content/uploads/archive/content/'); 
									$filesVideos = ReadFolderDirectory($dir.'/wp-content/uploads/archive/videos/'); 
									$contenttitle1 = "CITY CARNAGE 2012";
									$contenttitle2="ASIA CROWN RECAP";
									$contenttitle3="PROJECT CARNAGE";
									$contenttitle4="ASIA CROWN 2011";
									$contentdesc1="Featuring footages from City Carnage 2012.";
									$contentdesc2="Flashbacks of Asia Crown 2011.";
									$contentdesc3="Project Carnage is produly sponsored by Converse Skateboarding Singapore.";
									$contentdesc4="Featuring footages from Asia Crown 2011.";
									
									
									if ($filesImageContent) 
									{ 
										$ic=0;
										foreach ($filesImageContent as $fileImageContent) 
										{ 
											$contentId = $ic;
											$ic++;	
											//$contentId = $post->ID;
											$ImageContent = get_bloginfo('url').'/wp-content/uploads/archive/content/'.$fileImageContent;
											?>		
											<div class="archiveContent">									
												<?php 
												?>
												<a href="<?php echo get_bloginfo('url');?>/gallery?id=<?php echo $contentId; ?>#contentArea<?php echo $contentId;?>" onclick="show_content('<?php echo $contentId;?>')" class="thumb scroll">
													<img src="<?php echo $ImageContent; ?>" title="<?php echo ${'contenttitle' . $contentId}; ?>" alt="<?php echo ${'contenttitle' . $contentId}; ?>">
												</a>
												  
												<div class="detailEvent">										
													<h2 class='entry-title-event'><?php echo ${'contenttitle' . $ic}; //echo get_the_title(); ?></h2>
													<?php
													echo ${'contentdesc' . $ic};
													?>
												</div>
												
												<?php 
												if($type[1]=="Videos" or $ic=='3' or $ic=='4'){ //id="buttonWatch" onclick="watch_video('')"  ?>
													<!--<a id="buttonWatch">
														<div class="readMoreButtonArchive">Watch Video</div>
													</a>-->
												<?php }else if($type[1]=="Photos" or $ic=='1' or $ic=='2'){ 
													//$contentId = $post->ID;
													$contentId = $ic;
													?>
													<a href="<?php echo get_bloginfo('url');?>/gallery?id=<?php echo $contentId; ?>#contentArea<?php echo $contentId;?>" onclick="show_content('<?php echo $contentId;?>')" class='scroll'>
														<div class="readMoreButtonArchive">Find Out More</div>
													</a>	
												<?}?>
											</div>	
											<?php
										}
									}
									
									if ($filesVideos) 
									{ 
										$fc=2;
										foreach ($filesVideos as $fileVideos) 
										{	
											$fc++;	
											$contentId = $fc;
											$videosrc = get_bloginfo('url').'/wp-content/uploads/archive/videos/'.$fileVideos;
											$videothumb = get_bloginfo('url').'/wp-content/uploads/archive/videosthumb/'.str_replace('.mp4','.jpg',$fileVideos);
											?>
											<div class="archiveContent">
												<a href="<?php echo get_bloginfo('url');?>/gallery?id=<?php echo $contentId; ?>#contentArea<?php echo $contentId;?>" onclick="show_content('<?php echo $contentId;?>')" class="thumb scroll">
													<img src="<?php echo $videothumb; ?>" title="<?php echo ${'contenttitle' . $contentId}; ?>" alt="<?php echo ${'contenttitle' . $contentId}; ?>">
													<div class="videos-overlay-button">
													</div>
												</a>
												<div class="detailEvent">										
													<h2 class='entry-title-event'><?php echo ${'contenttitle' . $fc}; //echo get_the_title(); ?></h2>
													<?php
													echo ${'contentdesc' . $fc};
													?>
												</div>
												
												<a class="thumb scroll" id="buttonWatch" href="<?php echo get_bloginfo('url');?>/gallery?id=<?php echo $contentId; ?>#contentArea<?php echo $contentId;?>" onclick="show_content('<?php echo $contentId;?>')">
													<div class="readMoreButtonArchive">Watch Video</div>
												</a>
												
											</div><?php
										}	
									}	
								
							if ($i%2==0)
								echo '</div><div style="clear:left"></div>';
						if ($i%2!=0)
							echo '</div>
							<div style="clear:left"></div>';
							
							//while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; 
								//$contentId = $post->ID;
								
								$ca=0;
								if ($filesImageContent) 
								{ 
									foreach ($filesImageContent as $fileImageContent) 
									{ 
										$ca++;
										$contentId = $ca;
										$filesImageGalleryThumb1 = ReadFolderDirectory($dir.'wp-content/uploads/archive/gallery/cityCarnageThumb/'); 
										$filesImageGallery1 = ReadFolderDirectory($dir.'wp-content/uploads/archive/gallery/cityCarnageView/'); 
										$filesImageGalleryThumb2 = ReadFolderDirectory($dir.'wp-content/uploads/archive/gallery/theAsiaCrownThumb/'); 
										$filesImageGallery2 = ReadFolderDirectory($dir.'wp-content/uploads/archive/gallery/theAsiaCrownView/'); 
										?>
										<div id="contentArea<?php echo $ca;?>" class="contentArea">
											<div id="rulerBg2ndLevel"></div>
											<h2 class='entry-title-event contentAreaTitle'><?php echo ${'contenttitle' . $contentId}; //_e( get_the_title(), 'converse' ); ?></h2>
											<div class="contentDetail">
												<?php //the_content(); 
												echo ${'contentdesc' . $contentId};
												?>
											</div>
											
											<div id="containerGallery<?php echo $contentId;?>" class="containerGallery" >
												<!--<h1><a href="index.html">Galleriffic</a></h1>
												<h2>Thumbnail rollover effects and slideshow crossfades</h2>-->

												<!-- Start Advanced Gallery Html Containers 
												<div id="gallery" class="content">
													<div id="controls" class="controls"></div>
													<div class="slideshow-container">
														<div id="loading" class="loader"></div>
														<div id="slideshow" class="slideshow"></div>
													</div>
													<div id="caption" class="caption-container"></div>
												</div> name="leaf" noscript-->
												<div id="thumbs<?php echo $ca;?>" class="navigation">
													<ul class="thumbs noscript">
													<?php
														if (${'filesImageGalleryThumb' . $contentId}) 
														{ 
															foreach (${'filesImageGalleryThumb' . $contentId} as ${'filesImageGalleryThumbs' . $contentId}) 
															{																
																/*if (${'filesImageGallery' . $contentId}) 
																{ 
																	foreach (${'filesImageGallery' . $contentId} as ${'filesImageGallerys' . $contentId}) 
																	{
																	
																	}	
																}*/	
																$path1 = get_bloginfo('url').'/wp-content/uploads/archive/gallery/cityCarnageThumb/';
																$pathimage1 = get_bloginfo('url').'/wp-content/uploads/archive/gallery/cityCarnageView/';
																$path2 = get_bloginfo('url').'/wp-content/uploads/archive/gallery/theAsiaCrownThumb/';
																$pathimage2 = get_bloginfo('url').'/wp-content/uploads/archive/gallery/theAsiaCrownView/';
																?>	
																<li>																		
																	<a rel="images_group<?php echo $ca;?>" href="<?php echo ${'pathimage' . $contentId}.${'filesImageGalleryThumbs' . $contentId}; ?>" thumb="<?php echo ${'path' . $contentId}.${'filesImageGalleryThumbs' . $contentId}; ?>">																			
																	</a>
																</li>
																<?php																	
															}
														}																
													?>
													</ul>
												</div>
												<div style="clear: both;"></div>
												
												<script>
													jQuery(document).ready(function($) {
														// We only want these styles applied when javascript is enabled
														$('div.navigation').css({'width' : '860px','height' : '845px', 'float' : 'left'});
														//$('div.content').css('display', 'block');

														// Initially set opacity on thumbs and add
														// additional styling for hover effect on thumbs
														var onMouseOutOpacity = 0.67;
														$('#thumbs ul.thumbs li').opacityrollover({
															mouseOutOpacity:   onMouseOutOpacity,
															mouseOverOpacity:  1.0,
															fadeSpeed:         'fast',
															exemptionSelector: '.selected'
														});
														
														// Initialize Advanced Galleriffic Gallery
														var gallery = $('#thumbs<?php echo $ca;?>').galleriffic({
															delay:                     2500,
															numThumbs:                 16,
															preloadAhead:              10,
															enableTopPager:            true,
															enableBottomPager:         false,
															maxPagesToShow:            7,
															imageContainerSel:         '#slideshow',
															controlsContainerSel:      '#controls',
															captionContainerSel:       '#caption',
															loadingContainerSel:       '#loading<?php echo $ca;?>',
															renderSSControls:          true,
															renderNavControls:         true,
															playLinkText:              'Play Slideshow',
															pauseLinkText:             'Pause Slideshow',
															prevLinkText:              '&lsaquo; Previous Photo',
															nextLinkText:              'Next Photo &rsaquo;',
															nextPageLinkText:          'Next &rsaquo;',
															prevPageLinkText:          '&lsaquo; Prev',
															enableHistory:             false,
															autoStart:                 false,
															syncTransitions:           true,
															defaultTransitionDuration: 900,
															onSlideChange:             function(prevIndex, nextIndex) {
																// 'this' refers to the gallery, which is an extension of $('#thumbs')
																this.find('ul.thumbs').children()
																	.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
																	.eq(nextIndex).fadeTo('fast', 1.0);
															},
															onPageTransitionOut:       function(callback) {
																this.fadeTo('fast', 0.0, callback);
															},
															onPageTransitionIn:        function() {
																this.fadeTo('fast', 1.0);
															}
														});
														
														
														$("a[rel=images_group<?php echo $ca;?>]").fancybox({
														'padding'			: 5,
														'autoscale'			: true,
														'transitionIn'		: 'elastic',
														'transitionOut'		: 'elastic',
														'titleShow'			: false,
														'titlePosition' 	: 'over',
														'overlayShow'		: true,
														'overlayColor'		: '#000',
														'opacity'			: true,
														'overlayOpacity'	: 0.9,
														'showCloseButton'	: false,
														'showNavArrows' 	: true,
														'enableEscapeButton': false,
														'enableKeyboardNav' : true,
														'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
														return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
														}
														});
													});
												</script>
													
											</div>	
											<a href="#wrapper" class="scrollUp buttonBackToTop">back to top</a>	
										</div>	
										<?php
									}
								}
									
								if ($filesVideos) 
								{ 
									$fc=2;
									foreach ($filesVideos as $fileVideos) 
									{	
										$fc++;
										$contentId = $fc;
										$videosrc = get_bloginfo('url').'/wp-content/uploads/archive/videos/'.$fileVideos;
										$videothumb = get_bloginfo('url').'/wp-content/uploads/archive/videosthumb/'.str_replace('.mp4','.jpg',$fileVideos);
										$videoscrwebm = get_bloginfo('url').'/wp-content/uploads/archive/videosothers/'.str_replace('.mp4','.webm',$fileVideos);
										$videoscrogv = get_bloginfo('url').'/wp-content/uploads/archive/videosothers/'.str_replace('.mp4','.ogv',$fileVideos);
										?>
										<div id="contentArea<?php echo $fc;?>" class="contentArea">
											<div id="rulerBg2ndLevel"></div>
											<h2 class='entry-title-event contentAreaTitle'><?php echo ${'contenttitle' . $contentId}; //_e( get_the_title(), 'converse' ); ?></h2>
											<div class="contentDetail">
												<?php //the_content(); 
												echo ${'contentdesc' . $contentId};
												?>
											</div>											
											<div id="videoGallery"><!--poster="myPoster.jpg" loop autoplay controls -->
												<video id="videosGallery<?php echo $fc;?>" class="video-js vjs-default-skin" controls preload="auto" width="835" height="700" data-setup="{}">
													<source type="video/mp4" src="<?php echo $videosrc; ?>"/>
													<source type='video/webm' src="<?php echo $videoscrwebm; ?>" />
													<source type='video/ogg' src="<?php echo $videoscrogv; ?>" />
												<!--<track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
												</video>
												
												<!--<video id="videosGallery<?php //echo $fc; ?>" width="835" height="700" controls="controls" preload="auto" tabindex="0">
												 autoplay="true" poster="<?php //echo $videothumb; ?>" width="410" height="200" width="835" height="700" -->
												<!--<param name="autoplay" value="false"  /> 
												<param name="preload" value="false"  /> 
												<param name="fullscreen" value="false"  /> 
												<param name="duration" value="false"  /> 
												<param name="loop" value="false"  /> 
												<param name="progress" value="false" /> 
												<param name="volume" value="false" />-->
													<!-- MP4 source must come first for iOS 
													<source type="video/mp4" src="<?php //echo $videosrc; ?>" />-->
													<!-- WebM for Firefox 4 and Opera 
													<source type="video/webm" src="<?php //echo $videoscrwebm; ?>" />-->
													<!-- OGG for Firefox 3 
													<source type="video/ogg" src="<?php //echo $videoscrogv; ?>" />-->
													<!-- Youtube embled http://www.youtube.com/watch?v=nOEw9iiopwI-->
													<!--<source type="video/youtube" src="http://www.youtube.com/watch?v=7yDhql20TSU" />
													<!-- Optional: Add subtitles for each language -->
													<!--<track kind="subtitles" src="subtitles.srt" srclang="en" />-->
													<!-- Optional: Add chapters 
													<track kind="chapters" src="chapters.srt" srclang="en" /> -->
													<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off width="835" height="700"  
													<object width="640" height="360" type="application/x-shockwave-flash" data="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/build/flashmediaelement.swf">
														<param name="movie" value="<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/build/flashmediaelement.swf" />
															<param name="flashvars" value="controls=true&amp;file=<?php echo $videosrc; ?>" />-->
														<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed
														<?php //echo get_bloginfo('url'); ?>/wp-content/themes/converse/media/echo-hereweare.jpg
														<img src="" width="640" height="360" alt="Converse Singapore" title="No video playback capabilities" />
													</object> 	
												</video>-->												
											</div>
											<a href="#wrapper" class="scrollUp buttonBackToTop">back to top</a>	
										</div>		
										<?php
									}	
								}		
							//}				
					}	else if(is_page(11)){ ?>					
						
							<div class="breadcrumbPage">
								<ul class="subNavigation lowerNavigation"> 
								<?php $i=0;  
									while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++; ?>
										<li class="<?php if( $_GET['id']==$post->ID){echo "activeLeftList";}else{echo "notActiveLeftList";} ?>">
											<a href="<?php echo get_bloginfo('url');?>/registration?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class='scroll'><?php echo get('title_breadcrumb'); ?></a>
										<span class="separatorMenu">/</span></li><?php
									}
								?>
								</ul>
							</div>	
							<div style="clear:left"></div>
							<div class="regisContentList">
								<div>
								<?php $i=0;  
								while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++;																						
									if (has_post_thumbnail($post->ID ) ){ 
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnails' ); }
									?>		
									<div class="regisContent">
										  <a href="<?php echo get_bloginfo('url');?>/registration?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="scroll" class="thumb">
											<img src="<?php echo $image[0]; ?>" width="194px" height="150px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>">
										  </a>
										<div class="detailRegis">										
											<h2 class='entry-title-regis'><?php echo get_the_title(); ?></h2>
											<?php 
											$contentlimit = substr(get_the_content(), 0, 65);
											echo $contentlimit."..";
											?>
										</div>
										<a href="<?php echo get_bloginfo('url');?>/registration?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="scroll">
											<div class="readMoreButtonRegis">Read More</div>	
										</a>	
									</div>	
									<?php
									}
							if ($i%4==0)
								echo '</div><div style="clear:left"></div>';
						if ($i%4!=0)
							echo '</div>
							<div style="clear:left"></div>';
							
								
								while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; ?>
									<div id="contentArea<?php echo $post->ID;?>" class="contentArea">
									<div id="rulerBg2ndLevel"></div>
										<h2 class='entry-title-event contentAreaTitle'><?php _e( get_the_title(), 'converse' ); ?></h2>
										<div class="contentDetail">
											
											<?php
											$id=$_GET['id'];
											if($id==51){ 
											?>
												<script>
													$('#contentArea51').slideDown();													
												</script>
											<?php
											}											
											
											if($post->ID==51 or $id==51){ 
												$file = get('file_download',1,1,$post->ID);								
												$filepathinfo = mb_pathinfo($file);
												$filename =  $filepathinfo['basename'];
												$filepath =  $filepathinfo['dirname'];
												$encodeurl = encode($filepath,5);
												
												$content_post = get_post($post->ID);
												$content = $content_post->post_content;
												$content = apply_filters('the_content', $content);
												$content = str_replace(']]>', ']]>', $content);
												echo $content; ?>
												<a href="<?php echo get_bloginfo('url'); ?>/download?action=<?php echo $encodeurl;?>&file=<?php echo $filename;?>">
													<div class="buttonDownloadRegistration"></div>
												</a>
											<?php
											} else {
												$content_post = get_post($post->ID);
												$content = $content_post->post_content;
												$content = apply_filters('the_content', $content);
												$content = str_replace(']]>', ']]>', $content);
												echo $content; 
											}
											?>
										</div>
										<a href="#wrapper" class="scrollUp buttonBackToTop">back to top</a>	
									</div>
								<?php }							
								
					} else if(is_page(25)){ 
							
							$imagethumb169 = get_bloginfo('url').'/wp-content/uploads/jason-thumb.jpg';
							$imageProfile169 = get_bloginfo('url').'/wp-content/uploads/jason.jpg';
							$imagethumb170 = get_bloginfo('url').'/wp-content/uploads/mike-thumb.jpg';
							$imageProfile170 = get_bloginfo('url').'/wp-content/uploads/mike.jpg';
							$contenttitle169 = "Jason Jessee";
							$contenttitle170="Mike Anderson";
							$contentdesc169="If you have never heard of Jason Jesse it is time to get out from under the rock you have been living under. Jason has been featured in over 17 skate videos since flourishing in the Santa Cruz video “Streets on Fire”. Some people exploit emerging trends where innovators like Jason pave the road for trends to originate and then shy away when knowing that the trend has gotten blown out. From building motorcycles, cars, welding and showing the world what the perfect frontside ollie looks like, Jason has been a productive man. In 2012 Jason was honored by Transworld Skateboarding magazine by receiving the TWS Legend Award. Jason continues to inspire people around the globe with his passion on and off a skateboard.";
							$contentdesc170="Mike grew up skating the streets of Ventura, California although he is not your typical So-Cal skateboarder. He is raw, unpolished with an effortless style and comfortable skating any terrain that is put in his path. When you witness him skateboarding you can see that he is having a good time. He does not consider skateboarding as a job and gets uncomfortable when people refer to it as a career. Mike receives strong support from his sponsors and has already released a few memorable video parts. Be on the lookout for great things to come from Mike as he is always ready for the next adventure.";							
							?>						
							<div class="breadcrumbPage">
								<ul class="subNavigation lowerNavigation"> 
								<?php echo _e('Biography', 'converse' ); ?>
								</ul>
							</div>	
							<div style="clear:left"></div>
							<div class="skaterContentList">
								<div>
								<?php $i=0;  
								while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; $i++;										
									if (has_post_thumbnail($post->ID ) ){ 
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnails' ); }
									?>		
									
									<?php if($post->ID=="169"){?>	
										<div id="skaterContent<?php echo $post->ID; ?>" class="skaterContent">
											<a href="<?php echo get_bloginfo('url');?>/converse-skaters/?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="scroll" class="thumb">
												<div class="skaterLayers">
													<div id="skaterName<?php echo $post->ID; ?>" class="skaterName"><?php the_title(); ?></div>
												</div>
												<img src="<?php echo $imagethumb169; ?>" width="195px" height="151px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>">
											</a>
										</div>	
									<?php } else if($post->ID=="170"){?>	
										<div id="skaterContent<?php echo $post->ID; ?>" class="skaterContent">
											<a href="<?php echo get_bloginfo('url');?>/converse-skaters/?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="scroll" class="thumb">
												<div class="skaterLayers">
													<div id="skaterName<?php echo $post->ID; ?>" class="skaterName"><?php the_title(); ?></div>
												</div>
												<img src="<?php echo $imagethumb170; ?>" width="195px" height="151px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>">
											</a>
										</div>	
									<?php } else {?>
										<div id="skaterContent<?php echo $post->ID; ?>" class="skaterContent">
											<a href="<?php echo get_bloginfo('url');?>/converse-skaters/?id=<?php echo $post->ID; ?>#contentArea<?php echo $post->ID;?>" onclick="show_content('<?php echo $post->ID;?>')" class="scroll" class="thumb">
												<div class="skaterLayers">
													<div id="skaterName<?php echo $post->ID; ?>" class="skaterName"><?php the_title(); ?></div>
												</div>
												<img src="<?php echo $image[0]; ?>" width="195px" height="151px" title="<?php echo get_the_title($post->ID); ?>" alt="<?php echo get_the_title($post->ID); ?>">
											</a>
										</div>	
									<?php } ?>
									
									<?php
									}
							if ($i%4==0)
								echo '</div><div style="clear:left"></div>';
						if ($i%4!=0)
							echo '</div>
							<div style="clear:left"></div>';
							while ($Cquery->have_posts()) { $Cquery->the_post(); $do_not_duplicate = $post->ID; ?>
								<div id="contentArea<?php echo $post->ID;?>" class="contentArea">
									<div id="rulerBg2ndLevel"></div>
									<h2 class='entry-title-skater contentAreaTitle'><?php _e( get_the_title(), 'converse' ); ?></h2>
									
									<?php if($post->ID=="169"){?>	
										<div class="contentDetail">
											<table><tr><td><img src="<?php echo $imageProfile169; ?>" alt="" title="<?php _e( get_the_title(), 'converse' ); ?>" width="400" height="267" class="alignnone size-full wp-image-138" /></td><td style="vertical-align:top;padding-left:20px;"><?php the_content(); ?></td></tr></table>
										</div>	
									<?php } else if($post->ID=="170"){?>	
										<div class="contentDetail">
											<table><tr><td><img src="<?php echo $imageProfile170; ?>" alt="" title="<?php _e( get_the_title(), 'converse' ); ?>" width="400" height="267" class="alignnone size-full wp-image-138" /></td><td style="vertical-align:top;padding-left:20px;"><?php the_content(); ?></td></tr></table>
										</div>	
									<?php } else {?>
										<div class="contentDetail">
											<?php the_content(); ?>
										</div>	
									<?php } ?>
									<a href="#wrapper" class="scrollUp buttonBackToTop">back to top</a>
								</div>								
							<?php
							} 		
							
							
							
					} else if(is_page(16)){ ?>
						
						<div class="storeContentList">
							<!--<iframe width="951" height="697" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.id/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=converse+singapore&amp;aq=&amp;sll=-7.293097,112.767545&amp;sspn=0.008971,0.01649&amp;ie=UTF8&amp;hq=converse&amp;hnear=Singapore&amp;t=m&amp;fll=1.339867,103.889465&amp;fspn=0.289342,0.527687&amp;st=109146043351405611748&amp;rq=1&amp;ev=zo&amp;split=1&amp;ll=1.285293,103.83625&amp;spn=0.119618,0.168571&amp;z=13&amp;output=embed"></iframe>-->
						
							<iframe width="900" height="697" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=converse+singapore&amp;hl=en&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;hq=converse&amp;hnear=Singapore&amp;t=m&amp;ie=UTF8&amp;ll=1.32854,103.844833&amp;spn=0.239231,0.31929&amp;z=12&amp;output=embed"></iframe>
						
							<script>
							function initialize() {
							  if (GBrowserIsCompatible()) {
							  
								// Create and Center a Map
								var map = new GMap2(document.getElementById("map_canvas"));
								map.setCenter(new GLatLng(37.4419, -122.1419), 13);
								map.addControl(new GLargeMapControl());
								map.addControl(new GMapTypeControl());

								// bind a search control to the map, suppress result list
								//map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
							  }
							}
							GSearch.setOnLoadCallback(initialize);
							</script>
						</div>	
						
					<?php } else { ?>
					<!--<div id="contentInner" class="secondContent">
						<div class="customScrollBox">
							<div class="container">
								<div class="content">
									<div class="entry-content">
										<?php the_content(); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'converse' ), 'after' => '</div>' ) ); ?>
										<?php //edit_post_link( __( 'Edit', 'converse' ), '<span class="edit-link">', '</span>' ); ?>
									</div><!-- .entry-content -->					
								<!--</div>
							</div>
							<div class="dragger_container">
								<div class="dragger">&#9618;</div>
							</div>
						</div>
					</div>-->
					
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'converse' ), 'after' => '</div>' ) ); ?>
							<?php //edit_post_link( __( 'Edit', 'converse' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-content -->					
								
					<?php } ?>
					<!--<div class="moreposts" style="display:none" onclick="$('div.moreposts').slideUp();$(document).trigger('retrieve.infscr');">
						 Show more
					</div>
					<script>
					$(document).ajaxError(function(e,xhr,opt){
						if (xhr.status == 404) $('div.moreposts').slideUp("normal", function() { $(this).remove(); } );
					});
					</script>-->
					
				</div><!-- #post-## -->

				<?php //comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>