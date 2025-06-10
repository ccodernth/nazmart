

<div class="ticaret-kutulari-main-div" style="background-color: #ffffff; border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff;">
    <div class="ticaret-kutulari-inside" style="justify-content: center">
        @foreach($data['repeater_data']['repeater_title_'] ?? [] as $key => $title)
            <div class="ticaret-kutu-box">
                <div class="ticaret-kutu-box-i" style="color: #333333;">
                    <i class="{{$data['repeater_data']['repeater_icon_'][$key] ?? ''}}"></i>
                </div>
                <div class="ticaret-kutu-box-text">
                    <div class="ticaret-kutu-box-text-h" style="color: #666666;">{{\App\Helpers\SanitizeInput::esc_html($title)}}</div>
                    <div class="ticaret-kutu-box-text-s" style="color: #000000;">{{\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_subtitle_'][$key]) ?? ''}}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>

