<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'Mobil';
    protected $primaryKey = 'mobil_id';
    protected $fillable = ['mobil_no_kerangka','mobil_no_polisi','mobil_tahun'];

    //Rule validator model 'Mobil'
    public $rules = [
        'mobil_no_kerangka' => 'required',
        'mobil_no_polisi' => 'required',
//        'mobil_brand_id' => 'required',
//        'mobil_type_id' => 'required',
        'mobil_tahun' => 'required',
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'mobil_brand_id', 'brand_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'mobil_type_id', 'type_id');
    }
}
