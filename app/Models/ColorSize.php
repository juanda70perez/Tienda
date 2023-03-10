<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    use HasFactory;

    protected $table = "color_size";

    //Relacion uno a mucos inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }

}
