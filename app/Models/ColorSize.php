<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ColorSize
 *
 * @property $id
 * @property $color_id
 * @property $size_id
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @property Color $color
 * @property Size $size
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ColorSize extends Model
{
    
    static $rules = [
		'color_id' => 'required',
		'size_id' => 'required',
		'quantity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color_id','size_id','quantity'];


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
    public function size()
    {
        return $this->hasOne('App\Models\Size', 'id', 'size_id');
    }
    

}
