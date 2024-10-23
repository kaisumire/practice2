<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // データベースのテーブル名（省略可能）
    protected $table = 'products';

    // マスアサインメント可能な属性
    protected $fillable = [
        'name',
        'manufacturer_name',
        'price',
        'stock_quantity',
        'detail_display',
        'image_path',
    ];

}
