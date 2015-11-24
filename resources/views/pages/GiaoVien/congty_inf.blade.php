@extends('pages.GiaoVien.master_gv')
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

                </thead>
                @endforeach
            </table>

        </div>
    </div>
@stop