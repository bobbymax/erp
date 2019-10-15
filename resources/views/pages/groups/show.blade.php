@extends('layouts.master')
@section('title', 'ERP Portal | Group Permissions')
@section('content')
<div class="card-area mt-5">
	<div class="row">
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h5 class="title">{{ $group->name }}</h5>
					<p class="card-text"></p>
				</div>
			</div>
		</div>
		<div class="col-8">
			<form method="POST" action="{{ route('groups.add.permissions', $group->id) }}">
				@csrf
				
				<div class="row">
					@foreach ($permissions as $permission)
						@php
							$values = $group->permissions->toArray();
							$permission_id = [];
						@endphp
						@if ($values)
							@foreach ($values as $value)
								@php
									$permission_id[] = $value['id'];
								@endphp
							@endforeach
						@endif
						<div class="col-4">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission->id }}" id="permissions{{ $permission->id }}" {{ in_array($permission->id, $permission_id) ? ' checked' : '' }}>
								<label class="custom-control-label" for="permissions{{ $permission->id }}">
									{{ $permission->name }}
									@if (in_array($permission->id, $permission_id))
										<a href="{{ route('deny.permission', [$group->id, $permission->id]) }}"><small><i class="ti-trash"></i> deny</small></a>
									@endif
								</label>
							</div>
						</div>
						
					@endforeach
				</div>
				

				<button type="submit" class="btn btn-flat btn-primary btn-sm mt-5">
					<i data-feather="send"></i>&nbsp;&nbsp; Add Permissions
				</button>
				<a href="{{ route('groups.index') }}" class="btn btn-flat btn-sm btn-danger mt-5">
					<i data-feather="x"></i>&nbsp;&nbsp; Cancel
				</a>
				
			</form>
		</div>
	</div>
</div>
@stop