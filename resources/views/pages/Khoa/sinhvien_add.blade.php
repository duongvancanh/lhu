@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thêm Sinh Viên</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>MSSV</label>
                    <input class="form-control" name="txtmssv" placeholder="MSSV Sinh Viên"/>
                </div>
                <div class="form-group">
                    <label>Tên Sinh Viên </label>
                    <input class="form-control" name="txttensv" placeholder="Tên Sinh Viên"/>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh</label>
                    <input class="form-control" name="txtngaysinh" placeholder="Ngày Sinh"/>
                </div>
                <div class="form-group">
                    <label>Giới Tính</label>
                    <select class="form-control" name="slgioitinh">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input class="form-control" name="txtdiachi" placeholder="Địa Chỉ"/>
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input class="form-control" name="txtsdt" placeholder="Số Điện Thoại"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="txtemail" placeholder="Email"/>
                </div>
                <button type="submit" class="btn btn-default">Tạo SV</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>

        </div>
    </div>
@stop