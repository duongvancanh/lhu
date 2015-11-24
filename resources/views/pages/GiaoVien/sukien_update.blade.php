@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Chỉnh Sự Kiện</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/updatesukien/{{$sukien['id']}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Thời Gian</label>
                    <input type="date" class="form-control" name="txtthoigian" placeholder="Nhập Thời Gian" value="{{$sukien['thoigian']}}"/>
                </div>
                <div class="form-group">
                    <label>Địa Điểm</label>
                    <input class="form-control" name="txtdiadiem" placeholder="Nhập Địa Điểm" value="{{$sukien['diadiem']}}"/>
                </div>
                <div class="form-group">
                    <label>Nội Dung</label>
                    <textarea class="form-control" rows="3" name="txtnoidung">{{$sukien['noidung']}}</textarea>
                    <script type="text/javascript"> ckeditor("txtnoidung")</script>
                </div>
                           <br>
                <button type="submit" class="btn btn-info">Chỉnh Sửa Sự Kiện</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
    </div>
@stop