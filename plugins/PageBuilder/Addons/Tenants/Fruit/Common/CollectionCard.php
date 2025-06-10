<?php

namespace Plugins\PageBuilder\Addons\Tenants\Fruit\Common;

use App\Facades\GlobalLanguage;
use App\Helpers\SanitizeInput;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\PageBuilder\PageBuilderBase;
use function __;

class CollectionCard extends PageBuilderBase
{

    public function preview_image()
    {
        return 'Tenant/common/testimonial-01.png';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();

        $output .= Text::get([
            'name' => 'title',
            'label' => __('Title'),
            'value' => $widget_saved_values['title'] ?? null,
        ]);

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);


        for ($i = 1; $i <= 8; $i++) {
            $output .= Text::get([
                'name' => 'image_url_' . $i,
                'label' => __('Image URL ') . $i,
                'value' => $widget_saved_values['image_url_' . $i] ?? null,
            ]);

            $output .= Image::get([
                'name' => 'image_' . $i,
                'label' => __('Image ') . $i,
                'value' => $widget_saved_values['image_' . $i] ?? null,
                'dimensions' => '320x287 | 320x290 px',
            ]);
        }

        // add padding option
        $output .= $this->padding_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));
        $title = SanitizeInput::esc_html($this->setting_item('title')) ?? '';
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle')) ?? '';
        /*$repeater_image_data = $this->setting_item('repeater_image_data') ?? [];*/

        $image_data = [];
        for ($i = 1; $i <= 8; $i++) {
            $image_data[] = [
                'url' => SanitizeInput::esc_html($this->setting_item('image_url_' . $i)),
                'image' => $this->setting_item('image_' . $i),
            ];
        }


        $data = [
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
            'title' => $title,
            'subtitle' => $subtitle,
            /*'repeater_image_data' => $repeater_image_data,*/
            'image_data' => $image_data,

        ];



        return self::renderView('tenant.fruit.common.collection_card', $data);
    }

    public function enable(): bool
    {
        return (bool)!is_null(tenant());
    }

    public function addon_title()
    {
        return __('Theme Fruit : Collection Card');
    }
}
