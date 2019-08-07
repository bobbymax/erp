@extends('layouts.master')
@section('title', 'ERP Protal | Create Training')
@section('page-title', 'Add Training')
@section('content')
<form class="mt-5" method="POST" action="{{ route('trainings.store') }}">
	@csrf
	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="title">Course Title</label>
                <input class="form-control form-control-sm{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" placeholder="Enter Course Title" value="{{ old('title') }}">

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="provider">Training Provider</label>
                <input class="form-control form-control-sm{{ $errors->has('provider') ? ' is-invalid' : '' }}" type="text" name="provider" placeholder="Enter Course Provider" value="{{ old('provider') }}">

                @if ($errors->has('provider'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('provider') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="location">Training Location</label>
                <input class="form-control form-control-sm{{ $errors->has('location') ? ' is-invalid' : '' }}" type="text" name="location" placeholder="Enter Training Location" value="{{ old('location') }}">

                @if ($errors->has('location'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="amount">Training Cost (optional)</label>
                <input class="form-control form-control-sm{{ $errors->has('amount') ? ' is-invalid' : '' }}" type="number" name="amount" placeholder="Amount of Course" value="{{ old('amount') }}">

                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="location_during_training">Status during training</label>
                <input class="form-control form-control-sm{{ $errors->has('location_during_training') ? ' is-invalid' : '' }}" type="text" name="location_during_training" placeholder="Status during this training? NCDMB or ..." value="{{ old('location_during_training') }}">

                @if ($errors->has('location_during_training'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location_during_training') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input class="fandate form-control form-control-sm{{ $errors->has('start_date') ? ' is-invalid' : '' }}" type="text" name="start_date" placeholder="When did you start this training?" value="{{ old('start_date') }}">

                @if ($errors->has('start_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input class="fandate form-control form-control-sm{{ $errors->has('end_date') ? ' is-invalid' : '' }}" type="text" name="end_date" placeholder="When did it end?" value="{{ old('end_date') }}">

                @if ($errors->has('end_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="certificate">Upload Certificate</label>
                <input class="form-control form-control-sm{{ $errors->has('certificate') ? ' is-invalid' : '' }}" type="file" name="certificate" placeholder="Upload certificate (if any)" value="{{ old('certificate') }}">

                @if ($errors->has('certificate'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('certificate') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <input type="hidden" name="formType" value="archived">



	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Add Training
	    	</button>
	    	<a href="{{ route('trainings.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop
@section('scripts')

<script>
    $( function() {
        $( ".fandate" ).datepicker({
            dateFormat : 'dd-mm-yy'
        });
    });
</script>
@stop