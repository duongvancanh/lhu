@extends('pages.SinhVien.master_sv')
@section('contentx')
    <div class="panel panel-default">
    	<div class="panel-body">
    <h2>Tài Liệu Khoa</h2>
    @foreach($dinhkem as $dk)
    <table class="table table-bordered" style="background: #FFFFFF">
        <thead>
            <tr >
                <td> <b>Tác Giả </b> </td>
                <td>
                    <?php $x =  DB::table('bai_viets')->where('id',$dk->id_baiviet)->get(); ?>
                    @foreach($x as $xx)
                        <?php $a =  DB::table('tai_khoans')->where('id',$xx->id_user)->get(); ?>
                        @foreach($a as $aa)
                            {{ $aa->ten }}
                            <?php echo '</br>'; ?>
                        @endforeach
                        @endforeach
                </td>
            </tr>
            <tr>
                <td> <b>Tài Liệu  </b> </td>
                <td>
                    <a href="/attachment/{{$dk->id_baiviet}}-{{$dk->link}}">{{$dk->link}}</a>
                </td>
            </tr>
            <tr>
                <td> <b>Ngày Tạo </b> </td>
                <td>
                    <b> {{$dk->created_at}}</b>
                </td>
            </tr>
        </thead>
    </table>
    @endforeach
    <?php echo '</br>' ?>
        </div>
    </div>
@stop