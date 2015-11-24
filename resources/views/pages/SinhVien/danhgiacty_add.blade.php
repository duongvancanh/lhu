@extends('pages.SinhVien.master_sv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Đánh Giá Công Ty</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('pages.SinhVien.danhgiacty_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Chọn Công Ty</label>
                    <select class="form-control" name="slcongty">
                        <option value="">Chọn Công Ty</option>
                        @foreach($congty as $ct)
                            <option value="{{$ct->id}}">{{$ct->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-bordered" style="background: #FFFFFF">
                    <thead>
                    <tr>
                        <td colspan="2">
                            Về hạ tầng CNTT
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Công ty có bao nhiêu máy tính</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Hệ thống mạng của công ty được thiết kế như thế nào</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Cấu hình của máy tính cá nhân</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các phần mềm thông dụng mà máy tính cá nhân được trang bị và được sử dụng</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các phần mềm chuyên biệt mà từng bộ phận sử dụng</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Máy tính cá nhân của nhân viên có được quản lý hay không, nếu có thì bằng cách
                            nào
                        </td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Cần chuẩn bị những kiến thức nào để có thể thích ứng hòa nhập nhanh với các công
                            việc trong môi trường đó
                        </td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Về quản lý
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Mọi người trong công ty thường trao đổi với nhau qua công cụ gì</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các tài liệu được lưu trữ và chuyển tiếp giữa các phòng ban như thế nào</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các thông báo của lãnh đạo, sếp thì đến với nhân viên như thế nào</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Công ty quản lý các khách hàng, sản phẩm, nhân sự bằng hình thức/phần mềm gì</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các lưu đồ công việc được thực hiện trong công ty, diễn giải</td>
                        <td><textarea required name="danhgia[]" id="" cols="30" rows="2"></textarea></td>
                    </tr>
                    </thead>
                </table>
                <button type="submit" class="btn btn-info">Tạo Đánh Giá</button>
                <form>
        </div>
    </div>
@stop