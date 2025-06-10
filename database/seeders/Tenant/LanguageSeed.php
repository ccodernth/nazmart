<?php

namespace Database\Seeders\Tenant;

use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class LanguageSeed extends Seeder
{
    public function run()
    {
        Language::insert([

            [
                'name' => __('Azərbaycan dili'),
                'direction' => 0,
                'slug' => 'az',
                'status' => 1,
                'default' => 1
            ],
            [
                'name' => __('Русский'),
                'direction' => 0,
                'slug' => 'ru_RU',
                'status' => 1,
                'default' => 0
            ],
            [
                'name' => __('English (UK)'),
                'direction' => 0,
                'slug' => 'en_GB',
                'status' => 1,
                'default' => 0
            ],
            [
                'name' => __('Türkçe'),
                'direction' => 0,
                'slug' => 'tr_TR',
                'status' => 1,
                'default' => 0
            ],
            
        ]);

        Language::where('slug', get_static_option_central('default_language') ?? 'en_GB')->update([
            'default' => 1
        ]);
    }
}
