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
    <main class="news">
    		          <!-- new news query -->
          <?php
            $newsQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'post'
              )
            ); 
          ?>
          <!-- get news  -->
          <?php if ( $newsQuery->have_posts() ) : ?>
            <?php while ($newsQuery->have_posts()) : $newsQuery->the_post(); ?>
                 <!-- individual post -->
                <section class = "blog-post">
                	<?php echo get_the_tag_list('<h5>',', ','</h5>');?>
                 	<h4><?php the_title(); ?></h4>
                    <p><?php the_content(); ?></p>
                    <?php 
                    $link = get_field('link');
                    if ($link !== ''){ ?>
                    <a class="read" href=" <?php echo get_field('link'); ?> ">Read Story</a>
                    <?php } ?>

                </section>   
            <?php
        
            endwhile; 
             wp_reset_postdata();
             else:  ?>
            [ stuff that happens if there aren't any posts]
          <?php endif; ?>
    </main>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>