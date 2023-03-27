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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


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

    // validate login
    public function validateLogin(Request $request)
    {
        $admin = new Adminauth();
        $admin = $admin::where('username', '=', $request->username)->where('password', '=', $request->password)->first();
        if ($admin) {
            session()->put('adminloginid', $admin->aid);
            return response()->json(1);
        } else {
            return response()->json(0);
        }
    }

    public function logout(){
        if(Session::has('adminloginid')){
            session()->pull('adminloginid');
            return redirect('admin');
        }
    }

    // category view
    public function categoryView()
    {
        if (session::has('adminloginid')) {
            echo view('admin.top');
            echo view('admin.category');
            echo view('admin.bottom');
        } else return redirect('/admin');
    }

    // save category AJAX
    public function saveCategoryAJAX(Request $request)
    {
        $cid = $request->cid;
        
        $cat = new Category();
        $cat->cid = $cid;
        $cat->title = $request->title;
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
            $cat->slug = $request->slug;
            $cat->icon = $request->icon;
            $cat->purl = $request->url;
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
        $cat = $cat::where('parent','=',0)->get();
        return response()->json($cat);
    }
    
    public function fetchSubCategoryDataAJAX(Request $request){
        $cat = new Category();
        $cat = $cat::where('parent','=',$request->cid)->get();
        return response()->json($cat);
    }

    public function editCategoryDataAJAX(Request $request)
    {
        $cid = $request->cid;
        $cat = new Category();
        $cat = $cat::find($cid);
        return response()->json($cat);
    }

    public function deleteCategoryDataAJAX(Request $request){
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
        $cat = $cat::where('parent','=',0)->get();
        return response($cat);
    }

    public function fetchFormAJAX(Request $request){
        $cid = $request->id;
        $formFields = formFields::where('category_field_id','=',$cid)->get();
        $fval = 0;
        $html = '';
        foreach($formFields as $fields){
            $fval ++;
            if ($fields->type == 'select') {
                $html .='<div class="row mb-2" id="div'.$fval.'" name="select"><input type="hidden" value="'.$fval.'" id="fdropdownvalue'.$fval.'"><div class="col-md-2 col-3"><h6 class="mt-2">Dropdown <i class="ml-4 fa text-danger fa-trash delete" id="'.$fval.'"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="dropdown-label[]" class="form-control" placeholder="Enter a Label" value="'.$fields->label.'"><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><div class="row div'.$fval.'" id="divdropdown'.$fval.'">';
                $fval2 = 0;
                foreach(formOptions::where('form_fields_id','=',$fields->form_field_id)->get() as $option){
                    $fval2++;
                    $html .='<div class="row div'.$fval.'" id="div'.$fval.'dropdownrow'.$fval2.'" style="margin-left: -5px;"><div class="col-md-2 col-3"></div><div class="col-7 mb-3"><input data-count="'.$fval2.'" data-of="'.$fval.'" type="text" name="dropdown-child-label[]" class="form-control" value="'.$option->value.'"></div><div class="col-md-3 col-1"><i class="ml-4 fa text-danger fa-trash childdelete" id="'.$fval.'dropdownrow'.$fval2.'" style="margin-top:10px;"></i></div></div>';
                }
                $html .='</div><div class="row div'.$fval.'"><div class="col-md-2 col-3"></div><div class="col-4"><button type="button" data="'.$fval.'" class="btn btn-outline-secondary btn-sm moredropdown mb-2"> <i class="fa fa-plus"></i> Drop Down</button></div></div><hr id="hr'.$fval.'" style="margin:10px;"></div>';
            }
            else if ($fields->type == 'input') {
                $html .='<div class="row mb-2" id="div'.$fval.'" name="input">
                <div class="col-md-2 col-3"><h6 class="mt-2">Text Field  <i class="ml-4 fa text-danger fa-trash delete" id="'.
                    $fval.'"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="textfield-label[]" class="form-control" placeholder="Enter a Label" value="'.$fields->label.'"><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><hr id="hr'.$fval. '" style="margin:10px;"></div>';
            }
            else if ($fields->type == 'checkbox') {
                $html .='<div class="row mb-2" id="div'.$fval.'" name="checkbox"><input type="hidden" value="'.$fval.'" id="fchkvalue'.$fval.'"><div class="col-md-2 col-3"><h6 class="mt-2">Checkbox <i class="ml-4 fa text-danger fa-trash delete" id="'.$fval.'"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="checkbox-label[]" class="form-control" value="'.$fields->label.'"><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><div class="row div'.$fval.'" id="divchk'.$fval.'">';
                $fval2 = 0;
                foreach(formOptions::where('form_fields_id','=',$fields->form_field_id)->get() as $option){
                    $fval2++;
                    $html .= '<div class="row div'.$fval.'" id="div'.$fval.'chkrow'.$fval2.'" style="margin-left: -5px;"><div class="col-md-2 col-3"></div><div class="col-7 mb-3"><input type="text" name="checkbox-child-label[]" class="form-control" value="'.$option->value.'"></div><div class="col-md-3 col-1"><i class="ml-4 fa text-danger fa-trash childdelete" id="'.$fval.'chkrow'.$fval2.'" style="margin-top:10px;"></i></div></div>';
                }
                $html .= '</div><div class="row div'.$fval.'"><div class="col-md-2 col-3"></div><div class="col-4"><button type="button" data="'.$fval.'" class="btn btn-outline-secondary btn-sm morechk mb-2"> <i class="fa fa-plus"></i> Checkbox</button></div></div><hr id="hr'.$fval.'" style="margin:10px;"></div>';
            }
            else if ($fields->type == 'textarea') {
                $html .='<div class="row mb-2" id="div'.$fval.'"  name="textarea"><div class="col-md-2 col-3"><h6 class="mt-2">Text Area  <i class="ml-4 fa text-danger fa-trash delete" id=""></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="textarea-label[]" class="form-control" placeholder="Enter a Label" value="'.$fields->label.'"><div class="input-group-append"><span class="input-group-text"><input name="textarea-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><hr id="hr" style="margin:10px;"></div>';
            }
            else if ($fields->type == 'radio') {
                $html .= '<div class="row mb-2" id="div'.$fval.'" name="radio"><input type="hidden" value="'.$fval.'" id="fradiovalue'.$fval.'"><div class="col-md-2 col-3"><h6 class="mt-2">Radio Button <i class="ml-4 fa text-danger fa-trash delete" id="'.$fval.'"></i> </h6></div><div class="col-8"><div class="input-group mb-3"><input type="text" name="radio-label[]" class="form-control" value="'.$fields->label.'" value=""><div class="input-group-append"><span class="input-group-text"><input name="textfield-chk[]" type="checkbox" class="" style="margin-right:5px;"> Required field</span></div></div></div><div class="col-md-2 col-1"></div><div class="row div'.$fval.'" id="divradio'.$fval.'">';
                $fval2 = 0;
                foreach(formOptions::where('form_fields_id','=',$fields->form_field_id)->get() as $option){
                    $fval2++;
                    $html .= '<div class="row div'.$fval.'" id="div'.$fval.'radiorow'.$fval2.'" style="margin-left: -5px;"><div class="col-md-2 col-3"></div><div class="col-7 mb-3"><input type="text" name="radio-child-label[]" class="form-control" value="'.$option->value.'"></div><div class="col-md-3 col-1"><i class="ml-4 fa text-danger fa-trash childdelete" id="'.$fval.'radiorow'.$fval2.'"" style="margin-top:10px;"></i></div></div>';
                }
                $html .= '</div><div class="row div'.$fval.'"><div class="col-md-2 col-3"></div><div class="col-4"><button type="button" data="'.$fval.'" class="btn btn-outline-secondary btn-sm moreradio mb-2"> <i class="fa fa-plus"></i> Radio Button</button></div></div><hr id="hr'.$fval.'" style="margin:10px;"></div>';
            }
        }
        return response()->json(['html'=>$html,'divlen'=>$fval]);
    }

    // Load all pending adds
    public function fetchPendingAdsAJAX(){
        $ads = Adds::where('add_status','=','pending')
                ->join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all rejected adds
    public function fetchRejectedAdsAJAX(Request $request){
        $ads = Adds::where('add_status','=','rejected')
                ->join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all active adds
    public function fetchActiveAdsAJAX(Request $request){
        $ads = Adds::where('add_status','=','approved')
                ->join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all expired adds
    public function fetchExpiredAdsAJAX(Request $request){
        $ads = Adds::where('add_status','=','expired')
                ->join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all adds
    public function fetchAllAdsAJAX(Request $request){
        $ads = Adds::join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all hidden adds
    public function fetchHiddenAdsAJAX(Request $request){
        $ads = Adds::where('add_status','=','hidden')
                ->join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }

    // Load all resubmitted adds
    public function fetchResubmittedAddAJAX(Request $request){
        $ads = Adds::where('add_status','=','resubmitted')
                ->join('userlists','userlists.user_id','=','adds.user_id')
                ->get();
        
        foreach ($ads as $key => $add) {
            $mainCat = Category::select('title')->where('cid','=',$add->main_cat_id)->first();
            $ads[$key]->mainCat = $mainCat->title;
        }
        return response()->json($ads);
    }
    
    // Approve adds
    public function approveAddAJAX(Request $request){
        $add = Adds::find($request->add_id);
        if($add){
            $add->add_status = 'approved';
            $add->update();
            return response()->json('updated');
        }
        else{
            return response()->json('error');
        }
    }

    // Reject adds
    public function rejectAddAJAX(Request $request){
        $add = Adds::find($request->add_id);
        if($add){
            $add->add_status = 'rejected';
            $add->update();
            return response()->json('updated');
        }
        else{
            return response()->json('error');
        }
    }

    // Delete adds
    public function deleteAddAJAX(Request $request){
        $add = Adds::find($request->add_id);
        if($add){
            $add->delete();
            return response()->json('deleted');
        }
        else{
            return response()->json('error');
        }
    }

    // Expire adds
    public function expireAddAJAX(Request $request){
        $add = Adds::find($request->add_id);
        if($add){
            $add->add_status = 'expired';
            $add->update();
            return response()->json('updated');
        }
        else{
            return response()->json('error');
        }
    }

    // Pending adds
    public function pendingAddAJAX(Request $request){
        $add = Adds::find($request->add_id);
        if($add){
            $add->add_status = 'pending';
            $add->update();
            return response()->json('updated');
        }
        else{
            return response()->json('error');
        }
    }

    // Unhide adds
    public function unhideAddAJAX(Request $request){
        $add = Adds::find($request->add_id);
        if($add){
            $add->add_status = 'approved';
            $add->update();
            return response()->json('updated');
        }
        else{
            return response()->json('error');
        }
    }

    public function saveFormStructureAJAX(Request $request){
        $cid = $request->cid;
        foreach($request->form as $data){
            if($data['type']=='select' || $data['type']=='radio' || $data['type']=='checkbox'){
                $id = DB::table('form_fields')->insertGetId([
                        'label' => $data['label'],
                        'type' => $data['type'],
                        'category_field_id' => $cid,
                    ]
                );
                foreach($data['option'] as $option){
                    $newOption = new formOptions();
                    $newOption->value = $option;
                    $newOption->form_fields_id = $id;
                    $result = $newOption->save();
                    if(!$result){
                        return response()->json('fail');
                    }
                }
            }

            if($data['type']=='input' || $data['type']=='textarea'){
                $field = new formFields();
                $field->label = $data['label'];
                $field->type = $data['type'];
                $field->category_field_id = $cid;
                $result = $field->save();
                if(!$result){
                    return response()->json('fail');
                }
            }
        }
        return response()->json('success');
    }

    public function fetchAdsViewAJAX(Request $request){
        $aid = $request->aid;
        $ads = Adds::where('add_id','=',$aid)->first();

        $username = Userlist::where('user_id','=',$ads->user_id)->value('user_name');
        $adsTitle = Adds::where('add_id','=',$ads->add_id)->value('add_title');
        $images = AddImages::where('add_id','=',$aid)
                            ->where('user_id','=',$ads->user_id)
                            ->get();
        $location = AdsPersonalInfo::where('add_id','=',$aid)->select('city','state','country')->first();
        $description = Adds::where('add_id','=',$ads->add_id)->value('add_detail');

        $fields = formFields::where('category_field_id','=',$ads->cat_id)->get();
        

        $data=array();
        foreach($fields as $field){
            $info = formData::where('form_field_id','=',$field->form_field_id)->where('add_id','=',$aid)->first();
            array_push($data, ['label'=>$field->label,'value'=>$info->main_data]);
        }
        
        $addsList = [
            'username' => $username,
            'title' => $adsTitle,
            'image' => $images,
            'location' =>$location,
            'description' => $description,
            'data' => $data
        ];
        return response()->json($addsList);
    }

    public function loadChatsAJAX(){        // Under development
        $chats = AdminChat::get();
        $chatMsg = array();
        foreach($chats as $chat){
            if($chat->msg_from == 0){
                if($chat->seen_flag==0){
                    array_push($chatMsg,['sender' => 'admin', 'message' => $chat->message]);
                }
                else{
                    array_push($chatMsg,['sender' => 'admin', 'message' => $chat->message]);
                }
            }
            else{
                $user = Userlist::where('user_id','=',$chat->msg_from)->first();
                if($chat->seen_flag==0){
                    array_push($chatMsg,['sender' => 'user', 'chatid' => $chat->chat_id, 'message' => $chat->message, 'status' => 'unseen', 'username' => $user->user_name, 'userid' => $user->user_id]);
                }
                else{
                    array_push($chatMsg,['sender' => 'user', 'chatid' => $chat->chat_id,'message' => $chat->message, 'status' => 'seen', 'username' => $user->user_name, 'userid' => $user->user_id]);
                }
            }
        }
        return response()->json($chatMsg);
    }

    public function sendChatsAJAX(Request $request){        // Under development
        $request->validate(['chatmsg'=>'required'],['chatmsg.required'=>"Error can't send blank message!"]);
        $msg = $request->chatmsg;
        $uid = $request->uid;
        $chat = new AdminChat();
        $chat->message = $msg;
        $chat->msg_from = 0;
        $chat->msg_to = $uid;
        $result=$chat->save();
        if($result){
            return response()->json('sent');
        }
        else{
            return response()->json('error');
        }
    }

    public function openChatMessageAJAX(Request $request){
        $chatid = $request->chat_id;
        $flagchange = AdminChat::find($chatid);
        $flagchange->seen_flag=1;
        $flagchange->update();

        $chat = AdminChat::find($chatid);
        $name = Userlist::find($chat->msg_from);
        $chats = [
            'username' => $name->user_name,
            'message' => $chat->message,
            'chatid' => $chatid,
        ];
        return response()->json($chats);
    }

    public function loadNewChatsCountAJAX(){
        $counter = 0;
        $chats = AdminChat::get();
        foreach($chats as $chat){
            if($chat->msg_from != 0){
                if($chat->seen_flag == 0){
                    $counter++;
                }
            }
        }
        return response()->json($counter);
    }
}