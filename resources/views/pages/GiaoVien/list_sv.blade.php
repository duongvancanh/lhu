@extends('pages.GiaoVien.master_gv')
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
                    <th class="text-center">Tên Sinh Viên</th>
                    <th class="text-center">Đánh Giá</th>
                    <th class="text-center">Góp Ý</th>
                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($dssv as $sv)
                    <tr align="center">
                        <td> <?php echo $stt;?></td>
                        <td>
                            <?php $x = DB::table('tai_khoans')->where('id', $sv)->get(); ?>
                            @foreach($x as $xx)
                                {{ $xx->ten }}
                                <?php echo '</br>'; ?>
                            @endforeach
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Đánh Giá</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="/gvbaocao/{{$sv}}">Góp Ý</a></td>
                        <?php $stt++;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop