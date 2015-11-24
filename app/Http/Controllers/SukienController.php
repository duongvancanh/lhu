<?php namespace App\Http\Controllers;

use App\ChiTietSuKien;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SuKien;
use Session;
use App\ChiTietNhom;
use App\Nhom;
use App\TaiKhoan;
use App\Khoa;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\SukienRequest;

class SukienController extends Controller {


    public function listsukien()
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

        $data = SuKien::where('id_user', $id)->get();


        $nhompt = Nhom::where('id_user',$id)->get();
        $sinhviensk = array();
        foreach($nhompt as $n)
        {
            $sv = ChiTietNhom::where('id_nhom',$n->id)->get();
            foreach ($sv as $s){
                $sinhviensk[] = $s;
            }
        }


        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.giaovien_list',compact('nhomarr','id','ten','congty','giangvien')); break;
            case 3:
                return view('pages.GiaoVien.sukien_list', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'data','sinhviensk'));
                break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }
    public function listsukiensv()
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
        $data = array();
        $chitietsk = ChiTietSuKien::where('id_user',$id)->get();
        foreach($chitietsk as $ct)
        {
            $sukien = SuKien::where('id', $ct->id_sukien)->first();
            $data[] = $sukien;
        }

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.giaovien_list',compact('nhomarr','id','ten','congty','giangvien')); break;
           // case 3:   return view('pages.GiaoVien.sukien_list', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'data'));break;
              case 4:  return view('pages.SinhVien.sukien_list',compact('nhomarr','tenkhoa','id','ten','data')); break;
        }
    }


    public function getsukien(){
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

        $nhompt = Nhom::where('id_user',$id)->get();
        $sinhviensk = array();
        foreach($nhompt as $n)
        {
            $sv = ChiTietNhom::where('id_nhom',$n->id)->get();
            foreach ($sv as $s){
                $sinhviensk[] = $s;
            }
        }


    // $sinhviensk = TaiKhoan::where('kieu',4)->get();

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.congty_add',compact('nhomarr','id','ten')); break;
            case 3:  return view('pages.GiaoVien.sukien_add',compact('nhomarr','tenkhoa','id','ten','sinhviensk')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function postsukien(SukienRequest $request)
    {
        $id = Session::get('id');
         $sukien = new SuKien;
        $sukien->id_user = $id;
        $sukien->trangthai = 1;
        $sukien->diadiem = $request->txtdiadiem;
        $sukien->thoigian = $request->txtthoigian;
        $sukien->noidung = $request->txtnoidung;
        $sukien->save();

        foreach($request->slsv as $sl) {
            $chitietsk = new ChiTietSuKien;
            $chitietsk->id_sukien = $sukien->id;
            $chitietsk->id_user = $sl;
            $chitietsk->save();
        }
        return redirect()->route('pages.GiaoVien.sukien_list')->with(['flash_message'=>'Tạo Thành Công','flash_level'=>'success']);
    }

    public function getupdatesk($idsk){
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

        $sukien = SuKien::find($idsk);


        // $sinhviensk = TaiKhoan::where('kieu',4)->get();

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.congty_add',compact('nhomarr','id','ten')); break;
            case 3:  return view('pages.GiaoVien.sukien_update',compact('nhomarr','tenkhoa','id','ten','sukien')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postupdatesk($idsk, SukienRequest $request)
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
            $nhoms = Nhom::where('id_khoa', $idkhoa)->get();
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

        $sukienup = SuKien::where('id',$idsk)->get();
        if(count($sukienup)==0)
        {
            echo "Sự Kiện ko tồn tại";
        }
        else
        {

            DB::table('su_kiens')
                ->where('id', $idsk)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('thoigian' =>$request->txtthoigian,
                    'diadiem' =>$request->txtdiadiem,
                    'noidung' =>$request->txtnoidung,
                ));  // update the record in the DB.
        }

        $data = SuKien::where('id_user', $id)->get();


        $nhompt = Nhom::where('id_user',$id)->get();
        $sinhviensk = array();
        foreach($nhompt as $n)
        {
            $sv = ChiTietNhom::where('id_nhom',$n->id)->get();
            foreach ($sv as $s){
                $sinhviensk[] = $s;
            }
        }

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
           // case 2:return view('pages.Khoa.congty_list', compact('nhomarr', 'id', 'ten', 'congty'));break;
              case 3:  return view('pages.GiaoVien.sukien_list',compact('nhomarr','tenkhoa','id','ten','data','sinhviensk')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }

    }



    public function xacnhan()
    {
        $idsk = $_GET['idsk'];
        $iduser = $_GET['iduser'];
        DB::table('chi_tiet_su_kiens')
            ->where('id_user', $iduser)  // find your user by their email
            ->where('id_sukien', $idsk)  // find your user by their email
            ->limit(1)  // optional - to ensure only one record is updated.
            ->update(array('gv_xacnhan' => 1));  // update the record in the DB.
    }

    public function posttiendo(){

        $gv = $_POST['slgv'];
        $sv = $_POST['slsv'];
        $sukien = SuKien::where('id_user',$gv)->get();
        $data = array();
        foreach($sukien as $sk)
        {
            $chitiet = ChiTietSuKien::where('id_sukien',$sk->id)->where('id_user',$sv)->first();
            if (count($chitiet) >0 ){
                if ($sk->id == $chitiet->id_sukien) $data[] = $sk;
            }

        }
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
                $obj->tennhom = $nhom->tennhom;
                $obj->dotthuctap = $nhom->id_dotthuctap;
                $nhomarr[] = $obj;
            }

        }
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $tenkhoa = Khoa::find($idkhoa)->tenkhoa;

        Session::put('nhoms',$nhomarr);

        $ten = Session::get('ten');


        $sinhviensk = TaiKhoan::where('kieu',4)->get();

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
             case 2:  return view('pages.Khoa.tiendo_list',compact('nhomarr','id','ten','data')); break;
           // case 3:  return view('pages.GiaoVien.sukien_add',compact('nhomarr','tenkhoa','id','ten','sinhviensk')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function showtiendo(){
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

        $giaovien = TaiKhoan::where('id_khoa',$idkhoa)->where('kieu',3)->orderby('ten')->get();
        $sinhvien = TaiKhoan::where('id_khoa',$idkhoa)->where('kieu',4)->orderby('ten')->get();



        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
             case 2:  return view('pages.Khoa.tiendolamviec',compact('nhomarr','id','ten','giaovien','sinhvien')); break;
           // case 3:  return view('pages.GiaoVien.sukien_add',compact('nhomarr','tenkhoa','id','ten','sinhviensk')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function xoasvsukien($idsukien,$iduser)
    {
        $sv = ChiTietSuKien::where('id_sukien',$idsukien)->where('id_user',$iduser)->delete();
        return redirect()->route('pages.GiaoVien.sukien_list')->with(['flash_message'=>'Xóa Thành Công','flash_level'=>'success']);
    }

    public function postsukiensv()
    {
        $a = $_POST['idsk'];
        $b = $_POST['slsv'];
        $chitietsukien = new ChiTietSuKien();
        $chitietsukien->id_sukien =$a;
        $chitietsukien->id_user =$b;
       $chitietsukien->save();
        return redirect()->route('pages.Khoa.sukien_list')->with(['flash_message'=>'Thêm Thành Công','flash_level'=>'success']);
    }
}
