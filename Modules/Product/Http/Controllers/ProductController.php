<?php

namespace Modules\Product\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Mail\ProductOrderEmail;
use App\Mail\StockOutEmail;
use App\Models\Language;
use App\Models\ProductReviews;
use App\Models\Status;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Modules\Attributes\Entities\Brand;
use Modules\Attributes\Entities\Category;
use Modules\Attributes\Entities\ChildCategory;
use Modules\Attributes\Entities\Color;
use Modules\Attributes\Entities\DeliveryOption;
use Modules\Attributes\Entities\Size;
use Modules\Attributes\Entities\SubCategory;
use Modules\Attributes\Entities\Tag;
use Modules\Attributes\Entities\Unit;
use Modules\Badge\Entities\Badge;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductChildCategory;
use Modules\Product\Entities\ProductDeliveryOption;
use Modules\Product\Entities\ProductGallery;
use Modules\Product\Entities\ProductInventory;
use Modules\Product\Entities\ProductInventoryDetail;
use Modules\Product\Entities\ProductInventoryDetailAttribute;
use Modules\Product\Entities\ProductSize;
use Modules\Product\Entities\ProductSubCategory;
use Modules\Product\Entities\ProductTag;
use Modules\Product\Entities\ProductUom;
use Modules\Product\Exports\ProductsExport;
use Modules\Product\Exports\ProductsExportExample;
use Modules\Product\Exports\ProductsExportExampleVariant;
use Modules\Product\Http\Requests\ProductStoreRequest;
use Modules\Product\Http\Services\Admin\AdminProductServices;
use Modules\Product\Imports\ProductsImport;
use Modules\Product\Imports\ProductsImportVariant;
use Modules\Product\Imports\ProductsXmlImport;
use Modules\TaxModule\Entities\TaxClass;
use SimpleXMLElement;
use Stripe\Service\ProductService;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class ProductController extends Controller
{
    const BASE_PATH = '';

    public function __construct()
    {
        $this->middleware("auth:admin");
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        //  $this->setAllDb();
        $products = AdminProductServices::productSearch($request);
        $trash = Product::onlyTrashed()->count();
        $statuses = Status::all();

        return view('product::index', compact("products", "statuses", "trash"));
    }

    public function setAllDb()
    {
        $langList = Language::all();

        /* Page */
        $products = Product::get();

        foreach ($products as $product) {
            $productUpdateData = Product::query()
                ->find($product->id);
            $nameList = [];
            $slugList = [];
            $productSummaryList = [];
            $productDescriptionList = [];

            foreach ($langList as $lang) {
                $content = $product->name;
                if (!is_array(json_decode($content, true))) {
                    $nameList[$lang->slug] = $product->name;
                }

                $productUpdateData->name = $nameList;

                $content = $product->slug;
                if (!is_array(json_decode($content, true))) {
                    $slugList[$lang->slug] = $product->slug;
                }
                $productUpdateData->slug = $slugList;

                $content = $product->summary;
                if (!is_array(json_decode($content, true))) {
                    $productSummaryList[$lang->slug] = $product->summary;
                }

                $productUpdateData->summary = $productSummaryList;

                $content = $product->description;
                if (!is_array(json_decode($content, true))) {
                    $productDescriptionList[$lang->slug] = $product->description;
                }
            }


            $productUpdateData->description = $productDescriptionList;

            $productUpdateData->save();

        }
        try {


            /* Blog Category
            $blogCategories = BlogCategory::get();

            foreach ($blogCategories as $blogCategory) {
                $blogCategoryUpdateData = BlogCategory::query()
                    ->find($blogCategory->id);
                $titleList = [];

                foreach ($langList as $lang) {
                    $content = $blogCategory->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $blogCategory->title;
                    }

                    $blogCategoryUpdateData->title = $titleList;


                }

                $blogCategoryUpdateData->save();

            }
 */
            /* Blog
            $blogs = Blog::get();

            foreach ($blogs as $blog) {
                $blogUpdateData = Blog::query()
                    ->find($blog->id);
                $titleList = [];
                $slugList = [];
                $pageContentList = [];

                foreach ($langList as $lang) {
                    $content = $blog->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $blog->title;
                    }

                    $blogUpdateData->title = $titleList;

                    $content = $blog->slug;
                    if (!is_array(json_decode($content, true))) {
                        $slugList[$lang->slug] = $blog->slug;
                    }

                    $blogUpdateData->slug = $slugList;
                    $content = $blog->blog_content;
                    if (!is_array(json_decode($content, true))) {
                        $blogContentList[$lang->slug] = $blog->blog_content;
                    }
                $blogUpdateData->blog_content = $blogContentList;
                }


                $blogUpdateData->save();

            }
 */
            /* Blog Update
            $blogs = Blog::get();

            foreach ($blogs as $blog) {
                $blogUpdateData = Blog::query()
                    ->find($blog->id);
                $excerptList = [];

                foreach ($langList as $lang) {
                    $content = $blog->excerpt;
                    if (!is_array(json_decode($content, true))) {
                        $excerptList[$lang->slug] = $blog->excerpt;
                    }
                    $blogUpdateData->excerpt = $excerptList;

                }


                $blogUpdateData->save();

            }
*/
            /* Coupon
            $coupons = Coupon::get();

            foreach ($coupons as $coupon) {
                $couponUpdateData = Coupon::query()
                    ->find($coupon->id);
                $nameList = [];
                $descriptionList = [];

                foreach ($langList as $lang) {
                    $content = $coupon->name;
                    if (!is_array(json_decode($content, true))) {
                        $nameList[$lang->slug] = $coupon->name;
                    }

                    $couponUpdateData->name = $nameList;

                    $content = $coupon->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $coupon->description;
                    }

                    $couponUpdateData->description = $descriptionList;

                }

                $couponUpdateData->save();

            }
*/
            /* PricePlan
            $pricePlans = PricePlan::get();

            foreach ($pricePlans as $pricePlan) {
                $pricePlanUpdateData = PricePlan::query()
                    ->find($pricePlan->id);
                $titleList = [];
                $packageBadgeList = [];
                $descriptionList = [];

                foreach ($langList as $lang) {
                    $content = $pricePlan->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $pricePlan->title;
                    }
                    $pricePlanUpdateData->title = $titleList;

                    $content = $pricePlan->package_badge;
                    if (!is_array(json_decode($content, true))) {
                        $packageBadgeList[$lang->slug] = $pricePlan->package_badge;
                    }
                    $pricePlanUpdateData->package_badge = $packageBadgeList;

                    $content = $pricePlan->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $pricePlan->description;
                    }
                    $pricePlanUpdateData->description = $descriptionList;

                }

                $pricePlanUpdateData->save();

            }
 */
            /* MetaInfo
            $metaInfos = MetaInfo::get();

            foreach ($metaInfos as $metaInfo) {
                $metaInfoUpdateData = MetaInfo::query()
                    ->find($metaInfo->id);
                $titleList = [];
                $descriptionList = [];
                $imageList = [];
                $fbTitleList = [];
                $fbDescriptionList = [];
                $fbImageList = [];
                $twTitleList = [];
                $twDescriptionList = [];
                $twImageList = [];

                foreach ($langList as $lang) {
                    $content = $metaInfo->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $metaInfo->title;
                    }
                    $metaInfoUpdateData->title = $titleList;

                    $content = $metaInfo->description;
                    if (!is_array(json_decode($content, true))) {
                        $descriptionList[$lang->slug] = $metaInfo->description;
                    }
                    $metaInfoUpdateData->description = $descriptionList;

                    $content = $metaInfo->image;
                    if (!is_array(json_decode($content, true))) {
                        $imageList[$lang->slug] = $metaInfo->image;
                    }
                    $metaInfoUpdateData->image = $imageList;

                    $content = $metaInfo->fb_title;
                    if (!is_array(json_decode($content, true))) {
                        $fbTitleList[$lang->slug] = $metaInfo->fb_title;
                    }
                    $metaInfoUpdateData->fb_title = $fbTitleList;

                    $content = $metaInfo->fb_description;
                    if (!is_array(json_decode($content, true))) {
                        $fbDescriptionList[$lang->slug] = $metaInfo->fb_description;
                    }
                    $metaInfoUpdateData->fb_description = $fbDescriptionList;

                    $content = $metaInfo->fb_image;
                    if (!is_array(json_decode($content, true))) {
                        $fbImageList[$lang->slug] = $metaInfo->fb_image;
                    }
                    $metaInfoUpdateData->fb_image = $fbImageList;

                    $content = $metaInfo->tw_title;
                    if (!is_array(json_decode($content, true))) {
                        $twTitleList[$lang->slug] = $metaInfo->tw_title;
                    }
                    $metaInfoUpdateData->tw_title = $twTitleList;

                    $content = $metaInfo->tw_description;
                    if (!is_array(json_decode($content, true))) {
                        $twDescriptionList[$lang->slug] = $metaInfo->tw_description;
                    }
                    $metaInfoUpdateData->tw_description = $twDescriptionList;

                    $content = $metaInfo->tw_image;
                    if (!is_array(json_decode($content, true))) {
                        $twImageList[$lang->slug] = $metaInfo->tw_image;
                    }
                    $metaInfoUpdateData->tw_image = $twImageList;
                }

                $metaInfoUpdateData->save();

            }
*/
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = [
            "brands" => Brand::select("id", "name")->get(),
            "badges" => Badge::where("status", "active")->get(),
            "units" => Unit::select("id", "name")->get(),
            "tags" => Tag::select("id", "tag_text as name")->get(),
            "categories" => Category::select("id", "name")->get(),
            "deliveryOptions" => DeliveryOption::select("id", "title", "sub_title", "icon")->get(),
            "all_attribute" => ProductAttribute::all()->groupBy('title')->map(fn($query) => $query[0]),
            "product_colors" => Color::all(),
            "product_sizes" => Size::all(),
            "tax_classes" => TaxClass::all()
        ];

        return view('product::create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductStoreRequest $request
     * @return JsonResponse
     */

    public function store(ProductStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

//        \DB::beginTransaction();
//        try {
        $product = (new AdminProductServices)->store($request->input());
//            \DB::commit();
//        } catch (\Exception $exception)
//        {
//            \DB::rollBack();
//            return response(['success' => false]);
//        }

        return response()->json($product ? ["success" => true] : ["success" => false]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, $aria_name = null)
    {

        $data = [
            "brands" => Brand::select("id", "name")->get(),
            "badges" => Badge::where("status", "active")->get(),
            "units" => Unit::select("id", "name")->get(),
            "tags" => Tag::get(),
            "tag" => ProductTag::query()->where('product_id', '=', $id)->first(),
            "categories" => Category::select("id", "name")->get(),
            "deliveryOptions" => DeliveryOption::select("id", "title", "sub_title", "icon")->get(),
            "all_attribute" => ProductAttribute::all()->groupBy('title')->map(fn($query) => $query[0]),
            "product_colors" => Color::all(),
            "product_sizes" => Size::all(),
            "tax_classes" => TaxClass::all(),
            'aria_name' => $aria_name
        ];

        $product = (new AdminProductServices)->get_edit_product($id);
        $subCat = $product?->subCategory?->id ?? null;
        $cat = $product?->category?->id ?? null;

        $sub_categories = SubCategory::select("id", "name")->where("category_id", $cat)->where("status_id", 1)->get();
        $child_categories = ChildCategory::select("id", "name")->where("sub_category_id", $subCat)->where("status_id", 1)->get();

        return view('product::edit', compact("data", "product", "sub_categories", "child_categories"));
    }

    /**
     * Update the specified resource in storage.
     * @param ProductStoreRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ProductStoreRequest $request, $id)
    {

        $data = $request->validated();


        return response()->json((new AdminProductServices)->update($request->input(), $id) ? ["success" => true] : ["success" => false]);
    }

    private function validateUpdateStatus($req): array
    {
        return Validator::make($req, [
            "id" => "required",
            "status_id" => "required"
        ])->validated();
    }

    public function update_status(Request $request)
    {
        $data = $this->validateUpdateStatus($request->all());

        return (new AdminProductServices)->updateStatus($data["id"], $data["status_id"]);
    }

    public function clone($id)
    {
        return (new AdminProductServices)->clone($id) ? back()->with(FlashMsg::clone_succeed('Product')) : back()->with(FlashMsg::clone_failed('Product'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json((new AdminProductServices)->delete($id) ? ["success" => true, "msg" => "Product deleted successfully"] : ["success" => false]);
    }

    public function bulk_destroy(Request $request): JsonResponse
    {
        return response()->json((new AdminProductServices)->bulk_delete_action($request->ids) ? ["success" => true] : ["success" => false]);
    }

    public function trash(): Renderable
    {
        $products = Product::with('category', 'subCategory', 'childCategory')->onlyTrashed()->get();
        return view('product::trash', compact("products"));
    }

    public function restore($id)
    {
        $restore = Product::onlyTrashed()->findOrFail($id)->restore();
        return back()->with($restore ? FlashMsg::restore_succeed('Trashed Product') : FlashMsg::restore_failed('Trashed Product'));
    }

    public function trash_delete($id)
    {
        return (new AdminProductServices)->trash_delete($id) ? back()->with(FlashMsg::delete_succeed('Trashed Product')) : back()->with(FlashMsg::delete_failed('Trashed Product'));
    }

    public function trash_bulk_destroy(Request $request)
    {
        return response()->json((new AdminProductServices)->trash_bulk_delete_action($request->ids) ? ["success" => true] : ["success" => false]);
    }

    public function trash_empty(Request $request)
    {
        $ids = explode('|', $request->ids);
        return response()->json((new AdminProductServices)->trash_bulk_delete_action($ids) ? ["success" => true] : ["success" => false]);
    }

    public function productSearch(Request $request): string
    {
        $products = AdminProductServices::productSearch($request);
        $statuses = Status::all();

        return view('product::search', compact("products", "statuses"))->render();
    }

    public function productReview()
    {
        $review_list = ProductReviews::paginate(10);
        return view('product::review', compact('review_list'));
    }

    public function settings()
    {
        return view('product::settings');
    }

    public function settings_update(Request $request)
    {
        $validated = $request->validate([
            'product_title_length' => 'nullable|integer',
            'product_description_length' => 'nullable|integer',
            'phone_screen_products_card' => 'nullable|integer|min:1|max:3'
        ]);

        foreach ($validated as $index => $value) {
            update_static_option($index, $value);
        }

        return back()->with(FlashMsg::update_succeed('Product global settings'));
    }

    public function csvImportExportPage(Request $request)
    {
        return view('product::csv-import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        if ($request->input('import_type') == 'variant') {

            Excel::import(new ProductsImportVariant, $request->file('file'));
            return redirect()->back()->with('success', __('Variants Imported Successfully!'));
        } else {
            Excel::import(new ProductsImport, $request->file('file'));
            return redirect()->back()->with('success', __('Products Imported Successfully!'));
        }
    }

    public function xmlImportExportPage(Request $request)
    {
        return view('product::xml-import');
    }

    public function importXml(Request $request)
    {
        $request->validate([
            'url' => 'required'
        ]);

        $url = $request->input('url');  // Dinamik olarak URL'yi alıyoruz

        // URL'yi içeren bir array oluşturuyoruz ve import işlemini başlatıyoruz
        $data = [['url' => $url]];
        // XML verisini import etme
        $import = new ProductsXmlImport();
        $import->import($url);  // Veriyi import ediyoruz
        return redirect()->back()->with('success', __('Products Imported Successfully!'));
    }

    public function downloadXml()
    {
        $produucts = Product::all();

        // Örnek veri - Bu veriler veritabanından da gelebilir
        $items = [
            [
                'id' => '1732',
                'link' => 'https://turbanmoda.az/turban-P1732',
                'title' => get_static_option('site_title'),
                'image_link' => 'https://turbanmoda.az/images/product/product_WhatsApp-Şəkil-2024-09-04-saat-16.00.00_6c2e9c8b79448730528345.jpg',
                'price' => '11.00 AZN'
            ],
            [
                'id' => '1731',
                'link' => 'https://turbanmoda.az/turban-P1731',
                'title' => 'Turban',
                'image_link' => 'https://turbanmoda.az/images/product/product_WhatsApp-Şəkil-2024-09-04-saat-16.00.00_1182cc7c8921314357647.jpg',
                'price' => '11.00 AZN'
            ]
        ];

        // XML yapısını oluştur
        $rss = new SimpleXMLElement('<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0"></rss>');
        $domain = \Illuminate\Support\Facades\Request::root();

        // 'channel' elemanı ekle
        $channel = $rss->addChild('channel');
        $channel->addChild('title', get_static_option('site_title'));
        $channel->addChild('description', get_static_option('site_meta_description'));
        $channel->addChild('link', $domain);

        // Her bir ürünü döngü ile ekle

        foreach ($produucts as $produuct) {
            $item = $channel->addChild('item');
            $item->addChild('g:id', $produuct->id);
            $item->addChild('g:link', route(route_prefix() . 'shop.product.details', $produuct->getTranslation('slug', 'az')));
            $item->addChild('g:title', $produuct->getTranslation('name', 'az'));

            // CDATA description
            $description = $item->addChild('g:description', $produuct->getTranslation('description', 'az'));
            $descriptionNode = dom_import_simplexml($description);
            $cdata = $descriptionNode->ownerDocument->createCDATASection('');
            $descriptionNode->appendChild($cdata);

            $signature_img = get_attachment_image_by_id($produuct->image_id);
            if (!empty($signature_img)) {
                if (!empty($signature_img['img_url'])) {
                    $image = $signature_img['img_url'];
                } else {
                    $image = null;
                }
            } else {
                $image = null;
            }

            $item->addChild('g:image_link', $image);

            $brand = Brand::query()
                ->find($produuct->brand_id);


            $item->addChild('g:brand', $brand?->name);
            $item->addChild('g:condition', 'new');
            $item->addChild('g:availability', 'in stock');
            $item->addChild('g:price', $produuct->sale_price . ' AZN');

            // 'shipping' kısmı
            $shipping = $item->addChild('g:shipping', null);
            $shipping->addChild('g:country', 'AZ');
            $shipping->addChild('g:service', 'Standart');
            $shipping->addChild('g:price', ' AZN');
        }

        // XML çıktısını string olarak al
        $xmlContent = $rss->asXML();

        // XML çıktısını dosya olarak indirme yanıtı
        $fileName = 'product.xml';
        return Response::make($xmlContent, 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
        ]);
    }

    public function exportExample()
    {
        return Excel::download(new ProductsExportExample, 'products.xlsx');
    }

    public function exportExampleVariant()
    {
        return Excel::download(new ProductsExportExampleVariant, 'product-variants.xlsx');
    }

    public function export(Request $request)
    {
        return Excel::download(new ProductsExport($request->all()), 'export-products.xlsx');
    }
}
