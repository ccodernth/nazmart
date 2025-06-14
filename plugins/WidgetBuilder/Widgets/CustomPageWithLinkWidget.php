<?php

namespace Plugins\WidgetBuilder\Widgets;


use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Models\Language;
use App\Models\Widgets;
use Modules\Blog\Entities\BlogCategory;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\WidgetBase;
use Mews\Purifier\Facades\Purifier;
use App\Helpers\SanitizeInput;

class CustomPageWithLinkWidget extends WidgetBase
{
    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings($this->args['language']);

            $output .= Text::get([
                'name' => 'title',
                'label' => __('Title'),
                'value' => $widget_saved_values['title'] ?? null
            ]);

        //repeater
        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'footer_custom_page_with_link',
            'multi_lang' => false,
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Title')
                ],

                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title_url',
                    'label' => __('Title URL')
                ],
            ]
        ]);

        $output .= "<input type='hidden' value='" . $this->args['language'] . "' name='language' />";

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }


    public function enable(): bool
    {
        return is_null(tenant()); // TODO: Change the autogenerated stub
    }

    public function frontend_render()
    {
        $widget_saved_values = $this->get_settings();
        $title = SanitizeInput::esc_html($widget_saved_values['title']) ?? '';

        $repeater_data = $widget_saved_values['footer_custom_page_with_link'] ?? [];

   $repeater_markup = '';
    foreach ($repeater_data['repeater_title_url_'] as $key => $url){
        $r_title_url = SanitizeInput::esc_url($url) ?? '';
        $r_title = SanitizeInput::esc_html($repeater_data['repeater_title_'][$key]) ?? '';

$repeater_markup.= <<<SOCIALITEM
     <li class="list"><a href="{$r_title_url}">{$r_title}</a></li>
SOCIALITEM;

}

return <<<HTML
 <div class="col-lg-3 col-md-6 col-sm-6 mt-4">
        <div class="footer-widget widget">
            <h6 class="widget-title">{$title}</h6>
            <div class="footer-inner mt-4">
                <ul class="footer-link-list">
                  {$repeater_markup}
                </ul>
            </div>
        </div>
    </div>
HTML;
}

    public function widget_title(){
        return __('Custom Page Link');
    }

}
