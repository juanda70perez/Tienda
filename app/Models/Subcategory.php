<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subcategory
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $image
 * @property $color
 * @property $size
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Subcategory extends Model
{
    use HasFactory;
    static $rules = [
		'name' => 'required',
		'slug' => 'required',
		'image' => 'required',
		'color' => 'required',
		'size' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','image','color','size','category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * relacion uno a muchos inversa
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'subcategory_id', 'id');
    }
    //Relacion muchos a muchos
    public function colors(){
        return $this->hasMany(Color::class);
    }
    public function sizes(){
        return $this->hasMany(Size::class);
    }
}
