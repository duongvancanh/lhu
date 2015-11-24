@extends('pages.Admin.master_ad')
@section('contentx')

    <table class="table table-responsive table-bordered table-stripped table-hover text-center">
        <thead>
        @foreach($binhluan as $bl)
            <tr >
                <td> <b>Người Viết</b> </td>
                <td class="text-left">
                    <?php $x =  DB::table('tai_khoans')->where('id',$bl->id_user)->get(); ?>
                    @foreach($x as $xx)
                        {{ $xx->ten }}
                        <?php echo '</br>'; ?>
                    @endforeach

                </td>
            </tr>
            <tr>
                <td> <b>Nội Dung</b> </td>
                <td class="text-left"> {{$bl->noidung}}</td>
            </tr>

        </thead>
        @endforeach
    </table>
    <a href="/getallbinhluan"  role="button" class="btn btn-info">Quay Lại</a>
@stop