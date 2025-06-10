<footer class="footer-area theme-three-footer-border {{'footer-'.getSelectedThemeSlug()}}">
    <div class="footer-top py-5">
        <div class="container container-one footer-module-inside-area justify-content-center">
            <div class="row justify-content-center">
                {!! render_frontend_sidebar('footer',['column' => true]) !!}
            </div>
            {!! render_frontend_sidebar('footer_bottom_left',['column' => true]) !!}

        </div>

    </div>

    <div class="copyright-area copyright-bg">
        <div class="container container-one">
            <div class="row gy-4 justify-content-center my-4">

                {!! render_frontend_sidebar('footer_bottom_right',['column' => true]) !!}

                <div class="col-lg-12 mb-5" style="justify-content: center;">
                    <div class="copyright-contents center-text">
                        {{--                         {!! get_footer_copyright_text() !!}--}}
                        <p>

                            <a href="https://www.falconx.az/"><img src="https://cruxsoft.az/falconx-logo.png"
                                                                   alt="falcon x" style="width: 72px;"></a> | <a
                                href="https://www.cruxsoft.az/"><img src="https://cruxsoft.az/cruxsoft-logo.png"
                                                                     alt="cruxsoft" style="width: 72px;"></a> Yeni Nəsil
                            E-ticarət Proqramı</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</footer>


