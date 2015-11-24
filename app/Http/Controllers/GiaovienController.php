<?php namespace App\Http\Controllers;

use App\DanhGiaKetQua;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\QuyTacGiaoVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Nhom;
use App\Khoa;
use App\ChiTietNhom;
use App\TaiKhoan;
use App\RenLuyen;
use Illuminate\Http\Request;


class GiaovienController extends Controller
{

    public function listgv()
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


        $giangvien = TaiKhoan::where('kieu', 3)->where('id_khoa', $idkhoa)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.giaovien_list', compact('nhomarr', 'id', 'ten', 'congty', 'giangvien'));
                break;
            // case 3:  return view('pages.Khoa.giaovien_list',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

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

        $nhompt = Nhom::where('id_user', $id)->get();
        $dssv = array();
        foreach ($nhompt as $n) {
            $sv = ChiTietNhom::where('id_nhom', $n->id)->get();
            foreach ($sv as $s) {
                $dssv[] = $s->id_user;
            }
        }

        $giangvien = TaiKhoan::where('kieu', 3)->where('id_khoa', $idkhoa)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            // case 2:  return view('pages.Khoa.giaovien_list',compact('nhomarr','id','ten','congty','giangvien')); break;
            case 3:
                return view('pages.GiaoVien.list_sv', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'dssv'));
                break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function infgv($id)
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


        $quytac = QuyTacGiaoVien::where('id_user', $id)->get();
        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            case 2:
                return view('pages.Khoa.giaovien_inf', compact('nhomarr', 'id', 'ten', 'quytac', 'data'));
                break;
            // case 3:  return view('pages.Khoa.giaovien_list',compact('nhomarr','tenkhoa','id','ten')); break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function ketquatt($idsv)
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

        $id = Session::get('id');
        $ketquadg = DanhGiaKetQua::where('id_usergv', $id)->where('id_usersv', $idsv)->first();

        if (count($ketquadg) > 0) {
            $dulieu = explode(';', $ketquadg->nhanxet);

        } else {
            $dulieu = ['', '', '', '', '', '', '', '', '', '', '', ''];
        }


        $giangvien = TaiKhoan::where('kieu', 3)->where('id_khoa', $idkhoa)->get();

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            //  case 2:  return view('pages.Khoa.giaovien_list',compact('nhomarr','id','ten','congty','giangvien')); break;
            case 3:
                return view('pages.GiaoVien.ketqua_thuctap', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'idsv', 'dulieu', 'ketquadg'));
                break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }

    public function xuatpdf($idsv)
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

        $id = Session::get('id');

        $ketquadg = DanhGiaKetQua::where('id_usergv', $id)->where('id_usersv', $idsv)->first();

        if (count($ketquadg) > 0) {
            $dulieu = explode(';', $ketquadg->nhanxet);

        } else {
            $dulieu = ['', '', '', '', '', '', '', '', '', '', '', ''];
        }
        $sinhvien = TaiKhoan::find($idsv);
        $tensv = $sinhvien->ten;

        $giaovien = TaiKhoan::find($id);
        $tengv = $giaovien->ten;
        $tongdiem = $dulieu[0]+$dulieu[1]+$dulieu[2]+$dulieu[3]+$dulieu[4]+$dulieu[5]+$dulieu[6]+$dulieu[7]+$dulieu[8]+$dulieu[9]+$dulieu[10]+$dulieu[11];
        $content = '
                    <table border="1" style="text-align: center">
                    <tr>
                        <th style="width: 10%">STT</th>
                        <th style="width: 50%">Nội Dung</th>
                        <th style="width: 20%">Thang Điểm</th>
                        <th style="width: 20%">Kết Quả</th>
                    </tr>

                    <tr>
                        <td style="width: 10%">1</td>
                        <td style="width: 50%">Lịch sử hình thành và phát triển của đơn vị. Sơ đồ tổ chức</td>
                        <td style="width: 20%">0.25</td>
                        <td style="width: 20%">' . $dulieu[0] . '</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Đặc điểm hoạt động sản xuất kinh doanh tại đơn vị thực tập</td>
                        <td>0.5</td>
                        <td>' . $dulieu[1] . '</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Các quy định chung trong lao động của cơ quan/đơn vị và bộ phận, công đoạn nơi sinh viên
                            tham gia làm việc
                        </td>
                        <td>0.25</td>
                        <td>' . $dulieu[2] . '</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Quy trình hoạt động của bộ phận tham gia thực tập</td>
                        <td>1</td>
                        <td>' . $dulieu[3] . '</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Công việc tham gia thực tập tại cơ quan đơn vị</td>
                        <td>1</td>
                        <td>' . $dulieu[4] . '</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Hiện trạng hệ thống thông tin của cơ quan đơn vị</td>
                        <td>2</td>
                        <td>' . $dulieu[5] . '</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Sản phẩm CNTT theo yêu cầu của DVTT / GVHD.</td>
                        <td>2</td>
                        <td>' . $dulieu[6] . '</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Những thuận lợi và khó khăn trong quá trình thực tập</td>
                        <td>0.5</td>
                        <td>' . $dulieu[7] . '</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Đánh giá mối liên hệ giữa lý thuyết và thực tiễn</td>
                        <td>0.5</td>
                        <td>' . $dulieu[8] . '</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Nhận xét của của cơ quan về chất lượng công việc được giao</td>
                        <td>0.5</td>
                        <td>' . $dulieu[9] . '</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Nhận xét của của cơ quan về bản thân sinh viên</td>
                        <td>0.5</td>
                        <td>' . $dulieu[10] . '</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Trình bày báo cáo</td>
                        <td>1</td>
                        <td>' . $dulieu[11] . '</td>
                    </tr>
                    <tr> <td  colspan ="3"> Kết Quả </td>
                        <td> '.$tongdiem.' </td>
                        </tr>

                </table>';
/*        $transport = \Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
            ->setUsername('canhdv93@gmail.com')// Your Gmail Username
            ->setPassword('Duongvancanh1'); // Your Gmail Password

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance('Wonderful Subject Here')
            ->setFrom(array('admin@duongvancanh.com' => 'Sender Name'))// can be $_POST['email'] etc...
            ->setTo(array('duongvancanh250493@gmail.com' => 'Receiver Name'))// your email / multiple supported.
            ->setBody('Here is the <strong>message</strong> itself. It can be text or <h1>HTML</h1>.', 'text/html');

        // Send the message
        if ($mailer->send($message)) {
            echo 'Mail sent successfully.';
        } else {
            echo 'I am sure, your configuration are not correct. :(';
        }
        exit;*/

        require_once('file/tcpdf/tcpdf.php');
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetTitle('Bảng Điểm Của : ' . $tensv.$tengv );
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Bảng Điểm Của : ' . $tensv, "");
        $pdf->setHeaderFont(Array('freeserif', "", 15));
        $pdf->SetFont('freeserif', '', 12); //tieng Viet
        $pdf->AddPage();
        $pdf->writeHTML($content, true, 0, true, 0);
        $pdf->Output($idsv . '.pdf', 'I');


        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            //  case 2:  return view('pages.Khoa.giaovien_list',compact('nhomarr','id','ten','congty','giangvien')); break;
            case 3:
                return view('pages.GiaoVien.ketqua_thuctap', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'idsv', 'dulieu', 'ketquadg'));
                break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


    public function postketqua()
    {
        $idsv = $_POST['idsv'];
        $diem = $_POST['diem'];
        $tong = 0;
        $data = "";
        foreach ($diem as $d) {
            $tong += $d;
            $data .= $d . ';';
        }
        $data = substr($data, 0, strlen($data) - 1);

        if ($tong > 10 || $tong < 0) {
            return "Điểm Nhập Sai";
            exit;
        }
        $id = Session::get('id');
        $ketquadg = DanhGiaKetQua::where('id_usergv', $id)->where('id_usersv', $idsv)->first();

        if (count($ketquadg) == 0) {
            $danhgia = new DanhGiaKetQua;
            $danhgia->id_usergv = $id;
            $danhgia->id_usersv = $idsv;
            $danhgia->nhanxet = $data;
            $danhgia->trangthai = 1;
            $danhgia->ketqua = ($tong > 5) ? 1 : 0;
            $danhgia->save();
        } else {
            DB::table('danh_gia_ket_quas')
                ->where('id_usergv', $id)
                ->where('id_usersv', $idsv)/// find your user by their email
                ->limit(1)// optional - to ensure only one record is updated.
                ->update(array('nhanxet' => $data));  // update the record in the DB.
        }

        return Redirect::to('/ketquathuctap/' . $idsv);

    }


    public function danhgiathuctap()
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
        $data = array();

        $nhomql = Nhom::where('id_user', $id)->get();
        $sv = array();
        foreach ($nhomql as $n) {
            $ctn = ChiTietNhom::where('id_nhom', $n->id)->get();

            foreach ($ctn as $ct) {
                $sv[] = $ct->id_user;
            }

        }
        foreach ($sv as $s) {
            $sinhvien = TaiKhoan::where('id', $s)->first();
            $data[] = $sinhvien;
        }

        switch ($leveldangnhap) {
            // case 1:  return view('admin.index'); break;
            //case 2:  return view('pages.Khoa.cauhoi_list',compact('nhomarr','id','ten','cauhoi')); break;
            case 3:
                return view('pages.GiaoVien.danhgiathuctap_sv', compact('nhomarr', 'tenkhoa', 'id', 'ten', 'data'));
                break;
            //  case 4:  return view('pages.SinhVien.index',compact('nhomarr','tenkhoa','id','ten')); break;
        }
    }


}
