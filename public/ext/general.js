$(function () {
    const PATH = window.location.pathname,
        page = PATH.substring(1).split('/');

    function getNthChild(pathName) {
        switch (pathName) {
            case '':
                return 0;
                break;
            case 'tentang-kami':
                return 2;
                break;
            case 'produk':
                return 3;
                break;
            case 'servis':
                return 4;
                break;
            case 'hubungi-kami':
                return 5;
                break;
        }
    }

    async function fetchDescription(slug) {
        $('#detail').modal('show');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `http://127.0.0.1:8000/fitur/${slug}/detail`,
            method: 'GET',
            success: async function (data) {
                const icon = function (icon) {
                    return `<img src="http://127.0.0.1:8000/icon/${icon}" alt="" width="90%">`;
                }
                const render = function (imgTag, desc) {
                    return `<div class="row"><div class="col-4">${imgTag}</div><div class="col-8">${desc}</div></div>`;
                }
                await $('#detail').find('.spinner').hide();
                await $('#detail').find('.modal-title').html(data.name);
                await $('#detail').find('.text').html(render(icon(data.icon), data.description)).fadeIn();
            }
        });
    }

    $(window).scroll(function (e) {
        if (window.scrollY > 5) {
            $('#header').addClass('header-scrolled');
        }
        $('#header').find('li:nth-child(1)').removeClass('active');
        $('#header').find(`ul:nth-child(1) > li:nth-child(${getNthChild(page[0])})`).addClass('active');
    })

    $(document).ready(function () {
        $('.portfolio-item').css('top', '20px !important');

        $('#accordion .btn-link').click(function () {
            const target = $(this).data('target');
            $(target).toggleClass('show');
        })

        $('[detail-button]').click(function () {
            fetchDescription($(this).data('slug'));
        })

        $('#detail').on('hidden.bs.modal', function (e) {
            $('#detail').find('.spinner').show();
            $('#detail').find('.modal-title').html('');
            $('#detail').find('.text').html('');
        })

        $('[title]').tooltip();
    })

})
