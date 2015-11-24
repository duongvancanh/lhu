$(document).ready(function() { 
    $('#demo3').click(function() { 
        $.blockUI({ overlayCSS: { backgroundColor: '#00f' } }); 
 
        setTimeout($.unblockUI, 2000); 
    }); 
}); 
