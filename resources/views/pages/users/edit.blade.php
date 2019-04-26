@extends('layouts.master')
@section('title', 'ERP Protal | Create User')
@section('content')
<form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
	@csrf
    @method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="name">Fullname</label>
                <input class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ $user->name }}">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="email">Email Address</label>
                <input class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ $user->email }}">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="staff_no">Staff Number</label>
                <input class="form-control form-control-sm{{ $errors->has('staff_no') ? ' is-invalid' : '' }}" type="text" name="staff_no" value="{{ $user->staff_no }}">

                @if ($errors->has('staff_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('staff_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="room_no">Room Number</label>
                <input class="form-control form-control-sm{{ $errors->has('room_no') ? ' is-invalid' : '' }}" type="text" name="room_no" value="{{ $user->room_no }}">

                @if ($errors->has('room_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('room_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>


	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="location_id">Location</label>
                <select name="location_id" class="form-control form-control-sm{{ $errors->has('location_id') ? ' is-invalid' : '' }}">
                	<option value="">Select Staff Location</option>
                	@foreach ($locations as $l)
	                	<option value="{{ $l->id }}" {{ $user->location_id === $l->id ? ' selected' : '' }}>{{ $l->name }}</option>
                	@endforeach
                </select>

                @if ($errors->has('location_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location_id') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

        <div class="col-4 mt-2">
            <div class="form-group">
                <label for="avatar">Upload Profile Picture</label>
                <input type="file" name="avatar" class="form-control form-control-sm{{ $errors->has('avatar') ? ' is-invalid' : '' }}">

                @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @endif
            </div>
        </div>



	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Create User
	    	</button>
	    	<a href="{{ route('users.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop