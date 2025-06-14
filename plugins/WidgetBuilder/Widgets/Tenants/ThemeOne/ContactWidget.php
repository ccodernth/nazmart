<?php

namespace Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne;

use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\Traits\LanguageFallbackForWidgetBuilder;
use Plugins\WidgetBuilder\WidgetBase;

class ContactWidget extends WidgetBase
{
    use LanguageFallbackForWidgetBuilder;

    public function admin_render()
    {



        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings($this->args['language']);
        $output .= Text::get([
            'name' => 'title',
            'label' => __('Widget Title'),
            'value' => $widget_saved_values['title'] ?? null
        ]);
      //  dd('burada', $this, $widget_saved_values);

        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'footer_social_follow',
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Title')
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
        $repeater_data = $widget_saved_values['footer_social_follow'] ?? '';

        $markup = $this->widget_column_start();

        $li_markup = '';
        foreach (current($repeater_data) as $key => $data) {
            $li_markup .= '<span class="footer-call"> <a href="tel:' . $data . '"> ' . $data . ' </a> </span>';
        }

        $top_margin = !empty($widget_title) ? 'mt-0' : '';
        $markup .= '<div class="footer-widget widget color-three text-center ' . $top_margin . '">
                                <h6 class="widget-title fs-6 fw-600" style="line-height: 18px;">
                            <i class="las la-headset"></i> ' . $widget_title . '
                            </h6>
                            <div class="footer-inner margin-top-30 fs-14">
                                ' . $li_markup . '
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
        return __('Footer Contact: Fruit');
    }

}
