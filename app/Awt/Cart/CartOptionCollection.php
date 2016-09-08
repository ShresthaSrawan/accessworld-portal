<?php

    namespace App\Awt\Cart;

    use Illuminate\Support\Collection;

    class CartOptionCollection extends Collection {

        public function __get($arg)
        {
            if($this->has($arg))
            {
                return $this->get($arg);
            }

            return null;
        }
    }