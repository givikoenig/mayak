<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Notifications\TestimonialAdded;
use App\Testimonial;
use App\User;

class OtzyvController extends Controller
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

        $rules = array (
            'name_contact' => 'required|max:100',
            'email_contact' => 'required|email',
            'message_contact' => 'required',
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

        $result = [];
        $result['text'] = $input['message_contact'];
        $result['sig'] = $input['name_contact'];
        $result['email'] = $input['email_contact'];
        $result['site'] = $input['site_contact'];

        $otzyv = new Testimonial();
        $otzyv->fill($result);

        $otzyv->save();

        $dima = User::find(1);
        Notification::send($dima, new TestimonialAdded($otzyv, $result));

        return \Response::json(['success' => TRUE, 200]);

        }

    }

}
