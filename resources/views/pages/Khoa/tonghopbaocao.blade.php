@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Tổng Hợp Báo Cáo</h2>
            <table class="table table-responsive table-bordered table-stripped table-hover text-center">
                <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Sinh Viên</th>
                    <th class="text-center"> Báo Cáo</th>
                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($baocao as $bc)
                    <tr>
                        <td> <?php echo $stt;?></td>
                        <td>
                            <?php $x = DB::table('bai_viets')->where('id', $bc->id_baiviet)->get(); ?>
                            @foreach($x as $xx)
                                <?php $a = DB::table('tai_khoans')->where('id', $xx->id_user)->get(); ?>
                                @foreach($a as $aa)
                                    {{ $aa->ten}}
                                @endforeach
                            @endforeach
                        </td>
                        <td>
                            <a href="/attachment/{{$bc->id_baiviet}}-{{$bc->link}}">{{$bc->link}}</a>
                        </td>
                    </tr>
                    <?php $stt++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop