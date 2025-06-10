<?php

namespace Database\Seeders\Tenant;

use App\Helpers\ImageDataSeedingHelper;
use App\Helpers\SanitizeInput;
use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PlanFeature;
use App\Models\PricePlan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\DigitalProduct\Entities\AdditionalCustomField;
use Modules\DigitalProduct\Entities\DigitalCategories;
use Modules\DigitalProduct\Entities\DigitalChildCategories;
use Modules\DigitalProduct\Entities\DigitalLanguage;
use Modules\DigitalProduct\Entities\DigitalProduct;
use Modules\DigitalProduct\Entities\DigitalProductRefundPolicies;
use Modules\DigitalProduct\Entities\DigitalProductTags;
use Modules\DigitalProduct\Entities\DigitalProductType;
use Modules\DigitalProduct\Entities\DigitalSubCategories;
use Modules\DigitalProduct\Http\Services\DigitalType;

class DigitalProductSeed extends Seeder
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
        $this->seedProductType();
        $this->seedCategories();
        $this->seedSubCategories();
        $this->seedChildCategories();
        $this->seedLanguage();
        $this->seedAuthor();
        $this->seedTax();
        $this->seedProduct();
        $this->seedProductAdditionalFiled();
        $this->seedProductCustomAdditionalFiled();
        $this->seedProductCategory();
        $this->seedProductSubCategories();
        $this->seedProductChildCategories();
        $this->seedProductTags();
        //  $this->seedProductGalleries();
        $this->seedProductReturnPolicies();
    }

    private function seedProductType()
    {
        $types = [
            [
                'id' => 1,
                'name' => json_encode($this->generateLanguage('Image')),
                'slug' => json_encode($this->generateLanguage('image')),
                'extensions' => json_encode(["jpeg", "jpg", "png"]),
                'product_type' => 'd_image',
                'image_id' => NULL,
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => json_encode($this->generateLanguage('Video')),
                'slug' => json_encode($this->generateLanguage('video')),
                'extensions' => json_encode(["mp4", "avi", "mov"]),
                'product_type' => 'd_video',
                'image_id' => NULL,
                'status' => 1,
            ],
            [
                'id' => 3,
                'name' => json_encode($this->generateLanguage('Audio')),
                'slug' => json_encode($this->generateLanguage('audio')),
                'extensions' => json_encode(["m4a", "mp3", "wav"]),
                'product_type' => 'd_audio',
                'image_id' => NULL,
                'status' => 1,
            ],
            [
                'id' => 4,
                'name' => json_encode($this->generateLanguage('Software')),
                'slug' => json_encode($this->generateLanguage('software')),
                'extensions' => json_encode(["zip"]),
                'product_type' => 'd_software',
                'image_id' => NULL,
                'status' => 1,
            ]
        ];

        DigitalProductType::insert($types);
    }

    private function seedLanguage()
    {
        $this->digital_language_store($this->generateLanguage('Bengali'), $this->generateLanguage('bengali'));
        $this->digital_language_store($this->generateLanguage('English'), $this->generateLanguage('english'));
        $this->digital_language_store($this->generateLanguage('French'), $this->generateLanguage('french'));
        $this->digital_language_store($this->generateLanguage('German'), $this->generateLanguage('german'));
        $this->digital_language_store($this->generateLanguage('Arabic'), $this->generateLanguage('arabic'));
        $this->digital_language_store($this->generateLanguage('Hindi'), $this->generateLanguage('hindi'));
    }

    private function seedAuthor()
    {
        DB::statement("INSERT INTO `digital_authors` (`id`, `name`, `slug`, `status`, `image_id`, `created_at`, `updated_at`) VALUES
        (1,'Mazharul Islam Suzon','mazharul-islam-suzon',1,485,'2023-04-15 19:18:52','2023-04-16 21:30:12'),
        (2,'John Abraham','john-abraham',1,484,'2023-04-16 21:27:59','2023-04-16 21:30:06'),
        (3,'Runa Mack','runa-mack',1,486,'2023-04-16 21:28:22','2023-04-16 21:29:59'),
        (4,'Hoo Su Wang','hoo-su-wang',1,487,'2023-04-16 21:39:57','2023-04-16 21:39:57'),
        (5,'Yasin Abrar','yasin-abrar',1,485,'2023-04-16 21:40:53','2023-04-16 21:40:53')");
    }

    private function seedCategories()
    {
        $this->category_store($this->generateLanguage('Art'), $this->generateLanguage('art'));
        $this->category_store($this->generateLanguage('Course'), $this->generateLanguage('course'));
        $this->category_store($this->generateLanguage('Music'), $this->generateLanguage('music'));
        $this->category_store($this->generateLanguage('E-Book'), $this->generateLanguage('e-book'));
        $this->category_store($this->generateLanguage('Web Series'), $this->generateLanguage('web-series'));
        $this->category_store($this->generateLanguage('Software'), $this->generateLanguage('software'));
    }

    private function seedSubCategories()
    {
        $this->sub_category_store($this->generateLanguage('PHP Course'), $this->generateLanguage('php-course'), 1);
    }

    private function seedChildCategories()
    {
        $this->child_category_store('OOP PHP Course', 'oop-php-course');
    }

    private function seedTax()
    {
        DB::statement("INSERT INTO `digital_product_taxes` (`id`, `name`, `tax_percentage`, `status`, `created_at`, `updated_at`) VALUES
	    (1,'EU',10,1,'2023-04-15 19:19:04','2023-04-15 19:19:04')");
    }

    private function seedProduct()
    {

        $this->product_store('Malik Jacobs', 'malik-jacobs', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Jeanette Stevens', 'odit-totam-nostrud-e', 'Quos eius est conse', 'Optio, officia fugia.');
        $this->product_store('Nell Charles', 'odit-totam-nostrud-e-1', 'Quos eius est conse', 'Optio, officia fugia.');
        $this->product_store('Malik Jacobs', 'malik-jacobs-1', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Kristen Grimes', 'laboris-vero-quis-do', 'Incidunt assumenda', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Mariam Luna', 'malik-jacobs-3', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Mariam Luna', 'malik-jacobs-4', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Malik Jacobs', 'malik-jacobs-2', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Malik Jacobs', 'malik-jacobs-5', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Nell Charles', 'odit-totam-nostrud-e-2', 'Quos eius est conse', 'Optio, officia fugia.');
        $this->product_store('Malik Jacobs', 'malik-jacobs-6', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Nell Charles', 'odit-totam-nostrud-e-3', 'Quos eius est conse', 'Optio, officia fugia.');
        $this->product_store('Malik Jacobs', 'malik-jacobs-7', 'Sunt magna ut adipis', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Kristen Grimes', 'laboris-vero-quis-do-1', 'Incidunt assumenda', 'Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis . Nemo qui blanditiis');
        $this->product_store('Lynn Cooper', 'pariatur-excepteur', 'Ullam ea possimus e', 'Qui facilis nisi qui.');
        $this->product_store('Hayley Delaney', 'facere-sed-sunt-amet', 'Veritatis cillum rer', 'Iste vero deserunt i.');
    }

    private function seedProductAdditionalFiled()
    {
        DB::statement("INSERT INTO `additional_fields` (`id`, `product_id`, `badge_id`, `pages`, `language`, `formats`, `words`, `tool_used`, `database_used`, `compatible_browsers`, `compatible_os`, `high_resolution`, `author_id`, `created_at`, `updated_at`) VALUES
        (19,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
        (36,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),
        (41,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),
        (45,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
        (46,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),
        (54,6,NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
        (56,7,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),
        (58,8,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
        (63,9,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'yes',3,NULL,NULL),
        (69,10,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),
        (72,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
        (73,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
        (74,13,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,NULL,NULL),
        (75,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,NULL,NULL),
        (76,15,NULL,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
        (77,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,NULL,NULL)");
    }

    private function seedProductCustomAdditionalFiled()
    {

        $this->additional_custom_field_store('name', 'suzon');
        $this->additional_custom_field_store('publisher', 'Apex');
        $this->additional_custom_field_store('IBM', '159124');
        $this->additional_custom_field_store('TIN', '65756');
        $this->additional_custom_field_store('publisher', 'Apex');
        $this->additional_custom_field_store('IBM', '65756');
        $this->additional_custom_field_store('CB Name', 'Mania');
        $this->additional_custom_field_store('new', '65756');
        $this->additional_custom_field_store('zxc', '123');
        $this->additional_custom_field_store('new', '65756');
    }

    private array $items = [19, 36, 41, 45, 46, 54, 56, 58, 63, 69, 72, 73, 74, 75, 76, 77];

    private function get_random()
    {
        $items = $this->items;
        $selectedItem = $items[array_rand($items)];

// Seçilen öğeyi ekrana yazdır
        echo "Seçilen öğe: $selectedItem\n";

// Seçilen öğeyi diziden sil
        $index = array_search($selectedItem, $items);
        if ($index !== false) {
            unset($items[$index]);
        }

// Diziyi yeniden indeksle
        $this->items = array_values($items);

        return $selectedItem;
    }

    private function seedProductCategory()
    {
        DB::statement("INSERT INTO `digital_product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
        (1,1,1,'2023-04-15 19:31:21','2023-04-15 19:31:21'),
        (2,2,2,'2023-04-15 19:34:36','2023-04-15 19:34:36'),
        (4,4,2,'2023-04-15 22:48:28','2023-04-15 22:48:28'),
        (9,5,1,'2023-04-15 22:53:03','2023-04-15 22:53:03'),
        (10,6,4,'2023-04-15 22:53:53','2023-04-15 22:54:10'),
        (11,1,1,'2023-04-15 22:54:19','2023-04-18 16:36:14'),
        (12,1,1,'2023-04-17 00:56:22','2023-04-18 16:34:11'),
        (13,1,1,'2023-04-17 00:56:24','2023-04-17 00:56:24'),
        (14,2,1,'2023-04-17 00:56:27','2023-04-17 00:56:27'),
        (15,2,2,'2023-04-17 00:56:29','2023-04-17 00:56:29'),
        (16,4,1,'2023-04-17 01:17:51','2023-04-17 01:17:51'),
        (17,5,2,'2023-04-17 01:17:53','2023-04-17 01:17:53'),
        (18,3,1,'2023-04-17 01:17:56','2023-04-17 01:17:56'),
        (19,6,4,'2023-04-17 01:17:58','2023-04-17 01:17:58'),
        (20,6,1,'2023-04-17 02:44:30','2023-04-17 02:44:30'),
        (21,6,1,'2023-04-17 12:34:57','2023-04-17 12:34:57')");
    }

    private function seedProductSubCategories()
    {
        DB::statement("INSERT INTO `digital_product_sub_categories` (`id`, `product_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
        (1,2,1,'2023-04-15 19:34:36','2023-04-15 19:34:36'),
        (3,4,1,'2023-04-15 22:48:28','2023-04-15 22:48:28'),
        (4,14,1,'2023-04-17 00:56:29','2023-04-17 00:56:29'),
        (5,2,1,'2023-04-17 01:17:53','2023-04-17 01:17:53')");
    }

    private function seedProductChildCategories()
    {
        DB::statement("INSERT INTO `digital_product_child_categories` (`id`, `product_id`, `child_category_id`, `created_at`, `updated_at`) VALUES
	    (1,6,1,NULL,NULL)");
    }

    private function seedProductTags()
    {
        $this->product_tag_store('asd', 1);
        $this->product_tag_store('asd', 2);
        $this->product_tag_store('asd', 3);
        $this->product_tag_store('asd', 4);
        $this->product_tag_store('asd', 5);
        $this->product_tag_store('xcv', 6);
        $this->product_tag_store('asd', 7);
        $this->product_tag_store('asd', 8);
        $this->product_tag_store('xcv', 9);
        $this->product_tag_store('xcv', 10);
        $this->product_tag_store('asd', 11);
        $this->product_tag_store('xcv', 12);
        $this->product_tag_store('cxvb', 13);
        $this->product_tag_store('cxvb', 14);
        $this->product_tag_store('cxvb', 15);
    }

    private function seedProductGalleries()
    {

    }

    private function seedProductReturnPolicies()
    {
        $this->refund_policies_store(1, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(2, 'Ducimus, id fugiat e.');
        $this->refund_policies_store(3, 'Ducimus, id fugiat e.');
        $this->refund_policies_store(4, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(5, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(6, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(7, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(8, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(9, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(10, 'Ducimus, id fugiat e.');
        $this->refund_policies_store(11, 'Culpa, maiores dolor.');
        $this->refund_policies_store(12, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(13, 'Ducimus, id fugiat e.');
        $this->refund_policies_store(14, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(15, 'Praesentium dolor ad. Praesentium dolor ad. Praesentium dolor ad.');
        $this->refund_policies_store(16, 'Explicabo. Sed aut o.');
    }

    private function digital_language_store($name, $slug)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalLanguage();

        $digitalLanguage->name = $name;
        $digitalLanguage->slug = $slug;
        $digitalLanguage->status = 1;

        $digitalLanguage->save();
    }

    private function category_store($name, $slug)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalCategories();

        $digitalLanguage->name = $name;
        $digitalLanguage->slug = $slug;
        $digitalLanguage->status = 1;
        $digitalLanguage->save();
    }

    private function sub_category_store($name, $slug, $cat_id)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalSubCategories();

        $digitalLanguage->name = $name;
        $digitalLanguage->slug = $slug;
        $digitalLanguage->category_id = $cat_id;
        $digitalLanguage->status = 1;
        $digitalLanguage->save();
    }

    private function child_category_store($name, $slug)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalChildCategories();

        $digitalLanguage->name = SanitizeInput::esc_html($name);
        $digitalLanguage->slug = SanitizeInput::esc_html($slug);
        $digitalLanguage->category_id = 1;
        $digitalLanguage->sub_category_id = 1;
        $digitalLanguage->status = 1;
        $digitalLanguage->save();
    }

    private function product_store($name, $slug, $summary, $description)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalProduct();

        $digitalLanguage->name = $this->generateLanguage($name);
        $digitalLanguage->slug = $this->generateLanguage($slug);
        $digitalLanguage->description = $this->generateLanguage($description);
        $digitalLanguage->summary = $this->generateLanguage($summary);
        $digitalLanguage->file = $summary;
        $digitalLanguage->regular_price = 15;
        $digitalLanguage->image_id = 375;

        $digitalLanguage->save();
    }

    private function additional_custom_field_store($name, $slug)
    {
        $admin = Admin::first();

        $digitalLanguage = new AdditionalCustomField();

        $digitalLanguage->option_name = $this->generateLanguage($name);
        $digitalLanguage->option_value = $this->generateLanguage($slug);
        $digitalLanguage->additional_field_id = $this->get_random();
        $digitalLanguage->save();
    }

    private function product_tag_store($name, $product_id)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalProductTags();

        $digitalLanguage->tag_name = $this->generateLanguage($name);
        $digitalLanguage->product_id = $product_id;

        $digitalLanguage->save();
    }

    private function refund_policies_store($product_id, $refund_description)
    {
        $admin = Admin::first();

        $digitalLanguage = new DigitalProductRefundPolicies();

        $digitalLanguage->refund_description = $this->generateLanguage($refund_description);
        $digitalLanguage->product_id = $product_id;

        $digitalLanguage->save();
    }
}
