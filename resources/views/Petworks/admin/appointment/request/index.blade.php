@extends('Petworks.admin.index')
@section('page-title')
    List of Request Appointments
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center mb-3 pb-0">

                    <div class="col">
                        <h6>@yield('page-title')</h6>
                    </div>
                    <div class="col">
                        {{-- <div class="d-flex justify-content-end align-items-center ">
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected>Records</option>
                            @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">{{ $appointment->reason }}</option>
                            @endforeach
                        </select>
                        <button class="ms-2 bg-info text-white btn">
                            Reset
                        </button>
                    </div> --}}
                    </div>
                </div>

                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="appointmentTable">
                            <thead {{-- class="table-warning text-black" --}}>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pet
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason
                                        of
                                        Appointment
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        More info
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $appointment->owner->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $appointment->pet->pet_name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $appointment->service->service }}</h6>
                                            </div>
                                        </td>




                                        {{-- BUTTONS --}}
                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-info px-3 mb-0" href="#"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#view{{ $appointment->id }}">
                                                    <i class="fa-solid fa-eye text-info me-2" aria-hidden="true"></i>
                                                    Show
                                                </button>
                                                @include('Petworks.admin.appointment.request.modal._show')
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-success px-3 mb-0" href="#"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#confirm{{ $appointment->id }}">
                                                    <i class="fa-solid fa-circle-check text-success me-2"
                                                        aria-hidden="true"></i>
                                                    Accept
                                                </button>
                                                @include('Petworks.admin.appointment.request.modal._cancel')
                                                @include('Petworks.admin.appointment.request.modal._confirm')
                                            </div>
                                        </td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="8">No Requests</td>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('#appointmentTable').DataTable(

            );
        });
    </script>
@endsection
