<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuyTacGiaoVien extends Model {

    protected $table ='quy_tac_giao_viens';
    public function taikhoan()
    {
        return $this->belongsTo('App\TaiKhoan');
    }
}
