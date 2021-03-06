<?php get_header(); ?>

<div id="content">

  <div class="content_center">
    <div class="content_top">


       <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <!--post title-->
   <div class="posts">
   <div class="posts-in">
<div class="calendar">
          <?php the_time('j') ?>
          <br />
          <span>
          <?php the_time('M') ?>
          </span> </div>

        
        <div class="ptop">
        <h3 class="h1" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
          <?php the_title(); ?>
          </a></h3>
        <div class="post_top"> <span class="auth">Posted by
          <?php the_author_posts_link(); ?>
          </span> <span class="commentp">
          <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?>
          </span> </div>
           </div>
        
         <div class="clear">
        <?php the_content('Read the rest of this entry'); ?>
        </div>
        
          <!--Rateing-->
    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
    <!--Rateing end-->
        
        <div class="post_bottom">
          <div class="post_bottom2"> <span class="category">Categories :
            <?php the_category(',') ?>
            </span> <span class="tags">Tags :
            <?php if (function_exists('the_tags')) { ?>
            <?php the_tags('', ', ', ''); ?>
            <?php } ?>
            </span> </div>
        </div>
        <!--post bottom end -->
        </div>
     
    
       <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
      <!--include comments template-->
      
  <div class="posts-in">
      <?php comments_template(); ?>
      <!--do not delete-->
    </div>
  

      <?php endwhile; else: ?>
      <div class="posts">
   <div class="posts-in">
   
    <h1>Sorry, no posts matched your criteria.</h1>


  <p>Please try searching again here...</p>
  <div class="search404">
    <?php include(TEMPLATEPATH."/searchform.php");?>
  </div>
  <p class="clear"><strong>Or, take a look at Archives and Categories</strong></p>
  <div class="scategory">
    <h2>
      <?php _e('Category'); ?>
    </h2>
    <ul>
      <?php wp_list_categories('orderby=name&title_li'); ?>
    </ul>
  </div>
  <div class="archives">
    <h2 class="sidebartitle">
      <?php _e('Archives'); ?>
    </h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>
  </div>
  
     </div>
     </div>
 
       <!--do not delete-->
      <?php endif; ?>
      <!--single.php end-->
      </div>
      
       </div>
  </div>
    <div class="content_bottom clear"></div>

     </div>
 <!--include sidebar-->
<?php get_sidebar();?>
<!--include footer-->
<?php get_footer(); ?>
