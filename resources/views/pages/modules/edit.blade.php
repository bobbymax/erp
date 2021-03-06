@extends('layouts.master')
@section('title', 'ERP Protal | Create Module')
@section('content')
<form method="POST" action="{{ route('modules.update', $module->id) }}">
	@csrf
	@method('PATCH')
	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="name">Module Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $module->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="icon">Module Icon</label>
                <input class="form-control form-control-sm{{ $errors->has('icon') ? ' is-invalid' : '' }}" type="text" name="icon" value="{{ $module->icon }}">

                @if ($errors->has('icon'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('icon') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="permission">Module Permission</label>
                <input class="form-control form-control-sm{{ $errors->has('permission') ? ' is-invalid' : '' }}" type="text" name="permission" value="{{ $module->permission }}">

                @if ($errors->has('permission'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('permission') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-3 mt-2">
	        <div class="form-group">
                <label for="route">Module Route</label>
                <input class="form-control form-control-sm{{ $errors->has('route') ? ' is-invalid' : '' }}" type="text" name="route" value="{{ $module->route }}">

                @if ($errors->has('route'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('route') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Update Module
	    	</button>
	    	<a href="{{ route('modules.index') }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop