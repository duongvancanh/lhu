<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/dangnhap','TaiKhoanController@redirect');
Route::post('/dangnhap','TaiKhoanController@dangnhap');
Route::get('/dangxuat','TaiKhoanController@dangxuat');

Route::get('/index','MainController@index');



Route::filter('check-user',function(){
    if (!Session::has('logged')) {
        return Redirect::to('/dangnhap');
    }
});


Route::group(array('before' => 'check-user'),function(){
    Route::get('','MainController@index');
    Route::get('index','MainController@index');
    Route::get('khoa','MainController@index');
    Route::get('themsv','MainController@themsv');
    Route::get('nhom/{idnhom}','MainController@index');

    Route::get('getuser','MainController@getuser');
    Route::get('upload','MainController@upload');

    Route::get('vietcomment/{idbaiviet}/{noidung}','BaivietController@vietcomment');

    Route::get('vietbai/{noidung}/{idnhom}','BaivietController@vietbai');
    Route::get('vietbai/{noidung}/{tags}','BaivietController@vietbai');
    Route::get('vietbai/{noidung}','BaivietController@vietbai');
    Route::get('getbaiviet/{page}','BaivietController@getbaiviet');
    Route::get('getbaivietkhoa/{page}','BaivietController@getbaivietkhoa');
    Route::get('getbaivietnhom/{page}','BaivietController@getbaivietnhom');
    Route::get('getbaivietnhom/{idnhom}/{page}','BaivietController@getbaivietnhom');
    Route::get('/themsv','MainController@themsv');

   // Route::get('/taocty','CongtyController@getcty');

     Route::get('/taocty',['as' =>'pages.Khoa.congty_add','uses' =>'CongtyController@getcty']);
     Route::post('/taocty',['as' => 'pages.Khoa.congty_add', 'uses' =>'CongtyController@postcty']);



    Route::get('/updatecty/{id}',['as' =>'Khoa.congty_update','uses' =>'CongtyController@getupdatecty']);
    Route::post('/updatecty/{id}',['as' => 'Khoa.congty_update', 'uses' =>'CongtyController@postupdatecty']);

    Route::get('/updatetaikhoan/{id}',['as' =>'Khoa.taikhoan_update','uses' =>'SinhvienController@getupdatetk']);
    Route::post('/updatetaikhoan/{id}',['as' => 'Khoa.taikhoan_update', 'uses' =>'SinhvienController@postupdatetk']);

    Route::get('/updatesukien/{id}',['as' =>'GiaoVien.sukien_update','uses' =>'SukienController@getupdatesk']);
    Route::post('/updatesukien/{id}',['as' => 'GiaoVien.sukien_update', 'uses' =>'SukienController@postupdatesk']);



    Route::get('/dscongty',['as' => 'pages.Khoa.congty_list', 'uses' =>'CongtyController@listcty']);
     Route::get('/congty/{id}','CongtyController@infcty');


     Route::get('/danhgiacongty/{id}','CongtyController@danhgia');
     Route::get('/danhgiasvcty/{idcty}/{idsv}','CongtyController@danhgiasvcty');

     Route::get('/danhgiacty',['as' =>'pages.SinhVien.danhgiacty_add','uses' =>'CongtyController@getdgcty']);
   Route::post('/danhgiacty',['as' => 'pages.SinhVien.danhgiacty_add', 'uses' =>'CongtyController@postdgcty']);
    Route::get('/dsdanhgia',['as' => 'pages.SinhVien.danhgiacty_list', 'uses' =>'CongtyController@listdgcty']);

    Route::get('/xoasvcty/{idcty}/{idsv}',['as' =>'pages.Khoa.congty_inf','uses' =>'CongtyController@xoasvcty']);
    Route::post('/themsvcty',['as' =>'pages.Khoa.congty_inf','uses' =>'CongtyController@themsvcty']);



    Route::get('/dsgiaovien',['as' => 'pages.Khoa.giaovien_list', 'uses' =>'GiaovienController@listgv']);
    Route::get('giaovien/{id}',['as' => 'pages.Khoa.giaovien_inf', 'uses' =>'GiaovienController@infgv']);



    Route::get('/taosv',['as' =>'pages.Khoa.taikhoan_add','uses' =>'SinhvienController@gettk']);
    Route::post('/taosv',['as' => 'pages.Khoa.taikhoan_add', 'uses' =>'SinhvienController@posttk']);

    Route::get('/dssinhvien',['as' => 'pages.Khoa.sinhvien_list', 'uses' =>'SinhvienController@listsv']);
    Route::get('sinhvien/{id}',['as' => 'pages.Khoa.sinhvien_inf', 'uses' =>'SinhvienController@infsv']);

    Route::get('/tonghopbaocao',['as' => 'pages.Khoa.tonghopbaocao', 'uses' =>'BaivietController@tonghopbaocao']);




    Route::get('/taodtt',['as' =>'pages.Admin.dotthuctap_add','uses' =>'DotthuctapController@getdtt']);
    Route::post('/taodtt',['as' => 'pages.Admin.dotthuctap_add', 'uses' =>'DotthuctapController@postdtt']);
    Route::get('/dsdotthuctap',['as' => 'pages.Admin.dotthuctap_list', 'uses' =>'DotthuctapController@listdtt']);



    Route::get('/taonhom',['as' =>'pages.Khoa.nhom_add','uses' =>'NhomController@getnhom']);
    Route::post('/taonhom',['as' => 'pages.Khoa.nhom_add', 'uses' =>'NhomController@postnhom']);
    Route::get('/xoasvnhom/{idnhom}/{iduser}',['as' => 'pages.Khoa.nhom_xoa', 'uses' =>'NhomController@xoasvnhom']);


    Route::get('/dsnhom',['as' => 'pages.Khoa.nhom_list', 'uses' =>'NhomController@listnhom']);
    Route::post('/dsnhom',['as' => 'pages.Khoa.nhom_list', 'uses' =>'NhomController@postnhomsv']);

    Route::post('/dssukien',['as' => 'pages.GiaoVien.sukien_listsv', 'uses' =>'SukienController@postsukiensv']);


    Route::get('/taoquytac',['as' => 'pages.GiaoVien.quytac_add', 'uses' =>'QuytaclamviecController@getquytac']);
    Route::post('/taoquytac',['as' => 'pages.Giaovien.quytac_add', 'uses' =>'QuytaclamviecController@postquytac']);
    Route::get('/giaovieninf',['as' => 'pages.GiaoVien.quytac_list', 'uses' =>'QuytaclamviecController@infgv']);

    Route::get('/nhomphutrach/{id}',['as' => 'pages.GiaoVien.nhom_inf', 'uses' =>'NhomController@nhomphutrach']);
    Route::get('/thongtinsv/{id}',['as' => 'pages.GiaoVien.sinhvien_inf', 'uses' =>'NhomController@thongtinsv']);

    Route::get('/xuatpdf/{id}',['as' => 'pages.GiaoVien.ketqua_thuctap', 'uses' =>'GiaoVienController@xuatpdf']);

    Route::get('/taosukien',['as' => 'pages.GiaoVien.sukien_add', 'uses' =>'SukienController@getsukien']);
    Route::post('/taosukien',['as' => 'pages.Giaovien.sukien_add', 'uses' =>'SukienController@postsukien']);
    Route::get('/dssukien',['as' => 'pages.GiaoVien.sukien_list', 'uses' =>'SukienController@listsukien']);
    Route::get('/xoasvsukien/{idsukien}/{iduser}',['as' => 'pages.Giaovien.xoasvsukien', 'uses' =>'SukienController@xoasvsukien']);



    Route::get('/xemsukien',['as' => 'pages.SinhVien.sukien_list', 'uses' =>'SukienController@listsukiensv']);


    Route::get('/xacnhansukien','SukienController@xacnhan');


    Route::get('/themexel',['as'=> 'pages.Khoa.them_exel','uses'=>'SinhvienController@getfile']);
    Route::post('/themexel',['as'=> 'pages.Khoa.them_exel','uses'=>'SinhvienController@postfile']);


    Route::post('/tiendolv',['as'=>'pages.Khoa.tiendolamviec','uses'=>'SukienController@posttiendo']);
    Route::get('/tiendolv',['as'=>'pages.Khoa.tiendolamviec','uses'=>'SukienController@showtiendo']);


    Route::get('/taocauhoi',['as' => 'pages.Admin.cauhoi_add', 'uses' =>'CauhoiController@getcauhoi']);
    Route::post('/taocauhoi',['as' => 'pages.Admin.cauhoi_add', 'uses' =>'CauhoiController@postcauhoi']);
    Route::get('/dscauhoi',['as' => 'pages.Admin.cauhoi_list', 'uses' =>'CauhoiController@listcauhoi']);


    Route::get('/svbaocao',['as'=>'pages.SinhVien.baocao_sv','uses'=> 'CauhoiController@getdanhgia']);
    Route::post('/svbaocao',['as'=>'pages.SinhVien.baocao_sv','uses'=> 'CauhoiController@postdanhgia']);

    Route::post('/gvbaocao',['as'=>'pages.GiaoVien.baocao_gv','uses'=> 'CauhoiController@postdanhgiagv']);
    Route::get('/gvbaocao/{idsv}','CauhoiController@getdanhgiagv');

    Route::get('/chinhsuabc',['as' => 'pages.GiaoVien.chinhsua_bc', 'uses' =>'CauhoiController@chinhsua']);
    Route::get('/danhgiathuctapsv',['as' => 'pages.GiaoVien.danhgiathuctap_sv', 'uses' =>'GiaovienController@danhgiathuctap']);


    Route::get('/listsv',['as' => 'pages.GiaoVien.list_sv', 'uses' =>'GiaovienController@listsv']);

    Route::get('/listtailieu',['as' =>'pages.SinhVien.tailieu', 'uses' =>'SinhVienController@listtailieusv']);

    Route::get('/ketquathuctap/{id}',['as' => 'pages.GiaoVien.ketqua_thuctap', 'uses' =>'GiaovienController@ketquatt']);
    Route::post('/ketquathuctap',['as' => 'pages.GiaoVien.ketqua_thuctap', 'uses' =>'GiaovienController@postketqua']);

    Route::get('/xemquytac/{id}',['as' => 'pages.SinhVien.xemquytac', 'uses' =>'QuytaclamviecController@xemquytac']);


    Route::get('/resetpass',['as' => 'pages.SinhVien.reset_password', 'uses' =>'TaiKhoanController@getreset']);
    Route::post('/resetpass',['as' => 'pages.SinhVien.reset_password', 'uses' =>'TaiKhoanController@postreset']);



    Route::get('/getallbaiviet',['as' =>'pages.Admin.baiviet_all', 'uses' =>'BaivietController@getallbaiviet']);
    Route::get('/chitietbaiviet/{id}',['as' =>'pages.Admin.baiviet_inf', 'uses' =>'AdminController@chitietbaiviet']);
    Route::get('/xoabaiviet/{id}',['as' =>'pages.Admin.baiviet_all', 'uses' =>'AdminController@xoabaiviet']);


    Route::get('/xoacauhoi/{id}',['as' =>'pages.Admin.caihoi_list', 'uses' =>'AdminController@xoacauhoi']);
    Route::get('/updatecauhoi/{id}',['as' =>'Admin.cauhoi_update','uses' =>'AdminController@getupdatech']);
    Route::post('/updatecauhoi/{id}',['as' => 'Admin.cauhoi_update', 'uses' =>'AdminController@postupdatech']);

    Route::get('/updatedotthuctap/{id}',['as' =>'Admin.dotthuctap_update','uses' =>'AdminController@getupdatedtt']);
    Route::post('/updatedotthuctap/{id}',['as' => 'Admin.dotthuctap_update', 'uses' =>'AdminController@postupdatedtt']);

    Route::get('/taotaikhoan',['as' =>'Admin.taikhoan_add','uses' =>'AdminController@getttk']);
    Route::post('/taotaikhoan',['as' => 'Admin.taikhoan_add', 'uses' =>'AdminController@postttk']);
    Route::get('/getalltaikhoan',['as' =>'Admin.taikhoan_list','uses' =>'AdminController@listtk']);

    Route::get('/getallbinhluan',['as' =>'Admin.binhluan_list','uses' =>'AdminController@listbl']);
    Route::get('/chitietbinhluan/{id}',['as' =>'Admin.binhluan_inf','uses' =>'AdminController@infbl']);
    Route::get('/xoabinhluan/{id}',['as' =>'Admin.binhluan_delete','uses' =>'AdminController@deletebl']);


    Route::get('/updatetaikhoanad/{id}',['as' =>'Admin.taikhoan_update','uses' =>'AdminController@getupdatetk']);
    Route::post('/updatetaikhoanad/{id}',['as' => 'Admin.taikhoan_update', 'uses' =>'AdminController@postupdatetk']);
    Route::get('/deletetaikhoanad/{id}',['as' =>'Admin.taikhoan_delete','uses' =>'AdminController@getdeletetk']);


});




