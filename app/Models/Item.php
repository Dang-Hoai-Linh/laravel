<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'url',
        'active',
        'passive',
        'price',
        'price_enhance',
    ];
}
