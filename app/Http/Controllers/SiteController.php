<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //Layout holder
    private $layout;

    //Construct Common Items and Check Auth
    public function __construct() {
//        $this->middleware(CheckAdmin::class);
        $this->layout['siteContent'] = view('site.pages.home');
//        $this->layout['notification'] = view('common.notification');
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
    
    public function ajaxCategoryModal(){
        return view('site.ajax.listcategories');
    }
    
    public function ajaxLocationModal(){
        return view('site.ajax.listlocations');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
