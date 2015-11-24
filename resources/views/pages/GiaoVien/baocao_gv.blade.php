@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>Báo Cáo</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    @if($traloi <> null)
                        <form action="/gvbaocao" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <table class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr align="center">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nội Dung Câu Hỏi</th>
                                    <th class="text-center">SV Báo Cáo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $stt = 1?>
                                <input type="hidden" name="idsv" value="{{$idsv}}"/>

                                @foreach($traloi as $tl)
                                    <tr align="center">
                                        <td> <?php echo $stt;?></td>
                                        <td>{!!$tl->cauhoi!!}
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3"
                                                          name="gopy[]">{{$tl->gopy}}</textarea>
                                            </div>
                                        </td>
                                        <td> {!!$tl->traloi!!}</td>
                                        <?php $stt++;?>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-info">Hoàn Thành</button>
                        </form>
                    @else
                        Sinh Viên Chưa Làm Báo Cáo
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop