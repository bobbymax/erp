@if (! empty($results))
	@if ($select == 'directorate')
		<option value="">Select Directorate</option>
		@foreach ($results as $div)
			<option value="{{ $div->id }}">{{ $div->name }}</option>
		@endforeach
	@else
		<option value="">Select Department</option>
		<option value="0">None</option>
		@foreach ($results as $dept)
			<option value="{{ $dept->id }}">{{ $dept->name }}</option>
		@endforeach
	@endif
@endif