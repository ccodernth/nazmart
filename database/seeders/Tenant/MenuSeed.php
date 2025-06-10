<?php

namespace Database\Seeders\Tenant;

use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Language;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class MenuSeed extends Seeder
{
    public function run()
    {

        $default = 0;
        if (session()->get('theme') == 'fruit') {
            Menu::create([
                'content' => json_encode($this->menu_content()),
                'title' => 'Fruit',
                'status' => 'default',
            ]);

            Menu::create([
                'content' => json_encode($this->link_menu_content()),
                'title' => 'Menu',
                'status' => NULL,
            ]);
            $default =1;
        }

        Menu::create([
            'content' => json_encode($this->menu_content_primary()),
            'title' => 'Primary Menu',
            'status' => !$default ? 'default' : NULL,
        ]);

        Menu::create([
            'content' => json_encode($this->top_menu_content()),
            'title' => 'Useful Links',
            'status' => NULL,
        ]);

        Menu::create([
            'content' => json_encode($this->top_menu_content()),
            'title' => 'FAQ',
            'status' => NULL,
        ]);
    }

    private function menu_content_primary()
    {
        $data = array(
            0 =>
                array(
                    'ptype' => 'pages',
                    'id' => 1,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 1,
                ),
            1 =>
                array(
                    'ptype' => 'pages',
                    'id' => 2,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 2,
                ),
            2 =>
                array(
                    'ptype' => 'pages',
                    'id' => 3,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 3,
                ),
            3 =>
                array(
                    'ptype' => 'pages',
                    'id' => 4,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 4,
                ),
            4 =>
                array(
                    'ptype' => 'pages',
                    'id' => 5,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 5,
                ),
            5 =>
                array(
                    'ptype' => 'pages',
                    'id' => 6,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 6,
                ),
        );

        return $data;
    }
    private function menu_content()
    {
        $data = array(
            0 =>
                array(
                    'ptype' => 'product Category',
                    'id' => 2,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => 'megamenu product-{193, 191, 192}',
                    'pid' => 6,
                ),
            1 =>
                array(
                    'ptype' => 'product Category',
                    'id' => 3,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => 'megamenu image-{logo-06.png, banner-seven.png, pc3.png} links-{test.com}',
                    'pid' => 7,
                ),
            2 =>
                array(
                    'ptype' => 'product Category',
                    'id' => 4,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 8,
                ),
            3 =>
                array(
                    'ptype' => 'product Category',
                    'id' => 5,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 9,
                ),
            4 =>
                array(
                    'ptype' => 'product Category',
                    'id' => 6,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 10,
                ),
            5 =>
                array(
                    'ptype' => 'product Category',
                    'id' => 7,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 11,
                ),
        );

        return $data;
    }

    private function link_menu_content()
    {
        $data = array(
            0 =>
                array(
                    'ptype' => 'pages',
                    'id' => 2,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 1,
                ),
            1 =>
                array(
                    'ptype' => 'pages',
                    'id' => 3,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 2,
                ),
            2 =>
                array(
                    'ptype' => 'pages',
                    'id' => 4,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 3,
                ),
            3 =>
                array(
                    'ptype' => 'pages',
                    'id' => 5,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 4,
                ),
            4 =>
                array(
                    'ptype' => 'pages',
                    'id' => 6,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 5,
                ),
            5 =>
                array(
                    'ptype' => 'pages',
                    'id' => 7,
                    'antarget' => '',
                    'icon' => '',
                    'menulabel' => '',
                    'pid' => 6,
                )
        );

        return $data;
    }

    private function top_menu_content()
    {
        $data = array(
            0 =>
                array(
                    'id' => 1,
                    'ptype' => 'custom',
                    'pname' => 'Best Seller Books',
                    'purl' => '#'
                ),
            1 =>
                array(
                    'id' => 2,
                    'ptype' => 'custom',
                    'pname' => 'Special Offer',
                    'purl' => '#',
                )
        );

        return $data;
    }
}
