
<div class="card-body">
    <div class="row">
        <div class="col border-end">
            @switch($currentStep)
                @case(1)
                    {{-- PET --}}
                    <div class="row">
                        <hr class="horizontal dark mt-0">
                        <h5 class="text-center text-bold text-success mt-0">Pet Information</h5>
                        <hr class="horizontal dark mt-0">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="complaint">Chief
                                Complaint:<span class="text-danger ">*</span></label>
                            <input type="text" class="form-control" name="complaint" id="complaint"
                                placeholder="Cheif Complaint" wire:model='complaint' required>
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-6">
                            <label for="weight">Body Weight:<span class="text-danger ">*</span></label>
                            <input type="number" class="form-control" name="weight" id="weight" placeholder="Body Weight" wire:model='weight' required>
                        </div>
                        <div class="col-md-6">
                            <label for="diet">Diet:<span class="text-danger ">*</span></label>
                            <input type="text" class="form-control" name="diet" id="diet" placeholder="Diet" wire:model='diet' required>
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-6">
                            <label for="hr">HR:<span class="text-danger ">*</span></label>
                            <input type="number" class="form-control" name="hr" id="hr" placeholder="HR" wire:model='hr' required>
                        </div>
                        <div class="col-md-6">
                            <label for="rr">RR:<span class="text-danger ">*</span></label>
                            <input type="number" class="form-control" name="rr" id="rr" placeholder="RR" wire:model='rr' required>
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-3">
                            <label for="temperature">Temperature:<span class="text-danger ">*</span></label>
                            <input type="number" class="form-control" name="temperature" id="temperature"
                                placeholder="Temperature" wire:model='temperature' required>
                        </div>
                        <div class="col-md-3">
                            <label for="color">Color:<span class="text-danger ">*</span></label>
                            <input type="text" class="form-control" name="color" id="color" placeholder="Color" wire:model='color' required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="next_visit">Next Visit:<span class="text-danger ">*</span></label>
                            <input type="date" class="form-control" name="next_visit" id="next_visit" placeholder="Next" wire:model='next_visit' required>
                        </div>
                        <div class="col-md-6">
                            <label for="doctor">Doctor:<span class="text-danger ">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="doctor_id" id="doctor_id" wire:model='doctor_id' required>
                                <option selected>--- Selecet Doctor ---</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="picture">Picture<span class="text-danger ">*</span></label>
                            <input class="form-control" type="file" id="picture" multiple wire:model='photos'>
                        </div>
                    </div>
                 {{--    <div class="row mb-3">
                        <div class="col">
                            <label for="history">Medical History:</label>
                            <textarea class="form-control" placeholder="What is the Medical History?" id="history" name="history" wire:model='history'></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="prescription">Prescription:</label>
                            <textarea class="form-control" placeholder="Doctors prescription" id="prescription" name="prescription" wire:model='prescription'></textarea>
                        </div>
                    </div> --}}



                  {{--   <div class="row mb-3">
                        <div class="col">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" wire:model='comment'></textarea>
                        </div>
                    </div> --}}
                @break

                @case(2)
                    <div class="row mb-3" style="height: 90%">
                        <div class="col-md-6">
                            <label for="category_id">Category:</label>
                            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id"
                                wire:model='category_id' required>
                                <option selected>--- Selecet category ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 ">
                            <label for="productId">Products:</label>
                            <select class="form-select" aria-label="Default select example" name="product" id="productId"
                                wire:model='productId' required>
                                <option value="">--- Selecet Product ---</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @break

                @default
            @endswitch

            <div class="d-flex justify-content-between  align-items-center">
                @if ($currentStep == 1)
                    <div></div>
                @endif
                @if ($currentStep != 1)
                    <button type="button" class="btn btn-secondary" wire:loading.attr="disabled"  wire:click="back()">Back</button>
                @endif
                @if ($currentStep != $totalSteps)
                    <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:click="next()">Next</button>
                @endif
                @if ($currentStep == $totalSteps)
                    <button type="submit" class="btn btn-success"  wire:loading.attr="disabled" wire:click="submit()">Submit</button>
                @endif
            </div>
        </div>
        {{-- -----------------------------------RECEIPT-------------------- --}}
        <div class="col">

            <div class="row">
                <hr class="horizontal dark mt-0">
                <h5 class="text-center text-bold text-success mt-0">Billing Statement</h5>
                <hr class="horizontal dark mt-0">
            </div>
            <h6 class="text-left text-bold text-primary mt-0">Products</h6>
            <hr class="horizontal dark mt-0">
            <table class="table align-items-center mb-0" id="confirm">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($selected_products as $product)
                        <tr>
                            <td>{{ $product->product->product_name }}</td>
                            <td>{{ $product->product->price }}</td>
                            <td>
                                <div class="d-flex">
                                   <div class="row">
                                            <div class="col">
                                                <button class="btn btn-sm btn-success px-2 my-0" wire:click='increase({{ $product->product_id }})'><i class="fa fa-plus " aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col border">
                                                <span>{{ $product->quantity }}</span>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-sm btn-danger px-2 my-0" wire:click='decrease({{ $product->product_id }})'><i class="fa fa-minus" aria-hidden="true"></i></button>
                                            </div>
                                   </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <div class="d-flex justify-content-end me-3">
                                <span>Total: {{ number_format($sub_product, 2) }}</span>
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
            <h6 class="text-left text-bold text-primary mt-3">Services</h6>
            <hr class="horizontal dark mt-0 ">
            <table class="table align-items-center mb-0" id="confirm">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                           Service
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price
                        </th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td> {{ $appointment->service->service }}</td>
                        <td>{{$appointment->service->price }}</td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="3">
                            <div class="d-flex justify-content-end me-3">
                                <span>Total: {{ number_format($sub_service, 2) }}</span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <div class="d-flex justify-content-end me-3">
                                <span>Overall Total: {{ number_format($total, 2) }}</span>
                            </div>
                        </th>
                    </tr>


                </tfoot>


            </table>


            <div class="d-flex justify-content-end mt-3">
                <a class="btn btn-primary mb-0"  href="{{ route('admin.confirm.download', ['id'=>$appointment_id]) }}" target="__blank">
                    <span class="d-flex align-items-center"><i class="fa-solid fa-print"></i>&#160; Print</span>
                </a>
            </div>
        </div>




    </div>
</div>
