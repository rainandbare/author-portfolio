

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
        <div class="book-title">
          <h2><?php the_title(); ?></h2>
          <h3 id="book-subtitle" class="book-subtitle">All</h3>
        </div>
        <div class="book-menu-group clearfix">
          <?php get_template_part( 'select', 'book' );  ?>
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
        'orderby'     => 'meta_value_num'
        )
      ); 
    ?>
    <!-- get books  -->
    <?php if ( $bookQuery->have_posts() ) : ?>
      <?php while ($bookQuery->have_posts()) : $bookQuery->the_post(); 
        $title = get_the_title();
        $other = get_field('other');
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
                      'iihfcat' => $iihfcat,
                      'other' => $other
                      );
        
        array_push($bookQueryArray, $bookEntry)

      ?>
  
      <?php endwhile; 
      
      // <!-- individual book -->
      foreach ($bookQueryArray as $bookEntry) { ?>

          <section class = "bookEntry clearfix all display 
          <?php 
            echo $bookEntry['class'];
            foreach ($bookEntry['publisher'] as $value) {
              if ($value == 'IIHF') {
                echo " " . $bookEntry['iihfcat'];
              }
            }
          ?> ">
            <!-- picture -->
            <img class="bookPic" src="<?php echo $bookEntry['url']; ?>" alt="">
            <!-- info -->
            <div class="bookInfo">
              <h4><?php echo $bookEntry['title']; ?></h4>

              <p class="published"><?php echo $bookEntry['publisher'][0]; ?>, <span><?php echo $bookEntry['year']; ?></span></p>
              <p class="other"><?php echo $bookEntry['other']; ?></p>
              <p class="entry"><?php echo $bookEntry['content'];?></p>
            </div>
          </section>   
          <?php  
        // }
      }
       wp_reset_postdata();
       else:  ?>
    <?php endif; ?>
    <?php  
    $rulebookQuery = new WP_Query(
      array(
        'posts_per_page' => -1,
        'post_type' => 'rule-book-trans',
        'orderby' => 'title',
        'order' => 'ASC'
        )
      ); ?>
          <?php if ( $rulebookQuery->have_posts() ) : ?>
      <?php while ($rulebookQuery->have_posts()) : $rulebookQuery->the_post(); ?>
        <section class = "bookEntry clearfix rule-book translation">
            <div class="bookInfo">
              <h4 class="language"><?php the_title(); ?></h4>
              <p><?php echo get_field('other_info');?></p>
            </div>
            <!-- picture -->
            <img class="bookPic langCover" src="<?php echo get_field('cover') ?>" alt="">
            <img class="bookPic langInt" src="<?php echo get_field('interior') ?>" alt="">
            <!-- info -->
          </section>   
      <?php endwhile;
       wp_reset_postdata();
       else:  ?>
    <?php endif; ?>
    </section>

    


  </div> <!-- /.container -->
</div> <!-- /.main -->
<a href="#" class="back-to-top" style="display: inline;">
  <i class="fa fa-arrow-up"></i>
</a>

<?php get_footer(); ?>