<?php

use App\Http\Controllers\Admin\BusinessHolderUserController;
use App\Http\Controllers\Admin\DigitalCenterAdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\PourashavaAdminController;
use App\Http\Controllers\Admin\PourashavaAdminWalletController;
use App\Http\Controllers\Admin\SebaController;
use App\Http\Controllers\Admin\Settings\BusinessTypeController;
use App\Http\Controllers\Admin\Settings\CapitalRangeController;
use App\Http\Controllers\Admin\Settings\DivisionController;
use App\Http\Controllers\Admin\Settings\OwnershipTypeController;
use App\Http\Controllers\Admin\Settings\PourashavaController;
use App\Http\Controllers\Admin\Settings\UserCardController;
use App\Http\Controllers\Admin\Settings\VillageController;
use App\Http\Controllers\Admin\Settings\WardNumberController;
use App\Http\Controllers\Admin\Settings\ZilaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\PourashavaFrontend\CounselorController;
use App\Http\Controllers\PourashavaFrontend\ImportantApplicationController;
use App\Http\Controllers\PourashavaFrontend\ImportantLinkController;
use App\Http\Controllers\PourashavaFrontend\MainMayorController;
use App\Http\Controllers\PourashavaFrontend\MayorListController;
use App\Http\Controllers\PourashavaFrontend\NoticeController;
use App\Http\Controllers\PourashavaFrontend\PourashavaInformationController;
use App\Http\Controllers\PourashavaFrontend\SliderController;
use App\Http\Controllers\Admin\UserLicenseController;
use Illuminate\Support\Facades\Route;

/**
 * Routes after authenticate
 */
Route::middleware(['auth:admin', 'is_expired'])->name('admin.')->prefix('admin')->group(function () {

    /**
     * super admin route
     */
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');

    Route::middleware('role:super_admin')->group(function () {
        // pourashava_admins routes
        Route::get('pourashava_admins/deactive', [PourashavaAdminController::class, 'deactive'])->name('pourashava_admins.deactive');
        Route::resource('pourashava_admins', PourashavaAdminController::class)->except(['destroy']);
        //Wallet routes
        Route::resource('wallets', WalletController::class)->except(['create', 'edit', 'show', 'destroy']);
        Route::get('wallets/approve/{id}', [WalletController::class, 'approve'])->name('wallets.approve');

        //frontend information route
        Route::resource('information', InformationController::class);
        //seba
        Route::resource('sebas', SebaController::class);

        // settings route
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::resource('divisions', DivisionController::class)->except(['create', 'edit', 'show']);
            Route::resource('zilas', ZilaController::class)->except(['create', 'edit', 'show']);
            Route::resource('pourashavas', PourashavaController::class)->except(['create', 'edit', 'show']);
            Route::resource('user-card', UserCardController::class)->except(['create', 'edit', 'show', 'destroy']);
        });
    });

    Route::middleware('role:pourashava_admin|digital_center_admin')->group(function () {
        // digital center routes
        Route::resource('digital_center_admins', DigitalCenterAdminController::class)->except(['destroy']);
        // e-wallet routes
        Route::resource('pourashava_admin_wallets', PourashavaAdminWalletController::class)->except(['create', 'edit', 'show']);;
        Route::get('pourashava_admin_wallets/request', [PourashavaAdminWalletController::class, 'get_wallet_request'])->name('pourashava_admin_wallets.get_request');
        Route::get('pourashava_admin_wallets/approve/{id}/{amount}', [PourashavaAdminWalletController::class, 'approve'])->name('pourashava_admin_wallets.approve');

        // settings
        Route::prefix('settings')->name('settings.')->group(function () {
            // pourashava ward
            Route::resource("wardnumbers", WardNumberController::class)->except(['create', 'show', 'destroy']);
            //pourashava village
            Route::resource("villages", VillageController::class)->except(['create', 'show', 'destroy']);

            Route::resource("ownerships", OwnershipTypeController::class)->except(['create', 'show', 'destroy']);
            Route::resource("business_types", BusinessTypeController::class)->except(['destroy']);

            Route::resource("capital_ranges", CapitalRangeController::class)->except(['destroy']);

            //pourashava information set up
            Route::resource("pourashava_informations", PourashavaInformationController::class)->except(['show', 'destroy']);
            //main mayor
            Route::resource("main_mayors", MainMayorController::class)->except(['show', 'destroy']);
            //mayor list
            Route::resource("mayor_lists", MayorListController::class)->except(['show', 'destroy']);
            //Counselor
            Route::resource("counselor_lists", CounselorController::class)->except(['show', 'destroy']);
            //important link
            Route::resource("important_links", ImportantLinkController::class)->except(['show', 'destroy']);
            //important application
            Route::resource("important_applications", ImportantApplicationController::class)->except(['show', 'destroy']);
            //notice
            Route::resource("notics", NoticeController::class)->except(['show', 'destroy']);
            //slider
            Route::resource("sliders", SliderController::class)->except(['show', 'destroy']);

        });
    });

   
    Route::middleware('role:super_admin|pourashava_admin|digital_center_admin')->group(function () {
        // business holder user routes
        Route::resource('business_holders', BusinessHolderUserController::class)->except(['destroy']);
        Route::get('/business_holders/card/{id}',[BusinessHolderUserController::class, 'cardPrint'])->name('card_print');
      // user License routes
        Route::get('user_license', [UserLicenseController::class,'index'])->name('user_license.index');
        Route::get('user_license/approve/{id}', [UserLicenseController::class,'approve'])->name('user_license.approve');

    });

    // user routes
    Route::get('users/deactive', [UserController::class, 'deactive'])->name('users.deactive');
    Route::get('users/{user}/card', [UserController::class, 'card'])->name('users.card');
    Route::resource('users', UserController::class)->except(['destroy']);

});
