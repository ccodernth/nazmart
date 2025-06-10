<?php

namespace Plugins\WidgetBuilder\Widgets\Tenants\Fruit;

use App\Helpers\SanitizeInput;
use App\Models\FormBuilder;
use App\Models\Menu;
use App\Models\Page;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\NiceSelect;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\Traits\LanguageFallbackForWidgetBuilder;
use Plugins\WidgetBuilder\WidgetBase;

class FooterBottomLinksWidget extends WidgetBase
{
    use LanguageFallbackForWidgetBuilder;

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings($this->args['language']);

        $menus = Menu::select('id', 'title')->get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['title']];
        });

        $output .= Text::get([
            'name' => 'title',
            'label' => __('Title'),
            'value' => $widget_saved_values['title'] ?? null
        ]);

        $output .= Select::get([
            'name' => 'navbar_link',
            'options' => $menus,
            'label' => __('Navbar'),
            'value' => $widget_saved_values['navbar_link'] ?? null,
            'info' => __('Selected navbar will display the links added in it')
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
        $widget_navbar = SanitizeInput::esc_url($widget_saved_values['navbar_link']) ?? '';

        $instance = Menu::findOrFail($widget_navbar);
        $li_markup = render_frontend_menu($instance->id);

        $markup = $this->widget_column_start();
        $markup .= '<div class="footer-widget center-text widget mt-3">
                            <h4 class="widget-titile fw-600 fs-15 ff-poppins"> '.$widget_title.' </h4>
                            <div class="footer-inner margin-top-20">
                                <div class="footer-menu">
                                    <ul class="footer-menu-list fs-14">
                                        '. $li_markup .'
                                    </ul>
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
        return __('Footer Bottom Links: Theme Fruit');
    }

}
