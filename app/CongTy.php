<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CongTy extends Model {

    protected $table ='cong_ties';

    protected $fillalbe = ['ten','diachi','email','sdt','loai'];

    public $timestamps = false;


    public function taikhoan(){
        return $this->hasMany('App\TaiKhoan','id_congty');
    }
}
