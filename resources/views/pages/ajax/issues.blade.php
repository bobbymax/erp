@if (! empty($results))
	@if ($select == 'categories')
		<option value="">Select the issue you are expiriencing</option>
		@foreach ($results as $key => $value)
			<option value="{{ $key }}">{{ $value }}</option>
		@endforeach
	@else
		<option value="">Which of the following suits the issue?</option>
		@php
			$issues = json_decode($results->requests);
			$values = explode(',', $issues);
		@endphp
		@foreach ($values as $value)
			<option value="{{ $value }}">{{ $value }}</option>
		@endforeach
	@endif
@endif