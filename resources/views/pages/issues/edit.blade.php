@extends('layouts.master')
@section('title', 'ERP Protal | Create Issue')
@section('content')
<form class="mt-5" method="POST" action="{{ route('issues.update', $issue->id) }}">
	@csrf
    @method('PATCH')
	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="name">Issue Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $issue->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
        <div class="col-6 mt-2">
            <div class="form-group">
                <label for="category_id">Issue Module</label>
                <select name="category_id" class="form-control form-control-sm{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                    <option>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $issue->category_id === $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

	    <div class="col-12 mt-2">
	        <div class="form-group">
                <label for="requests">Issue Requests</label>
                <textarea name="requests" class="form-control{{ $errors->has('requests') ? ' is-invalid' : '' }}" rows="4">{!! $issue->requests !!}</textarea>

                @if ($errors->has('requests'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('requests') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Update Issue
	    	</button>
	    	<a href="{{ route('issues.index') }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop