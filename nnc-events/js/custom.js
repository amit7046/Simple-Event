jQuery(function($) {

$(function () {
    $(".vevent.event-item").slice(0, 4).show();
    var i=2;
    $("#loadMore").on('click', function (e) {
        i=i+1;
        console.log('df');
        e.preventDefault();
        console.log(i);
        $(".vevent.event-item:hidden").slice(0, i).slideDown();
        if ($(".vevent.event-item:hidden").length == 0) {
            $("#loadMore").hide();
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});

    $('body').on('change', '#file', function() {
        $this = $(this);
        file_data = $(this).prop('files')[0];
        form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'file_upload');
 
        $.ajax({
            url: nnc.ajaxurl,
            type: 'POST',
            contentType: false,
            processData: false,
            data: form_data,
            success: function (response) {
                $this.val('');
                alert('File uploaded successfully.');
            }
        });
    });    
});