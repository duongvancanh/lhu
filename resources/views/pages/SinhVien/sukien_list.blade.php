@extends('pages.SinhVien.master_sv')
@section('contentx')
    <div class="panel panel-default">
    	<div class="panel-body">

    <h2>Thông Tin Sự Kiện Của Sinh Viên</h2>
    <div class="thongbao">
        @if(Session::has('flash_message'))
            <div class="alert alert-{{Session::get('flash_level')}}">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    </div>
    @foreach($data as $da)
        <table class="table table-bordered" style="background: #FFFFFF">
            <thead>
            <tr >
                <td> <b>Giáo Viên </b> </td>
                <td>
                    <?php $x =  DB::table('tai_khoans')->where('id',$da->id_user)->get(); ?>
                    @foreach($x as $xx)
                        {{ $xx->ten }}
                        <?php echo '</br>'; ?>
                    @endforeach
            </tr>
            <tr >
                <td> <b>Thời Gian </b> </td>
                <td>{{$da->thoigian}} </td>
            </tr>
            <tr >
                <td> <b>Địa Điểm </b> </td>
                <td>{{$da->diadiem}} </td>
            </tr>
            <tr >
                <td> <b>Nội Dung</b> </td>
                <td>{!!$da->noidung!!} </td>
            </tr>
            </thead>
        </table>
        </br>
    @endforeach

        </div>
    </div>
@stop