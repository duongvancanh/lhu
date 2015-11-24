@extends('pages.Admin.master_ad')
@section('contentx')

    <table class="table table-responsive table-bordered table-stripped table-hover text-center">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Người Viết</th>
            <th class="text-center"> Ngày Viết</th>
            <th class="text-center">Xem</th>
            <th class="text-center">Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php  $stt = 1?>
        @foreach($baiviet as $bv)
        <tr>
            <td> <?php echo $stt;?></td>
            <td>
                <?php $x =  DB::table('tai_khoans')->where('id',$bv->id_user)->get(); ?>
                @foreach($x as $xx)
                    {{ $xx->ten }}
                    <?php echo '</br>'; ?>
                @endforeach
            </td>
            <td> {{$bv->created_at}}</td>

            <td><a href="/chitietbaiviet/{{$bv->id}}" target="_blank" class="btn btn-primary btn-sm">Xem</a></td>
            <td><a href="/xoabaiviet/{{$bv->id}}"    class="btn btn-danger btn-sm">Xóa</a></td>
        </tr>
            <?php $stt++; ?>
            @endforeach
        </tbody>
    </table>

@stop