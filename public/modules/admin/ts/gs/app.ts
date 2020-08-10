const table = $("#table").DataTable({
    dom: `<'row mb-3'
                <'col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0 text-right text-sm-left'B>
                <'col-lg-6 col-md-6 col-sm-12 text-right text-sm-left'f>
            >
            <'row mb-2'
                <'col-12'<'table-responsive' t>>
            >
            <'row'
                <'col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0' i>
                <'col-lg-6 col-md-6 col-sm-12' p>
            >`,
    buttons: [
        {
            extend: "copy",
            text: '<i class="fa fa-fw fa-copy"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Copy"
        },
        {
            extend: "excel",
            text: '<i class="fa fa-fw fa-file-excel"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Export as Excell"
        },
        {
            extend: "pdfHtml5",
            download: "open",
            text: '<i class="fa fa-fw fa-file-pdf"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Export as PDF"
        },
        {
            extend: "print",
            text: '<i class="fa fa-fw fa-print"></i>',
            className: "btn btn-light btn-sm",
            titleAttr: "Print"
        }
    ]
});

async function fetchDetails(URL) {
    await $.ajax({
        url: URL,
        method: "GET",
        success: function(data) {
            let desc = [];
            let tags = [];
            let images = [];
            const content = function(name, series) {
                return `<h3 class="card-title">${name}</h3>
                <h5 class="text-muted">${series}</h5>
                `;
            };
            const badge = function(val) {
                return `<span class="badge badge-info mr-1"># ${val}</span>`;
            };
            const img = function(imgName) {
                return `<div><img class="img-fluid" src="http://127.0.0.1:8000/_admin/produk/image/${imgName}"/></div>`;
            };

            data.details.forEach(data => {
                desc.push(`<li>${data.description}</li>`);
            });

            data.tags.forEach(tag => {
                tags.push(badge(tag.name));
            });

            data.images.forEach(image => {
                images.push(img(image.image));
            });

            setTimeout(() => {
                $(".centered").hide();
                $("#detail-content")
                    .find(".col-7 > .header")
                    .html(content(data.name, data.series));
                $("#detail-content")
                    .find(".col-7 > .list")
                    .html(desc);
                $("#detail-content")
                    .find(".col-7 > .tags")
                    .html(tags);
                // $("#detail-content")
                //     .find("[slider-preview]")
                //     .html(images);
                // $("#detail-content")
                //     .find("[slider-nav]")
                //     .html(images);
                $("#detail-content")
                    .find(".col-7 > .tags")
                    .after()
                    .append("<h4 class='my-2'>Deskripsi</h4>");
            }, 1000);

            // initSlick();
        },
        error: function(err) {
            console.log(err);
        }
    });
}

async function showDetails(id) {
    $("#detail-modal").modal("show");
    fetchDetails(`http://127.0.0.1:8000/_admin/general-supplies/${id}/detail`);
}

async function deleteConfirmation(id) {
    $("#confirm-modal").modal("show");
    $("#delete").attr(
        "action",
        `http://127.0.0.1:8000/_admin/general-supplies/${id}`
    );
}
$("#detail-modal").on("hidden.bs.modal", function(e) {
    $("#detail-content")
        .find(".col-7 > .list")
        .html("");
    $("#detail-content")
        .find(".col-7 > .header")
        .html("");
    $("#detail-content")
        .find(".col-7 > .tags")
        .html("");
    $("#detail-content")
        .find("img")
        .attr("src", "");
    $(this)
        .find(".centered")
        .show();
});
$("[title]").tooltip();

$(".slider-single").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    adaptiveHeight: true,
    infinite: false,
    useTransform: true,
    speed: 400,
    cssEase: "cubic-bezier(0.77, 0, 0.18, 1)"
});

function initSlick() {
    $(".slider-nav")
        .on("init", function(event, slick) {
            $(".slider-nav .slick-slide.slick-current").addClass("is-active");
        })
        .slick({
            slidesToShow: 3,
            slidesToScroll: 7,
            dots: true,
            focusOnSelect: true,
            infinite: true
        });

    $(".slider-single").on("afterChange", function(event, slick, currentSlide) {
        $(".slider-nav").slick("slickGoTo", currentSlide);
        var currrentNavSlideElem =
            '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        $(".slider-nav .slick-slide.is-active").removeClass("is-active");
        $(currrentNavSlideElem).addClass("is-active");
    });

    $(".slider-nav").on("click", ".slick-slide", function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data("slick-index");

        $(".slider-single").slick("slickGoTo", goToSingleSlide);
    });
}

initSlick();
