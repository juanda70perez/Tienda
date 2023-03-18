<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property Color $color
 * @property Product $product
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ColorProduct extends Model
{
    use HasFactory;

    protected $table = 'color_product';

    //Relacion uno a mucos inversa

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
