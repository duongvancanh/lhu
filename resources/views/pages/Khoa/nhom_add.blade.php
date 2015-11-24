@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Tạo Nhóm</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif
            <form action="{{route('pages.Khoa.nhom_add')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                    <label>Tên Nhóm</label>
                    <input class="form-control" name="txttennhom"
                           placeholder="Nhập Tên Nhóm (Ví Dụ : (1/2015) Phan Thị Hường)"/>
                </div>
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

                <div class="form-group">
                    <label>Thêm Sinh Viên</label>
                    <select size="10" multiple class="form-control" name="slsv[]">
                        @foreach($sinhvien as $sv)
                            <option value="{{$sv->id}}">{{$sv->ten}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-info">Tạo Nhóm</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>

@stop