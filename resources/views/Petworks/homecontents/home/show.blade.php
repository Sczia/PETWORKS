 @extends('Petworks.homecontents.mainContents')
@section('title')
    <span class="text">{{ $gallery->title }}</span>
@endsection
@section('page-title')
<li class="breadcrumb-item"><a href="{{ route('gallery.index')}}">Gallery</a></li>

@endsection
{{-- @section('page-sub-title')
    <li class="breadcrumb-item" aria-current="page">{{ $gallery->title }}</li>
@endsection --}}
@section('contents')
    <section class="py-3 c-mt-nv" style="margin-top: 100px;">
        <div class="container mb-5">
            @include('Petworks.homecontents.layouts.page-titles')
            <div class="card" data-aos="fade-up" data-aos-offset="0" data-aos-delay="50" data-aos-duration="1000"
            data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true"
            data-aos-anchor-placement="top">
                <div class="card-body">
                    <div class="row g-3">
                       @foreach ($gallery->photos as $photo)
                            <div class="col-sm-5 col-md-5 col-lg-4">
                                <div class="card shadow-sm">
                                    <img class="rounded-3 card-img-200" src="{{ asset($photo->path) }}" alt="{{ $photo->photo }}">
                                </div>
                            </div>
                        @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
