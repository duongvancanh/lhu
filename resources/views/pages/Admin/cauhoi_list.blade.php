@extends('pages.Admin.master_ad')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">


            <h2>Danh Sách Câu Hỏi</h2>

            <div class="thongbao">
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            </div>

            <table class="table table-responsive table-bordered table-stripped table-hover text-center">
                <thead>
                <tr class="text-center">
                    <th class="text-center">ID</th>
                    <th class="text-center">Nội Dung</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>

                </tr>
                </thead>
                <tbody>
                <?php  $stt = 1?>
                @foreach($cauhoi as $ch)
                    <tr align="center">
                        <td> <?php echo $stt;?></td>
                        <td>{!!$ch->cauhoi!!}</td>
                        <?php $stt++;?>
                        <td><a href="/updatecauhoi/{{$ch->id}}" class="btn btn-info"> Sửa</a> </td>
                        <td><a href="/xoacauhoi/{{$ch->id}}"    class="btn btn-danger btn-sm">Xóa</a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop