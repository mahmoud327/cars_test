<?php

use App\Http\Controllers\Api\Network\Blog\BlogCategoryController;
use App\Http\Controllers\Api\Network\Blog\BlogController;
use App\Http\Controllers\Api\Network\Blog\BlogTagController;
use App\Http\Controllers\Api\Network\Category\NetworkCategoryController;
use App\Http\Controllers\Api\Network\Exhibition\ExhibitionController;
use App\Http\Controllers\Api\Network\Meeting\MeetingCategoryController;
use App\Http\Controllers\Api\Network\Meeting\MeetingController;
use App\Http\Controllers\Api\Network\Model\ModelController;
use App\Http\Controllers\Api\Network\NetworkHomeController;
use App\Http\Controllers\Api\Network\MyAddController;
use App\Http\Controllers\Api\Network\Offer\OfferCategoryController;
use App\Http\Controllers\Api\Network\Offer\OfferController;
use App\Http\Controllers\Api\Network\PackageController;
use App\Http\Controllers\Api\Network\Partner\PartnerController;
use App\Http\Controllers\Api\Network\PoudcastController;
use App\Http\Controllers\Api\Network\Project\ProjectCategoryController;
use App\Http\Controllers\Api\Network\Project\ProjectController;
use App\Http\Controllers\Api\Network\ProjectOfferController;
use App\Http\Controllers\Api\Network\ExhibitionShareController;
use App\Http\Controllers\Api\Network\Story\StoryController;
use App\Http\Controllers\Api\Network\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api']], function () {

    ////////////////////////home netowrk api//////////////////////////////////////////
    Route::get('home-exhibitions', [NetworkHomeController::class, 'homeExhibitions']);

    //home projects api
    Route::get('home-projects', [NetworkHomeController::class, 'homeProject']);

    //home stories api
    Route::get('home-stories', [NetworkHomeController::class, 'homeStories']);

    //home meeting api
    Route::get('home-meetings', [NetworkHomeController::class, 'homeMeeting']);

    //home meeting api
    Route::get('home-models', [NetworkHomeController::class, 'homeModel']);

    //home blogs api
    Route::get('home-blogs', [NetworkHomeController::class, 'homeBlog']);

    ////////////////////////////////end route from page network////////////////////////////

    //group for api resource
    Route::apiResources([
        'offers' =>  OfferController::class,
        'my-adds' =>  MyAddController::class,
        'projects' =>  ProjectController::class,
        'stories' =>  StoryController::class,
        'exhibitions' =>  ExhibitionController::class,
        'poudcasts' =>  PoudcastController::class,
        'meetings' =>  MeetingController::class,
        'models' =>  ModelController::class,
    ]);

    Route::get('project-offers', [ProjectOfferController::class, 'index']);

    Route::prefix('project-offers')->group(function () {

        Route::post('{project_offers_id}/approve', [ProjectOfferController::class, 'approve']);
        Route::post('{project_offers_id}/disapprove', [ProjectOfferController::class, 'disapprove']);
    });


    Route::get('offers-categories', [OfferCategoryController::class, 'index']);

    //latest-offers
    Route::get('latest-offers', [OfferController::class, 'latestOffer']);

    ////////////////////////////////start-route-for projects///////////////////////////////////
    //projects
    Route::get('projects-categories', [ProjectCategoryController::class, 'index']);
    //statistics for invest project
    Route::get('statistics-projects', [ProjectController::class, 'statisticProject']);

    //projects for physical project get 8 in pagination
    Route::get('physical-projects-list-8', [ProjectController::class, 'physicalProjectList8']);

    //projects for moral project get 8 in pagination
    Route::get('moral-projects-list-8', [ProjectController::class, 'moralProjectList8']);

    //projects for physical project get 4 in pagination
    Route::get('physical-projects-list-4', [ProjectController::class, 'physicalProjectList4']);

    //projects for moral project get 4 in pagination
    Route::get('moral-projects-list-4', [ProjectController::class, 'moralProjectList4']);

    //projects for moral project get 4 in pagination
    Route::post('project-user-offers', [ProjectController::class, 'projectUserOffer']);

    //projects-end-this-week
    Route::get('projects-end-this-week', [ProjectController::class, 'ProjectEndThisWeek']);

    /////////////////////////////////////end route for projects///////////////////////////////

    //stories
    Route::get('stoy/{user_id}', [StoryController::class, 'storyUser']);
    Route::get('current-story', [StoryController::class, 'currentStory']);
    Route::get('distinguished-stories', [StoryController::class, 'distinguishedStory']);

    //exhibitions
    Route::apiResource('exhibition-shares', ExhibitionShareController::class);

    Route::prefix('exhibitions')->group(function () {

        Route::get('{exhibitions_id}/participate-requests', [ExhibitionShareController::class, 'index']);
        Route::post('participate-requests/{share_id}/approve', [ExhibitionShareController::class, 'approve']);
        Route::post('participate-requests/{share_id}/disapprove', [ExhibitionShareController::class, 'disapprove']);
    });


    Route::post('toggle-favourite', [ExhibitionController::class, 'toggleFavourite']);
    Route::get('list-favourites', [ExhibitionController::class, 'listFavourites']);

    //latest-exhibitions
    Route::get('latest-exhibitions', [ExhibitionController::class, 'latestExhibition']);

    //blogs
    Route::apiResource('blogs', BlogController::class);
    Route::get('my-blogs', [BlogController::class, 'myBlog']);

    //latest-blogs
    Route::get('latest-blogs', [BlogController::class, 'latestBlog']);

    Route::get('blogs-tags', [BlogTagController::class, 'index']);
    Route::get('blogs-categories', [BlogCategoryController::class, 'index']);

    //models

    //latest-models
    Route::get('latest-models', [ModelController::class, 'latestModel']);
    Route::post('download-model/{model_id}', [ModelController::class, 'downloadModel']);
    Route::get('my-downloads-models', [ModelController::class, 'myDownloadModel']);

    //poudcasts
    Route::get('latest-poudcasts', [PoudcastController::class, 'latestPoudcast']);

    //meetings
    Route::get('other-meetings/{id}', [MeetingController::class, 'otherMeeting']);
    Route::post('user-cancel-meeting', [MeetingController::class, 'userCancelMeeting']);
    Route::post('meeting-join', [MeetingController::class, 'meetingJoin']);
    Route::apiResource('meetings-categories', MeetingCategoryController::class);

    //partners
    Route::apiResource('partners', PartnerController::class);
    Route::post('modiy-company-data', [PartnerController::class, 'modiyCompanyData']);



    //network-schedule
    Route::get('network-schedule', [MeetingController::class, 'networkSchedule']);

    //user-subscriptions
    Route::get('user-subscriptions', [SubscriptionController::class, 'getUserSubscription']);
    Route::post('user-prepare-checkout', [SubscriptionController::class, 'userCheckoutPrepare']);
    Route::post('user-checkout', [SubscriptionController::class, 'userCheckout']);



    Route::post('user-checkout-package-free', [SubscriptionController::class, 'userCheckoutPackageFree']);

    Route::post('recharge-balance', [SubscriptionController::class, 'rechargeBalance']);
    Route::get('recharge-balance', [SubscriptionController::class, 'getRechargeBalance']);

    //members
    Route::get('members', [PartnerController::class, 'members'])->name('network.members');
});


Route::get('categories', [NetworkCategoryController::class, 'index']);

//pacackes
Route::apiResource('packages', PackageController::class);

//network-schedule
Route::get('network-schedule', [MeetingController::class, 'networkSchedule']);

//home members api
Route::get('home-members', [NetworkHomeController::class, 'homeMember']);
Route::get('home-banners', [NetworkHomeController::class, 'homeBanner']);
