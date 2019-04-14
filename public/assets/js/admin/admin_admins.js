/**
 * add admin ajax call 
 */
$('#add_admin').on('submit', function (e) {
    e.preventDefault();
    var form_data = new FormData(),
        admin_email = $(this).find("input[name=email]").val(),
        admin_username = $(this).find("input[name=username]").val(),
        admin_picture = $(this).find("input[name=picture]").prop('files')[0];

    form_data.append('email', admin_email);
    form_data.append('username', admin_username);
    form_data.append('picture', admin_picture);


    $.ajax({
            method: "POST",
            url: "/admin/add-admin",
            data: form_data,
            processData: false,
            contentType: false
        })
        .done(function (res) {
            switch (res) {
                case '0':
                    $('#notifmodal').modal('toggle').find('.modal-body span:nth-child(1)').show().siblings().hide();
                    break;
                case '1':
                    $('#notifmodal').modal('toggle').find('.modal-body span:nth-child(2)').show().siblings().hide();
                    break;
                case '2':
                    $('#notifmodal').modal('toggle').find('.modal-body span:nth-child(3)').show().siblings().hide();
                    break;
                case '3':
                    $('#notifmodal').modal('toggle').find('.modal-body span:nth-child(4)').show().siblings().hide();
                    break;
                case '4':
                    $('#notifmodal').modal('toggle').find('.modal-body span:nth-child(5)').show().siblings().hide();
                    break;
            }
        })
        .fail(function () {
            $('#notifmodal').modal('toggle').find('.modal-body span:nth-child(6)').show().siblings().hide();
        });
})