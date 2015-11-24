@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>Tạo Sự Kiện</h2>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/taosukien" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Thời Gian</label>
                    <input type="date" class="form-control" name="txtthoigian" placeholder="Nhập Thời Gian"/>
                </div>
                <div class="form-group">
                    <label>Địa Điểm</label>
                    <input class="form-control" name="txtdiadiem" placeholder="Nhập Địa Điểm"/>
                </div>
                <div class="form-group">
                    <label>Nội Dung</label>
                    <textarea class="form-control" rows="3" name="txtnoidung"></textarea>
                    <script type="text/javascript"> ckeditor("txtnoidung")</script>
                </div>
                <label>Gán Sinh Viên</label>
                <select multiple class="form-control" name="slsv[]">
                    @foreach($sinhviensk as $s)
                        <option value="{{$s->id_user}}">
                            <?php $x = DB::table('tai_khoans')->where('id', $s->id_user)->get(); ?>
                            @foreach($x as $xx)
                                {{ $xx->ten }}
                                <?php echo '</br>'; ?>
                            @endforeach
                        </option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-info">Tạo Sự Kiện</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
    </div>
@stop