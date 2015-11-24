@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">


            <h2>Danh Sách Giáo Viên</h2>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th style="width: 15%">SĐT</th>
                    <th>Địa Chỉ</th>
                    <th>Chi Tiết</th>
                    <th>Sửa</th>

                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($giangvien as $gv)

                    <tr class="odd gradeX" align="center">
                        <td><?php echo $stt;?></td>
                        <td>{{$gv->ten}}</td>
                        <td>{{$gv->email}}</td>
                        <td>{{$gv->sdt}}</td>
                        <th>
                            {{$gv->diachi}}
                        </th>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="/giaovien/{{$gv->id}}">Xem</a>
                        </td>
                        <td><a  class="btn btn-info" href="/updatetaikhoan/{{$gv->id}}">Sửa</a> </td>

                        <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop