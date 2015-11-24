@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>Danh Sách Đánh Giá Công Ty</h2>
            @foreach($congty as $ct)
                <span> Tên Công Ty : {{$ct->ten}}</span>
            @endforeach
            @foreach($data as $dt)
                <?php $nd = $dt->noidung ?>
                <h5>Sinh Viên Đánh Giá :
                    <?php $x = DB::table('tai_khoans')->where('id', $dt->id_user)->get(); ?>
                    @foreach($x as $xx)
                        {{ $xx->ten }}
                    @endforeach
                </h5>
                Thời gian : {{ $dt->created_at }}

                <table class="table table-bordered" style="background: #FFFFFF">
                    <thead>

                    <tr>
                        <td colspan="2">
                            Về hạ tầng CNTT
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Công ty có bao nhiêu máy tính</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[0]}}</textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Hệ thống mạng của công ty được thiết kế như thế nào</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[1]}}</textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Cấu hình của máy tính cá nhân</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[2]}}</textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các phần mềm thông dụng mà máy tính cá nhân được trang bị và được sử dụng</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[3]}}</textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các phần mềm chuyên biệt mà từng bộ phận sử dụng</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[4]}}</textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Máy tính cá nhân của nhân viên có được quản lý hay không, nếu có thì bằng cách
                            nào
                        </td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[5]}}</textarea></td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>

                        <td colspan="2">
                            Về quản lý
                        </td>

                    </tr>
                    <tr>
                        <td> &nbsp; * Mọi người trong công ty thường trao đổi với nhau qua công cụ gì</td>

                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[7]}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các tài liệu được lưu trữ và chuyển tiếp giữa các phòng ban như thế nào</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[8]}}</textarea></td>
                    </tr>
                    <tr>

                        <td> &nbsp; * Các thông báo của lãnh đạo, sếp thì đến với nhân viên như thế nào</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[9]}}</textarea></td>
                    </tr>
                    <tr>

                        <td> &nbsp; * Công ty quản lý các khách hàng, sản phẩm, nhân sự bằng hình thức/phần mềm gì</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[10]}}</textarea></td>
                    </tr>
                    <tr>
                        <td> &nbsp; * Các lưu đồ công việc được thực hiện trong công ty, diễn giải</td>
                        <td><textarea name="danhgia[]" id="" cols="30" rows="2">{{$nd[11]}}</textarea></td>
                    </tr>

                    </thead>

                </table>

            @endforeach

        </div>
    </div>
@stop