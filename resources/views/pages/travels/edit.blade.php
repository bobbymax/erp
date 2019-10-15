@extends('layouts.master')
@section('title', 'ERP Protal | Edit Travel Category')
@section('content')
<form class="mt-5" method="POST" action="{{ route('travels.update', $travel->id) }}">
	@csrf
	@method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="type">Travel Type</label>
                <input class="form-control form-control-sm{{ $errors->has('type') ? ' is-invalid' : '' }}" type="text" name="type" value="{{ $travel->type }}">

                @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="locations">Locations</label>
                <input class="form-control form-control-sm{{ $errors->has('locations') ? ' is-invalid' : '' }}" type="text" name="locations" value="{{ $travel->locations }}">

                @if ($errors->has('locations'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('locations') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Edit Travel Category
	    	</button>
	    	<a href="{{ route('travels.index') }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop