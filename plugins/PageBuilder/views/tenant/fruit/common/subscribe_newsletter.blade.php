
<style> .bultenn-box-area form input:focus{border: 1px solid #000000 !important;}</style>
<div class="bultenn-module-main-div" data-padding-top="{{ $data['padding_top'] }}" data-padding-bottom="{{ $data['padding_bottom'] }}">
    <div class="bultenn-module-inside-area">
        <!-- Modül başlıgı ve üst başlıgı !-->
        <div class="modules-head-text-main" style="margin-bottom: 20px;">
            <div class="modules-head-text-s lspac" style="color: #666666;">{{ \App\Helpers\SanitizeInput::esc_html($data['title']) ?? '' }}</div>
            <div class="ebulten-head-texting ebulten-modulhead" style="color: #000000; font-weight: bold;">{{ \App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? '' }}</div>
        </div>
        <!-- Modül başlıgı ve üst başlıgı !-->
        <div class="bultenn-box-area">
            <form method="post" action="{{ $data['form_action'] }}" class="subscribe-form">
                @csrf
                <input class="bulten-input email" type="text" name="email" placeholder="{{ $data['email_placeholder'] }}"  autocomplete="off" style="background: #ffffff; color:#000000; border: 1px solid #000000; border-right: 0;">
                <div class="footer-widget">

                </div>
                <input type="hidden" name="test" value="1">
                  <button id="btnSubmit" type="submit" name="newsletter" class="bulten-submit newsletter-submit-btn" style="background: #000000; color:#ffffff; border: 1px solid #000000; border-left: 0;">{{ $data['subscribe_text'] }}</button>
            </form>
            <div class="form-message-show mt-2"></div>
        </div>
    </div>
</div>
