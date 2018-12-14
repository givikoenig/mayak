<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    //
    public function execute () {

    	if (view()->exists('gallery.index')) {

    		$galleries = Gallery::where('active', 1)->first();

    		$slides_str = $this->getSlidesString($galleries->id);

			return view('gallery.index', [

				'galleries_str' => $slides_str,

			]);
		}
    	
    }


    protected function getSlidesString($gallery_id) {

        // $slides = Gallery::where('active', 1)->get();
        $gallery = Gallery::find($gallery_id);

         $slides_str = "<script>\n";
            $slides_str .= "jQuery(function($){\n";
            $slides_str .= "$.supersized({\n";
            $slides_str .= "slideshow : 1,\n";
            $slides_str .= "autoplay : 1,\n";
            $slides_str .= "slide_interval : 3000,\n";
            $slides_str .= "transition : 3,\n";
            $slides_str .= "transition_speed : 700,\n";
            $slides_str .= "slides : [\n";

           	foreach ($gallery->images as $image) {
           		$slides_str .= "{image : 'assets/images/" . $image . "', title : ' <h4>" . $gallery->title . "</h4> <span> " . $gallery->desc . " </span>'},\n";
           	}
                
            $slides_str .= "]\n";
            $slides_str .= "});\n";
            $slides_str .= "});\n";
            $slides_str .= "</script>\n";

            return $slides_str;

    }


}
