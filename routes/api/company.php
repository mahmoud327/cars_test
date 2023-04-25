<?php

use App\Http\Controllers\Api\Academy\CourseController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\Network\NetworkHomeController;
use App\Http\Controllers\Api\Network\Partner\PartnerController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\User\Auth\AuthController;
use App\Http\Controllers\Api\User\MyWorkGallaryController;
use App\Http\Controllers\Api\User\PaymentCardController;
use App\Http\Controllers\Api\User\PrivateChatController;
use App\Http\Controllers\Api\User\RateController;
use App\Http\Controllers\Api\User\UserController;
use App\Models\Consultation\BookingConsultant;
use App\Models\Provider\BookService;
use App\Models\Provider\ProviderPackageSubscription;
use App\Models\Provider\ProviderProject;
use Illuminate\Support\Facades\Route;

// use Twilio\Rest\Client;

// // Find your Account SID and Auth Token at twilio.com/console
// // and set the environment variables. See http://twil.io/secure

// Route::get('send-message', function () {


//     // Find your Account SID and Auth Token at twilio.com/console
//     // and set the environment variables. See http://twil.io/secure
//     $sid = 'AC059be9b4ade9d12664b61471ec0530e5';
//     $token = '2d30ea8d4868fe69702584bcea2df790';
//     $twilio = new Client($sid, $token);

//     $message = $twilio->messages
//         ->create(
//             "+201123431046", // to
//             ["body" => "Hi there", "from" => "+2001123431046"]
//         );

//     print($message->sid);
// });
use Twilio\Rest\Client;




Route::post('send-messagdde', function () {


    // Your Account SID and Auth Token from twilio.com/console
    // To set up environmental variables, see http://twil.io/secure
    $account_sid = 'AC059be9b4ade9d12664b61471ec0530e5';
    $auth_token = '2d30ea8d4868fe69702584bcea2df790';
    // In production, these should be environment variables. E.g.:
    // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

    // A Twilio number you own with SMS capabilities
    $twilio_number = "+14344045802";



    $twilio = new Client($account_sid, $auth_token);

    $message = $twilio->messages
        ->create(
            "+966557413998", // to
            ["from" => "+14344045802", "body" => "Hi there"]
        );
    return $message->status;;

    // return sendJsonResponse([],'meessage send');
});

Route::get('php-ini', function () {

   echo phpinfo();

});

Route::prefix('auth')->group(function () {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('forget-password', [AuthController::class, 'forgetPassword']);
    Route::post('new-password', [AuthController::class, 'newPassword']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('resend-code', [AuthController::class, 'resendCode']);
    Route::post('verify-code', [AuthController::class, 'verifyCode']);





    Route::middleware('auth:api')->group(function () {
        Route::get('logout', 'AuthController@logout');
        Route::post('change-password', [AuthController::class, 'changePassword']);
    });
});

Route::get('checkout-payment', [PaymentController::class, 'statusPayment']);


//route rate
Route::middleware('auth:api')->group(function () {

    //show data for user
    Route::post('me', [UserController::class, 'showData']);







    //show data for user
    Route::get('user-subscriptions', [UserController::class, 'userSubscriptions']);

    //courses for user
    Route::post('user-meetings', [UserController::class, 'getUserMeeting']);


    //payment for user
    Route::apiResource('payment-cards', PaymentCardController::class);


    // //payment for user
    // Route::put('payment-card-update',[UserController::class, 'paymentCardUpdate']);


    Route::post('rate-category', [RateController::class, 'rateCatgeory']);


    Route::get('user-checkout', [PaymentController::class, 'index']);






    //route profile for user
    Route::apiResource('my-work-gallaries', MyWorkGallaryController::class);

    Route::post('personal-information', [UserController::class, 'personaInformation']);
    Route::post('display-information', [UserController::class, 'displayInformation']);
    Route::post('study-information', [UserController::class, 'studyInformation']);
    Route::post('career-information', [UserController::class, 'careerInformation']);
    Route::post('residence-information', [UserController::class, 'ResidenceInformation']);
    Route::get('fileds', [UserController::class, 'getFiled']);
    Route::post('contact-info', [UserController::class, 'contactInfo']);
    Route::post('notification-settings', [UserController::class, 'notificationSettings']);
});



//faqs
Route::get('faqs', [FaqController::class, 'index']);
Route::get('faq-categories', [FaqController::class, 'faqCategory']);

///route for partner for home page
Route::get('partner-home', [PartnerController::class, 'partnerHome']);

///route for courses for home page
Route::get('courses-home', [CourseController::class, 'courseHome']);

///route for banners for home page
Route::get('banners', [HomeController::class, 'getBanners']);

///display-information for user
Route::get('display-information/{user_id}', [HomeController::class, 'displayInformationUser']);

//statistics for invest network
Route::get('statistics-network', [NetworkHomeController::class, 'statisticNetwork']);

Route::get('what-do-subscribers-say', [HomeController::class, 'whatDoSubscribersay']);

//get regions
Route::get('cities', [HomeController::class, 'getCity']);
Route::get('regions', [HomeController::class, 'getRegion']);
Route::get('countries', [HomeController::class, 'getCountry']);


// Route::post('provider/{user_id}', [HomeController::class, 'profileUser']);
Route::post('profile/{user_id}', [HomeController::class, 'profileUser']);
