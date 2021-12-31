<?php

namespace App\Actions\Products;

interface ValueObjectContract
{
    /**
     * @return array
     */
    public function toArray(): array;
}
