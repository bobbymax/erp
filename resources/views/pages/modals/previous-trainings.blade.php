<div class="modal fade" id="reviewTraining{{ $training->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Previous Trainings for {{ $training->owner->name }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                @if ($training->owner->trainings->count() > 0)
                    <div class="row">
                        @foreach ($training->owner->trainings as $single)
                            @if ($single->completed === 1 && $single->category_id !== 0)
                                <div class="col-6 mb-3">
                                    <h5>{{ strtoupper($single->title) }}</h5>
                                    <p>Provider: {{ $single->provider }}</p>
                                    <p>Duration: {{ $single->start_date->format('d M, Y') . " - " . $single->end_date->format('d M, Y') }}</p>
                                    <p>Category: <span class="badge badge-pill badge-success">{{ $single->category->name }}</span></p>
                                </div>
                            @endif
                            
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti-na"></i>&nbsp;&nbsp;Close</button>
            </div>
        </div>
    </div>
</div>