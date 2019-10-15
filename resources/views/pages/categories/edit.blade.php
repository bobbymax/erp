@extends('layouts.master')
@section('title', 'ERP Protal | Edit Category')
@section('content')
<form class="mt-5" method="POST" action="{{ route('categories.update', $category->id) }}">
	@csrf
    @method('PATCH')
    
	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="name">Category Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $category->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="module_id">Category Module</label>
                <select name="module_id" class="form-control form-control-sm{{ $errors->has('module_id') ? ' is-invalid' : '' }}">
                    <option>Select Module</option>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}" {{ $category->module_id === $module->id ? ' selected' : '' }}>{{ $module->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('module_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('module_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="icon">Category Icon</label>
                <input class="form-control form-control-sm{{ $errors->has('icon') ? ' is-invalid' : '' }}" type="text" name="icon" value="{{ $category->icon }}">

                @if ($errors->has('icon'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('icon') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-12 mt-2">
	    	<button type="submit" name="submit" class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Update Category
	    	</button>
	    	<a href="{{ route('categories.index') }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop