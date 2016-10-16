<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model
{
    /**
     * @param $query
     * @param bool $active
     * @return mixed
     */
    public function scopeActive($query, $active = true)
    {
        return $query->where('is_active', $active);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
