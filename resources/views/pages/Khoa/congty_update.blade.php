@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>Chỉnh Sửa Công Ty</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/updatecty/{{$congty['id']}}" method="Post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                    <label>Tên Công Ty</label>
                    <input class="form-control"     name="txttencongty"  value="{{$congty['ten']}}"/>
                </div>

                <div class="form-group">
                    <label>Địa Chỉ </label>
                    <input class="form-control" name="txtdiachicongty" placeholder="Nhập Địa Chỉ Công Ty" value="{{$congty['diachi']}}" />
                </div>

                <div class="form-group">
                    <label>Số Điện Thoại</label>
                    <input class="form-control" name="txtsdtcongty" placeholder="Nhập SĐT Công Ty" value="{{$congty['sdt']}}"/>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="txtemailcongty" placeholder="Nhập Email Công Ty" value="{{$congty['email']}}"/>
                </div>
                <div class="form-group">
                    <label>Thông Tin Công Ty</label>
                    <textarea class="form-control" rows="3" name="tarathongtin">{{$congty['loai']}}</textarea>
                    <script type="text/javascript"> ckeditor("tarathongtin")</script>
                </div>
                <button type="submit" class="btn btn-info">Chỉnh Sửa Công Ty</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>

        </div>
    </div>
@stop