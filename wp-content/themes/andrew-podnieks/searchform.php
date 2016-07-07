<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
		  <input type="search" name="s" id="s" >
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
            <input type="submit" class="searchsubmit" value="Search">
          </form>