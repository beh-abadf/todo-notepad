function thick(user_id, note_id) {

    var checkbox = $('#check_id');
    var checkbox_status = 0;
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (checkbox.prop('checked')) {
        checkbox_status = 1;
    }
    else {
        checkbox_status = 0;
    }

    $.ajax({
        url: '../check-req/',
        type: 'POST',
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        data: JSON.stringify({
            user_id: user_id,
            note_id: note_id,
            checkbox_status: checkbox_status,
        }),
        success: function (response) {
            console.log(response.ob);
        },
        error: function () {
            console.log('error');
        }
    })
}