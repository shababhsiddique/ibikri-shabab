<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

use App\Models\Admin;

class AdminLoginController extends Controller {

    //test sourcetree
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $id = Session::get('admin_id');

        if ($id == NULL || $id == 0) {
            return view("admin.login");
        } else {
            return redirect('/admin');
        }
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function verifyUser(Request $request) {

        $username = $request->username;
        $password = $request->password;


        $result = Admin::where("admin_username", $username)
                ->where('admin_password', md5($password))
                ->first();


        if ($result) {

            Session::put('admin_username', $result->admin_username);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_privilage', $result->admin_privilage);
            Session::put('admin_id', $result->admin_id);
            //Message for Notification Builder
            Session::put('message', array(
                'title' => "Welcome, $result->admin_name",
                'body' => 'You are now logged in',
                'type' => 'success'
            ));


            // return view('admin.admin_master');
            return Redirect::to('/admin');
        } else {

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Sorry',
                'body' => 'Username or Password invalid',
                'type' => 'warning'
            ));
            return Redirect::to('/administrator');
        }
    }

}
