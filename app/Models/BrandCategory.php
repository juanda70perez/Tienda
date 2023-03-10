<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BrandCategory
 *
 * @property $id
 * @property $brand_id
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Brand $brand
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BrandCategory extends Model
{
    
    static $rules = [
		'brand_id' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['brand_id','category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    

}
