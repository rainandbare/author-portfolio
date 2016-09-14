<?php get_header( 'front' );  ?>

<div class="main front">
  <div class="container">
    <div class="content">
   	<div class="book clearfix">
   		<div class="red-half half">
        <header class="book-header">
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/06/books.jpg" alt="Andrew Podneiks Books">
          <h1>Andrew Podnieks</h1>
        </header>
	   		
    <?php wp_nav_menu( array(
    'container' => false,
        'theme_location' => 'andrew'
    )); ?>


   		</div>
   		<div class="white-half half">
        <header class="book-header">
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/06/logo.jpg" alt="Moydart Press Logo">
        </header>
        <?php wp_nav_menu( array(
    'container' => false,
        'theme_location' => 'moydart'
    )); ?>

    
   		</div>
   	</div>

    </div> <!-- /,content -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer('front'); ?>


