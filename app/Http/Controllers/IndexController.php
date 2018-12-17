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
    
    protected $keywords;
    protected $meta_desc;
    protected $title;
    protected $image;
    
    public function __construct() {
        $this->title = config('app.name');
        $this->meta_desc = "Гостевой дом на Балтийском побережье 'У маяка': аренда, 7000 руб/сутки на 8 человек. Сосны, море, тишина";
        $this->keywords = "Дом у моря, гостевой дом на побережье, аренда дома у моря, отдых на балтийском побережье";
        $this->image = asset('assets').'/images/images/111572633.jpg';
    }
    
    public function execute (Request $request) {

    	if (view()->exists('site.index')) {

            $slides_str = $this->getSlidesString();
            // dd($slides_str);
            $about = About::where('active', 1)->first();
            $about_services = AboutServices::where('active', 1)->orderBy('created_at', 'desc')->get();
            $tariffs = Tariff::where('active', 1)->get();
            $rooms = Room::where('active', 1)->get();
            $services = $this->getServicesIcons();
            $testimonials = Testimonial::where('active', 1)->orderBy('created_at','desc')->get();
//            dd($about->keywords);
            $this->meta_desc = $about->meta_desc;
            $this->keywords = $about->keywords;
            $this->description = $about->desc;
//            dd(App::enviroment());
            return view('site.index', [
                'about' => $about,
                'about_services' => $about_services,
                'slides_str' => $slides_str,
                'tariffs' => $tariffs,
                'rooms' => $rooms,
                'services' => $services,
                'testimonials' => $testimonials,
                'title' => $this->title,
                'keywords' => $this->keywords,
                'meta_desc' => $this->meta_desc
            ]);
        }
    }

    protected function getServicesIcons() {
        $services = [
            'occupancy' => 'Количество спальных мест - 8',
            'lcd' => 'Спутниковое телевидение',
            'wifi' => 'WiFi доступ к Интернету',
            'pet' => 'Разрешено проживание с домашними животными',
            'air-warm' => 'Круглогодичное отопление',
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
