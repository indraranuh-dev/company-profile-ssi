@extends('layouts/static')

@section('title', 'Hubungi Kami')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
    <span class="breadcrumb-item active">Hubungi kami</span>
</nav>

<div class="container">
    <section class="contact">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="section-title">
                    <h2>Tentang Kami</h2>
                </div>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-12">
                <h2 class="content-title mb-4">
                    <strong>Seputar Perusahaan</strong>
                </h2>
                <img src="https://images.pexels.com/photos/7070/space-desk-workspace-coworking.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="img-thumbnail img-fluid w-50 float-left mr-4 mb-2" alt="">
                <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam deserunt numquam non
                    placeat labore, deleniti culpa eligendi perferendis saepe consequatur necessitatibus
                    provident, quaerat explicabo magnam iste totam aperiam! Minus a odio ipsam praesentium
                    eligendi molestias, quidem sapiente magni modi excepturi esse, tempore eveniet, est ut
                    minima sequi doloremque dignissimos. Sequi odio optio hic exercitationem possimus
                    dignissimos eligendi voluptatem facere quo est! Error voluptatibus iusto doloribus sed
                    nesciunt consectetur doloremque necessitatibus. Exercitationem, dolor commodi? Assumenda,
                    odit porro? Et labore debitis dignissimos deleniti animi, ipsum doloremque repellat ducimus
                    corporis molestias atque est cupiditate dolores magnam id fugit perspiciatis saepe
                    veritatis, inventore sit.
                </p>
                <p class="text-justify">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet molestiae ducimus error
                    distinctio voluptatibus explicabo dolor illo ad recusandae vero rerum ipsam, dolorem quaerat
                    perspiciatis tempore, eaque modi doloremque impedit repellat animi maxime? Sunt iure
                    accusantium eius aut! Nemo ipsum error quidem voluptatibus quae culpa consequatur recusandae
                    harum deserunt doloribus molestias iusto saepe esse sequi praesentium fuga officiis cumque
                    facilis, maiores sapiente obcaecati itaque deleniti est. Nemo amet libero, dolore, dolorem
                    delectus totam blanditiis rem maiores numquam nostrum eius quos tenetur aut nihil sequi modi
                    ut sit harum ea nesciunt, enim possimus veniam. Provident quae, voluptate explicabo est
                    temporibus eveniet.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-lg-6 col-md-6">
                <h2 class="content-title mb-4">
                    <strong>Sertifikat</strong>
                </h2>
                <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam deserunt numquam non
                    placeat labore, deleniti culpa eligendi perferendis saepe consequatur necessitatibus
                    provident, quaerat explicabo magnam iste totam aperiam! Minus a odio ipsam praesentium
                    eligendi molestias, quidem sapiente magni modi excepturi esse, tempore eveniet, est ut
                    minima sequi doloremque dignissimos. Sequi odio optio hic exercitationem possimus
                    dignissimos eligendi voluptatem facere quo est! Error voluptatibus iusto doloribus sed
                    nesciunt consectetur doloremque necessitatibus. Exercitationem, dolor commodi? Assumenda,
                    odit porro? Et labore debitis dignissimos deleniti animi, ipsum doloremque repellat ducimus
                    corporis molestias atque est cupiditate dolores magnam id fugit perspiciatis saepe
                    veritatis, inventore sit.
                </p>
            </div>
            <div class="col-12 col-lg-6 col-mg-6 mb-3 mb-lg-0 mb-md-6">
                <img src="https://images.pexels.com/photos/48195/document-agreement-documents-sign-48195.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="img-thumbnail img-fluid" alt="">
            </div>
        </div>

    </section>
</div>

@endsection

@push('scripts')
<script>
    $(function () {
        $('[title]').tooltip();
        $(window).scroll(function (e) {
            if(window.scrollY > 5){
                $('#header').addClass('header-scrolled');
            }
            $('#header').find('li:nth-child(1)').removeClass('active');
            $('#header').find('ul:nth-child(1) > li:nth-child(2)').addClass('active');
        })
    })
</script>
@endpush
