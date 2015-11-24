@extends('pages.Khoa.master_k')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Danh Sách Nhóm</h2>
            <div class="thongbao">
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            </div>
            <div class="panel panel-default">
                <div class="panel-body">

                    <table class="table table-responsive table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr align="center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên Nhóm</th>
                            <th class="text-center">GV Hướng Dẫn</th>
                            <th class="text-center">Đợt Thực Tập</th>
                            <th class="text-center" style="width:40%">Thành Viên</th>
                            <th class="text-center" style="width:35%">Thêm</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $stt = 1?>
                        @foreach($nhom as $n)
                            <tr align="center">
                                <td> <?php echo $stt;?></td>
                                <td>{{$n->tennhom}}</td>
                                <td>
                                    <?php $x = DB::table('tai_khoans')->where('id', $n->id_user)->get(); ?>
                                    @foreach($x as $xx)
                                        {{ $xx->ten }}
                                        <?php echo '</br>'; ?>
                                    @endforeach
                                </td>
                                <td>
                                    <?php $x = DB::table('dot_thuc_taps')->where('id', $n->id_dotthuctap)->get(); ?>
                                    @foreach($x as $xx)
                                        {{ $xx->tendotthuctap}}
                                        <?php echo '</br>'; ?>
                                    @endforeach
                                </td>
                                <td>
                                    <?php $x = DB::table('chi_tiet_nhoms')->where('id_nhom', $n->id)->get(); ?>
                                    @foreach($x as $xx)
                                        <?php $aa = DB::table('tai_khoans')->where('id', $xx->id_user)->get(); ?>
                                        @foreach($aa as $a)
                                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                {{$a->ten}}
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <a href="/xoasvnhom/{{$n->id}}/{{$xx->id_user}}" class="btn btn-danger">Xóa</a>
                                            </div>
                                        @endforeach
                                        <?php echo '</br>'; ?>
                                    @endforeach
                                </td>
                                <td class="center">
                                    <form action="{{route('pages.Khoa.nhom_list')}}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                <div class="form-group">
                                                    <input type="hidden" name="ipid" value="{{$n->id}}"/>
                                                    <select class="form-control" name="slsv">
                                                        <option value="">Chọn Sinh Viên</option>
                                                        @foreach($sinhvien as $sv)
                                                            <option value="{{$sv->id}}">{{$sv->ten}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <button type="submit" class="btn btn-info">Thêm</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <?php $stt++;?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop