<?php get_header(); ?>
<?php if ( have_posts() )	the_post(); ?>
		<?php 
		global $wpdb,$post;
		      $cs_default_pages = get_option("cs_default_pages");
                if ( $cs_default_pages <> "" ) {
                    $xmlObject = new SimpleXMLElement($cs_default_pages);
                        $cs_layout = $xmlObject->cs_layout;
                        $cs_sidebar_left = $xmlObject->cs_sidebar_left;
                        $cs_sidebar_right = $xmlObject->cs_sidebar_right;
                        $cs_pagination = $xmlObject->cs_pagination;
                        $record_per_page = $xmlObject->record_per_page;
						if($cs_pagination == 'Single Page'){$record_per_page = '-1';}						
                }
			if ( $cs_layout == "left" ) {
				$cs_layout = "columns-sec twocol left_sidebar";
				$show_sidebar = $cs_sidebar_left;
			}
			else if ( $cs_layout == "right" ) {
				$cs_layout = "columns-sec twocol";
				$show_sidebar = $cs_sidebar_right;
			}
			else $cs_layout = "col4";		
            ?>
	<div id="content-sec">
    	<div class="inner">
        <div class="<?php echo $cs_layout;?>">
        	<?php if($cs_layout == 'columns-sec twocol'){echo '<div class="col3">';}else if($cs_layout == 'columns-sec twocol left_sidebar'){echo '<div class="col3">';}?>
				<div class="blog">
					<h1 class="heading colr">            
					<?php 
						if ( is_day() ) : printf( __( 'Daily Archives: <span>%s</span>', 'mytheme' ), get_the_date() ); 
						elseif ( is_month() ) :  printf( __( 'Monthly Archives: <span>%s</span>', 'mytheme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'mytheme' ) ) );
						elseif ( is_year() ) : printf( __( 'Yearly Archives: <span>%s</span>', 'mytheme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'mytheme' ) ) );
						else :  echo single_cat_title( '', false ); endif; 
					?>
					</h1>
					<?php
						if ( empty($_GET['page_id_all']) ) $_GET['page_id_all'] = 1;
							if ( $cs_pagination == "Single Page" ) $cs_pagination = -1;
							if(!isset($_GET["m"])){$_GET["m"] = '';}
							$newpost = 'posts_per_page=-1&m='.$_GET["m"].'&post_type=post';
							$newquery_dd = new WP_Query($newpost);
								$count_post = 0;
									while ( $newquery_dd->have_posts() ) : $newquery_dd->the_post(); 
											$count_post++;						
									endwhile;
	
							$new = 'posts_per_page='.$record_per_page.'&m='.$_GET["m"].'&paged='.$_GET["page_id_all"].'';
								$newquery = new WP_Query($new);
									while ( $newquery->have_posts() ) : $newquery->the_post(); 
						if ( is_archive() || is_search() ) :
					?>
                    <!-- Post Start -->
                        <div class="post no_image_found">
                            <div class="desc">
                            	<div class="date">
                                	<h1><?php echo date("d", strtotime(get_the_date()));?></h1>
                                	<h1><?php echo date("M", strtotime(get_the_date()));?></h1>                                    
                                </div>
                                <div class="desc-sec">
                                	<h3><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h3>
                                    <div class="post-opts">
                                    	<p>by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author();?></a></p>
                                        <p><?php echo get_the_time('F jS, Y');?></p>
                                        <p><a href="<?php echo get_permalink();?>#comments"><?php echo get_comments_number($post->ID);?> Comments</a></p>
                                    </div>
                                    <p>
                                    	<?php the_excerpt();?>
                                    </p>
                                    <a href="<?php echo get_permalink();?>" class="readmore">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                        <!-- Post End -->
					<?php endif; endwhile;	?>
					<?php
                    // pagination start					
                        $qrystr = '';
                        if (cs_pagination($count_post, $record_per_page,$qrystr)){
                            if ( $cs_pagination == "Show Pagination" and $record_per_page > 0 ) {
                                echo "<div class='paging'><ul>";
                                    $qrystr = '';
                                    if ( isset($_GET['m']) ) $qrystr = "&m=".$_GET['m'];
                                echo cs_pagination($count_post, $record_per_page,$qrystr);
                                echo "</ul></div>";
                            }
                        }
                    // pagination end												
                    ?>
		</div>                    
		<?php if($cs_layout <> 'col4'){echo '</div>';}?>    

            
     <?php if($cs_layout != "col4"){?>
        <!--Sidebar Start-->
            <div class="col1 hidemobile">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($show_sidebar) ) : ?>
                <?php endif; ?>   
            </div>            
        <!--Sidebar Ends-->  
        <?php }?>
                  
			</div>
           
<?php get_footer(); ?>