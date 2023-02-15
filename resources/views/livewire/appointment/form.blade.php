<div>
    @switch($currentStep)
        @case(1)
            <div class="card shadow bg-light mt-5 ">
                <div class="card-header bg-pw-primary py-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="height-30 width-30" src="{{ asset('images/header.png') }}" alt="">
                    </div>
                    <h1 class="text-center mb-1 card-title text-white">Welcome!</h1>
                    <h6 class="text-center text-white">Petworks Veterinary Clinic</h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center align-items-center my-3">
                        <div class="col-md-5 text-center">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mb-3" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Book Appointment
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" wire:click='new' href="#">New Client</a></li>
                                    <li><a class="dropdown-item" wire:click='old' href="#">Existing Client</a></li>
                                    <li><a class="dropdown-item" wire:click='cancel' href="#">Cancel Appointment</a></li>
                                </ul>
                            </div>
                            {{--  <button type="button" class="btn btn-info mb-3" wire:click='new'>Book Appointment</button>
                            <button type="button" class="btn btn-primary mb-3" wire:click='old'>Excisting Appointment</button> --}}

                            <a class="btn btn-link" href="{{ route('home.index') }} ">Back to home</a>
                        </div>




                    </div>
                </div>
            </div>
        @break

        @case(2)
            @if ($isNewClient)
                <div class="card bg-light shadow">
                    <div class="card-header  bg-pw-primary  py-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="height-30 width-30" src="{{ asset('images/header.png') }}" alt="">
                        </div>
                        <h4 class="mb-2 text-white text-center">Appointment / Scheduling Form</h4>
                        <h6 class="text-white text-center">Petworks Veterinary Clinic</h6>
                    </div>
                    <form wire:submit.prevent='appointment'>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center  text-info">Owner Information</h5>
                            <div class="row mb-3">

                                <div class=" col-md-12 ">
                                    <label>Owner Name<span class="text-danger ">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name "
                                        wire:model='name' >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6 ">
                                    <label>Email<span class="text-danger ">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"
                                        wire:model='email' >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 ">
                                    <label>Contact number<span class="text-danger ">*</span></label>
                                    <input type="tel" name="number"
                                        class="form-control @error('number') is-invalid @enderror"
                                        placeholder="Enter Contact number" wire:model='number'  maxlength="12">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-md-12 ">
                                    <label>Address<span class="text-danger ">*</span></label>
                                    <input type="text" name="address" class="form-control " placeholder="Enter Address "
                                        wire:model='address' >
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <hr class="horizontal dark">
                            <h5 class="card-title mb-3 text-center text-warning">Pet Information</h5>

                            <div class="row mb-3">
                                <div class="col-md-6 ">
                                    <label>Pet's Name<span class="text-danger ">*</span></label>
                                    <input type="text " name="pet_name"
                                        class="form-control @error('pet_name') is-invalid @enderror"
                                        placeholder="Enter Pet name " wire:model='pet_name' >
                                    @error('pet_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 ">
                                    <label>Color<span class="text-danger ">*</span></label>
                                    <input type="text " name="color"
                                        class="form-control @error('color') is-invalid @enderror" placeholder="Color"
                                        wire:model='color' >
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 ">
                                    <label>Type of pet<span class="text-danger ">*</span></label>
                                    <input type="text " name="pet_type"
                                        class="form-control @error('pet_type') is-invalid @enderror"
                                        placeholder="Enter type of pet " wire:model='pet_type' >
                                    @error('pet_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Breed<span class="text-danger ">*</span></label>
                                    <input type="text " name="breed"
                                        class="form-control  @error('breed') is-invalid @enderror" placeholder="Enter breed "
                                        wire:model='breed' >
                                    @error('breed')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label>Birthdate<span class="text-danger ">*</span></label>
                                    <input type="date" name="birthdate"
                                        id="birthdate"class="form-control  @error('birthdate') is-invalid @enderror"
                                        placeholder="Enter birthdate " wire:model='birthdate' >
                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label>Age<span class="text-danger ">*</span></label>
                                    <input type="number" name="age"
                                        class="form-control  @error('age') is-invalid @enderror" placeholder="Enter Age"
                                        wire:model='age' >
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Gender<span class="text-danger ">*</span></label>
                                    <select class="form-select @error('gender') is-invalid @enderror"
                                        aria-label="Default select example"name="gender" wire:model='gender' >
                                        <option selected value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12 ">
                                    <label>Reason of Appointment<span class="text-danger ">*</span></label>
                                    <select class="form-select @error('reason_id') is-invalid @enderror" name="reason_id"
                                        aria-label="Default select example " wire:model='reason_id' >
                                        <option selected value="">Open this and select</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service }}</option>
                                        @endforeach
                                    </select>
                                    @error('reason_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <div class="col-md-6">
                                    <label>Date<span class="text-danger">*</span></label>
                                    <input type="date" name="date" id="date"
                                        class="form-control @error('date') is-invalid @enderror" placeholder="Enter Date"
                                        wire:model='date' >
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Time<span class="text-danger">*</span></label>
                                    <input type="text" name="time" id="time"
                                        class="form-control @error('time') is-invalid @enderror" placeholder="Enter Time"
                                        wire:model='time' >
                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <hr class="horizontal dark">

                            <p class="text-justify text-bold"> NOTE: Please be advised that once you book an appointment at the
                                clinic, the clinic will give you 15
                                minutes of excess time. After that 15 minutes, if you're still not in the clinic, your
                                appointment will be automatically void.</p>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                    >
                                    <label class="form-check-label" for="invalidCheck">
                                        I Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between py-3">
                            <button type="button" class="btn btn-secondary" wire:click='back'>Back</button>
                            <button class="btn btn-success float-end" type="submit" wire:submit>Submit</button>
                        </div>
                    </form>
                </div>
            @endif

            @if ($isOldClient)
                @if ($hasEmail)
                    <div class="card bg-light shadow ">
                        <div class="card-header  bg-pw-primary  py-3">
                            {{-- <div class="d-flex justify-content-center align-items-center">
                                <img class="height-30 width-30" src="{{asset('images/header.png')}}" alt="">
                            </div> --}}
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="height-30 width-30" src="{{ asset('images/header.png') }}" alt="">
                            </div>
                            <h4 class="mb-2 text-white text-center">Appointment / Scheduling Form</h4>
                            <h6 class="text-white text-center">Petworks Veterinary Clinic</h6>
                        </div>
                        <form wire:submit.prevent='appointment'>
                            <div class="card-body">
                                <div class="row mb-3">
                                    @if (!$addPet)
                                        <div class="col-md-7">
                                            <label>Pets</label>
                                            <select class="form-select @error('pet_id') is-invalid @enderror" name="pet_id"
                                                aria-label="Default select example " wire:model='pet_id'>
                                                <option selected>Open this and select</option>
                                                @foreach ($pets as $pet)
                                                    <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pet_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="col-md-7">

                                        </div>
                                    @endif
                                    <div class="col-md-5">
                                        <input type="checkbox" class="custom-checkbox" {{ $addPet ? 'checked' : '' }}
                                            wire:click='addPet'> {{ $addPet ? 'Cancel' : 'Add Pet' }}</input>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <h5 class="card-title mb-3 text-center text-warning">Pet Information</h5>
                                <hr class="horizontal dark">
                                @if ($addPet)
                                    <div class="row mb-3">
                                        <div class="col-md-12 ">
                                            <label>Pet's Name<span class="text-danger ">*</span></label>
                                            <input type="text " name="pet_name"
                                                class="form-control @error('pet_name') is-invalid @enderror"
                                                placeholder="Enter Pet name " wire:model='pet_name'>
                                            @error('pet_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 ">
                                            <label>Type of pet<span class="text-danger ">*</span></label>
                                            <input type="text " name="pet_type"
                                                class="form-control @error('pet_type') is-invalid @enderror"
                                                placeholder="Enter type of pet " wire:model='pet_type'>
                                            @error('pet_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 ">
                                            <label>Age<span class="text-danger ">*</span></label>
                                            <input type="number" name="age"
                                                class="form-control  @error('age') is-invalid @enderror"
                                                placeholder="Enter Age" wire:model='age'>
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Birthdate<span class="text-danger ">*</span></label>
                                            <input type="date" name="birthdate"
                                                id="birthdate"class="form-control  @error('birthdate') is-invalid @enderror"
                                                placeholder="Enter birthdate " wire:model='birthdate'>
                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Gender<span class="text-danger ">*</span></label>
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                aria-label="Default select example"name="gender" wire:model='gender'
                                            >
                                                <option selected>Selecet Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Breed<span class="text-danger ">*</span></label>
                                            <input type="text " name="breed"
                                                class="form-control  @error('breed') is-invalid @enderror"
                                                placeholder="Enter breed " wire:model='breed'>
                                            @error('breed')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Color<span class="text-danger ">*</span></label>
                                            <input type="text " name="color"
                                                class="form-control  @error('color') is-invalid @enderror"
                                                placeholder="Enter color " wire:model='color'>
                                            @error('color')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <h5 class="card-title">Pet Information</h5>
                                        <p class="card-text">Pet name: {{ $dpet_name }}</p>
                                        <p class="card-text">Pet Type: {{ $dpet_type }}</p>
                                        <p class="card-text">Date of Birth: {{ $dbirthdate }}</p>
                                        <p class="card-text">Age: {{ $dage }}</p>
                                        <p class="card-text">Gender: {{ $dgender }}</p>
                                        <p class="card-text">Breed: {{ $dbreed }}</p>
                                    </div>
                                    <hr class="horizontal dark">
                                @endif
                                <div class="row mb-3">
                                    <div class="col-md-12 ">
                                        <label>Reason of Appointment<span class="text-danger ">*</span></label>
                                        <select class="form-select @error('reason_id') is-invalid @enderror" name="reason_id"
                                            aria-label="Default select example " wire:model='reason_id'>
                                            <option selected value="">Open this and select</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service }}</option>
                                            @endforeach
                                        </select>
                                        @error('reason_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" row mb-3">
                                    <div class="col-md-6">
                                        <label>Date<span class="text-danger">*</span></label>
                                        <input type="date" name="date" id="date"
                                            class="form-control @error('date') is-invalid @enderror" placeholder="Enter Date"
                                            wire:model='date'>
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Time<span class="text-danger">*</span></label>
                                        <input type="type" name="time" id="time"
                                            class="form-control @error('time') is-invalid @enderror" placeholder="Enter Time"
                                            wire:model='time'>
                                        @error('time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="horizontal dark">
                                <p class="text-justify text-bold"> NOTE: Please be advised that once you book an appointment at
                                    the clinic, the clinic will give you 15
                                    minutes of excess time. After that 15 minutes, if you're still not in the clinic, your
                                    appointment will be automatically void.
                                </p>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                        >
                                        <label class="form-check-label" for="invalidCheck">
                                            I Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 d-flex justify-content-between py-3">
                                <button type="button" class="btn btn-secondary" wire:click='back'>Back</button>
                                <button class="btn btn-success" type="submit" wire:submit>Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card bg-light shadow">
                        <div class="card-header  bg-pw-primary bg-transparent border-0">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="height-30 width-30" src="{{ asset('images/header.png') }}" alt="">
                            </div>
                        </div>
                        <hr class="mx-3">
                        <div class="card-body">

                            <div class="mt-3">
                                <label for="emailAddress" class="form-label">Email</label>
                                <input type="email" class="form-control  @error('emailAddress') is-invalid @enderror"
                                    id="emailAddress" name="emailAddress" placeholder="name@example.com"
                                    wire:model='emailAddress'>
                                @error('emailAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                            <div></div>
                            <button type="submit" class="btn btn-success" wire:click='verifyEmail'>Submit</button>
                        </div>
                    </div>
                @endif
            @endif
            @if ($cancel)
                @if ($hasEmail)
                    <div class="card bg-light shadow">
                        <div class="card-header  bg-pw-primary py-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="height-30 width-30" src="{{ asset('images/header.png') }}" alt="">
                            </div>

                            <h4 class="mb-2  text-center text-white ">Cancel Appointment</h4>
                            <h6 class="text-white text-center ">Petworks Veterinary Clinic</h6>

                        </div>
                        <div class="card-body">

                            <table class="table align-items-center mb-0" id="confirm">
                                <thead class="thead-light">

                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-info">
                                            Pet name
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-info">
                                            Reason
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-info">
                                            Date & Time
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-info">
                                            Action
                                        </th>
                                    </tr>

                                </thead>

                                <tbody>
                                    @forelse ($appointments as $appointment)
                                        <tr>

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
                                            <td>
                                                <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ date('M d, Y', strtotime($appointment->date)) }} -
                                                        {{ date('h:i A', strtotime($appointment->time)) }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                    @if ($cancelBtn && $appointment->id == $cancelId)
                                                        <span>Cancel this appointment?</span>
                                                        <div class="d-flex">
                                                            <button class="btn btn-sm btn-success me-1"
                                                                wire:click='cancelAppointment({{ $appointment->id }})'>
                                                                Yes
                                                            </button>
                                                            <button class="btn btn-sm btn-secondary" wire:click="no">
                                                                No
                                                            </button>
                                                        </div>
                                                    @else
                                                        <button class="btn btn-danger btn-sm"
                                                            wire:click='cancelButton({{ $appointment->id }})'>Cancel</button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No appointments found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- bootstrap alert with close button  --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="card bg-light shadow">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="height-30 width-30" src="{{ asset('images/header.png') }}" alt="">
                        </div>
                        <hr class="mx-3">
                        <div class="card-body">
                            <div class="mt-3">
                                <label for="emailAddress" class="form-label">Email</label>
                                <input type="email" class="form-control  @error('emailAddress') is-invalid @enderror"
                                    id="emailAddress" name="emailAddress" placeholder="Enter your email address"
                                    wire:model='emailAddress'>
                                @error('emailAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                            <div></div>
                            <button type="submit" class="btn btn-success" wire:click='verifyEmail'>Submit</button>
                        </div>
                    </div>
                @endif
            @endif
        @break

    @endswitch
</div>
