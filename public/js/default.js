$(function () {
    var $loading = $("<div class='loading'><center><img src=\"/img/ajax-loader.gif\"></img></center></div>");
    var $end = $("<div class='end'>Đã hết bài viết</div>");
    var baiviet = $('#baiviet')
    baiviet.append($loading);
    getmore(1);

    var scrollFunction = function () {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 10) {
            $(window).unbind("scroll");
            var more = $('#more');
            var page = more.attr('page');
            page = parseInt(page) + 1;
            more.append($loading);
            console.log(page);
            $loading.detach();
            getmore(page);
            getmore(page);
            //console.log(result)
            more.attr('page', page);
        }
    };
    $(window).scroll(scrollFunction);

    function getmore(page) {
        var url = '';
        $vietbai = $('.vietbai');
        var location = window.location.pathname.split('/');
        if (location[1] == 'khoa') {
            url = '/getbaivietkhoa/';
            $vietbai.hide();
        } else if (location[1] == 'nhom') {
            url = '/getbaivietnhom/' + location[2] + '/';
            $vietbai.attr('idnhom', location[2]);
            $vietbai.show();
        } else {
            url = '/getbaiviet/';
        }
        console.log(url+page);

        $.getJSON(url + page, function (data) {
            $(window).unbind('scroll');
            if (data == "false") {
                window.location.replace("/index");
            }
            console.log(data);
            if (!data == ""){
                var noidung;
                var ngayviet;
                var dinhkem;
                var table = $('#baiviet');
                //if (data.length == 0) $(window).unbind("scroll");
                //console.log(data);
                data.forEach(function (entry) {
                    // console.log(entry);
                    noidung = entry.noidung;
                    ngayviet = entry.created_at;
                    console.log(entry);
                    var comments = entry.comment;
                    var comment = "";
                    comments.forEach(function (c) {
                        comment += '<div><div class="ten-comment"> ' +'<img src="/img/avatar/' + c.id+ '.jpg" width="30px" height="30px"></img>'+ '<b>'+ c.ten  + '</b>'+ ' : '+  c.noidung + "</div>";
                    });
                    var dinhkems = entry.dinhkem;
                    var dinhkem = "";
                    if (!dinhkems.length == 0) {
                        //console.log("length = " + dinhkems.length);
                        dinhkems.forEach(function (d) {
                            dinhkem += '<a href="/attachment/' + entry.id + '-' + d + '">' + d + "</a> <br>";
                        });
                    }
                    var button = '<button id=' + entry.id + ' class="send btn btn-default">Gửi</button>';
                    //button.addEventListener("click", addTask());
                    var child = '<br>'+'<div class="baiviet-container" style="background: #FFFFFF; border-radius: 5px">' +
                        '<div style="padding: 10px;">' +
                        '<div class="thongtinuser"> ' +
                        '<div class="avatar" style="padding: 5px; float: left"><img src="/img/avatar/' + entry.id_user + '.jpg" width="30px" height="30px"></img>' +'&nbsp;</div> ' +
                        '<div class="tennguoiviet"><b>'+ entry.nguoiviet +'</b>'+ '</div>' +
                        '<div class="ngayviet">' +'<small>' +ngayviet + '</small></div><hr>' +
                        '</div><div class="noidung" style="background:#F7F7F7 ">' + noidung +
                        '</div><div class="dinhkem" style="width: 100%; background: #F7F7F7; margin: auto">' +'<b>'+ dinhkem  +'</b><hr>'+
                        '</div><div class="comment" id = ' + entry.id + '>' + comment +
                        '<div class="khung-comment"><input type="text" name="khung-comment" style="width: 91%; margin: auto" id="' + entry.id + '"> &nbsp' + button + '</input></div>' +
                        '</div></div>';

                    table.append(child);
                });
                $loading.detach();
                $(window).scroll(scrollFunction);
            }
        });

    }


    var ajax_request = false;
    $('.tagged_text').textntags({
        triggers: {
            '@': {
                uniqueTags: true,
                syntax: _.template('<%= id %>,')
            }
        },
        onDataRequest: function (mode, query, triggerChar, callback) {
            // fix for overlapping requests
            if (ajax_request) ajax_request.abort();
            ajax_request = $.getJSON('/getuser', function (responseData) {
                query = query.toLowerCase();
                responseData = _.filter(responseData, function (item) {
                    return item.name.toLowerCase().indexOf(query) > -1;
                });
                callback.call(this, responseData);
                ajax_request = false;
            });
        }

    });

    $(document).on("click", ".send", function (event) {
        var target = event.target;
        var id = target.getAttribute('id');
        var text = $('input[id=' + id + ']').val();
        console.log(text);
        var comments = $('div#' + id + ' ');
        comments.append(text);
        $('input[id=' + id + ']').val('');
        $.get('/vietcomment/' + id + '/' + text);
    });

    $('#share').click(function () {
        var url = "";
        var vietbai = $('.vietbai');
        var noidung = $('.inputarea').val();
        var idnhom = vietbai.attr('idnhom');
        //var idkhoa = vietbai.attr('idkhoa');
        if (idnhom) {
            url = '/vietbai/' + noidung + '/' + idnhom + '/';
        }
        else {
            url = '/vietbai/' + noidung;

        }
        console.log(url);

        var tags = '';
        $('.tagged_text').textntags('getTags', function (text) {
            tags = text;
        });


        //Dinh Kem
        var f = $('input.file_uploaded');
        var files = [];
        for (var i = 0; i < f.length; ++i) {
            var item = f[i];
            files.push(item.getAttribute('value'));
        }
        var arrfiles = JSON.stringify(files);
        console.log(arrfiles);

        //Taguser
        var arrtags;
        $('input.tagged_text').textntags('val', function (text) {
            arrtags = text.split(",");
        });
        arrtags.pop();
        var arrtags = JSON.stringify(arrtags);
        console.log(arrtags);

        //var t = $('input.tagged_text');
        //var tag = JSON.stringify(t);
        //console.log(tag);
        $('.inputarea').val('');
        $.get(url,
            {
                file_name: arrfiles,
                tags: arrtags
            }
            , function (data) {
                window.location.reload();
            });
    });


    $('#attach').click(function () {

        $.blockUI({
            overlayCSS: {backgroundColor: '#000'},
            onOverlayClick: function () {
                $.unblockUI();

            },
            theme: true,
            message: '<div id="uploader"></div>',

        });
        $("#uploader").plupload({
            // General settings
            runtimes: 'html5,flash,silverlight,html4',
            url: "/file/upload.php",

            // Maximum file size
            max_file_size: '2mb',

            chunk_size: '1mb',

            // Resize images on clientside if we can
            resize: {
                width: 200,
                height: 200,
                quality: 90,
                crop: true // crop to exact dimensions
            },

            // Specify what files to browse for
            filters: [
                {title: "Image files", extensions: "jpg,gif,png"},
                {title: "Zip files", extensions: "zip,avi"}
            ],

            // Rename files by clicking on their titles
            rename: true,

            // Sort files
            sortable: true,

            // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
            dragdrop: true,

            // Views to activate
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },

            // Flash settings
            flash_swf_url: '/plupload/js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url: '/plupload/js/Moxie.xap',

            init: {
                FileUploaded: function (up, file, info) {
                    var obj = JSON.parse(info.response);
                    console.log(info.response);
                    $('#attachment').append('<input class="file_uploaded" type="hidden" name="file_name" value="' + obj.filename + '" /> <div class="file_uploaded" fileid="' + file.id + '">' + obj.filename + '</div><br>');
                },
                FilesRemoved: function (up, files) {
                    var id = files[0].id;
                    var f = $('div.file_uploaded');
                    console.log("f = " + f.length);
                    for (var i = 0; i < f.length; ++i) {
                        var item = f[i];
                        if (item.getAttribute('fileid') == id) {
                            item.remove();
                        }
                    }

                }

            }
        });

        $("#uploader").init();
    });

    $("div.alert").delay(3000).slideUp();

    $( '#themexcel' ).submit( function( e ) {
        e.preventDefault();
        var myNode = document.getElementById('result');
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
        console.log('bat dau upload');
        $.ajax( {
            url: '/themexel',
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success: function(data) {
                data = JSON.parse(data);
                var result = $('#result');
                if (data.result == 'false')
                    result.append('<p>'+data.error+'<\/p>');
                else{
                    result.append('<p>Thêm Dữ Liệu Thành Công<\/p>');
                }
            }
        } );
        e.preventDefault();
    } );

    $('.xacnhan').change(function(){
        var idsk = this.getAttribute('idsukien');
        var iduser = this.getAttribute('iduser');
        var me = this;
        $.get('/xacnhansukien',
            {
                idsk : idsk,
                iduser : iduser
            }
        );

    });
    function xacnhanxoa(msg)
    {
        if(window.confirm(msg)) {
            return true;
        }
        return false;
    }


})
;



