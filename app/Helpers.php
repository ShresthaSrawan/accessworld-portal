<?php
use App\Models\Service;

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