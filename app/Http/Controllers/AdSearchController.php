<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class AdSearchController extends Controller {

    
    /**
     * Ad Listing
     * @return type
     */
    public function allAds() {

        $query = DB::table('posts')
                ->select(
                        'posts.*', 
                        'subcategories.subcategory_title_en',
                        'subcategories.subcategory_title_bn', 
                        'categories.category_id', 
                        'categories.category_title_en', 
                        'categories.category_title_bn',
                        'users.name',
                        'users.city_id', 
                        'users.user_type',
                        'cities.city_id', 
                        'cities.city_title_en', 
                        'cities.city_title_bn', 
                        'divisions.division_id', 
                        'divisions.division_title_en', 
                        'divisions.division_title_bn', 
                        'postimages.postimage_thumbnail'
                )
                ->join('subcategories', 'subcategories.subcategory_id', '=', 'posts.subcategory_id')
                ->join('categories', 'categories.category_id', '=', 'subcategories.parent_category_id')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('cities', 'cities.city_id', '=', 'users.city_id')
                ->join('divisions', 'divisions.division_id', '=', 'cities.division_id')
                ->join('postimages', 'postimages.post_id', '=', 'posts.post_id')
                ->groupBy('postimages.post_id');


        $query->when(request('category_id', false), function ($q) {
            return $q->where('categories.category_id', '=', request('category_id'));
        });
        $query->when(request('subcategory_id', false), function ($q) {
            return $q->where('subcategories.subcategory_id', '=', request('subcategory_id'));
        });
        $query->when(request('divisions', false), function ($q) {
            return $q->where('divisions.division_id', '=', request('division_id'));
        });
        $query->when(request('city_id', false), function ($q) {
            return $q->where('cities.city_id', '=', request('city_id'));
        });
        
        $query->limit(500);
        
        
        //Load Component
        $this->layout['siteContent'] = view('site.pages.listads')
                ->with('ads',  $query->get());

        //return view
        return view('site.master', $this->layout);
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
