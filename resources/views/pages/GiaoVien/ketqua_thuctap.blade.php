@extends('pages.GiaoVien.master_gv')
@section('contentx')
    <div class="panel panel-default">
        <div class="panel-body">

            <h2>Đánh Giá Sinh Viên</h2>

            <a href="/xuatpdf/{{$idsv}}" class="btn btn-danger">PDF</a>


            <form action="/ketquathuctap" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="idsv" value="{{$idsv}}"/>
                @if(count($ketquadg) != 0)
                    <b> Đã Đánh Giá Vào : </b> {{$ketquadg->created_at}}
                @endif
                <table class="table table-bordered" style="background: #FFFFFF">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Nội Dung</th>
                        <th class="text-center">Thang Điểm</th>
                        <th class="text-center">Kết Quả</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Lịch sử hình thành và phát triển của đơn vị. Sơ đồ tổ chức</td>
                        <td>0.25</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.25"
                                   value="{{$dulieu[0]}}"/></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Đặc điểm hoạt động sản xuất kinh doanh tại đơn vị thực tập</td>
                        <td>0.5</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.5"
                                   value="{{$dulieu[1]}}"/></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Các quy định chung trong lao động của cơ quan/đơn vị và bộ phận, công đoạn nơi sinh viên
                            tham gia làm việc
                        </td>
                        <td>0.25</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.25"
                                   value="{{$dulieu[2]}}"/></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Quy trình hoạt động của bộ phận tham gia thực tập</td>
                        <td>1</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="1"
                                   value="{{$dulieu[3]}}"/></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Công việc tham gia thực tập tại cơ quan đơn vị</td>
                        <td>1</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="1"
                                   value="{{$dulieu[4]}}"/></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Hiện trạng hệ thống thông tin của cơ quan đơn vị</td>
                        <td>2</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="2"
                                   value="{{$dulieu[5]}}"/></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Sản phẩm CNTT theo yêu cầu của DVTT / GVHD.</td>
                        <td>2</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="2"
                                   value="{{$dulieu[6]}}"/></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Những thuận lợi và khó khăn trong quá trình thực tập</td>
                        <td>0.5</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.5"
                                   value="{{$dulieu[7]}}"/></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Đánh giá mối liên hệ giữa lý thuyết và thực tiễn</td>
                        <td>0.5</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.5"
                                   value="{{$dulieu[8]}}"/></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Nhận xét của của cơ quan về chất lượng công việc được giao</td>
                        <td>0.5</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.5"
                                   value="{{$dulieu[9]}}"/></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Nhận xét của của cơ quan về bản thân sinh viên</td>
                        <td>0.5</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="0.5"
                                   value="{{$dulieu[10]}}"/></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Trình bày báo cáo</td>
                        <td>1</td>
                        <td><input name="diem[]" type="number" required step="0.01" min="0" max="1"
                                   value="{{$dulieu[11]}}"/></td>
                    </tr>
                    </thead>
                </table>
                <button type="submit" class="btn btn-info">Đánh Giá</button>
            </form>

        </div>
    </div>
@stop