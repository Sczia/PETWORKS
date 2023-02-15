<div class="modal" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h5 class="modal-title text-white font-weight-bold " id="exampleModalLongtitle">
                    Edit Doctor's name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">


                <form action="  {{ route('admin.doctor.update', $doctor->id) }}   " method="POST">
                    @csrf
                    @method('PUT')


                    <div class="row g-3 mb-2">

                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">Doctor
                                name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Doctor name" value="{{ $doctor->name }}">
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
