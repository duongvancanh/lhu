<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\ChiTietNhom;
use App\Nhom;
use App\TaiKhoan;
use App\Khoa;

use App\QuyTacGiaoVien;
use Illuminate\Http\Request;
use App\Http\Requests\QuytacRequest;

class QuytaclamviecController extends Controller {


    public function infgv()
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
        $data = TaiKhoan::where('id',$id)->get();


        $quytac = QuyTacGiaoVien::where('id_user',$id)->get();
        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            //case 2:  return view('pages.Khoa.giaovien_inf',compact('nhomarr','id','ten')); break;
             case 3:  return view('pages.GiaoVien.quytac_list',compact('nhomarr','tenkhoa','id','ten','quytac','data')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }




    public function getquytac(){
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

        $data = QuyTacGiaoVien::where('id_user',$id)->first();


        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.congty_add',compact('nhomarr','id','ten')); break;
            case 3:  return view('pages.GiaoVien.quytac_add',compact('nhomarr','tenkhoa','id','ten','data')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function xemquytac($idgvpt){
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
                $obj->id_user =$nhom->id_user;
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

        $data = TaiKhoan::where('id',$idgvpt)->get();


        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.congty_add',compact('nhomarr','id','ten')); break;
           // case 3:  return view('pages.GiaoVien.quytac_add',compact('nhomarr','tenkhoa','id','ten','data')); break;
           case 4:  return view('pages.SinhVien.xemquytac',compact('nhomarr','tenkhoa','id','ten','data')); break;
        }
    }


    public function postquytac(QuytacRequest $request)
    {
        $id = Session::get('id');
        $data = QuyTacGiaoVien::where('id_user', $id)->first();
        if (count($data) == 0) {
            $quytac = new QuyTacGiaoVien();
            $quytac->id_user = $id;
            $quytac->noidung = $request->txtnoidung;
            $quytac->trangthai = 1;
            $quytac->save();
        } else {
            DB::table('quy_tac_giao_viens')
                ->where('id_user', $id)
                ->limit(1)// optional - to ensure only one record is updated.
                ->update(array('noidung' => $request->txtnoidung));  // update the record in the DB.
        }
        return redirect()->route('pages.GiaoVien.quytac_add')->with(['flash_message' => 'Tạo Thành Công', 'flash_level' => 'success']);
    }




}
