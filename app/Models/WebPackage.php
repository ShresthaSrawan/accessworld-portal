<?php

namespace App\Models;

use App\Interfaces\Package;
use Illuminate\Database\Eloquent\Model;

class WebPackage extends Model implements Package
{
    protected $appends = [ 'discounted_price' ];

    /**
     * @param $query
     * @param bool $published
     * @return mixed
     */
    public function scopePublished($query, $published = true)
    {
        return $query->where('is_published', $published);
    }

    /**
     * @param $query
     * @param bool $featured
     * @return mixed
     */
    public function scopeFeatured($query, $featured = true)
    {
        return $query->where('is_featured', $featured);
    }

    /**
     * @return array
     */
    public function getComponents()
    {
        return [
            'disk'    => $this->disk . ' GB',
            'traffic' => $this->traffic . ' GB',
            'domain'  => $this->domain
        ];
    }

    /**
     * @return mixed
     */
    public function getDiscountedPriceAttribute()
    {
        return $this->price * ( ( 100 - $this->discount_percent ) / 100 );
    }
}
