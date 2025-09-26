<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['image', 'name', 'price', 'stock'];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         if ($model->quantity > 20) {
    //             throw new \Exception('Jumlah produk tidak boleh melebihi 20');
    //         }
    //     });
    // }
}
