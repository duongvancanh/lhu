<?php namespace App\Http\Controllers;

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function giaodien()
    {
        return view('pages.Khoa.index');
    }

    public function taonhom()
    {
        return view('pages.Khoa.nhom_add');
    }

    public function dsnhom()
    {
        return view('pages.Khoa.nhom_list');
    }

    public function taocty()
    {
        return view('pages.Khoa.congty_add');
    }

    public function dscty()
    {
        return view('pages.Khoa.congty_list');
    }

    public function taosv()
    {
        return view('pages.Khoa.sinhvien_add');
    }

    public function dssv()
    {
        return view('pages.Khoa.sinhvien_list');
    }
    public function giaovien()
    {
        return view('pages.GiaoVien.master_gv');
    }
    public function giaovienid()
    {
        return view('pages.GiaoVien.index');
    }
    public function sinhvien()
    {
        return view('pages.Sinhvien.master_sv');
    }
    public function sinhvienid()
    {
        return view('pages.Sinhvien.index');
    }
    public function dangnhap()
    {
        return view('login.login');
    }
}
