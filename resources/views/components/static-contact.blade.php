<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Hubungi kami</h2>
        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-lg-4 col-md-6 mt-4 mt-md-0 mb-3 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form flex-column h-100 justify-content-start" data-aos="fade-up">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p>Jl. Solo-Karanganyar Km. 7, Triyagan, Mojolaban, Sukoharjo, Jawa
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

            <div class="col-12 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-form" data-aos="fade-up">
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
                                name="message">{{old('message')}}</textarea>
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

    </div>
</section>
