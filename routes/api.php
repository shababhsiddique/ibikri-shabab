<?php

use Illuminate\Http\Request;
use App\Models\Message;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//Route::get('/threads', function() {    
//    $threads = Message::all();
//    return response()->json($threads, 206);
//});


Route::get('/threads/{id}', "MessengerController@index");

Route::get('/thread/{code}/{reader_id}', "MessengerController@getMessageThread");

Route::post('/submitmessage',"MessengerController@sendMessage");

Route::get('/unreadmessages/{user_id}', "MessengerController@getUnreadCount");



//Route::get('/message/{otherpartyid}', function($otherpartyid) {    
//    
//    $user = Auth::user();
//    echo "<pre>";
//    print_r($user);
//    exit();
//    $opponent_id = 1;
//    
//    $messages = Message::where(function($query) use ($otherpartyid, $opponent_id) {
//                    $query->where('user_one', $otherpartyid)
//                          ->where('user_two', $opponent_id);
//                })
//                 ->orWhere(function($query) use ($opponent_id, $otherpartyid) {
//                    $query->where('user_one', $opponent_id)
//                          ->where('user_two', $otherpartyid);
//                })->get();
//                
//    return response()->json($messages, 206);
//});
//
//Route::post('/submitmessage', function(Request $request) {    
//    
////    if($request->_token != csrf_token()){
////        return "error";
////    }
//    
//    $party1 = $request->user_one;
//    $party2 = $request->user_two;
//    
//    if($party1 > $party2){
//        $party1 = $request->user_two;
//        $party2 = $request->user_one;
//    }
//    
//    $newMessage = new Message;
//    $newMessage->user_one = $party1;
//    $newMessage->user_two = $party2;
//    $newMessage->message = $request->message;
//    $newMessage->save();
//    
//    return "success";
////    $threads = Message::all();
////    return response()->json($threads, 206);
//});
