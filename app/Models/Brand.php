<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property BrandCategory[] $brandCategories
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Brand extends Model
{
    use HasFactory;
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brandCategories()
    {
        return $this->hasMany('App\Models\BrandCategory', 'brand_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'brand_id', 'id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
