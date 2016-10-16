<?php

namespace App\Models;

use App\Interfaces\Package;
use Illuminate\Database\Eloquent\Model;

class VpsPackage extends Model implements Package
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
            'cpu'     => $this->cpu . ' GB',
            'ram'     => $this->ram . ' GB',
            'disk'    => $this->disk . ' GB',
            'traffic' => $this->traffic . ' GB'
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
