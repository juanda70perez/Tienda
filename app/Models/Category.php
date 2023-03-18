<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $image
 * @property $icon
 * @property $created_at
 * @property $updated_at
 * @property BrandCategory[] $brandCategories
 * @property Subcategory[] $subcategories
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    use HasFactory;

    public static $rules = [
        'name' => 'required',
        'slug' => 'required',
        'image' => 'required',
        'icon' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'image', 'icon'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brandCategories()
    {
        return $this->hasMany('App\Models\BrandCategory', 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    //url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
