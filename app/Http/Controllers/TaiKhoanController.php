<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nhom;
use App\TaiKhoan;
use Illuminate\Http\Request;
use App\ChiTietNhom;
use App\Khoa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;


class TaiKhoanController extends Controller {

    public function redirect()
    {
        if (Session::get('logged') == ''){
            return view('login/login');
            exit;
        }else{
            $level = Session::get('level');
            if   ($level == "1")
                return view('pages.Admin.master_ad');
            else if($level == "2")
                 return view ('pages.Khoa.index');
            else if($level == "3")
                return view ('pages.GiaoVien.index');
            else if($level == "4")
                return view ('pages.SinhVien.index');
            exit;
        }
    }

    public function dangnhap()
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $taikhoan = TaiKhoan::where(["username" => $user, "password" => $pass])->get();
        if (count($taikhoan)==0) {
            return view('login/login');
            exit;
        }else {
            Session::put('logged', 'true');
            $level = $taikhoan[0]->kieu;
            Session::put('level', $level);
            Session::put('user', $taikhoan[0]->username);
            Session::put('ten', $taikhoan[0]->ten);
            Session::put('id',$taikhoan[0]->id);
            return Redirect::to('/index');
        }
    }

    public function dangxuat()
    {
        Session::forget('logged');
        Session::forget('level');
        Session::forget('user');
        Session::forget('id');
        return view ('login/login');

    }


    public function getreset()
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
        } else if ($leveldangnhap == 3) {
            $nhoms = Nhom::where('id_user', $id)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom = $nhom->tennhom;
                $nhomarr[] = $obj;
            }
        } else if ($leveldangnhap == 2) {
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            $nhoms = Nhom::where('id_khoa',$idkhoa)->get();
            foreach ($nhoms as $nhom) {
                $obj = new \stdClass();
                $obj->id = $nhom->id;
                $obj->tennhom = $nhom->tennhom;
                $obj->dotthuctap = $nhom->id_dotthuctap;
                $nhomarr[] = $obj;
            }

        }
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $tenkhoa = Khoa::find($idkhoa)->tenkhoa;

        Session::put('nhoms', $nhomarr);

        $ten = Session::get('ten');


        $sinhvien = TaiKhoan::where('kieu', 4)->where('id_khoa', $idkhoa)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
           case 2:return view('pages.Khoa.reset_password', compact('nhomarr', 'id', 'ten', 'congty', 'sinhvien'));break;
            case 3:  return view('pages.GiaoVien.reset_password',compact('nhomarr','tenkhoa','id','ten')); break;
             case 4:  return view('pages.SinhVien.reset_password',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function postreset()
    {

        $password = $_POST['password'];
        $newpass = $_POST['newpass'];
        $newpass2 = $_POST['newpass2'];
        $id = Session::get('id');
        if($newpass <> $newpass2)
        {
            return redirect()->route('pages.SinhVien.reset_password')->with(['flash_message'=>'Mật Khẩu Không Trùng Khớp','flash_level'=>'danger']);
        }
        $ten = Session::get('ten');
        $taikhoan = TaiKhoan::find($id);
        if($taikhoan->password==$password)
        {
            DB::table('tai_khoans')
                ->where('id', $id)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('password' => $newpass));  // update the record in the DB.
            return view('login/login')->with(['flash_message'=>'Đổi Mật Khẩu Không Thành Công Mời Đăng Nhập Lại','flash_level'=>'sucsess']);
        }
        else
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
            } else if ($leveldangnhap == 3) {
                $nhoms = Nhom::where('id_user', $id)->get();
                foreach ($nhoms as $nhom) {
                    $obj = new \stdClass();
                    $obj->id = $nhom->id;
                    $obj->tennhom = $nhom->tennhom;
                    $nhomarr[] = $obj;
                }
            } else if ($leveldangnhap == 2) {
                $idkhoa = TaiKhoan::find($id)->id_khoa;
                $nhoms = Nhom::where('id_khoa',$idkhoa)->get();
                foreach ($nhoms as $nhom) {
                    $obj = new \stdClass();
                    $obj->id = $nhom->id;
                    $obj->tennhom = $nhom->tennhom;
                    $obj->dotthuctap = $nhom->id_dotthuctap;
                    $nhomarr[] = $obj;
                }

            }
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            $tenkhoa = Khoa::find($idkhoa)->tenkhoa;
            switch ($leveldangnhap) {
                // case 1:  return view('admin.index'); break;
                case 2:return view('pages.Khoa.reset_password', compact('nhomarr', 'id', 'ten', 'congty', 'sinhvien'));break;
                case 3:  return view('pages.GiaoVien.reset_password',compact('nhomarr','tenkhoa','id','ten')); break;
                case 4:  return view('pages.SinhVien.reset_password',compact('nhomarr','tenkhoa','id','ten')); break;
            }

        }

    }

}
