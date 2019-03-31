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
            alert(res);
        })
        .fail(function () {
            alert(res);
        });
})