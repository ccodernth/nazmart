<?php

namespace Database\Seeders\Tenant;

use App\Helpers\ImageDataSeedingHelper;
use App\Helpers\SanitizeInput;
use App\Models\Admin;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\BlogTag;

class BlogSeed extends Seeder
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
        //category store
        $this->blog_category_seed();
        $this->blog_tag_seed();

        $description = 'Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty.
         In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable
          unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of.
        Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs.
         At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.
        Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous.
         Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day
         advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add
         heard new other put. Attended no indulged marriage is to judgment offering landlords.';

        $title_one = 'Money witty books nor son add. Chicken age had evening believe';
        $title_two = 'Was drawing natural fat respect husband';
        $title_three = 'Ten Highways is my organization are added and seal there single';
        $title_four = 'Attended no indulged marriage is to judgment offering landlords';
        $title_five = 'Miss told ham dull knew see she spot near can';
        $title_six = 'Do enjoyment defective objection or we if favourite';

        $this->blog_store($this->generateLanguage($title_one),$this->generateLanguage(Str::slug($title_one)), $this->generateLanguage($description), 4, 319);
        $this->blog_store($this->generateLanguage($title_two),$this->generateLanguage(Str::slug($title_two)),  $this->generateLanguage($description), 5, 318);
        $this->blog_store($this->generateLanguage($title_three),$this->generateLanguage(Str::slug($title_three)),  $this->generateLanguage($description), 6, 320);
        $this->blog_store($this->generateLanguage($title_four), $this->generateLanguage(Str::slug($title_four)), $this->generateLanguage($description), 7, 318);
        $this->blog_store($this->generateLanguage($title_five), $this->generateLanguage(Str::slug($title_five)), $this->generateLanguage($description), 8, 319);
        $this->blog_store($this->generateLanguage($title_six), $this->generateLanguage(Str::slug($title_six)), $this->generateLanguage($description), 9, 320);
    }


    private function blog_category_seed()
    {
        $this->blog_category_store($this->generateLanguage('Travel'), $this->generateLanguage('travel'), '1');
        $this->blog_category_store($this->generateLanguage('Online Course'), $this->generateLanguage('online-course'), '1');
        $this->blog_category_store($this->generateLanguage('Hosting'), $this->generateLanguage('hosting'), '1');
        $this->blog_category_store($this->generateLanguage('Game'), $this->generateLanguage('game'), '1');
        $this->blog_category_store($this->generateLanguage('Restaurant'), $this->generateLanguage('restaurant'), '1',);
        $this->blog_category_store($this->generateLanguage('Ticket'), $this->generateLanguage('ticket'), '1');
    }

    private function blog_tag_seed()
    {
        $this->blog_tag_store($this->generateLanguage('Gadget'), $this->generateLanguage('gadget'));
        $this->blog_tag_store($this->generateLanguage('Games'), $this->generateLanguage('games'));
        $this->blog_tag_store($this->generateLanguage('Fashion'), $this->generateLanguage('fashion'));
        $this->blog_tag_store($this->generateLanguage('Watch'), $this->generateLanguage('watch'));
        $this->blog_tag_store($this->generateLanguage('Camera'), $this->generateLanguage('camera'));
        $this->blog_tag_store($this->generateLanguage('Travel'), $this->generateLanguage('travel'));
        $this->blog_tag_store($this->generateLanguage('Tech'), $this->generateLanguage('tech'));
        $this->blog_tag_store($this->generateLanguage('Book'), $this->generateLanguage('book'));

    }

    private function blog_store($title, $slug, $description, $category_id, $image_id)
    {
        $admin = Admin::first();

        $blog = new Blog();
        $blog->title = $title;
        $blog->blog_content = $description;
        $blog->excerpt = SanitizeInput::esc_html('blog excerpt');


        $blog->slug = $slug;
        $blog->category_id = $category_id;
        $blog->featured = null;
        $blog->visibility = 'public';
        $blog->status = 1;
        $blog->admin_id = $admin->id;
        $blog->user_id = null;
        $blog->author = $admin->name;
        $blog->image = $image_id;
        $blog->image_gallery = null;
        $blog->views = 0;
        $blog->tags = null;
        $blog->created_by = 'admin';

        $Metas = [
            'title' => $this->generateLanguage('blog'),
            'description' => $this->generateLanguage('blog'),
            'image' => null,
            //twitter
            'tw_image' => null,
            'tw_title' => $this->generateLanguage('blog'),
            'tw_description' => $this->generateLanguage('blog'),
            //facebook
            'fb_image' => null,
            'fb_title' => $this->generateLanguage('blog'),
            'fb_description' => $this->generateLanguage('blog'),
        ];

        $blog->save();
        $blog->metainfo()->create($Metas);
    }

    private function blog_category_store($title, $slug, $status)
    {
        $admin = Admin::first();

        $blog = new BlogCategory();

        $blog->title = $title;
        $blog->slug = $slug;
        $blog->status = $status;
        $blog->save();
    }

    private function blog_tag_store($title, $slug)
    {
        $admin = Admin::first();

        $blog = new BlogTag();

        $blog->title = $title;

        $blog->slug = $slug;
        $blog->save();
    }
}
