@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>Danh Sách Sự Kiện </h2>
            <?php $tong = count($data)?>
            <h5>Tổng Sổ Lần Gặp Mặt : {{$tong}}</h5>
            @foreach($data as $da)

                <table class="table table-bordered" style="background: #FFFFFF">
                    <thead>
                    <tr>
                        <td style="width: 30%"><b>Thời Gian </b></td>
                        <td>{{$da->thoigian}} </td>
                    </tr>
                    <tr>
                        <td style="width: 30%"><b> Địa Điểm</b></td>
                        <td> {{$da->diadiem}}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%"><b>Nội Dung </b></td>
                        <td> {!!$da->noidung!!}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%"><b>User Tham Gia </b></td>
                        <td>
                            <?php $x = DB::table('chi_tiet_su_kiens')->where('id_sukien', $da->id)->get(); ?>

                            <form action="/xacnhan" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                @foreach($x as $xx)

                                    <?php $a = DB::table('tai_khoans')->where('id', $xx->id_user)->get(); ?>
                                    @foreach($a as $aa)
                                        {{ $aa->ten }}
                                    @endforeach

                                    <input type="hidden" name="idsk" value="{{$da->id}}"/>
                                    <input type="hidden" name="iduser" value="{{$xx->id_user}}"/>
                                    <?php $x = DB::table('chi_tiet_su_kiens')->where('id_sukien', $da->id)->get(); ?>
                                    @if($xx->gv_xacnhan == 0)
                                        <input class='xacnhan' type="checkbox" idsukien="{{$da->id}}"
                                               iduser="{{$xx->id_user}}"/>
                                    @else
                                        <input class='xacnhan' checked disabled type="checkbox" idsukien="{{$da->id}}"/>
                                    @endif
                                    <?php echo '</br>'; ?>
                                @endforeach
                            </form>
                        </td>
                    </tr>
                    </thead>
                </table>
                </br>
            @endforeach
        </div>
    </div>
@stop