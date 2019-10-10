@extends('layouts.master')
@section('title', 'ERP Protal | Add Per Diem')
@section('content')
<form class="mt-5" method="POST" action="{{ route('per.diem.submit', $gradeGroup->id) }}">
	@csrf

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="travel_category_id">Travel Category Type</label>

                <select name="travel_category_id" class="form-control form-control-sm @error('travel_category_id') is-invalid @enderror">
                    <option>Select Category</option>
                    @foreach ($travels as $travel)
                        <option value="{{ $travel->id }}">{{ $travel->type }}</option>
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
                <label for="per_diem">Per Diem Amount</label>
                <input class="form-control form-control-sm{{ $errors->has('per_diem') ? ' is-invalid' : '' }}" type="number" name="per_diem" placeholder="Enter Per Diem Amount">

                @if ($errors->has('per_diem'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('per_diem') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Add Per Diem
	    	</button>
	    	<a href="{{ route('per.diems.index', $gradeGroup->label) }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop