@extends('pages.master')
@section('title')
    Me
@stop
@section('content')

    <div class="container-fluid">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">QUẢN LÝ CHUNG</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-list">
                        <li class="nav-header"><i><b>Tài Khoản</b></i></li>
                        <li><a href="/getalltaikhoan">Danh sách tài khoản</a></li>
                        <li><a href="/taotaikhoan">Thêm tài khoản</a></li>

                        <li class="nav-header"><i><b>Bài Viết</b></i></li>
                        <li><a href="/getallbaiviet">Danh sách bài viết</a></li>

                        <li class="nav-header"><i><b>Bình Luận</b></i></li>
                        <li><a href="/getallbinhluan">Danh sách bình luận</a></li>


                        <li class="nav-header"><i><b>Đợt Thực Tập</b></i></li>
                        <li><a href="/taodtt">Tạo Đợt Thực Tập</a></li>
                        <li><a href="/dsdotthuctap">Danh Sách Đợt Thực Tập</a></li>

                        <li class="nav-header"><i><b>Câu Hỏi Báo Cáo</b></i></li>
                        <li><a href="/taocauhoi">Tạo Câu Hỏi</a></li>
                        <li><a href="/dscauhoi">Danh Sách Câu Hỏi</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    @yield('contentx')

                </div>
            </div>
        </div>
    </div>

@endsection