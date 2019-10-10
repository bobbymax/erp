@extends('layouts.master')
@section('title', 'ERP Protal | Create Group')
@section('content')
<form method="POST" action="{{ route('groups.store') }}">
	@csrf
	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="name">Group Name</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Enter group name">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="code">Group Code</label>
                <input class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}" type="text" name="code" placeholder="Enter group code">

                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="parent">Group Parent</label>
                <select name="parent" class="form-control form-control-sm{{ $errors->has('parent') ? ' is-invalid' : '' }}">
                	<option value="">Select Group Parent</option>
                	<option value="0">None</option>
                	@foreach ($groups as $p)
	                	@if ($p->parent === 0)
	                		<option value="{{ $p->id }}">{{ $p->name }}</option>
	                	@endif
                	@endforeach
                </select>

                @if ($errors->has('parent'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('parent') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="relative">Group Relative</label>
                <select name="relative" class="form-control form-control-sm{{ $errors->has('relative') ? ' is-invalid' : '' }}">
                	<option value="">Select Group Relative</option>
                	<option value="0">None</option>
                	@foreach ($groups as $r)
                		@if ($r->parent !== 0)
	                		<option value="{{ $r->id }}">{{ $r->name }}</option>
	                	@endif
                	@endforeach
                </select>

                @if ($errors->has('relative'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('relative') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="directorate">Directorate</label>
                <select name="directorate" class="form-control form-control-sm @error('directorate') is-invalid @enderror">
                    <option value="">Is this group a directorate?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                @if ($errors->has('directorate'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('directorate') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="division">Division</label>
                <select name="division" class="form-control form-control-sm @error('division') is-invalid @enderror">
                    <option value="">Is this group a division?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                @if ($errors->has('division'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('division') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="department">Department</label>
                <select name="department" class="form-control form-control-sm @error('department') is-invalid @enderror">
                    <option value="">Is this group a department?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                @if ($errors->has('department'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="designation">Designation</label>
                <select name="designation" class="form-control form-control-sm @error('designation') is-invalid @enderror">
                    <option value="">Is this group a designation?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                @if ($errors->has('designation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('designation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="top_level">Line Manager/Management</label>
                <select name="top_level" class="form-control form-control-sm @error('top_level') is-invalid @enderror">
                    <option value="">Select Top Level Signatry</option>
                    <option value="0">None</option>
                    @foreach ($groups as $l)
                        @if ($l->designation == 1)
                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                        @endif
                    @endforeach
                </select>

                @if ($errors->has('top_level'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('top_level') }}</strong>
                    </span>
                @endif
            </div>
        </div>

	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Create Group
	    	</button>
	    	<a href="{{ route('groups.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop