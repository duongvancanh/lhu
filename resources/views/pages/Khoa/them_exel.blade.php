@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Tạo Sinh Viên</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="themexcel" action="themexel" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Chọn File</label>
                    <input name="fileToUpload" type="file"/>
                </div>
                <button type="submit" class="btn btn-info">Tạo Sinh Viên</button>
                <form>
                    <div id="result">
                    </div>
        </div>
    </div>
@stop