<div class="modal fade" id="edit{{ $consultation->id }}" tabindex="-1" role="dialog" wire:ignore>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">

                <h5 class="modal-title text-light font-weight-bold">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.owner.update', $consultation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="history" class="text-dark text-black font-weight-bold">Medical History<span class="text-danger ">*</span></label>
                        <input type="text" class="form-control" name="history" id="history" placeholder=""
                            value="{{ $consultation->history }}">
                    </div>
                    <div class="mb-3">
                        <label for="prescription" class="text-dark text-black font-weight-bold">Prescription<span class="text-danger ">*</span></label>
                        <input type="text" class="form-control" name="prescription" id="prescription" placeholder=""
                            value="{{ $consultation->prescription }}">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="text-dark text-black font-weight-bold">Comment<span class="text-danger ">*</span></label>
                        <input type="text" class="form-control" name="comment" id="comment" placeholder=""
                            value="{{ $consultation->comment }}">
                    </div>




                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif



                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
