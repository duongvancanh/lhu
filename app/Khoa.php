<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model {

    protected $table ='khoas';
    //
    public function taikhoan(){
        return $this->hasMany('App\TaiKhoan','id_khoa');
    }

}
