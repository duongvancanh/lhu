<?php namespace App\Http\Controllers;

use App\BaiViet;
use App\DinhKem;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\ChiTietNhom;
use App\Nhom;
use App\TaiKhoan;
use App\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests\SinhvienRequest;

class SinhvienController extends Controller
{

    public function listsv()
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
            case 2:
                return view('pages.Khoa.sinhvien_list', compact('nhomarr', 'id', 'ten', 'congty', 'sinhvien'));
                break;
            // case 3:  return view('pages.Khoa.giaovien_list',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function infsv($id)
    {
        $data = TaiKhoan::where('id', $id)->get();


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


        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.sinhvien_inf', compact('nhomarr', 'id', 'ten', 'data'));
                break;
            // case 3:  return view('pages.Khoa.giaovien_list',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function gettk()
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


        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.taikhoan_add', compact('nhomarr', 'id', 'ten'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function posttk(SinhvienRequest $request)
    {
        $id = Session::get('id');
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $taikhoan = new TaiKhoan;
        $taikhoan->username = $request->txtmssv;
        $taikhoan->password = $request->txtmssv;
        $taikhoan->ten = $request->txtten;
        $taikhoan->trangthai = 1;
        $taikhoan->gioitinh = $request->slgioitinh;
        $taikhoan->kieu = 4;
        $taikhoan->diachi = $request->txtdiachi;
        $taikhoan->sdt = $request->txtsdt;
        $taikhoan->email = $request->txtemail;
        $taikhoan->id_khoa = $idkhoa;
        $taikhoan->save();
        return redirect()->route('pages.Khoa.sinhvien_list')->with(['flash_message' => 'Tạo Thành Công', 'flash_level' => 'success']);

    }


    public function getupdatetk($idtk)
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

        $taikhoan = TaiKhoan::where('id',$idtk)->where('id_khoa',$idkhoa)->first();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.taikhoan_update', compact('nhomarr', 'id', 'ten','taikhoan'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postupdatetk($idtk)
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

        $taikhoan = TaiKhoan::where('id',$idtk)->first();
        $pten = $_POST['txtten'];
        $pgioitinh = $_POST['slgioitinh'];
        $pdiachi = $_POST['txtdiachi'];
        $psdt = $_POST['txtsdt'];
        $pemail = $_POST['txtemail'];

        $a = $taikhoan['kieu'];


        if(count($taikhoan)==0)
        {
            echo "Giáo viên không tồn tại";
        }
        else
        {

            DB::table('tai_khoans')
                ->where('id', $idtk)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('ten' =>$pten,
                    'diachi' =>$pdiachi,
                    'sdt' =>$psdt,
                    'email' =>$pemail,
                    'gioitinh'=>$pgioitinh,

                ));  // update the record in the DB.
        }


        $giangvien = TaiKhoan::where('kieu', 3)->where('id_khoa', $idkhoa)->get();
        $sinhvien = TaiKhoan::where('kieu', 4)->where('id_khoa', $idkhoa)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                if($a == 3) {
                    return view('pages.Khoa.giaovien_list', compact('nhomarr', 'id', 'ten', 'giangvien'));
                    break;
                }
                else{
                    return view('pages.Khoa.sinhvien_list', compact('nhomarr', 'id', 'ten', 'congty', 'sinhvien'));
                    break;
                }

            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }

    }




    public function getfile()
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
            case 2:
                return view('pages.Khoa.them_exel', compact('nhomarr', 'id', 'ten', 'congty'));
                break;
            // case 3:  return view('pages.Khoa.giaovien_list',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postfile()
    {
        @set_time_limit(5 * 60);
        $target_dir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "excel/";
        if (!file_exists($target_dir)) {
            @mkdir($target_dir);
        }
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageFileType != "xlsx" && $imageFileType != "xls") {
            $return['result'] = 'false' ;
            $return['error'] = 'Không phải file excel' ;
            die(json_encode($return));
        }
            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $return['result'] = 'false' ;
                $return['error'] = "Lỗi khi upload file";
                die(json_encode($return));
            }
        Excel::load($target_file, function($reader) {
            $arrSV = $reader->get(array('username', 'password','ten','gioitinh','diachi','sdt','email'));
            $id = Session::get('id');
            $idkhoa = TaiKhoan::find($id)->id_khoa;
            DB::beginTransaction();
            try{
                foreach ($arrSV as $sv) {
                    $sinhvien = new TaiKhoan;
                    $sinhvien->username = $sv->username;
                    $sinhvien->password  = $sv->password;
                    $sinhvien->ten = $sv->ten;
                    $sinhvien->kieu = 4;
                    $sinhvien->trangthai = 1;
                    $sinhvien->gioitinh = $sv->gioitinh;
                    $sinhvien->diachi = $sv->diachi;
                    $sinhvien->sdt = $sv->sdt;
                    $sinhvien->email = $sv->email;
                    $sinhvien->id_khoa = $idkhoa;
                    $sinhvien->save();
                }
            }catch (QueryException $e){
                $return['result'] = 'false' ;

                $error =  $e->getMessage();
                preg_match('/values \(([^)]+)/i',$error,$m);
                $return['error'] = "Dữ Liệu Bị Trùng (username hoặc email) - ".$m[1];
                die(json_encode($return));
            }
            DB::commit();
            $return['result'] = 'true' ;
            echo json_encode($return);
        });
        unlink($target_file);
    }
    public function listtailieusv()
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

        $khoa = TaiKhoan::where('id',$id)->first();

        $usk = Khoa::where('id',$khoa->id_khoa)->first();

        $tailieu = BaiViet::where('id_user',$usk->admin)->get();

        $dinhkem = array();
        foreach($tailieu as $tl) {
            $dk = DinhKem::where('id_baiviet', $tl->id)->get();
            foreach($dk as $d)
            {
                $dinhkem[] = $d;
            }
        }

        switch ($leveldangnhap) {
                 case 4:  return view('pages.SinhVien.tailieu',compact('nhomarr','tenkhoa','id','ten','dinhkem')); break;
        }
    }

}
