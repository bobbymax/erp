@extends('layouts.master')
@section('title', 'ERP Protal | Create Group Grade')
@section('content')
<form class="mt-5" method="POST" action="{{ route('gradeGroups.update', $gradeGroup->id) }}">
	@csrf
	@method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="name">Grade Group Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $gradeGroup->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="grades">Grades</label>
                <input class="form-control form-control-sm{{ $errors->has('grades') ? ' is-invalid' : '' }}" type="text" name="grades" value="{{ $gradeGroup->grades }}">

                @if ($errors->has('grades'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('grades') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="airport_shuttle">Airport Shuttle</label>
                <input class="form-control form-control-sm{{ $errors->has('airport_shuttle') ? ' is-invalid' : '' }}" type="number" name="airport_shuttle" value="{{ $gradeGroup->allowance->airport_shuttle }}">

                @if ($errors->has('airport_shuttle'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('airport_shuttle') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="local_flight_ticket">Local Flight Ticket</label>
                <input class="form-control form-control-sm{{ $errors->has('local_flight_ticket') ? ' is-invalid' : '' }}" type="number" name="local_flight_ticket" value="{{ $gradeGroup->allowance->local_flight_ticket }}">

                @if ($errors->has('local_flight_ticket'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('local_flight_ticket') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="intra_city_shuttle">Intra City Shuttle</label>
                <input class="form-control form-control-sm{{ $errors->has('intra_city_shuttle') ? ' is-invalid' : '' }}" type="number" name="intra_city_shuttle" value="{{ $gradeGroup->allowance->intra_city_shuttle }}">

                @if ($errors->has('intra_city_shuttle'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('intra_city_shuttle') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="ph_transit">YEN to PH Transit</label>
                <input class="form-control form-control-sm{{ $errors->has('ph_transit') ? ' is-invalid' : '' }}" type="number" name="ph_transit" value="{{ $gradeGroup->allowance->ph_transit }}">

                @if ($errors->has('ph_transit'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('ph_transit') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="out_of_pocket">Out of Pocket</label>
                <input class="form-control form-control-sm{{ $errors->has('out_of_pocket') ? ' is-invalid' : '' }}" type="number" name="out_of_pocket" value="{{ $gradeGroup->allowance->out_of_pocket }}">

                @if ($errors->has('out_of_pocket'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('out_of_pocket') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Update Grade Group
	    	</button>
	    	<a href="{{ route('gradeGroups.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop