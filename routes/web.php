<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RthomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/change-password', [AuthenticationController::class, 'showChangePasswordForm'])->name('password_change');
Route::post('/change-password', [AuthenticationController::class, 'changePassword']);
Route::get('/change-password-done', [AuthenticationController::class, 'showChangePasswordDoneForm'])->name('password_change_done');

Route::get('/signup', [AuthenticationController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthenticationController::class, 'handleSignup']);

Route::get('/profile-photo/upload', [AuthenticationController::class, 'showUploadProfilePhotoForm'])->name('upload_profile_photo');
Route::post('/profile-photo/upload', [AuthenticationController::class, 'handleUploadProfilePhoto']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [RthomeController::class, 'home'])->name('home');
    Route::get('/post-edit', [RthomeController::class, 'postEdit'])->name('post_edit');
    Route::get('/ticket/create', [RthomeController::class, 'createTicket'])->name('create_ticket');
    Route::post('/ticket/create', [RthomeController::class, 'storeTicket']);
    Route::get('/ticket/{ticket_id}/edit', [RthomeController::class, 'editTicket'])->name('edit_ticket');
    Route::patch('/ticket/{ticket_id}/edit', [RthomeController::class, 'updateTicket']);
    Route::get('/ticket/{ticket_id}/delete', [RthomeController::class, 'deleteTicket'])->name('delete_ticket');
    Route::delete('/ticket/{ticket_id}/delete', [RthomeController::class, 'destroyTicket']);
    Route::get('/ticket/create-with-review', [RthomeController::class, 'createTicketAndReview'])->name('create_ticket_and_review');
    Route::get('/ticket/{ticket_id}/review/create', [RthomeController::class, 'createReview'])->name('create_review');
    Route::post('/ticket/{ticket_id}/review/create', [RthomeController::class, 'storeReview']);
    Route::get('/ticket/{ticket_id}/error_review', [RthomeController::class, 'errorReview'])->name('error_review');
    Route::get('/ticket/{ticket_id}/error_change_ticket', [RthomeController::class, 'errorChangeTicket'])->name('error_change_ticket');
    Route::get('/ticket/{ticket_id}/review/{review_id}/error_change_review', [RthomeController::class, 'errorChangeReview'])->name('error_change_review');
    Route::get('/ticket/{ticket_id}/review/{review_id}/edit', [RthomeController::class, 'editReview'])->name('edit_review');
    Route::patch('/ticket/{ticket_id}/review/{review_id}/edit', [RthomeController::class, 'updateReview']);
    Route::get('/ticket/{ticket_id}/review/{review_id}/delete', [RthomeController::class, 'deleteReview'])->name('delete_review');
    Route::delete('/ticket/{ticket_id}/review/{review_id}/delete', [RthomeController::class, 'destroyReview']);
    Route::get('/ticket/{ticket_id}/detail', [RthomeController::class, 'ticketDetail'])->name('ticket_detail');
    Route::get('/ticket/{ticket_id}/review/{review_id}/detail', [RthomeController::class, 'reviewDetail'])->name('review_detail');
    Route::get('/follow-users/listing', [RthomeController::class, 'followUsersForm'])->name('follow_users');
    Route::post('/follow-users/listing', [RthomeController::class, 'followUsersStore']);
    Route::get('/follow-users/error-self-follow', [RthomeController::class, 'errorSelfFollow'])->name('error_self_follow');
    Route::get('/follow-users/detail/{following_id}/delete', [RthomeController::class, 'deleteFollow'])->name('delete_follow');
});
