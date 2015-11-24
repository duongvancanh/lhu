@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thông Tin Nhóm </h2>

            <div class="panel panel-default">
                <div class="panel-body">

                    <table class="table table-responsive table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr align="center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên Nhóm</th>
                            <th class="text-center">Đợt Thực Tập</th>
                            <th class="text-center" style="width:40%">Thành Viên</th>
                            <th class="text-center" >Đánh Giá</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php  $stt = 1?>
                        @foreach($phutrach as $pt)
                            <tr align="center">
                                <td> <?php echo $stt;?></td>
                                <td>{{$pt->tennhom}}</td>
                                <td>
                                    <?php $x = DB::table('dot_thuc_taps')->where('id', $pt->id_dotthuctap)->get(); ?>
                                    @foreach($x as $xx)
                                        {{ $xx->tendotthuctap}}
                                        <?php echo '</br>'; ?>
                                    @endforeach
                                </td>
                                <td>
                                    <?php $x = DB::table('chi_tiet_nhoms')->where('id_nhom', $pt->id)->get(); ?>
                                    @foreach($x as $xx)
                                        <?php $aa = DB::table('tai_khoans')->where('id', $xx->id_user)->get(); ?>
                                        @foreach($aa as $a)
                                                <a href="/thongtinsv/{{$a->id}}">{{$a->ten}}</a>
                                        @endforeach
                                        <?php echo '</br>'; ?>
                                    @endforeach
                                </td>
                                <td>
                                    <?php $x = DB::table('chi_tiet_nhoms')->where('id_nhom', $pt->id)->get(); ?>
                                    @foreach($x as $xx)
                                        <?php $aa = DB::table('tai_khoans')->where('id', $xx->id_user)->get(); ?>
                                        @foreach($aa as $a)
                                            <a href="/ketquathuctap/{{$a->id}}">Đánh Giá</a>
                                        @endforeach
                                        <?php echo '</br>'; ?>
                                    @endforeach
                                </td>




                                <?php $stt++;?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop