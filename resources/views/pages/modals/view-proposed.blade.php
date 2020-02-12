<div class="modal fade" id="viewTraining{{ $training->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $training->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    @if ($training->status === 'manager-approved')
                        <span class="badge badge-pill badge-info">manager approved</span>
                    @elseif($training->status === 'approved')
                        <span class="badge badge-pill badge-success">approved</span>
                    @elseif($training->status === 'pending')
                        <span class="badge badge-pill badge-primary">pending</span>
                    @else
                        <span class="badge badge-pill badge-danger">denied</span>
                    @endif

                    <div class="mt-3">
                        <p><strong>Provider:</strong> {{ $training->provider }}</p>
                        <p><strong>Duration:</strong> {{ $training->start_date->format('d M, Y') . " - " . $training->end_date->format('d M, Y') }}</p>
                        <p><strong>Category:</strong> {{ $training->category_id !== 0 ? $training->category->name : 'Uncategorized' }}</p>
                        <p><strong>Location:</strong> {{ $training->location }}</p>
                        <h6 class="mt-3 mt-2">Comment</h6>
                        <p>{!! $training->proposed->comment !!}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti-na"></i>&nbsp;&nbsp;Close</button>
                </div>
            </div>
        </div>
    </div>