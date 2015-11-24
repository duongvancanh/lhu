<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model {

    protected $table ='binh_luans';
    public  function baiviet()
    {
        return $this->belongsTo('App\BaiViet');
    }
    public  function taikhoan()
    {
        return $this->belongsTo('App\TaiKhoan');
    }
}
