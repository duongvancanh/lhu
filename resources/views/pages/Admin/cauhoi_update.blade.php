@extends('pages.Admin.master_ad')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>Sửa Hỏi Báo Cáo</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/updatecauhoi/{{$cauhoi['id']}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Nội Dung Câu Hỏi</label>
                    <textarea class="form-control" rows="3" name="taranoidung">{{$cauhoi['cauhoi']}}</textarea>
                    <script type="text/javascript"> ckeditor("taranoidung")</script>
                </div>
                <button type="submit" class="btn btn-info">Sửa Câu Hỏi</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>

@stop