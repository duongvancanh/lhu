@extends('pages.master')
@section('title')
    Me
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    {{--Thông Tin User--}}
                    <div class="thongtinuser">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Thông Tin</b></div>
                            <div class="panel-body">
                                <div class="col-xs-2 col-md-2">
                                    <a href="#" >
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
                            <div class="panel-heading"><b>Thông Báo</b></div>
                            <div class="panel-body">
                                <ul class="nav nav-list">
                                    <li class="nav-header"><b>Thông Báo Của Khoa</b></li>
                                    <li><a href="/khoa" style="text-decoration: none"> <i class="glyphicon glyphicon-globe" ></i> <b>Khoa {{$tenkhoa}}</b></a></li>
                                </ul>

                            </div>
                        </div>

                    </div>

                    {{--Thông Báo Khoa--}}
                    <div class="khoa">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading"><b>Nhóm Phụ Trách</b></div>
                            <div class="panel-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    @foreach($nhomarr as $nhom)
                                        <div class="col-md-12 ungdung">
                                            <a href="/nhom/{{$nhom->id}}" style="text-decoration: none">  <i class="glyphicon glyphicon-home" ></i> <b> {{$nhom->tennhom}}</b></a>
                                         <br/>   <a href="/nhomphutrach/{{$nhom->id}}">Thông Tin Nhóm </a>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="menu">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Chức Năng</b></div>
                            <div class="panel-body">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/taoquytac"  title="" style="text-decoration: none"><i class="glyphicon glyphicon-pencil"></i> <b>Tạo Quy Tắc LV</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/taosukien"  title="" style="text-decoration: none"> <i class="glyphicon glyphicon-pencil"></i> <b>Tạo Sự Kiện</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/chinhsuabc"  title="" style="text-decoration: none"> <i class="glyphicon glyphicon-pencil"></i> <b>Chỉnh Báo Cáo</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/danhgiathuctapsv"  title="" style="text-decoration: none"> <i class="glyphicon glyphicon-pencil"></i> <b>Đánh Giá Thực Tập</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung"style="padding: 5px">
                                    <a href="/tiendolv" title=""style="text-decoration: none"> <i  class="glyphicon glyphicon-zoom-in" ></i> <b>  Xem Tiến Độ Làm Việc</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/dssukien"  title=""style="text-decoration: none"><i class="glyphicon glyphicon-folder-open"></i> <b>  Danh Sách Sự Kiện</b> </a>
                                </div>

                            </div>
                        </div>

                    </div>


                    </div>
            </div>
            <div class="col-md-9">

                @yield('contentx')

            </div>



            </div>


        </div>
    </div>
@endsection