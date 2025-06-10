<!-- footer area start -->
<footer class="footer-area">
    <div class="container-three">
        <div class="footer-middle padding-top-30 padding-bottom-60">
            <div class="row justify-content-center">
                {!! render_frontend_sidebar('footer',['column' => true]) !!}
            </div>
            {!! render_frontend_sidebar('footer_bottom_left',['column' => true]) !!}
        </div>
        <div class="copyright-area">
            <div class="row justify-content-center">
                <div class="col-lg-auto col-md-6">
                    <div class="copyright-contents padding-bottom-90">
                        <div class="margin-bottom-20">
                            {!! render_frontend_sidebar('footer_bottom_right',['column' => true]) !!}
                        </div>
                        {!! get_footer_copyright_text() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

