<?php

use Modules\Product\Http\Controllers\CategoryController;
use Modules\Product\Http\Controllers\ProductController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Modules\Product\Http\Middleware\ProductLimitMiddleware;
use App\Http\Middleware\Tenant\InitializeTenancyByDomainCustomisedMiddleware;

Route::middleware([
    'web',
    InitializeTenancyByDomainCustomisedMiddleware::class,
    PreventAccessFromCentralDomains::class,
    'auth:admin',
    'tenant_admin_glvar',
    'package_expire',
    'tenantAdminPanelMailVerify',
    'set_lang'
])->prefix('admin-home')->name('tenant.')->group(function () {
    /*==============================================
                    PRODUCT MODULE
    ==============================================*/
    Route::prefix('product')->as("admin.product.")->group(function (){
        Route::controller(ProductController::class)->group(function (){
            Route::get("all",'index')->name("all");
            Route::get("create","create")->name("create");
            Route::post("create","store")->middleware(ProductLimitMiddleware::class);
            Route::post("status-update","update_status")->name("update.status");
            Route::get("update/{id}/{aria_name?}", "edit")->name("edit");
            Route::post("update/{id}", "update");
            Route::get("destroy/{id}", "destroy")->name("destroy");
            Route::get("clone/{id}", "clone")->name("clone")->middleware(ProductLimitMiddleware::class);
            Route::post("bulk/destroy", "bulk_destroy")->name("bulk.destroy");
            Route::get("search","productSearch")->name("search");

            Route::get("settings","settings")->name("settings");
            Route::post("settings","settings_update");

            Route::get("review","productReview")->name("review");
            Route::get("csv-import","csvImportExportPage")->name("csv-import");
            Route::post("excel-import","import")->name("excel-import");
            Route::post("excel-export","export")->name("excel-export");
            Route::get("excel-export-example","exportExample")->name("excel-export-example");
            Route::get("excel-export-example-variant","exportExampleVariant")->name("excel-export-example-variant");
            Route::get("xml-import","xmlImportExportPage")->name("xml-import");
            Route::post("xml-import","importXml")->name("xml-import");

            Route::get("download-xml","downloadXml")->name("download-xml");


            Route::prefix('trash')->name('trash.')->group(function (){
                Route::get('/', 'trash')->name('all');
                Route::get('/restore/{id}', 'restore')->name('restore');
                Route::get('/delete/{id}', 'trash_delete')->name('delete');
                Route::post("/bulk/destroy", "trash_bulk_destroy")->name("bulk.destroy");
                Route::post("/empty", "trash_empty")->name("empty");
            });
        });
    });

    /*==============================================
                    Product Module Category Route
    ==============================================*/
    Route::prefix("category")->as("admin.category.")->group(function (){
        Route::controller(CategoryController::class)->group(function (){
            Route::post("category","getCategory")->name("all");
            Route::post("sub-category","getSubCategory")->name("sub-category");
            Route::post("child-category","getChildCategory")->name("child-category");
        });
    });
});
