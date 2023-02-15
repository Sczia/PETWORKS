<div>
    <div class="row mb-3">

        {{-- TABLEEEEEEE --}}
        <div class="card ">
            <div class="card-body p-0">
                <div class="row">
                    {{-- owner info --}}
                    <div class="col">
                        <div class="card-header border-0 text-bold mt-3 mb-3">
                            <h5 class="card-title mb-3 text-center text-info">Owner Details</h5>

                            <hr class="horizontal dark mt-1">
                            <p class="card-text">Name: {{ $owner->name }}</p>
                            <p class="card-text ">Email: {{ $owner->email }}</p>
                            <p class="card-text">Address: {{ $owner->address }}</p>
                            <p class="card-text">Contact: {{ $owner->number }}</p>
                            {{-- <select class="form-select mt-1" aria-label="Default select example" name="reason_id"
                                wire:model='reason_id'>
                                <option selected>Appointments</option>
                                @forelse ($services as $service)
                                <option value="{{ $service->reason_id }}">{{ $service->service->service }}</option>
                                @empty
                                <option value="">No Appointments</option>
                                @endforelse
                            </select> --}}

                        </div>
                        {{-- client info --}}
                    </div>
                    {{-- pet info --}}
                    <div class="col">
                        <div class="card-header border-0 text-bold mt-3 mb-3">
                            <h5 class="card-title mb-3 text-center text-info">Pet Details</h5>

                            <hr class="horizontal dark mt-1">
                            <select class="form-select mt-1 mb-1" aria-label="Default select example" name="pet_id"
                                wire:model='pet_id'>
                                <option selected value="">Pet Name</option>
                                @foreach ($owner->pets as $pet)
                                <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                                @endforeach
                            </select>
                            <p class="card-text">Pet name: {{ $pet_name }}</p>
                            <p class="card-text">Pet Type: {{ $pet_type }}</p>
                            <p class="card-text">Date of Birth: {{ $pet_birthdate }}</p>
                            <p class="card-text">Age: {{ $pet_age }}</p>
                            <p class="card-text">Gender: {{ $pet_gender }}</p>
                            <p class="card-text">Breed: {{ $pet_breed }}</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center mb-3 pb-0">
                <h5 class="card-title">Record's Information</h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead {{-- class="table-warning text-black" --}}>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Reason
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Date & time
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Doctor
                                </th>
                                <th class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7">
                                    More
                                 </th>
                                 <th class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7">
                                     Action
                                 </th>


                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($services as $consultation)
                            <tr>

                                <td>{{ $consultation->service->service }}</td>
                                <td>
                                    <div class="d-flex flex-column px-2 py-1">
                                        <h5 class="mb-0 text-sm">{{ date('F d, Y', strtotime($consultation->date)) }}</h5>
                                        <p class="text-sm text-secondary mb-0">
                                            {{ date('H:i A', strtotime($consultation->time)) }}
                                        </p>
                                    </div>
                                </td>
                                <td>{{ $consultation->doctor->name}}</td>
                                <td>
                                    <div>
                                        <button type="button" class="btn btn-link btn-sm text-info"
                                            data-bs-toggle="modal" data-bs-target="#show{{ $consultation->id }}">
                                            <i class="fa-solid fa-eye text-info me-2" aria-hidden="true"></i>
                                            Show
                                        </button>
                                        @include('Petworks.admin.owner.modal._show')
                                    </div>
                                </td>
                               <td>
                                    <div>
                                        <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $consultation->id }}">
                                            <i class="fa-solid fa-pen-to-square text-primary me-2"
                                                aria-hidden="true"></i>
                                            Edit
                                        </button>
                                        @include('Petworks.admin.owner.modal._edit')
                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <span>No Consultation Available</span>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $services->links() }}
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
