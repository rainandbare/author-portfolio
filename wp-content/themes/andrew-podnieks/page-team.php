<?php

/*
	Template Name: Team - Moydart
*/

get_header();  ?>
<?php get_sidebar(); ?>
<div class="main">
  <div class="container">
    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<header class="page">
      	<h2><?php the_title(); ?></h2>
    </header>	
    <main class="page">
    	<?php $teamQuery = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'team-member'
    )); ?>

    <?php if($teamQuery -> have_posts()): ?>
      <?php while ($teamQuery -> have_posts()): ?>
        <?php $teamQuery -> the_post(); ?>
        <!-- what we want to show goes here -->
        
		<?php  
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', false);
		$thumb_url = $thumb_url_array[0]; 
		?>
		<div class="teamMember clearfix">
			<div class="memberPhoto">
				<img src=" <?php echo $thumb_url; ?> " alt="<?php echo the_title(); ?>'s Headshot">
			</div>
			<div class="memberInfo">
				<h3><?php the_title(); ?></h3>
				<p class="position"> <?php echo get_field('position') ?> </p>
				<?php the_content(); ?>
			</div>
		</div>

        
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    </main>
      

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>