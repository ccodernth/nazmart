<?php

namespace Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\FieldType;
use Plugins\WidgetBuilder\Traits\LanguageFallbackForWidgetBuilder;
use Plugins\WidgetBuilder\Traits\WidgetControls;
use Plugins\WidgetBuilder\WidgetBase;

class FooterContact extends WidgetBase
{
    use LanguageFallbackForWidgetBuilder,WidgetControls;

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings($this->args['language']);


        $this->start_control();
        $this->addField('title',[
            'type' => FieldType::Text,
            'name' => 'title',
            'label' => __('Title'),
        ]);
        $output .= $this->end_control();

        $type = ['email' => 'Email', 'number' => 'Number'];

        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'footer_contact_repeater',
            'fields' => [
                [
                    'type' => RepeaterField::NICE_SELECT,
                    'options' => $type,
                    'name' => 'field_type',
                    'label' => __('Field Type')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'field_value',
                    'label' => __('Contact Info')
                ],
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
        $repeater_data = $widget_saved_values['footer_contact_repeater'] ?? '';

        $a_markup = '';
        foreach (current($repeater_data) as $key => $value)
        {
            if ($value == 'email')
            {
                $a_markup .= '<span><i class="las la-envelope"></i><a href="mailto:'. SanitizeInput::esc_html($repeater_data['field_value_'][$key]) .'" class="contact-item"> '. SanitizeInput::esc_html($repeater_data['field_value_'][$key]) .' </a> </span>';
            }
            elseif($value == 'number')
            {
                $a_markup .= '<span class="footer-call"><i class="las la-phone"></i> <a href="tel:'. SanitizeInput::esc_html($repeater_data['field_value_'][$key]) .'" class="contact-item"> '. SanitizeInput::esc_html($repeater_data['field_value_'][$key]) .' </a> </span>';
            }

        }

        $markup = $this->widget_column_start();
        $markup .= '<div class="footer-widget widget center-text mt-3">
                            <h4 class="widget-title fw-600 fs-15 " style="line-height: 18px; font-family: ´Poppins´, Sans-serif">
                              <i class="las la-headset"></i>'. $widget_title .' </h4>
                            <div class="footer-inner margin-top-15 fs-14">
                                <div class="footer-contact">
                                    '. $a_markup .'
                                </div>
                            </div>
                        </div>';
        $markup .= $this->widget_column_end();

        return $markup;
    }

    public function enable(): bool
    {
        return (bool)!is_null(tenant());
    }

    public function widget_title()
    {
        return __('Footer Contact: Theme Fruit');
    }

}
