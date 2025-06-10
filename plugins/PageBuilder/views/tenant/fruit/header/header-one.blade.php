
<div class="slider-main-div" style="width: 100%; background-color: #ffffff; overflow: hidden;">
    <div class="swiper-container">

        <div class="swiper-wrapper">
            @foreach($data['repeater_data']['figure_image_'] as $key => $value)
                @php
                    $figure_image = $data['repeater_data']['figure_image_'][$key] ?? '';
                    $image = get_attachment_image_by_id($figure_image);
                    $image_shape = $image != null ? $image['img_url'] : '';
                @endphp
                <div class="swiper-slide rounded"
                     style="background-image: url('{{$image_shape}}'); background-size: contain !important; background-position: top center;">
                    <a href="#" style="position: absolute; width: 100%; height: 100%; z-index: 9;"></a>
                </div>
            @endforeach
        </div>
        <!-- Swiper navigation and pagination controls -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>


{{--@php
    $primary_image = get_attachment_image_by_id($data['primary_image']);
    $primary_image = !empty($primary_image) ? $primary_image['img_url'] : '';

    $particle_image_one = get_attachment_image_by_id($data['particle_image_one']);
    $particle_image_one = !empty($particle_image_one) ? $particle_image_one['img_url'] : theme_assets('img/shape1.png');

    $particle_image_two = get_attachment_image_by_id($data['particle_image_two']);
    $particle_image_two = !empty($particle_image_two) ? $particle_image_two['img_url'] : theme_assets('img/shape2.png');

    $particle_image_three =  get_attachment_image_by_id($data['particle_image_three']);
    $particle_image_three = !empty($particle_image_three) ? $particle_image_three['img_url'] : theme_assets('img/shape3.png');

    $particle_image_four = get_attachment_image_by_id($data['particle_image_four']);
    $particle_image_four = !empty($particle_image_four) ? $particle_image_four['img_url'] : theme_assets('img/shape4.png');

    $particle_image_five = get_attachment_image_by_id($data['particle_image_five']);
    $particle_image_five = !empty($particle_image_five) ? $particle_image_five['img_url'] : theme_assets('img/index-4-s1.png');

    $particle_image_six = get_attachment_image_by_id($data['particle_image_six']);
    $particle_image_six = !empty($particle_image_six) ? $particle_image_six['img_url'] : theme_assets('img/index-5-round.png');

    $background_shape = get_attachment_image_by_id($data['background_shape']);
    $background_shape = !empty($background_shape) ? $background_shape['img_url'] : theme_assets('img/index-5-big1.png');
@endphp

    <!-- Banner area Starts -->
@if(!empty($data['background_color']))
    <style>
        .banner-five .banner-five-shapes::before {
            background: {{$data['background_color']}}

        }
    </style>
@endif--}}


{{--<div class="slider-main-div" style="width: 100%; background-color: #ffffff; overflow: hidden;">
    <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
        <div class="swiper-wrapper" id="swiper-wrapper-848f7cf93022227b" aria-live="off"
             style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
            <div class="swiper-slide slide-top-desktop rounded swiper-slide-active"
                 style="background-image: url(https://e-meyve.az/images/slider/slider_155753529185479.png); background-position: center top; background-size: contain !important; width: 1300px;"
                 role="group" aria-label="1 / 4"><a href="#"
                                                    style="position:absolute;   width: 100%; height: 100%; z-index: 9    "></a>
            </div>
            <div class="swiper-slide slide-top-mobile rounded swiper-slide-next"
                 style=" background-image:url(https://e-meyve.az/images/slider/slider_155753529185479.png);  background-size: contain !important; background-position:top center;"
                 role="group" aria-label="2 / 4"><a href="#"
                                                    style="position:absolute;   width: 100%; height: 100%; z-index: 9    "></a>
            </div>
            <div class="swiper-slide slide-top-desktop rounded"
                 style="background-image: url(https://e-meyve.az/images/slider/slider_238895362365843.png); background-position: center top; background-size: contain !important; width: 1300px;"
                 role="group" aria-label="3 / 4"></div>
            <div class="swiper-slide slide-top-mobile rounded"
                 style=" background-image:url(https://e-meyve.az/images/slider/slider_238895362365843.png);  background-size: contain !important; background-position:top center;"
                 role="group" aria-label="4 / 4"></div>
        </div>
        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
             aria-controls="swiper-wrapper-848f7cf93022227b" aria-disabled="false"></div>
        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide"
             aria-controls="swiper-wrapper-848f7cf93022227b" aria-disabled="true"></div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span
                class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button"
                                                        aria-label="Go to slide 2"></span></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</div>
<!-- Banner area end -->--}}







