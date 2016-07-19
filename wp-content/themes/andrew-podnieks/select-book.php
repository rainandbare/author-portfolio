
          
            <ul id="book-menu-sort" class="book-menu">
              <li>
                <input class="all" type="radio" name="book-sort" value="all" id="all">
                <label class="radio-button" for="all">
                  <p>ALL</p>
                </label>
              </li>
              <li>
                <p>BY PUBLISHER</p>
                <ul class="book-submenu">
                   <?php 
                   //get list of publishers
                   $publisherList = array();
                   $IIHFCategoryList = array();
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
                        $theNewPublisher = get_field('publisher')[0];
                        array_push($publisherList, $theNewPublisher);
                        endwhile; 
                        $uniquePublishers = array_keys(array_flip($publisherList)); 
                        foreach ($uniquePublishers as $publisher) {
                          $publisherClass = clean($publisher);
                          if ($publisher != 'IIHF'){?>
                            <li>
                              <input class="<?php echo $publisherClass; ?>" type="radio" name="book-sort" value="<?php echo $publisherClass; ?>" id="<?php echo $publisherClass; ?>">
                              <label class="radio-button" for="<?php echo $publisherClass; ?>">
                                <p><?php echo $publisher; ?></p>
                              </label>
                            </li>
                          <?php } //end of if?>
                        <?php } //end of foreach?>
                </ul> 
              </li> <!-- end of publisher menu li -->
              <li>
                <p>IIHF</p>
                  <ul class="book-submenu">
                        <?php rewind_posts();
                        while ($publisherQuery->have_posts()) : $publisherQuery->the_post(); 
                        $isIIHF = get_field('publisher');
                        //if any of the values in each array in $isIIHf is == to "IIHF"
                        foreach ($isIIHF as $key => $value) {
                          if ($value == 'IIHF'){
                            $IIHFCategory = get_field('iihf_category')[0];
                            array_push($IIHFCategoryList, $IIHFCategory);
                          }
                      }
                        endwhile;
                        $uniqueIIHFCategories = array_keys(array_flip($IIHFCategoryList)); 
                        foreach ($uniqueIIHFCategories as $category) {
                          $categoryClass = clean($category);?>
                            <li>
                              <input class="<?php echo $categoryClass; ?>" type="radio" name="book-sort" value="<?php echo $categoryClass; ?>" id="<?php echo $categoryClass; ?>">
                              <label class="radio-button" for="<?php echo $categoryClass; ?>">
                                <p><?php echo $category; ?></p>
                              </label>
                            </li>
                        <?php } //end of foreach?>
                   <?php
                      else: 
                      endif;?>
                  </ul> 
              </li><!-- end of IIHF li -->
            </ul>

