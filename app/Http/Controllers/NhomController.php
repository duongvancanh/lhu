<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Khoa;
use App\Nhom;
use App\TaiKhoan;
use App\ChiTietNhom;
use App\DotThucTap;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\NhomRequerts;

class NhomController extends Controller {


    public function listnhom()
    {
        $id = Session::get('id');
        $leveldangnhap = Session::get('level');
        $nhomarr = array();
        if ($leveldangnhap == 4) {
            $nhoms = ChiTietNhom::where('id_user', $id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id_nhom;
                $obj->tennhom = Nhom::find($nhom->id_nhom)->tennhom;
                $obj->id_user = Nhom::find($nhom->id_nhom)->id_user;
                $nhomarr[] = $obj;
            }
        }else if ($leveldangnhap == 3){
            $nhoms = Nhom::where('id_user',$id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $nhomarr[] = $obj;
            }
        }
        else if($leveldangnhap == 2)
        {
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            $nhoms = Nhom::where('id_khoa',$idkhoa)->get();
            foreach ($nhoms as $nhom)
            {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $obj->dotthuctap = $nhom->id_dotthuctap;
                $nhomarr[] = $obj;
            }

        }
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $tenkhoa = Khoa::find($idkhoa)->tenkhoa;

        Session::put('nhoms',$nhomarr);

        $ten = Session::get('ten');

        $nhom = Nhom::where('id_khoa',$idkhoa)->get();
        $usernhom = ChiTietNhom::all();
        $arr = array();
        foreach ($usernhom as $u){
            $arr[] = $u->id_user;
        }
        $sinhvien = TaiKhoan::select('*')->whereNotIn('id',$arr)->where('kieu',4)->get();



        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            case 2:  return view('pages.Khoa.nhom_list',compact('nhomarr','id','ten','nhom','sinhvien')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }
    public function nhomphutrach($idnhom)
    {
        $id = Session::get('id');
        $leveldangnhap = Session::get('level');
        $nhomarr = array();
        if ($leveldangnhap == 4) {
            $nhoms = ChiTietNhom::where('id_user', $id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id_nhom;
                $obj->tennhom = Nhom::find($nhom->id_nhom)->tennhom;
                $obj->id_user = Nhom::find($nhom->id_nhom)->id_user;
                $nhomarr[] = $obj;
            }
        }else if ($leveldangnhap == 3){
            $nhoms = Nhom::where('id_user',$id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $nhomarr[] = $obj;
            }
        }
        else if($leveldangnhap == 2)
        {
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            $nhoms = Nhom::where('id_khoa',$idkhoa)->get();
            foreach ($nhoms as $nhom)
            {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $obj->dotthuctap = $nhom->id_dotthuctap;
                $nhomarr[] = $obj;
            }

        }
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $tenkhoa = Khoa::find($idkhoa)->tenkhoa;

        Session::put('nhoms',$nhomarr);

        $ten = Session::get('ten');

        $nhom = Nhom::where('id_khoa',$idkhoa)->get();
        $usernhom = ChiTietNhom::all();
        $arr = array();
        foreach ($usernhom as $u){
            $arr[] = $u->id_user;
        }
        $sinhvien = TaiKhoan::select('*')->whereNotIn('id',$arr)->where('kieu',4)->get();

        $phutrach = Nhom::where('id',$idnhom)->get();

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
           // case 2:  return view('pages.Khoa.nhom_inf',compact('nhomarr','id','ten','nhom','sinhvien','phutrach')); break;
            case 3:  return view('pages.GiaoVien.nhom_inf',compact('nhomarr','tenkhoa','id','ten','phutrach')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function thongtinsv($idsv)
    {
        $id = Session::get('id');
        $leveldangnhap = Session::get('level');
        $nhomarr = array();
        if ($leveldangnhap == 4) {
            $nhoms = ChiTietNhom::where('id_user', $id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id_nhom;
                $obj->tennhom = Nhom::find($nhom->id_nhom)->tennhom;
                $obj->id_user = Nhom::find($nhom->id_nhom)->id_user;
                $nhomarr[] = $obj;
            }
        }else if ($leveldangnhap == 3){
            $nhoms = Nhom::where('id_user',$id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $nhomarr[] = $obj;
            }
        }
        else if($leveldangnhap == 2)
        {
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            $nhoms = Nhom::where('id_khoa',$idkhoa)->get();
            foreach ($nhoms as $nhom)
            {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $obj->dotthuctap = $nhom->id_dotthuctap;
                $nhomarr[] = $obj;
            }

        }
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $tenkhoa = Khoa::find($idkhoa)->tenkhoa;

        Session::put('nhoms',$nhomarr);

        $ten = Session::get('ten');

        $nhom = Nhom::where('id_khoa',$idkhoa)->get();
        $usernhom = ChiTietNhom::all();
        $arr = array();
        foreach ($usernhom as $u){
            $arr[] = $u->id_user;
        }
        $sinhvien = TaiKhoan::select('*')->whereNotIn('id',$arr)->where('kieu',4)->get();

        $data = TaiKhoan::where('id',$idsv)->get();

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.nhom_inf',compact('nhomarr','id','ten','nhom','sinhvien','phutrach')); break;
            case 3:  return view('pages.GiaoVien.sinhvien_inf',compact('nhomarr','tenkhoa','id','ten','data')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function getnhom(){
        $id = Session::get('id');
        $leveldangnhap = Session::get('level');
        $nhomarr = array();
        if ($leveldangnhap == 4) {
            $nhoms = ChiTietNhom::where('id_user', $id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id_nhom;
                $obj->tennhom = Nhom::find($nhom->id_nhom)->tennhom;
                $obj->id_user = Nhom::find($nhom->id_nhom)->id_user;
                $nhomarr[] = $obj;
            }
        }else if ($leveldangnhap == 3){
            $nhoms = Nhom::where('id_user',$id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $nhomarr[] = $obj;
            }
        }
        else if($leveldangnhap == 2)
        {
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            $nhoms = Nhom::where('id_khoa',$idkhoa)->get();
            foreach ($nhoms as $nhom)
            {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom =$nhom->tennhom;
                $obj->dotthuctap = $nhom->id_dotthuctap;
                $nhomarr[] = $obj;
            }

        }
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $tenkhoa = Khoa::find($idkhoa)->tenkhoa;

        Session::put('nhoms',$nhomarr);

        $ten = Session::get('ten');
        $gv = TaiKhoan::select('id','ten')->where('kieu','3')->get();
        $dotthuctap = DotThucTap::select('id','tendotthuctap')->get();


        $usernhom = ChiTietNhom::all();
        $arr = array();
        foreach ($usernhom as $u){
            $arr[] = $u->id_user;
        }
        $sinhvien = TaiKhoan::select('*')->whereNotIn('id',$arr)->where('kieu',4)->get();

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            case 2:  return view('pages.Khoa.nhom_add',compact('nhomarr','id','ten','gv','dotthuctap','sinhvien')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postnhom(NhomRequerts $requerts)
    {
        $id = Session::get('id');
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $nhom = new Nhom;
        $nhom->tennhom = $requerts->txttennhom;
        $nhom->id_user = $requerts->slgiaovienhd;
        $nhom->id_dotthuctap = $requerts->sldotthuctap;
        $nhom->id_khoa = $idkhoa;
        $nhom->trangthai = 1;
        $nhom->save();

//        $chitietnhom = new ChiTietNhom;
//        $chitietnhom->id_nhom = $nhom->id;
//        $chitietnhom->id_user= $requerts->slsv1;
//        $chitietnhom->save();
        foreach($requerts->slsv as $sl) {
            $chitietnhom = new ChiTietNhom;
            $chitietnhom->id_nhom = $nhom->id;
            $chitietnhom->id_user = $sl;
            $chitietnhom->save();
        }

        return redirect()->route('pages.Khoa.nhom_list')->with(['flash_message'=>'Tạo Thành Công','flash_level'=>'success']);

    }


    public function postnhomsv()
    {
        $a = $_POST['ipid'];
        $b = $_POST['slsv'];
        $chitietnhom = new ChiTietNhom;
        $chitietnhom->id_nhom = $a;
        $chitietnhom->id_user = $b;
        $chitietnhom->save();
        return redirect()->route('pages.Khoa.nhom_list')->with(['flash_message'=>'Thêm Thành Công','flash_level'=>'success']);
    }
    public function xoasvnhom($idnhom,$iduser)
    {
        $sv = ChiTietNhom::where('id_nhom',$idnhom)->where('id_user',$iduser)->delete();
        return redirect()->route('pages.Khoa.nhom_list')->with(['flash_message'=>'Xóa Thành Công','flash_level'=>'success']);
    }
}
