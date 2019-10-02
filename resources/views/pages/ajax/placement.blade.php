@if (! empty($results))
	@if ($select == 'directorate')
		<option value="">Select Directorate</option>
		@foreach ($results as $div)
			<option value="{{ $div->id }}" {{ is_object(auth()->user()->profile) && auth()->user()->profile->division === $div->id ? ' selected' : '' }}>{{ $div->name }}</option>
		@endforeach
	@else
		<option value="">Select Department</option>
		<option value="0" {{ is_object(auth()->user()->profile) && auth()->user()->profile->id === 0 ? ' selected' : '' }}>None</option>
		@foreach ($results as $dept)
			<option value="{{ $dept->id }}" {{ is_object(auth()->user()->profile) && auth()->user()->profile->department === $dept->id ? ' selected' : '' }}>{{ $dept->name }}</option>
		@endforeach
	@endif
@endif