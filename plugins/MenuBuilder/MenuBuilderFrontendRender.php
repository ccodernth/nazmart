<?php

namespace Plugins\MenuBuilder;


use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Models\MediaUploader;
use App\Models\Menu;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Entities\SubCategory;
use Modules\Product\Entities\Product;


class MenuBuilderFrontendRender
{
    protected $page_id;

    public function render_frrontend_panel_menu($id)
    {

        $output = '';
        if (empty($id)) {
            return $output;
        }
        $menu_details_from_db = Menu::find($id);

        $default_lang = GlobalLanguage::user_lang_slug();

        $user = str_replace('.', '', route_prefix());

        $menu_data = $user == 'tenant' ? json_decode($menu_details_from_db['content']) : json_decode($menu_details_from_db[0]->content);
        $this->page_id = 1;


        if ($user == 'tenant' && $menu_details_from_db->title == "Fruit") {
            if (count((array)$menu_data) > 0) {
                foreach ($menu_data as $menu_item) {
                    $this->page_id++;

                    $output .= $this->render_fruit_menu_item($menu_item, $this->page_id, $default_lang);

                }
            }
        } else {
            if (count((array)$menu_data) > 0) {
                foreach ($menu_data as $menu_item) {
                    $this->page_id++;

                    $output .= $this->render_menu_item($menu_item, $this->page_id, $default_lang);

                }
            }
        }

        return $output;
    }

    private function get_attribute_string(array $li_attributes): string
    {
        if (empty($li_attributes)) {
            return '';
        }
        $attr_val = '';
        foreach ($li_attributes as $attr => $value) {
            //fix class append issue
            if (!empty($value) && $attr != 'class') {
                $attr_val .= $attr . '="' . $value . '"';
            } elseif ($attr === 'class') {
                if (!is_array($value)) {
                    $attr_val .= $attr . '="' . $value . '"';
                } else {
                    $class_attr = 'class="';
                    foreach ($value as $cl) {
                        $class_attr .= ' ' . $cl . ' ';
                    }
                    $class_attr .= '"';
                    $attr_val = $class_attr;
                }
            }
        }
        return $attr_val;
    }

    private function render_li_start(string $title, array $attributes_string, $default_lang)
    {
        $output = "\n\t" . '<li ' . $this->get_attribute_string($attributes_string) . '> ' . "\n";
        return $output;
    }

    private function render_fruit_li_start(string $title, array $attributes_string, $default_lang, $megamenu, $subCatCount)
    {
        $megamenu = $megamenu ? '' : ' style="position: relative" ';
        $output = "\n\t" . '<li class="' . ($subCatCount > 0 ? 'dropdown-sub-have" ' : "") . $megamenu . $this->get_attribute_string($attributes_string) . '> ' . "\n";
        return $output;
    }

    private function render_menu_item($menu_item, int $page_id, $default_lang)
    {
        $attributes_string = [];
        if (property_exists($menu_item, 'children') && $this->childmenuCheck($menu_item->children ?? [])) {
            $attributes_string['class'] = ['menu-item-has-children'];
        }
        if (empty((array)$menu_item)) {
            return;
        }
        $menu_item = (object)$menu_item;
        $ptype = property_exists($menu_item, 'ptype') ? $menu_item->ptype : '';
        $pname = property_exists($menu_item, 'pname') ? $menu_item->pname : '';
        $menu_label = property_exists($menu_item, 'menulabel') ? $menu_item->menulabel : null;
        $output = '';
        if ($ptype === 'custom') {
            //check to activation class
            if (request()->path() === $menu_item->purl) {
                if (isset($attributes_string['class'])) {
                    $attributes_string[] = ['class' => ['current-menu-item']];
                } else {
                    $attributes_string['class'][] = 'current-menu-item';
                }
            }
            $output .= $this->render_li_start($pname, $attributes_string, $default_lang);
            $title = $pname;
            $output .= $this->get_anchor_markup(__($title), [
                'href' => str_replace('@url', url('/'), $menu_item->purl),
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } elseif ($ptype === 'static') {
            $menu_slug = get_static_option(str_replace('-', '_', $menu_item->pslug) . '_page_slug');
            if (request()->path() == $menu_slug) {
                if (isset($attributes_string['class'])) {
                    $attributes_string['class'][] = 'current-menu-item';
                } else {
                    $attributes_string['class'] = ['current-menu-item'];
                }
            }
            $page_name = MenuBuilderSetup::multilang() ? '_page_' . $default_lang . '_name' : '_page_name';
            $title = get_static_option(str_replace('-', '_', $menu_item->pslug) . $page_name) ?? '';
            $output .= $this->render_li_start($pname, $attributes_string, $default_lang);
            // get anchor data
            $output .= $this->get_anchor_markup(__($title), [
                'href' => url('/') . '/' . $menu_slug ?? '',
                'target' => $menu_item->antarget ?? '',
            ], $menu_item->icon ?? '');
        } else {
            //check is mega menu
            preg_match('/MegaMenus/', $ptype, $matches);
            if (!empty($matches[0])) {

                $li_attributes = ['class' => 'menu-item-has-mega-menu'];

                $class_name = '\\' . $ptype;
                $instance = new $class_name();
                if ($instance->enable()) {
                    $static_name = str_replace('[lang]', $default_lang, $instance->name());
                    $title = htmlspecialchars(strip_tags(get_static_option($static_name)));
                    $output .= $this->render_li_start($title, $li_attributes, $default_lang);
                    // get anchor data
                    $output .= $this->get_anchor_markup($title, [
                        'href' => url('/') . '/' . get_static_option($instance->slug()) ?? '#',
                        'target' => $menu_item->antarget ?? '',
                    ], $menu_item->icon ?? '');
                    $output .= $instance->render($menu_item->items_id ?? '', $default_lang, 'no_lang');
                }
            } else {
                $menu_setup_instance = new MenuBuilderSetup();
                $all_dynamic_menus = $menu_setup_instance->register_dynamic_menus();
                $dynamic_menu_type = $all_dynamic_menus[$ptype] ?? null;
                if ($dynamic_menu_type) {
                    //load dynamic page item
                    $model_name = '\\' . $dynamic_menu_type['model'];
                    $model = new $model_name();
                    if ($dynamic_menu_type['query'] === 'old_lang') {
                        if ($dynamic_menu_type['model'] === 'Modules\Attributes\Entities\Category') {
                            $item_details = $model->where(['id' => $menu_item->pid, 'status_id' => 1])->with('subCategory')->first();
                        } else {
                            $item_details = $model->where(['lang' => $default_lang])->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();

                        }
                    } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                        $item_details = $model->with(['lang_query' => function ($query) use ($default_lang) {
                            $query->where('lang', $default_lang);
                        }])->where(['id' => $menu_item->pid, 'status' => 'publish'])->first();
                    } else {
                        $item_details = $model->where(['id' => $menu_item->pid, 'status' => 1])->first();
                    }
                    $title_param = $dynamic_menu_type['title_param'];
                    if ($dynamic_menu_type['query'] === 'old_lang') {

                        $title = $item_details->$title_param ?? '';

                    } elseif ($dynamic_menu_type['query'] === 'new_lang') {

                        $title = $item_details->lang_query->$title_param ?? '';
                    } else {
                        $title = optional($item_details)->$title_param ?? '';
                    }


                    // get anchor data
                    $route_params = [];
                    $route_params_list = $dynamic_menu_type['route_params'] ?? [];


                    foreach ($route_params_list as $param) {
                        if ($dynamic_menu_type['query'] === 'old_lang') {
                            $dynamic_param = $item_details->$param ?? '';
                        } elseif ($dynamic_menu_type['query'] === 'new_lang') {
                            $dynamic_param = $item_details->lang_query->$param ?? '';
                        } else {
                            $dynamic_param = $item_details->$param ?? '';
                        }
                        if (preg_match('/id/', $param)) {
                            $route_params['id'] = $dynamic_param;
                        } else {
                            $route_params[$param] = $dynamic_param;
                        }
                    }

                    if (request()->path() === $route_params[$param]) {
                        if (isset($attributes_string['class'])) {
                            $attributes_string['class'][] = 'current-menu-item';
                        } else {
                            $attributes_string['class'] = ['current-menu-item'];
                        }
                    }

                    $output .= $this->render_li_start($title, $attributes_string, $default_lang);
                    if (!is_null($menu_label) && !empty($menu_label)) {
                        $title = $menu_label;
                    }

                    if (!empty($title) && $this->routeParamCheck($route_params)) {
                        $output .= $this->get_anchor_markup($title, [
                            'href' => route($dynamic_menu_type['route'], $route_params),
                            'target' => $menu_item->antarget ?? '',
                        ], $menu_item->icon ?? '');
                    }
                }
            }
        }
        //check it has children
        if (property_exists($menu_item, 'children')) {
            $has_megamenu = $this->checkChildrenHasMegaMenu($menu_item->children);
            $output .= $this->render_children_item($menu_item->children, $default_lang, $has_megamenu ? 'megamenu-wrapper' : '');
        }

        $output .= '</li>';
        return $output;
    }

  /****
 * Fruit teması için özel menü item render fonksiyonu
 * Bu sürümde "menulabel" property’si olmayınca çıkabilecek "Undefined property" hatasını önlemek için,
 * menulabel varsa kullanıyor, yoksa boş string atıyor ve tüm kullanımda bu değişken üzerinden ilerliyoruz.
 ****/
private function render_fruit_menu_item($menu_item, int $page_id, $default_lang)
{
    $attributes_string = [];

    // eğer children varsa "menu-item-has-children" ekleyelim
    if (property_exists($menu_item, 'children') && $this->childmenuCheck($menu_item->children ?? [])) {
        $attributes_string['class'] = ['menu-item-has-children'];
    }

    // Boş bir menü verisi gelmişse direkt dön
    if (empty((array)$menu_item)) {
        return '';
    }

    // Menü öğesini nesneye çevir
    $menu_item = (object)$menu_item;

    // ptype, pname, menulabel gibi property’leri varsa al, yoksa varsayılan değer ata
    $ptype      = property_exists($menu_item, 'ptype') ? $menu_item->ptype : '';
    $pname      = property_exists($menu_item, 'pname') ? $menu_item->pname : '';
    // "menulabel" varsa al, yoksa boş string ata
    $menu_label = property_exists($menu_item, 'menulabel') ? $menu_item->menulabel : '';

    $output = '';

    // 1) Custom URL tipi menü
    if ($ptype === 'custom') {
        // Link aktif mi kontrolü
        if (request()->path() === $menu_item->purl) {
            if (isset($attributes_string['class'])) {
                $attributes_string[] = ['class' => ['current-menu-item']];
            } else {
                $attributes_string['class'][] = 'current-menu-item';
            }
        }
        $output .= $this->render_li_start($pname, $attributes_string, $default_lang);
        $title  = $pname;
        $output .= $this->get_anchor_markup(__($title), [
            'href'   => str_replace('@url', url('/'), $menu_item->purl),
            'target' => $menu_item->antarget ?? '',
        ], $menu_item->icon ?? '');
    }

    // 2) Statik sayfa tipi menü
    elseif ($ptype === 'static') {
        $menu_slug = get_static_option(str_replace('-', '_', $menu_item->pslug) . '_page_slug');
        if (request()->path() == $menu_slug) {
            if (isset($attributes_string['class'])) {
                $attributes_string['class'][] = 'current-menu-item';
            } else {
                $attributes_string['class'] = ['current-menu-item'];
            }
        }
        $page_name = MenuBuilderSetup::multilang() ? '_page_' . $default_lang . '_name' : '_page_name';
        $title     = get_static_option(str_replace('-', '_', $menu_item->pslug) . $page_name) ?? '';

        $output .= $this->render_li_start($pname, $attributes_string, $default_lang);
        $output .= $this->get_anchor_markup(__($title), [
            'href'   => url('/') . '/' . $menu_slug ?? '',
            'target' => $menu_item->antarget ?? '',
        ], $menu_item->icon ?? '');
    }

    // 3) Fruit temasına özel "product Category" tipi menü
    elseif ($ptype === 'product Category') {
        $category = Category::query()
            ->with('subCategory')
            ->find($menu_item->pid);

        if (!$category) {
            return ''; // Kategori bulunamadıysa çık
        }

        $menu_slug = $category->slug;
        if (request()->path() == $menu_slug) {
            if (isset($attributes_string['class'])) {
                $attributes_string['class'][] = 'current-menu-item';
            } else {
                $attributes_string['class'] = ['current-menu-item'];
            }
        }

        // üst kısımda page_name kullanılmamış olsa da orijinal kodda var; dil desteği vb. gerekirse diye tutuyoruz
        $page_name = MenuBuilderSetup::multilang() ? '_page_' . $default_lang . '_name' : '_page_name';

        $title      = strtoupper($category->name);
        $subCatCount = SubCategory::query()
            ->where('category_id', '=', $category->id)
            ->count();

        // Str::contains() ile $menu_label üzerinde 'megamenu' arıyoruz (önceden $menu_item->menulabel idi)
        $output .= $this->render_fruit_li_start(
            $pname,
            $attributes_string,
            $default_lang,
            Str::contains($menu_label, 'megamenu'),
            $subCatCount
        );

        // Anchor
        $output .= '<a href="' . url('/') . '/shop/type/' . $menu_slug . '/category">';
        $output .= '<span>' . $this->turkish_ucwords($title);
        $output .= '<i class="arrow la la-chevron-right" aria-hidden="true"></i></span></a>';

        // alt kategoriler varsa
        if (count($category->subCategory)) {
            $has_megamenu = Str::contains($menu_label, 'megamenu');
            $output .= $this->render_fruit_children_item(
                $category->subCategory,
                $default_lang,
                $has_megamenu,
                $menu_label
            );
        }
    }

    // 4) Eğer "MegaMenus" tespit ettiysek
    else {
        $li_attributes = ['class' => 'menu-item-has-mega-menu'];
        $class_name    = '\\' . $ptype;

        // Eklenti/Modül vs. var mı diye kontrol
        if (class_exists($class_name)) {
            $instance = new $class_name();
            if ($instance->enable()) {
                $static_name = str_replace('[lang]', $default_lang, $instance->name());
                $title       = htmlspecialchars(strip_tags(get_static_option($static_name)));

                $output .= $this->render_li_start($title, $li_attributes, $default_lang);
                // get anchor data
                $output .= $this->get_anchor_markup($title, [
                    'href'   => url('/') . '/' . get_static_option($instance->slug()) ?? '#',
                    'target' => $menu_item->antarget ?? '',
                ], $menu_item->icon ?? '');

                $output .= $instance->render($menu_item->items_id ?? '', $default_lang, 'no_lang');
            }
        }
    }

    // Eğer children (alt menüler) varsa onları da render edelim
    if (property_exists($menu_item, 'children')) {
        $has_megamenu = $this->checkChildrenHasMegaMenu($menu_item->children);
        $output .= $this->render_children_item(
            $menu_item->children,
            $default_lang,
            $has_megamenu ? 'megamenu-wrapper' : ''
        );
    }

    // li kapanışı
    $output .= '</li>';
    return $output;
}


    function turkish_ucwords($str)
    {
        // Türkçe karakterleri doğru şekilde işlemek için UTF-8 kodlamasında çalışıyoruz
        $str = mb_strtolower($str, 'UTF-8');

        // Her kelimenin ilk harfini büyük yap
        $str = preg_replace_callback('/\b\p{L}/u', function ($matches) {
            return mb_strtoupper($matches[0], 'UTF-8');
        }, $str);

        return $str;
    }

    private function checkChildrenHasMegaMenu($children_items)
    {
        $has_megamenu = false;
        foreach ($children_items ?? [] as $item) {
            if (!empty($item)) {
                if (property_exists($item, 'ptype')) {
                    preg_match('/MegaMenus/', $item->ptype, $matches);
                    if (!empty($matches)) {
                        $has_megamenu = true;
                    }
                }
            }

            if ($has_megamenu) {
                return $has_megamenu;
            }
        }
    }

    protected function childmenuCheck(array $param)
    {

        $child_menu_item = 0;
        foreach ($param as $menu_item) {
            if ((is_array($menu_item) || is_object($menu_item)) && !empty((array)$menu_item)) {
                $child_menu_item += 1;
            }
        }
        return !($child_menu_item === 0);
    }

    protected function routeParamCheck(array $param)
    {

        foreach ($param as $key => $value) {
            if (empty($value)) return false;
        }
        return true;
    }


    protected function render_children_item($menu_item, $default_lang, $megamenu = '')
    {
        if (empty((array)$menu_item)) {
            return;
        }
        $output = '';
        $output .= '<ul class="sub-menu ' . $megamenu . '">' . "\n";

        foreach ($menu_item as $ch_item) {
            $this->page_id += 1;
            $output .= $this->render_menu_item($ch_item, $this->page_id, $default_lang);
        }
        $output .= '</ul>' . "\n";
        return $output;
    }

/**
 * Fruit temasında alt kategorileri render eden fonksiyon
 *
 * @param mixed  $menu_item   Alt kategori veya benzeri item listesi
 * @param string $default_lang
 * @param bool   $megamenu    True ise megamenu yapısı, false ise klasik dropdown
 * @param string $menulabel   Megamenu vs. için ekstra veri (örneğin {product-...} ya da {image-...} şeklinde)
 *
 * @return string
 */
protected function render_fruit_children_item($menu_item, $default_lang, $megamenu, $menulabel = '')
{
    // Eğer menü item boşsa direkt return
    if (empty((array)$menu_item)) {
        return '';
    }

    $output = '';

    // Megamenu yapısı ise
    if ($megamenu) {
        $output .= '<ul class="sablon2-level-menu" style="color: #000000 !important;">';
        $output .= '<div class="sablon2-level-menu-left">';

        // Parent kategori slug vs. lazımsa:
        // (Örneğin $menu_item[0]->category->slug gibi)
        $cat_link = url('/') . '/shop/type/category/' . $menu_item[0]->category->slug;

        foreach ($menu_item as $ch_item) {
            $this->page_id += 1;

            $output .= '<div class="sablon2-level-menu-left-item">';

            // -- ALT KATEGORİ LİNKİ (DEĞİŞTİRİLDİ) --
            // Eski:  /shop/type/subcategory/{slug}
            // Yeni:  /shop/type/{slug}/subcategory
            $output .= '<a href="' . url('/') . '/shop/type/' . $ch_item->slug . '/subcategory" 
                            class="sablon2-level-menu-left-item-h">'
                     . $ch_item->name . 
                     '</a>';

            $output .= ' </div>' . "\n";
        }
        $output .= ' </div>' . "\n";

        // getAttr() => eğer menulabel içerisinde product-{id}, image-{id} gibi özel veri varsa
        $output .= $this->getAttr($menulabel, $cat_link);
    }
    // Megamenu değilse klasik sub-menu
    else {
        $output .= '<ul class="second-level-menu">';

        foreach ($menu_item as $ch_item) {
            $this->page_id += 1;
            $output .= '<li>';

            // -- ALT KATEGORİ LİNKİ (DEĞİŞTİRİLDİ) --
            $output .= '<a href="' . url('/') . '/shop/type/' . $ch_item->slug . '/subcategory" class="">'
                     . '<p>' . $ch_item->name . '</p>'
                     . '</a>';

            $output .= '</li>' . "\n";
        }
    }

    $output .= '</ul>' . "\n";

    return $output;
}


    private function getAttr($input, $link = null)
    {
        if (preg_match('/(product|image)-\{(.+?)\}/', $input, $matches)) {
            $type = $matches[1]; // product ya da image
            $datas = explode(', ', $matches[2]); // verileri ayırıyoruz

            $output = '';
            if ($type === 'product') {

                $output .= '<div class="sablon2-level-menu-right" style="background-color: #ffffff; border-left: 1px solid #ffffff; display: flex; justify-content: center; flex-wrap: wrap">';
                $output .= '<div style="width: 100% ; text-align: center; font-size: 18px ; font-weight: 300; ">Bunları nəzərdən keçirin</div>';

                foreach ($datas as $data) {
                    $product = Product::query()
                        ->find($data);

                    if ($product) {
                        $media = get_attachment_image_by_id($product->image_id);
                        $output .= '<a class="sablon2-level-menu-right-product-box text-center" href="' . url('/') . '/shop/product/' . $product->slug . '" style="color: #000000 !important;">';
                        $output .= '<img src="' . $media['img_url'] . '" alt="' . $media['img_alt'] . '">' . $product->name . '</a>';

                    }
                }
                $output .= '</div>';

            } elseif ($type === 'image') {

                $output .= '<div class="sablon2-level-menu-right" style="background-color: #f5f5f5; border-left: 1px solid #ebebeb;">';
                preg_match('/(links)-\{(.+?)\}/', $input, $links);
                $links = explode(', ', $links[2]);


                foreach ($datas as $key => $data) {
                    $mediaDb = MediaUploader::query()
                        ->where('title', '=', $data)
                        ->first();

                    $media = get_attachment_image_by_id($mediaDb->id);

                    $linkImg = $links[$key] ?? $link;
                    $output .= '<p style="margin-bottom: 1rem"><a href="' . $linkImg . '"><img src="' . $media['img_url'] . '" alt="' . $media['img_alt'] . '" 349="" 2="" height="128.2"></a></p>';
                }
                $output .= '</div>';

            }
        } else {
            echo "Geçerli bir string değil!";
        }

        return $output;
    }

    private function get_anchor_markup(string $title, array $args, $icon = null)
    {
        $icon_markup = $icon ? "<i class='" . $icon . "'></i>" : '';
        return "\t\t" . '<a ' . $this->get_attribute_string($args) . '>' . $icon_markup . strip_tags($title) . '</a>' . "\n";
    }
}
