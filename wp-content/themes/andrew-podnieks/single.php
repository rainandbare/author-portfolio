<?php get_header(); ?>
<?php get_sidebar('andrew'); ?>



<div class="main single">
  <div class="container">
    <div class="content">
    <header class="page clearfix">
        <h2><?php the_title(); ?></h2>
       
    </header> 

    <main class="page clearfix">
     <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>

          <div class="entry-meta">
            
             <?php 
                  $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                      echo '<h5>' .$tag->name. '</h5>'; 
                    }
                  }?>
              <h6><?php the_date(); ?></h6> 
          </div><!-- .entry-meta -->

          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->
         <h5><a href="<?php echo get_bloginfo('url') . "/news/"?>">&larr; Back to News</a></h5>
        </div><!-- #post-## -->

      <?php endwhile; // end of the loop. ?>

     </main>
    </div> <!-- /.content -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>