{{--<section class="collection-area" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container container-one">
        <div class="collection-wrapper">
            <div class="row gy-4">
                @foreach($data['repeater']['repeater_title_'] ?? [] as $key => $info)
                    @php
                        $image_id = $data['repeater']['repeater_image_'][$key];
                        $image = get_attachment_image_by_id($image_id);
                        $image_url = !empty($image) ? $image['img_url'] : '#';

                        $background_color = $data['repeater']['repeater_background_color_'][$key] ?? '#FFFFFF';
                        $background_color = 'background-color:'.$background_color;

                        $button_target = array_key_exists('repeater_button_target_', $data['repeater']);
                        $button_target = $button_target && array_key_exists($key, $data['repeater']['repeater_button_target_']) ? 'target="_blank"' : '';
                    @endphp

                    <div class="col-lg-6">
                    <div class="single-collection-two collection-padding section-bg-4" style="{{$background_color}}">
                        <div class="single-collection-two-flex d-flex align-items-center">
                            <div class="single-collection-two-contents">
                                <h3 class="single-collection-two-contents-title fw-500"> {{$info}} </h3>
                                <a href="{{\App\Helpers\SanitizeInput::esc_url($data['repeater']['repeater_button_url_'][$key]) ?? '#'}}" class="shop-now-btn shop-now-border mt-4" {!! $button_target !!}> {{\App\Helpers\SanitizeInput::esc_html($data['repeater']['repeater_button_text_'][$key])}} </a>
                            </div>

                            <div class="single-collection-two-thumb">
                                <img src="{{$image_url}}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>--}}
{{--
<section class="collection-area" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container container-one">
        <div class="collection-wrapper">
            <div class="row gy-4">
                @foreach($data['repeater_data']['repeater_title_'] ?? [] as $key => $title)
                    @php
                        $class = $loop->odd ? ['col-xl-5 col-lg-6', ''] : ['col-xl-7 col-lg-6', 'flex-row-reverse'];
                    @endphp

                    <div class="{{current($class)}}">
                        <div class="single-collection-two collection-padding section-bg-4" style="background-color: {{$data['repeater_data']['repeater_background_color_'][$key] ?? ''}}">
                            <div class="single-collection-two-flex {{last($class)}} d-flex align-items-center">
                                <div class="single-collection-two-contents">
                                    <h3 class="single-collection-two-contents-title  fw-500">
                                        <a href="{{$data['repeater_data']['repeater_button_url_'][$key]}}">
                                            @php
                                                $markup = \App\Helpers\SanitizeInput::esc_html($title);
                                                if (!empty($data['repeater_data']['repeater_break_text_'][$key]))
                                                {
                                                    $title_exploded = explode(' ', $markup);
                                                    if (count($title_exploded) > 1)
                                                    {
                                                        $first = current($title_exploded);
                                                        unset($title_exploded[0]);
                                                        $rest = implode(' ', $title_exploded);
                                                        $markup = $first . '<span class="single-collection-two-contents-title-block">'. $rest .'</span>';
                                                    }
                                                }
                                            @endphp

                                            {!! $markup !!}
                                        </a>
                                    </h3>
                                    <a href="{{$data['repeater_data']['repeater_button_url_'][$key]}}" class="shop-now-btn shop-now-border mt-4"> {{\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_button_text_'][$key] ?? '')}} </a>
                                </div>
                                <div class="single-collection-two-thumb">
                                    {!! render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
--}}

{{--
<div class="product-categories-main-div-vitrin2">
    <div class="product-categories-inside-vitrin2">
        <!-- Modül başlıgı ve üst başlıgı !-->
        <div class="modules-head-text-main">
            <div class="modules-head-forbg-text-out" style="border-bottom: 1px solid #cccccc; ">
                <div class="modules-head-forbg-text " style="color: #000000;     background-color: #ffffff; ">
                {{\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''}}
                </div>
            </div>
            <div class="modules-head-text-s" style="color: #999292; margin-bottom: 0;">
            {{\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''}}
            </div>
        </div>
        <!-- Modül başlıgı ve üst başlıgı SON !-->
        <div class="product-categories-inside-vitrin2-boxarea">
            <!-- Box başlangıç -->
            @foreach([1, 2, 3, 4, 5, 6, 7, 8] as $index)
                @php
                    $image_key = "image{$index}";
                    $url_key = "image{$index}_url";
                    $image_url = $data[$url_key] ?? 'javascript:void(0)';
                    $image_src = $data[$image_key] ?? null; // Varsayılan değer kaldırıldı
                @endphp

                @if($image_src)
                    <a class="col-md-4 form-group vitrin2-box" href="{{ $image_url }}" style="color: #000000 !important; text-decoration: none;">
                        <div class="vitrin2-box-img rounded">
                            <!-- Resmin data-original yerine doğrudan src kullanımı -->
                            <img src="{{ $image_src }}" alt="Image {{ $index }}">
                        </div>
                    </a>
                @endif
            @endforeach
            <!-- Box son -->
        </div>
    </div>
</div>
--}}


{{--<div class="product-categories-main-div-vitrin2">
    <div class="product-categories-inside-vitrin2">
        <!-- Modül başlıgı ve üst başlıgı !-->
        <div class="modules-head-text-main">
            <div class="modules-head-forbg-text-out" style="border-bottom: 1px solid #cccccc; ">
                <div class="modules-head-forbg-text " style="color: #000000;     background-color: #ffffff; ">
                {{\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''}}
                </div>
            </div>
            <div class="modules-head-text-s" style="color: #999292; margin-bottom: 0;">
            {{\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''}}
            </div>
        </div>
        <!-- Modül başlıgı ve üst başlıgı SON !-->
        <div class="product-categories-inside-vitrin2-boxarea">
            <!-- Box !-->

            <a class="col-md-4 form-group  vitrin2-box" href="{{ $data['image1_url'] ?? 'javascript:void(0)' }}"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_one'] }}"
                         data-original="images/uploads/banner1_219730523664730.png" alt="1">
                </div>
            </a>
            <a class="col-md-4 form-group  vitrin2-box" href="{{ $data['image2_url'] ?? 'javascript:void(0)' }}"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_two'] }}"
                         data-original="images/uploads/banner1_380594484715410.png" alt="2">
                </div>
            </a>
            <a class="col-md-4 form-group  vitrin2-box" href="{{ $data['image3_url'] ?? 'javascript:void(0)' }}"
               style="color: #ffffff !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_three'] }}"
                         data-original="images/uploads/banner1_183643381768974.png" alt="Uşaq Məhsulları">
                </div>
            </a>
            <a class="col-md-12 form-group  vitrin2-box" href="{{ $data['image4_url'] ?? 'javascript:void(0)' }}"
               style="color: #ffffff !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_four'] }}"
                         data-original="images/uploads/banner1_banner2819601949175.png" alt="Ağıllı Telefonlar">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="{{ $data['image5_url'] ?? 'javascript:void(0)' }}"
               style="color: #ffffff !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_five'] }}"
                         data-original="images/uploads/banner1_3-1-50559107836624.png" alt="Ev-Bağ">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="{{ $data['image6_url'] ?? 'javascript:void(0)' }}"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_six'] }}"
                         data-original="images/uploads/banner1_463964352587156.png" alt=" ">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="{{ $data['image7_url'] ?? 'javascript:void(0)' }}"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_seven'] }}"
                         data-original="images/uploads/banner1_1-3-70759428340495.png" alt=" ">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="{{ $data['image8_url'] ?? 'javascript:void(0)' }}"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="{{ $data['image_eight'] }}"
                         data-original="images/uploads/banner1_2-1-69774279512610.png" alt=" ">
                </div>
            </a>
            <!--  <========SON=========>>> Box SON !-->
        </div>
    </div>
</div>--}}


<div class="product-categories-main-div-vitrin2" data-padding-top="{{ $data['padding_top'] ?? '0' }}" data-padding-bottom="{{ $data['padding_bottom'] ?? '0' }}">
    <div class="product-categories-inside-vitrin2">
        <!-- Modül başlığı ve üst başlığı -->
        <div class="modules-head-text-main">
            <div class="modules-head-forbg-text-out" style="border-bottom: 1px solid #cccccc;">
                <div class="modules-head-forbg-text" style="color: #000000; background-color: #ffffff;">
                    {{\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''}}
                </div>
            </div>
            <div class="modules-head-text-s" style="color: #999292; margin-bottom: 0;">
                {{\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''}}
            </div>
        </div>
        <!-- Modül başlığı ve üst başlığı SON -->

        <div class="product-categories-inside-vitrin2-boxarea">
            <!-- Sabit 8 Görsel ve URL -->
            @php
                $colClass = ['col-md-4', 'col-md-4', 'col-md-4', 'col-md-12', 'col-md-3', 'col-md-3', 'col-md-3', 'col-md-3'];
            @endphp

            @for($i = 0; $i < 8; $i++)
                @php
                    $colIndex = $i % count($colClass);
                    $figure_image = $data['image_data'][$i]['image'] ?? '';
                    $image = get_attachment_image_by_id($figure_image);
                    $image_shape = $image != null ? $image['img_url'] : '';
                    $url = $data['image_data'][$i]['url'] ?? 'javascript:void(0)';
                    $altText = "Image " . ($i + 1);
                @endphp

                <a class="{{ $colClass[$colIndex] }} form-group vitrin2-box vitrin2-link" href="{{ $url }}" >
                    <div class="vitrin2-box-img rounded">
                        <img class="lazy" src="{{ $image_shape }}" alt="{{ $altText }}">
                    </div>
                </a>
            @endfor
            <!--  <========SON=========>>> Box SON -->
        </div>
    </div>
</div>

<!-- CSS kısmında "vitrin2-link" sınıfını tanımlayarak stil özelliklerini buraya taşıyabilirsiniz -->






