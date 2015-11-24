@extends('pages.SinhVien.master_sv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Danh Sách Đánh Giá</h2>
            <div class="thongbao">
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            </div>
            @foreach($danhgia as $dg)
                <table class="table table-bordered" style="background: #FFFFFF">
                    <thead>
                    <tr>
                        <td><b>Công Ty</b></td>
                        <td>
                            <?php $x = DB::table('cong_ties')->where('id', $dg->id_congty)->get(); ?>
                            @foreach($x as $xx)
                                {{ $xx->ten }}
                                <?php echo '</br>'; ?>
                        @endforeach
                    </tr>
                    <tr>
                        <td><b>Nội Dung </b></td>
                        <td>{!!$dg->noidung!!}</td>
                    </tr>
                    </thead>
                </table>
                </br>
            @endforeach
        </div>
    </div>
@stop