@extends('Petworks.admin.index')
@section('page-title')

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
                        {{-- back to products index   --}}
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-secondary mb-0" type="button" href="{{ route('admin.sale.index') }}">
                                <span class="d-flex align-items-center"><i class="fas fa-arrow-circle-left"></i>&#160;
                                    Back
                                    to Sale</span>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>


                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date
                                        Purchased
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price
                                    </th>

                                    <th class="text-uppercase text-secondary  text-center text-xxs font-weight-bolder opacity-7">Stock
                                        Sold
                                    </th>




                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($sales as $sale)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">

                                                   {{date('F d, Y', strtotime($sale->created_at ))}}</h6>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">
                                                    ₱{{ number_format($sale->product->price, 2, '.', ',') }}</h6>
                                            </div>
                                        </td>



                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1 text-center">
                                                <h6 class="mb-0 text-sm">{{ $sale->quantity }}</h6>
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

@section('page-level-javascript')
    <script>
        $(document).ready(function() {
            $('#sales').DataTable(
                'odering': false
            );
        });
    </script>
@endsection
