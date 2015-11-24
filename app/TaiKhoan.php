<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model {

    protected $table ='tai_khoans';


    public  function baiviet()
    {
        return $this->hasMany('App\BaiViet','id_user');
    }

    public function nhom(){
        return $this->hasMany('App\Nhom','id_user');
    }
    public function quytacgv(){
        return $this->hasMany('App\QuyTacGiaoVien','id_user');
    }
    public function sukien(){
        return $this->hasMany('App\SuKien','id_user');
    }
    public function tag(){
        return $this->hasMany('App\Tag','id_user');
    }

    public function khoa()
    {
        return $this->belongsTo('App\Khoa');
    }

    public function congty()
    {
        return $this->belongsTo('App\CongTy');
    }
}
