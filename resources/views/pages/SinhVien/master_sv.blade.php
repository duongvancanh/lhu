@extends('pages.master')
@section('title')
    Me
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="row">
                    {{--Thông Tin User--}}
                    <div class="thongtinuser">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Thông Tin </b></div>
                            <div class="panel-body">
                                <div class="col-xs-2 col-md-2">
                                    <a href="#">
                                        <img src="/img/avatar/{{$id}}.jpg" alt="a" width="40px" height="40px"/>
                                    </a>
                                </div>
                                <div class="col-xs-10 col-md-10" style="padding-top: 10px">
                                    <a href="/resetpass"> <b>{{$ten}}</b></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Thông Báo Khoa--}}
                    <div class="khoa">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading text-center"><b>Thông Báo Của Khoa </b></div>
                            <div class="panel-body">

                                <div class="col-md-12 ungdung">
                                    <a href="/khoa" style="text-decoration: none"> <i  class="glyphicon glyphicon-globe"></i> <b>Khoa {{$tenkhoa}}</b></a>
                                </div>



                            </div>
                        </div>

                    </div>

                    {{--Nhóm Của Tôi--}}
                    <div class="nhom">

                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Thành Viên Nhóm </b></div>
                            <div class="panel-body">
                                @foreach($nhomarr as $nhom)

                                    <div class="col-md-12 ungdung text-center">
                                        <a href="/nhom/{{$nhom->id}}"
                                           style="text-decoration: none"> <i class="glyphicon glyphicon-home"></i> <b> {{$nhom->tennhom}}</b></a>
                                       </br> <a href="/xemquytac/{{$nhom->id_user}}">Quy Tắc Làm Việc</a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    {{--Menu--}}
                    <div class="menu">

                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Chức Năng</b></div>
                            <div class="panel-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/xemsukien"title=""style="text-decoration: none"> <i  class="glyphicon glyphicon-folder-open" ></i> <b>  Danh Sách Sự Kiện</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/danhgiacty"  title=""
                                       style="text-decoration: none"><i class="glyphicon glyphicon-pencil"></i> <b> Tạo Đánh Giá CTY</b> </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/svbaocao"  title=""
                                       style="text-decoration: none"> <i class="glyphicon glyphicon-pencil"></i> <b>Làm Báo Cáo</b> </a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="menu">

                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Tài Liệu</b></div>
                            <div class="panel-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/listtailieu"title=""style="text-decoration: none"> <i  class="glyphicon glyphicon-folder-open" ></i> <b> Tài Liệu Của Khoa</b> </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{--Lịch Làm Việc--}}



                </div>
            </div>

            <div class="col-md-9 col-lg-9">

                @yield('contentx')

            </div>

        </div>
@stop