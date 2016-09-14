<?php 

/*
	Template Name: Author - News
*/

?>
<?php get_header(); ?>
<?php get_sidebar('andrew'); ?>



<div class="main news">
  <div class="container">
    <div class="content">
    <header class="page clearfix">
        <h2><?php the_title(); ?></h2>
    </header> 

    <main class="news clearfix">
     <h3>Latest Articles</h3>
     <div class="latest-articles clearfix">
    		          <!-- new news query -->
          <?php
            $newsQuery = new WP_Query(
            array(
              'posts_per_page' => 6,
              'post_type' => 'post'
              )
            ); 
          ?>
          <!-- get news  -->
          <?php if ( $newsQuery->have_posts() ) : ?>
            <?php while ($newsQuery->have_posts()) : $newsQuery->the_post(); ?>
                  <?php 
                    $link = get_field('link');
                    if ($link == ''){
                      $link = get_permalink();
                    }
                    ?>
                    <a class="read" href="<?php echo $link; ?> ">
                <section class = "blog-post clearfix">
                	<?php 
                  $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                      echo '<h5>' .$tag->name. '</h5>'; 
                    }
                  }?>
                 	<h4><?php the_title(); ?></h4>
                  <h6><?php echo get_the_date(); ?></h6>
                  <p><?php the_excerpt(); ?></p>
                  <div class="overlay"><i class="fa fa-arrow-right"></i><p>Read Article</p></div>
                </section>
                </a>  
            <?php
        
            endwhile; 
             wp_reset_postdata();
             else:  ?>
            [ stuff that happens if there aren't any posts]
          <?php endif; ?>
          </div>
     <h3>Archive</h3>  
     <div class="last-month">
       <header class="last-month-header archive clearfix">
         <h3>This Month</h3>
         <i class="ex">&plus;</i>
       </header>
       <main class="null">
                  <!-- new news query -->
          <?php
            $lastmonthQuery = new WP_Query(
            array(
              'posts_per_page' => 6,
              'post_type' => 'post',
              'date_query' => array(
                                array(
                                  'year' => date( 'Y' ),
                                  'month' => date( 'm' ),
                                ),
                              ),
              )
            ); 
          ?>
          <!-- get news  -->
          <?php if ( $lastmonthQuery->have_posts() ) : ?>
            <?php while ($lastmonthQuery->have_posts()) : $lastmonthQuery->the_post(); ?>
                  <?php 
                     $link = get_field('link');
                    if ($link == ''){
                      $link = get_permalink();
                    }
                    ?>
                    <a class="read" href="<?php echo $link;?> ">
                <section class = "blog-post previous clearfix">
                 
                  <h4><?php the_title(); ?></h4> 
                  <!-- <?php 
                  $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                     // echo '<h5>' .$tag->name. '</h5>'; 
                    }
                  }?> -->
                  <h6><?php echo get_the_date(); ?></h6>
                   <!--  <p><?php //the_content(); ?></p> -->
                    <div class="overlay"><!-- <i class="fa fa-arrow-right"></i><p>Read Article</p> --></div>
                </section>
                </a>  
                <?php
        
            endwhile; 
             wp_reset_postdata();
             else:  ?>
            <p>No Articles Posted this Month.</p>
          <?php endif; ?>
          </div>
       </main>
     </div> 

     <div class="all-other-months">
      <header class="all-other-months-header archive clearfix">
         <h3>Previous</h3>
         <i class="ex">&plus;</i>
       </header>
       <main class="null">
         <?php
            $allmonthsQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'date_query' => array(
                                 array(
                                    'before'    => array(
                                      'year'  => date( 'Y' ),
                                      'month' => date( 'm' ),
                                      'day'   => 01,
                                    ),
                                    'inclusive' => false,
                                  ),
                                 ),
              'post_type' => 'post'
              )
            ); 
          ?>
          <!-- get news  -->
          <?php if ( $allmonthsQuery->have_posts() ) : ?>
            <?php while ($allmonthsQuery->have_posts()) : $allmonthsQuery->the_post(); ?>
                  <?php 
               static $curr_date = '';
               $postmonth = get_the_date('F Y');
               if ($curr_date == '') {
                  $curr_date = $postmonth;
                  echo "<div class='month-group'><header class='new-month clearfix'><h4 id='month'>";
                  echo $curr_date; 
                  echo "</h4><i class='ex'>&plus;</i></header><section class='monthsArticles null clearfix'>"; 
               }
                else if ($curr_date != $postmonth) {
                  $curr_date = $postmonth;
                  echo "</section></div><div class='month-group'><header class='new-month clearfix'><h4 id='month'>";
                  echo $curr_date; 
                  echo "</h4><i class='ex'>&plus;</i></header><section class='monthsArticles null clearfix'>"; }?>
                  <?php 
                     $link = get_field('link');
                    if ($link == ''){
                      $link = get_permalink();
                    }
                    ?>
                    <a class="read" href="<?php echo $link;?> ">
                <section class = "blog-post previous clearfix">
                 <h4><?php the_title(); ?></h4> 
                  <!-- <?php 
                  $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                     // echo '<h5>' .$tag->name. '</h5>'; 
                    }
                  }?> -->
                  <h6><?php echo get_the_date(); ?></h6>
                   <!--  <p><?php //the_content(); ?></p> -->
                    <div class="overlay"><!-- <i class="fa fa-arrow-right"></i><p>Read Article</p> --></div>
                </section>
                </a>  
                <?php
            endwhile; 
             wp_reset_postdata();
             else:  ?>
            <p>No Articles Posted.</p>
          <?php endif; ?>
          </section> <!-- /.monthsArticles-->
     </div>  
    </main>
  </div> <!-- /.container -->
</div> <!-- /.main -->
<a href="#" class="back-to-top" style="display: inline;">
  <i class="fa fa-arrow-up"></i>
</a>
<?php get_footer(); ?>