<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\CheckAdmin;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Division;

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

    
    /**
     * Category Management Start
     */
    
    /**
     * List Category
     * @return type
     */
    public function categoryView() {

        $categories = Category::orderBy('category_weight', 'ASC')->get();

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.list')
                ->with('categories', $categories);

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Edit Category Form
     * @param type $id
     * @return type
     */
    public function categoryEdit($id) {

        $oldCategoryData = Category::find($id);

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.categorycreate')
                ->with('oldCategoryData', $oldCategoryData);

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Create Category Form
     * @return type
     */
    public function categoryCreate() {

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.categorycreate');

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Save Category POST handler
     * @param Request $request
     * @return type
     */
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

    
    
    /**
     * Sub Category Edit Form
     * @param type $subcategory_id
     * @return type
     */
    public function subcategoryEdit($subcategory_id) {

        $oldCategoryData = Subcategory::find($subcategory_id);
        
        //Load Component
        $this->layout['adminContent'] = view('admin.partials.subcategory.form')
                ->with('oldCategoryData', $oldCategoryData);

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Sub Category Create Form
     * @return type
     */
    public function subcategoryCreate() {
        
        //Load Component
        $this->layout['adminContent'] = view('admin.partials.subcategory.form');

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Sub Category Save POST handler
     * @param Request $request
     * @return type
     */
    public function subcategorySave(Request $request) {
        
        $redirectUrl = '/admin/subcategory/create';

        if (isset($request->subcategory_id)) {

            $redirectUrl = '/admin/subcategory/edit/' . $request->subcategory_id;

            $subcat = Subcategory::find($request->subcategory_id);

            Session::put('message', array(
                'title' => 'Sub Category Updated',
                'body' => "Sub Category Info Updated",
                'type' => 'info'
            ));
            
            
            $validatedData = $request->validate([
                'parent_category_id' => 'required',
                'subcategory_title_en' => 'required|string',
                'subcategory_title_bn' => 'required|string'
            ]);
            
        } else {

            
            $validatedData = $request->validate([
                'parent_category_id' => 'required',
                'subcategory_title_en' => 'required|string|unique:subcategories|max:50',
                'subcategory_title_bn' => 'required|string|unique:subcategories|max:50'
            ]);       

            
            $subcat = new Subcategory;

            Session::put('message', array(
                'title' => 'Sub Category Created',
                'body' => "Created New Sub Category $request->subcategory_title_en ($request->subcategory_title_bn)",
                'type' => 'success'
            ));
        }
        

        $subcat->parent_category_id = $request->parent_category_id;
        $subcat->subcategory_title_en = $request->subcategory_title_en;
        $subcat->subcategory_title_bn = $request->subcategory_title_bn;

        if ($request->has('subcategory_weight')) {
            $subcat->subcategory_weight = $request->subcategory_weight;
        }else{
            $subcat->subcategory_weight = 0;
        }
        $subcat->subcategory_caption = $request->subcategory_caption;

        $subcat->save();

        return Redirect::to($redirectUrl);
    }
    /**
     * Category Management End
     */
    
    
    /**
     * Location Management Start
     */
    /**
     * List Locations
     * @return type
     */
    public function locationView() {

        $divisions = Division::orderBy('division_weight', 'ASC')->get();

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.location.list')
                ->with('divisions', $divisions);

        //return view
        return view('admin.master', $this->layout);
    }
    
    /**
     * Show Create Division FOrm
     * @return type
     */
    public function divisionCreate() {

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.location.divisionform');

        //return view
        return view('admin.master', $this->layout);
    }
    
    
    public function divisionEdit($id) {

        $oldCategoryData = Category::find($id);

        //Load Component
        $this->layout['adminContent'] = view('admin.partials.category.categorycreate')
                ->with('oldCategoryData', $oldCategoryData);

        //return view
        return view('admin.master', $this->layout);
    }
    
    
    /**
     * Location Management End
     */


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
