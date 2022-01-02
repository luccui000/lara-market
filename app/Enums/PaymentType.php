<?php
namespace App\Enums;

enum PaymentType : string
{
    case DELIVERY = "delivery";
    case ONLINE = "online";
}
