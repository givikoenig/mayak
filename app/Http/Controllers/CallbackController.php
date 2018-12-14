<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Notifications\CallbackOrder;
use App\User;

class CallbackController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('_token');

        $rules = [
            'name_callback' => 'required|max:100',
            'phone_callback' => 'required',

        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return \Response::json(array(
                'success' => false,
                'errors' =>  $validator->getMessageBag()->toArray()  //  $validator->errors()->first()

            ), 400); // 400 being the HTTP code for an invalid request.
        } else {

            $result = [];
            $result['name'] = $input['name_callback'];
            $result['phone'] = $input['phone_callback'];

            $dima = User::find(1);
            Notification::send($dima, new CallbackOrder($result));

            return \Response::json(['success' => TRUE, 200]);


        }

    }

}
