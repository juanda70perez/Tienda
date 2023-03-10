<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Color
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @property ColorProduct[] $colorProducts
 * @property ColorSize[] $colorSizes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Color extends Model
{

    use HasFactory;

    protected $fillable = ['name'];


    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function sizes(){
        return $this->belongsToMany(size::class);
    }
}
