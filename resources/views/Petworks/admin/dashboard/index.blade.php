@extends('Petworks.admin.index')
@section('tab-title')
    Dashboard
@endsection
@section('contents')
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        div.card.item :hover {
            background-color: #7ba0c5;
        }
    </style>
<<<<<<< HEAD
=======

    <div class="row mt-3 mb-5">
        <h3 class="text-white">Records</h3>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('admin.owner.index') }}">
=======
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<style>
div.card.item :hover {
  background-color: #7ba0c5;
}
</style>
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41

    <div class="row mt-3 mb-5">


        <h3 class="text-white">{{ Auth::guard('admin')->user()->roles }} Dashboard</h3>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('admin.owner.index') }}">
                <div class="card item">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Client Record</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $recordCount }}
                                    </h5>
                                    <a class="mb-0 text-decoration-underline" href="#">
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="fa-solid fa-clipboard-user text-lg opacity-10"></i>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        @if (Auth::guard('admin')->user()->roles == 'Secretary' || Auth::guard('admin')->user()->roles == 'Owner')
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
           {{--      <h3 class="text-white">Contact Us</h3> --}}
                <a href="{{ route('admin.contact.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Contact us</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $contactCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa-solid fa-message text-lg opacity-10"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>



<<<<<<< HEAD


    @if (Auth::guard('admin')->user()->roles == 'Secretary' || Auth::guard('admin')->user()->roles == 'Owner')
        <div class="row">
            <h3 style="text-color:#7ba0c5;">Appointments</h3>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.appointment.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Request</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $requestCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-exclamation text-lg opacity-10"></i>
=======
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('admin.appointment.index') }}">
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
                <div class="card item">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
<<<<<<< HEAD
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Records</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $recordCount }}
=======
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Request</p>
                                    <h5 class="font-weight-bolder">
                                    {{ $requestCount }}
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
                                    </h5>
                                    <a class="mb-0 text-decoration-underline" href="#">
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="fa-solid fa-clipboard-user text-lg opacity-10"></i>
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </a>
            </div>
=======
                </div>
            </a>
<<<<<<< HEAD
        </div>
    </div>

    @if (Auth::guard('admin')->user()->roles == 'Admin' || Auth::guard('admin')->user()->roles == 'Owner')
        <div class="row">
            <h3 style="text-color:#7ba0c5;">Appointments</h3>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.appointment.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Request</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $requestCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-exclamation text-lg opacity-10"></i>

                                    </div>
=======
        </div>
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.pending.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $pendingCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-question text-lg opacity-10"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.confirm.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Confirm</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $confirmCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-check text-lg opacity-10"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.cancel.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Cancelled</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $cancelledCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-xmark text-lg opacity-10"></i>

<<<<<<< HEAD
                                    </div>
=======
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                </a>
            </div>
        </div>
    @endif
=======
<<<<<<< HEAD
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.pending.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $pendingCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-question text-lg opacity-10"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.confirm.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Confirm</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $confirmCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-check text-lg opacity-10"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('admin.cancel.index') }}">
                    <div class="card item">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Cancelled</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $cancelledCount }}
                                        </h5>
                                        <a class="mb-0 text-decoration-underline" href="#">
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="fa-solid fa-person-circle-xmark text-lg opacity-10"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif
=======
                </div>
            </a>
        </div>
    </div>
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41

    <div class="border mt-4"></div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Latest Client Records</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead {{-- class="table-warning text-black" --}}>
                                <tr>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number
                                    </th>
<<<<<<< HEAD

                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
=======

                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
=======
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number</th>

                                     <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($owners as $owner)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column px-2 py-1">
                                                <h5 class="mb-0 text-sm">{{ $owner->name }}</h5>
                                                <p class="text-sm text-secondary mb-0">
                                                    {{ $owner->email }}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $owner->address }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $owner->number }}</h6>
                                            </div>
                                        </td>





                                        {{-- BUTTONS --}}
                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
                                                <a class="btn btn-link text-info px-3 mb-0"
                                                    href="{{ route('admin.owner.show', $owner->id) }} ">
                                                    <i class="fa-solid fa-eye text-info me-2"
                                                        aria-hidden="true"></i>show</a>
<<<<<<< HEAD
                                            </div>
                                        </td>
                                    </tr>
                                @empty
=======
                                            </div>
                                        </td>
                                    </tr>
                                @empty
=======
                                                <a class="btn btn-link text-info px-3 mb-0" href="{{ route('admin.owner.show',$owner->id) }} ">
                                                    <i class="fa-solid fa-eye text-info me-2" aria-hidden="true"></i>show</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
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

<<<<<<< HEAD
    <!-- Sample Graph
=======
<<<<<<< HEAD
    <!-- Sample Graph

        <div class="row border d-flex justify-content-center mt-4">
            <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
        </div>

        <script>
            var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
            var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 6,
                                max: 16
                            }
                        }],
                    }
                }
            });
        </script> -->
@endsection
=======
<!-- Sample Graph
        
<div class="row border d-flex justify-content-center mt-4">
    <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
</div>
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41

                    <div class="row border d-flex justify-content-center mt-4">
                        <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
                    </div>

                    <script>
                        var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
                        var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

<<<<<<< HEAD
                        new Chart("myChart", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    fill: false,
                                    lineTension: 0,
                                    backgroundColor: "rgba(0,0,255,1.0)",
                                    borderColor: "rgba(0,0,255,0.1)",
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            min: 6,
                                            max: 16
                                        }
                                    }],
                                }
                            }
                        });
                    </script> -->
@endsection
=======
    
    @endsection
>>>>>>> 9c86e61f634a9df0335d01cacf2ce0597478a84a
>>>>>>> 0f040bdc1886cac621b42cde3077632f83f9ad41
