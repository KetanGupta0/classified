<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// View Routes
Route::get('/',[AdminController::class,'loginView']);
Route::get('/admin',[AdminController::class,'loginView']);
Route::get('logout',[AdminController::class,'logout']);
Route::get('admin/dashboard',[AdminController::class,'dashboardView']);
Route::get('admin/dashboard-infos',[AdminController::class,'dashboardInfosAJAX']);
Route::get('admin/category',[AdminController::class,'categoryView']);
Route::get('admin/form-fields',[AdminController::class,'formView']);
Route::get('admin/pending-ads',[AdminController::class,'pendingAdsView']);
Route::get('admin/active-ads',[AdminController::class,'activeAdsView']);
Route::get('admin/rejected-ads',[AdminController::class,'rejectedAdsView']);
Route::get('admin/expired-ads',[AdminController::class,'expiredAdsView']);
Route::get('admin/all-ads',[AdminController::class,'allAdsView']);
Route::get('admin/resubmitted-ads',[AdminController::class,'resubmitedAdsView']);
Route::get('admin/hidden-ads',[AdminController::class,'hiddenAdsView']);
Route::get('admin/add-creators',[AdminController::class,'addCreatorsView']);
Route::get('admin/add-viewers',[AdminController::class,'addViewersView']);
Route::get('admin/membership',[AdminController::class,'membershipView']);
Route::get('admin/add-membership-plan',[AdminController::class,'addMembershipPlanView']);
Route::get('admin/transaction',[AdminController::class,'transactionPageView']);
Route::get('admin/redeem-request',[AdminController::class,'redeemRequestPageView']);
Route::get('admin/redeem-history',[AdminController::class,'redeemHistoryPageView']);
Route::get('admin/ads-view-settings',[AdminController::class,'adsViewSettingsView']);
Route::get('admin/redeem-settings',[AdminController::class,'redeemSettingsView']);
Route::get('admin/create-user',[AdminController::class,'createUserView']);
Route::get('admin/manage-rights',[AdminController::class,'manageRightsView']);
Route::get('admin/reset-password',[AdminController::class,'resetPasswordView']);

// Fetch Routes
Route::post('admin/check-login',[AdminController::class,'validateLogin']);
Route::post('admin/save-category',[AdminController::class,'saveCategoryAJAX']);
Route::post('admin/update-category',[AdminController::class,'updateCategoryAJAX']);
Route::post('admin/delete-cat-data',[AdminController::class,'deleteCategoryAJAX']);
Route::post('admin/fetch-category-data',[AdminController::class,'fetchCategoryDataAJAX']);
Route::post('admin/fetch-subcategory-data',[AdminController::class,'fetchSubCategoryDataAJAX']);
Route::post('admin/editCategoryData',[AdminController::class,'editCategoryDataAJAX']);
Route::post('admin/deleteCategoryData',[AdminController::class,'deleteCategoryDataAJAX']);
Route::post('admin/categoryData',[AdminController::class,'categoryDataAJAX']);
Route::post('admin/fetchForm',[AdminController::class,'fetchFormAJAX']);
Route::post('admin/fetchOptions',[AdminController::class,'fetchOptionsAJAX']);

Route::post('admin/fetch-creators-list',[AdminController::class,'fetchCreatorsListAJAX']);
Route::post('admin/fetch-viewers-list',[AdminController::class,'fetchViewersListAJAX']);
Route::post('admin/fetch-reffered-by',[AdminController::class,'fetchRefferedByAJAX']);
Route::post('admin/block-user',[AdminController::class,'blockUserAJAX']);
Route::post('admin/unblock-user',[AdminController::class,'unblockUserAJAX']);
Route::post('admin/load-admin-user-chat',[AdminController::class,'loadAdminUserChatAJAX']);
Route::post('admin/fetch-user-reffereal-list',[AdminController::class,'fetchUserRefferealListAJAX']);
Route::post('admin/fetch-points-history',[AdminController::class,'fetchPointsHistoryAJAX']);
Route::post('admin/fetch-membership-data',[AdminController::class,'fetchMembershipDataAJAX']);
Route::post('admin/delete-membership',[AdminController::class,'deleteMembershipAJAX']);

Route::post('admin/save-form-structure',[AdminController::class,'saveFormStructureAJAX']);

Route::get('admin/fetchForm',[AdminController::class,'fetchFormAJAX']);
Route::get('admin/fetchOptions',[AdminController::class,'fetchOptionsAJAX']);

Route::post('admin/approve-pending-add',[AdminController::class,'approvePendingAddAJAX']);
Route::post('admin/approve-resubmitted-add',[AdminController::class,'approveResubmittedAddAJAX']);
Route::post('admin/approve-expired-add',[AdminController::class,'approveExpiredAddAJAX']);
Route::post('admin/approve-rejected-add',[AdminController::class,'approveRejectedAddAJAX']);

Route::post('admin/reject-pending-add',[AdminController::class,'rejectPendingAddAJAX']);
Route::post('admin/reject-resubmitted-add',[AdminController::class,'rejectResubmittedAddAJAX']);

Route::post('admin/delete-hidden-add',[AdminController::class,'deleteHiddenAddAJAX']);
Route::post('admin/delete-expired-add',[AdminController::class,'deleteExpiredAddAJAX']);
Route::post('admin/delete-rejected-add',[AdminController::class,'deleteRejectedAddAJAX']);

Route::post('admin/expire-active-add',[AdminController::class,'expireActiveAddAJAX']);
Route::post('admin/expire-hidden-add',[AdminController::class,'expireHiddenAddAJAX']);

Route::post('admin/unhide-hidden-add',[AdminController::class,'unhideHiddenAddAJAX']);

Route::post('admin/fetchPendingAds',[AdminController::class,'fetchPendingAdsAJAX']);
Route::post('admin/fetchRejectedAds',[AdminController::class,'fetchRejectedAdsAJAX']);
Route::post('admin/fetchActiveAds',[AdminController::class,'fetchActiveAdsAJAX']);
Route::post('admin/fetchExpiredAds',[AdminController::class,'fetchExpiredAdsAJAX']);
Route::post('admin/fetchAllAds',[AdminController::class,'fetchAllAdsAJAX']);
Route::post('admin/fetchResubmittedAdd',[AdminController::class,'fetchResubmittedAddAJAX']);
Route::post('admin/fetchHiddenAds',[AdminController::class,'fetchHiddenAdsAJAX']);

Route::post('admin/fetch-active-ads-view',[AdminController::class,'fetchActiveAdsViewAJAX']);
Route::post('admin/fetch-pending-ads-view',[AdminController::class,'fetchPendingAdsViewAJAX']);
Route::post('admin/fetch-hidden-ads-view',[AdminController::class,'fetchHiddenAdsViewAJAX']);
Route::post('admin/fetch-rejected-ads-view',[AdminController::class,'fetchRejectedAdsViewAJAX']);
Route::post('admin/fetch-resubmitted-ads-view',[AdminController::class,'fetchResubmittedAdsViewAJAX']);
Route::post('admin/fetch-expired-ads-view',[AdminController::class,'fetchExpiredAdsViewAJAX']);

Route::post('admin/load-chats',[AdminController::class,'loadChatsAJAX']);
Route::post('admin/send-chats',[AdminController::class,'sendChatsAJAX']);
Route::post('admin/open-chat-message',[AdminController::class,'openChatMessageAJAX']);
Route::post('admin/load-new-chats-count',[AdminController::class,'loadNewChatsCountAJAX']);
Route::post('admin/send-reply-from-admin',[AdminController::class,'sendReplyFromAdminAJAX']);
Route::post('admin/add-new-membership-plan',[AdminController::class,'addNewMembershipPlanAJAX']);
Route::post('admin/fetch-membership-plan-details',[AdminController::class,'fetchMembershipPlanDetailsAJAX']);
Route::post('admin/update-membership-plan',[AdminController::class,'updateMembershipPlanAJAX']);

// Settings Routs
Route::post('admin/update-current-password',[AdminController::class,'updateCurrentPasswordAJAX']);
Route::post('admin/fetch-admins-list',[AdminController::class,'fetchAdminListAJAX']);
Route::post('admin/create-new-user',[AdminController::class,'createNewUserAJAX']);
Route::post('admin/delete-admin-info',[AdminController::class,'deleteAdminInfoAJAX']);
Route::post('admin/fetch-admin-info',[AdminController::class,'fetchAdminInfoAJAX']);
Route::post('admin/edit-admin-info-submit',[AdminController::class,'editAdminInfoAJAX']);
Route::post('admin/update-minimum-redeem-points',[AdminController::class,'updateMinimumRedeemPointsAJAX']);
Route::post('admin/update-points-currency-conversion',[AdminController::class,'updatePointsCurrencyConversionAJAX']);
Route::post('admin/get-minimum-redeem-points',[AdminController::class,'getMinimumRedeemPointsDataAJAX']);
Route::post('admin/get-points-currency-conversion',[AdminController::class,'getPointsCurrencyConversionDataAJAX']);
Route::post('admin/get-ads-view-setting',[AdminController::class,'getAdsViewSettingDataAJAX']);
Route::post('admin/update-ad-view-setting',[AdminController::class,'updateAdsViewSettingDataAJAX']);
Route::post('admin/fetch-admins',[AdminController::class,'fetchAllAdminsAJAX']);
Route::post('admin/grant-permission',[AdminController::class,'grantAdminPermissionsAJAX']);
Route::post('admin/revoke-permission',[AdminController::class,'revokeAdminPermissionsAJAX']);
Route::post('admin/fetch-admin-current-permissions',[AdminController::class,'fetchAdminCurrentPermissionsAJAX']);

Route::get('demo',[AdminController::class, 'demo']);
Route::get('demoview',[AdminController::class, 'demoview']);
Route::post('demoview',[AdminController::class, 'demoview']);

Route::post('admin/fetch-transactions',[AdminController::class, 'fetchTransactionsAJAX']);
Route::post('admin/fetch-user-info',[AdminController::class, 'fetchUserInfoAJAX']);
Route::post('admin/fetch-redeem-requests',[AdminController::class, 'fetchRedeemRequestsAJAX']);
Route::post('admin/redeem-request-response',[AdminController::class, 'redeemRequestResponseAJAX']);