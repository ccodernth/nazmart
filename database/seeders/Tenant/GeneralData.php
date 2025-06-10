<?php

namespace Database\Seeders\Tenant;

use App\Helpers\ImageDataSeedingHelper;
use App\Helpers\SanitizeInput;
use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Language;
use App\Models\Menu;
use App\Models\StaticOption;
use App\Models\TopbarInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class GeneralData extends Seeder
{
    public function generateLanguage($data)
    {
        $allLanguages = Language::query()->get();

        $result = [];
        foreach ($allLanguages as $language) {
            $result[$language->slug] = $data;
        }
        return $result;
    }
    public function run()
    {
        $this->insertStaticOptionData();
        $this->seed_topbar_info();
    }

    private function static_option_store($name, $slug)
    {
        $admin = Admin::first();

        $staticOption = new StaticOption();

        $staticOption->option_name = $name;
        $staticOption->option_value = $slug;
        $staticOption->save();
    }
    private function insertStaticOptionData()
    {

        if (session()->get('theme') == 'fruit') {
            $this->static_option_store('site_title', $this->generateLanguage('Fruit'));
            $this->static_option_store('site_tag_line', $this->generateLanguage('Fruit Shop'));
            $this->static_option_store('site_footer_copyright_text', $this->generateLanguage('{copy} {year} Copyright All Right Reserved by Fruit'));
            $this->static_option_store('site_logo', $this->generateLanguage('973'));
            $this->static_option_store('site_white_logo', $this->generateLanguage('973'));
            $this->static_option_store('site_favicon', $this->generateLanguage('496'));

        } else {
            $this->static_option_store('site_title', $this->generateLanguage('Electro'));
            $this->static_option_store('site_tag_line', $this->generateLanguage('Electronics Shop'));
            $this->static_option_store('site_footer_copyright_text', $this->generateLanguage('{copy} {year} Copyright All Right Reserved by Electro'));
            $this->static_option_store('site_logo', $this->generateLanguage('514'));
            $this->static_option_store('site_white_logo', $this->generateLanguage('514'));
            $this->static_option_store('site_favicon', $this->generateLanguage('496'));

        }

        $this->static_option_store('home_one_header_button_text', $this->generateLanguage('Join With Us'));
        $this->static_option_store('language_selector_status', $this->generateLanguage(NULL));
        $this->static_option_store('home_page', $this->generateLanguage('1'));
        $this->static_option_store('global_footer_variant', $this->generateLanguage('01'));
        $this->static_option_store('order_form', $this->generateLanguage('02'));
        $this->static_option_store('dark_mode_for_admin_panel', $this->generateLanguage(NULL));
        $this->static_option_store('maintenance_mode', $this->generateLanguage(NULL));
        $this->static_option_store('backend_preloader', $this->generateLanguage(NULL));
        $this->static_option_store('user_email_verify_status', $this->generateLanguage(NULL));
        $this->static_option_store('guest_order_system_status', $this->generateLanguage(NULL));
        $this->static_option_store('timezone', $this->generateLanguage('Asia/Dhaka'));
        $this->static_option_store('main_color_one_hexfashion', $this->generateLanguage('rgb(255, 128, 93)'));
        $this->static_option_store('main_color_two_hexfashion', $this->generateLanguage('#ff805d'));
        $this->static_option_store('main_color_three_hexfashion', $this->generateLanguage('#599a8d'));
        $this->static_option_store('main_color_four_hexfashion', $this->generateLanguage('#1e88e5'));
        $this->static_option_store('secondary_color_hexfashion', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_hexfashion', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_hexfashion', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_hexfashion', $this->generateLanguage('#FFF6EE'));
        $this->static_option_store('section_bg_3_hexfashion', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_hexfashion', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_hexfashion', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_hexfashion', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_hexfashion', $this->generateLanguage('#333333'));
        $this->static_option_store('body_color_hexfashion', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_hexfashion', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_hexfashion', $this->generateLanguage('#888888'));
        $this->static_option_store('review_color_hexfashion', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_hexfashion', $this->generateLanguage('rgb(255, 246, 238)'));
        $this->static_option_store('new_color_hexfashion', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('main_color_one_furnito', $this->generateLanguage('rgb(255, 128, 93)'));
        $this->static_option_store('main_color_two_furnito', $this->generateLanguage('rgb(255, 128, 93)'));
        $this->static_option_store('main_color_three_furnito', $this->generateLanguage('rgb(89, 154, 141)'));
        $this->static_option_store('main_color_four_furnito', $this->generateLanguage('#1e88e5'));
        $this->static_option_store('secondary_color_furnito', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_furnito', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_furnito', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_furnito', $this->generateLanguage('rgb(255, 246, 238)'));
        $this->static_option_store('section_bg_3_furnito', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_furnito', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_furnito', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_furnito', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_furnito', $this->generateLanguage('#333333'));
        $this->static_option_store('body_color_furnito', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_furnito', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_furnito', $this->generateLanguage('#888888'));
        $this->static_option_store('review_color_furnito', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_furnito', $this->generateLanguage('rgb(255, 246, 238)'));
        $this->static_option_store('new_color_furnito', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('main_color_one_medicom', $this->generateLanguage('rgb(30, 136, 229)'));
        $this->static_option_store('main_color_two_medicom', $this->generateLanguage('rgb(30, 136, 229)'));
        $this->static_option_store('main_color_three_medicom', $this->generateLanguage('rgb(30, 136, 229)'));
        $this->static_option_store('main_color_four_medicom', $this->generateLanguage('#1e88e5'));
        $this->static_option_store('secondary_color_medicom', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_medicom', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_medicom', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_medicom', $this->generateLanguage('rgb(255, 246, 238)'));
        $this->static_option_store('section_bg_3_medicom', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_medicom', $this->generateLanguage('rgb(244, 248, 251)'));
        $this->static_option_store('section_bg_5_medicom', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_medicom', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_medicom', $this->generateLanguage('#333333'));
        $this->static_option_store('body_color_medicom', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_medicom', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_medicom', $this->generateLanguage('#888888'));
        $this->static_option_store('review_color_medicom', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_medicom', $this->generateLanguage('rgb(229, 239, 248)'));
        $this->static_option_store('new_color_medicom', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('body_font_family_hexfashion', $this->generateLanguage('Jost'));
        $this->static_option_store('heading_font_family_hexfashion', $this->generateLanguage('Jost'));
        $this->static_option_store('heading_font_hexfashion', $this->generateLanguage('on'));
        $this->static_option_store('body_font_family_furnito', $this->generateLanguage('Jost'));
        $this->static_option_store('heading_font_family_furnito', $this->generateLanguage('Jost'));
        $this->static_option_store('heading_font_furnito', $this->generateLanguage('on'));
        $this->static_option_store('body_font_family_medicom', $this->generateLanguage('Manrope'));
        $this->static_option_store('heading_font_family_medicom', $this->generateLanguage('Roboto Slab'));
        $this->static_option_store('heading_font_medicom', $this->generateLanguage('on'));
        $this->static_option_store('body_font_variant_hexfashion', $this->generateLanguage('a:8:{i:0;s:5:"0,200";i:1;s:5:"0,300";i:2;s:5:"0,400";i:3;s:5:"0,500";i:4;s:5:"0,600";i:5;s:5:"0,700";i:6;s:5:"0,800";i:7;s:5:"0,900";}'));
        $this->static_option_store('heading_font_variant_hexfashion', $this->generateLanguage("a:16:{i:0;s:5:\"0,200\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,600\";i:5;s:5:\"0,700\";i:6;s:5:\"0,800\";i:7;s:5:\"0,900\";i:8;s:5:\"1,200\";i:9;s:5:\"1,300\";i:10;s:5:\"1,400\";i:11;s:5:\"1,500\";i:12;s:5:\"1,600\";i:13;s:5:\"1,700\";i:14;s:5:\"1,800\";i:15;s:5:\"1,900\";}"));
        $this->static_option_store('body_font_variant_furnito', $this->generateLanguage("a:8:{i:0;s:5:\"0,200\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,600\";i:5;s:5:\"0,700\";i:6;s:5:\"0,800\";i:7;s:5:\"0,900\";}"));
        $this->static_option_store('heading_font_variant_furnito', $this->generateLanguage("a:8:{i:0;s:5:\"0,200\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,600\";i:5;s:5:\"0,700\";i:6;s:5:\"0,800\";i:7;s:5:\"0,900\";}"));
        $this->static_option_store('body_font_variant_medicom', $this->generateLanguage("a:7:{i:0;s:5:\"0,200\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,600\";i:5;s:5:\"0,700\";i:6;s:5:\"0,800\";}"));
        $this->static_option_store('heading_font_variant_medicom', $this->generateLanguage("a:8:{i:0;s:5:\"0,100\";i:1;s:5:\"0,200\";i:2;s:5:\"0,300\";i:3;s:5:\"0,400\";i:4;s:5:\"0,500\";i:5;s:5:\"0,600\";i:6;s:5:\"0,700\";i:7;s:5:\"0,800\";}"));
        $this->static_option_store('category_page_item_show', $this->generateLanguage('9'));
        $this->static_option_store('tag_page_item_show', $this->generateLanguage('9'));
        $this->static_option_store('search_page_item_show', $this->generateLanguage('9'));
        $this->static_option_store('blog_avater_image', $this->generateLanguage('52'));
        $this->static_option_store('pricing_plan', $this->generateLanguage(NULL));
        $this->static_option_store('blog_page', $this->generateLanguage('5'));
        $this->static_option_store('blogs_page_item_show', $this->generateLanguage('9'));
        $this->static_option_store('site_global_currency', $this->generateLanguage('USD'));
        $this->static_option_store('site_global_payment_gateway', $this->generateLanguage(NULL));
        $this->static_option_store('site_usd_to_ngn_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_euro_to_ngn_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_currency_symbol_position', $this->generateLanguage('left'));
        $this->static_option_store('site_default_payment_gateway', $this->generateLanguage('paypal'));
        $this->static_option_store('site__to_idr_exchange_rate', $this->generateLanguage(NULL));
        $this->static_option_store('site__to_inr_exchange_rate', $this->generateLanguage(NULL));
        $this->static_option_store('site__to_ngn_exchange_rate', $this->generateLanguage(NULL));
        $this->static_option_store('site__to_zar_exchange_rate', $this->generateLanguage(NULL));
        $this->static_option_store('site__to_brl_exchange_rate', $this->generateLanguage(NULL));
        $this->static_option_store('shop_page', $this->generateLanguage('4'));
        $this->static_option_store('site_usd_to_idr_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_usd_to_inr_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_usd_to_zar_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_usd_to_brl_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_order_success_page_en_US_title', $this->generateLanguage('sdasd asde asd'));
        $this->static_option_store('site_order_success_page_en_US_description', $this->generateLanguage('as das dasd asd asd'));
        $this->static_option_store('site_order_success_page_ar_title', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_success_page_ar_description', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_cancel_page_en_US_title', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_cancel_page_en_US_subtitle', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_cancel_page_en_US_description', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_cancel_page_ar_title', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_cancel_page_ar_subtitle', $this->generateLanguage(NULL));
        $this->static_option_store('site_order_cancel_page_ar_description', $this->generateLanguage(NULL));
        $this->static_option_store('order_receiving_email', $this->generateLanguage('admin@gmail.com'));
        $this->static_option_store('tenant_site_global_email', $this->generateLanguage('suzon@gmail.com'));
        $this->static_option_store('stock_threshold_amount', $this->generateLanguage('5'));




        $this->static_option_store('stock_warning_message', $this->generateLanguage('Following products stock are running low:'));
        $this->static_option_store('track_order', $this->generateLanguage('8'));
        $this->static_option_store('breadcrumb_bg_hexfashion', $this->generateLanguage('rgb(255, 246, 238)'));
        $this->static_option_store('breadcrumb_bg_furnito', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('breadcrumb_bg_medicom', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('blog_avatar_image', $this->generateLanguage('343'));
        $this->static_option_store('main_color_one_bookpoint', $this->generateLanguage('rgb(17, 134, 104)'));
        $this->static_option_store('main_color_two_bookpoint', $this->generateLanguage('rgb(81, 78, 182)'));
        $this->static_option_store('main_color_three_bookpoint', $this->generateLanguage('#599a8d'));
        $this->static_option_store('main_color_four_bookpoint', $this->generateLanguage('#1e88e5'));
        $this->static_option_store('secondary_color_bookpoint', $this->generateLanguage('rgb(19, 120, 94)'));
        $this->static_option_store('secondary_color_two_bookpoint', $this->generateLanguage('rgb(63, 61, 153)'));
        $this->static_option_store('section_bg_1_bookpoint', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_bookpoint', $this->generateLanguage('#FFF6EE'));
        $this->static_option_store('section_bg_3_bookpoint', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_bookpoint', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_bookpoint', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_bookpoint', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('breadcrumb_bg_bookpoint', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_bookpoint', $this->generateLanguage('rgb(29, 38, 53)'));
        $this->static_option_store('body_color_bookpoint', $this->generateLanguage('rgb(119, 125, 134)'));
        $this->static_option_store('light_color_bookpoint', $this->generateLanguage('rgb(119, 125, 134)'));
        $this->static_option_store('extra_light_color_bookpoint', $this->generateLanguage('#888888'));
        $this->static_option_store('review_color_bookpoint', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_bookpoint', $this->generateLanguage('#333333'));
        $this->static_option_store('new_color_bookpoint', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('body_font_family_bookpoint', $this->generateLanguage('Poppins'));
        $this->static_option_store('heading_font_family_bookpoint', $this->generateLanguage('Poppins'));
        $this->static_option_store('heading_font_bookpoint', $this->generateLanguage('on'));
        $this->static_option_store('body_font_variant_bookpoint', $this->generateLanguage('a:9:{i:0;s:5:"0,100";i:1;s:5:"0,200";i:2;s:5:"0,300";i:3;s:5:"0,400";i:4;s:5:"0,500";i:5;s:5:"0,600";i:6;s:5:"0,700";i:7;s:5:"0,800";i:8;s:5:"0,900";}'));




        $this->static_option_store('heading_font_variant_bookpoint', $this->generateLanguage('a:9:{i:0;s:5:"0,100";i:1;s:5:"0,200";i:2;s:5:"0,300";i:3;s:5:"0,400";i:4;s:5:"0,500";i:5;s:5:"0,600";i:6;s:5:"0,700";i:7;s:5:"0,800";i:8;s:5:"0,900";}'));
        $this->static_option_store('topbar_menu', $this->generateLanguage('3'));
        $this->static_option_store('terms_condition', $this->generateLanguage(NULL));
        $this->static_option_store('privacy_policy', $this->generateLanguage(NULL));
        $this->static_option_store('digital_shop_page', $this->generateLanguage('6'));
        $this->static_option_store('main_color_one_aromatic', $this->generateLanguage('rgb(248, 58, 38)'));
        $this->static_option_store('main_color_two_aromatic', $this->generateLanguage('rgb(255, 186, 0)'));
        $this->static_option_store('main_color_three_aromatic', $this->generateLanguage('rgb(255, 106, 58)'));
        $this->static_option_store('main_color_four_aromatic', $this->generateLanguage('rgb(255, 105, 92)'));
        $this->static_option_store('secondary_color_aromatic', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_aromatic', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_aromatic', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_aromatic', $this->generateLanguage('#FFF6EE'));
        $this->static_option_store('section_bg_3_aromatic', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_aromatic', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_aromatic', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_aromatic', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('breadcrumb_bg_aromatic', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_aromatic', $this->generateLanguage('#333333'));
        $this->static_option_store('body_color_aromatic', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_aromatic', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_aromatic', $this->generateLanguage('rgb(153, 153, 153)'));
        $this->static_option_store('review_color_aromatic', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_aromatic', $this->generateLanguage('rgb(27, 28, 37)'));
        $this->static_option_store('new_color_aromatic', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('body_font_family_aromatic', $this->generateLanguage('Roboto'));
        $this->static_option_store('heading_font_family_aromatic', $this->generateLanguage('Playfair Display'));
        $this->static_option_store('heading_font_aromatic', $this->generateLanguage('on'));
        $this->static_option_store('body_font_variant_aromatic', $this->generateLanguage('a:6:{i:0;s:5:"0,100";i:1;s:5:"0,300";i:2;s:5:"0,400";i:3;s:5:"0,500";i:4;s:5:"0,700";i:5;s:5:"0,900";}'));
        $this->static_option_store('heading_font_variant_aromatic', $this->generateLanguage('a:6:{i:0;s:5:"0,400";i:1;s:5:"0,500";i:2;s:5:"0,600";i:3;s:5:"0,700";i:4;s:5:"0,800";i:5;s:5:"0,900";}'));
        $this->static_option_store('placeholder_image', $this->generateLanguage('293'));
        $this->static_option_store('mysql_database_engine', $this->generateLanguage(NULL));
        $this->static_option_store('title_shape_image', $this->generateLanguage('498'));
        $this->static_option_store('product_title_length', $this->generateLanguage('4'));
        $this->static_option_store('product_description_length', $this->generateLanguage('30'));
        $this->static_option_store('currency_amount_type_status', $this->generateLanguage('on'));
        $this->static_option_store('site_custom_currency_symbol', $this->generateLanguage(NULL));
        $this->static_option_store('site_custom_currency_thousand_separator', $this->generateLanguage(','));
        $this->static_option_store('site_custom_currency_decimal_separator', $this->generateLanguage('.'));
        $this->static_option_store('cash_on_delivery', $this->generateLanguage(NULL));




        //TODO:: Yeni tema oluşturulduğunda eklenecek bölüm burasıyla benzer olmalıdır

        $this->static_option_store('main_color_one_fruit', $this->generateLanguage('rgb(248, 58, 38)'));
        $this->static_option_store('main_color_two_fruit', $this->generateLanguage('rgb(255, 186, 0)'));
        $this->static_option_store('main_color_three_fruit', $this->generateLanguage('rgb(255, 106, 58)'));
        $this->static_option_store('main_color_four_fruit', $this->generateLanguage('rgb(255, 105, 92)'));
        $this->static_option_store('secondary_color_fruit', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_fruit', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_fruit', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_fruit', $this->generateLanguage('#FFF6EE'));
        $this->static_option_store('section_bg_3_fruit', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_fruit', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_fruit', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_fruit', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('breadcrumb_bg_fruit', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_fruit', $this->generateLanguage('#333333'));
        $this->static_option_store('body_color_fruit', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_fruit', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_fruit', $this->generateLanguage('rgb(153, 153, 153)'));
        $this->static_option_store('review_color_fruit', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_fruit', $this->generateLanguage('rgb(27, 28, 37)'));
        $this->static_option_store('new_color_fruit', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('body_font_family_fruit', $this->generateLanguage('Roboto'));
        $this->static_option_store('heading_font_family_fruit', $this->generateLanguage('Playfair Display'));
        $this->static_option_store('heading_font_fruit', $this->generateLanguage('on'));
        $this->static_option_store('body_font_variant_fruit', $this->generateLanguage('a:6:{i:0;s:5:"0,100";i:1;s:5:"0,300";i:2;s:5:"0,400";i:3;s:5:"0,500";i:4;s:5:"0,700";i:5;s:5:"0,900";}'));
        $this->static_option_store('heading_font_variant_fruit', $this->generateLanguage('a:6:{i:0;s:5:"0,400";i:1;s:5:"0,500";i:2;s:5:"0,600";i:3;s:5:"0,700";i:4;s:5:"0,800";i:5;s:5:"0,900";}'));






        $this->static_option_store('site_usd_to_usd_exchange_rate', $this->generateLanguage(''));
        $this->static_option_store('site_disqus_key', $this->generateLanguage(NULL));
        $this->static_option_store('site_google_captcha_v3_secret_key', $this->generateLanguage(NULL));
        $this->static_option_store('site_google_captcha_v3_site_key', $this->generateLanguage(NULL));
        $this->static_option_store('site_third_party_tracking_code', $this->generateLanguage(NULL));
        $this->static_option_store('site_google_analytics', $this->generateLanguage(NULL));
        $this->static_option_store('tawk_api_key', $this->generateLanguage(NULL));
        $this->static_option_store('instagram_access_token', $this->generateLanguage('IGQVJXcWU3UjZADZAU8td0hOdWR0eG96QjRmM09hbVFZAck5QdW0zel9lU2lZAWmZAxYTVvRzY2cjB6aGZAMcVNwbmtxd05EZAFpVdXVrVktwVS1zZAUxIdXVzSTluSGhHVmc1dUdnMkdqOVdOby1BbkdQWW93cgZDZD'));
        $this->static_option_store('background_image_one', $this->generateLanguage('509'));
        $this->static_option_store('background_image_two', $this->generateLanguage('508'));
        $this->static_option_store('background_image_three', $this->generateLanguage('510'));
        $this->static_option_store('background_image_four', $this->generateLanguage('511'));
        $this->static_option_store('background_image_five', $this->generateLanguage('512'));
        $this->static_option_store('main_color_one_casual', $this->generateLanguage('rgb(248, 58, 38)'));
        $this->static_option_store('main_color_two_casual', $this->generateLanguage('rgb(255, 186, 0)'));
        $this->static_option_store('main_color_three_casual', $this->generateLanguage('rgb(255, 106, 58)'));
        $this->static_option_store('main_color_four_casual', $this->generateLanguage('rgb(255, 105, 92)'));
        $this->static_option_store('secondary_color_casual', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_casual', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_casual', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_casual', $this->generateLanguage('#FFF6EE'));
        $this->static_option_store('section_bg_3_casual', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_casual', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_casual', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_casual', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('breadcrumb_bg_casual', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_casual', $this->generateLanguage('rgb(27, 28, 37)'));
        $this->static_option_store('body_color_casual', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_casual', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_casual', $this->generateLanguage('rgb(153, 153, 153)'));
        $this->static_option_store('review_color_casual', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_casual', $this->generateLanguage('#333333'));
        $this->static_option_store('new_color_casual', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('body_font_family_casual', $this->generateLanguage('Roboto'));
        $this->static_option_store('heading_font_family_casual', $this->generateLanguage('Rubik'));
        $this->static_option_store('heading_font_casual', $this->generateLanguage('on'));
        $this->static_option_store('body_font_variant_casual', $this->generateLanguage('a:6:{i:0;s:5:"0,100";i:1;s:5:"0,300";i:2;s:5:"0,400";i:3;s:5:"0,500";i:4;s:5:"0,700";i:5;s:5:"0,900";}'));
        $this->static_option_store('heading_font_variant_casual', $this->generateLanguage('a:5:{i:0;s:5:"0,300";i:1;s:5:"0,400";i:2;s:5:"0,500";i:3;s:5:"0,700";i:4;s:5:"0,900";}'));
        $this->static_option_store('main_color_one_electro', $this->generateLanguage('#ff805d'));
        $this->static_option_store('main_color_two_electro', $this->generateLanguage('#ff805d'));
        $this->static_option_store('main_color_three_electro', $this->generateLanguage('#ff805d'));
        $this->static_option_store('main_color_four_electro', $this->generateLanguage('#ff805d'));
        $this->static_option_store('secondary_color_electro', $this->generateLanguage('#F7A3A8'));
        $this->static_option_store('secondary_color_two_electro', $this->generateLanguage('#ffdcd2'));
        $this->static_option_store('section_bg_1_electro', $this->generateLanguage('#FFFBFB'));
        $this->static_option_store('section_bg_2_electro', $this->generateLanguage('#FFF6EE'));
        $this->static_option_store('section_bg_3_electro', $this->generateLanguage('#F4F8FB'));
        $this->static_option_store('section_bg_4_electro', $this->generateLanguage('#F2F3FB'));
        $this->static_option_store('section_bg_5_electro', $this->generateLanguage('#F9F5F2'));
        $this->static_option_store('section_bg_6_electro', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('breadcrumb_bg_electro', $this->generateLanguage('#E5EFF8'));
        $this->static_option_store('heading_color_electro', $this->generateLanguage('#333333'));
        $this->static_option_store('body_color_electro', $this->generateLanguage('#666666'));
        $this->static_option_store('light_color_electro', $this->generateLanguage('#666666'));
        $this->static_option_store('extra_light_color_electro', $this->generateLanguage('#888888'));
        $this->static_option_store('review_color_electro', $this->generateLanguage('#FABE50'));
        $this->static_option_store('feedback_bg_item_electro', $this->generateLanguage('#333333'));
        $this->static_option_store('new_color_electro', $this->generateLanguage('#5AB27E'));
        $this->static_option_store('body_font_family_electro', $this->generateLanguage('Roboto'));
        $this->static_option_store('heading_font_family_electro', $this->generateLanguage('Rubik'));
        $this->static_option_store('heading_font_electro', $this->generateLanguage(NULL));
        $this->static_option_store('body_font_variant_electro', $this->generateLanguage('a:6:{i:0;s:5:"0,100";i:1;s:5:"0,300";i:2;s:5:"0,400";i:3;s:5:"0,500";i:4;s:5:"0,700";i:5;s:5:"0,900";}'));
        $this->static_option_store('heading_font_variant_electro', $this->generateLanguage('a:5:{i:0;s:5:"0,300";i:1;s:5:"0,400";i:2;s:5:"0,500";i:3;s:5:"0,700";i:4;s:5:"0,900";}'));
        $this->static_option_store('contact_info_show_hide', $this->generateLanguage('on'));
        $this->static_option_store('social_info_show_hide', $this->generateLanguage('on'));
        $this->static_option_store('topbar_show_hide', $this->generateLanguage('on'));
        $this->static_option_store('topbar_menu_show_hide', $this->generateLanguage('on'));
        $this->static_option_store('topbar_phone', $this->generateLanguage('+1 (195) 565-6342'));
        $this->static_option_store('topbar_email', $this->generateLanguage('nitati@mailinator.com'));
        $this->static_option_store('woocommerce_default_unit', $this->generateLanguage('6'));
        $this->static_option_store('woocommerce_default_uom', $this->generateLanguage('1'));
    }

    private function seed_topbar_info()
    {
        DB::statement("INSERT INTO `topbar_infos` (`id`, `icon`, `url`, `created_at`, `updated_at`) VALUES
        (1, 'lab la-twitter', '#', '2022-08-11 01:14:21', '2022-08-11 01:14:21'),
        (2, 'lab la-pinterest-p', '#', '2022-08-11 01:14:21', '2022-08-11 01:14:21'),
        (3, 'las la-user', '#', '2022-08-11 01:14:21', '2022-08-11 01:14:21'),
        (4, 'lab la-facebook-f', '#', '2022-08-11 01:14:21', '2022-08-11 01:14:21')");
    }
}
