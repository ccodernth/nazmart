<?php

use Modules\Campaign\Http\Controllers\CampaignController;
use Modules\Campaign\Http\Controllers\FrontendCampaignController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Middleware\Tenant\InitializeTenancyByDomainCustomisedMiddleware;

Route::middleware([
    'web',
//    InitializeTenancyByDomain::class,
    InitializeTenancyByDomainCustomisedMiddleware::class,
    PreventAccessFromCentralDomains::class,
    'auth:admin',
    'tenant_admin_glvar',
    'package_expire',
    'set_lang',
    'tenantAdminPanelMailVerify',
//    'tenant_feature_permission'
    \App\Http\Middleware\Tenant\TenantCheckPermission::class
])->group(function () {
    Route::group(['as' => 'frontend.products.'], function () {
        /**--------------------------------
         *          CAMPAIGN ROUTES
         * ---------------------------------*/
        Route::get('campaign/{id}/{any?}', [FrontendCampaignController::class, 'campaignPage'])->name('campaign');
    });

    /**--------------------------------------------------------------------------------------------------------------------------------
     *                          ADMIN PANEL ROUTES
     *----------------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'admin-home', 'as' => 'tenant.'] ,function () {
        /*------------------------------------------
            CAMPAIGN MODULES ADMIN PANEL
         ------------------------------------------*/
        Route::prefix('campaigns')->name('admin.campaign.')->group(function () {
            Route::controller(CampaignController::class)->group(function (){
                Route::get('/', 'index')->name('all');
                Route::get('new', 'create')->name('new');

                Route::post('new', 'store');
                Route::get('edit/{item}', 'edit')->name('edit');
                Route::post('update', 'update')->name('update');
                Route::post('delete/{item}', 'destroy')->name('delete');
                Route::post('bulk-action', 'bulk_action')->name('bulk.action');
                // CAMPAIGN PRODUCT
                Route::post('delete-product', 'deleteProductSingle')->name('delete.product');
                Route::get('price', 'getProductPrice')->name('product.price');
            });
        });
    });
});
