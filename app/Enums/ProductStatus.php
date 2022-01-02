<?php

namespace App\Enums;

enum ProductStatus: string
{
    case IN_STOCK = "in stock";
    case OUT_OF_STOCK = "out of stock";
    case BACK_ORDER = "back order";
    case DISCONTINUED = "discontinued";
}
