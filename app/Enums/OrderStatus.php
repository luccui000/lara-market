<?php

namespace App\Enums;

enum OrderStatus: string
{
    case WAIT_FOR_CONFIRMATION = "wait for confirmation";
    case CONFIRMED = "confirmed";
    case SHIPPING = "shipping";
    case FINISHED = "finished";
}
