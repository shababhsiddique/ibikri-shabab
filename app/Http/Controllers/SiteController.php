<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Models\Post;

class SiteController extends Controller {

    //Layout holder
    private $layout;

    //Construct Common Items and Check Auth
    public function __construct() {
//        $this->middleware(CheckAdmin::class);
        $this->layout['siteContent'] = view('site.pages.home');
        $this->layout['notification'] = view('site.common.notification');
        
        $usertype = [];
        $usertype[0] = __('Individual');
        $usertype[1] = __('Dealer');
        View::share('usertype',$usertype);        

        View::share('category_title',__('category_title_en'));        
        View::share('subcategory_title',__('subcategory_title_en'));        
        View::share('division_title',__('division_title_en'));        
        View::share('city_title',__('city_title_en'));    
    }

    /**
     * Show dashboard
     * @return type
     */
    public function index() {

        //Load Component
        $this->layout['siteContent'] = view('site.pages.home');

        //return view
        return view('site.master', $this->layout);
    }

    public function ajaxCategoryModal() {
        return view('site.ajax.listcategories');
    }

    public function ajaxLocationModal() {
        return view('site.ajax.listlocations');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

     public function postAdImageHandler() {    
        
        error_reporting(E_ALL | E_STRICT);
        require('../app/Helpers/UploadHandler.php');
        $upload_handler = new UploadHandler();
        
    }
    
}
