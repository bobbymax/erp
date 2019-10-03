@extends('layouts.master')
@section('title', 'ERP Portal | Manage Training')
@section('page-title', $user->name . ' Trainings')
@section('content')
<div class="row">

	@foreach ($user->trainings as $training)
		@if ($training->category_id === 0)
			<!-- Links And Buttons start -->
		    <div class="col-md-6 mt-5">
		        <div class="card">
		            <div class="card-body">
		                <h4 class="header-title">{{ $training->title . " - by " . $training->provider  }}<p>Duration: {{ $training->start_date->format('d M, Y') . " - " . $training->end_date->format('d M, Y') }}</p></h4>

		                <div class="list-group">
		                    <a href="#" class="list-group-item list-group-item-action {{ $training->category_id === 0 ? ' active' : '' }}">
		                        Not Categorised
		                    </a>

		                    @foreach ($categories as $category)
		                    	@if ($category->module->label === 'l-d-hr')
		                    		<a href="{{ route('update.training.category', [$training->id, $category->id]) }}" class="list-group-item list-group-item-action {{ $training->category_id === $category->id ? ' active' : '' }}">{{ $category->name }}</a>
		                    	@endif
		                    @endforeach
		                </div>
		            </div>
		        </div>
		    </div>
		    <!-- Links And Buttons end -->
		@else
			<div class="alert alert-warning">All {{ $user->name }} trainings have been categorised.</div>
	    @endif	    
	@endforeach


	<div class="col-12 mt-5">
		<a href="{{ route('manage.trainings') }}" class="btn btn-danger btn-flat btn-sm">Back to Manage Trainings</a>
	</div>


</div>
@stop