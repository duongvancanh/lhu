@extends('pages.Admin.master_ad')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Danh Sách Đợt Thực Tập</h2>

            <div class="thongbao">
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            </div>
            <table class="table table-hover">
                <thead>
                <tr class="text-center">
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên Đợt Thực Tập</th>
                    <th class="text-center">Ngày Bắt Đầu</th>
                    <th class="text-center">Ngày Kết Thúc</th>
                    <th class="text-center">Sửa</th>
                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($dotthuctap as $dtt)
                    <tr align="center">
                        <td> <?php echo $stt;?></td>
                        <td>{{$dtt->tendotthuctap}}</td>
                        <td>{{$dtt->ngaybatdau}}</td>
                        <td>{{$dtt->ngayketthuc}}</td>
                        <td><a href="/updatedotthuctap/{{$dtt->id}}" class="btn btn-info">Sửa</a></td>
                        <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop