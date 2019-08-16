@extends('layouts.master')
@section('title', 'ERP Portal | Approve Trainings')
@section('page-title', 'Approve Trainings')
@section('styles')
<style>
    body {
        text-align: left !important;
    }
</style>
@stop
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($trainings->count() > 0)
                        <table class="table">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Staff</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Manager's Remark</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($trainings as $training)
                                    {{-- expr --}}
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $training->owner->name }}</td>
	                                    <td>
                                           <strong>Title:</strong> {{ $training->title }} <br>
                                           <strong>Provider:</strong> {{ $training->provider }} <br>
                                           <strong>Start Date:</strong> {{ $training->start_date->format('d M, Y') }} <br>
                                           <strong>Location:</strong> {{ $training->location }}
                                        </td>
                                        <td>
                                            {{ $training->proposed->comment }} <br><br>
                                            <span class="badge badge-pill {{ $training->status !== 'denied' ? 'badge-success' : 'badge-danger' }}">{{ $training->status }}</span>
                                        </td>
	                                    <td>
	                                    	<button type="button" title="Review Training" class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#reviewTraining{{ $training->id }}"><i class="ti-medall"></i>&nbsp;&nbsp; View Previous Trainings</button>
	                                    </td>
	                                </tr>
                                    @include('pages.modals.previous-trainings')
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no trainings awaiting your approval at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop