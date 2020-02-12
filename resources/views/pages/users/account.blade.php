@extends('layouts.master')
@section('title', 'ERP Protal | User Profile')
@section('content')
<div class="row">
	<div class="col-4 mt-3">
		<h5>Fullname</h5>
		<h3>{{ $user->name }}</h3>
	</div>

	<div class="col-4 mt-3">
		<h5>Staff No</h5>
		<h3>{{ $user->staff_no }}</h3>
	</div>

	<div class="col-4 mt-3">
		<h5>Email</h5>
		<h3>{{ $user->email }}</h3>
	</div>

	<div class="col-4 mt-3">
		<h5>Directorate</h5>
		@foreach ($user->groups->where('directorate', 1)->pluck('name') as $element)
			<h3>{{ $element }}</h3>
		@endforeach
	</div>

	<div class="col-4 mt-3">
		<h5>Division</h5>
		@foreach ($user->groups->where('division', 1)->pluck('name') as $element)
			<h3>{{ $element }}</h3>
		@endforeach
	</div>

	<div class="col-4 mt-3">
		<h5>Department</h5>
		@foreach ($user->groups->where('department', 1)->pluck('name') as $element)
			<h3>{{ $element }}</h3>
		@endforeach
	</div>
</div>
@stop