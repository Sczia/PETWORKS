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
                   {{--  <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input class="form-control" type="file" id="picture" wire:model='picture'>
                    </div>

                    <div wire:loading wire:target="picture">Uploading...</div> --}}

                   {{--  <div class="mb-3">
                        <label for="complaint" class="text-dark text-black font-weight-bold">Chief Complaint</label>
                        <input type="text" class="form-control" name="complaint" id="complaint" placeholder=""
                            value="{{ $consultation->complaint }}">
                    </div>

                    <div class="mb-3">
                         <label for="weight" class="text-dark text-black font-weight-bold">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder=""
                            value="{{ $consultation->weight }}">
                    </div>

                    <div class="mb-3">
                        <label for="hr" class="text-dark text-black font-weight-bold">HR</label>
                        <input type="text" class="form-control" name="hr" id="hr" placeholder=""
                            value="{{ $consultation->hr }}">
                    </div>

                    <div class="mb-3">
                         <label for="rr" class="text-dark text-black font-weight-bold">RR</label>
                        <input type="text" class="form-control" name="rr" id="rr" placeholder=""
                            value="{{ $consultation->rr }}">
                    </div>
                    <div class="mb-3">
                        <label for="temperature" class="text-dark text-black font-weight-bold">Temperature</label>
                        <input type="text" class="form-control" name="temperature" id="temperature" placeholder=""
                            value="{{ $consultation->temperature }}">
                    </div>
                    <div class="mb-3">
                        <label for="diet" class="text-dark text-black font-weight-bold">Diet</label>
                        <input type="text" class="form-control" name="diet" id="diet" placeholder=""
                            value="{{ $consultation->diet }}">
                    </div> --}}
              {{--       <div class="mb-3">
                         <label for="history" class="text-dark text-black font-weight-bold">Doctor</label>
                        <input type="text" class="form-control" name="doctor_id" id="doctor_id" placeholder=""
                            value="{{ $consultation->doctor_id }}">
                    </div> --}}
               {{--      <div class="mb-3">
                        <label for="next_visit" class="text-dark text-black font-weight-bold">Next Visit</label>
                        <input type="text" class="form-control" name="next_visit" id="next_visit" placeholder=""
                            value="{{ $consultation->next_visit }}">
                    </div> --}}
                    <div class="mb-3">
                        <label for="history" class="text-dark text-black font-weight-bold">Medical History</label>
                        <input type="text" class="form-control" name="history" id="history" placeholder=""
                            value="{{ $consultation->history }}">
                    </div>
                    <div class="mb-3">
                        <label for="prescription" class="text-dark text-black font-weight-bold">Prescription</label>
                        <input type="text" class="form-control" name="prescription" id="prescription" placeholder=""
                            value="{{ $consultation->prescription }}">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="text-dark text-black font-weight-bold">Comment</label>
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
