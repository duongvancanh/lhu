@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Tạo Quy Tắc Làm Việc</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('pages.GiaoVien.quytac_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                    <label>Nội Dung</label>
                    <textarea class="form-control" rows="3" name="txtnoidung" >{{$data['noidung']}}</textarea>
                    <script type="text/javascript"> ckeditor("txtnoidung")</script>
                </div>
                <button type="submit" class="btn btn-default">Tạo Quy Tắc</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
@stop