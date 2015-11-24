@extends('pages.SinhVien.master_sv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Đánh Giá Công Ty</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('pages.SinhVien.dangiacty_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Chọn Công Ty</label>
                    <select class="form-control" name="slcongty">
                        @foreach($gv as $g)
                            <option value="{{$g->id}}">{{$g->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nội Dung Đánh Giá</label>
                    <textarea class="form-control" rows="3" name="txtdanhgia"></textarea>
                    <script type="text/javascript"> ckeditor("txtdanhgia")</script>
                </div>
                <button type="submit" class="btn btn-default">Tạo Nhóm</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
@stop