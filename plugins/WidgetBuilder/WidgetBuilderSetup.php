<?php


namespace Plugins\WidgetBuilder;

use App\Helpers\ModuleMetaData;
use App\Models\Language;
use App\Models\Widgets;
use Plugins\WidgetBuilder\Widgets\AboutUsWidget;
use Plugins\WidgetBuilder\Widgets\AboutUsWidgetTwo;
use Plugins\WidgetBuilder\Widgets\BlogCategoryWidget;
use Plugins\WidgetBuilder\Widgets\BlogSearchWidget;
use Plugins\WidgetBuilder\Widgets\ContactInfoWidget;
use Plugins\WidgetBuilder\Widgets\ContactInfoWidgetTwo;
use Plugins\WidgetBuilder\Widgets\CustomPageWithLinkWidget;
use Plugins\WidgetBuilder\Widgets\RecentBlogPostWidget;
use Plugins\WidgetBuilder\Widgets\ShopFooterWidget;
use Plugins\WidgetBuilder\Widgets\TenantAboutUsWidgetOne;
use Plugins\WidgetBuilder\Widgets\TenantAboutUsWidgetTwo;
use Plugins\WidgetBuilder\Widgets\TenantBrandOne;
use Plugins\WidgetBuilder\Widgets\TenantContactInfoWidget;
use Plugins\WidgetBuilder\Widgets\TenantCustomFormWidget;
use Plugins\WidgetBuilder\Widgets\TenantNavigationMenuWidget;
use Plugins\WidgetBuilder\Widgets\TenantNavigationMenuWidgetTwo;
use Plugins\WidgetBuilder\Widgets\TenantNewsletterOne;
use Plugins\WidgetBuilder\Widgets\TenantNewsletterTwo;
use Plugins\WidgetBuilder\Widgets\Tenants\Aromatic\BottomNavigationMenuWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Aromatic\BottomPaymentGatewayImage;
use Plugins\WidgetBuilder\Widgets\Tenants\Aromatic\ContactWidget as AromaticContactWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Aromatic\SocialFollowWidget as AromaticSocialFollow;
use Plugins\WidgetBuilder\Widgets\Tenants\Aromatic\TenantImageWidget as AromaticImageWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Bookpoint\ContactWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Bookpoint\NavigationMenuWidgetBookpoint;
use Plugins\WidgetBuilder\Widgets\Tenants\Bookpoint\NewsletterBookpoint;
use Plugins\WidgetBuilder\Widgets\Tenants\Bookpoint\TenantImageWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Casual\TenantAboutUsWidgetThree;
use Plugins\WidgetBuilder\Widgets\Tenants\Casual\TenantNavigationMenuWidgetThree;
use Plugins\WidgetBuilder\Widgets\Tenants\Electro\AddressWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Electro\NavigationMenuWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne\FooterAbout;
use Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne\FooterBottomLinksWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne\FooterContact;
use Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne\FooterPaymentGatewaysWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne\SocialFollowWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\ThemeOne\ContactWidget as ThemeOneContactWidget;
use Plugins\WidgetBuilder\Widgets\TenantSidebarBannerWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Electro\AboutUsWidget as ElectroAboutUsWidget;
use Plugins\WidgetBuilder\Widgets\Tenants\Electro\TenantImageWidget as ElectroImageWidget;


class WidgetBuilderSetup
{
    private static function registerd_widgets(){
        // Built-in Widget
        $widget = [
            AboutUsWidget::class,
            AboutUsWidgetTwo::class,
            BlogSearchWidget::class,
            RecentBlogPostWidget::class,
            BlogCategoryWidget::class,
            TenantAboutUsWidgetOne::class,
            TenantAboutUsWidgetTwo::class,
            TenantNavigationMenuWidget::class,
            TenantNavigationMenuWidgetTwo::class,
            TenantContactInfoWidget::class,
            TenantBrandOne::class,
            TenantNewsletterOne::class,
            TenantNewsletterTwo::class,
            TenantCustomFormWidget::class,
            CustomPageWithLinkWidget::class,
            ContactInfoWidget::class,
            ContactInfoWidgetTwo::class,
            TenantSidebarBannerWidget::class,
            SocialFollowWidget::class,
            FooterAbout::class,
            FooterContact::class,
            FooterBottomLinksWidget::class,
            FooterPaymentGatewaysWidget::class,
            FooterPaymentGatewaysWidget::class,
            ShopFooterWidget::class,

            NewsletterBookpoint::class,
            ContactWidget::class,
            NavigationMenuWidgetBookpoint::class,
            TenantImageWidget::class,

            // Aromatic
            AromaticContactWidget::class,
            AromaticImageWidget::class,
            AromaticSocialFollow::class,
            BottomNavigationMenuWidget::class,
            BottomPaymentGatewayImage::class,

            // Casual
            TenantNavigationMenuWidgetThree::class,
            TenantAboutUsWidgetThree::class,

            // Electro
            ElectroAboutUsWidget::class,
            ElectroImageWidget::class,
            NavigationMenuWidget::class,
            AddressWidget::class,

            ThemeOneContactWidget::class,
        ];

        // Third party custom addons
        $customAddons = (new ModuleMetaData())->getWidgetBuilderAddonList();

        return array_merge($widget, $customAddons);
    }

    private static function registerd_sidebars()
    {
        $register_widgets_for_admin = ['footer','sidebar'];
        $register_widgets_for_tenant = ['footer','footer_top','footer_bottom_left','footer_bottom_right', 'footer_bottom',/*'sidebar','blog_sidebar',*/ 'shop_footer'];
        $condition = (bool) tenant() ? $register_widgets_for_tenant : $register_widgets_for_admin;
        return $condition;
    }

    public static function get_admin_widget_sidebar_list($language = null){
        $all_sidebar = self::registerd_sidebars();
        $output = '';

        foreach ($all_sidebar as $sidebar){
            $output .= self::render_admin_sidebar_item($sidebar, $language);
        }
        return $output;
    }

    public static function get_admin_panel_widgets($language){
        $widgets_markup = '';
        $widget_list = self::registerd_widgets();
        foreach ($widget_list as $widget){
            try {
                $widget_instance = new $widget();
            }catch (\Exception $e){
                $msg = $e->getMessage();
                throw new \ErrorException($msg);
            }

            if ($widget_instance->enable()){
                $widgets_markup .= self::render_admin_widget_item([
                    'widget_name' => $widget_instance->widget_name(),
                    'widget_namespace' => $widget_instance::class,
                    'widget_title' => $widget_instance->widget_title(),
                    'language' => $language
                ]);
            }
        }


        return $widgets_markup;
    }

    private static function render_admin_widget_item($args){

        return '<li class="ui-state-default widget-handler" data-language="' . $args['language'] . '" data-name="'.$args['widget_name'].'" data-namespace="'.$args['widget_namespace'].'">
                    <h4 class="top-part"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.$args['widget_title'].'</h4>
                </li>';
    }
    public static function render_admin_sidebar_item($sidebar, $language){
        $markup = '<div class="card">
                    <div class="card-header widget-area-header">
                        <h4 class="header-title">'.__(ucfirst(str_replace('_',' ',$sidebar)).' '.__('Widgets Area')).'</h4>
                        <span class="widget-area-expand"><i class="las la-angle-down"></i></span>
                    </div>
                    <div class="card-body widget-area-body hide">
                        <ul id="'.$sidebar.'" class="sortable available-form-field main-fields sortable_widget_location">
                            '.render_admin_saved_widgets($sidebar, $language).'
                        </ul>
                    </div>
                </div>';
        return $markup;
    }

    public static function render_widgets_by_name_for_admin($args){
        //widget_name
        // Oluşturulan yer



        $instance = new $args["namespace"]($args);
        $before = $args['before'] ?? true;
        $after = $args['after'] ?? true;
        $args['language'] = isset($args['language']) ? $args['language'] : 'en_GB';
        if($instance->enable()){
            return $instance->admin_render(['before' => $before,'after' => $after, 'language'=>$args['language']]);
        }
    }

    public static function render_widgets_by_name_for_frontend($args){
        //widget_name

        $instance = new $args["namespace"]($args);
        if($instance->enable()) {
            return $instance->frontend_render();
        }
    }
}
