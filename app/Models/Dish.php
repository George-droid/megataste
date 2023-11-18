<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'menus_id',
        'name',
        'description',
        'price',
        'image',
        // Add other fillable attributes as needed
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
