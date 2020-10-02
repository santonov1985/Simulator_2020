<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestApi extends Model
{
    public const STATUS_DOUBLE = "DOUBLE";
    public const STATUS_ACCEPT = "ACCEPT";
    public const STATUS_ERROR  = "ERROR";
}
