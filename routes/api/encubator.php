<?php

use App\Http\Controllers\Api\Encubator\Feature\FeatureController;
use App\Http\Controllers\Api\Encubator\PackageController;
use App\Http\Controllers\Api\Encubator\DepartmentController;
use App\Http\Controllers\Api\Encubator\Phase\PhaseController;
use App\Http\Controllers\Api\Encubator\Project\ProjectController;
use App\Http\Controllers\Api\Encubator\Stage\StageController;
use App\Http\Controllers\Api\Encubator\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('project-categories', [ProjectCategoriesController::class, 'index']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('user-checkout', [SubscriptionController::class, 'userCheckout']);
    Route::post('user-checkout-package-free', [SubscriptionController::class, 'CheckoutPackageFree']);

});


//group for api resource
Route::apiResources([
    'packages' =>  PackageController::class,

    'stages' =>  StageController::class,

    'departments' =>  DepartmentController::class,

    'phases' =>  PhaseController::class,

    'projects' =>  ProjectController::class,


]);
