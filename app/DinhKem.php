<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DinhKem extends Model {

    protected $table ='dinh_kems';
    public function baiviet(){
        return $this->belongsTo('App\BaiViet');
    }
}
