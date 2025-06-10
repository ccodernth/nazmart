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
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Entities\ChildCategory;
use Modules\Attributes\Entities\Color;
use Modules\Attributes\Entities\DeliveryOption;
use Modules\Attributes\Entities\Size;
use Modules\Attributes\Entities\SubCategory;
use Modules\Attributes\Entities\Tag;
use Modules\Attributes\Entities\Unit;
use Modules\Badge\Entities\Badge;
use Modules\Campaign\Entities\Campaign;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductShippingReturnPolicy;
use Modules\Product\Entities\ProductTag;

class ProductSeed extends Seeder
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
        if (!Schema::hasTable('shipping_methods')) {
            Schema::create('shipping_methods', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('zone_id')->nullable(); // could be zone independent, so default = null
                $table->boolean('is_default')->default(false);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('shipping_method_options')) {
            Schema::create('shipping_method_options', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->unsignedBigInteger('shipping_method_id');
                $table->boolean('status')->default(true);
                $table->boolean('tax_status')->default(true);
                $table->string('setting_preset')->nullable();
                $table->float('cost')->default(0);
                $table->float('minimum_order_amount')->nullable();
                $table->string('coupon')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('zones')) {
            Schema::create('zones', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('zone_regions')) {
            Schema::create('zone_regions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('zone_id');
                $table->longText('country')->nullable();
                $table->longText('state')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('product_coupons')) {
            Schema::create('product_coupons', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('code')->unique();
                $table->string('discount')->nullable();
                $table->string('discount_type')->nullable();
                $table->string('discount_on')->nullable();
                $table->longText('discount_on_details')->nullable();
                $table->date('expire_date')->nullable();
                $table->string('status')->default('draft');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('refund_products')) {
            Schema::create('refund_products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('product_id');
                $table->boolean('status')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('refund_chat')) {
            Schema::create('refund_chat', function (Blueprint $table) {
                $table->id();
                $table->text('title')->nullable();
                $table->text('via')->nullable();
                $table->string('operating_system')->nullable();
                $table->string('user_agent')->nullable();
                $table->longText('description')->nullable();
                $table->text('subject')->nullable();
                $table->string('status')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('admin_id')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('refund_messages')) {
            Schema::create('refund_messages', function (Blueprint $table) {
                $table->id();
                $table->longText('message')->nullable();
                $table->string('notify')->nullable();
                $table->string('attachment')->nullable();
                $table->string('type')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('refund_chat_id')->nullable();
                $table->timestamps();
            });
        }

        $this->seedCategories();
        $this->seedSubCategories();
        $this->seedChildCategories();
        $this->seedColors();
        $this->seedSize();
        $this->seedTags();
        $this->seedUnit();
        $this->seedCountries();
        $this->seedStates();
        $this->seedDeliveryOption();
        $this->seedBadge();

        $this->seedProduct();
        $this->seedProductCategory();
        $this->seedProductSubCategories();
        $this->seedProductChildCategories();
        $this->seedProductTags();
        $this->seedProductGalleries();
        $this->seedProductInventories();
        $this->seedProductInventoryDetails();
        $this->seedProductUOM();
        $this->seedProductCreatedBy();
        $this->seedProductDeliveryOption();
        $this->seedProductReturnPolicies();

        if (!Schema::hasTable('campaigns')) {
            Schema::create('campaigns', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->longText('subtitle')->nullable();
                $table->bigInteger('image')->nullable();
                $table->timestamp('start_date')->nullable();
                $table->timestamp('end_date')->nullable();
                $table->string('status')->nullable();
                $table->unsignedInteger('admin_id')->nullable();
                $table->unsignedInteger('vendor_id')->nullable();
                $table->string('type')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('campaign_products')) {
            Schema::create('campaign_products', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('product_id');
                $table->bigInteger('campaign_id')->nullable();
                $table->decimal('campaign_price')->nullable();
                $table->integer('units_for_sale')->nullable();
                $table->timestamp('start_date')->nullable();
                $table->timestamp('end_date')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('campaign_sold_products')) {
            Schema::create('campaign_sold_products', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('product_id')->nullable();
                $table->integer('sold_count')->nullable();
                $table->double('total_amount')->nullable();
                $table->timestamps();
            });
        }

        $this->seedCampaign();
        $this->seedCampaignProducts();
    }

    private function seedCategories()
    {

        if (session()->get('theme') == 'casual') {


            Category::insert([
                [
                    'id' => 6,
                    'name' => json_encode($this->generateLanguage('Clothing')),
                    'slug' => json_encode($this->generateLanguage('clothing')),
                    'image_id' => 517,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:29:38',
                    'updated_at' => '2022-11-16 09:29:38',
                    'deleted_at' => null,
                ],
                [
                    'id' => 7,
                    'name' => json_encode($this->generateLanguage('Beauty')),
                    'slug' => json_encode($this->generateLanguage('beauty')),
                    'image_id' => 518,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:30:00',
                    'updated_at' => '2022-11-16 09:30:00',
                    'deleted_at' => null,
                ],
                [
                    'id' => 8,
                    'name' => json_encode($this->generateLanguage('Shoes')),
                    'slug' => json_encode($this->generateLanguage('shoes')),
                    'image_id' => 523,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:30:19',
                    'updated_at' => '2022-11-16 09:30:19',
                    'deleted_at' => null,
                ],
                [
                    'id' => 9,
                    'name' => json_encode($this->generateLanguage('Bag & Laggage')),
                    'slug' => json_encode($this->generateLanguage('bag-laggage')),
                    'image_id' => 521,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:30:47',
                    'updated_at' => '2022-11-16 09:30:47',
                    'deleted_at' => null,
                ],
                [
                    'id' => 10,
                    'name' => json_encode($this->generateLanguage('Man')),
                    'slug' => json_encode($this->generateLanguage('man')),
                    'image_id' => 521,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:31:07',
                    'updated_at' => '2022-11-16 09:31:07',
                    'deleted_at' => null,
                ],
                [
                    'id' => 11,
                    'name' => json_encode($this->generateLanguage('Woman')),
                    'slug' => json_encode($this->generateLanguage('woman')),
                    'image_id' => 519,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:31:18',
                    'updated_at' => '2022-11-16 09:31:18',
                    'deleted_at' => null,
                ],
                [
                    'id' => 12,
                    'name' => json_encode($this->generateLanguage('Baby')),
                    'slug' => json_encode($this->generateLanguage('baby')),
                    'image_id' => 520,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => null,
                ]
            ]);
        } else {
            Category::insert([
                [
                    'id' => 6,
                    'name' => json_encode($this->generateLanguage('Clothing')),
                    'slug' => json_encode($this->generateLanguage('clothing')),
                    'image_id' => 370,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:29:38',
                    'updated_at' => '2022-11-16 09:29:38',
                    'deleted_at' => null,
                ],
                [
                    'id' => 7,
                    'name' => json_encode($this->generateLanguage('Beauty')),
                    'slug' => json_encode($this->generateLanguage('beauty')),
                    'image_id' => 356,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:30:00',
                    'updated_at' => '2022-11-16 09:30:00',
                    'deleted_at' => null,
                ],
                [
                    'id' => 8,
                    'name' => json_encode($this->generateLanguage('Shoes')),
                    'slug' => json_encode($this->generateLanguage('shoes')),
                    'image_id' => 365,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:30:19',
                    'updated_at' => '2022-11-16 09:30:19',
                    'deleted_at' => null,
                ],
                [
                    'id' => 9,
                    'name' => json_encode($this->generateLanguage('Bag & Laggage')),
                    'slug' => json_encode($this->generateLanguage('bag-laggage')),
                    'image_id' => 358,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:30:47',
                    'updated_at' => '2022-11-16 09:30:47',
                    'deleted_at' => null,
                ],
                [
                    'id' => 10,
                    'name' => json_encode($this->generateLanguage('Man')),
                    'slug' => json_encode($this->generateLanguage('man')),
                    'image_id' => 359,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:31:07',
                    'updated_at' => '2022-11-16 09:31:07',
                    'deleted_at' => null,
                ],
                [
                    'id' => 11,
                    'name' => json_encode($this->generateLanguage('Woman')),
                    'slug' => json_encode($this->generateLanguage('woman')),
                    'image_id' => 363,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:31:18',
                    'updated_at' => '2022-11-16 09:31:18',
                    'deleted_at' => null,
                ],
                [
                    'id' => 12,
                    'name' => json_encode($this->generateLanguage('Baby')),
                    'slug' => json_encode($this->generateLanguage('baby')),
                    'image_id' => 362,
                    'status_id' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => null,
                ]
            ]);
        }
    }

    private function seedSubCategories()
    {

        SubCategory::insert([
            [
                'id' => 10,
                'category_id' => 10,
                'name' => json_encode($this->generateLanguage('T-Shirt')),
                'slug' => json_encode($this->generateLanguage('t-shirt')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 359,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 11,
                'category_id' => 6,
                'name' => json_encode($this->generateLanguage('Jacket')),
                'slug' => json_encode($this->generateLanguage('jacket')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 357,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 12,
                'category_id' => 10,
                'name' => json_encode($this->generateLanguage('Jersy')),
                'slug' => json_encode($this->generateLanguage('jersy')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 364,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 13,
                'category_id' => 7,
                'name' => json_encode($this->generateLanguage('Sun Glass')),
                'slug' => json_encode($this->generateLanguage('sun-glass')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 360,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 14,
                'category_id' => 11,
                'name' => json_encode($this->generateLanguage('Sharee')),
                'slug' => json_encode($this->generateLanguage('sharee')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 363,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 15,
                'category_id' => 8,
                'name' => json_encode($this->generateLanguage('High Heel')),
                'slug' => json_encode($this->generateLanguage('high-heel')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 356,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 16,
                'category_id' => 8,
                'name' => json_encode($this->generateLanguage('Baby Shoe')),
                'slug' => json_encode($this->generateLanguage('baby-shoe')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 362,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 17,
                'category_id' => 10,
                'name' => json_encode($this->generateLanguage('Pant')),
                'slug' => json_encode($this->generateLanguage('pant')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 352,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 18,
                'category_id' => 9,
                'name' => json_encode($this->generateLanguage('Bag')),
                'slug' => json_encode($this->generateLanguage('bag')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 367,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
        ]);
    }

    private function seedChildCategories()
    {
        ChildCategory::insert([
            [
                'id' => 12,
                'category_id' => 7,
                'sub_category_id' => 13,
                'name' => json_encode($this->generateLanguage('Fiber Sun Glass')),
                'slug' => json_encode($this->generateLanguage('fiber-sun-glass')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 360,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 13,
                'category_id' => 10,
                'sub_category_id' => 10,
                'name' => json_encode($this->generateLanguage('T-Shirt Set')),
                'slug' => json_encode($this->generateLanguage('t-shirt-set')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 361,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 14,
                'category_id' => 10,
                'sub_category_id' => 17,
                'name' => json_encode($this->generateLanguage('Jeans')),
                'slug' => json_encode($this->generateLanguage('jeans')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 352,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 15,
                'category_id' => 6,
                'sub_category_id' => 11,
                'name' => json_encode($this->generateLanguage('Leather Jacket')),
                'slug' => json_encode($this->generateLanguage('leather-jacket')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 368,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 16,
                'category_id' => 9,
                'sub_category_id' => 18,
                'name' => json_encode($this->generateLanguage('Purse Bag')),
                'slug' => json_encode($this->generateLanguage('purse-bag')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 367,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 17,
                'category_id' => 8,
                'sub_category_id' => 16,
                'name' => json_encode($this->generateLanguage('Fabric Shoe')),
                'slug' => json_encode($this->generateLanguage('fabric-shoe')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 362,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 18,
                'category_id' => 11,
                'sub_category_id' => 14,
                'name' => json_encode($this->generateLanguage('Classic Sharee')),
                'slug' => json_encode($this->generateLanguage('classic-sharee')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 363,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 19,
                'category_id' => 10,
                'sub_category_id' => 10,
                'name' => json_encode($this->generateLanguage('Graphics T-Short')),
                'slug' => json_encode($this->generateLanguage('graphics-t-short')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 355,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
            [
                'id' => 20,
                'category_id' => 8,
                'sub_category_id' => 15,
                'name' => json_encode($this->generateLanguage('Party Heel')),
                'slug' => json_encode($this->generateLanguage('part-heel')),
                'description' => json_encode($this->generateLanguage(NULL)),
                'image_id' => 375,
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
                'status_id' => 1

            ],
        ]);
    }

    private function seedColors()
    {
        $this->color_store('Red', '#ff3838', 'red');
        $this->color_store('Black', '#000000', 'black');
        $this->color_store('White', '#ffffff', 'white');
        $this->color_store('Blue', '#0984e3', 'blue');
        $this->color_store('Green', '#55efc4', 'green');
        $this->color_store('Yellow', '#feca39', 'yellow');
        $this->color_store('Magenta', '#e82fa7', 'magenta');
        $this->color_store('Pink', '#e84393', 'pink');
        $this->color_store('Purple', '#a600ff', 'purple');
        $this->color_store('Sky Blue', '#54a0ff', 'sky-blue');
        $this->color_store('Olive', '#c4e538', 'olive');
    }

    private function seedSize()
    {
        $this->size_store('Large', 'large', 'L');
        $this->size_store('Small', 'small', 'S');
        $this->size_store('Medium', 'medium', 'M');
        $this->size_store('Very Small', 'very-small', 'XS');
        $this->size_store('Very Large', 'very-large', 'XL');
    }

    private function seedTags()
    {
        Tag::insert([
            [
                'id' => 5,
                'tag_text' => json_encode($this->generateLanguage('abrasives')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 6,
                'tag_text' => json_encode($this->generateLanguage('baby suit')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 7,
                'tag_text' => json_encode($this->generateLanguage('ameriacan logo t shirt')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 8,
                'tag_text' => json_encode($this->generateLanguage('best jeans pant')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 9,
                'tag_text' => json_encode($this->generateLanguage('babys frock')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 10,
                'tag_text' => json_encode($this->generateLanguage('winter dress')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 11,
                'tag_text' => json_encode($this->generateLanguage('best saree for wedding')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 12,
                'tag_text' => json_encode($this->generateLanguage('best saree')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 13,
                'tag_text' => json_encode($this->generateLanguage('gifed saree')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 14,
                'tag_text' => json_encode($this->generateLanguage('color t shirt')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 15,
                'tag_text' => json_encode($this->generateLanguage('amazing t-shirt')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 16,
                'tag_text' => json_encode($this->generateLanguage('stylish hat')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 17,
                'tag_text' => json_encode($this->generateLanguage('denim shirt')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 18,
                'tag_text' => json_encode($this->generateLanguage('best dress for kid')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 19,
                'tag_text' => json_encode($this->generateLanguage('sun glasses')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 20,
                'tag_text' => json_encode($this->generateLanguage('casual t shirt')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 21,
                'tag_text' => json_encode($this->generateLanguage('kameez')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ]
        ]);
    }

    private function seedUnit()
    {
        $this->unit_store('Kg');
        $this->unit_store('Lb');
        $this->unit_store('Dozen');
        $this->unit_store('Ltr');
        $this->unit_store('g');
        $this->unit_store('Piece');
    }

    private function seedCountries()
    {
        DB::statement("INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
        (1, 'Bangladesh', 'publish', '2022-08-22 06:35:32', '2022-08-22 06:35:32'),
        (2, 'USA', 'publish', '2022-08-22 06:35:38', '2022-08-22 06:35:38'),
        (3, 'Turkey', 'publish', '2022-08-22 06:35:43', '2022-08-22 06:35:43'),
        (4, 'Russia', 'publish', '2022-08-22 06:35:48', '2022-08-22 06:35:48'),
        (5, 'China', 'publish', '2022-08-22 06:35:52', '2022-08-22 06:35:52'),
        (6, 'England', 'publish', '2022-08-22 06:35:59', '2022-08-22 06:35:59'),
        (7, 'Saudi Arabia', 'publish', '2022-08-22 06:41:29', '2022-08-22 06:41:29')");
    }

    private function seedStates()
    {
        DB::statement("INSERT INTO `states` (`id`, `name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
        (1, 'Dhaka', 1, 'publish', '2022-08-22 06:36:11', '2022-08-22 06:36:11'),
        (2, 'Chandpur', 1, 'publish', '2022-08-22 06:36:15', '2022-08-22 06:36:15'),
        (3, 'Noakhali', 1, 'publish', '2022-08-22 06:36:21', '2022-08-22 06:36:21'),
        (4, 'Bhola', 1, 'publish', '2022-08-22 06:36:27', '2022-08-22 06:36:27'),
        (5, 'Barishal', 1, 'publish', '2022-08-22 06:36:32', '2022-08-22 06:36:32'),
        (6, 'Nework', 2, 'publish', '2022-08-22 06:36:43', '2022-08-22 06:36:43'),
        (7, 'Chicago', 2, 'publish', '2022-08-22 06:36:54', '2022-08-22 06:36:54'),
        (8, 'Las Vegas', 2, 'publish', '2022-08-22 06:37:05', '2022-08-22 06:37:05'),
        (9, 'Ankara', 3, 'publish', '2022-08-22 06:37:12', '2022-08-22 06:37:12'),
        (10, 'Istanbul', 3, 'publish', '2022-08-22 06:37:19', '2022-08-22 06:37:19'),
        (11, 'Izmir', 3, 'publish', '2022-08-22 06:37:26', '2022-08-22 06:37:26'),
        (12, 'Moscow', 4, 'publish', '2022-08-22 06:37:34', '2022-08-22 06:37:34'),
        (13, 'Lalingard', 4, 'publish', '2022-08-22 06:37:44', '2022-08-22 06:37:44'),
        (14, 'Siberia', 4, 'publish', '2022-08-22 06:37:55', '2022-08-22 06:37:55'),
        (15, 'Shanghai', 5, 'publish', '2022-08-22 06:38:04', '2022-08-22 06:38:04'),
        (16, 'Anuhai', 5, 'publish', '2022-08-22 06:38:13', '2022-08-22 06:38:13'),
        (17, 'Hong Kong', 5, 'publish', '2022-08-22 06:38:29', '2022-08-22 06:38:29'),
        (18, 'London', 6, 'publish', '2022-08-22 06:38:37', '2022-08-22 06:38:37'),
        (19, 'Madina', 7, 'publish', '2022-08-22 06:41:44', '2022-08-22 06:41:44')");
    }

    private function seedDeliveryOption()
    {
        $this->delivery_option_store('las la-gift', 'Estimated Delivery', 'With 4 Days');
        $this->delivery_option_store('las la-gift', 'Free Shipping', 'Order over 100$');
        $this->delivery_option_store('las la-gift', '7 Days Return', 'Without any damage');
    }

    private function seedBadge()
    {
        Badge::insert([
            [
                'id' => 2,
                'name' => json_encode($this->generateLanguage('100 Sales')),
                'image' => 255,
                'for' => NULL,
                'sale_count' => NULL,
                'type' => NULL,
                'status' => 'active',
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
            [
                'id' => 3,
                'name' => json_encode($this->generateLanguage('New Arival')),
                'image' => 25,
                'for' => NULL,
                'sale_count' => NULL,
                'type' => NULL,
                'status' => 'active',
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
                'deleted_at' => NULL,
            ],
        ]);
    }

    private function seedProduct()
    {
        if (session()->get('theme') == 'casual') {
            Product::insert([
                [
                    'id' => 190,
                    'name' => json_encode($this->generateLanguage('High Heel Wedding Shoes')),
                    'slug' => json_encode($this->generateLanguage('high-heel-wedding-shoes')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Heel Height approximately 3.0\" Platform measures approximately 0.25\"| True size to fit.\r\n\r\nAll your friends will be asking your advice when they see you with these sexy sandals! The open toe and strappy with sparkling rhinestone design front is eye-catching and alluring and will have envious stares on you all night long.\r\n\r\nThis pair is perfectly designed for steady steps, as it features a single, slim sole that ideally balances the heel height with the rest of the sleek shoe design.\r\n\r\nThis stunning pair of heels is ideal for weddings, parties and every other special occasion that calls for dressy, upscale shoes!\r\n\r\nFeaturing a slim straps that hugs your ankle for custom support and provides a comfort throughout wear. Your feet will not slip, turn or move out of place while wearing these gorgeous sandals!\r\n\r\n apples and other desserts.')),
                    'image_id' => 529,
                    'price' => 250,
                    'sale_price' => 240,
                    'cost' => 250,
                    'badge_id' => 2,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 191,
                    'name' => json_encode($this->generateLanguage('Mans Silver Ridge Lite Long Sleeve Shirt')),
                    'slug' => json_encode($this->generateLanguage('mans-silver-ridge-lite-long-sleeve-shirt-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Neck StyleCollared NeckAbout this Item. Omni-wick - the ultimate moisture management technology for the outdoors. Omni-wick quickly moves moisture from the skin into the fabric where it spreads across the surface to quickly evaporate—keeping you cool and your clothing dry.')),
                    'image_id' => 532,
                    'price' => 774,
                    'sale_price' => 533,
                    'cost' => 774,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 192,
                    'name' => json_encode($this->generateLanguage('Buck Long Sleeve Button Down Shirt')),
                    'slug' => json_encode($this->generateLanguage('buck-long-sleeve-button-down-shirt-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Fabric Type64% Cotton, 34% Polyester, 2% Spandex. Care InstructionsMachine Wash')),
                    'image_id' => 532,
                    'price' => 774,
                    'sale_price' => 533,
                    'cost' => 774,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 193,
                    'name' => json_encode($this->generateLanguage('Mens Regular Fit Long Sleeve Poplin Jacket')),
                    'slug' => json_encode($this->generateLanguage('mens-regular-fit-long-sleeve-poplin-jacket-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Fabric Type64% Cotton, 34% Polyester, 2% Spandex')),
                    'image_id' => 530,
                    'price' => 800,
                    'sale_price' => 1000,
                    'cost' => 800,
                    'badge_id' => 3,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 195,
                    'name' => json_encode($this->generateLanguage('Baby shoes')),
                    'slug' => json_encode($this->generateLanguage('baby-shoes')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('100% TextileSynthetic soleBoy’s sneaker-style boots with hook and loop closureHigh-top stylingHook and loop closure for easy on-and-off')),
                    'image_id' => 537,
                    'price' => 223,
                    'sale_price' => 200,
                    'cost' => 223,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 196,
                    'name' => json_encode($this->generateLanguage('Stylish color  Jersey')),
                    'slug' => json_encode($this->generateLanguage('stylish-color-jersey')),
                    'summary' => json_encode($this->generateLanguage('The Blackout Jersey will match with any dirt bike pant, because what doesnt match with black? It has a moisture-wicking main body construction to keep you comfortable while youre putting down laps on the track or miles on the local trail. Plus, it has a perforated mesh fabric, so there is plenty of airflow through this motocross jersey.')),
                    'description' => json_encode($this->generateLanguage('100% PolyesterImportedPull On closureMachine WashBreathable crewneck jersey made for soccerRegular fit is wider at the body, with a straight silhouetteCrewneck provides full coverageThis product is made with recycled content as part of our ambition to end plastic waste')),
                    'image_id' => 538,
                    'price' => 250,
                    'sale_price' => 190,
                    'cost' => 250,
                    'badge_id' => NULL,
                    'brand_id' => 7,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 2,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 197,
                    'name' => json_encode($this->generateLanguage('High Heel Wedding Shoes')),
                    'slug' => json_encode($this->generateLanguage('high-heel-wedding-shoes-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Product details')),
                    'image_id' => 529,
                    'price' => 250,
                    'sale_price' => 240,
                    'cost' => 250,
                    'badge_id' => 2,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
            ]);

        } elseif (session()->get('theme') == 'electro') {
            Product::insert([
                [
                    'id' => 190,
                    'name' => json_encode($this->generateLanguage('High Heel Wedding Shoes')),
                    'slug' => json_encode($this->generateLanguage('high-heel-wedding-shoes')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Heel Height approximately 3.0\" Platform measures approximately 0.25\"| True size to fit.\r\n\r\nAll your friends will be asking your advice when they see you with these sexy sandals! The open toe and strappy with sparkling rhinestone design front is eye-catching and alluring and will have envious stares on you all night long.\r\n\r\nThis pair is perfectly designed for steady steps, as it features a single, slim sole that ideally balances the heel height with the rest of the sleek shoe design.\r\n\r\nThis stunning pair of heels is ideal for weddings, parties and every other special occasion that calls for dressy, upscale shoes!\r\n\r\nFeaturing a slim straps that hugs your ankle for custom support and provides a comfort throughout wear. Your feet will not slip, turn or move out of place while wearing these gorgeous sandals!\r\n\r\n apples and other desserts.')),
                    'image_id' => 529,
                    'price' => 250,
                    'sale_price' => 240,
                    'cost' => 250,
                    'badge_id' => 2,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 191,
                    'name' => json_encode($this->generateLanguage('Mans Silver Ridge Lite Long Sleeve Shirt')),
                    'slug' => json_encode($this->generateLanguage('mans-silver-ridge-lite-long-sleeve-shirt-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Neck StyleCollared NeckAbout this Item. Omni-wick - the ultimate moisture management technology for the outdoors. Omni-wick quickly moves moisture from the skin into the fabric where it spreads across the surface to quickly evaporate—keeping you cool and your clothing dry.')),
                    'image_id' => 532,
                    'price' => 774,
                    'sale_price' => 533,
                    'cost' => 774,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 192,
                    'name' => json_encode($this->generateLanguage('Buck Long Sleeve Button Down Shirt')),
                    'slug' => json_encode($this->generateLanguage('buck-long-sleeve-button-down-shirt-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Fabric Type64% Cotton, 34% Polyester, 2% Spandex. Care InstructionsMachine Wash')),
                    'image_id' => 532,
                    'price' => 774,
                    'sale_price' => 533,
                    'cost' => 774,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 193,
                    'name' => json_encode($this->generateLanguage('Mens Regular Fit Long Sleeve Poplin Jacket')),
                    'slug' => json_encode($this->generateLanguage('mens-regular-fit-long-sleeve-poplin-jacket-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Fabric Type64% Cotton, 34% Polyester, 2% Spandex')),
                    'image_id' => 530,
                    'price' => 800,
                    'sale_price' => 1000,
                    'cost' => 800,
                    'badge_id' => 3,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 195,
                    'name' => json_encode($this->generateLanguage('Baby shoes')),
                    'slug' => json_encode($this->generateLanguage('baby-shoes')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('100% TextileSynthetic soleBoy’s sneaker-style boots with hook and loop closureHigh-top stylingHook and loop closure for easy on-and-off')),
                    'image_id' => 537,
                    'price' => 223,
                    'sale_price' => 200,
                    'cost' => 223,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 196,
                    'name' => json_encode($this->generateLanguage('Stylish color  Jersey')),
                    'slug' => json_encode($this->generateLanguage('stylish-color-jersey')),
                    'summary' => json_encode($this->generateLanguage('The Blackout Jersey will match with any dirt bike pant, because what doesnt match with black? It has a moisture-wicking main body construction to keep you comfortable while youre putting down laps on the track or miles on the local trail. Plus, it has a perforated mesh fabric, so there is plenty of airflow through this motocross jersey.')),
                    'description' => json_encode($this->generateLanguage('100% PolyesterImportedPull On closureMachine WashBreathable crewneck jersey made for soccerRegular fit is wider at the body, with a straight silhouetteCrewneck provides full coverageThis product is made with recycled content as part of our ambition to end plastic waste')),
                    'image_id' => 538,
                    'price' => 250,
                    'sale_price' => 190,
                    'cost' => 250,
                    'badge_id' => NULL,
                    'brand_id' => 7,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 2,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 197,
                    'name' => json_encode($this->generateLanguage('High Heel Wedding Shoes')),
                    'slug' => json_encode($this->generateLanguage('high-heel-wedding-shoes-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Product details')),
                    'image_id' => 529,
                    'price' => 250,
                    'sale_price' => 240,
                    'cost' => 250,
                    'badge_id' => 2,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
            ]);
        } else {
            Product::insert([
                [
                    'id' => 190,
                    'name' => json_encode($this->generateLanguage('High Heel Wedding Shoes')),
                    'slug' => json_encode($this->generateLanguage('high-heel-wedding-shoes')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Heel Height approximately 3.0\" Platform measures approximately 0.25\"| True size to fit.\r\n\r\nAll your friends will be asking your advice when they see you with these sexy sandals! The open toe and strappy with sparkling rhinestone design front is eye-catching and alluring and will have envious stares on you all night long.\r\n\r\nThis pair is perfectly designed for steady steps, as it features a single, slim sole that ideally balances the heel height with the rest of the sleek shoe design.\r\n\r\nThis stunning pair of heels is ideal for weddings, parties and every other special occasion that calls for dressy, upscale shoes!\r\n\r\nFeaturing a slim straps that hugs your ankle for custom support and provides a comfort throughout wear. Your feet will not slip, turn or move out of place while wearing these gorgeous sandals!\r\n\r\n apples and other desserts.')),
                    'image_id' => 529,
                    'price' => 250,
                    'sale_price' => 240,
                    'cost' => 250,
                    'badge_id' => 2,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 191,
                    'name' => json_encode($this->generateLanguage('Mans Silver Ridge Lite Long Sleeve Shirt')),
                    'slug' => json_encode($this->generateLanguage('mans-silver-ridge-lite-long-sleeve-shirt-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Neck StyleCollared NeckAbout this Item. Omni-wick - the ultimate moisture management technology for the outdoors. Omni-wick quickly moves moisture from the skin into the fabric where it spreads across the surface to quickly evaporate—keeping you cool and your clothing dry.')),
                    'image_id' => 532,
                    'price' => 774,
                    'sale_price' => 533,
                    'cost' => 774,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 192,
                    'name' => json_encode($this->generateLanguage('Buck Long Sleeve Button Down Shirt')),
                    'slug' => json_encode($this->generateLanguage('buck-long-sleeve-button-down-shirt-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Fabric Type64% Cotton, 34% Polyester, 2% Spandex. Care InstructionsMachine Wash')),
                    'image_id' => 532,
                    'price' => 774,
                    'sale_price' => 533,
                    'cost' => 774,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 193,
                    'name' => json_encode($this->generateLanguage('Mens Regular Fit Long Sleeve Poplin Jacket')),
                    'slug' => json_encode($this->generateLanguage('mens-regular-fit-long-sleeve-poplin-jacket-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Fabric Type64% Cotton, 34% Polyester, 2% Spandex')),
                    'image_id' => 530,
                    'price' => 800,
                    'sale_price' => 1000,
                    'cost' => 800,
                    'badge_id' => 3,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 195,
                    'name' => json_encode($this->generateLanguage('Baby shoes')),
                    'slug' => json_encode($this->generateLanguage('baby-shoes')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('100% TextileSynthetic soleBoy’s sneaker-style boots with hook and loop closureHigh-top stylingHook and loop closure for easy on-and-off')),
                    'image_id' => 537,
                    'price' => 223,
                    'sale_price' => 200,
                    'cost' => 223,
                    'badge_id' => NULL,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 196,
                    'name' => json_encode($this->generateLanguage('Stylish color  Jersey')),
                    'slug' => json_encode($this->generateLanguage('stylish-color-jersey')),
                    'summary' => json_encode($this->generateLanguage('The Blackout Jersey will match with any dirt bike pant, because what doesnt match with black? It has a moisture-wicking main body construction to keep you comfortable while youre putting down laps on the track or miles on the local trail. Plus, it has a perforated mesh fabric, so there is plenty of airflow through this motocross jersey.')),
                    'description' => json_encode($this->generateLanguage('100% PolyesterImportedPull On closureMachine WashBreathable crewneck jersey made for soccerRegular fit is wider at the body, with a straight silhouetteCrewneck provides full coverageThis product is made with recycled content as part of our ambition to end plastic waste')),
                    'image_id' => 538,
                    'price' => 250,
                    'sale_price' => 190,
                    'cost' => 250,
                    'badge_id' => NULL,
                    'brand_id' => 7,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 2,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
                [
                    'id' => 197,
                    'name' => json_encode($this->generateLanguage('High Heel Wedding Shoes')),
                    'slug' => json_encode($this->generateLanguage('high-heel-wedding-shoes-1')),
                    'summary' => json_encode($this->generateLanguage('No Import Fees Deposit and $25.56 Shipping to Bangladesh')),
                    'description' => json_encode($this->generateLanguage('Product details')),
                    'image_id' => 529,
                    'price' => 250,
                    'sale_price' => 240,
                    'cost' => 250,
                    'badge_id' => 2,
                    'brand_id' => 2,
                    'status_id' => 1,
                    'product_type' => 1,
                    'sold_count' => NULL,
                    'min_purchase' => 1,
                    'max_purchase' => 10,
                    'is_refundable' => 0,
                    'is_in_house' => 1,
                    'is_inventory_warn_able' => 1,
                    'created_at' => '2022-11-16 09:34:38',
                    'updated_at' => '2022-11-16 09:34:38',
                    'deleted_at' => NULL,
                ],
            ]);
        }
    }

    private function seedProductCategory()
    {
        DB::statement("INSERT INTO `product_categories` (`id`, `product_id`, `category_id`) VALUES
        (151, 190, 8),
        (152, 191, 10),
        (153, 192, 10),
        (154, 193, 6),
        (155, 195, 8),
        (156, 196, 10),
        (157, 197, 8)");
    }

    private function seedProductSubCategories()
    {
        DB::statement("INSERT INTO `product_sub_categories` (`id`, `product_id`, `sub_category_id`) VALUES
        (150, 190, 15),
        (151, 191, 10),
        (152, 192, 10),
        (153, 193, 11),
        (154, 195, 16),
        (155, 196, 10),
        (156, 197, 15)");
    }

    private function seedProductChildCategories()
    {
        DB::statement("INSERT INTO `product_child_categories` (`id`, `product_id`, `child_category_id`) VALUES
        (550, 191, 13),
        (551, 191, 19),
        (554, 192, 13),
        (555, 192, 19),
        (557, 193, 15),
        (558, 190, 20),
        (560, 195, 17),
        (561, 196, 13),
        (562, 197, 20)");
    }

    private function seedProductTags()
    {
        ProductTag::insert([
            [
                'id' => 738,
                'tag_name' => json_encode($this->generateLanguage('tshirt')),
                'product_id' => 191,
            ],
            [
                'id' => 740,
                'tag_name' => json_encode($this->generateLanguage('tshirt')),
                'product_id' => 192,
            ],
            [
                'id' => 742,
                'tag_name' => json_encode($this->generateLanguage('jacket')),
                'product_id' => 193,
            ],
            [
                'id' => 743,
                'tag_name' => json_encode($this->generateLanguage('jacket')),
                'product_id' => 190,
            ],
            [
                'id' => 745,
                'tag_name' => json_encode($this->generateLanguage('baby shoe')),
                'product_id' => 195,
            ],
            [
                'id' => 746,
                'tag_name' => json_encode($this->generateLanguage('jersy')),
                'product_id' => 196,
            ],
            [
                'id' => 747,
                'tag_name' => json_encode($this->generateLanguage('jacket')),
                'product_id' => 197,
            ],
        ]);
    }

    private function seedProductGalleries()
    {
        DB::statement("INSERT INTO `product_galleries` (`id`, `product_id`, `image_id`) VALUES
        (147, 191, 380),
        (148, 191, 379),
        (149, 191, 377),
        (153, 192, 382),
        (154, 192, 379),
        (155, 192, 372),
        (159, 193, 377),
        (160, 193, 368),
        (161, 193, 357),
        (162, 195, 362),
        (163, 196, 361)");
    }

    private function seedProductInventories()
    {
        DB::statement("INSERT INTO `product_inventories` (`id`, `product_id`, `sku`, `stock_count`, `sold_count`) VALUES
        (211, 190, 'phh4', 20, NULL),
        (212, 191, 'swr234-1', 100, NULL),
        (213, 192, 'srw12-1', 100, NULL),
        (214, 193, 'jck12-1', 50, NULL),
        (216, 195, 'bbs15', 20, NULL),
        (217, 196, 'jrs45', 45, NULL),
        (218, 197, 'phh4-1', 20, NULL)");
    }

    private function seedProductInventoryDetails()
    {
        DB::statement("INSERT INTO `product_inventory_details` (`id`, `product_inventory_id`, `product_id`, `color`, `size`, `hash`, `additional_price`, `add_cost`, `image`, `stock_count`, `sold_count`) VALUES
        (379, 216, 195, '1', '2', '', 2.00, 2.00, 362, 10, 0),
        (380, 216, 195, '5', '2', '', 3.00, 3.00, 354, 10, 0)");
    }

    private function seedProductUOM()
    {
        DB::statement("INSERT INTO `product_uom` (`id`, `product_id`, `unit_id`, `quantity`) VALUES
        (123, 190, 6, 1.00),
        (124, 191, 6, 1.00),
        (125, 192, 6, 1.00),
        (126, 193, 6, 1.00),
        (127, 195, 6, 1.00),
        (128, 196, 6, 1.00),
        (129, 197, 6, 1.00)");
    }

    private function seedProductCreatedBy()
    {
        DB::statement("INSERT INTO `product_created_by` (`id`, `product_id`, `created_by_id`, `guard_name`, `updated_by`, `updated_by_guard`, `deleted_by`, `deleted_by_guard`) VALUES
        (181, 190, 1, 'admin', 1, 'admin', NULL, NULL),
        (182, 191, 1, 'admin', 1, 'admin', NULL, NULL),
        (183, 192, 1, 'admin', NULL, NULL, NULL, NULL),
        (184, 193, 1, 'admin', NULL, NULL, NULL, NULL),
        (186, 195, 1, 'admin', 1, 'admin', NULL, NULL),
        (187, 196, 1, 'admin', 1, 'admin', NULL, NULL),
        (188, 197, 1, 'admin', NULL, NULL, NULL, NULL)");
    }

    private function seedProductDeliveryOption()
    {
        DB::statement("INSERT INTO `product_delivery_options` (`id`, `product_id`, `delivery_option_id`) VALUES
        (754, 191, 1),
        (755, 191, 2),
        (756, 191, 3),
        (760, 192, 1),
        (761, 192, 2),
        (762, 192, 3),
        (766, 193, 1),
        (767, 193, 2),
        (768, 193, 3),
        (769, 190, 1),
        (770, 190, 3),
        (774, 195, 1),
        (775, 195, 2),
        (776, 195, 3),
        (777, 197, 1),
        (778, 197, 3)");
    }

    private function seedProductReturnPolicies()
    {
        ProductShippingReturnPolicy::insert([
            [
                'id' => 31,
                'product_id' => 190,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
            [
                'id' => 32,
                'product_id' => 191,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
            [
                'id' => 33,
                'product_id' => 192,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
            [
                'id' => 34,
                'product_id' => 193,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
            [
                'id' => 36,
                'product_id' => 195,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
            [
                'id' => 37,
                'product_id' => 196,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
            [
                'id' => 38,
                'product_id' => 197,
                'shipping_return_description' => json_encode($this->generateLanguage('<p>Return in 7 Days is acceptable</p>')),
                'created_at' => '2022-11-16 09:34:38',
                'updated_at' => '2022-11-16 09:34:38',
            ],
        ]);
       }

    private function seedCampaign()
    {
        if (session()->get('theme') == 'electro') {
            Campaign::insert([
                [
                    'id' => 14,
                    'title' => json_encode($this->generateLanguage('Winter Products')),
                    'subtitle' => json_encode($this->generateLanguage('Coming Soon')),
                    'image' => 565,
                    'start_date' => '2023-04-01 00:00:00',
                    'end_date' => '2024-01-01 00:00:00',
                    'status' => 'publish',
                    'created_at' => '2022-11-16 11:01:00',
                    'updated_at' => '2022-11-16 11:12:03',
                    'admin_id' => 1,
                    'type' => 'admin'
                ],
                [
                    'id' => 15,
                    'title' => json_encode($this->generateLanguage('Summer Sale')),
                    'subtitle' => json_encode($this->generateLanguage('Buy 1 Get 1 Free')),
                    'image' => 552,
                    'start_date' => '2023-04-01 00:00:00',
                    'end_date' => '2024-01-01 00:00:00',
                    'status' => 'publish',
                    'created_at' => '2022-11-16 11:01:00',
                    'updated_at' => '2022-11-16 11:12:03',
                    'admin_id' => 1,
                    'type' => 'admin'
                ]
            ]);
        } else {
            Campaign::create([
                'id' => 14,
                'title' => $this->generateLanguage('Summer Collection'),
                'subtitle' => $this->generateLanguage('Summer'),
                'image' => 540,
                'start_date' => '2023-04-01 00:00:00',
                'end_date' => '2024-01-01 00:00:00',
                'status' => 'publish',
                'created_at' => '2022-11-16 11:01:00',
                'updated_at' => '2022-11-16 11:12:03',
                'admin_id' => 1,
                'type' => 'admin'
            ]);
        }
    }

    private function seedCampaignProducts()
    {
        DB::statement("INSERT INTO `campaign_products` (`id`, `product_id`, `campaign_id`, `campaign_price`, `units_for_sale`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
        (118, 191, 14, '479.70', 5, '2022-11-19 18:00:00', '2023-01-30 18:00:00', NULL, NULL),
        (119, 192, 14, '288.90', 5, '2022-11-19 18:00:00', '2023-01-30 18:00:00', NULL, NULL),
        (120, 196, 14, '171.00', 5, '2022-11-19 18:00:00', '2023-01-30 18:00:00', NULL, NULL),
        (121, 193, 14, '900.00', 5, '2022-11-19 18:00:00', '2023-01-30 18:00:00', NULL, NULL)");
    }

    private function unit_store($name)
    {
        $admin = Admin::first();

        $blog = new Unit();

        $blog->name = $this->generateLanguage($name);

        $blog->save();
    }

    private function color_store($name, $color_code, $slug)
    {
        $admin = Admin::first();

        $blog = new Color();

        $blog->name = $this->generateLanguage($name);
        $blog->color_code = SanitizeInput::esc_html($color_code);
        $blog->slug = $this->generateLanguage($slug);

        $blog->save();
    }

    private function size_store($name, $slug, $size_code)
    {
        $admin = Admin::first();

        $blog = new Size();

        $blog->name = $this->generateLanguage($name);
        $blog->size_code = SanitizeInput::esc_html($size_code);
        $blog->slug = $this->generateLanguage($slug);

        $blog->save();
    }

    private function delivery_option_store($icon, $title, $sub_title)
    {
        $admin = Admin::first();

        $blog = new DeliveryOption();

        $blog->icon = SanitizeInput::esc_html($icon);
        $blog->title = $this->generateLanguage($title);
        $blog->sub_title = $this->generateLanguage($sub_title);

        $blog->save();
    }
}
