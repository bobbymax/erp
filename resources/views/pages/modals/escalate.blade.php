<form action="{{ route('reports.store', $ticket->id) }}" method="POST">
    @csrf
    <div class="modal fade" id="transferRequest{{ $ticket->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Escalate Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id">Escalate Ticket To</label>
                        <select name="user_id" class="form-control form-control-sm">
                            <option>Select User</option>
                            @foreach ($users as $user)
                                @if ($user->groups->contains('label', 'administrators') && auth()->user()->id !== $user->id)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="report">Reason</label>
                        <textarea name="report" class="form-control" rows="7"></textarea>
                    </div>
                    <input type="hidden" name="type" value="transfer">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti-na"></i>&nbsp;&nbsp;Close</button>
                    <button type="submit" class="btn btn-primary"><i class="ti-check"></i>&nbsp;&nbsp;Submit Request</button>
                </div>
            </div>
        </div>
    </div>
</form>