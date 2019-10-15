@extends('layouts.master')
@section('title', 'ERP Protal | Create Permission')
@section('content')
<form method="POST" action="{{ route('permissions.update', $permission->id) }}">
	@csrf
	@method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="name">Permission Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $permission->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="code">Permission Code</label>
                <input class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}" type="text" name="code" value="{{ $permission->code }}">

                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Update Permission
	    	</button>
	    	<a href="{{ route('permissions.index') }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop