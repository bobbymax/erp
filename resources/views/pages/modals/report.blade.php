<form action="{{ route('reports.store', $ticket->id) }}" method="POST">
    @csrf
    <div class="modal fade" id="generateReport{{ $ticket->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Report for {{ $ticket->code }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <select name="type" class="form-group form-control">
                        <option value="">Select Ticket Status</option>
                        <option value="unresolved">Unresolved</option>
                        <option value="resolved">Resolved</option>
                    </select>
                    <textarea name="report" class="form-control" rows="7"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti-na"></i>&nbsp;&nbsp;Close</button>
                    <button type="submit" class="btn btn-primary"><i class="ti-check"></i>&nbsp;&nbsp; Submit Report</button>
                </div>
            </div>
        </div>
    </div>
</form>