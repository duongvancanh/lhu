@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thông Tin Sinh Viên</h2>
            <table class="table table-bordered" style="background: #FFFFFF">
                <thead>
                @foreach($data as $da)
                    <tr>
                        <td><b>Tên Sinh Viên </b></td>
                        <td>{{$da->ten}} </td>
                    </tr>
                    <tr>
                        <td><b> SĐT</b></td>
                        <td> {{$da->sdt}}</td>
                    </tr>
                    <tr>
                        <td><b>Email </b></td>
                        <td> {{$da->email}} </td>
                    </tr>
                    <tr>
                        <td><b>Địa Chỉ </b></td>
                        <td> {{$da->diachi}} </td>
                    </tr>
                    <tr>
                        <td><b>Đang Thực Tập Tại </b></td>
                        <td>
                            <?php $x = DB::table('cong_ties')->where('id', $da->id_congty)->get(); ?>
                            @foreach($x as $xx)
                                <a href="/congty/{{$da->id_congty}}">{{ $xx->ten}}</a>
                                <?php echo '</br>'; ?>
                            @endforeach
                        </td>
                    </tr>
                </thead>
                @endforeach
            </table>
        </div>
    </div>
@stop