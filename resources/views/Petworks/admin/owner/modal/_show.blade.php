<div class="modal fade" id="show{{ $consultation->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">

                <h5 class="modal-title text-light font-weight-bold">Pet Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="card">

                    <div class="card-header">
                        @foreach ($consultation->photos as $photo)

                        <img src="{{ asset($photo->path) }}" alt="Photo" class="card-img" style="height: 100px; width: 100px">

                        @endforeach
                    </div>
                    <hr class="horizontal dark mt-0">
                    <div class="card-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td class="text-left font-weight-bold">Cheif Complaint:</td>
                                    <td class="text-left">{{ $consultation->complaint}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Body Weight:</td>
                                    <td class="text-left">{{ $consultation->weight }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">HR:</td>
                                    <td class="text-left">{{ $consultation->hr }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">RR: </td>
                                    <td class="text-left">{{ $consultation->rr }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Temperature:</td>
                                    <td class="text-left">{{ $consultation->complaint }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Diet: </td>
                                    <td class="text-left">{{ $consultation->diet }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Next Visit:</td>
                                    <td class="text-left"> {{ date('F d, Y', strtotime($consultation->next_visit)) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Doctor: </td>
                                    <td class="text-left">{{ $consultation->doctor->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Medical History:</td>
                                    <td class="text-left">{{ $consultation->history }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Prescription: </td>
                                    <td class="text-left">{{ $consultation->prescription }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left font-weight-bold">Comment:</td>
                                    <td class="text-left"> {{ $consultation->comment }}</td>
                                </tr>


                            </tbody>
                        </table>


                    </div>


                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
            </div>
        </div>

    </div>
</div>
