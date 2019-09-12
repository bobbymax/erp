@extends('layouts.master')
@section('title', 'ERP Protal | Profile')
@section('page-title', 'My Account')
@section('content') 
<form method="POST" action="{{ route('update.user.account', auth()->user()->staff_no) }}" enctype="multipart/form-data">
	@csrf

	<div class="row">
		<!-- Input Sizes start -->
	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="grade_level">Grade Level</label>
                <input class="form-control form-control-sm{{ $errors->has('grade_level') ? ' is-invalid' : '' }}" type="text" name="grade_level" value="{{ isset(auth()->user()->profile->grade_level) ? auth()->user()->profile->grade_level : old('grade_level') }}">

                @if ($errors->has('grade_level'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('grade_level') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="date_joined">Date Joined</label>
                <input class="fandate form-control form-control-sm{{ $errors->has('date_joined') ? ' is-invalid' : '' }}" type="text" name="date_joined" value="{{ isset(auth()->user()->profile->date_joined) ? auth()->user()->profile->date_joined->format('d F, Y') : old('date_joined') }}">

                @if ($errors->has('date_joined'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date_joined') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>


	    <div class="col-4 mt-2">
	        <div class="form-group">
                <label for="directorate">Directorate</label>
                <select name="directorate" id="directorate" class="form-control structure form-control-sm{{ $errors->has('directorate') ? ' is-invalid' : '' }}" data-dependent="division">
                	<option value="">Select Directorate</option>
                	@foreach ($groups as $dir)
                		@if ($dir->directorate === 1)
                			<option value="{{ $dir->id }}" {{ $user->groups->contains('id', $dir->id) ? ' selected' : '' }}>{{ $dir->name }}</option>
                		@endif
                	@endforeach                	
                </select>

                @if ($errors->has('directorate'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('directorate') }}</strong>
                    </span>
                @endif
	        </div>
	    </div>

	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="division">Division</label>
                <select name="division" id="division" class="form-control structure form-control-sm{{ $errors->has('division') ? ' is-invalid' : '' }}" data-dependent="department">
                	<option value="">Select Division</option>
                	@include('pages.ajax.placement')
                </select>

                @if ($errors->has('division'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('division') }}</strong>
                    </span>
                @endif

                <small>{{ isset(auth()->user()->profile) ? auth()->user()->profile->accountDivision->name : '' }}</small>
	        </div>
	    </div>

	    <div class="col-6 mt-2">
	        <div class="form-group">
                <label for="department">Department</label>
                <select name="department" id="department" class="form-control form-control-sm{{ $errors->has('department') ? ' is-invalid' : '' }}">
                	<option value="">Select Department</option>
                	@include('pages.ajax.placement')
                </select>

                @if ($errors->has('department'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
                    </span>
                @endif

                <small>{{ isset(auth()->user()->profile) ? auth()->user()->profile->accountDepartment->name : '' }}</small>
	        </div>
	    </div>



	    <div class="col-12 mt-2">
	    	<button class="btn btn-flat btn-xs btn-primary">
	    		<i class="ti-save"></i>&nbsp;&nbsp; Update User Record
	    	</button>
	    	<a href="{{ route('user.dashboard') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Cancel</a>
	    </div>
	    <!-- Input Sizes end -->
	</div>
</form>
@stop
@section('scripts')
	<script>
		
		

		var token = '{{ csrf_token() }}';
		var url = '{{ route('fetch.placement') }}';

		$(document).ready(function() {
			$('.structure').change(function() {

				if ($(this).val() != '') {

					var select = $(this).attr('id');
					var value = $(this).val();
					var dependent = $(this).data('dependent');

					$.ajax({
						url : url,
						method : 'POST',
						data : {
							select : select,
							_token : token,
							value  : value,
							dependent : dependent,
						},
						success : function(data) {
							$("select[name='"+dependent+"'").html('');
							$("select[name='"+dependent+"'").html(data.options);
						}
					});

				}

			});
		});

		$( function() {
	        $( ".fandate" ).datepicker({
	            dateFormat : 'dd-mm-yy'
	        });
	    });

	</script>
@stop