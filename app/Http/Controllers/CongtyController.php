<?php namespace App\Http\Controllers;

use App\DanhGiaCongTy;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Khoa;
use App\Nhom;
use App\TaiKhoan;
use App\ChiTietNhom;
use App\CongTy;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\CongtyRequest;
use App\Http\Requests\DanhgiaRequest;


class CongtyController extends Controller
{

    public function listcty()
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

        $congty = CongTy::all();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_list', compact('nhomarr', 'id', 'ten', 'congty'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function getcty()
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


        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_add', compact('nhomarr', 'id', 'ten'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function postcty(CongtyRequest $request)
    {
        $id = Session::get('id');
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $congty = new CongTy;
        $congty->ten = $request->txttencongty;
        $congty->diachi = $request->txtdiachicongty;
        $congty->email = $request->txtemailcongty;
        $congty->sdt = $request->txtsdtcongty;
        $congty->loai = $request->tarathongtin;
        $congty->trangthai = 1;
        $congty->id_khoa = $idkhoa;
        $congty->save();
        return redirect()->route('pages.Khoa.congty_list')->with(['flash_message' => 'Tạo Thành Công', 'flash_level' => 'success']);

    }

    public function infcty($id)
    {
        $data = CongTy::where('id', $id)->get();
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
        $taikhoan = TaiKhoan::where('id_congty', null)->where('kieu', 4)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_inf', compact('nhomarr', 'id', 'ten', 'data', 'taikhoan'));
                break;
              case 3:  return view('pages.GiaoVien.congty_inf',compact('nhomarr','tenkhoa','id','ten','data')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }

    }

    public function xoasvcty($idcty, $idsv)
    {
        $data = CongTy::where('id', $idcty)->get();
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

        $taikhoan = TaiKhoan::where('id', $idsv)->get();
        if (count($taikhoan) == 0) {
            echo "Sinh Viên Không Tồn Tại";
        } else {
            DB::table('tai_khoans')
                ->where('id', $idsv)// find your user by their email
                ->limit(1)// optional - to ensure only one record is updated.
                ->update(array('id_congty' => null));  // update the record in the DB.
        }

        $taikhoan = TaiKhoan::where('id_congty', null)->where('kieu', 4)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_inf', compact('nhomarr', 'id', 'ten', 'data', 'taikhoan'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }

    }

    public function themsvcty()
    {


        $idcty = $_POST['idcty'];
        $data = CongTy::where('id', $idcty)->get();
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


        $idsv = $_POST['slsv'];
        $taikhoan = TaiKhoan::where('id', $idsv)->get();
        if (count($taikhoan) == 0) {
            echo "Sinh Viên Không Tồn Tại";
        } else {
            DB::table('tai_khoans')
                ->where('id', $idsv)// find your user by their email
                ->limit(1)// optional - to ensure only one record is updated.
                ->update(array('id_congty' => $idcty));  // update the record in the DB.
        }

        $taikhoan = TaiKhoan::where('id_congty', null)->where('kieu', 4)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_inf', compact('nhomarr', 'id', 'ten', 'data', 'taikhoan'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }

    }

    public function danhgia($id)
    {
        $data = DanhGiaCongTy::where('id_congty', $id)->orderBy('created_at', 'desc')->get();
        foreach ($data as $da) {
            $da->noidung = json_decode($da->noidung);
        }
        $congty = CongTy::where('id', $id)->get();
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


        switch ($leveldangnhap) {
            case 2:
                return view('pages.Khoa.congty_dg', compact('nhomarr', 'id', 'ten', 'data', 'congty', 'dulieu'));
                break;
        }
    }

    public function danhgiasvcty($idcty, $idsv)
    {
        $data = DanhGiaCongTy::where('id_congty', $idcty)->where('id_user', $idsv)->orderBy('created_at', 'desc')->get();
        foreach ($data as $da) {
            $da->noidung = json_decode($da->noidung);
        }
        $congty = CongTy::where('id', $idcty)->get();
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


        switch ($leveldangnhap) {
            case 2:
                return view('pages.Khoa.congty_dgsv', compact('nhomarr', 'id', 'ten', 'data', 'congty', 'dulieu'));
                break;
        }
    }


    public function getdgcty()
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

        $tk = TaiKhoan::where('id', $id)->first();

        $congty = CongTy::where('id', $tk->id_congty)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            //case 2:  return view('pages.Khoa.congty_add',compact('nhomarr','id','ten')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            case 4:
                return view('pages.SinhVien.danhgiacty_add', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'congty'));
                break;
        }
    }

    public function getupdatecty($idcty)
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

        $congty = CongTy::find($idcty);
        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_update', compact('nhomarr', 'id', 'ten', 'congty'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //case 4:  return view('pages.SinhVien.danhgiacty_add',compact('nhomarr','tenkhoa','id','ten','congty')); break;
        }
    }


    public function postdgcty()
    {
        $idct = $_POST['slcongty'];
        $danhgia = $_POST['danhgia'];

        $data = json_encode($danhgia);
        $id = Session::get('id');
        $danhgia = new DanhGiaCongTy;
        $danhgia->id_user = $id;
        $danhgia->id_congty = $idct;
        $danhgia->noidung = $data;
        $danhgia->trangthai = 1;
        $danhgia->save();
        return redirect()->route('pages.SinhVien.danhgiacty_list')->with(['flash_message' => 'Tạo Thành Công', 'flash_level' => 'success']);

    }

    public function postupdatecty($idcty, CongtyRequest $request)
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

        $congtyup = CongTy::where('id',$idcty)->get();
        if(count($congtyup)==0)
        {
            echo "Công ty ko tồn tại";
        }
        else
        {

        DB::table('cong_ties')
            ->where('id', $idcty)  // find your user by their email
            ->limit(1)  // optional - to ensure only one record is updated.
            ->update(array('ten' =>$request->txttencongty,
                'diachi' =>$request->txtdiachicongty,
                'sdt' =>$request->txtsdtcongty,
                'email' =>$request->txtemailcongty,
                'loai' =>$request->tarathongtin,
            ));  // update the record in the DB.
        }




        $congty = CongTy::all();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.congty_list', compact('nhomarr', 'id', 'ten', 'congty'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }

    }


    public function listdgcty()
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

        $danhgia = DanhGiaCongTy::where('id_user', $id)->where('trangthai', 1)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            //case 2:  return view('pages.Khoa.congty_list',compact('nhomarr','id','ten','congty')); break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            case 4:
                return view('pages.SinhVien.danhgiacty_list', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'danhgia'));
                break;
        }
    }

}
