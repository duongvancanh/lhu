<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model {

    protected $table ='bai_viets';

    public  function taikhoan()
    {
        return $this->belongsTo('App\TaiKhoan');
    }
    public  function binhluan()
    {
        return $this->hasMany('App\BinhLuan','id_baiviet');
    }
    public  function dinhkem()
    {
        return $this->hasMany('App\DinhKem','id_baiviet');
    }
    public  function tag()
    {
        return $this->hasMany('App\Tag','id_baiviet');
    }
}
