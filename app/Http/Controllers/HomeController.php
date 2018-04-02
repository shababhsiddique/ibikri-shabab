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

        $userAds = Post::where("user_id", \Auth::user()->id)
                ->orderBy('post_id','desc')
                ->get();

        //Load Component
        $this->layout['siteContent'] = view('site.pages.dashboard')
                ->with("userAds", $userAds);


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

        $errors = Session::get('errors');
        if (isset($errors)) {
            //This is a validation redirect, dont empty image cache
        } else {
            //This is a new form , empty image cache
            $folder = Session::get('post-image-cache');
            if ($folder) {
                rrmdir(base_path("public/images/temp/$folder/"));
                Session::forget('post-image-cache');
            }
        }

        $authUser = \Auth::user();
        $userData = User::find($authUser->id);


        //Load Component
        $this->layout['siteContent'] = view('site.pages.postad.form')
                ->with('userData', $userData);

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
            $user = \Auth::user();
            $folder = $user->id . "_" . uniqid();
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

            /* Save thumbnail to disc */
            $data = $request->thumbnail;
            $source = fopen($data, 'r');
            $destination = fopen(base_path("public/images/temp/$folder/thumb_$customName"), 'w');
            stream_copy_to_stream($source, $destination);
            fclose($source);
            fclose($destination);
            /* Save thumbnail */

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
            unlink(base_path("public/images/temp/$folder/thumb_$fileToDelete"));
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
            'ad_type' => 'required',
            'ad_title' => 'required|string|max:200',
            'item_condition' => 'required',
            'subcategory_id' => 'required',
            'city_id' => 'required',
            'contact_phone' => 'required',
            'item_price' => 'required|numeric|min:1',
            'model' => 'required|string|max:100',
            'short_description' => 'required|string|max:300',
            'long_description' => 'required|string|max:5000',
            'imagenames' => 'required|string|min:5',
        ]);

        $user = \Auth::user();


        $post = new Post;

        $post->user_id = $user->id;

        $post->ad_type = $request->ad_type;
        $post->ad_title = $request->ad_title;
        $post->item_condition = $request->item_condition;
        $post->subcategory_id = $request->subcategory_id;
        $post->item_price = $request->item_price;
        $post->model = $request->model;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;

        if ($request->has('negotiable')) {
            $post->price_negotiable = 1;
        } else {
            $post->price_negotiable = 0;
        }

        //$post->contact_phone = $request->contact_phone;
        //$post->city_id = $request->city_id;

        $post->save();


        //Update mobile and location if changed
        $userData = User::find($user->id);

        $userData->mobile = $request->contact_phone;
        $userData->city_id = $request->city_id;

        $userData->save();


        $images = json_decode($request->imagenames);
        $folder = Session::get('post-image-cache');

        foreach ($images as $orig => $filename) {

            $tempPath = base_path("public/images/temp/$folder/$filename");
            $newPath = base_path("public/images/" . $user->id . "_" . $filename);

            //move file
            rename($tempPath, $newPath);

            $tempPathThumb = base_path("public/images/temp/$folder/thumb_$filename");
            $newPathThumb = base_path("public/images/thumb/" . $user->id . "_" . $filename);

            //move thumbnail
            rename($tempPathThumb, $newPathThumb);


            $postImage = new Postimage;
            $postImage->post_id = $post->post_id;
            $postImage->postimage_file = "images/" . $user->id . "_" . $filename;
            $postImage->postimage_thumbnail = "images/thumb/" . $user->id . "_" . $filename;
            $postImage->save();
        }

        //remove temp folder
        rmdir(base_path("public/images/temp/$folder"));

        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Ad Posted',
            'body' => 'Ad has been posted',
            'type' => 'success'
        ));

        return Redirect::to('/dashboard');
    }

    /**
     * Edit Ad Form
     * @return type
     */
    public function editAd($post_id) {

        $errors = Session::get('errors');
        if (isset($errors)) {
            //This is a validation redirect, dont empty image cache
        } else {
            //This is a new form , empty image cache
            $folder = Session::get('post-image-cache');
            if ($folder) {
                rrmdir(base_path("public/images/temp/$folder/"));
                Session::forget('post-image-cache');
            }
        }

        $authUser = \Auth::user();
        $userData = User::find($authUser->id);
        $postData = Post::where("post_id", $post_id)
                ->where("user_id", $authUser->id)
                ->first();

//        echo "<pre>";
//        print_r($postData);
//        exit();
        //Load Component
        $this->layout['siteContent'] = view('site.pages.postad.form')
                ->with('postData', $postData)
                ->with('userData', $userData);

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * Remove image from edit post
     * @param type $id
     */
    public function postImageEditRemove($id) {

        $postImage = Postimage::find($id);

        $parentPost = Post::find($postImage->post_id);

        if (sizeof($parentPost->postimages) > 1) {
            unlink(base_path("public/$postImage->postimage_thumbnail"));
            unlink(base_path("public/$postImage->postimage_file"));

            $postImage->delete();

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Ad Image Deleted',
                'body' => 'image deleted',
                'type' => 'success'
            ));
        } else {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'This ad needs atleast 1 image.',
                'body' => 'add one more image before deleting this',
                'type' => 'warning'
            ));
        }

        return Redirect::to("/edit-ad/$parentPost->post_id");
    }

    /**
     * Submit handler for edit
     * @param Request $request
     * @return type
     */
    public function editAdSubmit(Request $request) {


        $request->validate([
            'ad_type' => 'required',
            'ad_title' => 'required|string|max:200',
            'item_condition' => 'required',
            'subcategory_id' => 'required',
            'item_price' => 'required|numeric|min:1',
            'model' => 'required|string|max:100',
            'short_description' => 'required|string|max:300',
            'long_description' => 'required|string|max:5000',
        ]);

        $user = \Auth::user();


        $post = Post::find($request->post_id);

        $post->user_id = $user->id;

        $post->ad_type = $request->ad_type;
        $post->ad_title = $request->ad_title;
        $post->item_condition = $request->item_condition;
        $post->subcategory_id = $request->subcategory_id;
        $post->item_price = $request->item_price;
        $post->model = $request->model;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;

        if ($request->has('negotiable')) {
            $post->price_negotiable = 1;
        } else {
            $post->price_negotiable = 0;
        }

        $post->save();


        if (strlen($request->imagenames)>5) {

            $images = json_decode($request->imagenames);
            $folder = Session::get('post-image-cache');

            foreach ($images as $orig => $filename) {

                $tempPath = base_path("public/images/temp/$folder/$filename");
                $newPath = base_path("public/images/" . $user->id . "_" . $filename);

                //move file
                rename($tempPath, $newPath);

                $tempPathThumb = base_path("public/images/temp/$folder/thumb_$filename");
                $newPathThumb = base_path("public/images/thumb/" . $user->id . "_" . $filename);

                //move thumbnail
                rename($tempPathThumb, $newPathThumb);


                $postImage = new Postimage;
                $postImage->post_id = $post->post_id;
                $postImage->postimage_file = "images/" . $user->id . "_" . $filename;
                $postImage->postimage_thumbnail = "images/thumb/" . $user->id . "_" . $filename;
                $postImage->save();
            }

            //remove temp folder
            rmdir(base_path("public/images/temp/$folder"));
        }

        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Ad Updated',
            'body' => 'Ad has been updated',
            'type' => 'success'
        ));

        return Redirect::to('/dashboard');
    }

    public function deleteAd($id) {

        $user = \Auth::user();

        $post = Post::where('post_id', $id)
                ->where('user_id', $user->id)
                ->first();

        foreach ($post->postimages as $aPostImage) {

            $image = base_path("public/$aPostImage->postimage_file");
            $thumbnail = base_path("public/$aPostImage->postimage_thumbnail");

            unlink($image);
            unlink($thumbnail);
        }

        $post->delete();

//        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Ad Deleted',
            'body' => 'Ad has been permenently deleted',
            'type' => 'success'
        ));

        return Redirect::to('/dashboard');
    }

}
