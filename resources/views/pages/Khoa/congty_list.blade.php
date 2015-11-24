@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Danh Sách Công Ty</h2>
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
                    <th class="text-center">Tên Công Ty</th>
                    <th class="text-center">Địa Chỉ</th>
                    <th class="text-center">Số Điện Thoại</th>
                    <th class="text-center">Đánh Giá</th>
                    <th class="text-center">Xem</th>
                    <th class="text-center">Sửa</th>

                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($congty as $ct)
                    <tr align="center">
                        <td> <?php echo $stt;?></td>
                        <td>{{$ct->ten}}</td>
                        <td>{{$ct->diachi}}</td>
                        <td>{{$ct->sdt}}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="/danhgiacongty/{{$ct->id}}">Xem</a></td>
                        <td class="center"> <a href="/congty/{{$ct->id}}">Chi Tiết</a>
                        </td>
                        <td > <a class="btn btn-info" href="/updatecty/{{$ct->id}}"> Sửa  </a></td>

                        <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop