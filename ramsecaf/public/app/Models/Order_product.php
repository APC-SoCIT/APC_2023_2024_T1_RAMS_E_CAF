<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order_product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'order_product';

    protected $guarded = [

    ];

}
