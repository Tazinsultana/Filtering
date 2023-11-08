<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'is_active'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
