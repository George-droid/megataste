<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'user_id',
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
