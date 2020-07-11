async function readURL(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            $('#preview').addClass('img-fluid');
            $('#add-pic').css('opacity', 0);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function () {
    readURL(this);
});

$('select').select2({
    theme: "bootstrap"
});

console.log(document.querySelector('#image').files)
