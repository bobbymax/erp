@extends('layouts.blank')
@section('title', 'Journey Instructions for '.$training->owner->name)
@section('content')

<style type="text/css">
		
	.obj {
		padding-left: 50px;
		list-style-type: square; 
		list-style-position: outside;
	}

	body {
		font-family: 'Ubuntu', sans-serif;
	}

	h1 {
		font-weight: 700;
	}

	.isVisible {
		display: none;
	}

	table, p, ul {
		font-size: 18px;
	}

</style>

<div class="container">
	
	<div class="row">
		<div class="col-3">
			<img src="{{ asset('images/logo_single.png') }}" alt="placeholder+image" class="img-fluid">
		</div>
		<div class="col-9">
			<h1 class="text-success mt-3" style="margin-left: 50px; font-size: 60px;">Internal Memo</h1>
		</div>
		<div class="col-12">
			<table class="table table-sm table-bordered mt-3">
				<tbody>
					<tr>
						<td colspan="2"><span style="font-weight: 700">Thru:&nbsp;&nbsp;</span>
							@if ($training->owner->groups->where('division', 1)->last()->top_level != 0)
								{{ $training->owner->groups->where('division', 1)->last()->signatory->code . " " . $training->owner->groups->where('division', 1)->last()->code }}
							@endif
						</td>
					</tr>
					<tr>
						<td colspan="2"><span style="font-weight: 700">To:</span> {{ $training->owner->name }} (ID: {{ $training->owner->staff_no }})</td>
					</tr>
					<tr>
						<td colspan="2"><span style="font-weight: 700">From:</span> MGR L&D</td>
					</tr>
					<tr>
						<td><span style="font-weight: 700">Ref:</span> NCDMB/HRD3/ICT/07/19/0152</td>
						<td><span style="font-weight: 700">Date:</span> {{ date('d F, Y') }}</td>
					</tr>
					<tr>
						<td colspan="2"><span style="font-weight: 700">Joining Instructions:</span> &nbsp;&nbsp;{{ $training->title }}</td>
					</tr>
				</tbody>
			</table>

			<p>This is to inform you that you have been nominated to attend the above Programme as follows:</p>

			<table class="table table-sm table-bordered mt-3 mb-3">
				<tbody>
					<tr>
						<td>Organizers:</td>
						<td>{{ $training->provider }}</td>
					</tr>
					<tr>
						<td>Course Title:</td>
						<td>{{ $training->title }}</td>
					</tr>
					<tr>
						<td>Venue:</td>
						<td>{{ $training->location }}</td>
					</tr>
					<tr>
						<td>Date:</td>
						<td>
							@if ($training->start_date->format('F') === $training->end_date->format('F'))
								{{ $training->start_date->format('jS') . " - " . $training->end_date->format('jS F, Y') }}
							@else
								{{ $training->start_date->format('jS F') . " - " . $training->end_date->format('jS F, Y') }}
							@endif
						</td>
					</tr>
				</tbody>
			</table>

			<h5 class="mb-2">COURSE OBJECTIVES</h5>

			<p class="mb-3">At the end of the Training Program, participants will be able to:</p>
			<div id="root" class="mb-3">
				<ul class="obj mb-3">
					@if (isset($training->objectives))
						@foreach ($training->objectives as $objective)
							<li value="{{ $objective->id }}">{{ $objective->description }} <small :class="{ 'isVisible' : isBlock }"><a href="{{ route('destroy.objective', $objective->id) }}">delete</a></small></li>
						@endforeach
						<li v-for="aim in objectives" v-text="aim"></li>
					@endif
				</ul>
				<div class="form-group mb-3" :class="{ 'isVisible' : isBlock }">
					<div class="row">
						<div class="col-10">
							<input type="text" v-model="aim" class="form-control form-control-sm">
						</div>
						<div class="col-2">
							<button class="btn btn-xs btn-primary" v-on:click="addObjective">Add Objective</button>
						</div>
					</div>
				</div>

				<p style="font-weight: bold;">In Line with the Board's policy to automate its payment processes, you are kindly requested tp login to your Staff Budget Portal and make a claim for your expenses on return from this Learning Event.</p><br>

				<table class="table table-sm table-bordered mt-3">
					<tbody>
						<tr v-for="(expectation, index) in expectations">
							<td>@{{ expectation.name }}</td>
							<td>@{{ currencyFormat(expectation.value) }}</td>
							<td :class="{ 'isVisible' : isBlock }"><a href="#" @click.prevent="remove(index)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
						</tr>
						<tr style="font-weight: 700;">
							<td>Total</td>
							<td>@{{ currencyFormat(totalfee) }}</td>
						</tr>
					</tbody>
				</table>



				{{-- This is were the calculations come in --}}

				<p class="mb-3" style="font-style: italic;">Please note that specialized courses are subject to calcellation policies. To avoid the Board losing the course fees, the General Manager, Human Resources and Manager Learning and Development should be informed at least Two (2) weeks before course commencement date, if there is a genuine reason for non-attendance.</p>

				<p class="mb-5">
					For further information on this subject, you may reach the undersigned:<br>
					Email: <a href="mailto:Terhemba.makeri@ncdmb.gov.ng">Terhemba.makeri@ncdmb.gov.ng</a> (08039782140)<br>
					Email: <a href="mailto:Lekoma.Nwineh@ncdmb.gov.ng">Lekoma.Nwineh@ncdmb.gov.ng</a> (08033096871)
				</p><br><br><br>

				<p class="mb-5">Lekoma Sonia Phimia Nwineh</p>


				<a href="" @click.prevent="finishWork" class="btn btn-primary" :class="{ 'isVisible' : isBlock }">Done</a>
				<a href="" @click.prevent="printInstruction" :disabled="{ isDisabled }" class="btn btn-success">Print Me</a>
				<a href="{{ route('journey.instructions') }}" class="btn btn-danger" :class="{ 'isVisible' : isBlock }">Cancel</a>

			</div>
		</div>
	</div>

</div>



@stop

@section('scripts')
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script>
		var url = "{{ route('add.objectives') }}";
		var token = "{{ csrf_token() }}";
		var editable = "{{ $editable }}";
		var training_id = "{{ $training->id }}";

	</script>
	<script src="/js/main.js"></script>
@stop


