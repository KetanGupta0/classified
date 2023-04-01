<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/',[AdminController::class,'loginView']);
Route::get('/admin',[AdminController::class,'loginView']);
Route::get('admin/dashboard',[AdminController::class,'dashboardView']);
Route::get('admin/category',[AdminController::class,'categoryView']);
Route::get('admin/form-fields',[AdminController::class,'formView']);
Route::get('admin/pending-ads',[AdminController::class,'pendingAdsView']);
Route::get('admin/active-ads',[AdminController::class,'activeAdsView']);
Route::get('admin/rejected-ads',[AdminController::class,'rejectedAdsView']);
Route::get('admin/expired-ads',[AdminController::class,'expiredAdsView']);
Route::get('admin/all-ads',[AdminController::class,'allAdsView']);
Route::get('admin/resubmitted-ads',[AdminController::class,'resubmitedAdsView']);
Route::get('admin/hidden-ads',[AdminController::class,'hiddenAdsView']);

Route::post('admin/check-login',[AdminController::class,'validateLogin']);
Route::post('admin/save-category',[AdminController::class,'saveCategoryAJAX']);
Route::post('admin/update-category',[AdminController::class,'updateCategoryAJAX']);
Route::post('admin/fetch-category-data',[AdminController::class,'fetchCategoryDataAJAX']);
Route::post('admin/fetch-subcategory-data',[AdminController::class,'fetchSubCategoryDataAJAX']);
Route::post('admin/editCategoryData',[AdminController::class,'editCategoryDataAJAX']);
Route::post('admin/deleteCategoryData',[AdminController::class,'deleteCategoryDataAJAX']);
Route::post('admin/categoryData',[AdminController::class,'categoryDataAJAX']);
Route::post('admin/fetchForm',[AdminController::class,'fetchFormAJAX']);
Route::post('admin/fetchOptions',[AdminController::class,'fetchOptionsAJAX']);

Route::post('admin/save-form-structure',[AdminController::class,'saveFormStructureAJAX']);

Route::get('admin/fetchForm',[AdminController::class,'fetchFormAJAX']);
Route::get('admin/fetchOptions',[AdminController::class,'fetchOptionsAJAX']);

Route::post('admin/approveAdd',[AdminController::class,'approveAddAJAX']);
Route::post('admin/rejectAdd',[AdminController::class,'rejectAddAJAX']);
Route::post('admin/deleteAdd',[AdminController::class,'deleteAddAJAX']);
Route::post('admin/expireAdd',[AdminController::class,'expireAddAJAX']);
Route::post('admin/unhideAdd',[AdminController::class,'unhideAddAJAX']);

Route::post('admin/fetchPendingAds',[AdminController::class,'fetchPendingAdsAJAX']);
Route::post('admin/fetchRejectedAds',[AdminController::class,'fetchRejectedAdsAJAX']);
Route::post('admin/fetchActiveAds',[AdminController::class,'fetchActiveAdsAJAX']);
Route::post('admin/fetchExpiredAds',[AdminController::class,'fetchExpiredAdsAJAX']);
Route::post('admin/fetchAllAds',[AdminController::class,'fetchAllAdsAJAX']);
Route::post('admin/fetchResubmittedAdd',[AdminController::class,'fetchResubmittedAddAJAX']);
Route::post('admin/fetchHiddenAds',[AdminController::class,'fetchHiddenAdsAJAX']);

Route::post('admin/fetch-ads-view',[AdminController::class,'fetchAdsViewAJAX']);

Route::post('admin/load-chats',[AdminController::class,'loadChatsAJAX']);
Route::post('admin/send-chats',[AdminController::class,'sendChatsAJAX']);
Route::post('admin/open-chat-message',[AdminController::class,'openChatMessageAJAX']);
Route::post('admin/load-new-chats-count',[AdminController::class,'loadNewChatsCountAJAX']);
Route::post('admin/send-reply-from-admin',[AdminController::class,'sendReplyFromAdminAJAX']);