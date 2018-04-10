<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Cache;
use View;
use Session;
use Redirect;
use Illuminate\Support\Carbon;

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




        View::share('condition_collapse', '');
        View::share('price_collapse', '');
        View::share('sellertype_collapse', '');
        View::share('order_by', __('Newest'));


        //Main Query
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
                ->where("users.account_status", 1)
                ->where("posts.status", 1)
                ->groupBy('postimages.post_id')
        ;



        //Check subcategory, if not set then check category
        if ($request->filled('subcategory_id')) {
            $query->where('subcategories.subcategory_id', '=', $request->subcategory_id);
        } elseif ($request->filled('category_id')) {
            $query->where('categories.category_id', '=', $request->category_id);
        }

        //Check division if not set then check district
        if ($request->filled('division_id')) {
            $query->where('divisions.division_id', '=', $request->division_id);
        } elseif ($request->filled('city_id')) {
            $query->where('cities.city_id', '=', $request->city_id);
        }


        /* Calcualte top ads */
        //7 day ago 
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        //today
        $endDate = date('Y-m-d 23:59:59', time());
        //Calcuate top ads based on current querry
        $queryTop = clone $query;
        $topAds = $queryTop
                ->join('featureds', 'featureds.post_id', '=', 'posts.post_id')
                ->where('featureds.created_at', '>', $startDate)
                ->where('featureds.created_at', '<', $endDate)
                ->inRandomOrder()
                ->limit(2)
                ->get();
        /* calculate top ads */


        //Check Item Condition
        if ($request->filled('item_condition') && $request->item_condition != 'all') {
            $query->where('posts.item_condition', '=', $request->item_condition);

            //this keeps the accordion open
            View::share('condition_collapse', 'in');
        }

        //Check User Type
        if ($request->filled('user_type') && $request->user_type != 'all') {
            $query->where('users.user_type', '=', $request->user_type);

            //this keeps the accordion open
            View::share('sellertype_collapse', 'in');
        }

        //Limit by Price range
        if ($request->filled('price_range')) {
            $prices = explode(',', $request->price_range);

            $query->where('posts.item_price', '>', (int) $prices[0]);
            $query->where('posts.item_price', '<', (int) $prices[1]);

            //this keeps the accordion open
            View::share('price_collapse', 'in');
        }

        //Search String in name
        if ($request->filled('q')) {
            $query->where('posts.ad_title', 'LIKE', "%" . $request->q . "%");
        }


        //Store count of total result
        View::share('number_of_results', $query->get()->count());


        //Order Results
        switch ($request->order_by) {
            case 'view':
                $query->orderBy('views', 'desc');
                View::share('order_by', __('Popular'));
                break;

            case 'price_up':
                $query->orderBy('item_price', 'asc');
                View::share('order_by', __('Price Ascending'));
                break;

            case 'price_down':
                $query->orderBy('item_price', 'desc');
                View::share('order_by', __('Price Descending'));
                break;

            case 'old':
                $query->orderBy('created_at', 'asc');
                View::share('order_by', __('Old First'));
                break;

            default:
                $query->orderBy('created_at', 'desc');
                View::share('order_by', __('New First'));
                break;
        }



        $ads = $query
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
                ->with('topAds', $topAds)
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

        View::share('condition_collapse', '');
        View::share('price_collapse', '');
        View::share('sellertype_collapse', '');
        View::share('order_by', __('Newest'));

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
                ->where("users.account_status", 1)
                ->where("posts.status", 1)
                ->groupBy('postimages.post_id');

        /* Calcualte top ads */
        //7 day ago 
        $startDate = date('Y-m-d 00:00:00', strtotime('-7 days'));
        //today
        $endDate = date('Y-m-d 23:59:59', time());
        //Calcuate top ads based on current querry
        $queryTop = clone $query;
        $topAds = $queryTop
                ->join('featureds', 'featureds.post_id', '=', 'posts.post_id')
                ->where('featureds.created_at', '>', $startDate)
                ->where('featureds.created_at', '<', $endDate)
                ->inRandomOrder()
                ->limit(2)
                ->get();
        /* calculate top ads */


        //Store count of total result
        View::share('number_of_results', $query->get()->count());


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
                ->with('topAds', $topAds)
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

        $adDetails = Post::findPublished($id);

        if (!$adDetails) {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Sorry',
                'body' => 'The Content You are looking for has been removed or does not exist',
                'type' => 'danger'
            ));

            return Redirect::to('/all-ads');
        }

        $relatedPosts = DB::table('posts')
                ->select(
                        'posts.*', 'subcategories.subcategory_title_en', 'subcategories.subcategory_title_bn', 'categories.category_id', 'categories.category_title_en', 'categories.category_title_bn', 'users.name', 'users.city_id', 'users.user_type', 'cities.city_id', 'cities.city_title_en', 'cities.city_title_bn', 'divisions.division_id', 'divisions.division_title_en', 'divisions.division_title_bn', 'postimages.postimage_thumbnail'
                )
                ->join('subcategories', 'subcategories.subcategory_id', '=', 'posts.subcategory_id')
                ->join('categories', 'categories.category_id', '=', 'subcategories.parent_category_id')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('cities', 'cities.city_id', '=', 'users.city_id')
                ->join('divisions', 'divisions.division_id', '=', 'cities.division_id')
                ->join('postimages', 'postimages.post_id', '=', 'posts.post_id')
                ->where("users.account_status", 1)
                ->where("posts.status", 1)
                ->where("posts.post_id", '!=', $adDetails->post_id)
                ->where("posts.subcategory_id", $adDetails->subcategory_id)
                ->groupBy('postimages.post_id')
                ->orderBy('posts.views', 'desc')
                ->limit(3)
                ->get();

        $this->layout['siteContent'] = view('site.pages.addetails')
                ->with('adDetails', $adDetails)
                ->with('relatedPosts', $relatedPosts);

        //return view
        return view('site.master', $this->layout);
    }

    /**
     * 
     * @param type $id
     */
    public function ajaxView($id, $tok) {

        if ($tok == csrf_token()) {
            $post = Post::find($id);
            $post->views = $post->views + 1;
            $post->save();
            return "ok";
        } else {
            return "error";
        }
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
