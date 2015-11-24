@extends('pages.Khoa.master_k')
@section('contentx')

    <div class="vietbai">
        <textarea maxlength="3800" class="inputarea" type="text" placeholder="Bạn muốn chia sẻ điều gì?"
                  style="width: 100%; height: 50px;border-radius: 3px"></textarea>

        <input class="tagged_text" placeholder="@ Gán Bạn" type="text" style="width: 100%;border-radius: 3px">
        <div class="textntags-beautifier"></div>
        <div class="row">
            <div class="col-md-6">
                <button id="attach" class="btn btn-default">Đính Kèm</button>
            </div>
            <div class="col-md-6 text-right"><input type="button" id="share" class="btn btn-default" upload="" value="Chia Sẻ"></div>
        </div>
        <div id="attachment"></div>
    </div>
    <div id="baiviet"></div>
    <div id="more" page="1"></div>
@endsection