<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SinhVienDanhGia;
use Session;
use App\TaiKhoan;
use App\Nhom;
use App\ChiTietNhom;
use App\Khoa;
use DB;
use Redirect;
use App\RenLuyen;
use Illuminate\Http\Request;
use App\Http\Requests\CauhoiRequest;
class CauhoiController extends Controller {

    public function listcauhoi()
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

        $cauhoi = RenLuyen::where('trangthai',1)->get();

        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.cauhoi_list',compact('cauhoi')); break;
           // case 2:  return view('pages.Khoa.cauhoi_list',compact('nhomarr','id','ten','cauhoi')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }
    public function chinhsua()
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

        $cauhoi = RenLuyen::all();
        $data = array();

        $nhomql = Nhom::where('id_user',$id)->get();
        $sv = array();
        foreach($nhomql as $n)
        {
            $ctn = ChiTietNhom::where('id_nhom',$n->id)->get();

            foreach($ctn as $ct) {
                $sv[] = $ct->id_user;
            }

        }
         foreach($sv as $s)
         {
             $sinhvien = TaiKhoan::where('id',$s)->first();
             $data[] = $sinhvien;
         }
        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            //case 2:  return view('pages.Khoa.cauhoi_list',compact('nhomarr','id','ten','cauhoi')); break;
            case 3:  return view('pages.GiaoVien.chinhsua_bc',compact('nhomarr','tenkhoa','id','ten','data')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }



    public function getcauhoi(){
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



        switch($leveldangnhap)
        {
            case 1:  return view('pages.Admin.cauhoi_add'); break;
           // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function postcauhoi(CauhoiRequest $request)
    {
        $cauhoi = new RenLuyen;
        $cauhoi->cauhoi = $request->taranoidung;
        $cauhoi->trangthai = 1;
        $cauhoi->save();
        return redirect()->route('pages.Admin.cauhoi_list')->with(['flash_message'=>'Tạo Thành Công','flash_level'=>'success']);

    }


    public function getdanhgia(){
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

        $cauhoi = RenLuyen::all();
        $danhgia = SinhVienDanhGia::where('id_usersv',$id)->first();
        if (count($danhgia) > 0 ){
            $traloi = $danhgia->traloi;
            $gopy = $danhgia->gopy;
        }else{
            $traloi = "";
            $gopy = "";
        }
        $traloi = json_decode($traloi);
        $gopy = json_decode($gopy);
        $i = 0;

        foreach($cauhoi as $c){
            if ($i < count($traloi)) $c->traloi = $traloi[$i]->traloi;
            if ($i < count($gopy))   $c->gopy = $gopy[$i];
            $i++;
        }

        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
           // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            case 4:  return view('pages.SinhVien.baocao_sv',compact('nhomarr','tenkhoa','id','ten','cauhoi')); break;
        }
    }


    public function getdanhgiagv($idsv){
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

        $cauhoi = RenLuyen::all();
        $danhgia = SinhVienDanhGia::where('id_usersv',$idsv)->first();

        if (count($danhgia) > 0 ){
            $traloi = $danhgia->traloi;
            $gopy = $danhgia->gopy;
            $traloi = json_decode($traloi);
            $gopy = json_decode($gopy);

            for ($i=0;$i<count($traloi);$i++){
                if ($i < count($gopy))
                    $traloi[$i]->gopy = $gopy[$i];
                else $traloi[$i]->gopy = "";
            }

        }else{
            $traloi = null;
        }


        switch($leveldangnhap)
        {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.cauhoi_add',compact('nhomarr','id','ten')); break;
            case 3:  return view('pages.GiaoVien.baocao_gv',compact('nhomarr','tenkhoa','id','ten','cauhoi','traloi','idsv')); break;
           // case 4:  return view('pages.SinhVien.baocao_sv',compact('nhomarr','tenkhoa','id','ten','cauhoi','danhgia')); break;
        }
    }



    public function postdanhgia()
    {
        $id = Session::get('id');
        $cauhoi = $_POST['cauhoi'];
        $traloi = $_POST['traloi'];

        $arrcauhoi = array();
        $i = 0;
        foreach($cauhoi as $c){
            $ch = new \stdClass();
            $ch->cauhoi = $c;
            $ch->traloi = $traloi[$i];
            $i++;
            $arrcauhoi[] = $ch;
        }
        $ketqua = json_encode($arrcauhoi);

        $dulieu = SinhVienDanhGia::where('id_usersv',$id)->get();
        if(count($dulieu)==0) {
            $danhgia = new SinhVienDanhGia;
            $danhgia->traloi = $ketqua;
            $danhgia->id_usersv = $id;

            $idnhom = ChiTietNhom::select('id_nhom')->where('id_user', $id)->first()->id_nhom;
            $idgv = Nhom::select('id_user')->where('id', $idnhom)->first()->id_user;
            $danhgia->id_usergv = $idgv;
            $danhgia->save();
        }else{

            DB::table('sinh_vien_danh_gias')
                ->where('id_usersv', $id)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('traloi' => $ketqua));  // update the record in the DB.
        }


        //echo 'thnah cong';
        return redirect()->route('pages.SinhVien.baocao_sv')->with(['flash_message'=>'Tạo Thành Công','flash_level'=>'success']);


    }


    public function postdanhgiagv()
    {
        $idsv = $_POST['idsv'];
        $gopy = json_encode( $_POST['gopy']);

            DB::table('sinh_vien_danh_gias')
                ->where('id_usersv', $idsv)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('gopy' => $gopy));  // update the record in the DB.

        //echo 'thnah cong';
        return Redirect::to('/gvbaocao/'.$idsv);

    }



}
