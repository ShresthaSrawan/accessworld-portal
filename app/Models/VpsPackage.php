<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsPackage extends Model
{
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
}
