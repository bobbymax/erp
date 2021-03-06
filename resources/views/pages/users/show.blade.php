@extends('layouts.master')
@section('title', 'ERP Portal | User Groups')
@section('content')
<div class="card-area mt-5">
	<div class="row">
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h5 class="title">{{ $user->name }}</h5>
					<p class="card-text">{{ $user->email }}</p>
				</div>
			</div>
		</div>
		<div class="col-8">
			<form method="POST" action="{{ route('users.add.group', $user->id) }}">
				@csrf
				
				<div class="row">
					@foreach ($groups as $group)
						@php
							$values = $user->groups->toArray();
							$group_id = [];
						@endphp
						@if ($values)
							@foreach ($values as $value)
								@php
									$group_id[] = $value['id'];
								@endphp
							@endforeach
						@endif
						<div class="col-4">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="groups[]" value="{{ $group->id }}" id="groups{{ $group->id }}" {{ in_array($group->id, $group_id) ? ' checked' : '' }}>
								<label class="custom-control-label" for="groups{{ $group->id }}">
									{{ $group->name }}

									@if (in_array($group->id, $group_id))
										<a href="{{ route('block.group', [$user->id, $group->id]) }}"><small><i class="ti-na"></i> remove</small></a>
									@endif
								</label>
							</div>
						</div>
						
					@endforeach
				</div>
				

				<button type="submit" class="btn btn-flat btn-primary btn-sm mt-5">
					<i data-feather="send"></i>&nbsp;&nbsp; Add User To Group
				</button>
				<a href="{{ route('users.index') }}" class="btn btn-flat btn-sm btn-danger mt-5">
					<i data-feather="x"></i>&nbsp;&nbsp; Cancel
				</a>
				
			</form>
		</div>
	</div>
</div>
@stop