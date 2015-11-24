@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thêm Giáo Viên</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('pages.Khoa.taikhoan_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên Đăng Nhập</label>
                    <input class="form-control" name="txtmssv" placeholder="Nhập MSSV"/>
                </div>
                <div class="form-group">
                    <label>Tên</label>
                    <input class="form-control" name="txtten" placeholder="Nhập Tên"/>
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
                    <input class="form-control" name="txtdiachi" placeholder="Nhập Tên"/>
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input class="form-control" name="txtsdt" placeholder="Nhập Số Điện Thoại"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="txtemail" placeholder="Nhập Email"/>
                </div>
                <button type="submit" class="btn btn-info">Thêm Giáo Viên</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
@stop