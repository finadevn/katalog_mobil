<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'Brand';
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name'];

    public function type()
    {
        return $this->hasMany('App\Type', 'type_brand_id', 'brand_id');
    }

}
