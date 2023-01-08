@extends('Petworks.homecontents.mainContents')


@section('contents')
    <section class="home" id="home">

        <div class="container">

            <div class="row align-items-center text-center text-md-left min-vh-100">
                <div class="col-md-6">
                    <span>PETWORKS</span>
                    <h3>Veterinarian is not just a job it's my passion</h3>
                    {{-- <a href="#" class="link-btn">get started</a> --}}
                </div>
            </div>

        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <div class="container">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="images/animals-group-home.png" class="w-100" alt="">
                </div>
                <div class="col-md-6">
                    {{-- <span>Why choose us?</span> --}}
                    <h3 class="title">Mission</h3>

                    <p class="text-justify"> To provide excellent veterinary service by utilizing the highest standards of
                        care.</p>
                    <p class="text-justify"> To provide the highest quality medical and surgical care to our patients while
                        providing our
                        clients with education and assistance in all aspects of animal care and ownership.</p>
                    <p class="text-justify"> To provide exceptional care to our clients and patients during every visit in a
                        caring and
                        compassionate manner.</p>
                    <p class="text-justify">
                        To provide the highest standards of health care to the pets we serve.</p>
                    </p>



                    <h3 class="title">Vision</h3>
                    <p class="text-justify">Petworks Veterinary Clinic works to be the most trusted and respected pet care
                        provider in our community by administering the best possible medical and emotional care and giving
                        outstanding customer service to every patient and every client every visit.</p>


                    {{-- <div class="icons-container">
                        <div class="icons">
                            <i class="fa-solid fa-x-ray"></i>
                            <h3>X-ray</h3>
                        </div>
                        <div class="icons">
                            <i class="fa-solid fa-vial-virus"></i>
                            <h3>Laboratory</h3>
                        </div>
                        <div class="icons">
                            <i class="fa-solid fa-stethoscope"></i>
                            <h3>Check-up</h3>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    {

    <!-- menu section starts  -->

    <section class="menu" id="menu">

        <h1 class="heading pb-3"> our services </h1>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/Services.png') }}" alt="Services" class="img-fluid">
                </div>
            </div>


        </div>

    </section>


    {{-- <div class="container-fluid my-5">
                <h1 class="text-center fw-bold display-1 mb-5">Owl <span class="text-danger">Carousel</span></h1>
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="owl-carousel owl-theme">
                            <div class="item mb-4">
                                <div class="card border-0 shadow">
                                    <img src="1.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>Owl Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card border-0 shadow">
                                    <img src="3.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>Owl Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card border-0 shadow">
                                    <img src="4.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>Owl Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card border-0 shadow">
                                    <img src="5.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>Owl Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card border-0 shadow">
                                    <img src="6.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>Owl Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card border-0 shadow">
                                    <img src="7.jpg" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>Owl Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}

    </div>
    </section>

    <!-- menu section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading pb-3"> our gallery </h1>

        <div class="box-container container">

            <div class="container mb-4">

                <div class="row g-3" data-aos="fade-right" data-aos-offset="0" data-aos-delay="50" data-aos-duration="1000"
                    data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true"
                    data-aos-anchor-placement="top">
                    @foreach ($albums as $album)
                        <div class="col-md-4 col-sm-4 ">
                            <a href="{{ route('gallery.show', ['id' => $album->id]) }}"
                                class="text-decoration-none text-dark">
                                <div class="card shadow-sm">
                                    <img class="card-img-top card-img-full-2" src="{{ asset($album->path) }}"
                                        alt="{{ $album->photo }}" />
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $album->title }}</h4>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">{{ date('M d, Y', strtotime($album->date)) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('gallery.index') }}" class="link-btn text-center">more photos</a>
        </div>

    </section>

    <!-- gallery section ends -->

    <!-- reviews section starts  -->

    <section class="reviews" id="reviews">

        <h1 class="heading pb-3">Clinic Doctor</h1>

        <div class="box-container container">

            {{-- <div class="box">
                <img src="images/pic-1.png" alt="">
                <h3>Cecille Sy</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita
                    laudantium blanditiis cupiditate at natus, quam alias?</p>

            </div> --}}

            <div class="box">
                <img src="images/doc.png" alt="">
                <h3>Doctor Luealla</h3>
                <p>Clinic Doctor</p>

            </div>
            <div class="box">
                <img src="images/doc.png" alt="">
                <h3>Cecille Sy</h3>
                <p>Owner and Founder of Petworks Veterinary Clinic</p>

            </div>
            <div class="box">
                <img src="images/doc.png" alt="">
                <h3>Doctor Edmundo Sy</h3>
                <p>Clinic Doctor</p>

            </div>



        </div>

    </section>

    <!-- reviews section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> contact us </h1>

        <div class="container">

            <div class="contact-info-container">

                <div class="box">
                    <i class="fas fa-phone"></i>
                    <h3>phone</h3>
                    <p>0917 175 0505</p>
                    {{-- <p>+111-222-3333</p> --}}
                </div>

                <div class="box">
                    <i class="fas fa-envelope"></i>
                    <h3>email</h3>
                    <p>petworksclinic@gmail.com</p>
                    {{-- <p>anasbhai@gmail.com</p> --}}
                </div>

                <div class="box">
                    <i class="fas fa-map"></i>
                    <h3>address</h3>
                    <p>South Gate Building, National Highway, Bulilan Sur 4010 Pila, Philippines</p>
                </div>

            </div>

            <div class="row align-items-center">

                <div class="col-md-6 mb-5 mb-md-0 ">
                    <iframe class="map w-100"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15469.512602901928!2d121.3588218697754!3d14.2311493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc58d2d9423ff24a7!2sPetworks%20Veterinary%20Clinic!5e0!3m2!1sen!2sph!4v1660398316012!5m2!1sen!2sph"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <form action="{{ route('admin.contact.store') }}" class="col-md-6" method="POST">
                    @csrf
                    <h3>get in touch</h3>
                    <input type="text" placeholder="your name" name="name" class="box">
                    <input type="text" placeholder="email" name="email" class="box">
                    {{-- <input type="number" placeholder="phone" class="box"> --}}
                    <textarea type="message" name="message" placeholder="message" class="box" id="" cols="30"
                        rows="10"></textarea>
                    <input type="submit" value="send message" class="link-btn">
                </form>

            </div>

        </div>

    </section>

    <!-- contact section ends -->

    <!-- blogs section starts  -->

    {{-- <section class="blogs" id="blogs">

        <h1 class="heading"> our daily posts </h1>

        <div class="box-container container">

            <div class="box">
                <div class="image">
                    <img src="images/g-img-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
                    <a href="#" class="link-btn">read more</a>
                </div>
                <div class="icons">
                    <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
                    <span> <i class="fas fa-user"></i> by admin </span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/g-img-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
                    <a href="#" class="link-btn">read more</a>
                </div>
                <div class="icons">
                    <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
                    <span> <i class="fas fa-user"></i> by admin </span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/g-img-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>blog title goes here.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
                    <a href="#" class="link-btn">read more</a>
                </div>
                <div class="icons">
                    <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
                    <span> <i class="fas fa-user"></i> by admin </span>
                </div>
            </div>

        </div>

    </section> --}}

    <!-- blogs section ends -->

    <!-- newsletter section starts  -->

    <section class="newsletter">
        <div class="container">
            <h3>Thank you for vsiting our website</h3>
            {{-- <p>subscribe for latest upadates</p>
            <form action="">
                <input type="email" name="" placeholder="enter your email" id="" class="email">
                <input type="submit" value="subscribe" class="link-btn">
            </form> --}}
        </div>
    </section>

    <!-- newsletter section ends -->

    <!-- footer section starts  -->

    <section class="footer container">

        <a href="#" class="logo"> <img id="logo" src="{{ asset('images/petworks.png') }}"
                alt="">Petworks </a>


        <div class="share">
            <a href="https://www.facebook.com/petworksclinic" class="fab fa-facebook-f"></a>
            <a href="https://www.instagram.com/petworksclinic/" class="fa-brands fa-instagram"></a>
            <a href="https://twitter.com/petworksclinic" class="fab fa-twitter"></a>
            {{-- <a href="#" class="fab fa-github"></a> --}}
        </div>
        <p class="credit"> created by <span>BSIT 4-1 PUP Calauan Campus</span> | all rights reserved 2023 </p>

    </section>
    <!-- footer section ends -->
@endsection
