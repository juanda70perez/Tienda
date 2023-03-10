<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ColorProduct
 *
 * @property $id
 * @property $color_id
 * @property $product_id
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ColorProduct extends Model
{
    
    static $rules = [
		'color_id' => 'required',
		'product_id' => 'required',
		'quantity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color_id','product_id','quantity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    

}
