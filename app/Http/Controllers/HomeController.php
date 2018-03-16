<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

/* Models */
use App\User;

session_start();

class HomeController extends Controller {

    //Layout holder
    private $layout;

    public function __construct() {
        $this->middleware('auth');

        $this->layout['notification'] = view('site.common.notification');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //Load Component
        $this->layout['siteContent'] = view('site.pages.home');

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * User Profile / Controlpanel
     * @return type
     */
    public function dashboard() {

        //Load Component
        $this->layout['siteContent'] = view('site.pages.dashboard');

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * User Profile / Controlpanel
     * @return type
     */
    public function account() {

        $userData = User::find(\Auth::user()->id);

        //Load Component
        $this->layout['siteContent'] = view('site.pages.account')->with('userData', $userData);

        //return view
        return view('site.master', $this->layout);
    }

    public function accountUpdate(Request $request) {

        $authUser = \Auth::user();
        $userData = User::find($authUser->id);

        //Conditional Change
        if ($request->filled('name')) {
            $request->validate([
                'name' => 'required|string|max:200'
            ]);
            $userData->name = $request->name;
        }

        /* Mobile Provided */
        if ($request->filled('mobile')) {
            $request->validate([
                'mobile' => 'required|string|max:19'
            ]);
            $userData->mobile = $request->mobile;
        }

        /* Old Password Entered and matches current */
        if ($request->filled('password') && (Hash::check($request->password, $userData->password))) {
            $request->validate([
                'password_new' => 'required|string|min:6|confirmed',
            ]);
            $userData->password = Hash::make($request->password_new);
        }

        echo "<pre>";
        print_r($request->comment_enabled);
        echo "</br>";
        print_r($request->newsletter_enabled);
        exit();
        //$userData->comment_enabled = $request->comment_enabled;
        //$userData->newsletter_enabled = $request->newsletter_enabled;

        $userData->save();
        
        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Updated',
            'body' => 'Youre account detail has been updated',
            'type' => 'success'
        ));

        return Redirect::to('/account');
    }

}
