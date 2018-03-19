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
