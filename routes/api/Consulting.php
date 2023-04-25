<?php

use App\Http\Controllers\Api\Consultanting\ConsultantAppointmentController;
use App\Http\Controllers\Api\Consultanting\ConsultantAvailableTimeController;
use App\Http\Controllers\Api\Consultanting\User\BookingConsultantController;
use App\Http\Controllers\Api\Consultanting\ConsultantController;
use App\Http\Controllers\Api\Consultanting\ConsultantingFieldController;
use App\Http\Controllers\Api\Consultanting\ConsultationRequestController;
use App\Http\Controllers\Api\Consultanting\CourseController;
use App\Http\Controllers\Api\Consultanting\ProjectController;
use App\Http\Controllers\Api\Consultanting\RateController;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => ['auth:api']], function () {



    Route::apiResources([
        'consultants-my-availability' => ConsultantAvailableTimeController::class,
        'consultants-my-appointments' => ConsultantAppointmentController::class,
    ]);

    Route::prefix('consultants')->group(function () {



        Route::get('{consultant_id}/availability', [ConsultantAvailableTimeController::class, 'availableTime']);

        Route::get('{counsltant_id}/rates', [RateController::class, 'index']);

        Route::get('{counsltant_id}/projects', [ProjectController::class, 'index']);
        Route::get('{counsltant_id}/courses', [CourseController::class, 'index']);



        Route::prefix('consultations')->group(function () {

            Route::apiResource('requests', ConsultationRequestController::class);
            Route::post('{request_id}/approve', [ConsultationRequestController::class, 'approve']);
            Route::post('{request_id}/disapprove', [ConsultationRequestController::class, 'disapprove']);
            Route::post('{request_id}/finished', [ConsultationRequestController::class, 'finished']);
        });
    });

    Route::prefix('user')->group(function () {

        Route::post('booking-consultants', [BookingConsultantController::class, 'store']);
        Route::get('booking-consultants', [BookingConsultantController::class, 'index']);

        Route::post('{booking_consultant_id}/rates', [RateController::class, 'store']);
    });
});

Route::apiResource('fields', ConsultantingFieldController::class);
Route::apiResource('consultants', ConsultantController::class);


