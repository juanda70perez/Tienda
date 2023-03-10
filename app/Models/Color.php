<?php

namespace App\Models;

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

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colorProducts()
    {
        return $this->hasMany('App\Models\ColorProduct', 'color_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colorSizes()
    {
        return $this->hasMany('App\Models\ColorSize', 'color_id', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function sizes(){
        return $this->belongsToMany(size::class);
    }
}
