<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\EmailPackage;
use App\Models\Event;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\VpsPackage;
use App\Models\WebPackage;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::published()->orderBy('order', 'asc')->get();

        $testimonials = Testimonial::published()->get();

        $clients = Client::published()->get();

        $services = Service::published()->get();

        $certificates = Certificate::published()->get();

        $events = Event::published()->where('to_date', '>=', date('Y-m-d'))->get();

        $vpsPackages = VpsPackage::published()->featured()->get();

        $webPackages = WebPackage::published()->featured()->get();

        $emailPackages = EmailPackage::published()->featured()->get();

        if(empty($vpsPackages) && empty($webPackages) && empty($emailPackages)){
            $featuredPackages =[];
        } else {
            $featuredPackages = ['vps_package' => $vpsPackages, 'web_package' => $webPackages, 'email_package' => $emailPackages];
        }

        $tldLogos = [
            [ 'slug' => 'com', 'tld' => '.ngo', 'price' => 11 ],
            [ 'slug' => 'org', 'tld' => '.org', 'price' => 12.5 ],
            [ 'slug' => 'net', 'tld' => '.net', 'price' => 12.5 ],
            [ 'slug' => 'online', 'tld' => '.online', 'price' => 5 ],
            [ 'slug' => 'ngo', 'tld' => '.ngo', 'price' => 40 ]
        ];

        return view('index', compact('sliders', 'homePage', 'testimonials', 'clients', 'services', 'certificates', 'featuredPackages', 'events', 'tldLogos'));
    }
}
