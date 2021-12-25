$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if (confirm('Are you sure?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                location.reload();
            }
        });
    }
}
/*
$("#upload").change(function () {
    const form = new FormData();
    form.append('file_upload', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/image',
        success: function (result) {
            if (result.url) {
                $("#image_show").attr('src', result.url);
                $("#thumb").val(result.url);
            } else {
                console.log('Upload failed');
            }
        }
    });
});
*/