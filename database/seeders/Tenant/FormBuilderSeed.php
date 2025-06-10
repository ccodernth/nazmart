<?php

namespace Database\Seeders\Tenant;

use App\Helpers\SanitizeInput;
use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\FormBuilder;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FormBuilderSeed extends Seeder
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
        $this->form_builder_store('Contact Form', 'Send Message', '{\"success_message\":\"Your message is sent. Please wait for the response. Thank you!\",\"field_type\":[\"text\",\"email\",\"textarea\"],\"field_name\":[\"your-name\",\"your-email\",\"your-message\"],\"field_placeholder\":[\"Your Name\",\"Your Email\",\"Your Message\"],\"field_required\":[\"on\",\"on\",\"on\"]}', 'Your message is sent. Please wait for the response. Thank you!');
    }

    private function form_builder_store($title, $button_text, $fields, $success_message)
    {
        $admin = Admin::first();

        $blog = new FormBuilder();

        $blog->title = $this->generateLanguage($title);
        $blog->email = 'xgenious@gmail.com';
        $blog->button_text = $this->generateLanguage($button_text);
        $blog->fields = $this->generateLanguage($fields);
        $blog->success_message = $this->generateLanguage($success_message);

        $blog->save();
    }
}
