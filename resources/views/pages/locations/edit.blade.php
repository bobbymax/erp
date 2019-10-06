@extends('layouts.master')
@section('title', 'ERP Protal | Edit Location')
@section('content')
<form class="mt-5" method="POST" action="{{ route('locations.update', $location->id) }}">
	@csrf
    @method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $location->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="short">Short Form</label>
                <input class="form-control form-control-sm{{ $errors->has('short') ? ' is-invalid' : '' }}" type="text" name="short" value="{{ $location->short }}">

                @if ($errors->has('short'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('short') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="travel_category_id">Travel Category</label>

                <select name="travel_category_id" class="form-control form-control-sm{{ $errors->has('travel_category_id') ? ' is-invalid' : '' }}">
                	<option value="" selected>Select where Applicable</option>
                	<option value="0" {{ $location->travel_category_id == 0 ? ' selected' : '' }}>None</option>
                	@foreach ($travels as $travel)
                		<option value="{{ $travel->id }}" {{ $location->travel_category_id == $travel->id ? ' selected' : '' }}>{{ $travel->type }}</option>
                	@endforeach
                </select>

                @if ($errors->has('travel_category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('travel_category_id') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="local_flight_ticket">Flight Ticket Required?</label>

                <select name="local_flight_ticket" class="form-control form-control-sm{{ $errors->has('local_flight_ticket') ? ' is-invalid' : '' }}">
                	<option value="" selected>Select where Applicable</option>
                	<option value="1" {{ $location->local_flight_ticket == 1 ? ' selected' : '' }}>Yes</option>
                	<option value="0" {{ $location->local_flight_ticket == 0 ? ' selected' : '' }}>No</option>
                </select>

                @if ($errors->has('local_flight_ticket'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('local_flight_ticket') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Update Location
	    	</button>
	    	<a href="{{ route('locations.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop