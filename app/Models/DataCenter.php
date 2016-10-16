<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCenter extends Model
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
}
