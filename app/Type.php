<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Type';
    protected $primaryKey = 'type_id';
    protected $fillable = ['type_name'];

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'type_brand_id', 'brand_id');
    }
}
