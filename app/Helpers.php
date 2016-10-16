<?php
use App\Models\DataCenter;
use App\Models\Feature;
use App\Models\Menu;
use App\Models\OperatingSystem;
use App\Models\Service;
use App\Models\VpsPackage;
use App\Models\WebPackage;

/**
 * @param $p
 * @param bool $local
 * @return mixed
 */
function get_opensrs_price($p, $local = false)
{
    $price = $p + $p * config('awt.service_charge.opensrs_charge');

    if ($local)
        return $price;

    return $price;
}

/**
 * @param $query
 * @return string
 */
function site_info($query)
{
    return config('awt.site.' . $query, 'N/A');
}

/**
 * @return \Illuminate\Database\Eloquent\Collection|static[]
 */
function menus()
{
    return Menu::all();
}

/**
 * @return mixed
 */
function services()
{
    return Service::published()->get();
}

/**
 * @return mixed
 */
function features()
{
    return Feature::published()->get();
}

/**
 * Return page name of sub page
 *
 * @param string $field
 *
 * @return array
 */
function display_contact ( $field )
{
    if ( empty(config('awt.site.'.$field)) )
        return 'NA';
    return config('awt.site.'.$field);
}

/**
 * @param Service $service
 * @return bool
 */
function has_offer(Service $service)
{
    return false;
}

/**
 * @return mixed
 */
function vpsPackages()
{
    return VpsPackage::published()->get();
}

/**
 * @return mixed
 */
function webPackages()
{
    return WebPackage::published()->get();
}

/**
 * @param $key
 * @return mixed
 */
function site($key)
{
    return config('awt.'.$key, null);
}

/**
 * @return mixed
 */
function dataCenters()
{
    return DataCenter::active()->get();
}

/**
 * @return mixed
 */
function operatingSystems()
{
    return OperatingSystem::active()->get();
}

/**
 * @param $query
 * @param array $options
 * @return string
 */
function help_text ($query, $options = [] )
{
    if ( $query == 'order_term' ) {
        return "*Pay for a year and get two months free service. <br> *Exclusive of VAT.";
    }
}

/**
 * @param $amount
 * @return string
 */
function currency($amount)
{
    return site('currency').' '.$amount;
}

/**
 * @param $width
 * @param null $entity
 * @return mixed
 */
function thumbnail($width, $entity = null)
{
    if ( ! is_null($entity))
        if ($image = $entity->image)
            return asset($image->thumbnail($width, $width));
    return asset(config('paths.placeholder.'.snake_case(class_basename($entity))));
}