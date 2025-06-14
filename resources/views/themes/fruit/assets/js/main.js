(function($) {
    "use strict";

    $(document).ready(function() {

        $(function () {
            $('.dropdown-sub-have').hover(function () {
                $('.dropdown-overlay-show').show();
            }, function () {
                $('.dropdown-overlay-show').hide();
            });
        });

        if ($(window).width() <= 768) {

            $('#categories-parent-main .dropdown-sub-have').each(function() {
                $(this).removeClass('dropdown-sub-have').addClass('parent');
                $(this).find('ul').css('display', 'none').removeClass('sablon2-level-menu').removeClass('second-level-menu');
                $(this).find('ul a').removeClass('sablon2-level-menu-left-item-h')


                $('.parent').each(function() {
                    // İlk olarak span içindeki içeriği taşı
                    $(this).find('a span').each(function() {
                        var spanContent = $(this).html(); // span içeriğini al
                        $(this).parent('a').append(spanContent); // içeriği a'ya taşı
                        $(this).remove(); // span etiketini kaldır
                    });
                });

                // İlk div içindeki öğeleri li'ye çevir
                $("#categories-parent-main .parent ul .sablon2-level-menu-left").find('.sablon2-level-menu-left-item').each(function() {
                    var link = $(this).find('a').clone(); // 'a' öğesinin bir kopyasını al
                    var newLi = $('<li></li>'); // Yeni li elementi oluştur
                    newLi.append(link); // a öğesini yeni li'nin içine taşı

                    // Kendi bulunduğu div'i newLi ile değiştirme işlemini doğru yapmak için, $(this) kullan

                    $(this).replaceWith(newLi); // Eski div yerine yeni li'yi ekle
                });

                $("#categories-parent-main .parent ul").find('.sablon2-level-menu-right').each(function() {
                    $(this).remove();

                });

                $("#categories-parent-main .parent ul").find('.sablon2-level-menu-left').each(function() {
                    // Div içindeki tüm içeriği al
                    var divContent = $(this).contents(); // Div içindeki tüm içerikleri al
                    // Parent öğesine ekle
                    $(this).parent().append(divContent); // İçeriği div'in parent'ına ekle
                    // Div'i kaldır
                    $(this).remove();
                });

                $("#categories-parent-main .parent ul").find('p').each(function() {
                    // Div içindeki tüm içeriği al
                    var divContent = $(this).contents(); // Div içindeki tüm içerikleri al
                    // Parent öğesine ekle
                    $(this).parent().append(divContent); // İçeriği div'in parent'ına ekle
                    // Div'i kaldır
                    $(this).remove();
                });

            });

        } else {
            $('#categories-parent-main .parent').each(function() {
                $(this).removeClass('parent').addClass('dropdown-sub-have');
            });
            $(' .dropdown-sub-have i').each(function() {
                $(this).removeClass('arrow la la-chevron-right').addClass('la la-angle-down');
            });


        }

        $("#categories-parent-main").on('click', '.parent > a > i', function(e) {

            e.preventDefault();
            var toClose = $("#categories-parent-main ul").not($(this).parents("ul"));
            console.log(toClose)
            toClose.slideUp();
            toClose.parent().removeClass("open");

            if (!$(this).parent().next().is(":visible")) {
                var toOpen = $(this).parent().next();
                console.log('geldi', toOpen)
                toOpen.slideDown();
                toOpen.parent().not(".open").addClass("open");
            }
            e.stopPropagation();
        });


        /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();

        /*-----------------------------------------
            Global slick slicer control
        ------------------------------------------*/
        var globalSlickInit = $('.global-slick-init');
        if (globalSlickInit.length > 0) {
            //todo have to check slider item
            $.each(globalSlickInit, function (index, value) {
                if ($(this).children('div').length > 1) {
                    //todo configure slider settings object
                    var sliderSettings = {};
                    var allData = $(this).data();
                    var infinite = typeof allData.infinite == 'undefined' ? false : allData.infinite;
                    var arrows = typeof allData.arrows == 'undefined' ? false : allData.arrows;
                    var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                    var focusOnSelect = typeof allData.focusonselect == 'undefined' ? false : allData.focusonselect;
                    var swipeToSlide = typeof allData.swipetoslide == 'undefined' ? false : allData.swipetoslide;
                    var slidesToShow = typeof allData.slidestoshow == 'undefined' ? 1 : allData.slidestoshow;
                    var slidesToScroll = typeof allData.slidestoscroll == 'undefined' ? 1 : allData.slidestoscroll;
                    var speed = typeof allData.speed == 'undefined' ? '500' : allData.speed;
                    var dots = typeof allData.dots == 'undefined' ? false : allData.dots;
                    var cssEase = typeof allData.cssease == 'undefined' ? 'linear' : allData.cssease;
                    var prevArrow = typeof allData.prevarrow == 'undefined' ? '' : allData.prevarrow;
                    var nextArrow = typeof allData.nextarrow == 'undefined' ? '' : allData.nextarrow;
                    var centerMode = typeof allData.centermode == 'undefined' ? false : allData.centermode;
                    var centerPadding = typeof allData.centerpadding == 'undefined' ? false : allData.centerpadding;
                    var rows = typeof allData.rows == 'undefined' ? 1 : parseInt(allData.rows);
                    var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                    var autoplaySpeed = typeof allData.autoplayspeed == 'undefined' ? 2000 : parseInt(allData.autoplayspeed);
                    var lazyLoad = typeof allData.lazyload == 'undefined' ? false : allData.lazyload; // have to remove it from settings object if it undefined
                    var appendDots = typeof allData.appenddots == 'undefined' ? false : allData.appenddots;
                    var appendArrows = typeof allData.appendarrows == 'undefined' ? false : allData.appendarrows;
                    var asNavFor = typeof allData.asnavfor == 'undefined' ? false : allData.asnavfor;
                    var fade = typeof allData.fade == 'undefined' ? false : allData.fade;
                    var rtl = typeof allData.rtl == 'undefined' ? false : allData.rtl;
                    var responsive = typeof $(this).data('responsive') == 'undefined' ? false : $(this).data('responsive');
                    //slider settings object setup
                    sliderSettings.infinite = infinite;
                    sliderSettings.arrows = arrows;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.focusOnSelect = focusOnSelect;
                    sliderSettings.swipeToSlide = swipeToSlide;
                    sliderSettings.slidesToShow = slidesToShow;
                    sliderSettings.slidesToScroll = slidesToScroll;
                    sliderSettings.speed = speed;
                    sliderSettings.dots = dots;
                    sliderSettings.cssEase = cssEase;
                    sliderSettings.prevArrow = prevArrow;
                    sliderSettings.nextArrow = nextArrow;
                    sliderSettings.rows = rows;
                    sliderSettings.autoplaySpeed = autoplaySpeed;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.rtl = rtl;
                    if (centerMode != false) {
                        sliderSettings.centerMode = centerMode;
                    }
                    if (centerPadding != false) {
                        sliderSettings.centerPadding = centerPadding;
                    }
                    if (lazyLoad != false) {
                        sliderSettings.lazyLoad = lazyLoad;
                    }
                    if (appendDots != false) {
                        sliderSettings.appendDots = appendDots;
                    }
                    if (appendArrows != false) {
                        sliderSettings.appendArrows = appendArrows;
                    }
                    if (asNavFor != false) {
                        sliderSettings.asNavFor = asNavFor;
                    }
                    if (fade != false) {
                        sliderSettings.fade = fade;
                    }
                    if (responsive != false) {
                        sliderSettings.responsive = responsive;
                    }
                    $(this).slick(sliderSettings);
                }
            });
        }

        /*
        ========================================
            CountDown Timer
        ========================================
        */
        $('.global-timer').syotimer({
            year: 2022,
            month: 8,
            day: 20,
            hour: 20,
            minute: 30
        });

        /*
        ========================================
            Category Mega menu
        ========================================
        */
        $(document).on('click', '.cate-list .menu-item-has-children', function (e) {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });

        /*
        ========================================
            Nice Scroll js
        ========================================
        */
        // $(".category-megamenu-inneraa, .navbar-area-side, .single-addto-cart-wrappers").niceScroll({});

        /*
        ========================================
            Faq Accordion
        ========================================
        */
        $(document).on('click', '.faq-contents .faq-title', function (e) {
            var faqs = $(this).parent('.faq-item');
            if (faqs.hasClass('open')) {
                faqs.removeClass('open');
                faqs.find('.faq-panel').removeClass('open');
                faqs.find('.faq-panel').slideUp(300, "swing");
            } else {
                faqs.addClass('open');
                faqs.children('.faq-panel').slideDown(300, "swing");
                faqs.siblings('.faq-item').children('.faq-panel').slideUp(300, "swing");
                faqs.siblings('.faq-item').removeClass('open');
                faqs.siblings('.faq-item').find('.faq-title').removeClass('open');
                faqs.siblings('.faq-item').find('.faq-panel').slideUp(300, "swing");
            }
        });

        /*-------------------------------
            Side Shop Menu
        ------------------------------*/

        $(document).on('click', '.shop-lists .menu-item-has-children a', function (e) {
            var shopList = $(this).parent('.menu-item-has-children');
            if (shopList.hasClass('open')) {
                shopList.removeClass('open');
                shopList.find('.submenu').removeClass('open');
                shopList.find('.submenu').slideUp(300, "swing");
            } else {
                shopList.addClass('open');
                shopList.children('.submenu').slideDown(300, "swing");
                shopList.siblings('.menu-item-has-children').children('.submenu').slideUp(300, "swing");
                shopList.siblings('.menu-item-has-children').removeClass('open');
            }
        });

        /*-------------------------------
            Side Shop Top
        ------------------------------*/

        $(document).on('click', '.shop-left-title .title', function (e) {
            var shopTitle = $(this).parent('.shop-left-title');
            if (shopTitle.hasClass('open')) {
                shopTitle.removeClass('open');
                shopTitle.find('.shop-left-list').removeClass('open');
                shopTitle.find('.shop-left-list').slideUp(300, "swing");
            } else {
                shopTitle.addClass('open');
                shopTitle.children('.shop-left-list').slideDown(300, "swing");
                shopTitle.siblings('.shop-left-title').children('.shop-left-list').slideUp(300, "swing");
                shopTitle.siblings('.shop-left-title').removeClass('open');
            }
        });

        /*-----------------
            Nice Select
        ------------------*/
        // $('select').niceSelect();


        $(document).on('click', '.navbar-toggler', function () {
            $(".navbar-toggler").toggleClass("active");
        });

        /*-------------------------------
            Category Toggle Class
        ------------------------------*/
        $(document).on('click', '.top-menu-toggle', function () {
            $(".navbar-area-side").toggleClass("active");
        });

        /*
        ========================================
            Tab
        ========================================
        */

        $(document).on('click', 'ul.tabs li', function () {
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('active');
            $('.tab-content-item').removeClass('active');

            $(this).addClass('active');
            $("#" + tab_id).addClass('active');
        });

        /*
        ========================================
            Pagination
        ========================================
        */

        $(document).on('click', '.pagination-list li', function () {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        });

        /*-----------------
            Lazy Load Js
        ------------------*/

        $('.lazyloads').Lazy();

        /*
        ----------------------------------------
            SearchBar
        ----------------------------------------
        */

        $(document).on('click', '.search-close', function () {
            $('.search-bar').removeClass('active');
        });
        $(document).on('click', '.search-open', function () {
            $('.search-bar').toggleClass('active');
        });


        /*----------------------
            Isotope
        -----------------------*/

        // $('.imageloaded').imagesLoaded(function() {
        //     var $grid = $('.grid').isotope({
        //         itemSelector: '.grid-item',
        //         percentPosition: true,
        //         masonry: {
        //             columnWidth: '.grid-item',
        //         }
        //     });
        //     $('.isootope-button').on('click', '.list', function() {
        //         var filterValue = $(this).attr('data-filter');
        //         $grid.isotope({ filter: filterValue });
        //         $(this).siblings().removeClass('active');
        //         $(this).addClass('active');
        //     });
        // });

        $('.imageloaded-two').imagesLoaded(function () {
            var $gridtwo = $('.grid-two').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-item',
                    gutter: 30,
                }
            });
            $('.isootope-button').on('click', '.list', function () {
                var filterValue = $(this).attr('data-filter');
                $gridtwo.isotope({filter: filterValue});
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
        });


        /*
        ========================================
            Product Quantity js
        ========================================
        */

        // $(function() {
        //
        //     // $('<span class="plus"><i class="las la-plus"></i></span>').insertAfter('.product-quantity .quantity-input');
        //     // $('<span class="substract"><i class="las la-minus"></i></span>').insertBefore('.product-quantity .quantity-input');
        //
        //     // $(document).on('click', '.plus', function() {
        //     //     var selectedInput = $(this).prev('.quantity-input');
        //     //     if (selectedInput.val() < 50) {
        //     //         selectedInput[0].stepUp(1);
        //     //     }
        //     // });
        //     // $(document).on('click', '.substract', function() {
        //     //     var selectedInput = $(this).next('.quantity-input');
        //     //     if (selectedInput.val() > 1) {
        //     //         selectedInput[0].stepDown(1);
        //     //     }
        //     // });
        //
        // });

        /*-------------------------------
            Click Value Add
        ------------------------------*/
        $(document).on('click', '.size-lists li', function (event) {
            var el = $(this);
            var value = el.data('value');
            var parentWrap = el.parent().parent();
            el.addClass('active');
            el.siblings().removeClass('active');
            parentWrap.find('.value-size').val(value);

        });

        /*
        ========================================
            Click Clear Contents
        ========================================
        */

        $(document).on('click', '.click-hide-filter .click-hide', function () {
            $(this).hide();
        });

        $(document).on('click', '.click-hide-filter .click-hide-parent', function () {
            $('.click-hide-filter').hide();
        });

        /*
        ========================================
            top-menu-category Click
        ========================================
        */

        $(document).on('click', '.navbar-area-side .cate-list', function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });

        /*
        ========================================
            Click Active Class
        ========================================
        */


        $(document).on('click', '.active-list .list', function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });

        /*
        ========================================
            Shop Responsive Sidebar
        ========================================
        */
        $(document).on('click', '.close-bars, .body-overlay', function () {
            $('.shop-close, .shop-close-main, .body-overlay').removeClass('active');
        });
        $(document).on('click', '.sidebar-icon', function () {
            $('.shop-close, .shop-close-main, .body-overlay').addClass('active');
        });
        /*
        ========================================
            Discount Popup Click
        ========================================
        */

        $(document).on('click', '.discount-overlays, .close-icon', function () {
            $('.discount-overlays, .discount-popup-area').hide();
        });

        $('.discount-popup-area').hide();
        setTimeout(function () {
            $('.discount-popup-area').show();
        }, 3000);


        /*
        ========================================
            Cart Click Loading
        ========================================
        */

        $(document).on('click', '.cart-loading', function () {
            $(this).addClass('active-loading')
            setTimeout(function () {
                $('.cart-loading').removeClass('active-loading');
            }, 1500);
        });


        /*
        ========================================
            Cart Click Close
        ========================================
        */

        $(document).on('click', '.close-table-cart', function () {
            $(this).parent().parent().hide(100);
        });

        $(document).on('click', '.btn-clear', function () {
            $('.table-cart-clear').hide(500);
        });
        $(document).on('click', '.btn-update', function () {
            $('.table-cart-clear').show(1000);
            $('.close-table-cart').parent().parent().show(500);
        });


        /*
        ========================================
            Addto-Cart Click Close
        ========================================
        */

        $(document).on('click', '.close-cart', function () {
            $(this).parent().hide(100);
        });

        /*
        ========================================
            Click Open SignIn SignUp
        ========================================
        */

        $(document).on('click', '.click-open-form', function () {
            $('.checkout-form-open').toggleClass('active');
        });

        $(document).on('click', '.click-open-form2', function () {
            $(this).toggleClass('active');
            $('.checkout-signup-form-wrapper').toggleClass('active');
        });

        $(document).on('click', '.click-open-form3', function () {
            $(this).toggleClass('active');
            $('.checkout-address-form-wrapper').toggleClass('active');
        });

        /*
        ========================================
            Popup Modal Cart
        ========================================
        */

        $(document).on('click', '.close-icon, .body-overlay', function () {
            $('.shop-detail-cart-content, .body-overlay').removeClass('active');
        });
        $(document).on('click', '.popup-modal', function () {
            $('.shop-detail-cart-content, .body-overlay').addClass('active');
        });


        /*
        ========================================
            Dashboard Responsive Sidebar
        ========================================
        */

        $(document).on('click', '.close-bars, .body-overlay', function () {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').removeClass('active');
        });
        $(document).on('click', '.sidebar-icon', function () {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').addClass('active');
        });

        /*------------------
            back to top
        ------------------*/

        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 1500);
        });

    });

    /*------------------
            back to top
        ------------------*/

    $(window).on('scroll', function () {

        //back to top show/hide
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 300) {
            ScrollTop.fadeIn(300);
        } else {
            ScrollTop.fadeOut(300);
        }
    });

    /*-------------------------------
        Navbar Fix
    ------------------------------*/
    $(window).on('resize', function () {
        if ($(window).width() < 991) {
            navbarFix()
        }
    });

    function navbarFix() {
        $(document).on('click', '.navbar-nav li.menu-item-has-children>a', function(e) {
            e.preventDefault();
        })
    }

    /*
      ========================================
            Password Show Hide On Click
      ========================================
    */

    $(document).on("click", ".toggle-password", function(e) {
        e.preventDefault();
        let toggle_password = $('.toggle-password');
        toggle_password.toggleClass("show-pass");
        let input = toggle_password.parent().find("input");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
})(jQuery);
