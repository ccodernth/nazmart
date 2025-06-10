<?php

namespace Database\Seeders\Tenant;

use App\Helpers\ImageDataSeedingHelper;
use App\Helpers\SanitizeInput;
use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PlanFeature;
use App\Models\PricePlan;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TestimonialSeed extends Seeder
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
        $this->testimonial_store('Wyatt Mayer', 'Chief Operation','Growers Supply Company sells high-quality hydroponic equipment, including pumps, timers, controllers, and more.', 'Espinoza and Montoya Associates', 5, 340);
            $this->testimonial_store( 'Jolene Mercer', 'Marketing', 'Greenhouse Supply Company offers everything you need to start growing indoors. They sell everything from lighting systems to grow tents.', 'Fisher Hunt Traders', 4, '342');
            $this->testimonial_store( 'Ethan Herrera', 'Chairman', 'Best Shop is a company that sells top quality products at affordable prices. Their products are guaranteed to work and they have great customer service.', 'Macdonald Coffey Trading', 5, '343');
            $this->testimonial_store( 'John Abraham', 'Supplier', 'Gourmet Gardening Supplies sells a variety of gardening tools and supplies.', 'Gourmet Supplies', 5, '344');
    }

    private function testimonial_store($name, $designation, $description, $company, $rating, $image)
    {
        $admin = Admin::first();

        $digitalLanguage = new Testimonial();

        $digitalLanguage->name = SanitizeInput::esc_html($name);
        $digitalLanguage->designation = $this->generateLanguage($designation);
        $digitalLanguage->description = $this->generateLanguage($description);
        $digitalLanguage->company = SanitizeInput::esc_html($company);
        $digitalLanguage->rating = $rating;
        $digitalLanguage->image = $image;
        $digitalLanguage->status = 1;

        $digitalLanguage->save();
    }
}
