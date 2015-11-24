@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thông Tin Giáo Viên</h2>
            <table class="table table-bordered" style="background: #FFFFFF">
                <thead>
                @foreach($data as $da)
                    <tr>
                        <td><b>Tên Giáo Viên </b></td>
                        <td>{{$da->ten}} </td>
                    </tr>
                    <tr>
                        <td><b> SĐT</b></td>
                        <td> 09900909</td>
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
                        <td><b>Nhóm Phụ Trách </b></td>
                        <td>
                            <?php $x = DB::table('nhoms')->where('id_user', $da->id)->get(); ?>
                            @foreach($x as $xx)
                                {{ $xx->tennhom }}
                                <?php echo '</br>'; ?>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td><b>Quy Tắc LV </b></td>
                        <td>
                            <?php $x = DB::table('quy_tac_giao_viens')->where('id_user', $da->id)->get(); ?>
                            @foreach($x as $xx)
                                {!! $xx->noidung !!}
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