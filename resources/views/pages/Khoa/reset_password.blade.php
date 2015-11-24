@extends('pages.Khoa.master_k')
@section('contentx')

<div class="panel panel-default">
	<div class="panel-body">

    <h2>Đổi Mật Khẩu Khoa</h2>
    <div class="thongbao">
        @if(Session::has('flash_message'))
            <div class="alert alert-{{Session::get('flash_level')}}">
                {{ Session::get('flash_message') }}
            </div>
        @endif
    </div>

    <form action="/resetpass" method="POST" id="reset">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

        <div class="form-group">
            <label>Mật Khẩu Cũ</label>
            <input class="form-control" type="password" required name="password" placeholder="Nhập Mật Khẩu Cũ" />
        </div>
        <div class="form-group">
            <label>Mật Khẩu Mới</label>
            <input class="form-control" type="password" id="password1" required name="newpass" placeholder="Nhập Mật Khẩu Mới" />
        </div>
        <div class="form-group">
            <label>Nhập Lại Mật Khẩu</label>
            <input class="form-control" type="password" id="password2" required name="newpass2" placeholder="Nhập Lại Mật Khẩu" />
        </div>

        <button type="submit" class="btn btn-info">Đổi Mật Khẩu</button>

        <form>

    </div>
</div>
            <script>

                var password1 = document.getElementById('password1');
                var password2 = document.getElementById('password2');

                var checkPasswordValidity = function() {
                    if (password1.value != password2.value) {
                        password1.setCustomValidity('Passwords must match.');
                    } else {
                        password1.setCustomValidity('');
                    }
                };

                password1.addEventListener('change', checkPasswordValidity, false);
                password2.addEventListener('change', checkPasswordValidity, false);

                var form = document.getElementById('reset');
                form.addEventListener('submit', function(event) {
                    checkPasswordValidity();
                    if (!this.checkValidity()) {
                        event.preventDefault();
                        //Implement you own means of displaying error messages to the user here.
                        password1.focus();
                    }
                }, false);
            </script>

@stop