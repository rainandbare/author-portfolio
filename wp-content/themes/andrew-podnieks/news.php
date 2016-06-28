<?php 

/*
	Template Name: Author - News
*/

?>
<?php get_header(); ?>
<?php get_sidebar('andrew'); ?>
<div class="main">
  <div class="container">

    <div class="content">
    		<?php get_template_part( 'loop', 'index' );	?>
    </div> <!--/.content -->

    

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>