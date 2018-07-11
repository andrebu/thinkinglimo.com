<?php 
global $Cart,$General;
$itemsInCartCount = $Cart->cartCount();
$cartAmount = $Cart->getCartAmt();

?>
<div id="sidebar_l">
                     	
                        <?php if ( get_option('ptthemes_show_blog_title') ) { ?>
                
                  
                   <div class="blog-title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> </div>
                <p class="blog-description">
                  <?php bloginfo('description'); ?>
                </p>
                
                <?php } else { ?>
                <a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('ptthemes_logo_url') <> "" ) { echo get_option('ptthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo.png'; } ?>" alt="<?php bloginfo('name'); ?>" class="logo"  /></a>             
                <?php } ?>
                
                
                
                
                
                 <ul class="sf-menu sf-vertical ">
                         <li class="hometab <?php if ( is_home() ) { ?>current_page_item <?php } ?>"><a href="<?php echo get_option('home'); ?>/"><?php echo get_option('ptthemes_home_name'); ?></a></li>
 							 <?php wp_list_pages('title_li=&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
                    </ul>
                         
                        
                             
                             
                             <div class="clearfix"></div>
                    <div class="cart_section_l  clearfix">
                             	<div class="cart_section_top">
                                	<div class="cart_section_bottom ">
                                    	 
                                         <h4>Shopping Cart</h4>
                                         <p>You have <a href="<?php echo get_option('siteurl'); ?>/?page=cart"><strong><span id="cart_information_span"><?php if($cartAmount>0){ echo $itemsInCartCount . "(".$General->get_amount_format($cartAmount).")";} else{ echo $itemsInCartCount;}?></span></strong></a> item in your Shopping Bag </p>
                                    
                                    </div>
                                </div>
                    </div> <!-- Shopping Cart Section left #end -->
                    
                      <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(1)) ) { // Show on the front page ?>
									<?php dynamic_sidebar(1); ?>  
                             <?php } ?>
                    
                              
                             
                             <?php if ( get_option('ptthemes_footerpages') <> "" ) { ?>
                                <ul class="nav_sec">
                                <?php wp_list_pages('title_li=&depth=0&include=' . get_option('ptthemes_footerpages') . '&sort_column=menu_order'); ?>
                                </ul>
                            <?php } ?>
                            
                            
                             
                             
                 
                        
                  </div> <!-- sidebar_l #end -->