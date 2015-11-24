@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Danh Sách Sinh Viên</h2>
            <table class="table table-hover">
                <thead>
                <tr class="text-center">
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên Sinh Viên</th>
                    <th class="text-center">Xem</th>
                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($data as $sv)
                    <tr align="center">
                        <td> <?php echo $stt;?></td>
                        <td>{{$sv->ten}}</td>
                        <td class="center"><a href="/gvbaocao/{{$sv->id}}">Chỉnh Sửa</a></td>

                        <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop