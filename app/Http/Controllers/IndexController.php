<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Mapper;
use DarkSkyApi;
use Jenssegers\Date\Date;

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

            Mapper::map(54.95965, 20.2686488, ['zoom' => 15.0, 'markers' => ['title' => 'Дом на море "У маяка"', 'animation' => 'BOUNCE', 'icon' => asset('assets') . '/images/icons/map-marker1.png'], 'type' => 'HYBRID', 'scrollWheelZoom' => true]);

            $slides_str = $this->getSlidesString();
            $about = About::where('active', 1)->first();
            $about_services = AboutServices::where('active', 1)->orderBy('created_at', 'desc')->get();
            $tariffs = Tariff::where('active', 1)->get();
            $rooms = Room::where('active', 1)->get();
            $services = $this->getServicesIcons();
            $testimonials = Testimonial::where('active', 1)->orderBy('created_at','desc')->get();
            $weather = $this->getWeather();
            $this->meta_desc = $about->meta_desc;
            $this->keywords = $about->keywords;
            $this->description = $about->desc;


            $fweather = DarkSkyApi::location(54.960, 20.269)
                ->units('si')
                ->language('ru')
                ->forecast()->daily();

//            dd($fweather );

            return view('site.index', [
                'about' => $about,
                'about_services' => $about_services,
                'slides_str' => $slides_str,
                'tariffs' => $tariffs,
                'rooms' => $rooms,
                'forecast' => $weather['forecast'],
                'currently_weather_icon' => $weather['icon'],
                'services' => $services,
                'testimonials' => $testimonials,
                'title' => $this->title,
                'keywords' => $this->keywords,
                'meta_desc' => $this->meta_desc
            ]);
        }
    }

    protected function getWeather() {

        $weather = [];

        $weather['forecast'] = DarkSkyApi::location(54.960, 20.269)
            ->units('si')
            ->language('ru')
            ->forecast();

        $current_weather_icon = $weather['forecast']->currently()->icon();

        $is_daylight = in_array( Date::parse($weather['forecast']
            ->currently()->time())->format('B'),
            range(250,750));

        $is_cloudy = ( $weather['forecast']->currently()->cloudCover() > 0.2);

        $weather['icon'] = '';
        switch ($current_weather_icon) {
            case 'clear-day':
                $weather['icon'] = 'wi-forecast-io-clear-day';
                break;
            case 'clear-night':
                $weather['icon'] = 'wi-forecast-io-clear-night';
                break;
            case 'rain':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-rain';
                } else {
                    $weather['icon'] = 'wi-night-rain';
                }
                break;
            case 'snow':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-snow';
                } else {
                    $weather['icon'] = 'wi-night-snow';
                }
                break;
            case 'sleet':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-sleet';
                } else {
                    $weather['icon'] = 'wi-night-sleet';
                }
                break;
            case 'fog':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-fog';
                } else {
                    $weather['icon'] = 'wi-night-fog';
                }
                break;
            case 'cloudy':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-cloudy';
                } else {
                    $weather['icon'] = 'wi-night-cloudy';
                }
                break;
            case 'hail':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-hail';
                } else {
                    $weather['icon'] = 'wi-night-hail';
                }
                break;
            case 'thunderstorm':
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-day-thunderstorm';
                } else {
                    $weather['icon'] = 'wi-night-thunderstorm';
                }
                break;
            case 'wind':
                if ( $is_daylight && !$is_cloudy) {
                    $weather['icon'] = 'wi-day-windy';
                } elseif ($is_daylight && $is_cloudy) {
                    $weather['icon'] = 'wi-day-cloudy-windy';
                } elseif (!$is_daylight && !$is_cloudy) {
                    $weather['icon'] = 'wi-night-windy';
                } elseif(!$is_daylight && $is_cloudy) {
                    $weather['icon'] = 'wi-night-cloudy-windy';
                }
                break;
            case 'partly-cloudy-day':
                $weather['icon'] = 'wi-forecast-io-partly-cloudy-day';
                break;
            case 'partly-cloudy-night':
                $weather['icon'] = 'wi-forecast-io-partly-cloudy-night';
                break;
            case 'tornado':
                $weather['icon'] = 'wi-tornado';
                break;
            default:
                if ( $is_daylight ){
                    $weather['icon'] = 'wi-wu-partlycloudy';
                } else {
                    $weather['icon'] = 'wi-forecast-io-partly-cloudy-night';
                }
        };

        return $weather;

    }

    protected function getServicesIcons() {
        $services = [
            'occupancy' => 'Количество спальных мест - 8',
            'lcd' => 'Спутниковое телевидение',
            'wifi' => 'WiFi доступ к Интернету',
            'pet' => 'Разрешено проживание с домашними животными',
            'air-warm' => 'Круглогодичное отопление',
            'air-cold' => 'Воздушный кондиционер (охлаждение)',
            'safe' => 'Сейф',
            'bath' => 'Ванная',
            'loundry' => 'Прачечная',
            'parking' => 'Парковка',
            'swimming' => 'Пляж в 150 метрах'
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
        $slides_str .= "slide_interval : 5000,\n";
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
