<?php


namespace Plugins\WidgetBuilder\Widgets\Tenants\Electro;

use App\Helpers\SanitizeInput;
use App\Models\Language;
use App\Models\Menu;
use Plugins\WidgetBuilder\Traits\LanguageFallbackForWidgetBuilder;
use Plugins\WidgetBuilder\WidgetBase;
use Mews\Purifier\Facades\Purifier;

class NavigationMenuWidget extends WidgetBase
{
    use LanguageFallbackForWidgetBuilder;

    public function admin_render()
    {
        // TODO: Implement admin_render() method.
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings($this->args['language']);

        $widget_title =  $widget_saved_values['widget_title'] ?? '';
        $selected_menu_id = $widget_saved_values['menu_id'] ?? '';

        $output .= '<div class="form-group"><input type="text" name="widget_title" class="form-control" placeholder="' . __('Widget Title') . '" value="'. SanitizeInput::esc_html($widget_title) .'"></div>';

        $navigation_menus = Menu::all();
        $output .= '<div class="form-group">';
        $output .= '<select class="form-control" name="menu_id">';
        foreach($navigation_menus as $menu_item){
            $selected = $selected_menu_id == $menu_item->id ? 'selected' : '';
            $output .= '<option value="'.$menu_item->id.'" '.$selected.'>'.SanitizeInput::esc_html($menu_item->title).'</option>';
        }
        $output .= '</select>';
        $output .= '</div>';

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
        $widget_title = SanitizeInput::esc_html($this->setting_item('widget_title') ?? '');
        $menu_id = $this->setting_item('menu_id') ?? '';

        $output = $this->widget_before('color-four'); //render widget before content
        $output .= '<div class="footer-widget widget color-four">';
        $output .= '<h6 class="widget-title">'.$widget_title.'</h6>';

        $output .= '<div class="footer-inner margin-top-30">';
        $output .= '<ul class="footer-link-list">';
        $output .= render_frontend_menu($menu_id);
        $output .= '</ul>';

        $output .= '</div>';
        $output .= '</div>';
        $output .= $this->widget_after(); // render widget after content

        return $output;
    }


    public function enable(): bool
    {
        return !is_null(tenant());
    }

    public function widget_title()
    {
        // TODO: Implement widget_title() method.
        return __('Tenant Navigation Menu: Electro');
    }
}
