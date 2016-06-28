<?php

/*
	Template Name: Imprint - Moydart
*/

get_header();  ?>
<?php get_sidebar(); ?>

<div class="main">
  <div class="container">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<header class="imprint page ">
		<h2><?php the_title(); ?></h2>
	</header>
    <main class="imprint page">
    	<?php the_content(); ?>
    </main>
      

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>