@extends('layouts.master')
@section('title', 'ERP Protal | Create Grade Level')
@section('content')
<form class="mt-5" method="POST" action="{{ route('grades.store') }}">
	@csrf
	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-8 mt-2">
	        <div class="form-group">
                <label for="name">Grade Level Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Enter Grade Level name">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="code">Grade Level Code</label>
                <input class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}" type="text" name="code" placeholder="Enter Grade Level Code">

                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Create Grade Level
	    	</button>
	    	<a href="{{ route('grades.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop