<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable=[
        'item_name',
        'description',
        'quantity',
        'price',
        'local',
        'status',
        'date',
        'category_id',
        'stock',
        'image'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
