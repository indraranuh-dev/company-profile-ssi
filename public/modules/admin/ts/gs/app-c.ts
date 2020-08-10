const imgUpload = document.getElementById("image"),
    imgPreview = document.querySelector("[pic-container]"),
    imgUploadForm = document.getElementById("img-upload-form");
let totalFiles, previewTitle, previewTitleText, img;

imgUpload.addEventListener("change", previewImgs, false);

function previewImgs(event) {
    let arr = [];
    const col = function(val, name) {
        return `<div class="col-6 mb-2">
            <img class="img-thumbnail img-fluid" width="100%" src="${val}" />
            <p class="bg-light px-2" style="font-size:10px;"><b>${name}</b></p>
        </div>`;
    };
    totalFiles = imgUpload.files.length;

    if (!!totalFiles) {
        $("[files-length]").text(`${totalFiles} gambar dipilih`);
    }

    for (var i = 0; i < totalFiles; i++) {
        const url = URL.createObjectURL(event.target.files[i]);
        arr.push(col(url, event.target.files[i].name));
    }
    $(imgPreview).html(arr);
}

function add(elm) {
    const init = $(elm)
        .parent()
        .parent()
        .prev("[data-item]").length;
    repeat();
    changePropBefore(init, elm);
}

async function repeat() {
    const repeat = `<div class="row mb-3" data-item>
            <div class="col-10">
                <input type="text" class="form-control" name="description[]">
            </div>
            <div class="col-2  d-flex align-items-center">
                <button type="button" class="btn btn-outline-default"
                    data-repeat-delete onclick="destroy(this);">
                    <i class="fa fa-trash"></i>
                </button>
                <button type="button" class="btn btn-outline-default"
                    data-repeat-add onclick="add(this);">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>`;
    await $(".repeater").append(repeat);
}

async function changePropBefore(l, elm) {
    if (l === 0) {
        await $(elm)
            .parent()
            .find("[data-repeat-delete]")
            .prop("disabled", false);
        await $(elm).hide();
    } else {
        await $(elm)
            .parent()
            .parent()
            .before()
            .find("[data-repeat-delete]")
            .prop("disabled", false);
        await $(elm)
            .parent()
            .parent()
            .before()
            .find("[data-repeat-add]")
            .hide();
    }
}

function destroy(elm) {
    const prev = $(elm)
        .parent()
        .parent()
        .prev("[data-item]").length;
    const next = $(elm)
        .parent()
        .parent()
        .next("[data-item]").length;
    const next2 = $(elm)
        .parent()
        .parent()
        .next("[data-item]")
        .next("[data-item]").length;
    if (next === 0) {
        const allItem = $(elm)
            .parent()
            .parent()
            .parent()
            .children().length;
        if (allItem <= 2) {
            $(elm)
                .parent()
                .parent()
                .prev("[data-item]")
                .find("[data-repeat-delete]")
                .prop("disabled", true);
            $(elm)
                .parent()
                .parent()
                .prev("[data-item]")
                .find("[data-repeat-add]")
                .show();
            $(elm)
                .parent()
                .parent()
                .remove();
        } else {
            $(elm)
                .parent()
                .parent()
                .prev("[data-item]")
                .find("[data-repeat-delete]")
                .prop("disabled", false);
            $(elm)
                .parent()
                .parent()
                .prev("[data-item]")
                .find("[data-repeat-add]")
                .show();
            $(elm)
                .parent()
                .parent()
                .remove();
        }
    } else {
        if (next2 == 0) {
            $(elm)
                .parent()
                .parent()
                .next("[data-item]")
                .find("[data-repeat-delete]")
                .prop("disabled", true);
            $(elm)
                .parent()
                .parent()
                .next("[data-item]")
                .find("[data-repeat-add]")
                .show();
            $(elm)
                .parent()
                .parent()
                .remove();
        }
        $(elm)
            .parent()
            .parent()
            .remove();
        $(elm)
            .parent()
            .parent()
            .remove();
    }
}
