@extends('Petworks.admin.index')
@section('page-title')
    {{ $category->category_name }}
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
                            <a class="btn btn-secondary mb-0" type="button" href="{{ route('admin.product.index') }}">
                                <span class="d-flex align-items-center"><i class="fas fa-arrow-circle-left"></i>&#160; Back
                                    to Products</span>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead {{-- class="table-warning text-black" --}}>
                                <tr>


                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product
                                        name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand
                                        name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Initial
                                        Stocks
                                    </th>

                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $product->product_name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $product->brand_name }}</h6>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ date('F d, Y', strtotime($product->date)) }}
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">???{{ number_format($product->price, 2, '.', ',') }}
                                                </h6>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="d-flex flex-column justify-content-center px-2 py-1">
                                                <h6 class="mb-0 text-sm">{{ $product->stock }}</h6>
                                            </div>
                                        </td>



                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-primary px-3 mb-0" href="#"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target=" #edit{{ $product->id }} ">
                                                    <i class="fa-solid fa-pen-to-square text-primary me-2"
                                                        aria-hidden="true"></i>
                                                    Edit
                                                </button>
                                                @include('Petworks.admin.inventory.product.modal._edit')
                                            </div>
                                        </td>




                                    </tr>
                                @endforeach
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
            $('#products').DataTable(
                'odering': false
            );
        });
    </script>
@endsection
