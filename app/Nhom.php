<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model {

    protected $table ='nhoms';

    protected $fillable = ['tennhom','id_user','id_dotthuctap','id_khoa','trangthai'];

    public $timestamps = false;



    public function chitietnhom(){
        return $this->hasMany('App\ChiTietNhom','id_nhom');
    }
    public function dotthuctap()
    {
        return $this->belongsTo('App\DotThucTap');
    }
    public function taikhoan()
    {
        return $this->belongsTo('App\TaiKhoan');
    }
    public function sukien(){
        return $this->hasMany('App\SuKien','id_nhom');
    }

}
