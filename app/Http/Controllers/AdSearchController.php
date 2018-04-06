<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Cache;
use View;

class AdSearchController extends Controller {

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
        View::share('usertype', $usertype);

        View::share('category_title', __('category_title_en'));
        View::share('subcategory_title', __('subcategory_title_en'));
        View::share('division_title', __('division_title_en'));
        View::share('city_title', __('city_title_en'));
    }

    /**
     * Ad Listing
     * @return type
     */
    public function allAds(Request $request) {


        $query = DB::table('posts')
                ->select(
                        'posts.*', 'subcategories.subcategory_title_en', 'subcategories.subcategory_title_bn', 'categories.category_id', 'categories.category_title_en', 'categories.category_title_bn', 'users.name', 'users.city_id', 'users.user_type', 'cities.city_id', 'cities.city_title_en', 'cities.city_title_bn', 'divisions.division_id', 'divisions.division_title_en', 'divisions.division_title_bn', 'postimages.postimage_thumbnail'
                )
                ->join('subcategories', 'subcategories.subcategory_id', '=', 'posts.subcategory_id')
                ->join('categories', 'categories.category_id', '=', 'subcategories.parent_category_id')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('cities', 'cities.city_id', '=', 'users.city_id')
                ->join('divisions', 'divisions.division_id', '=', 'cities.division_id')
                ->join('postimages', 'postimages.post_id', '=', 'posts.post_id')
                ->groupBy('postimages.post_id');


        //Check subcategory, if not set then category
        if ($request->filled('subcategory_id')) {
            $query->where('subcategories.subcategory_id', '=', $request->subcategory_id);
        } elseif ($request->filled('category_id')) {
            $query->where('categories.category_id', '=', $request->category_id);
        }

        //Check division if not set then district
        if ($request->filled('division_id')) {
            $query->where('divisions.division_id', '=', $request->division_id);
        } elseif ($request->filled('city_id')) {
            $query->where('cities.city_id', '=', $request->city_id);
        }

        //Search String in name
        if ($request->filled('q')) {
            $query->where('posts.ad_title', 'LIKE', "%" . $request->q . "%");
        }



        $ads = $query
                ->orderBy('post_id', 'desc')
                ->paginate(10)
                ->appends(Input::except('page'));


        //Cache Categories
        $categories = Cache::rememberForever('categories', function() {
                    return DB::table('categories')
                                    ->orderBy('category_weight', 'asc')
                                    ->get();
                });

        //Load Component
        $this->layout['siteContent'] = view('site.pages.listads')
                ->with('categories', $categories)
                ->with('ads', $ads);

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * Ad listing By User
     * @param type $id
     * @param type $name
     * @return type
     */
    public function adsByUser($id, $name) {

        $query = DB::table('posts')
                ->select(
                        'posts.*', 'subcategories.subcategory_title_en', 'subcategories.subcategory_title_bn', 'categories.category_id', 'categories.category_title_en', 'categories.category_title_bn', 'users.name', 'users.city_id', 'users.user_type', 'cities.city_id', 'cities.city_title_en', 'cities.city_title_bn', 'divisions.division_id', 'divisions.division_title_en', 'divisions.division_title_bn', 'postimages.postimage_thumbnail'
                )
                ->join('subcategories', 'subcategories.subcategory_id', '=', 'posts.subcategory_id')
                ->join('categories', 'categories.category_id', '=', 'subcategories.parent_category_id')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('cities', 'cities.city_id', '=', 'users.city_id')
                ->join('divisions', 'divisions.division_id', '=', 'cities.division_id')
                ->join('postimages', 'postimages.post_id', '=', 'posts.post_id')
                ->where('users.id', $id)
                ->groupBy('postimages.post_id');

        $ads = $query
                ->orderBy('post_id', 'desc')
                ->paginate(10)
                ->appends(Input::except('page'));

        //Cache Categories
        $categories = Cache::rememberForever('categories', function() {
                    return DB::table('categories')
                                    ->orderBy('category_weight', 'asc')
                                    ->get();
                });

        //Load Component
        $this->layout['siteContent'] = view('site.pages.listads')
                ->with('bigtitle', "$name")
                ->with('categories', $categories)
                ->with('ads', $ads);

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * View Ad Detail Info
     * @param type $id
     * @param type $title
     * @return type
     */
    public function adDetails($id, $title = "") {

        $adDetails = Post::find($id);

        $this->layout['siteContent'] = view('site.pages.addetails')
                ->with('adDetails', $adDetails);

        //return view
        return view('site.master', $this->layout);
    }
    
    /**
     * 
     * @param type $id
     */
    public function ajaxView($id){
        $post = Post::find($id);
        $post->views = $post->views + 1;
        $post->save();
    }

    public function test() {

        $query = DB::table('posts')
                ->select('posts.*', 'postimages.postimage_thumbnail')
                ->join('postimages', 'postimages.post_id', '=', 'posts.post_id')
                ->groupBy('postimages.post_id');



        $data = $query->get();
        foreach ($data as $row) {
            echo $row->post_id . "<br/>";
        }

        exit();
    }

}
