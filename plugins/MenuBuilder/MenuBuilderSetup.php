<?php


namespace Plugins\MenuBuilder;


class MenuBuilderSetup extends MenuBuilderBase
{
     public static function Instance(){
        return new self();
    }

    public static function multilang(){
        return true;
    }


    public function  static_pages_list()
    {
        // TODO: Implement static_pages_list() method.
        return [];
    }

    function register_dynamic_menus()
    {

        $menu = [];

        if (tenant()) {
            $menu['product Category'] = [
                'model' => 'Modules\Attributes\Entities\Category',
                'name' => 'category_page_[lang]_name',
                'route' => 'tenant.shop.category.products',
                'route_params' => ['id', 'slug'],
                'title_param' => 'name',
                'query' => 'old_lang',//old_lang|new_lang,
                'support' => 2 //0=all,1=only landlord , 2= only tenant
            ];
        }
        $menu['pages'] = [
            'model' => 'App\Models\Page',
            'name' => 'pages_page_[lang]_name',
            'route' => 'tenant.dynamic.page',
            'route_params' => ['slug'],
            'title_param' => 'title',
            'query' => 'no_lang', //old_lang|new_lang,
            'support' => 0 //0=all,1=only landlord , 2= only tenant
        ];
        $menu['blogs'] = [
            'model' => 'Modules\Blog\Entities\Blog',
            'name' => 'blog_page_[lang]_name',
            'route' => 'tenant.frontend.blog.single',
            'route_params' => ['id', 'slug'],
            'title_param' => 'title',
            'query' => 'no_lang',//old_lang|new_lang,
            'support' => 2 //0=all,1=only landlord , 2= only tenant
        ];

        return $menu;
        // TODO: Implement register_dynamic_menus() method.

    }

}
