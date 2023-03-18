<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Size
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property ColorSize[] $colorSizes
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Size extends Model
{
    public static $rules = [
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
    public function colorSizes()
    {
        return $this->hasMany('App\Models\ColorSize', 'size_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
