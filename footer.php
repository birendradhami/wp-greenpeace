 <!--footer start-->

 <?php
  $home_section_query = new WP_Query(array(
    'post_type' => 'site_information',
    'posts_per_page' => 1,
  ));

  if ($home_section_query->have_posts()) {
    while ($home_section_query->have_posts()) {
      $home_section_query->the_post();
      $site_logo = get_field('site_logo');
      $site_description = get_field('site_description');
      $youtube_link = get_field('youtube_link');
      $tiktok_link = get_field('tiktok_link');
      $map_link = get_field('map_link');
      $phone_number = get_field('phone_number');
      $whatsapp_link = get_field('whatsapp_link');
  ?>
     <footer class="footer" id="footer">
       <div class="footer__wrapper">
         <div class="container">
           <div class="row">
             <div class="col-lg-4">
               <div class="footer__info">
                 <div class="footer__info--logo">
                   <?php
                      echo '<img src="' . esc_url($site_logo['url']) . '" alt="image" height="120px">';
                    ?>
                 </div>
                 <div class="footer__info--content">
                   <p class="paragraph dark">
                     Green Peace offers top notch services: Tent & Catering, Sound System, Party Palace and more.
                   </p>
                   <div class="social">
                     <ul>
                       <li class="facebook">
                         <a href="<?php the_field('facebook_link'); ?>">
                           <i class="fab fa-facebook-f"></i>
                         </a>
                       </li>
                       <li class="youtube">
                         <a href="<?php echo $youtube_link ?>">
                           <i class="fab fa-youtube"></i>
                         </a>
                       </li>
                       <li class="twitter">
                         <a href="<?php echo $tiktok_link; ?>">
                           <i class="fab fa-tiktok"></i>
                         </a>
                       </li>
                     </ul>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-lg-8">
               <div class="footer__content-wrapper">
                 <div class="footer__list">
                   <ul>
                     <li>Our Location in Map</li>
                     <li>
                       <?php
                        echo $map_link; 
                        ?>
                     </li>
                   </ul>
                 </div>
                 <div class="download-buttons">
                   <h5>Download</h5>
                   <a href="tel:<?php the_field('phone_number'); ?>" class="google-play">
                     <i class="fa-solid fa-phone-volume"></i>
                     <div class="button-content">
                       <h6><span><?php the_field('phone_number'); ?></span></h6>
                     </div>
                   </a>
                   <a href="<?php the_field('whatsapp_link'); ?>" class="apple-store">
                     <i class="fab fa-whatsapp"></i>
                     <div class="button-content">
                       <h6><span>Chat with US</span></h6>
                     </div>
                   </a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </footer>
 <?php
    }
    wp_reset_postdata();
  }
  ?>


 <!--footer end-->

 <script>
   $(window).on('load', function() {
     $("body").addClass("loaded");
   });
 </script>


 <!-- for gallery fancybox -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
   $('[data-fancybox="gallery"]').fancybox({
     buttons: [
       "share",
       "download",
       //   "zoom",
       "slideShow",
       "fullscreen",
       "thumbs",
       "close"
     ],
   });
 </script>

 <script>
   $(document).ready(function() {
     $('.header__nav li').on('click', function() {
       $('.header__nav').css('right', '100%');
       return 0;
     });
   });
   $(document).ready(function() {
     $('.header__bars').on('click', function() {
       $('.header__nav').css('right', '0%');
       return 0;
     });
   });
 </script>

 <?php wp_footer(); ?>

 </body>

 </html>