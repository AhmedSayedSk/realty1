<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use Auth;
class chatController extends Controller
{
    //
    public  function getIndex($friend_id)
    {

      Session::put('friend_id',$friend_id);
      if(Auth::check()){
        $user_id = Auth::user()->id;
        $userData = ["chat_status"=>"0"];
        $friendData = ["chat_status"=>1];
        //create chat file if not exists

        Storage::put('usersData/'.$user_id.".json",json_encode($userData));Storage::put('usersData/'.$user_id.".json",json_encode($userData));
        Storage::put('usersData/'.$friend_id.".json",json_encode($friendData));
        if(Storage::exists("$user_id".'-'."$friend_id".".json")
        ||(Storage::exists("$friend_id".'-'."$user_id".".json"))){
            $msgs = app('App\Http\Controllers\chatController')->getUserMsgs($user_id, $friend_id);
       //print_r($msgs);
       //echo count((array)$msgs);
       }
       else{
        Storage::put("$user_id".'-'."$friend_id".".json",json_encode(json_decode ("{}")));
        $msgs=[];
       }
       //print_r($msgs);
        Session::put('user_id',$user_id);
       return view("front.realty.chat")->withMsgs($msgs)->with('user_id', $user_id)->with('friend_id', $friend_id);
   }
   else{
     return redirect("auth");
   }
 }
   public function postSetMsg(Request $request){

       $message = $request->input('msg');

       $user_id = Auth::user()->id;
       $friend_id = Session::get('friend_id');

       if(Storage::exists("$user_id".'-'."$friend_id".".json")){
          $ids = "$user_id".'-'."$friend_id";
      }else{
          $ids = "$friend_id-$user_id";
      }

       $data_temp1 = Storage::get("$ids.json");
       $data_temp2 = json_decode($data_temp1);
       //byfsl l microtime b l " " w by7otha f usec  w sec
       list($usec, $sec) = explode(" ", microtime()); 
       $time  = substr($sec, -5,-1);
       $time_start = ((float)$usec + (float)$time);


       $unique_value = $user_id.'_'.$time_start;
       $data_temp2->$unique_value = [$user_id, $message];

       $saved_data = json_encode($data_temp2);
       Storage::put("$ids.json",$saved_data);
       app('App\Http\Controllers\chatController')->setChatStatus();
       return $message;
  }

    public function getUserMsgs($user_id, $friend_id){
      if(Storage::exists("$user_id".'-'."$friend_id".".json")){
      $ids = "$user_id".'-'."$friend_id";
    }
      else{
        $ids = "$friend_id-$user_id";
      }
      $data_temp1 = Storage::get($ids.".json");
       
      $data_temp2 = json_decode($data_temp1);
      //Session::put('chat_id', $ids);
        //echo Session::get('chat_id', $ids);
      /* list($usec, $sec) = explode(" ", microtime()); 
       $time_start = ((float)$usec + (float)$sec);
       echo $time_start;*/
       return $data_temp2;
    }

   

  /*
    when new msg come

  */
    public function setChatStatus(){
      $friend_id = Session::get("friend_id");
      $data_temp1 = Storage::get("usersData/$friend_id.json");
      $data_temp2 = json_decode($data_temp1);

      $data_temp2->chat_status = 1; // Here i need to change old value to '1' to knowing the friend for new message
      $saved_data = json_encode($data_temp2);
     // echo $data_temp2;
      Storage::put("usersData/$friend_id.json",$saved_data);
    }


    public function postStatus(){
      $user_id = Session::get("user_id");
      $data_temp1 = Storage::get("usersData/$user_id.json");
      $data_temp2 = json_decode($data_temp1);
     // echo $data_temp2;
      return $data_temp2->chat_status;
    }


    public function postGetLastMessage(){
      $user_id = Session::get('user_id');
      $friend_id = Session::get('friend_id');

      if(Storage::exists("$user_id".'-'."$friend_id".".json")){
        $ids = "$user_id".'-'."$friend_id";
        $data_temp1 = Storage::get($ids.".json");
      } else {
        $ids = "$friend_id".'-'."$user_id";
        $data_temp1 = Storage::get($ids.".json");
      }

      $data_temp2 = json_decode($data_temp1);
     //   loop 3la l json w bygeb a5er value(array) key is timestap , value ly hya array 
      foreach ($data_temp2 as $key => $value) {
          $last_record = $value;
      }


      $data_temp1 = Storage::get("usersData/$user_id.json");
      $data_temp2 = json_decode($data_temp1);
      $data_temp2->chat_status = 0;
      $saved_data = json_encode($data_temp2);
      Storage::put("usersData/$user_id.json",$saved_data);
     // 1 is the msg itself 
      return $last_record[1];

    }
}
