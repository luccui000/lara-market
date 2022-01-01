<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PREORDER = 1;
    case CONFIRM = 2;
    case SHIPPING = 3;
    case FINISHED = 4;
}
