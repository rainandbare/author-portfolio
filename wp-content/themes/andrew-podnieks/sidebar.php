<div class="sidebar moydart">

		<header class="book-header">
          <a href="<?php echo site_url(); ?>">
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/06/logo.jpg" alt="Moydart Press Logo"></a>
        </header>

		<?php wp_nav_menu( array(
		'container' => false,
      	'theme_location' => 'moydart'
    )); ?>
    <div class="sidebar-social"><?php get_template_part( 'social', 'menu' );  ?></div>
    <header class="book-header goToOtherSide">
          <a href="<?php echo site_url(); ?>/about">
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2016/06/books.jpg" alt="Andrew Podneiks Logo">
        <h2>Andrew Podnieks</h2></a>
    </header>
</div>
	
