<?php

namespace App\Enums;

enum TransactionStatusCodeEnum: int
{
    case Authorized = 1;
    case Declined = 2;
    case Refunded = 3;
}
