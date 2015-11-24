@extends('pages.Khoa.master_k')
@section('contentx')
    <h2>Danh Sách Sinh Viên</h2>
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
                    <th class="text-center">Chi Tiết</th>
                    <th class="text-center">Điểm Báo Cáo</th>
                    <th class="text-center">Sửa</th>

                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($sinhvien as $sv)
                    <tr>
                        <td><?php echo $stt;?></td>
                        <td>{{$sv->ten}}</td>
                        <td>{{$sv->email}}</td>
                        <td>{{$sv->sdt}}</td>
                        <td>{{$sv->diachi}}</td>
                        <td>
                            <a href="/sinhvien/{{$sv->id}}">Xem</a>
                        </td>
                        <td>
                            <?php $x = DB::table('danh_gia_ket_quas')->where('id_usersv', $sv->id)->get(); ?>
                            @if($x == null)
                                {{
                                'GV Chưa Đánh Giá'
                                }}
                            @endif
                            @foreach($x as $xx)
                                @if ($xx->ketqua == 0)
                                    {{ "Rớt" }}
                                @else
                                    {{"Đậu"}}
                                @endif
                                <?php echo '</br>'; ?>
                            @endforeach
                        </td>
                        <td><a class="btn btn-info" href="/updatetaikhoan/{{$sv->id}}">Sửa</a> </td>
                        <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop