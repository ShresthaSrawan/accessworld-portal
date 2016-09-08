<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
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
}
