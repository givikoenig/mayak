<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Slide;
use App\About;
use App\AboutServices;
use App\Tariff;
use App\Room;
use App\Testimonial;

class IndexController extends Controller
{       
    //
    public function execute (Request $request) {

    	if (view()->exists('site.index')) {

            $slides_str = $this->getSlidesString();
            // dd($slides_str);
            $about = About::where('active', 1)->first();
            $about_services = AboutServices::orderBy('created_at', 'desc')->get();
            $tariffs = Tariff::where('active', 1)->get();
            $rooms = Room::where('active', 1)->get();
            $services = $this->getServicesIcons();
            $testimonials = Testimonial::where('active', 1)->orderBy('created_at','desc')->get();

            return view('site.index', [
                'about' => $about,
                'about_services' => $about_services,
                'slides_str' => $slides_str,
                'tariffs' => $tariffs,
                'rooms' => $rooms,
                'services' => $services,
                'testimonials' => $testimonials,
            ]);
        }
    }

    protected function getServicesIcons() {
        $services = [
            'occupancy' => 'Количество спальных мест - 8',
            'lcd' => 'Жидкокристалльный телевизор',
            'wifi' => 'WiFi доступ к Интернету',
            'pet' => 'Разрешено проживание с домашними животными',
            'air-warm' => 'Воздушный кондиционер (обогрев)',
            'air-cold' => 'Воздушный кондиционер (охлаждение)',
        ];
        return $services;
    }

    protected function getSlidesString() {

        $slides = Slide::where('active', 1)->orderBy('created_at','desc')->get();


         $slides_str = "<script>\n";
            $slides_str .= "jQuery(function($){\n";
            $slides_str .= "$.supersized({\n";
            $slides_str .= "slideshow : 1,\n";
            $slides_str .= "autoplay : 1,\n";
            $slides_str .= "slide_interval : 3000,\n";
            $slides_str .= "transition : 1,\n";
            $slides_str .= "transition_speed : 700,\n";
            $slides_str .= "slides : [\n";

            foreach ($slides as $key => $slide) {
                $slides_str .= "{image : 'assets/images/" . $slide->img . "'},\n";
            }
            $slides_str .= "]\n";
            $slides_str .= "})\n";
            $slides_str .= "})\n";
            $slides_str .= "</script>\n";

            return $slides_str;
    }

	

}
