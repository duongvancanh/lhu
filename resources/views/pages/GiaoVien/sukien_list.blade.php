@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Thông Tin Sự Kiện Của Giáo Viên</h2>
            <div class="thongbao">
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{Session::get('flash_level')}}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
            </div>
            @foreach($data as $da)
                <table class="table table-bordered" style="background: #FFFFFF">
                    <thead>
                    <tr>
                        <td><b>Thời Gian </b></td>
                        <td>{{$da->thoigian}} </td>
                    </tr>
                    <tr>
                        <td style="width:30%;"><b> Địa Điểm</b></td>
                        <td> {{$da->diadiem}}</td>
                    </tr>
                    <tr>
                        <td><b>Nội Dung </b></td>
                        <td> {!!$da->noidung!!}</td>
                    </tr>


                    <tr>
                        <td><b>User Tham Gia </b></td>
                        <td>
                            <?php $x = DB::table('chi_tiet_su_kiens')->where('id_sukien', $da->id)->get(); ?>
                            <form action="/xacnhan" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                @foreach($x as $xx)
                                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                      <?php $a = DB::table('tai_khoans')->where('id', $xx->id_user)->get(); ?>
                                      @foreach($a as $aa)
                                          {{ $aa->ten }}
                                      @endforeach
                                      <input type="hidden" name="idsk" value="{{$da->id}}"/>
                                      <input type="hidden" name="iduser" value="{{$xx->id_user}}"/>
                                      <?php $x = DB::table('chi_tiet_su_kiens')->where('id_sukien', $da->id)->get(); ?>
                                      @if($xx->gv_xacnhan == 0)
                                          <input class='xacnhan' type="checkbox" idsukien="{{$da->id}}"
                                                 iduser="{{$xx->id_user}}"/>
                                      @else
                                          <input class='xacnhan' checked disabled type="checkbox" idsukien="{{$da->id}}"/>
                                      @endif
                                      <?php echo '</br>'; ?>
                                  </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <a class="btn btn-danger" href="/xoasvsukien/{{$da->id}}/{{$xx->id_user}}">Xóa</a>
                                        </div>

                                @endforeach
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Thêm Sinh Viên</td>
                        <td class="center">
                            <form action="{{route('pages.GiaoVien.sukien_listsv')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div class="form-group">
                                            <input type="hidden" name="idsk" value="{{$da->id}}"/>
                                            <select class="form-control" name="slsv">
                                                <option value="">Chọn Sinh Viên</option>
                                                @foreach($sinhviensk as $sv)
                                                    <option value="{{$sv->id_user}}">
                                                        <?php $x = DB::table('tai_khoans')->where('id', $sv->id_user)->get(); ?>
                                                        @foreach($x as $xx)
                                                            {{ $xx->ten }}
                                                            <?php echo '</br>'; ?>
                                                        @endforeach

                                                    </option>
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

                    </tr>
                    <tr>
                        <td>Sửa</td>
                        <td><a class="btn btn-info" href="/updatesukien/{{$da->id}}">Sửa Nội Dung</a></td>
                    </tr>

                    </thead>
                </table>
                </br>
            @endforeach
        </div>
    </div>
@stop