<!-- footer area start -->
<footer class="footer-area">
    <div class="container-three">
        <div class="footer-middle padding-top-30 padding-bottom-60">
            <div class="row justify-content-center">
                <?php echo render_frontend_sidebar('footer',['column' => true]); ?>

            </div>
            <?php echo render_frontend_sidebar('footer_bottom_left',['column' => true]); ?>

        </div>
        <div class="copyright-area">
            <div class="row justify-content-center">
                <div class="col-lg-auto col-md-6">
                    <div class="copyright-contents padding-bottom-90">
                        <div class="margin-bottom-20">
                            <?php echo render_frontend_sidebar('footer_bottom_right',['column' => true]); ?>

                        </div>
                        <?php echo get_footer_copyright_text(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<?php /**PATH /home/crux/public_html/core/resources/views/themes/fruit/footerWidgetArea/footer-fruit.blade.php ENDPATH**/ ?>