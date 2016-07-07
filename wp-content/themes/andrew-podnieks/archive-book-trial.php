

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
    <header class="page clearfix">
        <h2><?php the_title(); ?></h2>
        <div class="book-menu-group clearfix">
          <form action="">
          <label class="book-menu-label" for="book-menu-sort">Sort:</label>
            <ul id="book-menu-sort" class="book-menu">
              <li><input type="radio" name="book-sort" value="all"><p>ALL</p></li>
              <li><p>BY PUBLISHER</p>
                <ul class="book-submenu">
                   <?php 
                   //get list of publishers
                    $publisherQuery = new WP_Query(
                      array(
                        'posts_per_page' => -1,
                        'post_type' => 'book', 
                        'meta_key'  => 'year_published',
                        'orderby'   => 'meta_value_num'
                        )
                    ); 
                     if ( $publisherQuery->have_posts() ) :
                      while ($publisherQuery->have_posts()) : $publisherQuery->the_post(); 
                        static $theCurrentPublisher = '';
                        $theNewPublisher = get_field('publisher');
                        if ($theCurrentPublisher !== $theNewPublisher) {
                          $theCurrentPublisher = $theNewPublisher;
                          echo '<li><input type="radio" name="book-sort" value="';
                          echo $theCurrentPublisher . '"><p>';
                          echo $theCurrentPublisher;
                          echo '</p></li>';
                        }
                    ?>
                    <?php endwhile; 
                     wp_reset_postdata();

                    else: 
                    endif; ?>
                </ul>
              </li>
              <li><p>IIHF</p>
                <ul class="book-submenu">
                  <li><p>IIHF Guide & Record Book</p></li>
                  <li><p>IIHF Rule Book</p></li>
                  <li><p>IIHF Hall of Fame</p></li>
                  <li><p>Triple Gold Club</p></li>
                  <li><p>IIHF Centennial</p></li>
                </ul>
              </li>
            </ul>
          </form>
        </div>
    </header> 

          <!-- new book query -->
          <?php
            $thePublisher = "Moydart Press";
            $bookQueryArray = array();
            $bookQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'book',
              'meta_key'    => 'year_published',
              'orderby'     => 'meta_value_num'
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
              $bookEntry = array(
                            'title' => $title, 
                            'publisher' => $publisher, 
                            'year' => $year, 
                            'url' => $url, 
                            'content' => $content);
              
              array_push($bookQueryArray, $bookEntry)

            ?>
        
            <?php endwhile; 
            
            // <!-- individual book -->
            foreach ($bookQueryArray as $bookEntry) {
              if ($bookEntry['publisher'] == $thePublisher) { ?>

                <section class = "bookEntry clearfix">
                  <!-- picture -->
                  <img class="bookPic" src="<?php echo $bookEntry['url']; ?>" alt="">
                  <!-- info -->
                  <div class="bookInfo">
                    <h4><?php echo $bookEntry['title']; ?></h4>
                    <p class="published"><?php echo $bookEntry['publisher']; ?>, <span><?php echo $bookEntry['year']; ?></span></p>
                    <p><?php echo $bookEntry['content'];?></p>
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

<?php get_footer(); ?>