<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('site.slides');

        $slides = Slide::all();
        $data = [];
        foreach ($slides as $slide) {
            // $data[] = array('id' => $slide->id, 'img' => $slide->img);
            $data[] = $slide->img;
        }

        // dd($data);
        return \Response::json(['data' => $data]);       
        
        exit();

    }

    
}
