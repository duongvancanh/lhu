@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Tiến Độ Làm Việc</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/tiendolv" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Chọn Giáo Viên</label>
                    <select class="form-control" name="slgv">
                        @foreach($giaovien as $gv)
                            <option value="{{$gv->id}}">{{$gv->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Chọn Sinh Viên</label>
                    <select class="form-control" name="slsv">
                        @foreach($sinhvien as $sv)
                            <option value="{{$sv->id}}">{{$sv->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info">Xem Kết Quả</button>
                <form>
                    <div id="result">
                    </div>
        </div>
    </div>

@stop