<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialsController extends Controller
{
    //

	public function execute () {

		if (view()->exists('testimonials.index')) {

			$testimonials = Testimonial::where('active', 1)->orderBy('created_at', 'desc')->paginate(5);

			return view('testimonials.index', [

				'testimonials' =>$testimonials,

			]);

		}
	}

}
