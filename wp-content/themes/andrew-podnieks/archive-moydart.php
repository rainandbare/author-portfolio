

<?php get_header(); 


/*
  Template Name: Books - Moydart
*/

?>
<?php get_sidebar('moydart'); ?>
<div class="main">
  <div class="container">
    <div class="content">
 
    <section class="book-list">
    <header class="page clearfix">
        <div class="book-title">
          <h2><?php the_title(); ?></h2>
          <h3 class="book-subtitle">Moydart Press</h3>
        </div>
        <div class="book-menu-group-button clearfix">
          <a class='read' href=" <?php echo site_url(); ?>/books/">See All Books by Andrew Podnieks</a>
        </div>
    </header> 

          <!-- new book query -->
          <?php
            // $thePublisher = "Moydart Press";
            $bookQueryArray = array();
            $bookQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'book',
              'meta_key'    => 'year_published',
              'orderby'     => 'meta_value_num',
              )
            ); 
          ?>
          <!-- get books  -->
          <?php if ( $bookQuery->have_posts() ) : ?>
            <?php while ($bookQuery->have_posts()) : $bookQuery->the_post(); 
              $title = get_the_title();
              $publisher = get_field('publisher');
              $year = get_field('year_published');
              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              $content = get_the_content();
              $class = clean($publisher[0]);
              $iihfcat = clean(get_field('iihf_category')[0]);
              $bookEntry = array(
                            'title' => $title, 
                            'publisher' => $publisher, 
                            'year' => $year, 
                            'url' => $url, 
                            'content' => $content,
                            'class' =>  $class,
                            'iihfcat' => $iihfcat
                            );
              
              array_push($bookQueryArray, $bookEntry)

            ?>
        
            <?php endwhile; 
            
            // <!-- individual book -->
            foreach ($bookQueryArray as $bookEntry) { 
              if ($bookEntry['publisher'][0] == 'Moydart Press'){?>
                <section class = "bookEntry clearfix all display 
                <?php echo $bookEntry['class'];?> ">
                  <!-- picture -->
                  <img class="bookPic" src="<?php echo $bookEntry['url']; ?>" alt="">
                  <!-- info -->
                  <div class="bookInfo">
                    <h4><?php echo $bookEntry['title']; ?></h4>
                    <p class="published"><?php echo $bookEntry['publisher'][0]; ?>, <span><?php echo $bookEntry['year']; ?></span></p>
                    <p class="entry"><?php echo $bookEntry['content'];?></p>
                  </div>
                </section>   
                <?php  
               }
            }
             wp_reset_postdata();
             else:  ?>
            [ stuff that happens if there aren't any posts]
          <?php endif; ?>
    </section>



  </div> <!-- /.container -->
</div> <!-- /.main -->
<a href="#" class="back-to-top" style="display: inline;">
  <i class="fa fa-arrow-up"></i>
</a>
<?php get_footer(); ?>