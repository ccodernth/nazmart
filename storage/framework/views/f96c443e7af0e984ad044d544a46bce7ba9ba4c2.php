<!-- footer area start -->
<footer class="footer-area footer-container-style">
    <div class="container-two">
        <div class="footer-inner-all footer-bg radius-50">
            <div class="footer-middle footer-list-bars padding-top-30 padding-bottom-60">
                <div class="row">
                    <?php echo render_frontend_sidebar('footer',['column' => true]); ?>

                </div>
            </div>
            <div class="copyright-area copyright-border">
                <div class="row align-items-center justify-content-center">
                    <?php echo render_frontend_sidebar('footer_bottom_left',['column' => true]); ?>


                    <div class="col-lg-4 col-md-6">
                        <div class="copyright-contents">
                            <?php echo get_footer_copyright_text(); ?>

                        </div>
                    </div>

                    <?php echo render_frontend_sidebar('footer_bottom_right',['column' => true]); ?>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
<?php /**PATH /home/crux/public_html/core/resources/views/themes/casual/footerWidgetArea/footer.blade.php ENDPATH**/ ?>