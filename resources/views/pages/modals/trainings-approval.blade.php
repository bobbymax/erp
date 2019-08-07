<form action="{{ route('approve.training.submit', $training->id) }}" method="POST">
    @csrf
    <div class="modal fade" id="reviewTraining{{ $training->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Review Training</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Staff Name:</strong> {{ $training->owner->name . " (" . $training->owner->staff_no . ")" }}</p>
                            <p><strong>Organisers:</strong> {{ $training->provider }}</p>
                            <p><strong>Course Title:</strong> {{ $training->title }}</p>
                            <p><strong>Venue:</strong> {{ $training->location }}</p>
                            <p><strong>Date:</strong> {{ $training->start_date->format('d F') . " - " . $training->end_date->format('d F, Y') }}</p>  
                            <p>{{ $training->end_date->diffInDays($training->start_date) }}</p> 
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Action</label>
                                <select class="form-control form-control-sm" name="status">
                                    <option value="">Select Action</option>
                                    <option value="1">Approve</option>
                                    <option value="0">Decline</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comment">Leave a Remark</label>
                                <textarea class="form-control" rows="6" name="comment"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti-na"></i>&nbsp;&nbsp;Close</button>
                    <button type="submit" class="btn btn-primary"><i class="ti-server"></i>&nbsp;&nbsp;Submit Review</button>
                </div>
            </div>
        </div>
    </div>
</form>