<footer>
   <div class="wrapper pdg-tb-1r">
      <p class="text-center">WPMinit | <?php echo date(Y); ?></p>
   </div>
</footer>

<!-- <script>
   // Modify aspect ratio lazy load images 4:3
   var imagesProject = document.querySelectorAll('.image-project');
   imagesProject.forEach(function(element, index) {
      element.attributes.src.value = "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%204%203'%3E%3C/svg%3E";
   });
</script> -->
<!-- <script>
   // Modify aspect ratio lazy load images, based on data-width and data-height of images
   var screensProject = document.querySelectorAll('.screen-image');
   screensProject.forEach(function(element) {
      var screenWidth = element.dataset.width;
      var screenHeight = element.dataset.height;
      element.attributes.src.value ="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20" + screenWidth + "%20" + screenHeight + "'%3E%3C/svg%3E";
   });
</script> -->



<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'> -->
<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-plugins.css" media="all"> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/swup@2.0.9/dist/swup.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@swup/debug-plugin@1.0.3/dist/SwupDebugPlugin.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/swup-gtag-plugin@0.0.0/dist/SwupGtagPlugin.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/bowser@2.9.0/es5.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script> -->

<!-- <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script> -->

<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.min.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

<?php wp_footer(); ?>

<?php get_template_part('analytics'); ?>

</body>
</html>
