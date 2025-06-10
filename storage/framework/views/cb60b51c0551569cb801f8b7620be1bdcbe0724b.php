 <footer class="footer-area theme-three-footer-border <?php echo e('footer-'.getSelectedThemeSlug()); ?>">
     <div class="footer-top padding-top-35 padding-bottom-90">
         <div class="container container-one">
             <div class="row justify-content-between">
                 <?php echo render_frontend_sidebar('footer',['column' => true]); ?>

             </div>
         </div>
     </div>

     <div class="copyright-area copyright-bg">
         <div class="container container-one">
             <div class="row gy-4 justify-content-center">
                 <?php echo render_frontend_sidebar('footer_bottom_left',['column' => true]); ?>


                 <div class="col-lg-4">
                     <div class="copyright-contents center-text">
                         <?php echo get_footer_copyright_text(); ?>

                     </div>
                 </div>

                 <?php echo render_frontend_sidebar('footer_bottom_right',['column' => true]); ?>

             </div>
         </div>
     </div>
 </footer>

<?php /**PATH /home/crux/public_html/core/resources/views/themes/medicom/footerWidgetArea/footer-medicom.blade.php ENDPATH**/ ?>