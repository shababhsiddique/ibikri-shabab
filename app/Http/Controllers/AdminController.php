<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\CheckAdmin;
use App\Models\Admin;
use App\Models\Category;

session_start();

class AdminController extends Controller {

    //Layout holder
    private $layout;

    //Construct Common Items and Check Auth
    public function __construct() {
        $this->middleware(CheckAdmin::class);

        $this->layout['adminNotification'] = view('admin.common.notification');
    }

    /**
     * Show dashboard
     * @return type
     */
    public function index() {

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.dashboard');

        //return view
        return view('admin.master', $this->layout);
    }

    public function categoryView() {

        $categories = Category::orderBy('category_weight', 'ASC')->get();

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.list')
                ->with('categories', $categories);

        //return view
        return view('admin.master', $this->layout);
    }

    public function categoryEdit($id) {

        $oldCategoryData = Category::find($id);

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.categorycreate')
                ->with('oldCategoryData', $oldCategoryData);

        //return view
        return view('admin.master', $this->layout);
    }

    public function categoryCreate() {

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.categorycreate');

        //return view
        return view('admin.master', $this->layout);
    }

    public function categorySaveCategory(Request $request) {


        $redirectUrl = '/admin/categories';

        if (isset($request->category_id)) {

            $redirectUrl = '/admin/category/edit/' . $request->category_id;

            $category = Category::find($request->category_id);

            Session::put('message', array(
                'title' => 'Category Updated',
                'body' => "Category Info Updated",
                'type' => 'info'
            ));
        } else {

            $validatedData = $request->validate([
                'category_title_en' => 'required|string|unique:categories|max:50',
                'category_title_bn' => 'required|string|unique:categories|max:50',
                'category_image' => 'required',
                'category_icon' => 'required'
            ]);

            $category = new Category;

            Session::put('message', array(
                'title' => 'Category Created',
                'body' => "Created New Category",
                'type' => 'success'
            ));

            $category->category_image = "";
        }



        $category->category_title_en = $request->category_title_en;
        $category->category_title_bn = $request->category_title_bn;

        $category->category_icon = $request->category_icon;

        if ($request->has('categor_weight')) {
            $category->category_weight = $request->category_weight;
        }else{
            $category->category_weight = 0;
        }
        $category->category_caption = $request->category_caption;


        /*
         * Image Upload
         */
        $files = $request->file('category_image');

        //File Is Selected, Proceed with upload
        if ($files) {

            $extension = $files->extension();

            $allowedExtensions = ['png'];

            if (!( $request->file('category_image')->isValid() && (in_array($extension, $allowedExtensions)) )) {

                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Invalid File Selected',
                    'body' => "Please select image file with png extension. With less than 10kb size",
                    'type' => 'danger'
                ));

                return Redirect::to($redirectUrl);
            }

            $filename = $files->getClientOriginalName();
            $customName = str_replace(' ', '_', strtolower($request->category_title_en)) . "." . $extension;
            $imgUrl = 'images/category/' . $customName;
            $destinationPath = base_path() . "/public/images/category/";

            //Try upload
            $success = $files->move($destinationPath, $customName);

            if ($success) {

                //Delete Old iMage if edit and has old image
                if (isset($request->category_id) && ($request->category_image_old != "")) {
                    $oldFileName = $request->category_image_old;
                    unlink($oldFileName);
                }

                $category->category_image = $imgUrl;

                //If it is an edit , remove old file
            } else {

                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Error',
                    'body' => "File Upload Failed",
                    'type' => 'danger'
                ));
            }
        }

        $category->save();

        return Redirect::to($redirectUrl);
    }

    /*
     * Sample page with a table
     */

    public function table() {


        //Load Component
        //Load Component
        $this->layout['adminContent'] = view('admin.partials.tables');

        //return view
        return view('admin.master', $this->layout);
    }

    public function form() {


        //Load Component
        //Load Component
        $this->layout['adminContent'] = view('admin.partials.form');

        //return view
        return view('admin.master', $this->layout);
    }

    public function logout() {


        //Admin informations
        Session::put('admin_id', 0);


        Session::forget('admin_username');
        Session::forget('admin_name');
        Session::forget('admin_privilage');

        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Logged Out, ',
            'body' => 'You are no longer logged in',
            'type' => 'warning'
        ));

        return Redirect::to('/')->send();
    }

}
