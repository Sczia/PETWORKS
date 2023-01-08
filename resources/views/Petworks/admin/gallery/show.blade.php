@extends('Petworks.admin.index')
@section('page-title')
    {{ $gallery->title }}
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center mb-3 pb-0">

                    <div class="col">
                        <h6>Album -@yield('page-title')</h6>
                    </div>


                    <div class="col">
                        {{-- back to products index   --}}
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-secondary mb-0" type="button" href="{{ route('admin.gallery.index') }}">
                                <span class="d-flex align-items-center"><i class="fas fa-arrow-circle-left"></i>&#160;
                                    Back</span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class=" row p-3">
                    @foreach ($gallery->photos as $photo)
                        <div class="col-sm-5 col-md-5 col-lg-4">
                            <div class="card shadow-sm">
                                <img class="rounded-3 card-img-200" style="height: 300px;" src="{{ url('/storage/'.$photo->path) }}"
                                    alt="{{ $photo->photo }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection


@section('dashboard-javascript')
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#photos-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
