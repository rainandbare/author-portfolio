<?php

/*
	Template Name: About - Author
*/

get_header();  ?>
<?php get_sidebar('andrew'); ?>
<div class="main">
  <div class="container">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<header class="about page">
	    <h2><?php the_title(); ?></h2>
	</header>
	<main class="page">
		<?php the_content(); ?>
	</main>
      

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>