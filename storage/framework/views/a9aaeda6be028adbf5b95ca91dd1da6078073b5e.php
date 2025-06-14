<footer class="footer-area footer-bg">
    <div class="footer-top-area footer-top-border padding-top-45 padding-bottom-70">
        <div class="container custom-container-one">
            <div class="row align-items-center">
                <?php echo render_frontend_sidebar('footer_top',['column' => true]); ?>

            </div>
        </div>
    </div>
    <div class="footer-middler padding-top-45 padding-bottom-70">
        <div class="container custom-container-one">
            <div class="row justify-content-between">
                <?php echo render_frontend_sidebar('footer',['column' => true]); ?>

            </div>
        </div>
    </div>
    <div class="copyright-area copyright-border">
        <div class="container container-three">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="copyright-contents center-text">
                            <?php echo get_footer_copyright_text(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/bookpoint/footerWidgetArea/widget-area.blade.php ENDPATH**/ ?>