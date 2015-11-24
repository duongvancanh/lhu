<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table ='tags';

    public function taikhoan(){
        return $this->belongsTo('App\TaiKhoan');
    }
    public function baiviet(){
        return $this->belongsTo('App\BaiViet');
    }
}
