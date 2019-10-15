@extends('layouts.master')
@section('title', 'ERP Protal | Edit Grade Level')
@section('content')
<form class="mt-5" method="POST" action="{{ route('grades.update', $grade->id) }}">
	@csrf
    @method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-5 mt-2">
	        <div class="form-group">
                <label for="name">Grade Level Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $grade->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="code">Grade Level Code</label>
                <input class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}" type="text" name="code" value="{{ $grade->code }}">

                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="per_diem_local">Local Per Diem</label>
                <input class="form-control form-control-sm{{ $errors->has('per_diem_local') ? ' is-invalid' : '' }}" type="text" name="per_diem_local" value="{{ $grade->per_diem_local }}">

                @if ($errors->has('per_diem_local'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('per_diem_local') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="per_diem_international">International Per Diem</label>
                <input class="form-control form-control-sm{{ $errors->has('per_diem_international') ? ' is-invalid' : '' }}" type="text" name="per_diem_international" value="{{ $grade->per_diem_international }}">

                @if ($errors->has('per_diem_international'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('per_diem_international') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="airport_shuttle">Airport Shuttle</label>
                <input class="form-control form-control-sm{{ $errors->has('airport_shuttle') ? ' is-invalid' : '' }}" type="text" name="airport_shuttle" value="{{ $grade->airport_shuttle }}">

                @if ($errors->has('airport_shuttle'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('airport_shuttle') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="transport_to_ph">Transport to PH</label>
                <input class="form-control form-control-sm{{ $errors->has('transport_to_ph') ? ' is-invalid' : '' }}" type="text" name="transport_to_ph" value="{{ $grade->transport_to_ph }}">

                @if ($errors->has('transport_to_ph'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('transport_to_ph') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="intra_city_transport_local">Intra City</label>
                <input class="form-control form-control-sm{{ $errors->has('intra_city_transport_local') ? ' is-invalid' : '' }}" type="text" name="intra_city_transport_local" value="{{ $grade->intra_city_transport_local }}">

                @if ($errors->has('intra_city_transport_local'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('intra_city_transport_local') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Update Grade Level
	    	</button>
	    	<a href="{{ route('grades.index') }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop