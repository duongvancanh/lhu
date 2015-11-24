@extends('pages.Admin.master_ad')
@section('contentx')

    <table class="table table-responsive table-bordered table-stripped table-hover text-center">
        <thead>
        @foreach($baiviet as $bv)
            <tr >
                <td> <b>Người Viết</b> </td>
                <td class="text-left">
                    <?php $x =  DB::table('tai_khoans')->where('id',$bv->id_user)->get(); ?>
                    @foreach($x as $xx)
                        {{ $xx->ten }}
                        <?php echo '</br>'; ?>
                    @endforeach

                </td>
            </tr>
            <tr>
                <td> <b>Nội Dung</b> </td>
                <td class="text-left"> {{$bv->noidung}}</td>
            </tr>
            <tr>
                <td> <b>Đính Kèm</b></td>
                <td class="text-left">
                    <?php $x =  DB::table('dinh_kems')->where('id_baiviet',$bv->id)->get(); ?>
                    @foreach($x as $xx)
                        {{ $xx->link }}
                        <?php echo '</br>'; ?>
                    @endforeach


                </td>
            </tr>
            <tr >
                <td> <b>Gán</b></td>
                <td class="text-left">
                    <?php $x =  DB::table('tags')->where('id_baiviet',$bv->id)->get(); ?>
                    @foreach($x as $xx)
                            <?php $a =  DB::table('tai_khoans')->where('id',$xx->id_user)->get(); ?>
                            @foreach($a as $aa){{ $aa->ten}}
                            @endforeach
                        <?php echo '</br>'; ?>
                    @endforeach

                </td>
            </tr>


        </thead>
        @endforeach
    </table>
    <a href="/getallbaiviet"  role="button" class="btn btn-info">Quay Lại</a>
@stop