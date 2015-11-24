@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Xem Tiến Độ </h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('pages.Khoa.congty_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên Công Ty</label>
                    <input class="form-control" name="txttencongty" placeholder="Nhập Tên Công Ty"/>
                </div>

                <div class="form-group">
                    <label>Địa Chỉ </label>
                    <input class="form-control" name="txtdiachicongty" placeholder="Nhập Địa Chỉ Công Ty"/>
                </div>
                <div class="form-group">
                    <label>Số Điện Thoại</label>
                    <input class="form-control" name="txtsdtcongty" placeholder="Nhập SĐT Công Ty"/>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="txtemailcongty" placeholder="Nhập Email Công Ty"/>
                </div>
                <div class="form-group">
                    <label>Thông Tin Công Ty</label>
                    <textarea class="form-control" rows="3" name="tarathongtin"></textarea>
                    <script type="text/javascript"> ckeditor("tarathongtin")</script>
                </div>
                <button type="submit" class="btn btn-info">Tạo Công Ty</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>

@stop