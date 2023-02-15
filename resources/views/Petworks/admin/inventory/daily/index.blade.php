@extends('Petworks.admin.index')
@section('page-title')
    Daily Transaction
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center mb-3 pb-0">

                    <div class="col">
                        <h6>@yield('page-title')</h6>
                        <div class="d-flex justify-content-end mt-3">
                            <a class="btn btn-primary mb-0 mx-1"  href="{{ route('admin.daily.download') }}" target="__blank">
                                <span class="d-flex align-items-center"><i class="fa-solid fa-print"></i>&#160; Print</span>
                            </a>
                            <a class="btn btn-success mb-0"  href="{{ route('admin.daily.export') }}" target="__blank">
                                <span class="d-flex align-items-center"><i class="fa-solid fa-table"></i>&#160; Excel</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead {{-- class="table-warning text-black" --}}>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no.
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient
                                    </th>
                                    <th class="text-uppercase text-secondary  text-center  text-xxs font-weight-bolder opacity-7">Transaction
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount
                                    </th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($daylies as $daily)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $loop->index + 1 }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $daily->appointment->owner->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $daily->appointment->pet->pet_name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">

                                                <button type="button" class="btn btn-link text-info" data-bs-toggle="modal"
                                                data-bs-target="#show{{ $daily->id }} ">   <i class="fa fa-eye" aria-hidden="true"></i> Show

                                                </button>
                                                @include('Petworks.admin.inventory.daily.modal.show')
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">₱{{ number_format($daily->amount, 2, '.', ',') }}
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-level-javascript')
    <script>
        $(document).ready(function() {
            $('#daily').DataTable(
                'odering': false
            );
        });
    </script>
@endsection
