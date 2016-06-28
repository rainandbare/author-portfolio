

<?php get_header(); 


/*
  Template Name: Books - Author
*/

?>
<?php get_sidebar('andrew'); ?>
<div class="main">
  <div class="container">
    <div class="content">
 
    <section class="book-list">
    <header class="page">
        <h2><?php the_title(); ?></h2>
    </header> 

          <!-- new book query -->
          <?php
            $bookQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'book',
              'orderby' => 'menu-order'
              )
          ); ?>
          <!-- get portfolio pieces -->
          <?php if ( $bookQuery->have_posts() ) : ?>
            <?php while ($bookQuery->have_posts()) : $bookQuery->the_post(); ?>
              <!-- individual book -->
            <section class = "bookEntry clearfix" id="<?php echo $post->post_name; ?>">
              <!-- picture -->
              <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
              <img class="bookPic" src="<?php echo $url; ?>" alt="">
              <!-- info -->
              <div class="bookInfo">
                <h4><?php the_title(); ?></h4>
                <p><?php the_content(); ?></p>
              </div>
            </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else:  ?>
            [ stuff that happens if there aren't any posts]
          <?php endif; ?>
    </section>



  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>