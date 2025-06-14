<?php

namespace Plugins\WidgetBuilder\Widgets;

use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Helpers\SanitizeInput;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\WidgetBase;
use Mews\Purifier\Facades\Purifier;

class ContactInfoWidgetTwo extends WidgetBase
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

        $output .= Textarea::get([
            'name' => 'description',
            'label' => __('Description'),
            'value' => $widget_saved_values['description'] ?? null
        ]);


        //repeater
        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'footer_contact_info_landlord',
            'fields' => [
                [
                    'type' => RepeaterField::ICON_PICKER,
                    'name' => 'repeater_icon',
                    'label' => __('Icon')
                ],

                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_url',
                    'label' => __('URL')
                ]
            ]
        ]);

        $output .= "<input type='hidden' value='" . $this->args['language'] . "' name='language' />";

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        // TODO: Implement frontend_render() method.
        $widget_saved_values = $this->get_settings();
        $widget_title = SanitizeInput::esc_html($widget_saved_values['title'] ?? '');
        $widget_description = SanitizeInput::esc_html($widget_saved_values['description'] ?? '');

        $repeater_data = $widget_saved_values['footer_contact_info_landlord'] ?? [];

        $repeater_markup = '';

        foreach ($repeater_data['repeater_url_'] ?? [] as $key => $url) {
            $r_url = SanitizeInput::esc_url($url) ?? '';
            $r_icon = $repeater_data['repeater_icon_'][$key] ?? '';

            $repeater_markup .= '<li class="lists">
                                     <a class="facebook" href="'.$r_url.'">
                                        <i class="'.$r_icon.'"></i>
                                     </a>
                                 </li>';
        }

        return '<div class="col-lg-3 col-md-6 col-sm-6 mt-4">
                        <div class="footer-widget widget">
                            <h4 class="widget-title">'.$widget_title.'</h4>
                            <div class="footer-inner mt-4">
                                <p class="subscribe-para"> '.$widget_description.' </p>
                                <div class="footer-socials margin-top-40">
                                    <ul class="footer-social-list">
                                        '.$repeater_markup.'
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
    }

    public function widget_title()
    {
        return __('Contact Info: 02');
    }

    public function enable(): bool
    {
        return is_null(tenant()); // TODO: Change the autogenerated stub
    }

}
