@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Phân Sinh Viên Theo Nhóm</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('pages.Khoa.nhom_sv_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Giáo Viên Hướng Dẫn</label>
                    <select class="form-control" name="slgiaovienhd">
                        @foreach($gv as $g)
                            <option value="{{$g->id}}">{{$g->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Đợt Thực Tập</label>
                    <select class="form-control" name="sldotthuctap">
                        @foreach($dotthuctap as $dtt)
                            <option value="{{$dtt->id}}">{{$dtt->tendotthuctap}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Tạo Nhóm</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
@stop