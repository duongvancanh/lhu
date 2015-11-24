@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Chỉnh Sửa Thông Tin Tài Khoản</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/updatetaikhoan/{{$taikhoan['id']}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên</label>
                    <input class="form-control" name="txtten" placeholder="Nhập Tên" value="{{$taikhoan['ten']}}"/>
                </div>
                <div class="form-group">
                    <label>Giới Tính</label>
                    <select class="form-control" name="slgioitinh">
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input class="form-control" name="txtdiachi" placeholder="Nhập Tên" value="{{$taikhoan['diachi']}}"/>
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input class="form-control" name="txtsdt" placeholder="Nhập Số Điện Thoại" value="{{$taikhoan['sdt']}}"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="txtemail" placeholder="Nhập Email" value="{{$taikhoan['email']}}"/>
                </div>
                <button type="submit" class="btn btn-info">Sửa Tài Khoản</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
@stop