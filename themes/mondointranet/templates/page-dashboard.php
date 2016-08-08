<?php
/*
Template Name: Dashboard
*/
get_header(); ?>

<?php
    $current_user = wp_get_current_user();
    $current_department = strtolower($current_user->department);
    if ( empty( $current_department ) ) {
      $current_department = "recruiting";
    }  
?>
<div id="dash" role="main">

  <div class="columns small-12 medium-7 large-8">
    <div class="dash-module documents">
      <a href="/documents">
        <div class="module-header">
          <h3>Documents <span class="round-btn">See all</span></h3>
        </div>
      </a>
      <div class="document-list">
        <ul>
          <?php $documents = new WP_QUERY(array(
            'post_type' => 'document',
            'meta_query' => array(
              array(
                'key'     => 'department-selector',
                'value'   => $current_department,
                'compare' => 'LIKE' // Make sure the field has a value (i.e. 'city' != null)
              )
             ), // End of meta_query
            'posts_per_page' => 10
          )); ?>
          <?php if ($documents->have_posts()) { ?>
          <?php while ($documents->have_posts()) : $documents->the_post(); ?>
          <?php $file = get_field('upload_document');
          if( $file ): ?>
            <a href="<?php echo $file['url']; ?>" download>
              <li>
                <?php 
                  $doc_title = get_the_title();
                  if ( empty($doc_title) ) {
                    $doc_title = "(no title)";
                  }
                ?>
                <span class="document-title"><?php echo $doc_title; ?></span>
                <span class="view-doc fa fa-download"></span>
              </li>
            </a>
          <?php endif; ?>
          <?php endwhile; ?>
          <?php } else { ?>
            <div class="sorry">Sorry, but there are no documents labeled for your department (<?php echo $current_department; ?>) at this time. If you believe you're seeing this message in error, please contact your system administrator.</div>
          <?php } ?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="columns small-12 medium-5 large-4">
    
    <div class="dash-module weather">
      <div id="weather">
        <div class="weather-wait" id="weatherWait">
          <p><span class="fa fa-spinner fa-pulse"></span></p>
          <p>Retrieving your weather information...</p>
        </div>
      </div>
      <div id="time" class="weather-time"></div>
      <!-- <button class="js-geolocation" style="display: none;">Use Your Location</button> -->
    </div>

    <a href="/employee-directory">
      <div class="dash-module new-hires">
        <?php $directory = new WP_QUERY(array(
          'post_type' => 'employee',
          'posts_per_page' => -1
        )); ?>
        <?php $new_employees = 0; ?>
        <?php while ($directory->have_posts()) : $directory->the_post(); ?>
          <?php if (strtotime( get_field("start_date") ) > strtotime("-30 days")) {
            $new_employees++;
          } ?>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
        <p class="new-hire-number"><?php echo $new_employees; ?></p>
        <p class="new-label">New Mondo agents</p>
        <span class="round-btn">See directory</span>
      </div>
    </a>

  </div>

  <div class="columns small-12 medium-6">

    <div class="dash-module press">
      <a href="/press">
        <div class="module-header">
          <h3>Press <span class="round-btn">See all</span></h3>
        </div>
      </a>
      <div class="press-list">

        <?php $press_posts = new WP_QUERY(array(
          'post_type' => 'press',
          'posts_per_page' => 3
        )); ?>
        <?php while ($press_posts->have_posts()) : $press_posts->the_post(); ?>
        <?php 
          $press_link = get_field('press_link');
          $press_date = get_the_date('F j');
        ?>
          <div class="press-item">
            <a href="<?php echo $press_link; ?>" class="press-link" target="_blank">
            
              <p class="press-item-date"><?php echo $press_date; ?></p>
              <h4><?php the_title(); ?> <span class="fa fa-external-link"></span></h4>
              <p class="press-item-source"><?php the_field('press_source'); ?></p>
            </a>
            <div class="press-share">
              <span class="share-text">Share:</span> <a href="https://twitter.com/home?status=Check%20out%20Mondo%20in%20the%20Press!%20<?php echo $press_link; ?>" target="_blank" class="fa fa-twitter"></a> <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $press_link; ?>" target="_blank" class="fa fa-facebook"></a> <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $press_link; ?>&title=Check%20out%20Mondo%20in%20the%20Press!" target="_blank" class="fa fa-linkedin"></a> <a href="mailto:?&subject=Check out Mondo in the Press!&body=Check%20out%20Mondo%20in%20the%20Press!%0A%0A<?php echo $press_link; ?>" target="_blank" class="fa fa-envelope"></a>
            </div>
          </div>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

      </div>
    </div>

    <div class="dash-module intragram">
      <a href="/intragram">
        <div class="module-header">
          <h3>Intra-gram <span class="round-btn">See all</span></h3>
        </div>
      </a>
      <div id="intragramDash" class="instagram-dash"></div>
    </div>

    <div class="dash-module twitter">
      <a href="https://twitter.com/mondo_agents">
        <div class="module-header">
          <h3>Tweets</h3>
        </div>
      </a>
      <div class="twitter-widget">
        <a class="twitter-timeline" href="https://twitter.com/Mondo_agents" data-widget-id="677590843046371328" data-tweet-limit="3" data-chrome="nofooter noheader noborders transparent">Tweets by @Mondo_agents</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
    </div>

  </div>

  <div class="columns small-12 medium-6">

    <div class="dash-module news">
      <a href="/news">
        <div class="module-header">
          <h3>Mondo News <span class="round-btn">See all</span></h3>
        </div>
      </a>
      <div class="news-list">

        <?php $news_posts = new WP_QUERY(array(
          'post_type' => 'post',
          'posts_per_page' => 10
        )); ?>
        <?php while ($news_posts->have_posts()) : $news_posts->the_post(); ?>
        <?php 
          $news_date = get_the_date('F j');
        ?>
          <a href="<?php the_permalink(); ?>">
            <div class="news-item">
              <?php if ( has_post_thumbnail() ) { ?>
              <?php 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                $image = $image[0];
              ?>
              <div class="news-item-img" style="background-image: url('<?php echo $image ?>')"></div>
              <?php } else { ?>
              <div class="news-item-img"> 
                <span class="fa fa-newspaper-o"></span>
              </div>
              <?php } ?>
              <div class="news-item-content">
                <p class="news-item-date"><?php echo $news_date; ?></p>
                <h4><?php the_title(); ?></h4>
                <div class="news-item-excerpt">
                  <?php the_excerpt(); ?>
                </div>
              </div>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

      </div>
    </div>

    <div class="dash-module calendar">
      <a href="/events">
        <div class="module-header">
          <h3>Upcoming Events <span class="round-btn">See all</span></h3>
        </div>
      </a>
      <?php echo do_shortcode( '[ecs-list-events]' ); ?>
    </div>

    <div class="dash-module idea-corner">
      <a href="/idea-corner">
        <div class="module-header">
          <h3>Idea Corner</h3>
        </div>
      </a>
      <?php get_template_part( 'parts/idea-corner' ); ?>
    </div>

    <a href="/interest-groups">
    <div class="dash-module interest-groups">
          <h3>Interested in</h3>
          <h1>Getting Involved?</h1>
          <span class="round-btn"> See Interest Groups</span>      
    </div>
    </a>

  </div>







</div>

<?php get_footer(); ?>
