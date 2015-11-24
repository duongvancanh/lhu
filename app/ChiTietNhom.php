<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhom extends Model {

    protected $table ='chi_tiet_nhoms';

    public function nhom()
    {
        return $this->belongsTo('App\Nhom');
    }

}
