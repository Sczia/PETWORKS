@extends('Petworks.admin.index')
@section('page-title')
    Client and Pets Record
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between  align-items-center">
                    <h6>@yield('page-title')</h6>

                    <div class="d-flex justify-content-end ">
                        <a class="btn btn-danger mb-0" href="{{ route('admin.reminder.index') }}">
                            <span class="d-flex align-items-center"><i class="fa-solid fa-bell"></i>&#160; Remind</span>
                        </a>
                    </div>
                </div>


                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive ">
                        <table class="table align-items-center mb-0" id="clients-table">
                            <thead {{-- class="table-warning text-black" --}}>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Number
                                    </th>

                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
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
                                                <a class="btn btn-link text-info px-3 mb-0"
                                                    href="{{ route('admin.owner.show', $owner->id) }} ">
                                                    <i class="fa-solid fa-eye text-info me-2"
                                                        aria-hidden="true"></i>show</a>
                                            </div>
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
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#clients-table').DataTable();
        });
    </script>
@endsection



