<?php namespace App\Http\Controllers;

use App\BinhLuan;
use App\ChiTietNhom;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Khoa;
use App\Nhom;
use App\Tag;
use App\TaiKhoan;
use App\BaiViet;
use App\DinhKem;
use App\DotThucTap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class BaivietController extends Controller
{

    public function getbaiviet($page)
    {

        $id = Session::get('id');
        $take = 5;
        $skip = ($page - 1) * 5;
        $tag = Tag::where('id_user', $id)->get();
        $tagarr = array();
        foreach ($tag as $t) {
            $tagarr[] = $t->id_baiviet;
        }
        $baiviet = BaiViet::where("id_user", "=", $id)->whereIn('id', $tagarr, 'or')->where("trangthai", "=", "1")->orderBy('created_at', 'desc')->take($take)->skip($skip)->get();

        foreach ($baiviet as $b) {
            $b->nguoiviet = TaiKhoan::find($b->id_user)->ten;
            $comments = BaiViet::find($b->id)->binhluan()->get();
            $arrcomment = array();
            foreach ($comments as $c) {
                $comment['ten'] = TaiKhoan::find($c->id_user)->ten;//lay ten nguoi comment
                $comment['id'] = $c->id_user;//lay id nguoi comment
                $comment['noidung'] = $c->noidung; //lay noi dung comment
                array_push($arrcomment, $comment);
            }
            $b->comment = $arrcomment;
            //lay file dinh kem
            $dinhkem = BaiViet::find($b->id)->dinhkem()->get();
            $arrdinhkem = array();
            foreach ($dinhkem as $d) {
                array_push($arrdinhkem, $d->link);
            }
            $b->dinhkem = $arrdinhkem;
        }
        echo json_encode($baiviet);
    }

    public function getbaivietkhoa($page = 1)
    {
        $leveldangnhap = Session::get('level');
        $id = Session::get('id');
        $idkhoa = TaiKhoan::find($id)->id_khoa;
        $idadmin = Khoa::find($idkhoa)->admin;
        $take = 5;
        $skip = ($page - 1) * 5;

        $baiviet = BaiViet::where("id_user", "=", $idadmin)->where("trangthai", "=", "1")->where("id_nhom", "=", null)->orderBy('created_at', 'desc')->take($take)->skip($skip)->get();

        $arrcomment = array();
        $arrdinhkem = array();

        foreach ($baiviet as $b) {
            //lay comment
            $b->nguoiviet = TaiKhoan::find($b->id_user)->ten;
            $date = date('Y-m-d H:i:s');
            $b->ngayviet = $date;
            $comments = BaiViet::find($b->id)->binhluan()->get();
            $arrcomment = array();
            foreach ($comments as $c) {
                $comment['ten'] = TaiKhoan::find($c->id_user)->ten;//lay ten nguoi comment
                $comment['id'] = $c->id_user;//lay id nguoi comment
                $comment['noidung'] = $c->noidung; //lay noi dung comment
                array_push($arrcomment, $comment);
            }
            $b->comment = $arrcomment;

            //lay file dinh kem
            $dinhkem = BaiViet::find($b->id)->dinhkem()->get();
            $arrdinhkem = array();
            foreach ($dinhkem as $d) {
                array_push($arrdinhkem, $d->link);
            }
            $b->dinhkem = $arrdinhkem;

        }
        echo json_encode($baiviet);
    }

    public function getbaivietnhom($idnhom = "", $page = 1)
    {
        $leveldangnhap = Session::get('level');
        $id = Session::get('id');
        if (!isset($idnhom)) {
            $id = ChiTietNhom::find($id)->nhom()->get()->idnhom;
        } else {
            $id = $idnhom;
        }
        $nhoms = Session::get('nhoms');
        $result = false;

        foreach ($nhoms as $nhom) {
            if ($nhom->id == $id)
                $result = true;
        }
        if (!$result) {
            return json_encode(false);
            exit;
        }

        $take = 5;
        $skip = ($page - 1) * 5;

        $baiviet = BaiViet::where("id_nhom", "=", $id)->where("trangthai", "=", "1")->orderBy('created_at', 'desc')->take($take)->skip($skip)->get();

        $arrcomment = array();
        $arrdinhkem = array();

        foreach ($baiviet as $b) {
            //lay comment
            $b->nguoiviet = TaiKhoan::find($b->id_user)->ten;
            $date = date('Y-m-d H:i:s');
            $b->ngayviet = $date;
            $comments = BaiViet::find($b->id)->binhluan()->get();
            $arrcomment = array();
            foreach ($comments as $c) {
                $comment['ten'] = TaiKhoan::find($c->id_user)->ten;//lay ten nguoi comment
                $comment['id'] = $c->id_user;//lay id nguoi comment
                $comment['noidung'] = $c->noidung; //lay noi dung comment
                array_push($arrcomment, $comment);
            }
            $b->comment = $arrcomment;

            //lay file dinh kem
            $dinhkem = BaiViet::find($b->id)->dinhkem()->get();
            $arrdinhkem = array();
            foreach ($dinhkem as $d) {
                array_push($arrdinhkem, $d->link);
            }
            $b->dinhkem = $arrdinhkem;

        }
        echo json_encode($baiviet);
    }

    public function vietbai($noidung, $idnhom = "")
    {
        //Them moi bai viet
        $date = date('Y-m-d H:i:s');
        $id = Session::get('id');
        if ($idnhom != "") {
            $nhoms = Session::get('nhoms');
            $result = false;
            foreach ($nhoms as $nhom) {
                if ($nhom->id == $idnhom)
                    $result = true;
            }
            if (!$result) die ('khong duoc quyen');
        }
        $baiviet = new BaiViet;
        $baiviet->id_user = Session::get('id');
        $baiviet->noidung = $noidung;
        if ($idnhom != "") $baiviet->id_nhom = $idnhom;
        $baiviet->trangthai = 1;
        $baiviet->ngayviet = $date;
        $baiviet->save();

        //Upload Dinh kem
        if (isset($_GET['file_name'])) {
            $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
            //$targetDir = 'uploads';

            // Get a file name
            $filename = json_decode($_GET['file_name']);
            //echo $_GET['file_name'];exit;
            //echo file_put_contents('log.txt',$filename);

            foreach ($filename as $name) {
                $filePath = $targetDir . DIRECTORY_SEPARATOR . $name;
                echo $filePath;
                copy($filePath, 'attachment/' . $baiviet->id . '-' . $this->vn_str_filter($name));
                $dinhkem = new DinhKem;
                $dinhkem->id_baiviet = $baiviet->id;
                $dinhkem->link = $this->vn_str_filter($name);
                $dinhkem->save();
            }
        }

        //Them taguser

        if (isset($_GET['tags'])) {
            $tags = json_decode($_GET['tags']);
            foreach ($tags as $tag) {
                $tag = trim($tag);
                $taguser = new Tag();
                $taguser->id_baiviet = $baiviet->id;
                $taguser->id_user = (int)$tag;
                $taguser->save();
            }
        }

        echo 'thanh cong';
    }

    public function vietcomment($idbaiviet, $noidung)
    {
        //Them moi bai viet
        $date = date('Y-m-d H:i:s');
        $comment = new BinhLuan();
        $comment->id_user = Session::get('id');
        $comment->id_baiviet = $idbaiviet;
        $comment->noidung = $noidung;
        $comment->ngayviet = $date;
        $comment->save();
    }

    public function vn_str_filter($str)
    {

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);

        }

        return $str;

    }

        public function getallbaiviet()
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

            $dotthuctap = DotThucTap::all();

            $baiviet = BaiViet::where('trangthai', 1)->get();


            switch ($leveldangnhap) {
                case 1:
                    return view('pages.Admin.baiviet_all', compact('baiviet'));
                    break;
                //case 2:  return view('pages.Khoa.dotthuctap_list',compact('nhomarr','id','ten','dotthuctap')); break;
                //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
                //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            }
        }

    public function tonghopbaocao()
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

        $dotthuctap = DotThucTap::all();

        $sinhvienkhoa = TaiKhoan::where('id_khoa', $idkhoa)->where('kieu', 4)->get();
        $svkhoa = array();
        foreach ($sinhvienkhoa as $svk) {
            $svkhoa[] = $svk->id;
        }


        $baiviet = BaiViet::wherein('id_user', $svkhoa)->get();
        $dinhkem = array();
        foreach ($baiviet as $bv) {
            $dk = DinhKem::where('id_baiviet', $bv->id)->get();
            foreach ($dk as $d) {
                $dinhkem[] = $d;
            }
        }
        $baocao = array();
        foreach ($dinhkem as $dk) {
            $count = preg_match('/[0-9]+_baocao.zip/i', $dk->link, $m);
            if ($count > 0) {
                $baocao[] = $dk;
            }
        }

        switch ($leveldangnhap) {
            //case 1:  return view('pages.Admin.baiviet_all',compact('baiviet')); break;
            case 2:
                return view('pages.Khoa.tonghopbaocao', compact('nhomarr', 'id', 'ten', 'dotthuctap', 'dinhkem', 'baocao'));
                break;
            //  case 3:  return view('pages.GiaoVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


}
