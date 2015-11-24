@extends('pages.SinhVien.master_sv')
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
                    <form action="{{route('pages.SinhVien.baocao_sv')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <table class="table table table-responsive table-bordered table-stripped table-hover text-center">
                            <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Nội Dung Câu Hỏi</th>
                                <th class="text-center">GV Góp Ý</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $stt = 1?>
                            @foreach($cauhoi as $ch)
                                <tr align="center">
                                    <td> <?php echo $stt;?></td>
                                    <td class="text-left">{!!$ch->cauhoi!!}
                                        <input type="hidden" name="cauhoi[]" value="{{$ch->cauhoi}}"/>
                                        <div class="form-group">
                                    <textarea class="form-control" placeholder="Nhập nội dung trả lời" rows="3"
                                              name="traloi[]">{{$ch->traloi}}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="giaoviengopy">{{$ch->gopy}}</div>
                                    </td>
                                    <?php $stt++;?>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-info">Hoàn Thành</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop