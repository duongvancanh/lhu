@extends('pages.Admin.master_ad')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Sửa Thông Tin Đợt Thực Tập</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/updatedotthuctap/{{$dotthuctap['id']}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên Đợt Thực Tập</label>
                    <input class="form-control" name="txttendotthuctap" placeholder="Nhập Tên Đợt Thực Tập" value="{{$dotthuctap['tendotthuctap']}}"/>
                </div>
                <div class="form-group">
                    <label>Ngày Bắt Đầu </label>
                    <input type="date" class="form-control" name="txtngaybatdau" placeholder="Nhập Ngày Bắt Đầu" value="{{$dotthuctap['ngaybatdau']}}"/>
                </div>
                <div class="form-group">
                    <label>Ngày Kết Thúc</label>
                    <input type="date" class="form-control" name="txtngayketthuc" placeholder="Nhập Ngày Kết Thúc" value="{{$dotthuctap['ngayketthuc']}}"/>
                </div>
                <button type="submit" class="btn btn-info">Sửa Đợt Thực Tập</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
@stop