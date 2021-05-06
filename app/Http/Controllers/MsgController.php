<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Notifications\MessageAdded;
use App\Message;
use App\User;

class MsgController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $input = $request->except('_token');
          $rules = array (
            'name_cont' => 'required|max:100',
            'email_cont' => 'required|email',
            'message_cont' => 'required',
            'website' => 'max:0',
            );      

         $validator = Validator::make(Input::all(), $rules);

         // Validate the input and return correct response
        if ($validator->fails())
        {
            return \Response::json(array(
                'success' => false,
                'errors' =>  $validator->getMessageBag()->toArray()  //  $validator->errors()->first()

            ), 400); // 400 being the HTTP code for an invalid request.
        } else {

        $input = $request->except('_token');
        

        $result = [];
        $result['text'] = $input['message_cont'];
        $result['sig'] = $input['name_cont'];
        $result['email'] = $input['email_cont'];
        $result['site'] = $input['site_cont'];


        $message = new Message();
        $message->fill($result);

        $message->save();

        $dima = User::find(1);
        Notification::send($dima, new MessageAdded($message, $result));

        return \Response::json(['success' => TRUE, 200]);


        }

    }

    
}
