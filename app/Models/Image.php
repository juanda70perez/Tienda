<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url','imageablew_id','imageable_type'];

    public function Imageable(){
        return $this->morphTo();
    }
}
