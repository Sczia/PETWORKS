<div class="modal" id="edit{{ $sale->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h5 class="modal-title text-white font-weight-bold " id="exampleModalLongtitle">
                    Edit Sales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">


                <form action="{{ route('admin.sale.update', $sale->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="row g-3 mb-2">

                        <div class="col-md-6">
                            <label for="product_name" class="text-dark text-black font-weight-bold">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name"
                                placeholder="Product name" value="{{ $sale->product_name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="brand_name" class="text-dark text-black font-weight-bold">Brand</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="brand_name"
                                value="{{ $sale->brand_name }}">
                        </div>
                    </div>

                    <div class="row g-3">


                       {{--  <div class="col-md-6">
                            <label for="category_id" class="text-dark text-black font-weight-bold">Category</label>
                            <input type="text" class="form-control" name="category_id" id="category_id"
                                placeholder="Category" value="{{ $sale->category_id }}">
                        </div> --}}

                        <div class="col-md-6">
                            <label for="category_id" class="text-dark text-black font-weight-bold">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example"name="category_id" wire:model='category_id'>
                                <option selected>Selecet Category</option>
                                <option value="Food">Food</option>
                                <option value="Medicine">Medicine</option>
                                <option value="Products">Products</option>
                                <option value="Vaccines">Vaccines</option>
                            </select>
                        </div>


                        <div class="col-md-6">
                            <label for="date" class="text-dark text-black font-weight-bold">Date</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="Date"
                                value="{{ $sale->date }}">
                        </div>
                    </div>



                    <div class="row g-3 mb-3">

                        <div class="col-md-6">
                            <label for="price" class="text-dark text-black font-weight-bold">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price"
                                value="{{ $sale->price }}">
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="text-dark text-black font-weight-bold">Initial Stocks</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock"
                                value="{{ $sale->stock }}">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">

                        <div class="col-md-4">
                            <label for="sold" class="text-dark text-black font-weight-bold">Stock sold</label>
                            <input type="number" class="form-control" name="sold" id="sold" placeholder="sold"
                                value="{{ $sale->sold }}">
                        </div>
                        <div class="col-md-4">
                            <label for="remain" class="text-dark text-black font-weight-bold">Stock Remain</label>
                            <input type="number" class="form-control" name="remain" id="remain" placeholder="Stock Remain"
                                value="{{ $sale->remain }}">
                        </div>
                        <div class="col-md-4">
                            <label for="sale" class="text-dark text-black font-weight-bold">Sales</label>
                            <input type="number" class="form-control" name="sale" id="sale" placeholder="Sales"
                                value="{{ $sale->sale }}">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>



        </div>
    </div>
</div>
