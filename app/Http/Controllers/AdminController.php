<?php namespace App\Http\Controllers;

use App\BinhLuan;
use App\DotThucTap;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RenLuyen;
use Illuminate\Support\Facades\DB;
use Session;
use App\TaiKhoan;
use App\Khoa;
use App\ChiTietNhom;
use App\Nhom;
use App\BaiViet;
use Illuminate\Http\Request;
use App\Http\Requests\CauhoiRequest;
use App\Http\Requests\DotthuctapRequest;
use App\Http\Requests\SinhvienRequest;


class AdminController extends Controller {

    public function chitietbaiviet($idbv)
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



        $baiviet = BaiViet::where('id',$idbv)->get();


        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.baiviet_inf',compact('baiviet')); break;
            //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function xoabaiviet($idbv)
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



        $baivietxoa = BaiViet::where('id',$idbv)->get();
        if(count($baivietxoa)==0)
        {
            echo "Bài Viết Không Tồn Tại";
        }
        else
        {
            DB::table('bai_viets')
                ->where('id', $idbv)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('trangthai' =>0));  // update the record in the DB.

        }

        $baiviet = BaiViet::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.baiviet_all',compact('baiviet')); break;
            //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function xoacauhoi($idch)
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



        $cauhoixoa = RenLuyen::where('id',$idch)->get();
        if(count($cauhoixoa)==0)
        {
            echo "Câu Hỏi Không Tồn Tại";
        }
        else
        {
            DB::table('ren_luyens')
                ->where('id', $idch)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('trangthai' =>0));  // update the record in the DB.

        }

        $cauhoi = RenLuyen::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.cauhoi_list',compact('cauhoi')); break;
            //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function getupdatech($idch){
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

        $cauhoi = RenLuyen::where('id',$idch)->first();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.cauhoi_update',compact('cauhoi')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postupdatech($idch,CauhoiRequest $request){
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

        $cauhoiup = RenLuyen::where('id',$idch)->get();

        if(count($cauhoiup)==0)
        {
            echo "Câu Hỏi Không Tồn Tại";
        }
        else
        {
            DB::table('ren_luyens')
                ->where('id', $idch)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('cauhoi' =>$request->taranoidung));  // update the record in the DB.
        }


        $cauhoi = RenLuyen::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.cauhoi_list',compact('cauhoi')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function getupdatedtt($iddtt){
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

        $dotthuctap = DotThucTap::where('id',$iddtt)->first();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.dotthuctap_update',compact('dotthuctap')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postupdatedtt($iddtt,DotthuctapRequest $request){
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
            $nhoms = Nhom::where('id_user',$id)->where('trangthai',1)->get();
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

        $dotthuctapup = DotThucTap::where('id',$iddtt)->get();

        if(count($dotthuctapup)==0)
        {
            echo "Đợt Thực Tập Không Tồn Tại";
        }
        else
        {
            DB::table('dot_thuc_taps')
                ->where('id', $iddtt)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('tendotthuctap' =>$request->txttendotthuctap,
                    'ngaybatdau'=>$request->txtngaybatdau,
                    'ngayketthuc'=> $request->txtngayketthuc));  // update the record in the DB.
        }


        $dotthuctap = DotThucTap::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.dotthuctap_list',compact('dotthuctap')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function getttk(){
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

        $khoa = Khoa::all();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.taikhoan_add',compact('khoa')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }
    public function listtk(){
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

        $taikhoan = TaiKhoan::paginate(10);

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.taikhoan_list',compact('taikhoan')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }



    public function postttk(SinhvienRequest $request)
    {
        $id = Session::get('id');
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $taikhoan = new TaiKhoan;
        $taikhoan->username = $request->txtmssv;
        $taikhoan->password = $request->txtmssv;
        $taikhoan->ten = $request->txtten;
        $taikhoan->trangthai = 1;
        $taikhoan->gioitinh = $request->slgioitinh;
        $taikhoan->kieu = $request->slkieu;
        $taikhoan->diachi = $request->txtdiachi;
        $taikhoan->sdt = $request->txtsdt;
        $taikhoan->email = $request->txtemail;
        $taikhoan->id_khoa = $request->slkhoa;
        $taikhoan->save();
        return redirect()->route('Admin.taikhoan_list')->with(['flash_message' => 'Tạo Thành Công', 'flash_level' => 'success']);

    }

    public function getupdatetk($idtk){
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

        $taikhoan = TaiKhoan::where('id',$idtk)->first();
        $khoa = Khoa::all();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.taikhoan_update',compact('khoa','taikhoan')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function postupdatetk($idtk,SinhvienRequest $request){
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
            $nhoms = Nhom::where('id_user',$id)->where('trangthai',1)->get();
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

        $taikhoanup = TaiKhoan::where('id',$idtk)->get();

        if(count($taikhoanup)==0)
        {
            echo "Tài Khoản Không Tồn Tại";
        }
        else
        {
            DB::table('tai_khoans')
                ->where('id', $idtk)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('username' =>$request->txtmssv,
                    'ten'=>$request->txtten,
                    'gioitinh'=>$request->slgioitinh,
                    'kieu'=>$request->slkieu,
                    'id_khoa'=>$request->slkhoa,
                    'diachi'=>$request->txtdiachi,
                    'sdt'=>$request->txtsdt,
                    'email'=>$request->txtemail));

        }


        $taikhoan = TaiKhoan::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.taikhoan_list',compact('taikhoan')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function getdeletetk($idtk){
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
            $nhoms = Nhom::where('id_user',$id)->where('trangthai',1)->get();
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

        $taikhoanup = TaiKhoan::where('id',$idtk)->get();

        if(count($taikhoanup)==0)
        {
            echo "Tài Khoản Không Tồn Tại";
        }
        else
        {
            DB::table('tai_khoans')
                ->where('id', $idtk)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('trangthai' =>0));

        }


        $taikhoan = TaiKhoan::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.taikhoan_list',compact('taikhoan')); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function listbl()
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

        $dotthuctap  = DotThucTap::all();

        $binhluan = BinhLuan::where('trangthai',0)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.binhluan_list',compact('binhluan')); break;
            //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function infbl($idbl)
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

        $dotthuctap  = DotThucTap::all();

        $binhluan = BinhLuan::where('id',$idbl)->where('trangthai',0)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.binhluan_inf',compact('binhluan')); break;
            //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function deletebl($idbl)
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

        $dotthuctap  = DotThucTap::all();

        $binhluanup = BinhLuan::where('id',$idbl)->where('trangthai',0)->get();
        if(count($binhluanup)==0)
        {
            echo "Bình Luận Không Tồn Tại";
        }
        else {
            DB::table('binh_luans')
                ->where('id', $idbl)// find your user by their email
                ->limit(1)// optional - to ensure only one record is updated.
                ->update(array('trangthai' => 1));
        }
        $binhluan = BinhLuan::where('trangthai',0)->get();
        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.binhluan_list',compact('binhluan')); break;
            //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }
}
