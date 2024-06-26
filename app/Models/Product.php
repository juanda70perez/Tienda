<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $description
 * @property $price
 * @property $quantity
 * @property $subcategory_id
 * @property $brand_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Brand $brand
 * @property ColorProduct[] $colorProducts
 * @property Subcategory $subcategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    static $rules = [
		'name' => 'required',
		'slug' => 'required',
		'description' => 'required',
		'price' => 'required',
		'quantity' => 'required',
		'subcategory_id' => 'required',
		'brand_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','description','price','quantity','subcategory_id','brand_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colorProducts()
    {
        return $this->hasMany('App\Models\ColorProduct', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subcategory()
    {
        return $this->hasOne('App\Models\Subcategory', 'id', 'subcategory_id');
    }
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    //relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }

}
