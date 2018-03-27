<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Testing\File;


/* Models */
use App\User;
use App\Models\Post;
use App\Models\Postimage;

session_start();

class HomeController extends Controller {

    //Layout holder
    private $layout;    

    public function __construct() {
        $this->middleware('auth');

              

        $this->layout['notification'] = view('site.common.notification');
    }

    /**
     * User Dashboard / Controlpanel
     * @return type
     */
    public function dashboard() {

        //Load Component
        $this->layout['siteContent'] = view('site.pages.dashboard');

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * Profile Info Edit Form
     * @return type
     */
    public function account() {

        $userData = User::find(\Auth::user()->id);

        //Load Component
        $this->layout['siteContent'] = view('site.pages.account')->with('userData', $userData);

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * POST handler for profile form
     * @param Request $request
     * @return type
     */
    public function accountUpdate(Request $request) {

        $authUser = \Auth::user();
        $userData = User::find($authUser->id);

        $request->validate([
            'name' => 'required|string|max:200'
        ]);


        /* Mobile Provided */
        if ($request->filled('mobile')) {
            $request->validate([
                'mobile' => 'required|string|max:19'
            ]);
            $userData->mobile = $request->mobile;
        }

        /* Old Password Entered and matches current */
        if ($request->filled('password')) {
            if (Hash::check($request->password, $userData->password)) {
                $request->validate([
                    'password_new' => 'required|string|min:6|confirmed',
                ]);
                $userData->password = Hash::make($request->password_new);
            } else {
                $request->validate([
                    'password_incorrect' => 'required',
                ]);
            }
        }

        /* Preference Comment */
        if ($request->has('comment_enabled')) {
            $userData->comment_enabled = 1;
        } else {
            $userData->comment_enabled = 0;
        }

        /* Preference Newsletter */
        if ($request->has('newsletter_enabled')) {
            $userData->newsletter_enabled = 1;
        } else {
            $userData->newsletter_enabled = 0;
        }

        $userData->name = $request->name;
        $userData->info = $request->info;
        $userData->city_id = $request->city_id;
        $userData->user_type = $request->user_type;

        $userData->save();

        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Updated',
            'body' => 'Youre account detail has been updated',
            'type' => 'success'
        ));

        return Redirect::to('/account');
    }

    /**
     * Show Ad Post Form
     * @return type
     */
    public function postAd() {

        $folder = Session::get('post-image-cache');
        if ($folder) {
            rrmdir(base_path("public/images/temp/$folder/"));
        }

        //Load Component
        $this->layout['siteContent'] = view('site.pages.postad.form');

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * Post Image Ajax Handler
     * @param Request $request
     */
    public function postImageUpload(Request $request) {

        $folder = Session::get('post-image-cache');
        if (!$folder) {
            $folder = uniqid();
            Session::put('post-image-cache', $folder);
        }

        $files = $request->file('file');
        $originalName = $files->getClientOriginalName();
        $extension = $files->extension();
        $customName = uniqid() . "." . $extension;
        //$imgUrl = 'public/images/products/' . $customName;
        $destinationPath = base_path("public/images/temp/$folder");

        //Try upload
        $success = $files->move($destinationPath, $customName);

        if ($success) {
            $output = array(
                $originalName => $customName
            );
            echo json_encode($output);
        } else {
            echo 'error';
        }
    }

    /**
     * Post Image delete handler
     * @param Request $request
     */
    public function postImageDeleteCache(Request $request) {

        $fileToDelete = $request->uploadname;
        $folder = Session::get('post-image-cache');
        if ($folder) {
            unlink(base_path("public/images/temp/$folder/$fileToDelete"));
            echo "deleted";
        } else {
            echo "session not found";
        }
    }

    
    /**
     * Ad Post Submit Handler
     * @param Request $request
     */
    public function postAdSubmit(Request $request) {

        $request->validate([
            'ad_title' => 'required|string|max:200',
            'item_condition' => 'required',
            'subcategory_id' => 'required',
            'item_price' => 'required|numeric|min:1',
            'model' => 'required|string|max:100',
            'short_description' => 'required|string|max:300',
            'long_description' => 'required|string|max:5000',
            'imagenames' => 'required|string|min:5',
        ]);
        
        $user = \Auth::user();
        
//        
//        $post = new Post;
//        
//        $post->user_id = $user->id;
//        
//        $post->ad_title = $request->ad_title;
//        $post->item_condition = $request->item_condition;
//        $post->subcategory_id = $request->subcategory_id;
//        $post->item_price = $request->item_price;
//        $post->model = $request->model;
//        $post->short_description = $request->short_description;
//        $post->long_description = $request->long_description;
//        
//        $post->save();
//        
        
        $images = json_decode($request->imagenames);        
        $folder = Session::get('post-image-cache');
        
        foreach($images as $orig => $filename){

            $tempPath = base_path("public/images/temp/$folder/$filename");
            $newPath = base_path("public/images/".$user->id."_".$filename);
            
            //move file
            rename($tempPath, $newPath);
        }

        //remove directory
        rmdir(base_path("public/images/temp/$folder"));

        echo "<pre>";
        print_r($user->id);
        print_r($_POST);
        print_r($_FILES);
        exit();
    }

}
