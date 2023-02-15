@extends('Petworks.admin.index')
@section('page-title')
    List of Canceled Appointments
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

                    </div>
                </div>

                <div class="card-body  pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pet
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason
                                        of
                                        Appointment
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cancel
                                        by
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        More info
                                    </th>

                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $appointment->owner->name }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $appointment->pet->pet_name }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $appointment->service->service }}</h6>
                                        </td>

                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $appointment->cancelled_by }}</h6>
                                        </td>


                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-info px-3 mb-0" href="#"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#show{{ $appointment->id }}">
                                                    <i class="fa-solid fa-eye text-info me-2" aria-hidden="true"></i>
                                                    Show
                                                </button>
                                            </div>
                                            @include('Petworks.admin.appointment.cancel.modal._show')
                                        </td>

                                    </tr>

                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="8">No Records</td>
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
            $('#cancel').DataTable(
                'odering': false
            );
        });
    </script>
@endsection
