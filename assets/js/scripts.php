<?php /* Scripts in footer. */ ?>

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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script> -->

<!-- <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script> -->

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/build/main.js"></script>