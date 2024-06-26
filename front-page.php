<?php get_header(); ?>

<!--hero section start-->
<section class="hero" id="hero">
  <div class="hero__wrapper">
    <div class="container">
      <div class="row align-items-center">
        <?php
        $home_section_query = new WP_Query(array(
          'post_type' => 'home_section',
          'posts_per_page' => 1,
        ));

        if ($home_section_query->have_posts()) {
          while ($home_section_query->have_posts()) {
            $home_section_query->the_post();
            $main_heading = get_field('main_heading');
            $paragraph = get_field('paragraph');
            $phone_number = get_field('phone_number');
            $whatsapp_link = get_field('whatsapp_link');
            $background_image = get_field('home_image');
        ?>
            <div class="col-xl-6 col-lg-12 order-2 order-lg-1">
              <h1 class="main-heading color-black"><?php echo esc_html($main_heading); ?></h1>
              <p class="paragraph"><?php echo esc_html($paragraph); ?></p>
              <div class="download-buttons">
                <a href="tel:<?php echo esc_attr($phone_number); ?>" class="google-play">
                  <i class="fa-solid fa-phone-volume"></i>
                  <div class="button-content">
                    <h6><span><?php echo esc_html($phone_number); ?></span></h6>
                  </div>
                </a>
                <a href="<?php echo esc_url($whatsapp_link); ?>" class="apple-store">
                  <i class="fab fa-whatsapp"></i>
                  <div class="button-content">
                    <h6><span>Chat with US</span></h6>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-xl-6 col-lg-12 order-1 order-lg-2 center_itm">
              <div class="questions-img hero-img">
                <img src="<?php echo esc_url($background_image['url']); ?>" alt="<?php echo esc_attr($background_image); ?>">
              </div>
            </div>
        <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>
  </div>
</section>

<!--hero section end-->

<!--message section start-->
<section class="clients-sec custom_padding_t" id="feedback">
  <?php
  $home_posts = new WP_Query(array('post_type' => 'statement', 'posts_per_page' => 1));
  if ($home_posts->have_posts()) :
    while ($home_posts->have_posts()) :
      $home_posts->the_post();
  ?>
      <div class="container">
        <h2 class="section-heading color-black">Hear from <?php the_field('position') ?>.</h2>
        <div class="testimonial__wrapper">

          <div class="mesasge_wrapper">
            <div class="image message_image">
              <?php
              $image = get_field('image'); // Replace 'director_image' with the actual field name.
              if ($image) {
                echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" height="180px">';
              }
              ?>
            </div>
            <div class="mesasge">
              <div class="testimonial__wrapper">
                <p><?php the_field('message'); // Replace with your field name for the message 
                    ?></p>
                <h4>-<?php the_field('respective_name'); ?><br>&ensp;(<?php the_field('position') ?>)</h4>
              </div>
            </div>
          </div>
      <?php
    endwhile;
    wp_reset_postdata();
  endif;
      ?>
        </div>
      </div>
</section>

<!--message section end-->


<!--feature section start-->

<section class="feature" id="services">
  <div class="container">
    <h2 class="section-heading color-black">Get surprised by amazing services.</h2>
    <div class="row">

      <?php

      $counter = 1;

      $services_query = new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => 4,
      ));

      while ($services_query->have_posts()) : $services_query->the_post();
      ?>

        <div class="col-lg-3 col-md-6">
          <div class="feature__box feature__box--<?php echo $counter; ?>">
            <div class="icon icon-<?php echo $counter; ?>">
              <?php
              $service_image = get_field('service_image');
              if ($service_image) {
                echo '<img src="' . esc_url($service_image['url']) . '" alt="' . esc_attr($service_image['alt']) . '" height="120px">';
              }
              ?>
            </div>
            <div class="feature__box__wrapper">
              <div class="feature__box--content feature__box--content-<?php echo $counter; ?>">
                <h3><?php the_title(); ?></h3>
                <p class="paragraph dark"><?php the_field('service_description'); ?></p>
              </div>
            </div>
          </div>
        </div>

      <?php

        $counter++;

      endwhile;

      wp_reset_postdata();
      ?>

    </div>
  </div>
</section>

<!--feature section end-->

<!--gallery section start-->

<section class="gallery_section custom_padding_t" id="fancy_gallery">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Capturing Joy: <br> Our Event Showcase.</h2>
    <div class="container">
      <div class="row myFancyGallery justify-content-center">

        <?php
        $custom_images_query = new WP_Query(array(
          'post_type' => 'custom_images',
          'posts_per_page' => -1,
        ));

        if ($custom_images_query->have_posts()) {
          while ($custom_images_query->have_posts()) {
            $custom_images_query->the_post();

            $gallery_images = get_post_meta(get_the_ID(), 'custom_images_gallery_images', true);

            if (!empty($gallery_images)) {
              foreach ($gallery_images as $image_url) {
        ?>

                <div class="col-lg-2 col-md-3 col-4 gallery_item fancy_item">
                  <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery">
                    <div class="blog__single-image gallery_item_image">
                      <img src="<?php echo esc_url($image_url); ?>" alt="">
                    </div>
                  </a>
                </div>

        <?php
              }
            }
          }
        }
        wp_reset_postdata();

        ?>

      </div>
    </div>
  </div>
</section>


<!--gallery section end-->

<!--pricing section start-->
<section class="pricing" id="pricing">
  <div class="pricing__wrapper">
    <h2 class="section-heading color-black">Easy pricing plans for your needs.</h2>
    <div class="container">
      <div class="row">

        <?php

        $pricing_query = new WP_Query(array(
          'post_type' => 'pricing_plans',
          'posts_per_page' => 3,
        ));

        while ($pricing_query->have_posts()) : $pricing_query->the_post();
        ?>

          <div class="col-lg-4">
            <div class="pricing__single pricing__single-2">
              <div class="icon">
                <?php
                $pricing_icon = get_field('pricing_icon');
                if ($pricing_icon) {
                  echo '<i><img src="' . esc_url($pricing_icon['url']) . '" alt="' . esc_attr($pricing_icon['alt']) . '" height="80px"></i>';
                }
                ?>
              </div>
              <h4><?php the_title(); ?></h4>
              <h3><?php the_field('pricing_starting_price'); ?></h3>
              <div class="list">
                <ul>
                  <?php
                  $pricing_features = get_field('pricing_features');

                  if ($pricing_features) {
                    $feature_lines = explode("\n", $pricing_features);

                    if (!empty($feature_lines)) {
                      //  echo '<ul>'; 
                      foreach ($feature_lines as $feature) {
                        $feature = trim($feature);
                        if (!empty($feature)) {
                          echo '<li>' . esc_html($feature) . '</li>';
                        }
                      }
                      //  echo '</ul>';
                    }
                  }

                  ?>
                </ul>
              </div>
              <a href="<?php the_field('pricing_link'); ?>" class="button">
                <span>GET PACKAGE <i class="fad fa-long-arrow-right"></i></span>
              </a>
            </div>
          </div>

        <?php endwhile;
        wp_reset_postdata();
        ?>

      </div>
    </div>
  </div>
</section>

<!--pricing section end-->

<!--video gallery section start-->

<section class="gallery_section custom_padding_tb feature" id="video">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Capturing the moments <br>mesmerizing gallery.</h2>
    <div class="container">
      <div class="row">

        <?php
        $video_gallery_query = new WP_Query(array(
          'post_type' => 'video_gallery',
          'posts_per_page' => -1,
        ));

        while ($video_gallery_query->have_posts()) : $video_gallery_query->the_post();

          $post_content = get_the_content();
          $pattern = '/src=["\']([^"\']+)["\']/';
          preg_match_all($pattern, $post_content, $matches);

          if (!empty($matches[1])) {
            foreach ($matches[1] as $video_src) {
        ?>

              <div class="col-lg-4 col-md-6 col-12 gallery_item">
                <iframe src="<?php echo esc_url($video_src); ?>" loading="lazy"></iframe>
              </div>

        <?php
            }
          }
        endwhile;

        wp_reset_postdata();
        ?>

      </div>
    </div>
  </div>
</section>

<!--video gallery section end-->

<!--team section start-->

<section class="gallery_section custom_padding_tb" id="team">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Meet Our Expert <br> Event Team.</h2>
    <div class="container">
      <div class="row justify-content-center">

        <?php
        $team_query = new WP_Query(array(
          'post_type' => 'team_member',
          'posts_per_page' => -1,
        ));

        while ($team_query->have_posts()) : $team_query->the_post();
          $member_name = get_field('member_name');
          $job_title = get_field('job_title');
          $member_image = get_field('member_image');

          // var_dump($member_name);
          // var_dump($job_title);
          // var_dump($member_image);

          if ($member_name && $job_title && $member_image) {
        ?>

            <div class="col-lg-4 col-md-6 gallery_item">
              <a>
                <div class="blog__single blog__single--1">
                  <div class="blog__single-image">
                    <img src="<?php echo esc_url($member_image['url']); ?>" alt="<?php echo esc_attr($member_name); ?>">
                  </div>

                  <div class="blog__single-info team_item_info">
                    <h3><?php echo esc_html($member_name); ?></h3>
                    <span><?php echo esc_html($job_title); ?></span>
                  </div>
                </div>
              </a>
            </div>

        <?php
          }
        endwhile;

        wp_reset_postdata();
        ?>

      </div>
    </div>
  </div>
</section>

<!--team section end-->

<!--newsletter section start-->
<section class="newsletter newsletter-2" id="contact">
  <div class="newsletter__wrapper">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-lg-8">
          <div class="newsletter__info pb-5 mb-5">
            <h2 class="section-heading color-black">Get in touch with us today.</h2>
              <?php echo do_shortcode('[contact-form-7 id="62f42e3" title="Contact Form"]'); ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="newsletter__img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img/contactus.png" alt="image">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--newsletter section end-->

<?php get_footer(); ?>