<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Session;
use Auth;
use DB;
class MessengerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {

        $id = base64_url_decode($id);

        $threads = Message::select('messages.*', 
                DB::raw('count(read_status) as unread'),
                'sender.name as sender', 'receiver.name as receiver')
                ->join('users as sender', 'sender.id', '=', 'messages.sender_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.receiver_id')
                ->where('sender_id', $id)
                ->orWhere('receiver_id', $id)
                ->groupBy('thread')
                ->orderBy('message_id')
                ->get();
        
        foreach($threads as $key=>$row){
            
            $unreadInThread = Message::where('receiver_id',$id)
                    ->where("read_status",0)
                    ->where('thread',$row->thread)
                    ->count();
            $threads[$key]->unread = $unreadInThread;
        }

        return response()->json($threads, 206);
    }

    /**
     * Get messages in this thread
     * @param type $code
     * @param type $reader_id
     * @return type
     */
    public function getMessageThread($code, $reader_id) {


        $messages = Message::select('messages.message','messages.read_status', 'messages.sender_id', 'messages.receiver_id', 'sender.name as sender', 'receiver.name as receiver')
                ->join('users as sender', 'sender.id', '=', 'messages.sender_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.receiver_id')
                ->where('thread', $code)
                ->orderBy('message_id', "asc")
//                ->take(10)
//                ->reverse()
                ->get()
        ;

        //mark messages in this thread that is for me as read
        Message::where('thread', $code)
               ->where("receiver_id",$reader_id)
                ->update(array(
                    'read_status' => 1 //mark as read
        ));

//        $messages = $messages->reverse();

        return response()->json($messages, 206);
    }

    /**
     * Send message
     * @param Request $request
     * @return type
     */
    public function sendMessage(Request $request) {


        $sender_id = $request->sender_id;
        $receiver_id = $request->receiver_id;
        $thread = $request->thread;


        $party1 = min($sender_id, $receiver_id);
        $party2 = max($sender_id, $receiver_id);

        $secret = md5("$party1###$party2");

        if ($secret != $request->thread) {
            return response()->json(array('error'), 204);
        }


        $newMessage = new Message;
        $newMessage->thread = $thread;
        $newMessage->sender_id = $sender_id;
        $newMessage->receiver_id = $receiver_id;
        $newMessage->message = $request->message;
        $newMessage->save();
        

        return response()->json(array('success'), 204);
    }
    
    
    /**
     * Get number of unread message by this user
     * @param type $userId
     */
    public function getUnreadCount($userId){
        $count = Message::where('receiver_id', $userId)
                ->where('read_status', 0)
                ->count();
        
        return $count;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
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

}
