@extends('layouts.master')
@section('title', 'ERP Protal | Update Per Diem')
@section('content')
<form class="mt-5" method="POST" action="{{ route('update.per.diem', [$gradeGroup->id, $travel->id]) }}">
	@csrf
	@method('PATCH')

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="travel_category_id">Travel Category Type</label>

                <select name="travel_category_id" class="form-control form-control-sm @error('travel_category_id') is-invalid @enderror">
                    <option>Select Category</option>
                    @foreach ($travels as $t)
                        <option value="{{ $t->id }}" {{ $t->id == $travel->id ? ' selected' : '' }}>{{ $t->type }}</option>
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
                <input class="form-control form-control-sm{{ $errors->has('per_diem') ? ' is-invalid' : '' }}" type="number" name="per_diem" value="{{ $db[0] }}">

                @if ($errors->has('per_diem'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('per_diem') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i data-feather="send"></i>&nbsp;&nbsp; Update Per Diem
	    	</button>
	    	<a href="{{ route('per.diems.index', $gradeGroup->label) }}" class="btn btn-flat btn-xs btn-danger"><i data-feather="x"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop