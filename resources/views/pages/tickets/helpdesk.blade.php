@extends('layouts.master')
@section('title', 'ERP Portal | Tickets')
@section('content')
<div class="row">
	<div class="col-4">
		<form class="mt-5" action="{{ route('tickets.adhoc.store') }}" method="POST">
			@csrf

			<div class="row">
				<div class="col-12">
					<div id="rightcont" class="form-group">
						<label for="users">Select Staff Name</label>
						<select class="form-control form-control-sm" name="users">
							<option>Select User</option>
							@foreach ($users as $user)
								<option value="{{ $user->id }}">{{ $user->name . " - '" . $user->email . "' " }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-12">
					<div class="form-group">
						<label for="categories">Request Category</label>
						<select name="categories" id="categories" class="form-control form-control-sm dynamic" data-dependent="issues">
							<option>Select Request Category</option>
							@foreach ($categories as $category)
								@if ($category->module->label === "helpdesk")
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-12">
					<div class="form-group">
						<label for="issues">Related Issue</label>
						<select name="issues" id="issues" class="form-control form-control-sm dynamic" data-dependent="specification">
							<option>Select Related Issue</option>
							@include('pages.ajax.issues')
						</select>
					</div>
				</div>

				<div class="col-12">
					<div class="form-group">
						<label for="specification">Details</label>
						<select name="specification" id="specification" class="form-control form-control-sm">
							<option>Select Specific Details</option>
							@include('pages.ajax.issues')
						</select>
					</div>
				</div>

				<div class="col-12">
					<div class="form-group">
						<label for="priority">Priority</label>
						<select name="priority" id="priority" class="form-control form-control-sm">
							<option>Select Priority</option>
							<option value="low">Low</option>
							<option value="normal">Normal</option>
							<option value="high">High</option>
						</select>
					</div>
				</div>

				<div class="col-12">
					<div class="form-group">
						<label for="additional_info">Additional Information</label>
						<textarea name="additional_info" class="form-control" rows="5"></textarea>
					</div>
				</div>

				<div class="col-12">
					<button type="submit" class="btn btn-flat btn-primary btn-sm">
						Generate Ticket
					</button>
					<a href="{{ route('tickets.index') }}" class="btn btn-flat btn-danger btn-sm">Cancel</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col-8">
		<div class="card mt-5">
            <div class="card-body">
                <div class="invoice-area">
                    <div class="invoice-head">
                        <div class="row">
                            <div class="iv-left col-6">
                                <span>Ticket Details</span>
                            </div>
                            <div class="iv-right col-6 text-md-right">
                                <span>#{{ getToken(4) . substr(time(), -4) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="invoice-address">
                                <h5>unassigned</h5>
                                <p>{{ auth()->user()->name }}</p>
                                <p>{{ auth()->user()->location->name . ", " . "room " . auth()->user()->room_no }}</p>
                                <p>{{ auth()->user()->groups->last()->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <ul class="invoice-date">
                                <li>Current Date: {{ date('d M, Y') }}</li>
                                <li>Status: Not Created Yet</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>
</div>
@stop
@section('scripts')

	<script>

		var token = '{{ csrf_token() }}';
		var url = '{{ route('dependencies.fetch') }}';

		$(document).ready(function() {
			$('.dynamic').change(function() {

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

	</script>
@stop