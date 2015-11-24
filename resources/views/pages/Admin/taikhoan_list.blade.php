@extends('pages.Admin.master_ad')
@section('contentx')
    <h2>Danh Sách Tài Khoản</h2>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table  table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">SĐT</th>
                    <th class="text-center">Địa Chỉ</th>
                    <th class="text-center">Kiểu</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($taikhoan as $tk)
                    <tr>
                        <td><?php echo $stt;?></td>
                        <td>{{$tk->ten}}</td>
                        <td>{{$tk->email}}</td>
                        <td>{{$tk->sdt}}</td>
                        <td>{{$tk->diachi}}</td>
                        <td>
                            @if($tk->kieu == 1)
                                {{"Admin"}}
                                @elseif($tk->kieu ==2)
                            {{"Khoa"}}
                            @elseif($tk->kieu ==3)
                                {{"Giáo Viên"}}
                            @else
                            {{"Sinh Viên"}}
                            @endif
                        </td>

                        <td><a class="btn btn-info" href="/updatetaikhoanad/{{$tk->id}}">Sửa</a> </td>
                        <td><a class="btn btn-danger" href="/deletetaikhoanad/{{$tk->id}}">Xóa</a> </td>

                    <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    {!! $taikhoan ->render()!!}
                </div>
            </div>

        </div>
    </div>
@stop