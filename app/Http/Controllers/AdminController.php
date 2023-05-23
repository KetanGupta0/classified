<?php

namespace App\Http\Controllers;

use App\Models\Adminauth;
use App\Models\Category;
use App\Models\formFields;
use App\Models\formOptions;
use App\Models\formData;
use App\Models\AdsPersonalInfo;
use App\Models\Comment;
use App\Models\AddImages;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Adds;
use App\Models\FormSelect;
use App\Models\Userlist;
use App\Models\AdminChat;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\PointsHistory;
use App\Models\PointsSetting;
use App\Models\RedeemRequest;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class AdminController extends Controller
{
    // login view
    public function loginView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.dashboard');
            echo view('admin.bottom');
        } else return view('admin.login');
    }

    // dashboard view
    public function dashboardView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.dashboard');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // formfields view
    public function formView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.formfields');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Pending Ads view
    public function pendingAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.pendingAds');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Active Ads view
    public function activeAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.activeAds');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Rejected Ads view
    public function rejectedAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.rejectedAds');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Expired Ads view
    public function expiredAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.expiredAds');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Expired Ads view
    public function allAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.allAds');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Resubmitted Ads view
    public function resubmitedAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.resubmitedAds');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Hidden Ads view
    public function hiddenAdsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.hiddenByUser');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Add Creators View
    public function addCreatorsView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.addcreators');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Add Viewers View
    public function addViewersView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.addviewers');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Add Viewers View
    public function membershipView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.membership');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Add Viewers View
    public function addMembershipPlanView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.addmembershipplan');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Transaction View
    public function transactionPageView()
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::where('admin_id', '=', Session::get('adminloginid'))->value('view_transatctions');
            echo view('admin.top');
            echo view('admin.transaction', compact('admin'));
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Redeem Request View
    public function redeemRequestPageView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.redeem_request');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Redeem History View
    public function redeemHistoryPageView()
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::where('admin_id', '=', Session::get('adminloginid'))->value('view_redeem_history');
            echo view('admin.top');
            echo view('admin.redeem_history', compact('admin'));
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Ads View Settings Page View
    public function adsViewSettingsView()
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::where('admin_id', '=', Session::get('adminloginid'))->value('change_settings');
            echo view('admin.top');
            echo view('admin.ads-view-settings', compact('admin'));
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Redeem Settings View
    public function redeemSettingsView()
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::where('admin_id', '=', Session::get('adminloginid'))->value('change_settings');
            echo view('admin.top');
            echo view('admin.redeem-settings', compact('admin'));
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Create User View
    public function createUserView()
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::where('admin_id', '=', Session::get('adminloginid'))->value('change_settings');
            echo view('admin.top');
            echo view('admin.create-user', compact('admin'));
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Manage Rights View
    public function manageRightsView()
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::where('admin_id', '=', Session::get('adminloginid'))->value('change_settings');
            echo view('admin.top');
            echo view('admin.manage-rights', compact('admin'));
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // Manage Rights View
    public function resetPasswordView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.reset-password');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // validate login
    public function validateLogin(Request $request)
    {
        $admin = new Adminauth();
        $admin = $admin::where('username', '=', $request->username)->where('password', '=', $request->password)->first();
        if ($admin) {
            session()->put('adminloginid', $admin->admin_id);
            return response()->json(1);
        } else {
            return response()->json(0);
        }
    }

    public function logout()
    {
        if (Session::has('adminloginid')) {
            session()->pull('adminloginid');
            session()->flush();
            return redirect('admin');
        }
    }

    // category view
    public function categoryView()
    {
        if (Session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.category');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    public function dashboardInfosAJAX()
    {
        $adds = Adds::where('add_status', '!=', 'deleted')->get();
        $active = 0;
        $pending = 0;
        $expired = 0;
        foreach ($adds as $add) {
            if ($add->add_status == 'approved') {
                $active++;
            } else if ($add->add_status == 'pending') {
                $pending++;
            } else if ($add->add_status == 'expired') {
                $expired++;
            }
        }
        $users = count(Userlist::get());
        return response()->json(['active' => $active, 'pending' => $pending, 'expired' => $expired, 'users' => $users]);
    }

    // save category AJAX
    public function saveCategoryAJAX(Request $request)
    {
        $cid = $request->cid;

        $cat = new Category();
        $cat->cid = $cid;
        $cat->title = $request->title;
        $cat->arabic = $request->arabic;
        $cat->slug = $request->slug;
        $cat->icon = $request->icon;
        $cat->purl = $request->purl;
        $cat->parent = $request->ccid;
        $result = $cat->save();


        if ($result) {
            return response()->json($result);
        } else {
            return response()->json($result);
        }
    }

    public function updateCategoryAJAX(Request $request)
    {
        $cid = $request->cid;
        $cat = new Category();
        $cat = $cat::find($cid);
        $cat->title = $request->title;
        $cat->arabic = $request->arabic;
        $cat->slug = $request->slug;
        $cat->icon = $request->icon;
        $image = $request->file('purl');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('category/image'), $imageName);
        $cat->purl = $imageName;
        $result = $cat->update();
        if ($result) {
            return response()->json($result);
        } else {
            return response()->json($result);
        }
    }

    public function fetchCategoryDataAJAX()
    {
        $cat = new Category();
        $cat = $cat::where('parent', '=', 0)->get();
        return response()->json($cat);
    }

    public function fetchSubCategoryDataAJAX(Request $request)
    {
        $cat = new Category();
        $cat = $cat::where('parent', '=', $request->cid)->get();
        return response()->json($cat);
    }

    public function editCategoryDataAJAX(Request $request)
    {
        $cid = $request->cid;
        $cat = new Category();
        $cat = $cat::find($cid);
        return response()->json($cat);
    }

    public function deleteCategoryDataAJAX(Request $request)
    {
        $cid = $request->cid;
        $data = Category::where('cid', '=', $cid)->first();
        $data->delete();
        $cat = new Category();
        $cat = $cat::orderBy('cid', 'desc')->get();
        return response()->json($cat);
    }

    // detch category data
    public function categoryDataAJAX()
    {
        $cat = new Category();
        $cat = $cat::where('parent', '=', 0)->get();
        return response($cat);
    }

    public function fetchFormAJAX(Request $request)
    {
        $cid = $request->id;
        $formFields = formFields::where('category_field_id', '=', $cid)->get();
        $fval = 0;
        $html = '';
        foreach ($formFields as $fields) {
            $fval++;
            if ($fields->type == 'select') {
                $html .= '<div class="row mb-2" id="div' . $fval . '" name="select"><input type="hidden" value="' . $fval . '" id="fdropdownvalue' . $fval . '"><div class="col-md-2 col-3"><h6 class="mt-2">Dropdown <i class="ml-4 fa text-danger fa-trash delete" id="' . $fval . '"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="dropdown-label[]" class="form-control" placeholder="Enter a Label" value="' . $fields->label . '"><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><div class="row div' . $fval . '" id="divdropdown' . $fval . '">';
                $fval2 = 0;
                foreach (formOptions::where('form_fields_id', '=', $fields->form_field_id)->get() as $option) {
                    $fval2++;
                    $html .= '<div class="row div' . $fval . '" id="div' . $fval . 'dropdownrow' . $fval2 . '" style="margin-left: -5px;"><div class="col-md-2 col-3"></div><div class="col-7 mb-3"><input data-count="' . $fval2 . '" data-of="' . $fval . '" type="text" name="dropdown-child-label[]" class="form-control" value="' . $option->value . '"></div><div class="col-md-3 col-1"><i class="ml-4 fa text-danger fa-trash childdelete" id="' . $fval . 'dropdownrow' . $fval2 . '" style="margin-top:10px;"></i></div></div>';
                }
                $html .= '</div><div class="row div' . $fval . '"><div class="col-md-2 col-3"></div><div class="col-4"><button type="button" data="' . $fval . '" class="btn btn-outline-secondary btn-sm moredropdown mb-2"> <i class="fa fa-plus"></i> Drop Down</button></div></div><hr id="hr' . $fval . '" style="margin:10px;"></div>';
            } else if ($fields->type == 'input') {
                $html .= '<div class="row mb-2" id="div' . $fval . '" name="input">
                <div class="col-md-2 col-3"><h6 class="mt-2">Text Field  <i class="ml-4 fa text-danger fa-trash delete" id="' .
                    $fval . '"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="textfield-label[]" class="form-control" placeholder="Enter a Label" value="' . $fields->label . '"><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><hr id="hr' . $fval . '" style="margin:10px;"></div>';
            } else if ($fields->type == 'checkbox') {
                $html .= '<div class="row mb-2" id="div' . $fval . '" name="checkbox"><input type="hidden" value="' . $fval . '" id="fchkvalue' . $fval . '"><div class="col-md-2 col-3"><h6 class="mt-2">Checkbox <i class="ml-4 fa text-danger fa-trash delete" id="' . $fval . '"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="checkbox-label[]" class="form-control" value="' . $fields->label . '"><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><div class="row div' . $fval . '" id="divchk' . $fval . '">';
                $fval2 = 0;
                foreach (formOptions::where('form_fields_id', '=', $fields->form_field_id)->get() as $option) {
                    $fval2++;
                    $html .= '<div class="row div' . $fval . '" id="div' . $fval . 'chkrow' . $fval2 . '" style="margin-left: -5px;"><div class="col-md-2 col-3"></div><div class="col-7 mb-3"><input type="text" name="checkbox-child-label[]" class="form-control" value="' . $option->value . '"></div><div class="col-md-3 col-1"><i class="ml-4 fa text-danger fa-trash childdelete" id="' . $fval . 'chkrow' . $fval2 . '" style="margin-top:10px;"></i></div></div>';
                }
                $html .= '</div><div class="row div' . $fval . '"><div class="col-md-2 col-3"></div><div class="col-4"><button type="button" data="' . $fval . '" class="btn btn-outline-secondary btn-sm morechk mb-2"> <i class="fa fa-plus"></i> Checkbox</button></div></div><hr id="hr' . $fval . '" style="margin:10px;"></div>';
            } else if ($fields->type == 'textarea') {
                $html .= '<div class="row mb-2" id="div' . $fval . '"  name="textarea"><div class="col-md-2 col-3"><h6 class="mt-2">Text Area  <i class="ml-4 fa text-danger fa-trash delete" id=""></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="textarea-label[]" class="form-control" placeholder="Enter a Label" value="' . $fields->label . '"><div class="input-group-append"><span class="input-group-text"><input name="textarea-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><hr id="hr" style="margin:10px;"></div>';
            } else if ($fields->type == 'radio') {
                $html .= '<div class="row mb-2" id="div' . $fval . '" name="radio"><input type="hidden" value="' . $fval . '" id="fradiovalue' . $fval . '"><div class="col-md-2 col-3"><h6 class="mt-2">Radio Button <i class="ml-4 fa text-danger fa-trash delete" id="' . $fval . '"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="radio-label[]" class="form-control" value="' . $fields->label . '" value=""><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><div class="row div' . $fval . '" id="divradio' . $fval . '">';
                $fval2 = 0;
                foreach (formOptions::where('form_fields_id', '=', $fields->form_field_id)->get() as $option) {
                    $fval2++;
                    $html .= '<div class="row div' . $fval . '" id="div' . $fval . 'radiorow' . $fval2 . '" style="margin-left: -5px;"><div class="col-md-2 col-3"></div><div class="col-7 mb-3"><input type="text" name="radio-child-label[]" class="form-control" value="' . $option->value . '"></div><div class="col-md-3 col-1"><i class="ml-4 fa text-danger fa-trash childdelete" id="' . $fval . 'radiorow' . $fval2 . '"" style="margin-top:10px;"></i></div></div>';
                }
                $html .= '</div><div class="row div' . $fval . '"><div class="col-md-2 col-3"></div><div class="col-4"><button type="button" data="' . $fval . '" class="btn btn-outline-secondary btn-sm moreradio mb-2"> <i class="fa fa-plus"></i> Radio Button</button></div></div><hr id="hr' . $fval . '" style="margin:10px;"></div>';
            }
        }
        return response()->json(['html' => $html, 'divlen' => $fval]);
    }

    // Load all pending adds
    public function fetchPendingAdsAJAX()
    {
        $ads = Adds::where('add_status', '=', 'pending')
            ->join('userlists', 'userlists.user_id', '=', 'adds.user_id')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all rejected adds
    public function fetchRejectedAdsAJAX(Request $request)
    {
        $ads = Adds::where('add_status', '=', 'rejected')
            ->join('userlists', 'userlists.user_id', '=', 'adds.user_id')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all active adds
    public function fetchActiveAdsAJAX(Request $request)
    {
        $ads = Adds::where('add_status', '=', 'approved')
            ->join('userlists', 'userlists.user_id', '=', 'adds.user_id')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all expired adds
    public function fetchExpiredAdsAJAX(Request $request)
    {
        $ads = Adds::where('add_status', '=', 'expired')
            ->join('userlists', 'userlists.user_id', '=', 'adds.user_id')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all adds
    public function fetchAllAdsAJAX(Request $request)
    {
        $ads = Adds::join('userlists', 'userlists.user_id', '=', 'adds.user_id')->where('adds.add_status', '!=', 'deleted')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all hidden adds
    public function fetchHiddenAdsAJAX(Request $request)
    {
        $ads = Adds::where('add_status', '=', 'hidden')
            ->join('userlists', 'userlists.user_id', '=', 'adds.user_id')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all resubmitted adds
    public function fetchResubmittedAddAJAX(Request $request)
    {
        $ads = Adds::where('add_status', '=', 'resubmitted')
            ->join('userlists', 'userlists.user_id', '=', 'adds.user_id')
            ->get();

        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid', '=', $add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Approve adds
    public function approvePendingAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->approve_pending_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'approved';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is approved by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }
    public function approveResubmittedAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->approve_resubmitted_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'approved';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is approved by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }
    public function approveExpiredAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->approve_expired_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'approved';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is approved by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }
    public function approveRejectedAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->approve_rejected_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'approved';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is approved by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }

    // Reject adds
    public function rejectPendingAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->reject_pending_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'rejected';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is rejected by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }
    public function rejectResubmittedAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->reject_resubmitted_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'rejected';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is rejected by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }

    // Delete adds
    public function deleteHiddenAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->delete_hidden_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'deleted';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is deleted by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 0;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('deleted');
        } else {
            return response()->json('error');
        }
    }
    public function deleteExpiredAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->delete_expired_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'deleted';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is deleted by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 0;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('deleted');
        } else {
            return response()->json('error');
        }
    }
    public function deleteRejectedAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->delete_rejected_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'deleted';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is deleted by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 0;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('deleted');
        } else {
            return response()->json('error');
        }
    }

    // Expire adds
    public function expireActiveAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->expire_active_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'expired';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is expired by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }
    public function expireHiddenAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->expire_active_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'expired';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is expired by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }

    // Unhide adds
    public function unhideHiddenAddAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->unhide_hidden_ads != 1) {
            return response()->json(['message' => "You don't have enough permissions to perform this action!"], 400);
        }
        $add = Adds::find($request->add_id);
        if ($add) {
            $add->add_status = 'approved';
            $add->update();
            $notif = new Notification();
            $notif->notif_msg = 'Your add "' . $add->add_title . '" is approved by admin.';
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $add->user_id;
            $notif->notif_for = 2;
            $notif->aid = $add->add_id;
            $notif->save();
            return response()->json('updated');
        } else {
            return response()->json('error');
        }
    }

    public function saveFormStructureAJAX(Request $request)
    {
        $cid = $request->cid;
        foreach ($request->form as $data) {
            if ($data['type'] == 'select' || $data['type'] == 'radio' || $data['type'] == 'checkbox') {
                $id = DB::table('form_fields')->insertGetId(
                    [
                        'label' => $data['label'],
                        'type' => $data['type'],
                        'category_field_id' => $cid,
                    ]
                );
                foreach ($data['option'] as $option) {
                    $newOption = new formOptions();
                    $newOption->value = $option;
                    $newOption->form_fields_id = $id;
                    $result = $newOption->save();
                    if (!$result) {
                        return response()->json('fail');
                    }
                }
            }

            if ($data['type'] == 'input' || $data['type'] == 'textarea') {
                $field = new formFields();
                $field->label = $data['label'];
                $field->type = $data['type'];
                $field->category_field_id = $cid;
                $result = $field->save();
                if (!$result) {
                    return response()->json('fail');
                }
            }
        }
        return response()->json('success');
    }

    public function fetchActiveAdsViewAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->view_active_ads != 1) {
            return response()->json(['message' => "You don't have permissions to perform this action!"], 400);
        }
        $aid = $request->aid;
        $ads = Adds::where('add_id', '=', $aid)->first();

        $username = Userlist::where('user_id', '=', $ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id', '=', $ads->add_id)->value('add_title');
        $images = AddImages::where('add_id', '=', $aid)
            ->where('user_id', '=', $ads->user_id)
            ->get();
        $location = AdsPersonalInfo::where('add_id', '=', $aid)->select('city', 'state', 'country')->first();
        $description = Adds::where('add_id', '=', $ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id', '=', $ads->cat_id)->get();


        $data = array();
        foreach ($fields as $field) {
            $info = formData::where('form_field_id', '=', $field->form_field_id)->where('add_id', '=', $aid)->first();
            array_push($data, ['label' => $field->label, 'value' => $info->main_data]);
        }

        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' => $location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }

    public function fetchPendingAdsViewAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->view_pending_ads != 1) {
            return response()->json(['message' => "You don't have permissions to perform this action!"], 400);
        }
        $aid = $request->aid;
        $ads = Adds::where('add_id', '=', $aid)->first();

        $username = Userlist::where('user_id', '=', $ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id', '=', $ads->add_id)->value('add_title');
        $images = AddImages::where('add_id', '=', $aid)
            ->where('user_id', '=', $ads->user_id)
            ->get();
        $location = AdsPersonalInfo::where('add_id', '=', $aid)->select('city', 'state', 'country')->first();
        $description = Adds::where('add_id', '=', $ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id', '=', $ads->cat_id)->get();


        $data = array();
        foreach ($fields as $field) {
            $info = formData::where('form_field_id', '=', $field->form_field_id)->where('add_id', '=', $aid)->first();
            array_push($data, ['label' => $field->label, 'value' => $info->main_data]);
        }

        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' => $location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }

    public function fetchHiddenAdsViewAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->view_hidden_ads != 1) {
            return response()->json(['message' => "You don't have permissions to perform this action!"], 400);
        }
        $aid = $request->aid;
        $ads = Adds::where('add_id', '=', $aid)->first();

        $username = Userlist::where('user_id', '=', $ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id', '=', $ads->add_id)->value('add_title');
        $images = AddImages::where('add_id', '=', $aid)
            ->where('user_id', '=', $ads->user_id)
            ->get();
        $location = AdsPersonalInfo::where('add_id', '=', $aid)->select('city', 'state', 'country')->first();
        $description = Adds::where('add_id', '=', $ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id', '=', $ads->cat_id)->get();


        $data = array();
        foreach ($fields as $field) {
            $info = formData::where('form_field_id', '=', $field->form_field_id)->where('add_id', '=', $aid)->first();
            array_push($data, ['label' => $field->label, 'value' => $info->main_data]);
        }

        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' => $location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }
    public function fetchRejectedAdsViewAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->view_rejected_ads != 1) {
            return response()->json(['message' => "You don't have permissions to perform this action!"], 400);
        }
        $aid = $request->aid;
        $ads = Adds::where('add_id', '=', $aid)->first();

        $username = Userlist::where('user_id', '=', $ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id', '=', $ads->add_id)->value('add_title');
        $images = AddImages::where('add_id', '=', $aid)
            ->where('user_id', '=', $ads->user_id)
            ->get();
        $location = AdsPersonalInfo::where('add_id', '=', $aid)->select('city', 'state', 'country')->first();
        $description = Adds::where('add_id', '=', $ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id', '=', $ads->cat_id)->get();


        $data = array();
        foreach ($fields as $field) {
            $info = formData::where('form_field_id', '=', $field->form_field_id)->where('add_id', '=', $aid)->first();
            array_push($data, ['label' => $field->label, 'value' => $info->main_data]);
        }

        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' => $location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }
    public function fetchResubmittedAdsViewAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->view_resubmitted_ads != 1) {
            return response()->json(['message' => "You don't have permissions to perform this action!"], 400);
        }
        $aid = $request->aid;
        $ads = Adds::where('add_id', '=', $aid)->first();

        $username = Userlist::where('user_id', '=', $ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id', '=', $ads->add_id)->value('add_title');
        $images = AddImages::where('add_id', '=', $aid)
            ->where('user_id', '=', $ads->user_id)
            ->get();
        $location = AdsPersonalInfo::where('add_id', '=', $aid)->select('city', 'state', 'country')->first();
        $description = Adds::where('add_id', '=', $ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id', '=', $ads->cat_id)->get();


        $data = array();
        foreach ($fields as $field) {
            $info = formData::where('form_field_id', '=', $field->form_field_id)->where('add_id', '=', $aid)->first();
            array_push($data, ['label' => $field->label, 'value' => $info->main_data]);
        }

        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' => $location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }
    public function fetchExpiredAdsViewAJAX(Request $request)
    {
        $admin = Adminauth::find(Session::get('adminloginid'));
        if ($admin->view_expired_ads != 1) {
            return response()->json(['message' => "You don't have permissions to perform this action!"], 400);
        }
        $aid = $request->aid;
        $ads = Adds::where('add_id', '=', $aid)->first();

        $username = Userlist::where('user_id', '=', $ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id', '=', $ads->add_id)->value('add_title');
        $images = AddImages::where('add_id', '=', $aid)
            ->where('user_id', '=', $ads->user_id)
            ->get();
        $location = AdsPersonalInfo::where('add_id', '=', $aid)->select('city', 'state', 'country')->first();
        $description = Adds::where('add_id', '=', $ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id', '=', $ads->cat_id)->get();


        $data = array();
        foreach ($fields as $field) {
            $info = formData::where('form_field_id', '=', $field->form_field_id)->where('add_id', '=', $aid)->first();
            array_push($data, ['label' => $field->label, 'value' => $info->main_data]);
        }

        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' => $location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }

    public function loadChatsAJAX()
    {        // Under development
        $chats = AdminChat::where('seen_flag', '=', 0)->get();
        $userids = array();
        foreach ($chats as $chat) {
            array_push($userids, $chat->msg_from);
        }
        $unique = array_unique($userids);   // To remove duplicate results
        $unique = array_values($unique);    // For re-indexing of resulting array

        $data = array();
        foreach ($unique as $uni) {
            $total = 0;
            if ($uni == 0) {
                continue;
            }
            $user = Userlist::find($uni);
            $msgs = AdminChat::where('msg_from', '=', $uni)->get();
            foreach ($msgs as $msg) {
                if ($msg->seen_flag == 0) {
                    $total++;
                }
            }
            array_push($data, [
                'username' => $user->user_name,
                'msg_count' => $total,
                'user_id' => $user->user_id,
            ]);
        }

        return response()->json($data);
    }

    public function sendChatsAJAX(Request $request)
    {        // Under development
        $request->validate(['chatmsg' => 'required'], ['chatmsg.required' => "Error can't send blank message!"]);
        $msg = $request->chatmsg;
        $uid = $request->uid;
        $chat = new AdminChat();
        $chat->message = $msg;
        $chat->msg_from = 0;
        $chat->msg_to = $uid;
        $result = $chat->save();
        if ($result) {
            return response()->json('sent');
        } else {
            return response()->json('error');
        }
    }

    public function openChatMessageAJAX(Request $request)
    {
        $uid = $request->uid;
        $flagchanges = AdminChat::where('msg_from', '=', $uid)->where('seen_flag', '=', 0)->get();
        foreach ($flagchanges as $change) {
            $change->seen_flag = 1;
            $change->update();
        }
        $data = array();
        $Chats = AdminChat::where('msg_from', '=', $uid)->orWhere('msg_to', '=', $uid)->get();
        foreach ($Chats as $chat) {

            if ($chat->msg_to == $uid) {
                array_push($data, [
                    'sender' => 'admin',
                    'message' => $chat->message,
                    'send_time' => $chat->created_at,
                    'seen_time' => $chat->updated_at,
                    'uid' => $uid,
                ]);
            } else {
                $name = Userlist::find($uid);
                array_push($data, [
                    'sender' => $name->user_name,
                    'message' => $chat->message,
                    'send_time' => $chat->created_at,
                    'seen_time' => $chat->updated_at,
                    'uid' => $uid,
                ]);
            }
        }
        return response()->json($data);
    }

    public function loadNewChatsCountAJAX()
    {
        $counter = 0;
        $chats = AdminChat::get();
        foreach ($chats as $chat) {
            if ($chat->msg_from != 0) {
                if ($chat->seen_flag == 0) {
                    $counter++;
                }
            }
        }
        return response()->json($counter);
    }

    public function sendReplyFromAdminAJAX(Request $request)
    {
        $uid = $request->uid;
        $msg = $request->msg;

        $reply = new AdminChat();
        $reply->msg_to = $uid;
        $reply->msg_from = 0;
        $reply->message = $msg;
        $result = $reply->save();
        if ($result) {
            return response()->json('success');
        } else {
            return response()->json("fail");
        }
    }

    public function fetchCreatorsListAJAX()
    {
        $users = Userlist::get();
        $userids = [];
        foreach ($users as $user) {
            array_push($userids, $user->user_id);
        }
        $creators = [];
        foreach ($userids as $id) {
            $check = Adds::where('user_id', '=', $id)->first();
            if ($check) {
                $user = Userlist::find($id);
                if ($user->reference != null) {
                    $reference = Userlist::where('referral', '=', $user->reference)->first();
                    array_push($creators, [
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'phonecode' => $user->phonecode,
                        'user_mob' => $user->user_mob,
                        'points' => $user->points,
                        'reference' => $reference->user_name,
                        'refferedby' => $reference->user_id,
                        'user_status' => $user->user_status,
                    ]);
                } else {
                    array_push($creators, [
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'phonecode' => $user->phonecode,
                        'user_mob' => $user->user_mob,
                        'points' => $user->points,
                        'reference' => '',
                        'refferedby' => '',
                        'user_status' => $user->user_status,
                    ]);
                }
            }
        }
        return response()->json($creators);
    }

    public function fetchRefferedByAJAX(Request $request)
    {
        $uid = $request->uid;
        $result = Userlist::find($uid);
        if ($result) {
            $referrals = Userlist::where('reference', '=', $result->referral)->get();
            return response()->json([
                'user_name' => $result->user_name,
                'phone' => '+' . $result->phonecode . ' ' . $result->user_mob,
                'total_ref' => sizeof($referrals),
            ]);
        } else {
            return response()->json('nouser');
        }
    }

    public function blockUserAJAX(Request $request)
    {
        $uid = $request->uid;
        $check = Userlist::find($uid);
        if ($check) {
            if ($check->user_status == 'unblocked') {
                $check->user_status = 'blocked';
                $result = $check->update();
                if ($result) {
                    return response()->json('success');
                } else {
                    return response()->json('fail');
                }
            } else {
                return response()->json('already-blocked');
            }
        } else {
            return response()->json('nouser');
        }
    }

    public function unblockUserAJAX(Request $request)
    {
        $uid = $request->uid;
        $check = Userlist::find($uid);
        if ($check) {
            if ($check->user_status == 'blocked') {
                $check->user_status = 'unblocked';
                $result = $check->update();
                if ($result) {
                    return response()->json('success');
                } else {
                    return response()->json('fail');
                }
            } else {
                return response()->json('already-unblocked');
            }
        } else {
            return response()->json('nouser');
        }
    }

    public function loadAdminUserChatAJAX(Request $request)
    {
        $uid = $request->uid;
        $user = Userlist::find($uid);
        $chats = AdminChat::where('msg_from', '=', $uid)
            ->orWhere('msg_to', '=', $uid)
            ->get();
        $chatArr = [];
        foreach ($chats as $chat) {
            if ($chat->msg_from == $uid) {
                array_push($chatArr, [
                    'sender' => 'user',
                    'message' => $chat->message,
                    'seen' => $chat->seen_flag,
                    'time' => $chat->created_at,
                    'uid' => $uid,
                ]);
            } else {
                array_push($chatArr, [
                    'sender' => 'owner',
                    'message' => $chat->message,
                    'seen' =>  $chat->seen_flag,
                    'time' => $chat->created_at,
                ]);
            }
        }
        return response()->json([
            'username' => $user->user_name,
            'chats' => $chatArr,
        ]);
    }

    public function fetchUserRefferealListAJAX(Request $request)
    {
        $uid = $request->uid;
        $refcode = Userlist::find($uid);
        $refferedUsers = Userlist::where('reference', $refcode->referral)->get();
        return response()->json([
            'mainuser' => $refcode,
            'reffered' => $refferedUsers,
        ]);
    }

    public function fetchPointsHistoryAJAX(Request $request)
    {
        $uid = $request->uid;
        $user = Userlist::find($uid);
        if ($user) {
            $points = PointsHistory::where('user_id', '=', $uid)->orderBy('ph_id', 'desc')->get();
            return response()->json([
                'uid' => $uid,
                'username' => $user->user_name,
                'totalPoints' => $user->points,
                'history' => $points,
            ]);
        }
    }

    public function fetchViewersListAJAX()
    {
        $users = Userlist::get();
        $userids = [];
        foreach ($users as $user) {
            array_push($userids, $user->user_id);
        }
        $viewers = [];
        foreach ($userids as $id) {
            $check = Adds::where('user_id', '=', $id)->first();
            if (!$check) {
                $user = Userlist::find($id);
                if ($user->reference != null) {
                    $reference = Userlist::where('referral', '=', $user->reference)->first();
                    array_push($viewers, [
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'phonecode' => $user->phonecode,
                        'user_mob' => $user->user_mob,
                        'points' => $user->points,
                        'reference' => $reference->user_name,
                        'refferedby' => $reference->user_id,
                        'user_status' => $user->user_status,
                    ]);
                } else {
                    array_push($viewers, [
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'phonecode' => $user->phonecode,
                        'user_mob' => $user->user_mob,
                        'points' => $user->points,
                        'reference' => '',
                        'refferedby' => '',
                        'user_status' => $user->user_status,
                    ]);
                }
            }
        }
        return response()->json($viewers);
    }

    public function fetchMembershipDataAJAX()
    {
        $memberships = Membership::get();
        return response()->json($memberships);
    }

    public function deleteMembershipAJAX(Request $request)
    {
        $mid = $request->mid;
        $result = Membership::find($mid);
        if ($result) {
            $result->delete();
            return response()->json('success');
        } else {
            return response()->json('fail');
        }
    }
    public function addNewMembershipPlanAJAX(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'days' => 'required|numeric',
            'description' => 'required',
        ], [
            'name.required' => 'Name is required!',
            'price.required' => 'Price is required!',
            'days.required' => 'Days is required!',
            'description.required' => 'Description is required!',
            'price.numeric' => 'Price should be a number!',
            'days.numeric' => 'Days should be a number!',
        ]);
        $name = $request->name;
        $price = $request->price;
        $days = $request->days;
        $description = $request->description;

        $check = Membership::create([
            'm_plan' => $name,
            'm_price' => $price,
            'm_days' => $days,
            'm_desc' => $description,
        ]);

        if ($check) {
            return response()->json('success');
        } else {
            return response()->json('fail');
        }
    }

    public function deleteCategoryAJAX(Request $request)
    {
        $result = Category::find($request->cid)->delete();
        if ($result) {
            return response()->json('pass');
        } else {
            return response()->json('fail');
        }
    }

    public function fetchMembershipPlanDetailsAJAX(Request $request)
    {
        return Membership::find($request->mid);
    }

    public function updateMembershipPlanAJAX(Request $request)
    {
        $request->validate([
            'mid' => 'required',
            'pname' => 'required',
            'pprice' => 'required|numeric',
            'pdays' => 'required|numeric',
            'pdescription' => 'required',
        ], [
            'mid.required' => 'Page reload required!',
            'pname.required' => 'Plan name is required!',
            'pprice.required' => 'Plan price is required!',
            'pprice.numeric' => 'Invalid plan price!',
            'pdays.required' => 'No. of days is required!',
            'pdays.numeric' => 'Invalid no. of days!',
            'pdescription.required' => 'Plan description is required!',
        ]);
        $plan = Membership::find($request->mid);
        if ($plan) {
            $plan->m_plan = $request->pname;
            $plan->m_price = $request->pprice;
            $plan->m_days = $request->pdays;
            $plan->m_desc = $request->pdescription;
            $result = $plan->update();
            if ($result) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }

    public function updateCurrentPasswordAJAX(Request $request)
    {
        if (session::has('adminloginid')) {
            $admin = Adminauth::find(Session::get('adminloginid'));
            if ($admin) {
                $request->validate([
                    'currentPassword' => 'required',
                    'newPassword' => 'required',
                    'confirmPassword' => 'required|same:newPassword',
                ]);
                if ($admin->password != $request->currentPassword) {
                    return response()->json(['errors' => ['currentPassword' => ['Wrong password!']]], 400);
                } else {
                    $admin->password = $request->newPassword;
                    $result = $admin->update();
                    if ($result) {
                        return response()->json(true);
                    } else {
                        return response()->json(false);
                    }
                }
            }
        }
        return response()->json(false);
    }

    public function createNewUserAJAX(Request $request)
    {
        if (session::has('adminloginid')) {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'phone' => 'required|numeric',
                'password' => 'required',
            ], [
                'name.required' => 'Name is required!',
                'username.required' => 'Username is required!',
                'email.required' => 'Email is required!',
                'phone.required' => 'Phone number is required!',
                'phone.numeric' => 'Invalid phone number!',
                'password.required' => 'Password is required!'
            ]);
            $check = Adminauth::where('email', '=', $request->email)->first();
            $check2 = Adminauth::where('username', '=', $request->username)->first();
            if ($check) {
                return response()->json(['message' => 'Email is used!'], 400);
            } else if ($check2) {
                return response()->json(['message' => 'Username is used!'], 400);
            } else {
                $admin = new Adminauth();
                $admin->username = $request->username;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->phone = $request->phone;
                $admin->password = $request->password;
                $result = $admin->save();
                if ($result) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            }
        } else {
            return response()->json(false);
        }
    }

    public function fetchAdminListAJAX()
    {
        if (Session::has('adminloginid')) {
            return Adminauth::where('admin_id', '!=', 4)->get();
        } else {
            return response()->json(false);
        }
    }

    public function deleteAdminInfoAJAX(Request $request)
    {
        if (Session::has('adminloginid')) {
            $result = Adminauth::find($request->admin_id)->delete();
            if ($result) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }

    public function fetchAdminInfoAJAX(Request $request)
    {
        if (Session::has('adminloginid')) {
            $result = Adminauth::find($request->admin_id);
            if ($result) {
                return response()->json($result);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(false);
        }
    }

    public function editAdminInfoAJAX(Request $request)
    {
        if (Session::has('adminloginid')) {
            $request->validate([
                'newname' => 'required',
                'newusername' => 'required',
                'newemail' => 'required|email',
                'newphone' => 'required|numeric',
            ], [
                'newname.required' => 'Name is required!',
                'newusername.required' => 'Username is required!',
                'newemail.required' => 'Email is required!',
                'newphone.required' => 'Phone number is required!',
                'newphone.numeric' => 'Invalid phone number!',
                'newemail.email' => 'Invalid email!'
            ]);
            $admin = Adminauth::find($request->admin_id);
            if ($admin) {
                $mailCheck = Adminauth::where('email', '=', $request->newemail)->get();
                foreach ($mailCheck as $check) {
                    if ($check->admin_id != $admin->admin_id) {
                        return response()->json(['message' => 'Email already used!'], 400);
                    }
                }
                $usernameCheck = Adminauth::where('username', '=', $request->newusername)->get();
                foreach ($usernameCheck as $check) {
                    if ($check->admin_id != $admin->admin_id) {
                        return response()->json(['message' => 'Username already used!'], 400);
                    }
                }
                $admin->name = $request->newname;
                $admin->username = $request->newusername;
                $admin->email = $request->newemail;
                $admin->phone = $request->newphone;
                $result = $admin->update();
                if ($result) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(['errors' => ['noadmin' => ['User not exists!']]], 400);
            }
        }
    }

    public function updateMinimumRedeemPointsAJAX(Request $request)
    {
        if (Session::has('adminloginid')) {
            $pointSetting = PointsSetting::find(1);
            if ($pointSetting) {
                $request->validate([
                    'minimumPoints' => 'required|numeric'
                ], [
                    'minimumPoints.required' => 'Minimum points is required!',
                    'minimumPoints.numeric' => 'Invalid points value!',
                ]);
                $pointSetting->minimum_redeem_points = $request->minimumPoints;
                $result = $pointSetting->update();
                if ($result) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(['message' => 'SQL error!'], 400);
            }
        }
    }
    public function updatePointsCurrencyConversionAJAX(Request $request)
    {
        if (Session::has('adminloginid')) {
            $pointSetting = PointsSetting::find(1);
            if ($pointSetting) {
                $request->validate([
                    'points' => 'required|numeric',
                    'currency' => 'required|numeric'
                ], [
                    'points.required' => 'The points field is required!',
                    'points.numeric' => 'Invalid points value!',
                    'currency.required' => 'The currency field is required!',
                    'currency.numeric' => 'Invalid currency value!',
                ]);
                $pointSetting->redeem_point_currency = $request->points;
                $pointSetting->redeem_kwd_currency = $request->currency;
                $result = $pointSetting->update();
                if ($result) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(['message' => 'SQL error!'], 400);
            }
        }
    }

    public function getMinimumRedeemPointsDataAJAX()
    {
        if (Session::has('adminloginid')) {
            $pointSetting = PointsSetting::find(1);
            if ($pointSetting) {
                return response()->json(['minimumPoints' => $pointSetting->minimum_redeem_points]);
            } else {
                return response()->json(['message' => 'SQL error!'], 400);
            }
        } else {
            return response()->json(['nouser' => 'Session Error!'], 400);
        }
    }
    public function getPointsCurrencyConversionDataAJAX()
    {
        if (Session::has('adminloginid')) {
            $pointSetting = PointsSetting::find(1);
            if ($pointSetting) {
                return response()->json(['points' => $pointSetting->redeem_point_currency, 'currency' => $pointSetting->redeem_kwd_currency]);
            } else {
                return response()->json(['message' => 'SQL error!'], 400);
            }
        } else {
            return response()->json(['nouser' => 'Session Error!'], 400);
        }
    }

    public function getAdsViewSettingDataAJAX()
    {
        if (Session::has('adminloginid')) {
            $pointSetting = PointsSetting::find(1);
            if ($pointSetting) {
                return response()->json(['minimumTime' => $pointSetting->add_view_time, 'pointsPerAd' => $pointSetting->add_view_point]);
            } else {
                return response()->json(['message' => 'SQL error!'], 400);
            }
        } else {
            return response()->json(['nouser' => 'Session Error!'], 400);
        }
    }

    public function updateAdsViewSettingDataAJAX(Request $request)
    {
        if (Session::has('adminloginid')) {
            $pointSetting = PointsSetting::find(1);
            if ($pointSetting) {
                $request->validate([
                    'minimumTime' => 'required|numeric',
                    'pointsPerAd' => 'required|numeric',
                ], [
                    'minimumTime.required' => 'Minimum Time is required!',
                    'minimumTime.numeric' => 'Invalid minimum time value!',
                    'pointsPerAd.required' => 'Points per ad is required!',
                    'pointsPerAd.numeric' => 'Invalid points per ad value!',
                ]);
                $pointSetting->add_view_time = $request->minimumTime;
                $pointSetting->add_view_point = $request->pointsPerAd;
                $result = $pointSetting->update();
                if ($result) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(['message' => 'SQL error!'], 400);
            }
        } else {
            return response()->json(['nouser' => 'Session Error!'], 400);
        }
    }

    public function fetchAllAdminsAJAX()
    {
        $admins = Adminauth::where('admin_id', '!=', Session::get('adminloginid'))->get();
        return response()->json($admins);
    }

    public function grantAdminPermissionsAJAX(Request $request)
    {
        $type = $request->type;
        $action = $request->action;
        $admin = Adminauth::find($request->admin_id);
        if ($type == 'category' && $action == 'view') {
            $admin->view_category = 1;
        } else if ($type == 'category' && $action == 'add') {
            $admin->add_category = 1;
        } else if ($type == 'category' && $action == 'edit') {
            $admin->edit_category = 1;
        } else if ($type == 'category' && $action == 'delete') {
            $admin->delete_category = 1;
        } else if ($type == 'form_field' && $action == 'view') {
            $admin->view_form_field = 1;
        } else if ($type == 'form_field' && $action == 'add') {
            $admin->add_form_field = 1;
        } else if ($type == 'form_field' && $action == 'edit') {
            $admin->edit_form_field = 1;
        } else if ($type == 'form_field' && $action == 'delete') {
            $admin->delete_form_field = 1;
        } else if ($type == 'membership' && $action == 'view') {
            $admin->view_membership = 1;
        } else if ($type == 'membership' && $action == 'add') {
            $admin->add_membership = 1;
        } else if ($type == 'membership' && $action == 'edit') {
            $admin->edit_membership = 1;
        } else if ($type == 'membership' && $action == 'delete') {
            $admin->delete_membership = 1;
        } else if ($type == 'redeem_history' && $action == 'view') {
            $admin->view_redeem_history = 1;
        } else if ($type == 'redeem_request' && $action == 'view') {
            $admin->view_redeem_request = 1;
        } else if ($type == 'redeem_request' && $action == 'edit') {
            $admin->modify_redeem_request = 1;
        } else if ($type == 'transatctions' && $action == 'view') {
            $admin->view_transatctions = 1;
        } else if ($type == 'settings' && $action == 'change') {
            $admin->change_settings = 1;
        } else if ($type == 'active' && $action == 'view') {
            $admin->view_active_ads = 1;
        } else if ($type == 'active' && $action == 'expire') {
            $admin->expire_active_ads = 1;
        } else if ($type == 'expired' && $action == 'view') {
            $admin->view_expired_ads = 1;
        } else if ($type == 'expired' && $action == 'approve') {
            $admin->approve_expired_ads = 1;
        } else if ($type == 'expired' && $action == 'delete') {
            $admin->delete_expired_ads = 1;
        } else if ($type == 'hidden' && $action == 'view') {
            $admin->view_hidden_ads = 1;
        } else if ($type == 'hidden' && $action == 'unhide') {
            $admin->unhide_hidden_ads = 1;
        } else if ($type == 'hidden' && $action == 'expire') {
            $admin->expire_hidden_ads = 1;
        } else if ($type == 'hidden' && $action == 'delete') {
            $admin->delete_hidden_ads = 1;
        } else if ($type == 'pending' && $action == 'view') {
            $admin->view_pending_ads = 1;
        } else if ($type == 'pending' && $action == 'approve') {
            $admin->approve_pending_ads = 1;
        } else if ($type == 'pending' && $action == 'reject') {
            $admin->reject_pending_ads = 1;
        } else if ($type == 'rejected' && $action == 'view') {
            $admin->view_rejected_ads = 1;
        } else if ($type == 'rejected' && $action == 'approve') {
            $admin->approve_rejected_ads = 1;
        } else if ($type == 'rejected' && $action == 'delete') {
            $admin->delete_rejected_ads = 1;
        } else if ($type == 'resubmitted' && $action == 'view') {
            $admin->view_resubmitted_ads = 1;
        } else if ($type == 'resubmitted' && $action == 'approve') {
            $admin->approve_resubmitted_ads = 1;
        } else if ($type == 'resubmitted' && $action == 'reject') {
            $admin->reject_resubmitted_ads = 1;
        }
        $result = $admin->update();
        if ($result) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function revokeAdminPermissionsAJAX(Request $request)
    {
        $type = $request->type;
        $action = $request->action;
        $admin = Adminauth::find($request->admin_id);
        if ($type == 'category' && $action == 'view') {
            $admin->view_category = 0;
        } else if ($type == 'category' && $action == 'add') {
            $admin->add_category = 0;
        } else if ($type == 'category' && $action == 'edit') {
            $admin->edit_category = 0;
        } else if ($type == 'category' && $action == 'delete') {
            $admin->delete_category = 0;
        } else if ($type == 'form_field' && $action == 'view') {
            $admin->view_form_field = 0;
        } else if ($type == 'form_field' && $action == 'add') {
            $admin->add_form_field = 0;
        } else if ($type == 'form_field' && $action == 'edit') {
            $admin->edit_form_field = 0;
        } else if ($type == 'form_field' && $action == 'delete') {
            $admin->delete_form_field = 0;
        } else if ($type == 'membership' && $action == 'view') {
            $admin->view_membership = 0;
        } else if ($type == 'membership' && $action == 'add') {
            $admin->add_membership = 0;
        } else if ($type == 'membership' && $action == 'edit') {
            $admin->edit_membership = 0;
        } else if ($type == 'membership' && $action == 'delete') {
            $admin->delete_membership = 0;
        } else if ($type == 'redeem_history' && $action == 'view') {
            $admin->view_redeem_history = 0;
        } else if ($type == 'redeem_request' && $action == 'view') {
            $admin->view_redeem_request = 0;
        } else if ($type == 'redeem_request' && $action == 'edit') {
            $admin->modify_redeem_request = 0;
        } else if ($type == 'transatctions' && $action == 'view') {
            $admin->view_transatctions = 0;
        } else if ($type == 'settings' && $action == 'change') {
            $admin->change_settings = 0;
        } else if ($type == 'active' && $action == 'view') {
            $admin->view_active_ads = 0;
        } else if ($type == 'active' && $action == 'expire') {
            $admin->expire_active_ads = 0;
        } else if ($type == 'expired' && $action == 'view') {
            $admin->view_expired_ads = 0;
        } else if ($type == 'expired' && $action == 'approve') {
            $admin->approve_expired_ads = 0;
        } else if ($type == 'expired' && $action == 'delete') {
            $admin->delete_expired_ads = 0;
        } else if ($type == 'hidden' && $action == 'view') {
            $admin->view_hidden_ads = 0;
        } else if ($type == 'hidden' && $action == 'unhide') {
            $admin->unhide_hidden_ads = 0;
        } else if ($type == 'hidden' && $action == 'expire') {
            $admin->expire_hidden_ads = 0;
        } else if ($type == 'hidden' && $action == 'delete') {
            $admin->delete_hidden_ads = 0;
        } else if ($type == 'pending' && $action == 'view') {
            $admin->view_pending_ads = 0;
        } else if ($type == 'pending' && $action == 'approve') {
            $admin->approve_pending_ads = 0;
        } else if ($type == 'pending' && $action == 'reject') {
            $admin->reject_pending_ads = 0;
        } else if ($type == 'rejected' && $action == 'view') {
            $admin->view_rejected_ads = 0;
        } else if ($type == 'rejected' && $action == 'approve') {
            $admin->approve_rejected_ads = 0;
        } else if ($type == 'rejected' && $action == 'delete') {
            $admin->delete_rejected_ads = 0;
        } else if ($type == 'resubmitted' && $action == 'view') {
            $admin->view_resubmitted_ads = 0;
        } else if ($type == 'resubmitted' && $action == 'approve') {
            $admin->approve_resubmitted_ads = 0;
        } else if ($type == 'resubmitted' && $action == 'reject') {
            $admin->reject_resubmitted_ads = 0;
        }
        $result = $admin->update();
        if ($result) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function fetchAdminCurrentPermissionsAJAX(Request $request)
    {
        $admin = Adminauth::find($request->admin_id);
        if ($admin) {
            $permissions = [
                ['type' => 'category', 'action' => 'view', 'permission' => $admin->view_category],
                ['type' => 'category', 'action' => 'add', 'permission' => $admin->add_category],
                ['type' => 'category', 'action' => 'edit', 'permission' => $admin->edit_category],
                ['type' => 'category', 'action' => 'delete', 'permission' => $admin->delete_category],

                ['type' => 'form_field', 'action' => 'view', 'permission' => $admin->view_form_field],
                ['type' => 'form_field', 'action' => 'add', 'permission' => $admin->add_form_field],
                ['type' => 'form_field', 'action' => 'edit', 'permission' => $admin->edit_form_field],
                ['type' => 'form_field', 'action' => 'delete', 'permission' => $admin->delete_form_field],

                ['type' => 'membership', 'action' => 'view', 'permission' => $admin->view_membership],
                ['type' => 'membership', 'action' => 'add', 'permission' => $admin->add_membership],
                ['type' => 'membership', 'action' => 'edit', 'permission' => $admin->edit_membership],
                ['type' => 'membership', 'action' => 'delete', 'permission' => $admin->delete_membership],

                ['type' => 'redeem_history', 'action' => 'view', 'permission' => $admin->view_redeem_history],

                ['type' => 'redeem_request', 'action' => 'view', 'permission' => $admin->view_redeem_request],
                ['type' => 'redeem_request', 'action' => 'edit', 'permission' => $admin->modify_redeem_request],

                ['type' => 'transatctions', 'action' => 'view', 'permission' => $admin->view_transatctions],

                ['type' => 'settings', 'action' => 'change', 'permission' => $admin->change_settings],

                ['type' => 'active', 'action' => 'view', 'permission' => $admin->view_active_ads],
                ['type' => 'active', 'action' => 'expire', 'permission' => $admin->expire_active_ads],

                ['type' => 'expired', 'action' => 'view', 'permission' => $admin->view_expired_ads],
                ['type' => 'expired', 'action' => 'approve', 'permission' => $admin->approve_expired_ads],
                ['type' => 'expired', 'action' => 'delete', 'permission' => $admin->delete_expired_ads],

                ['type' => 'hidden', 'action' => 'view', 'permission' => $admin->view_hidden_ads],
                ['type' => 'hidden', 'action' => 'unhide', 'permission' => $admin->unhide_hidden_ads],
                ['type' => 'hidden', 'action' => 'expire', 'permission' => $admin->expire_hidden_ads],
                ['type' => 'hidden', 'action' => 'delete', 'permission' => $admin->delete_hidden_ads],

                ['type' => 'pending', 'action' => 'view', 'permission' => $admin->view_pending_ads],
                ['type' => 'pending', 'action' => 'approve', 'permission' => $admin->approve_pending_ads],
                ['type' => 'pending', 'action' => 'reject', 'permission' => $admin->reject_pending_ads],

                ['type' => 'rejected', 'action' => 'view', 'permission' => $admin->view_rejected_ads],
                ['type' => 'rejected', 'action' => 'approve', 'permission' => $admin->approve_rejected_ads],
                ['type' => 'rejected', 'action' => 'delete', 'permission' => $admin->delete_rejected_ads],

                ['type' => 'resubmitted', 'action' => 'view', 'permission' => $admin->view_resubmitted_ads],
                ['type' => 'resubmitted', 'action' => 'approve', 'permission' => $admin->approve_resubmitted_ads],
                ['type' => 'resubmitted', 'action' => 'reject', 'permission' => $admin->reject_resubmitted_ads],
            ];
            return response()->json($permissions);
        } else {
            return response()->json(['message' => 'User does not exists!'], 400);
        }
    }

    public function demo()
    {
        $data['amount'] = 50;
        $data['currency'] = "KWD";
        $data['customer']['first_name'] = "Rahul";
        $data['customer']['email'] = "Rahulkumar531209@gmail.com";
        $data['customer']['country_code'] = "91";
        $data['customer']['number'] = "7004525294";
        $data['source']['id'] = "src_card";
        $data['redirect']['url'] = "https://specbits.com/classified/demoview";

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer sk_test_ScMFzq5G6AtBvykWR0ULxjHe",
        ];

        $ch = curl_init();
        $url = "https://api.tap.company/v2/charges";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $output = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($output);

        return redirect()->to($response->transaction->url);
    }

    public function demoview(Request $request)
    {
        $id = $request->tap_id;

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer sk_test_ScMFzq5G6AtBvykWR0ULxjHe",
        ];

        $ch = curl_init();
        $url = "https://api.tap.company/v2/charges/" . $id;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $output = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($output);
        if ($response->status == 'CAPTURED') {
            echo $id;
        } else {
            echo $id;
        }
    }

    public function fetchTransactionsAJAX()
    {
        $transactions = Transactions::get();
        $data = [];
        foreach ($transactions as $txn) {
            $plan = Adds::find($txn->add_id);
            $user = Userlist::find($txn->buyer_id);
            if ($plan->plan_id == 0) {
                array_push($data, [
                    'trans_id' => $txn->trans_id,
                    'buyer_id' => $txn->buyer_id,
                    'buyer_name' => $user->user_name,
                    'tamount' => $txn->tamount,
                    'm_plan' => 'Free',
                    'status' => $txn->status,
                ]);
            } else {
                $m_plan = Membership::find($plan->plan_id);
                array_push($data, [
                    'trans_id' => $txn->trans_id,
                    'buyer_id' => $txn->buyer_id,
                    'buyer_name' => $user->user_name,
                    'tamount' => $txn->tamount,
                    'm_plan' => $m_plan->m_plan,
                    'status' => $txn->status,
                ]);
            }
        }
        return response()->json($data);
    }

    public function fetchUserInfoAJAX(Request $request)
    {
        $user = Userlist::find($request->uid);
        $ads = Adds::where('user_id', '=', $user->user_id)->get();
        return response()->json([
            'name' => $user->user_name,
            'ref' => $user->referral,
            'phone' => '+' . $user->phonecode . ' ' . $user->user_mob,
            'points' => $user->points,
            'ads' => count($ads)
        ]);
    }

    public function fetchRedeemRequestsAJAX()
    {
        $req = RedeemRequest::where('request_status', '=', 1)->get();
        $data = [];
        foreach ($req as $rq) {
            $user = Userlist::find($rq->uid);
            array_push($data, [
                'reqid' => $rq->id,
                'name' => $user->user_name,
                'reqpoints' => $rq->requested_points,
                'avlpoints' => $rq->remaining_points,
                'status' => $rq->request_status
            ]);
        }
        return response()->json($data);
    }

    public function redeemRequestResponseAJAX(Request $request)
    {
        $reqid = $request->reqid;
        $action = $request->action;
        if ($action == 1) {
            $histo = RedeemRequest::find($reqid);
            if ($histo->request_status != 1) {
                return response()->json(false);
            }
            $histo->request_status = 0;
            $histo->processed_by = Session::get('adminloginid');
            $result = $histo->update();
            $notif = new Notification();
            $notif->notif_msg = "Your redeem request is approved by admin";
            $notif->notif_from_admin = Session::get('adminloginid');
            $notif->notif_to = $histo->uid;
            $notif->notif_for = 0;
            $notif->save();
            if ($result) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else if ($action == 2) {
            $histo = RedeemRequest::find($reqid);
            if ($histo->request_status != 1) {
                return response()->json(false);
            }
            $histo->request_status = 2;
            $histo->processed_by = Session::get('adminloginid');
            $result = $histo->update();
            if ($result) {
                $user = Userlist::find($histo->uid);
                $user->points = $user->points + $histo->requested_points;
                $result = $user->update();
                $notif = new Notification();
                $notif->notif_msg = "Your redeem request is rejected by admin";
                $notif->notif_from_admin = Session::get('adminloginid');
                $notif->notif_to = $histo->uid;
                $notif->notif_for = 0;
                $notif->save();
                if ($result) {
                    return response()->json(true);
                } else {
                    return response()->json(false);
                }
            } else {
                return response()->json(false);
            }
        }
    }
}
