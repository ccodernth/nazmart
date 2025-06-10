<?php

namespace Database\Seeders;

use App\Models\Language;
use Database\Seeders\Tenant\AdminSeed;
use Database\Seeders\Tenant\BlogSeed;
use Database\Seeders\Tenant\BrandSeed;
use Database\Seeders\Tenant\DigitalProductSeed;
use Database\Seeders\Tenant\Footer\WidgetSeed;
use Database\Seeders\Tenant\FormBuilderSeed;
use Database\Seeders\Tenant\GeneralData;
use Database\Seeders\Tenant\LanguageSeed;
use Database\Seeders\Tenant\MediaSeed;
use Database\Seeders\Tenant\MenuSeed;
use Database\Seeders\Tenant\PageSeed;
use Database\Seeders\Tenant\PaymentGatewayFieldsSeed;
use Database\Seeders\Tenant\RolePermissionSeed;
use Database\Seeders\Tenant\StatusSeed;
use Database\Seeders\Tenant\TestimonialSeed;
use Database\Seeders\Tenant\ProductSeed;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    public function run()
    {
        $app = Container::getInstance();

        $language = Language::query()->where('default', '=', 1)->first();
        $app->setLocale('en_GB');
        $this->call([
            RolePermissionSeed::class,
            AdminSeed::class,
            LanguageSeed::class,
            MenuSeed::class,
            GeneralData::class,
            PageSeed::class,
            MediaSeed::class,
            FormBuilderSeed::class,
            PaymentGatewayFieldsSeed::class,
            StatusSeed::class,
            WidgetSeed::class,
            BlogSeed::class,
            TestimonialSeed::class,
            BrandSeed::class,
            ProductSeed::class,
            DigitalProductSeed::class,
        ]);

        $app->setLocale($language->slug ?? 'az');


        session()->forget('theme');
    }
}
