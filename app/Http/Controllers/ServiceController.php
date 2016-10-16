<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Interfaces\Package;
use App\Models\DataCenter;
use App\Models\OperatingSystem;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function custom(Service $service)
    {
        return view('service.' . $service->slug . '.custom', compact('service'));
    }

    public function orderPackage(Service $service, Package $package)
    {
        return view('service.order', compact('service', 'package'));
    }

    public function packagePrice(Service $service, Package $package, Request $request)
    {
        try
        {
            $price = $package->discounted_price;
            $term  = $request->get('term');
            if ($operatingSystem = $request->get('operating_system', false)) $price += OperatingSystem::active()->findOrFail($operatingSystem)->price;

            if ($dataCenter = $request->get('data_center', false)) $price += DataCenter::active()->findOrFail($dataCenter)->price;

            $price = $price * $term;
        } catch (Exception $e)
        {
            return 'N/A';
        }

        return $price;
    }
}
