@extends('layouts/hvac')

@section('title', 'Hubungi Kami')

@section('content')
<nav class="breadcrumb container">
    <a class="breadcrumb-item" href="{{route('index')}}">Home</a>
    <span class="breadcrumb-item active">Hubungi kami</span>
</nav>

<div class="container">
    <section class="contact">
        @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form flex-column h-100 py-3" data-aos="fade-up">
                    <svg class="my-3" enable-background="new 0 0 512 512" height="100" viewBox="0 0 512 512" width="100"
                        xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path d="m238.142 320.36 82.858 82.858 132.859-395.718z" fill="#e4fbef" />
                            </g>
                            <g>
                                <path
                                    d="m378.287 232.589c-15.684 11.906-33.217 22.71-52.337 31.941-21.654 10.455-43.622 18.059-65.131 22.941l-22.676 32.888 82.857 82.859z"
                                    fill="#d3effb" />
                            </g>
                            <g>
                                <path d="m140.999 223.216-82.858-82.858 395.718-132.858z" fill="#e4fbef" />
                            </g>
                            <g>
                                <path d="m146.713 314.645-5.714-91.429 312.86-215.716z" fill="#d3effb" />
                            </g>
                            <g>
                                <path d="m146.713 314.645 307.146-307.145-215.717 312.86z" fill="#b1e4f9" />
                            </g>
                            <g>
                                <path
                                    d="m459.164 2.196c-2.015-2.014-4.991-2.71-7.691-1.807l-273.051 91.68c-3.926 1.319-6.041 5.571-4.723 9.498 1.318 3.926 5.567 6.04 9.498 4.723l222.541-74.721-263.854 181.927-69.881-69.879 78.015-26.198c3.927-1.318 6.041-5.57 4.722-9.497-1.318-3.927-5.567-6.044-9.497-4.722l-89.49 30.051c-2.461.826-4.32 2.867-4.914 5.395-.593 2.527.162 5.183 1.998 7.019l80.855 80.854 5.326 85.218-1.849 1.85c-2.929 2.93-2.929 7.678.001 10.606 1.465 1.464 3.384 2.196 5.303 2.196 1.92 0 3.84-.732 5.304-2.197l1.849-1.849 85.217 5.326 80.856 80.855c1.423 1.423 3.338 2.196 5.304 2.196.571 0 1.146-.065 1.715-.199 2.528-.594 4.568-2.452 5.396-4.914l61.42-182.929c1.318-3.927-.797-8.18-4.723-9.498-3.926-1.317-8.18.795-9.498 4.724l-57.566 171.453-69.88-69.88 181.928-263.864-43.346 129.11c-1.318 3.927.797 8.179 4.724 9.497.792.266 1.596.392 2.388.392 3.134 0 6.057-1.98 7.109-5.115l60.3-179.611c.906-2.698.207-5.676-1.806-7.69zm-224.788 310.414-70.607-4.413 237.196-237.196zm155.98-252.215-237.195 237.194-4.412-70.606z" />
                                <path
                                    d="m121.392 399.014h-12.783c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h12.783c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                                <path
                                    d="m186.239 425.349c-3.962-1.188-8.148 1.055-9.342 5.023-.593 1.971-1.686 3.763-3.25 5.326l-1.964 1.964c-2.929 2.93-2.929 7.678 0 10.607 1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196l1.964-1.964c3.336-3.336 5.693-7.244 7.008-11.615 1.192-3.965-1.057-8.147-5.024-9.341z" />
                                <path
                                    d="m89.473 370.082c-3.619-2.01-8.188-.704-10.197 2.918-2.226 4.009-3.401 8.562-3.401 13.166 0 1.289.092 2.594.272 3.876.529 3.746 3.74 6.452 7.417 6.452.35 0 .703-.024 1.059-.074 4.102-.58 6.957-4.374 6.378-8.476-.084-.59-.126-1.188-.126-1.778 0-2.093.51-4.073 1.517-5.887 2.009-3.621.703-8.188-2.919-10.197z" />
                                <path
                                    d="m109.328 359.531c1.919 0 3.839-.732 5.304-2.196l9.039-9.039c2.929-2.93 2.929-7.678 0-10.607-2.93-2.928-7.678-2.928-10.607 0l-9.039 9.039c-2.929 2.93-2.929 7.678 0 10.607 1.464 1.463 3.384 2.196 5.303 2.196z" />
                                <path
                                    d="m175.637 408.077c.698-4.083-2.046-7.959-6.129-8.656-1.576-.27-3.206-.406-4.843-.406h-9.186c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h9.186c.793 0 1.571.064 2.315.191.428.073.853.108 1.272.108 3.588 0 6.76-2.582 7.385-6.237z" />
                                <path
                                    d="m147.581 461.766-9.039 9.039c-2.929 2.93-2.929 7.678 0 10.607 1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196l9.039-9.039c2.929-2.93 2.929-7.678 0-10.607-2.93-2.928-7.678-2.928-10.608 0z" />
                                <path
                                    d="m114.393 494.954-4.242 4.242c-2.929 2.93-2.929 7.678 0 10.607 1.465 1.464 3.385 2.196 5.304 2.196s3.839-.732 5.304-2.196l4.242-4.242c2.929-2.93 2.929-7.678 0-10.607-2.93-2.928-7.678-2.928-10.608 0z" />
                            </g>
                        </g>
                    </svg>
                    <p>{{session()->get('success')}} </p>
                    <a class="btn btn-outline-primary " href="{{route('contact')}}">Kembali</a>
                </div>
            </div>
        </div>
        @else

        <div class="section-title" data-aos="fade-up">
            <h2>Hubungi Kami</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4 col-md-6 mt-4 mt-md-0 mb-3 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form flex-column justify-content-start h-100 py-4" data-aos="fade-up">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p>Jl. Solo-Karanganyar Km. 7, Triyagan, Kec. Mojolaban, Kabupaten Sukoharjo, Jawa
                                Tengah 57554</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p>info@example.com</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p>(0271) 6881188</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-md-6">
                <div class="contact-form py-4" data-aos="fade-up">
                    <form action="{{route('sendMail')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') {{'is-invalid'}}@enderror"
                                        value="{{old('name')}}" />
                                    @error('name') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') {{'is-invalid'}}@enderror"
                                        name="email" value="{{old('email')}}" />
                                    @error('email') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Telp.</label>
                            <input type="text" class="form-control @error('phone') {{'is-invalid'}}@enderror"
                                name="phone" value="{{old('phone')}}" />
                            @error('phone') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="subject">Judul Pesan</label>
                            <input type="text" class="form-control @error('subject') {{'is-invalid'}}@enderror"
                                name="subject" value="{{old('subject')}}" />
                            @error('subject') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan Anda</label>
                            <textarea class="form-control @error('message') {{'is-invalid'}}@enderror"
                                name="message">{{old('message')}}{{(session()->has('link') ? session()->get('link') : '')}}</textarea>
                            @error('message') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class=" text-center form-group mt-4">
                            <button class="btn btn-detail-primary" type="submit">
                                <i class="bx bx-mail-send"></i>Kirim pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>

@endsection

@push('scripts')
<script>
    $('[title]').tooltip();
    $(window).scroll(function (e) {
        if(window.scrollY > 5){
            $('#header').addClass('header-scrolled');
        }
        $('#header').find('li:nth-child(1)').removeClass('active');
        $('#header').find('ul:nth-child(1) > li:nth-child(5)').addClass('active');
    })
</script>
@endpush
