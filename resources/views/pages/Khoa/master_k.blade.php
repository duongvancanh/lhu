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
                            <div class="panel-heading text-center"><b>Thông Tin</b></div>
                            <div class="panel-body">
                                <div class="col-xs-2 col-md-2">
                                    <a href="#">
                                        <img src="/img/avatar/{{$id}}.jpg" alt="a" width="40px" height="40px"/>
                                    </a>
                                </div>
                                <div class="col-xs-10 col-md-10" style="padding-top: 10px">
                                    <a href="/resetpass"><b>{{$ten}}</b></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Nhóm Trong Khoa--}}

                    {{--<div class="nhom">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading text-center"><b>Nhóm Trong Khoa</b></div>--}}
                            {{--<div class="panel-body">--}}
                                {{--@foreach($nhomarr as $nhom)--}}
                                    {{--<div class="col-md-12 ungdung" style="padding: 5px">--}}
                                        {{--<a href="/nhom/{{$nhom->id}}" style="text-decoration: none"><i--}}
                                                    {{--class="glyphicon glyphicon-home"></i> <b>--}}
                                                {{--&nbsp;{{$nhom->tennhom}}</b></a>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <?php $x = DB::table('dot_thuc_taps')->get(); ?>
                    <div class="nhom">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Nhóm Trong Khoa</b></div>
                            <div class="panel-body">
                                @for($i = 1; $i<count($x); $i++ )
                                    <div class="accordion" id="accordion{{$i}}">

                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse"
                                                   data-parent="#accordion{{$i}}"
                                                   href="#collapse{{$i}}">
                                                   <b class="glyphicon glyphicon-plus"> Đợt {{$i}}</b>
                                                </a>
                                            </div>
                                            <div id="collapse{{$i}}" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                    @foreach($nhomarr as $nhom)
                                                        @if($nhom->dotthuctap == $i)
                                                            <div class="col-md-12 ungdung" style="padding: 5px">
                                                                <a href="/nhom/{{$nhom->id}}"
                                                                   style="text-decoration: none"><i
                                                                            class="glyphicon glyphicon-home"></i> <b>
                                                                        &nbsp;{{$nhom->tennhom}}</b></a>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>

                    <div class="menu">

                        <div class="panel panel-default">
                            <div class="panel-heading text-center"><b>Chức Năng</b></div>
                            <div class="panel-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/themexel" title="" style="text-decoration: none"><i
                                                class="glyphicon glyphicon-pencil"></i> <b>Thêm Sinh Viên (File
                                            Excel)</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/taosv" title="" style="text-decoration: none"><i
                                                class="glyphicon glyphicon-pencil"></i> <b>Thêm Giáo Viên (Form)</b>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/taonhom" title="" style="text-decoration: none"><i
                                                class="glyphicon glyphicon-pencil"></i> <b>Tạo Nhóm</b> </a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/taocty" title="" style="text-decoration: none"> <i
                                                class="glyphicon glyphicon-pencil"></i> <b> Tạo Công Ty</b></a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/dsnhom" title="" style="text-decoration: none"><i
                                                class="glyphicon glyphicon-folder-open"></i> <b> Danh Sách Nhóm</b> </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/dscongty" title="" style="text-decoration: none"> <i
                                                class="glyphicon glyphicon-folder-open"></i><b> Danh Sách Công
                                            Ty </b></a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/dsgiaovien" title="" style="text-decoration: none"> <i
                                                class="glyphicon glyphicon-folder-open"></i> <b> Danh Sách Giảng
                                            Viên</b></a>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/dssinhvien" title="" style="text-decoration: none"> <i
                                                class="glyphicon glyphicon-folder-open"></i> <b> Danh Sách Sinh Viên</b>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ungdung" style="padding: 5px">
                                    <a href="/tiendolv" title="" style="text-decoration: none"> <i
                                                class="glyphicon glyphicon-zoom-in"></i> <b> Xem Tiến Độ Làm Việc</b>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <div class="col-md-9 col-lg-9">

                @yield('contentx')

            </div>


        </div>

    </div>

@endsection