/**
 * open publish modal
 */
$('#show-modal').on('click', function(){
    $('#notifmodal').modal('toggle');
    $('#notifmodal #confirmation').show().siblings().hide();
});
/**
 * add article ajax call 
 */
$('#publish').on('click', function (e) {
    e.preventDefault();
    var form_data = new FormData(),
        title = $('#title').val(),
        article = $('#editor-container .ql-editor').html(),
        picture = $('#picture').prop('files')[0];

    form_data.append('article', article);
    form_data.append('title', title);
    form_data.append('picture', picture); 

    $('#title').val('');
    $('#editor-container .ql-editor').html('')


    $.ajax({
            method: "POST",
            url: "/admin/articles/add",
            data: form_data,
            processData: false,
            contentType: false
        })
        .done(function (res) {
            $('#notifmodal #notifications').show().siblings().hide();
            switch (res) {
                case '0':
                    $('#notifmodal').find('.modal-body #notifications  span:nth-child(1)').show().siblings().hide();
                    break;
                case '1':
                    $('#notifmodal').find('.modal-body #notifications span:nth-child(2)').show().siblings().hide();
                    break;
                case '2':
                    $('#notifmodal').find('.modal-body #notifications  span:nth-child(3)').show().siblings().hide();
                    break;
                case '3':
                    $('#notifmodal').find('.modal-body #notifications  span:nth-child(4)').show().siblings().hide();
                    break;
                case '4':
                    $('#notifmodal').find('.modal-body #notifications  span:nth-child(5)').show().siblings().hide();
                    break;
            }
        })
        .fail(function (res) {
            $('#notifmodal').find('.modal-body #notifications  span:nth-child(6)').show().siblings().hide();
        });
})