$('input[name="search"]').keyup(function () {
    const res = $('.result');
    const nfe = $('#res-not-found');
    const li = function (value) {
        return `<li><a href="/ads">${value}</a></li>`;
    }
    $.ajax({
        url: `http://127.0.0.1:8000/api/search?k=${$(this).val()}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
        },
        method: 'GET',
        success: function (response) {
            if (response.data.length !== 0) {
                nfe.fadeOut();
                let arr = [];
                response.data.forEach(val => {
                    arr.push(li(val))
                });
                res.html(arr)
            } else {
                res.html('<li>Data tidak ditemukan</li>')
            }
        }
    })
})

$('input[name="search"]').focusin(function () {
    $('.search').css('border-bottom', '1px solid #2F308B');
})

$('input[name="search"]').focusout(function () {
    $('.search').css('border-bottom', '1.3px solid #e2e2e2');
})

$('#reset-input').click(function () {
    $(this).parent().find('input').val(null);
    $('.result').html('<li>Data tidak ditemukan</li>');
})

$('.toggle-search').click(function () {
    $('#search').modal('show');
})

$('[title]').tooltip();
