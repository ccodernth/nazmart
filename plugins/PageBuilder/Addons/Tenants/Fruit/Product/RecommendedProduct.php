<?php

namespace Plugins\PageBuilder\Addons\Tenants\Fruit\Product;

use App\Helpers\SanitizeInput;
use Modules\Attributes\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Plugins\PageBuilder\Fields\Image;
use Plugins\PageBuilder\Fields\NiceSelect;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\PageBuilderBase;

class RecommendedProduct extends PageBuilderBase
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
            'label' => __('Section Title'),
            'value' => $widget_saved_values['title'] ?? null,
        ]);

        /*

        $output .= Text::get([
            'name' => 'subtitle',
            'label' => __('Section Subtitle'),
            'value' => $widget_saved_values['subtitle'] ?? null,
        ]);

        $products = Product::where(['status_id' => 1])->get()->mapWithKeys(function ($item){
            return [$item->id => $item->name];
        })->toArray();

        $output .= NiceSelect::get([
            'multiple' => true,
            'name' => 'products',
            'label' => __('Select Products'),
            'options' => $products,
            'value' => $widget_saved_values['products'] ?? null,
            'info' => __('you can select your desired products or leave it empty')
        ]);

        $output .= Number::get([
            'name' => 'item_show',
            'label' => __('Product Show'),
            'value' => $widget_saved_values['item_show'] ?? null,
            'info' => 'How many products will be shown'
        ]);

        $output .= Select::get([
            'name' => 'item_order',
            'label' => __('Product Order'),
            'options' => [
                'desc' => __('Descending'),
                'asc' => __('Ascending')
            ],
            'value' => $widget_saved_values['item_order'] ?? null,
            'info' => 'Product order, descending or ascending'
        ]);
        */

        $output .= Text::get([
            'name' => 'image_1_url',
            'label' => __('Image 1 URL'),
            'value' => $widget_saved_values['image_1_url'] ?? null,
            'info' => __('You can enter a URL for the image or leave it empty for file upload')
        ]);

        $output .= Image::get([
            'name' => 'image_1',
            'label' => __('Image 1'),
            'value' => $widget_saved_values['image_1'] ?? null,
        ]);


        $products_1 = Product::where(['status_id' => 1])->get()->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();

        $output .= NiceSelect::get([
            'multiple' => true,
            'name' => 'products_1',
            'label' => __('Select Products for Section 1'),
            'options' => $products_1,
            'value' => $widget_saved_values['products_1'] ?? null,
            'info' => __('You can select your desired products or leave it empty')
        ]);

        $output .= Number::get([
            'name' => 'item_show_1',
            'label' => __('Product Show for Section 1'),
            'value' => $widget_saved_values['item_show_1'] ?? null,
            'info' => 'How many products will be shown in section 1'
        ]);

        $output .= Select::get([
            'name' => 'item_order_1',
            'label' => __('Product Order for Section 1'),
            'options' => [
                'desc' => __('Descending'),
                'asc' => __('Ascending')
            ],
            'value' => $widget_saved_values['item_order_1'] ?? null,
            'info' => 'Product order for section 1, descending or ascending'
        ]);




        $output .= Text::get([
            'name' => 'image_2_url',
            'label' => __('Image 2 URL'),
            'value' => $widget_saved_values['image_2_url'] ?? null,
            'info' => __('You can enter a URL for the image or leave it empty for file upload')
        ]);

        $output .= Image::get([
            'name' => 'image_2',
            'label' => __('Image 2'),
            'value' => $widget_saved_values['image_2'] ?? null,
        ]);

        $products_2 = Product::where(['status_id' => 1])->get()->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();

        $output .= NiceSelect::get([
            'multiple' => true,
            'name' => 'products_2',
            'label' => __('Select Products for Section 2'),
            'options' => $products_2,
            'value' => $widget_saved_values['products_2'] ?? null,
            'info' => __('You can select your desired products or leave it empty')
        ]);

        $output .= Number::get([
            'name' => 'item_show_2',
            'label' => __('Product Show for Section 2'),
            'value' => $widget_saved_values['item_show_2'] ?? null,
            'info' => 'How many products will be shown in section 2'
        ]);

        $output .= Select::get([
            'name' => 'item_order_2',
            'label' => __('Product Order for Section 2'),
            'options' => [
                'desc' => __('Descending'),
                'asc' => __('Ascending')
            ],
            'value' => $widget_saved_values['item_order_2'] ?? null,
            'info' => 'Product order for section 2, descending or ascending'
        ]);


        // add padding option
        $output .= $this->padding_fields($widget_saved_values);
        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        /*$product_id = $this->setting_item('products');
        $title = SanitizeInput::esc_html($this->setting_item('title') ?? '');
        $subtitle = SanitizeInput::esc_html($this->setting_item('subtitle') ?? '');
        $item_show = SanitizeInput::esc_html($this->setting_item('item_show') ?? '');
        $item_order = SanitizeInput::esc_html($this->setting_item('item_order') ?? 'asc');

        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $products = Product::with('badge', 'campaign_product', 'inventory', 'inventoryDetail')
            ->where('status_id', 1)
            ->whereIn('id', $product_id ?? [])
            ->withSum('taxOptions', 'rate')
            ->orderBy('created_at', $item_order ?? 'desc')
            ->take($item_show ?? 4)->get();

        $data = [
            'padding_top'=> $padding_top,
            'padding_bottom'=> $padding_bottom,
            'title' => $title,
            'subtitle' => $subtitle,
            'products'=> $products,
        ];*/


      /*  $product_id_1 = $this->setting_item('products_1');
        $title_1 = SanitizeInput::esc_html($this->setting_item('title_1') ?? '');
        $subtitle_1 = SanitizeInput::esc_html($this->setting_item('subtitle_1') ?? '');
        $item_show_1 = SanitizeInput::esc_html($this->setting_item('item_show_1') ?? '');
        $item_order_1 = SanitizeInput::esc_html($this->setting_item('item_order_1') ?? 'asc');


        $products_1 = Product::with('badge', 'campaign_product', 'inventory', 'inventoryDetail')
            ->where('status_id', 1)
            ->whereIn('id', $product_id_1 ?? [])
            ->withSum('taxOptions', 'rate')
            ->orderBy('created_at', $item_order_1 ?? 'desc')
            ->take($item_show_1 ?? 4)->get();

        $product_id_2 = $this->setting_item('products_2');
        $title_2 = SanitizeInput::esc_html($this->setting_item('title_2') ?? '');
        $subtitle_2 = SanitizeInput::esc_html($this->setting_item('subtitle_2') ?? '');
        $item_show_2 = SanitizeInput::esc_html($this->setting_item('item_show_2') ?? '');
        $item_order_2 = SanitizeInput::esc_html($this->setting_item('item_order_2') ?? 'asc');

        $products_2 = Product::with('badge', 'campaign_product', 'inventory', 'inventoryDetail')
            ->where('status_id', 1)
            ->whereIn('id', $product_id_2 ?? [])
            ->withSum('taxOptions', 'rate')
            ->orderBy('created_at', $item_order_2 ?? 'desc')
            ->take($item_show_2 ?? 4)->get();


        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $data = [
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
            'section_1' => [
                'title' => $title_1,
                'subtitle' => $subtitle_1,
                'products' => $products_1,
            ],
            'section_2' => [
                'title' => $title_2,
                'subtitle' => $subtitle_2,
                'products' => $products_2,
            ]
        ];*/

        $title = SanitizeInput::esc_html($this->setting_item('title') ?? '');

        $product_id_1 = $this->setting_item('products_1');
        $item_show_1 = SanitizeInput::esc_html($this->setting_item('item_show_1') ?? '');
        $item_order_1 = SanitizeInput::esc_html($this->setting_item('item_order_1') ?? 'asc');

        $image_1_url = SanitizeInput::esc_html($this-> setting_item('image_1_url') ?? '');
        $image_1 = $this->setting_item('image_1') ?? '';


        $products_1 = Product::with('badge', 'campaign_product', 'inventory', 'inventoryDetail')
            ->where('status_id', 1)
            ->whereIn('id', $product_id_1 ?? [])
            ->withSum('taxOptions', 'rate')
            ->orderBy('created_at', $item_order_1 ?? 'desc')
            ->take($item_show_1 ?? 4)->get();

        $product_id_2 = $this->setting_item('products_2');
        $item_show_2 = SanitizeInput::esc_html($this->setting_item('item_show_2') ?? '');
        $item_order_2 = SanitizeInput::esc_html($this->setting_item('item_order_2') ?? 'asc');

        $image_2_url = SanitizeInput::esc_html($this->setting_item('image_2_url') ?? '');
        $image_2 = $this->setting_item('image_2') ?? '';


        $products_2 = Product::with('badge', 'campaign_product', 'inventory', 'inventoryDetail')
            ->where('status_id', 1)
            ->whereIn('id', $product_id_2 ?? [])
            ->withSum('taxOptions', 'rate')
            ->orderBy('created_at', $item_order_2 ?? 'desc')
            ->take($item_show_2 ?? 4)->get();


        $padding_top = SanitizeInput::esc_html($this->setting_item('padding_top'));
        $padding_bottom = SanitizeInput::esc_html($this->setting_item('padding_bottom'));

        $data = [
            'title' => $title,
            'padding_top' => $padding_top,
            'padding_bottom' => $padding_bottom,
            'image_1_url' => $image_1_url,
            'image_1' => $image_1,
            'image_2_url' => $image_2_url,
            'image_2' => $image_2,

            'section_1' => [
                'products' => $products_1,
                'item_show' => $item_show_1,
                'item_order' => $item_order_1,
            ],
            'section_2' => [
                'products' => $products_2,
                'item_show' => $item_show_2,
                'item_order' => $item_order_2,
            ]
        ];

        return self::renderView('tenant.fruit.product.recommended_product',$data);
    }

    public function addon_title()
    {
        return __('Theme Fruit: Recommended Products');
    }
}
