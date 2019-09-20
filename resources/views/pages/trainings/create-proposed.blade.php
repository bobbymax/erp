@extends('layouts.master')
@section('title', 'ERP Protal | Create Proposed Training')
@section('page-title', 'Propose Training')
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
                <label for="amount">Training Cost</label>
                <input class="form-control form-control-sm{{ $errors->has('amount') ? ' is-invalid' : '' }}" type="number" name="amount" placeholder="Proposed Amount of Training" value="{{ old('amount') }}">

                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('amount') }}</strong>
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
                <label for="training_type">Training Type</label>

                <select name="training_type" class="form-control form-control-sm{{ $errors->has('training_type') ? ' is-invalid' : '' }}">
                    <option>Select Type of Training</option>
                    <option value="local">Local</option>
                    <option value="international">International</option>
                </select>

                @if ($errors->has('training_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('training_type') }}</strong>
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
                <label for="location_during_training">Training Sponsor</label>

                <select name="location_during_training" class="form-control form-control-sm{{ $errors->has('location_during_training') ? ' is-invalid' : '' }}">
                    <option>Select Training Sponsor</option>
                    <option value="NCDMB">NCDMB</option>
                    <option value="Personal">Personal</option>
                </select>

                @if ($errors->has('location_during_training'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location_during_training') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-3 mt-2">
            <div class="form-group">
                <label for="start_date">Proposed Start Date</label>
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
                <label for="end_date">Proposed End Date</label>
                <input class="fandate form-control form-control-sm{{ $errors->has('end_date') ? ' is-invalid' : '' }}" type="text" name="end_date" placeholder="When did it end?" value="{{ old('end_date') }}">

                @if ($errors->has('end_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <input type="hidden" name="formType" value="proposal">



	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-check"></i>&nbsp;&nbsp; Propose Training
	    	</button>
	    	<a href="{{ route('propose.trainings') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
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