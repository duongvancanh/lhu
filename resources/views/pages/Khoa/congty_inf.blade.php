@extends('pages.Khoa.master_k')
@section('contentx')

    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thông Tin Công Ty</h2>
            <table class="table table-bordered" style="background: #FFFFFF">
                <thead>
                @foreach($data as $da)
                    <tr>
                        <td><b>Tên Công Ty </b></td>
                        <td>{{$da->ten}} </td>
                    </tr>
                    <tr>
                        <td><b>Địa Chỉ </b></td>
                        <td> {{$da->diachi}}</td>
                    </tr>
                    <tr>
                        <td><b>Email </b></td>
                        <td> {{$da->email}} </td>
                    </tr>
                    <tr>
                        <td><b>Số Điện Thoại </b></td>
                        <td> {{$da->sdt}} </td>
                    </tr>
                    <tr>
                        <td><b>Thông Tin </b></td>
                        <td> {!! $da->loai !!}</td>
                    </tr>
                    <tr>
                        <td><b>Sinh Viên Đang Thực Tập </b></td>
                        <td>
                                <?php $x = DB::table('tai_khoans')->where('id_congty', $da->id)->get(); ?>
                                @foreach($x as $xx)
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                     Xem Đánh Giá Của :   <a href="/danhgiasvcty/{{$da->id}}/{{$xx->id}}"> {{ $xx->ten }}  </a>
                                    </div>

                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <a href="/xoasvcty/{{$da->id}}/{{$xx->id}}" class="btn btn-danger">Xóa</a>
                                    </div>
                                    <?php echo '</br>'; ?>
                                @endforeach

                        </td>

                    </tr>
                    <tr>
                        <td><b>Bổ Sung Sinh Viên Thực Tập</b></td>
                        <td>

                            <form action="{{route('pages.Khoa.congty_inf')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div class="form-group">
                                            <input type="hidden" name="idcty" value="{{$da->id}}"/>
                                            <select class="form-control" name="slsv">
                                                <option value="">Chọn Sinh Viên</option>
                                                @foreach($taikhoan as $tk)
                                                    <option value="{{$tk->id}}">{{$tk->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <button type="submit" class="btn btn-info">Thêm</button>
                                    </div>
                                </div>
                            </form>


                        </td>

                    </tr>
                </thead>
                @endforeach
            </table>

        </div>
    </div>
@stop