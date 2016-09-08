<?php

namespace App\Awt\Transformers;

class CountryTransformer extends Transformer {
    /**
     * Transform a collection of items
     *
     * @param $country
     * @return array
     * @internal param $item
     */
    public function transform($country)
    {
        return [
            'id'   => $country['id'],
            'name' => $country['name']
        ];
    }
}